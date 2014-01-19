<?php

class helpAction extends baseAction
{
	public function index()
	{
		$help_mod = D('help');
		$help_cate_mod = D('help_cate');

		//搜索
		$where = '1=1';
		if (isset($_GET['keyword']) && trim($_GET['keyword'])) {
		    $where .= " AND title LIKE '%".$_GET['keyword']."%'";
		    $this->assign('keyword', $_GET['keyword']);
		}
		if (isset($_GET['time_start']) && trim($_GET['time_start'])) {
		    $time_start = $_GET['time_start'];
		    $where .= " AND add_time>='".$time_start."'";
		    $this->assign('time_start', $_GET['time_start']);
		}
		if (isset($_GET['time_end']) && trim($_GET['time_end'])) {
		    $time_end = $_GET['time_end'];
		    $where .= " AND add_time<='".$time_end."'";
		    $this->assign('time_end', $_GET['time_end']);
		}
		if (isset($_GET['cate_id']) && intval($_GET['cate_id'])) {
		    $where .= " AND cate_id=".$_GET['cate_id'];
		    $this->assign('cate_id', $_GET['cate_id']);
		}
		import("ORG.Util.Page");
		$count = $help_mod->where($where)->count();
		$p = new Page($count,20);
		$help_list = $help_mod->where($where)->limit($p->firstRow.','.$p->listRows)->order('add_time DESC')->select();

		$key = 1;
		foreach($help_list as $k=>$val){
			$help_list[$k]['key'] = ++$p->firstRow;
			$help_list[$k]['cate_name'] = $help_cate_mod->field('name')->where('id='.$val['cate_id'])->find();
		}
		$result = $help_cate_mod->order('sort_order ASC')->select();
    	$cate_list = array();
    	foreach ($result as $val) {
    	    if ($val['pid']==0) {
    	        $cate_list['parent'][$val['id']] = $val;
    	    } else {
    	        $cate_list['sub'][$val['pid']][] = $val;
    	    }
    	}
		//网站信息/应用资讯
		$page = $p->show();
		$this->assign('page',$page);
    	$this->assign('cate_list', $cate_list);
		$this->assign('help_list',$help_list);
		$this->display();
	}

	function edit()
	{
		if(isset($_POST['dosubmit'])){
			$help_mod = D('help');
			$attatch_mod = D('attatch');
			$data = $help_mod->create();
			if($data['cate_id']==0){
				$this->error('请选择资讯分类');
			}
			if ($_FILES['img']['name']!=''||$_FILES['attachment']['name'][0]!='') {
			    $upload_list = $this->_upload();
			    if ($_FILES['img']['name']!=''&&$_FILES['attachment']['name'][0]!='') {
				    $data['img'] = $upload_list['0']['savename'];
				    array_shift($upload_list);
				    $aid_arr = array();
			        foreach ($upload_list as $att) {
			            $file['title'] = $att['name'];
			            $file['filetype'] = $att['extension'];
					    $file['filesize'] = $att['size'];
					    $file['url'] = $att['savename'];
					    $file['uptime'] = date('Y-m-d H:i:s');
						$attatch_mod->add($file);
						$aid_arr[] = mysql_insert_id();
			        }
			        $data['aid'] = implode(',', $aid_arr);
			    } elseif ($_FILES['img']['name']!='') {
			        $data['img'] = $upload_list['0']['savename'];
			    } else {
			        $aid_arr = array();
			        foreach ($upload_list as $att) {
			            $file['title'] = $att['name'];
			            $file['filetype'] = $att['extension'];
					    $file['filesize'] = $att['size'];
					    $file['url'] = $att['savename'];
					    $file['uptime'] = date('Y-m-d H:i:s');
						$attatch_mod->add($file);
						$aid_arr[] = mysql_insert_id();
			        }
			        $data['aid'] = implode(',', $aid_arr);
			    }
			    if ($data['aid']) {
			        $help_info = $help_mod->where('id='.$data['id'])->find();
			        if ($help_info['aid']) {
			            $data['aid'] = $help_info['aid'].','.$data['aid'];
			        }
			    }
			}
			$result = $help_mod->save($data);
			if(false !== $result){
				$this->success(L('operation_success'),U('help/index'));
			}else{
				$this->error(L('operation_failure'));
			}
		}else{
			$help_mod = D('help');
			if( isset($_GET['id']) ){
				$help_id = isset($_GET['id']) && intval($_GET['id']) ? intval($_GET['id']) : $this->error(L('please_select'));
			}
			$help_cate_mod = D('help_cate');
		    $result = $help_cate_mod->order('sort_order ASC')->select();
		    $cate_list = array();
		    foreach ($result as $val) {
		    	if ($val['pid']==0) {
		    	    $cate_list['parent'][$val['id']] = $val;
		    	} else {
		    	    $cate_list['sub'][$val['pid']][] = $val;
		    	}
		    }
			$help_info = $help_mod->where('id='.$help_id)->find();
			
			
			//附件
			$attatch_mod = D('attatch');
			
			$help_info['attatch'] = $attatch_mod->where("aid IN (".$help_info['id'].")")->select();
			
			$this->assign('show_header', false);
	    	$this->assign('cate_list',$cate_list);
			$this->assign('help',$help_info);
			$this->display();
		}


	}

