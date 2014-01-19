<?php
/**
 * ����Action
 */
class baseAction extends Action {
	public $user_mode;
	public $admin_mod;
	public $items_cate_mod;
	public $album_mod;
	public $album_cate_mod;
	function mod_init(){
		$this->items_cate_mod=D('items_cate');
		$this->user_mode=D('user');
	}
	function _initialize() {
		
		if(C('DB_HOST')=="noinstall_taodiv6"){
			redirect_to($TaoConfig["rootroad"]."/install.php");
			exit();	
		}
		
		include 'include/lib_common.php';	
		$this->mod_init();
			
		$this->site_root="http://".$_SERVER['SERVER_NAME'].($_SERVER['SERVER_PORT']==80?'':':'.$_SERVER['SERVER_PORT']).ROOTROAD."/";

		$this->assign('site_root',$this->site_root);
		
		
	
		
		
		// ��ȡ��Ŀ�������԰�
		$langSet = C('DEFAULT_LANG');
		if (is_file(LANG_PATH . $langSet . '/common.php')) {
			L(include LANG_PATH . $langSet . '/common.php');
		}
		// �û�Ȩ�޼��
		$this->check_priv();
		// ����˵����԰�
		if (is_file(LANG_PATH . $langSet . '/menu.php')) {
			L(include LANG_PATH . $langSet . '/menu.php');
		}
		//��Ҫ��½
		$admin_info =$_SESSION['admin_info'];
		//print_r($admin_info);exit;
		$this->assign('my_info', $admin_info);

		$this->setting = $set;

		$this->assign('show_header', true);
		$this->assign('const',get_defined_constants());

		//$this->assign('iframe',$_REQUEST['iframe']);
		$def=array(
			'request'=>$_REQUEST
		);
		$this->assign('def',json_encode($def));
	}
	//���Ȩ��
	public function check_priv()
	{
		if ((!isset($_SESSION['admin_info']) || !$_SESSION['admin_info']) && !in_array(ACTION_NAME, array('login','verify_code'))) {
			//$this->redirect('public/login');
			
		}
		checkadmin();
		if($_SESSION['admin_info']['id'] == 1) {
			return true;
		}
		if(in_array(ACTION_NAME,array('status','sort_order','ordid'))){
			return true;
		}
		if(!checkadminHT()) {
			$this->redirect('index.php');
		}
		//�ų�һЩ����Ҫ��Ȩ�޼��,/admin/conf/config.php
		foreach (C('IGNORE_PRIV_LIST') as $key=>$val){

			if(MODULE_NAME==$val['module_name']){
				if(count($val['action_list'])==0)return true;

				foreach($val['action_list'] as $action_item){
					if(ACTION_NAME==$action_item)return true;
				}
			}
		}


		if ($r==0) {
			//$this->error(L('_VALID_ACCESS_'));
		}
	}

	public function taobao_client()
	{
		vendor('Taobaotop.TopClient');
		vendor('Taobaotop.RequestCheckUtil');
		vendor('Taobaotop.Logger');
		$tb_top = new TopClient;
		$tb_top->appkey = $this->setting['taobao_appkey'];
		$tb_top->secretKey = $this->setting['taobao_appsecret'];
		return $tb_top;
	}

	//��ȡ�����ַ���
	public function mubstr($str,$start,$length)
	{
		import('ORG.Util.String');
		$a = new String();
		$b = $a->msubstr($str,$start,$length);
		return($b);
	}

	protected function error($message, $url_forward='',$ms = 3, $dialog=false, $ajax=false, $returnjs = '')
	{
		$this->jumpUrl = $url_forward;
		$this->waitSecond = $ms;
		$this->assign('dialog',$dialog);
		$this->assign('returnjs',$returnjs);
		parent::error($message, $ajax);
	}

	protected function success($message, $url_forward='',$ms = 3, $dialog=false, $ajax=false, $returnjs = '')
	{
		
		$this->jumpUrl = $url_forward;
		$this->waitSecond = $ms;
		$this->assign('dialog',$dialog);
		$this->assign('returnjs',$returnjs);
		parent::success($message, $ajax);
	}

