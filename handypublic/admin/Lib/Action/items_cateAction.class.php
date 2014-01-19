<?php

class items_cateAction extends baseAction
{
    public function _initialize()
    {
        parent::_initialize();
        $this->_mod = D('items_cate');
    }

    //�����б�
    function index()
    {
        $cate_list = $this->_mod->get_list();
        $this->assign('items_cate_list', $cate_list['sort_list']);

        $big_menu = array('javascript:art.dialog({id:\'add\',iframe:\'?m=items_cate&a=add\', title:\'������\', width:\'690\', height:\'400\', lock:true}, function(){var d = art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){art.dialog({id:\'add\'}).close()});void(0);', '��ӱ�ǩ');
        $this->assign('big_menu',$big_menu);
		
        $this->display();
    }

    //��ӷ�������
    function add()
    {
        if(isset($_POST['dosubmit'])){
            $items_cate_mod = M('items_cate');
            if( false === $vo = $items_cate_mod->create() ){
                $this->error( $items_cate_mod->error() );
            }
            if($vo['name']==''){
                $this->error('�������Ʋ���Ϊ��');
            }
            $result = $items_cate_mod->where("name='".$vo['name']."' AND pid='".$vo['pid']."'")->count();
            if($result != 0){
                $this->error('�÷����Ѿ�����');
            }

            if ($_FILES['img']['name'] != '') {
                $upload_list=$this->_upload($_FILES['img']);
                $vo['img'] = $upload_list['0']['savename'];
            }
            //���浱ǰ����
            $items_cate_id = $items_cate_mod->add($vo);
            //$this->success('��ӳɹ�',U('items_cate/add'),1);
            $this->success(L('��ӳɹ�'), '', '', 'add');
			
        }else{
        $cate_list = $this->_mod->get_list();
        $this->assign('items_cate_list',$cate_list['sort_list']);
        $this->assign('show_header', false);
        $this->display('edit');
		}
    }

    function delete()
    {
        if((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_POST['id']) || empty($_POST['id']))) {
            $this->error('��ѡ��Ҫɾ���ķ��࣡');
        }
        $items_cate_mod = M('items_cate');
        if (isset($_POST['id']) && is_array($_POST['id'])) {
            /*
            foreach($_POST['id'] as $val){
            @unlink(ROOT_PATH."/data/items_cate/".$items_cate_mod->where('id='.$val)->getField('img'));
            }
            */
            $items_cate_mod->delete(implode(',', $_POST['id']));
        } else {
            $items_cate_id = intval($_GET['id']);
            /*
            @unlink(ROOT_PATH."/data/items_cate/".$items_cate_mod->where('id='.$items_cate_id)->getField('img'));
            */
            $items_cate_mod->delete($items_cate_id);
        }

        $this->success(L('operation_success'));
    }

    function edit()
    {
        if(isset($_POST['dosubmit'])){
            $items_cate_mod = M('items_cate');

            $old_items_cate = $items_cate_mod->where('id='.$_POST['id'])->find();
            //���Ʋ����ظ�
            if ($_POST['name'] != $old_items_cate['name']) {
                if ($this->_items_cate_exists($_POST['name'], $_POST['pid'], $_POST['id'])) {
                    $this->error('���������ظ���');
                }
            }

            //��ȡ�˷�������������¼�����id
            $vids = array();
            $children[] = $old_items_cate['id'];
            $vr = $items_cate_mod->where('pid='.$old_items_cate['id'])->select();
            foreach ($vr as $val) {
                $children[] = $val['id'];
            }
            if (in_array($_POST['pid'], $children)) {
                $this->error('��ѡ����ϼ����಻���ǵ�ǰ������ߵ�ǰ������¼����࣡');
            }

            $vo = $items_cate_mod->create();
            if ($_FILES['img']['name'] != '') {
                $upload_list=$this->_upload($_FILES['img']);
                $vo['img'] = $upload_list['0']['savename'];
                //ɾȥ��ͼƬ
                /*
                @unlink(ROOT_PATH."/data/items_cate/".$old_items_cate['img']);
                */
            }

            if( !isset($_POST['is_hots']) ){
                $vo['is_hots'] = 0;
            }
            if( !isset($_POST['status']) ){
                $vo['status'] = 0;
            }
            $result = $items_cate_mod->save($vo);
            if(false !== $result){
                $this->success(L('�޸ĳɹ�'), '', '', 'edit');
                //$this->success('�޸ĳɹ�',U('items_cate/index'),1);
            }else{
                //$this->error('�޸�ʧ��',U('items_cate/index'));
                $this->success(L('�޸�ʧ��'), '', '', 'edit');
            }
        }else{
			$cate_list = $this->_mod->get_list();
			$this->assign('items_cate_list', $cate_list['sort_list']);
			$items_cate_mod = M('items_cate');
			if( isset($_GET['id']) ){
				$items_cate_id = isset($_GET['id']) && intval($_GET['id']) ? intval($_GET['id']) : $this->error(L('please_select').L('article_name'));
			}
			$items_cate_info = $items_cate_mod->where('id='.$items_cate_id)->find();
	
			$this->assign('items_cate_info',$items_cate_info);
			$this->assign('show_header', false);
			$this->display();
		}
    }

    private function _items_cate_exists($name, $pid, $id=0)
    {
        $result = M('items_cate')->where("name='".$name."' AND pid='".$pid."' AND id<>'".$id."'")->count();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function sort_order()
    {
        $items_cate_mod = M('items_cate');
        if (isset($_POST['listorders'])) {
            foreach ($_POST['listorders'] as $id=>$sort_order) {
                $data['ordid'] = $sort_order;
                $items_cate_mod->where('id='.$id)->save($data);
            }
            $this->success(L('operation_success'));
        }else{
            $this->error(L('operation_failure'));
        }
    }

    private function _upload($imgage, $path = '', $isThumb = false) {
        import("ORG.Net.UploadFile");
        $upload = new UploadFile();
        //�����ϴ��ļ���С
        $upload->maxSize = 2097153;
        $upload->allowExts = explode(',', 'jpg,gif,png,jpeg');
        $upload->saveRule = uniqid;
        if (empty($savePath)) {
            $upload->savePath =ROOT_PATH.'/data/items_cate/';
        } else {
            $upload->savePath = $path;
        }

        if (!$upload->uploadOne($imgage)) {
            //�����ϴ��쳣
            $this->error($upload->getErrorMsg());
        } else {
            //ȡ�óɹ��ϴ����ļ���Ϣ
            $uploadList = $upload->getUploadFileInfo();
        }
        return $uploadList;
    }
	
	
}
?>