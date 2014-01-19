<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2012 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id: Think.class.php 2793 2012-03-02 05:34:40Z liu21st $

/**
 +------------------------------------------------------------------------------
 * ThinkPHP Portal��
 +------------------------------------------------------------------------------
 * @category   Think
 * @package  Think
 * @subpackage  Core
 * @author    liu21st <liu21st@gmail.com>
 * @version   $Id: Think.class.php 2793 2012-03-02 05:34:40Z liu21st $
 +------------------------------------------------------------------------------
 */
class Think {

	private static $_instance = array();

	/**
	 +----------------------------------------------------------
	 * Ӧ�ó����ʼ��
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @return void
	 +----------------------------------------------------------
	 */
	static public function Start() {
		// �趨������쳣����
		set_error_handler(array('Think','appError'));
		set_exception_handler(array('Think','appException'));
		// ע��AUTOLOAD����
		spl_autoload_register(array('Think', 'autoload'));
		//[RUNTIME]
		Think::buildApp();         // Ԥ������Ŀ
		//[/RUNTIME]
		// ����Ӧ��
		App::run();
		return ;
	}

	//[RUNTIME]
	/**
	 +----------------------------------------------------------
	 * ��ȡ������Ϣ ������Ŀ
	 +----------------------------------------------------------
	 * @access private
	 +----------------------------------------------------------
	 * @return string
	 +----------------------------------------------------------
	 */
	static private function buildApp() {
		// ���صײ���������ļ�
		C(include THINK_PATH.'Conf/convention.php');

		// ��ȡ����ģʽ
		if(defined('MODE_NAME')) { // ģʽ�����ò������ģʽ
			$mode   = include MODE_PATH.strtolower(MODE_NAME).'.php';
		}else{
			$mode   =  array();
		}

		// ����ģʽ�����ļ�
		if(isset($mode['config'])) {
			C( is_array($mode['config'])?$mode['config']:include $mode['config'] );
		}

		// ������Ŀ�����ļ�
		if(is_file(CONF_PATH.'config.php'))
		C(include CONF_PATH.'config.php');
		//[sae]��������
		C(include SAE_PATH.'Conf/convention_sae.php');
		//[sae]ר������
		if (is_file(CONF_PATH . 'config_sae.php'))
		C(include CONF_PATH . 'config_sae.php');
		// ���ؿ�ܵײ����԰�
		L(include THINK_PATH.'Lang/'.strtolower(C('DEFAULT_LANG')).'.php');

		// ����ģʽϵͳ��Ϊ����
		if(C('APP_TAGS_ON')) {
			if(isset($mode['extends'])) {
				C('extends',is_array($mode['extends'])?$mode['extends']:include $mode['extends']);
			}else{ //[sae] Ĭ�ϼ���ϵͳ��Ϊ��չ����
				C('extends', include SAE_PATH.'Conf/tags.php');
			}
		}

		// ����Ӧ����Ϊ����
		if(isset($mode['tags'])) {
			C('tags', is_array($mode['tags'])?$mode['tags']:include $mode['tags']);
		}elseif(is_file(CONF_PATH.'tags.php')){
			// Ĭ�ϼ�����Ŀ����Ŀ¼��tags�ļ�����
			C('tags', include CONF_PATH.'tags.php');
		}

		$compile   = '';
		// ��ȡ���ı����ļ��б�
		if(isset($mode['core'])) {
			$list   =  $mode['core'];
		}else{
			$list  =  array(
			SAE_PATH.'Common/functions.php', //[sae] ��׼ģʽ������
			SAE_PATH.'Common/sae_functions.php',//[sae]����saeר�ú���
			SAE_PATH.'Lib/Core/Log.class.php',    // ��־������
			CORE_PATH.'Core/Dispatcher.class.php', // URL������
			CORE_PATH.'Core/App.class.php',   // Ӧ�ó�����
			SAE_PATH.'Lib/Core/Action.class.php', //[sae] ��������
			CORE_PATH.'Core/View.class.php',  // ��ͼ��
			);
		}
		// ��Ŀ׷�Ӻ��ı����б��ļ�
		if(is_file(CONF_PATH.'core.php')) {
			$list  =  array_merge($list,include CONF_PATH.'core.php');
		}
		foreach ($list as $file){
			if(is_file($file))  {
				require_cache($file);
				if(!APP_DEBUG)   $compile .= compile($file);
			}
		}

		// ������Ŀ�����ļ�
		if(is_file(COMMON_PATH.'common.php')) {
			include COMMON_PATH.'common.php';
			// �����ļ�
			if(!APP_DEBUG)  $compile   .= compile(COMMON_PATH.'common.php');
		}

		// ����ģʽ��������
		if(isset($mode['alias'])) {
			$alias = is_array($mode['alias'])?$mode['alias']:include $mode['alias'];
			alias_import($alias);
			if(!APP_DEBUG) $compile .= 'alias_import('.var_export($alias,true).');';
		}
		// ������Ŀ��������
		if(is_file(CONF_PATH.'alias.php')){
			$alias = include CONF_PATH.'alias.php';
			alias_import($alias);
			if(!APP_DEBUG) $compile .= 'alias_import('.var_export($alias,true).');';
		}

		if(APP_DEBUG) {
			// ����ģʽ����ϵͳĬ�ϵ������ļ�
			C(include THINK_PATH.'Conf/debug.php');
			// ��ȡ����ģʽ��Ӧ��״̬
			$status  =  C('APP_STATUS');
			// ���ض�Ӧ����Ŀ�����ļ�
			if(is_file(CONF_PATH.$status.'.php'))
			// ������Ŀ���ӿ���ģʽ���ö���
			C(include CONF_PATH.$status.'.php');
		}else{
			// ����ģʽ�������ɱ����ļ�
			build_runtime_cache($compile);
		}
		return ;
	}
	//[/RUNTIME]

