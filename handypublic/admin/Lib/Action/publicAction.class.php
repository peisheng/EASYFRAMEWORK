<?php
class publicAction extends baseAction
{
	// �˵�ҳ��
	public function menu() {
		//$this->checkUser();

		//��ʾ�˵���
		$id	=	intval($_REQUEST['tag'])==0?6:intval($_REQUEST['tag']);
		$menu  = array();

		$role_id = D('admin')->where('id='.$_SESSION['admin_info']['id'])->getField('role_id');
		$node_ids_res = D("access")->where("role_id=".$role_id)->field("node_id")->select();

		$node_ids = array();
		foreach ($node_ids_res as $row) {
			array_push($node_ids,$row['node_id']);
		}

		//��ȡ���ݿ�ģ���б����ɲ˵���
		$node    =   M("node");
		$where = "auth_type<>2 AND status=1 AND is_show=0 AND group_id=".$id;
		$list	=	$node->where($where)->field('id,action,action_name,module,module_name,data')->order('sort DESC')->select();

		foreach($list as $key=>$action) {
			$data_arg = array();
			if ($action['data']) {
				$data_arr = explode('&', $action['data']);
				foreach ($data_arr as $data_one) {
					$data_one_arr = explode('=', $data_one);
					$data_arg[$data_one_arr[0]] = $data_one_arr[1];
				}
			}
			$action['url'] = U($action['module'].'/'.$action['action'], $data_arg);
			if ($action['action']) {
				$menu[$action['module']]['navs'][] = $action;
			}
			$menu[$action['module']]['name']	= $action['module_name'];
			$menu[$action['module']]['id']	= $action['id'];
		}

		$this->assign('menu',$menu);
		$this->display('left');
	}

	/**
	 +----------------------------------------------------------
	 * �������
	 +----------------------------------------------------------
	 */
	public function panel()
	{
		$security_info=array();
		if(is_dir(ROOT_PATH."/install")){
			$security_info[]="ǿ�ҽ���ɾ����װ�ļ���,���<a href='".u('public/delete_install')."'>��ɾ����</a>";
		}
		if(APP_DEBUG==true){
			$security_info[]="ǿ�ҽ�������վ���ߺ󣬽���ر� DEBUG ��ǰ̨������ʾ��";
		}
		
		$this->assign('security_info',$security_info);

		$server_info = array(
		    'PINPHP�汾'=>'2.2 [<a href="http://www.pinphp.com/" target="_blank">�鿴���°汾</a>]',
		// '��������'=>'<a href="http://www.pinphp.com" class="blue" target="_blank">�ٷ���վ</a>&nbsp;&nbsp;<a href="http://bbs.pinphp.com" class="blue" target="_blank">֧����̳</a>',
            '����ϵͳ'=>PHP_OS,
            '���л���'=>$_SERVER["SERVER_SOFTWARE"],
		//'PHP���з�ʽ'=>php_sapi_name(),
            '�ϴ���������'=>ini_get('upload_max_filesize'),
            'ִ��ʱ������'=>ini_get('max_execution_time').'��',
		//'������ʱ��'=>date("Y��n��j�� H:i:s"),
		//'����ʱ��'=>gmdate("Y��n��j�� H:i:s",time()+8*3600),
            '����������/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
            'ʣ��ռ�'=>round((@disk_free_space(".")/(1024*1024)),2).'M',
		);
		$this->assign('server_info',$server_info);
		$role_mod=d('role');
		$res=$role_mod->where('id='.$_SESSION['admin_info']['role_id'])->find();
		$this->assign('role',$res);
		$this->display();
	}
	public function login()
	{
		//unset($_SESSION);
		$admin_mod=M('admin');
		if ($_POST) {
			$username = $_POST['username'] && trim($_POST['username']) ? trim($_POST['username']) : '';
			$password = $_POST['password'] && trim($_POST['password']) ? trim($_POST['password']) : '';
			if (!$username || !$password) {
				redirect(u('public/login'));
			}
			//������֤����
			$map  = array();
			// ֧��ʹ�ð��ʺŵ�¼
			$map['user_name']	= $username;
			$map["status"]	=	array('gt',0);
			$admin_info=$admin_mod->where("user_name='$username'")->find();

			//ʹ���û����������״̬�ķ�ʽ������֤
			if(false === $admin_info) {
				$this->error('�ʺŲ����ڻ��ѽ��ã�');
			}else {
				if($admin_info['password'] != md5($password)) {
					$this->error('�������');
				}

				$_SESSION['admin_info'] =$admin_info;
				if($authInfo['user_name']=='admin') {
					$_SESSION['administrator'] = true;
				}
				$this->success('��¼�ɹ���',u('index/index'));
				exit;
			}
		}
		$this->display();
	}

	public function logout()
	{
		if(isset($_SESSION['admin_info'])) {
			unset($_SESSION['admin_info']);
			//unset($_SESSION);
			$this->success('�ǳ��ɹ���',u('public/login'));
		}else {
			$this->error('�Ѿ��ǳ���');
		}
	}
	public function delete_install(){
		import("ORG.Io.Dir");
		$dir = new Dir;
		$dir->delDir(ROOT_PATH."/install");
		@unlink(ROOT_PATH.'/install.php');
		if(!is_dir(ROOT_PATH."/install")){
			$this->success(L('operation_success'));
		}
	}
}
?>