	public function simplexml_obj2array($obj)
	{
		if ($obj instanceof SimpleXMLElement) {
			$obj = (array)$obj;
		}

		if (is_array($obj)) {
			$result = $keys = array();
			foreach ( $obj as $key=>$value) {
				isset($keys[$key]) ? ($keys[$key] += 1) : ($keys[$key] = 1);

				if ( $keys[$key] == 1 ) {
					$result[$key] = self::simplexml_obj2array($value);
				} elseif ( $keys[$key] == 2 ) {
					$result[$key] = array($result[$key], self::simplexml_obj2array($value));
				} else if( $keys[$key] > 2 ) {
					$result[$key][] = self::simplexml_obj2array($value);
				}
			}
			return $result;
		} else {
			return $obj;
		}
	}

	public function saddslashes($value)
	{
		if (empty($value)) {
			return $value;
		} else {
			return is_array($value) ? array_map(array('BaseAction','saddslashes'), $value) : addslashes($value);
		}
	}
	/*
	 * ͨ��ɾ������
	 * */
	function delete(){
		$mod=D(MODULE_NAME);

		if (isset($_POST['id']) && is_array($_POST['id'])) {
			$ids = implode(',', $_POST['id']);
			$result=$mod->delete($ids);
		} else {
			$id = intval($_GET['id']);
			$result=$mod->delete($id);
		}

		if($result){
			$this->success(L('operation_success'));
		}else{
			$this->error(L('operation_failure'));
		}
	}
	function check_res($result){
		if($result){
			$this->success(L('operation_success'));
		}else{
			$this->error(L('operation_failure'));
		}
	}
	function exist(){
		
	}
	/*
	 * ͨ�øı�״̬
	 * */
	function status(){
		$mod = D(MODULE_NAME);
		$id     = intval($_REQUEST['id']);
		$type   = trim($_REQUEST['type']);
		$sql    = "update ".C('DB_PREFIX').MODULE_NAME." set $type=($type+1)%2 where id='$id'";
		$res    = $mod->execute($sql);
		$values = $mod->where('id='.$id)->find();
		$this->ajaxReturn($values[$type]);
	}
	/*
	 * ͨ�ü��ֵ�Ƿ����,�����򷵻�true
	 * */
	function ajax_check_exist(){
		$mod = D(MODULE_NAME);
		$clientid=$_REQUEST['clientid'];
		if(!isset($clientid))exit;

		$clientid_val=$_REQUEST[$clientid];
		$id=intval($_REQUEST['id']);
		//print_r($id);exit;
		if($id>0){
			//edit
			$where="$clientid='$clientid_val' and id!=$id";
		}else{
			//add
			$where="$clientid='$clientid_val'";
		}

		//$mod->where($where)->count();
		//print_r($mod->getLastSql());exit;
		$this->ajaxReturn($mod->where($where)->count()>0);
	}
	/*
	 * ͨ������
	 * */
	function sort_order(){
		$mod = D(MODULE_NAME);
		if (isset($_POST['listorders'])) {
			foreach ($_POST['listorders'] as $id=>$sort_order) {
				$data['sort_order'] = $sort_order;
				$mod->where('id='.$id)->save($data);
			}
			$this->success(L('operation_success'));
		}
		$this->error(L('operation_failure'));
	}
	function _stripcslashes($arr){
		if(ini_get('magic_quotes_gpc')!='1')return $arr;
		foreach ($arr as $key=>$val){
			$arr[$key]=stripcslashes($val);
		}
		return $arr;
	}
	function pager($count,$pagesize=20){
		import("ORG.Util.Page");
		$pager=new Page($count,$pagesize);
		$this->assign('page', $pager->show());
		return $pager;
	}
	function append_user($res){
		foreach($res as $key=>$val){
			$res[$key]['user']=$this->user_mode->where('id='.$val['uid'])->find();
		}
		return $res;
	}
	function append_cate($res,$mod){
		
	}
}

//��ȡ�����ַ���
function mubstr($str,$start,$length)
{
	import('ORG.Util.String');
	$a = new String();
	$b = $a->msubstr($str,$start,$length);
	return($b);
}
?>