	function add()
	{
		if(isset($_POST['dosubmit'])){
			$help_mod = D('help');
			$attatch_mod = D('attatch');
			if($_POST['title']==''){
				$this->error(L('input').L('help_title'));
			}
			if(false === $data = $help_mod->create()){
				$this->error($help_mod->error());
			}
			if ($_FILES['img']['name']!=''||$_FILES['attachment']['name'][0]!='') {
			    if ($_FILES['img']['name']!=''&&$_FILES['attachment']['name'][0]!='') {
				    $upload_list = $this->_upload();
				    $data['img'] = $upload_list['0']['savename'];
				    array_shift($upload_list);
				    $aid_arr = array();
			        foreach ($upload_list as $att) {
			            $file['title'] = $att['name'];
			            $file['filetype'] = $att['extension'];
					    $file['filesize'] = $att['size'];
					    $file['url'] = $att['savename'];
					    $file['uptime'] = date('Y-m-d H:i:s');
						$attatch_mod->add($file);
						$aid_arr[] = mysql_insert_id();
			        }
			        $data['aid'] = implode(',', $aid_arr);
			    } elseif ($_FILES['img']['name']!='') {
			        $upload_list = $this->_upload();
			        $data['img'] = $upload_list['0']['savename'];
			    } else {
			        $upload_list = $this->_upload();
			        $aid_arr = array();
			        foreach ($upload_list as $att) {
			            $file['title'] = $att['name'];
					    $file['filetype'] = $att['extension'];
					    $file['filesize'] = $att['size'];
					    $file['url'] = $att['savename'];
					    $file['uptime'] = date('Y-m-d H:i:s');
						$attatch_mod->add($file);
						$aid_arr[] = mysql_insert_id();
			        }
			        $data['aid'] = implode(',', $aid_arr);
			    }
			}
			$data['add_time']=date('Y-m-d H:i:s',time());
			$result = $help_mod->add($data);
			if($result){
				$cate = M('help_cate')->field('id,pid')->where("id=".$data['cate_id'])->find();
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}else{
			$help_cate_mod = D('help_cate');
	    	$result = $help_cate_mod->order('sort_order ASC')->select();
	    	$cate_list = array();
	    	foreach ($result as $val) {
	    	    if ($val['pid']==0) {
	    	        $cate_list['parent'][$val['id']] = $val;
	    	    } else {
	    	        $cate_list['sub'][$val['pid']][] = $val;
	    	    }
	    	}
	    	$this->assign('cate_list',$cate_list);
	    	$this->display();
		}
	}

	function delete_attatch()
    {
    	$attatch_mod = D('attatch');
    	$help_mod = D('help');
    	$help_id = isset($_GET['id']) && intval($_GET['id']) ? intval($_GET['id']) : exit('0');
    	$aid = isset($_GET['aid']) && intval($_GET['aid']) ? intval($_GET['aid']) : exit('0');
		$help_info = $help_mod->where('id='.$help_id)->find();
    	$aid_arr = explode(',', $help_info['aid']);
    	foreach ($aid_arr as $key=>$val) {
    	    if ($val == $aid) {
    	        unset($aid_arr[$key]);
    	    }
    	}
    	$aids = implode(',', $aid_arr);
    	$help_mod->where('id='.$help_id)->save(array('aid'=>$aids));
    	echo '1';
    	exit;
    }

	function delete()
    {
		$help_mod = D('help');
		if((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_POST['id']) || empty($_POST['id']))) {
            $this->error('请选择要删除的资讯！');
		}
		if( isset($_POST['id'])&&is_array($_POST['id']) ){
			$cate_ids = implode(',',$_POST['id']);
			foreach( $_POST['id'] as $val ){
				$help = $help_mod->field("id,cate_id")->where("id=".$val)->find();
				$cate = M('help_cate')->field('id,pid')->where("id=".$help['cate_id'])->find();
				if( $cate['pid']!=0 ){
					M('help_cate')->where("id=".$cate['pid'])->setDec('help_nums');
					M('help_cate')->where("id=".$help['cate_id'])->setDec('help_nums');
				}else{
					M('help_cate')->where("id=".$help['cate_id'])->setDec('help_nums');
				}

			}
			$help_mod->delete($cate_ids);
		}else{
			$cate_id = intval($_GET['id']);
			$help = $help_mod->field("id,cate_id")->where("id=".$cate_id)->find();
			M('help_cate')->where("id=".$help['cate_id'])->setDec('help_nums');
		    $help_mod->where('id='.$cate_id)->delete();
		}
		$this->success(L('operation_success'));
    }

    private function _upload()
    {
    	import("ORG.Net.UploadFile");
        $upload = new UploadFile();
        //设置上传文件大小
        $upload->maxSize = 2097153;
        //$upload->allowExts = explode(',', 'jpg,gif,png,jpeg');
        $upload->savePath = WEBROOT.'uploadfile/news/';

        $upload->saveRule = uniqid;
        if (!$upload->upload()) {
            //捕获上传异常
            $this->error($upload->getErrorMsg());
        } else {
            //取得成功上传的文件信息
            $uploadList = $upload->getUploadFileInfo();
        }
        return $uploadList;
    }

	function sort_order()
    {
    	$help_mod = D('help');
		if (isset($_POST['listorders'])) {
            foreach ($_POST['listorders'] as $id=>$sort_order) {
            	$data['ordid'] = $sort_order;
                $help_mod->where('id='.$id)->save($data);
            }
            $this->success(L('operation_success'));
        }
        $this->error(L('operation_failure'));
    }

    //修改状态
	function status()
	{
		$help_mod = D('help');
		$id 	= intval($_REQUEST['id']);
		$type 	= trim($_REQUEST['type']);
		$sql 	= "update ".C('DB_PREFIX')."help set $type=($type+1)%2 where id='$id'";
		$res 	= $help_mod->execute($sql);
		$values = $help_mod->field("id,".$type)->where('id='.$id)->find();
		$this->ajaxReturn($values[$type]);
	}

}
?>