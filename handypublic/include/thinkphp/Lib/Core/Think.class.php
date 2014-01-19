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

/**
 * ThinkPHP Portal��
 * @category   Think
 * @package  Think
 * @subpackage  Core
 * @author    liu21st <liu21st@gmail.com>
 */
class Think {

    private static $_instance = array();

    /**
     * Ӧ�ó����ʼ��
     * @access public
     * @return void
     */
    static public function start() {
        // �趨������쳣����
        register_shutdown_function(array('Think','fatalError'));
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
     * ��ȡ������Ϣ ������Ŀ
     * @access private
     * @return string
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

        // ���ؿ�ܵײ����԰�
        L(include THINK_PATH.'Lang/'.strtolower(C('DEFAULT_LANG')).'.php');

        // ����ģʽϵͳ��Ϊ����
        if(C('APP_TAGS_ON')) {
            if(isset($mode['extends'])) {
                C('extends',is_array($mode['extends'])?$mode['extends']:include $mode['extends']);
            }else{ // Ĭ�ϼ���ϵͳ��Ϊ��չ����
                C('extends', include THINK_PATH.'Conf/tags.php');
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
                THINK_PATH.'Common/functions.php', // ��׼ģʽ������
                CORE_PATH.'Core/Log.class.php',    // ��־������
                CORE_PATH.'Core/Dispatcher.class.php', // URL������
                CORE_PATH.'Core/App.class.php',   // Ӧ�ó�����
                CORE_PATH.'Core/Action.class.php', // ��������
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
     * ϵͳ�Զ�����ThinkPHP���
     * ����֧�������Զ�����·��
     * @param string $class ��������
     * @return void
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
            if((defined('GROUP_NAME') && require_cache(LIB_PATH.'Model/'.GROUP_NAME.'/'.$class.'.class.php'))
                || require_cache(LIB_PATH.'Model/'.$class.'.class.php')
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
     * ȡ�ö���ʵ�� ֧�ֵ�����ľ�̬����
     * @param string $class ��������
     * @param string $method ��ľ�̬������
     * @return object
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
     * �Զ����쳣����
     * @access public
     * @param mixed $e �쳣����
     */
    static public function appException($e) {
        halt($e->__toString());
    }

    /**
     * �Զ��������
     * @access public
     * @param int $errno ��������
     * @param string $errstr ������Ϣ
     * @param string $errfile �����ļ�
     * @param int $errline ��������
     * @return void
     */
    static public function appError($errno, $errstr, $errfile, $errline) {
      switch ($errno) {
          case E_ERROR:
          case E_PARSE:
          case E_CORE_ERROR:
          case E_COMPILE_ERROR:
          case E_USER_ERROR:
            ob_end_clean();
            // ҳ��ѹ�����֧��
            if(C('OUTPUT_ENCODE')){
                $zlib = ini_get('zlib.output_compression');
                if(empty($zlib)) ob_start('ob_gzhandler');
            }
            $errorStr = "$errstr ".$errfile." �� $errline ��.";
            if(C('LOG_RECORD')) Log::write("[$errno] ".$errorStr,Log::ERR);
            function_exists('halt')?halt($errorStr):exit('ERROR:'.$errorStr);
            break;
          case E_STRICT:
          case E_USER_WARNING:
          case E_USER_NOTICE:
          default:
            $errorStr = "[$errno] $errstr ".$errfile." �� $errline ��.";
            trace($errorStr,'','NOTIC');
            break;
      }
    }
    
    // �������󲶻�
    static public function fatalError() {
        if ($e = error_get_last()) {
            Think::appError($e['type'],$e['message'],$e['file'],$e['line']);
        }
    }

}