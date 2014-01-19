<?php

class adlistAction extends baseAction
{
	function index()
	{
		$adlist_list = $this->getallad();
		
		$big_menu = array('javascript:art.dialog({id:\'add\',iframe:\'?m=adlist&a=add\', title:\'添加广告位\', width:\'600\', height:\'400\', lock:true}, function(){var d = art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){art.dialog({id:\'add\'}).close()});void(0);', '添加广告位');

		$this->assign('page',$page);
    	$this->assign('big_menu',$big_menu);
		$this->assign('adlist_list',$adlist_list);
		$this->display();
	}
	function getallad(){
		global $TaoConfig;
		
		$adlist_mod = D('adlist');
		import("ORG.Util.Page");

		$adlist_list2 = $adlist_mod->select();
		$key = 1;
		$adlist_list = array();
		foreach($adlist_list2 as $k=>$val){
			if($val["type"]=="template"){
				if(is_array($TaoConfig["CustomAdList"])){		
					if(is_array($TaoConfig["CustomAdList"][$val["keyid"]])){		
						$adlist_list[$val["keyid"]]=$val;
					}
				}
			}
			if($val["type"]=="base"){
						$adlist_list[$val["id"]]=$val;
						$adlist_list[$val["id"]]['keyid'] = $val["id"];
						$adlist_list[$val["id"]]['type'] = "base";
			}
		}
		
		
		
		if(is_array($TaoConfig["CustomAdList"])){
			
			foreach($TaoConfig["CustomAdList"] as $key=>$val){
				$adlist_list[$key]['id']=$key;
				$adlist_list[$key]['name']=$val["name"];
				$adlist_list[$key]['width']=$val["width"];
				$adlist_list[$key]['height']=$val["height"];
				$adlist_list[$key]['description']=$val["description"];
				if($adlist_list[$key]['status']!="0")$adlist_list[$key]['status']=1;
				$adlist_list[$key]['type']="template";
				$adlist_list[$key]['keyid']=$key;
			}
			
		}
		
		foreach($adlist_list as $key=>$val){
			//$val["getad"] = "&lt;!--{ad/".$val["keyid"]."}--&gt;";
			$val["getad"] = "<!--{ad/".$val["keyid"]."}-->";
			
			$adlist_list[$key] = $val;
		}
		
		
		
		return $adlist_list;
	}
	function add()
	{
		if(isset($_POST['dosubmit'])){
			$adlist_mod = D('adlist');
	    	$data = array();
	    	$name = isset($_POST['name']) && trim($_POST['name']) ? trim($_POST['name']) : $this->error(L('input').L('flink_name'));
	    	$exist = $adlist_mod->where("name='".$name."'")->count();
			if($exist != 0){
				$this->error('该广告位已经存在');
			}
	    	$data = $adlist_mod->create();
			$data["type"]=="base";
	    	$keyid = $adlist_mod->add();
			
			$data["keyid"] = $keyid;
			$adlist_mod->where("id='".$keyid."'")->save($data);
			
			
	    	$this->success(L('operation_success'), '', '', 'add');

		}else{
	        $this->assign('show_header', false);
			$this->display();
		}
	}

	function edit()
	{ 
		if(isset($_POST['dosubmit'])){
			
			
			
			$adlist_mod = D('adlist');
			$data = $adlist_mod->create();
			
			$result 		= $adlist_mod->where("keyid='".$data['keyid']."'")->save($data);
			
			$adlist_list2	= $adlist_mod->where("keyid='".$data['keyid']."'")->select();

			
			if(is_array($adlist_list2[0])){
				$this->success(L('operation_success'), '', '', 'edit');
			}else{
				$result = $adlist_mod->add($data);
				$this->error(L('operation_success'));
			}
		}else{
			global $TaoConfig;
		
			$adlist_mod =array();
			
			$adlist_list = $this->getallad();
			
			$adlist_mod = D('adlist');
			
			
			
			
			
			if(isset($adlist_list[$_GET['id']]) ){
				
				$adlist = $adlist_list[$_GET['id']];
				
				$keyid = intval($_GET['id']);
				$adlist_mod->where("id='".$keyid."'")->save($adlist);

			}
			
			
			
			$this->assign('adlist',$adlist);
			$this->assign('show_header', false);
			$this->display();
		}
	}

	function delete()
    {
		$adlist_mod = D('adlist');
		if((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_POST['id']) || empty($_POST['id']))) {
            $this->error('请选择删除项！');
		}
		if( isset($_POST['id'])&&is_array($_POST['id']) ){
			$ids = implode(',',$_POST['id']);
			$adlist_mod->delete($ids);
		}else{
			$id = intval($_GET['id']);
		    $adlist_mod->where('id='.$id)->delete();
		}
		$this->success(L('operation_success'));
    }

}
?>