	/**
	 +----------------------------------------------------------
	 * ϵͳ�Զ�����ThinkPHP���
	 * ����֧�������Զ�����·��
	 +----------------------------------------------------------
	 * @param string $class ��������
	 +----------------------------------------------------------
	 * @return void
	 +----------------------------------------------------------
	 */
	public static function autoload($class) {
		// ����Ƿ���ڱ�������
		if(alias_import($class)) return ;

		if(substr($class,-8)=='Behavior') { // ������Ϊ
			if(require_cache(CORE_PATH.'Behavior/'.$class.'.class.php')
			|| require_cache(EXTEND_PATH.'Behavior/'.$class.'.class.php')
			|| require_cache(LIB_PATH.'Behavior/'.$class.'.class.php')
			|| (defined('MODE_NAME') && require_cache(MODE_PATH.ucwords(MODE_NAME).'/Behavior/'.$class.'.class.php'))) {
				return ;
			}
		}elseif(substr($class,-5)=='Model'){ // ����ģ��
			if(require_cache(LIB_PATH.'Model/'.$class.'.class.php')
			|| require_cache(EXTEND_PATH.'Model/'.$class.'.class.php') ) {
				return ;
			}
		}elseif(substr($class,-6)=='Action'){ // ���ؿ�����
			if((defined('GROUP_NAME') && require_cache(LIB_PATH.'Action/'.GROUP_NAME.'/'.$class.'.class.php'))
			|| require_cache(LIB_PATH.'Action/'.$class.'.class.php')
			|| require_cache(EXTEND_PATH.'Action/'.$class.'.class.php') ) {
				return ;
			}
		}

		// �����Զ�����·�����ý��г�������
		$paths  =   explode(',',C('APP_AUTOLOAD_PATH'));
		foreach ($paths as $path){
			if(import($path.'.'.$class))
			// ���������ɹ��򷵻�
			return ;
		}
	}

	/**
	 +----------------------------------------------------------
	 * ȡ�ö���ʵ�� ֧�ֵ�����ľ�̬����
	 +----------------------------------------------------------
	 * @param string $class ��������
	 * @param string $method ��ľ�̬������
	 +----------------------------------------------------------
	 * @return object
	 +----------------------------------------------------------
	 */
	static public function instance($class,$method='') {
		$identify   =   $class.$method;
		if(!isset(self::$_instance[$identify])) {
			if(class_exists($class)){
				$o = new $class();
				if(!empty($method) && method_exists($o,$method))
				self::$_instance[$identify] = call_user_func_array(array(&$o, $method));
				else
				self::$_instance[$identify] = $o;
			}
			else
			halt(L('_CLASS_NOT_EXIST_').':'.$class);
		}
		return self::$_instance[$identify];
	}

	/**
	 +----------------------------------------------------------
	 * �Զ����쳣����
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param mixed $e �쳣����
	 +----------------------------------------------------------
	 */
	static public function appException($e) {
		halt($e->__toString());
	}

	/**
	 +----------------------------------------------------------
	 * �Զ��������
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param int $errno ��������
	 * @param string $errstr ������Ϣ
	 * @param string $errfile �����ļ�
	 * @param int $errline ��������
	 +----------------------------------------------------------
	 * @return void
	 +----------------------------------------------------------
	 */
	static public function appError($errno, $errstr, $errfile, $errline) {
		switch ($errno) {
			case E_ERROR:
			case E_USER_ERROR:
				$errorStr = "[$errno] $errstr ".basename($errfile)." �� $errline ��.";
				if(C('LOG_RECORD')) Log::write($errorStr,Log::ERR);
				halt($errorStr);
				break;
			case E_STRICT:
			case E_USER_WARNING:
			case E_USER_NOTICE:
			default:
				$errorStr = "[$errno] $errstr ".basename($errfile)." �� $errline ��.";
				Log::record($errorStr,Log::NOTICE);
				break;
		}
	}


	/**
	 +----------------------------------------------------------
	 * �Զ���������
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $name ��������
	 * @param $value  ����ֵ
	 +----------------------------------------------------------
	 */
	public function __set($name ,$value) {
		if(property_exists($this,$name))
		$this->$name = $value;
	}

	/**
	 +----------------------------------------------------------
	 * �Զ�������ȡ
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $name ��������
	 +----------------------------------------------------------
	 * @return mixed
	 +----------------------------------------------------------
	 */
	public function __get($name) {
		return isset($this->$name)?$this->$name:null;
	}
}