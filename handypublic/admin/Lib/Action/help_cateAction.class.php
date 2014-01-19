<?php

class help_cateAction extends baseAction {

    //�����б�
    function index() {
        $help_cate_mod = M('help_cate');
        $help_mod = D('help');
        $result = $help_cate_mod->order('sort_order ASC')->select();
        $help_cate_list = array();
        foreach ($result as $val) {
            if ($val['pid'] == 0) {
                $help_cate_list['parent'][$val['id']] = $val;
            } else {
                //$val['nums'] = $help_mod->where("cate_id=".$val['id'])->count();
                $help_cate_list['sub'][$val['pid']][] = $val;
            }
        }

        $this->assign('help_cate_list', $help_cate_list);
        $big_menu = array('javascript:art.dialog({id:\'add\',iframe:\'?m=help_cate&a=add\', title:\'' . L('add_cate') . '\', width:\'500\', height:\'400\', lock:true}, function(){var d = art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){art.dialog({id:\'add\'}).close()});void(0);', L('add_cate'));
        $this->assign('big_menu', $big_menu);
        $this->display();
    }

    //��ӷ�������
    function add() {
        if (isset($_POST['dosubmit'])) {
            $help_cate_mod = M('help_cate');
            if (false === $vo = $help_cate_mod->create()) {
                $this->error($help_cate_mod->error());
            }
            if ($vo['name'] == '') {
                $this->error('�������Ʋ���Ϊ��');
                exit;
            }
            $result = $help_cate_mod->where("name='" . $vo['name'] . "' AND pid='" . $vo['pid'] . "'")->count();
            if ($result != 0) {
                $this->error('�÷����Ѿ�����');
            }
            //���浱ǰ����
            $help_cate_id = $help_cate_mod->add();
            $this->success(L('operation_success'), '', '', 'add');
        } else {
            $help_cate_mod = D('help_cate');
            $result = $help_cate_mod->order('sort_order ASC')->select();
            $help_cate_list = array();
            foreach ($result as $val) {
                if ($val['pid'] == 0) {
                    $help_cate_list['parent'][$val['id']] = $val;
                } else {
                    //$help_cate_list['sub'][$val['pid']][] = $val;
                }
            }
            $this->assign('help_cate_list', $help_cate_list);
            $this->assign('show_header', false);
            $this->display();
        }
    }

    function delete() {
        if ((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_POST['id']) || empty($_POST['id']))) {
            $this->error('��ѡ��Ҫɾ���ķ��࣡');
        }
        $help_cate_mod = M('help_cate');
        if (isset($_POST['id']) && is_array($_POST['id'])) {
            $cate_ids = implode(',', $_POST['id']);
            $help_cate_mod->delete($cate_ids);
        } else {
            $cate_id = intval($_GET['id']);
            $help_cate_mod->delete($cate_id);
        }
        $this->success(L('operation_success'));
    }

    function edit() {
        if (isset($_POST['dosubmit'])) {
            $help_cate_mod = M('help_cate');

            $old_cate = $help_cate_mod->where('id=' . $_POST['id'])->find();
            //���Ʋ����ظ�
            if ($_POST['name'] != $old_cate['name']) {
                if ($this->_cate_exists($_POST['name'], $_POST['pid'], $_POST['id'])) {
                    $this->error('���������ظ���');
                    exit;
                }
            }
            //��ȡ�˷�������������¼�����id
            $vids = array();
            $children[] = $old_cate['id'];
            $vr = $help_cate_mod->where('pid=' . $old_cate['id'])->select();
            foreach ($vr as $val) {
                $children[] = $val['id'];
            }
            if (in_array($_POST['pid'], $children)) {
                $this->error('��ѡ����ϼ����಻���ǵ�ǰ������ߵ�ǰ������¼����࣡');
            }
            $vo = $help_cate_mod->create();
            $result = $help_cate_mod->save();
            if (false !== $result) {
                $this->success(L('operation_success'), '', '', 'edit');
            } else {
                $this->error(L('operation_failure'));
            }
        } else {
            $help_cate_mod = M('help_cate');
            if (isset($_GET['id'])) {
                $cate_id = isset($_GET['id']) && intval($_GET['id']) ? intval($_GET['id']) : $this->error(L('please_select') . L('help_name'));
            }
            $help_cate_info = $help_cate_mod->where('id=' . $cate_id)->find();
            $result = $help_cate_mod->order('sort_order ASC')->select();
            $cate_list = array();
            foreach ($result as $val) {
                if ($val['pid'] == 0) {
                    $cate_list['parent'][$val['id']] = $val;
                } else {
                    $cate_list['sub'][$val['pid']][] = $val;
                }
            }
            $this->assign('cate_list', $cate_list);
            $this->assign('help_cate_info', $help_cate_info);
            $this->assign('show_header', false);
            $this->display();
        }
    }

    private function _cate_exists($name, $pid, $id = 0) {
        $where = "name='" . $name . "' AND pid='" . $pid . "'";
        if ($id && intval($id)) {
            $where .= " AND id<>'" . $id . "'";
        }
        $result = M('help_cate')->where($where)->count();
        //echo(M('help_cate')->getLastSql());exit;
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function sort_order() {
        $help_cate_mod = M('help_cate');
        if (isset($_POST['listorders'])) {
            foreach ($_POST['listorders'] as $id => $sort_order) {
                $data['sort_order'] = $sort_order;
                $help_cate_mod->where('id=' . $id)->save($data);
            }
            $this->success(L('operation_success'));
        }
        $this->error(L('operation_failure'));
    }

    //�޸�״̬
    function status() {
        $help_cate_mod = D('help_cate');
        $id = intval($_REQUEST['id']);
        $type = trim($_REQUEST['type']);
        $sql = "update " . C('DB_PREFIX') . "help_cate set $type=($type+1)%2 where id='$id'";
        $res = $help_cate_mod->execute($sql);
        $values = $help_cate_mod->where('id=' . $id)->find();
        $this->ajaxReturn($values[$type]);
    }
}
?>