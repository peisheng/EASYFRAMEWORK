<?php

class article_cateAction extends baseAction {

    //�����б�
    function index() {
        $article_cate_mod = M('article_cate');
        $article_mod = D('article');
        $result = $article_cate_mod->order('sort_order ASC')->select();
        $article_cate_list = array();
        foreach ($result as $val) {
            if ($val['pid'] == 0) {
                $article_cate_list['parent'][$val['id']] = $val;
            } else {
                //$val['nums'] = $article_mod->where("cate_id=".$val['id'])->count();
                $article_cate_list['sub'][$val['pid']][] = $val;
            }
        }

        $this->assign('article_cate_list', $article_cate_list);
        $big_menu = array('javascript:art.dialog({id:\'add\',iframe:\'?m=article_cate&a=add\', title:\'' . L('add_cate') . '\', width:\'500\', height:\'400\', lock:true}, function(){var d = art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){art.dialog({id:\'add\'}).close()});void(0);', L('add_cate'));
        $this->assign('big_menu', $big_menu);
        $this->display();
    }

    //��ӷ�������
    function add() {
        if (isset($_POST['dosubmit'])) {
            $article_cate_mod = M('article_cate');
            if (false === $vo = $article_cate_mod->create()) {
                $this->error($article_cate_mod->error());
            }
            if ($vo['name'] == '') {
                $this->error('�������Ʋ���Ϊ��');
                exit;
            }
            $result = $article_cate_mod->where("name='" . $vo['name'] . "' AND pid='" . $vo['pid'] . "'")->count();
            if ($result != 0) {
                $this->error('�÷����Ѿ�����');
            }
            //���浱ǰ����
            $article_cate_id = $article_cate_mod->add();
            $this->success(L('operation_success'), '', '', 'add');
        } else {
            $article_cate_mod = D('article_cate');
            $result = $article_cate_mod->order('sort_order ASC')->select();
            $article_cate_list = array();
            foreach ($result as $val) {
                if ($val['pid'] == 0) {
                    $article_cate_list['parent'][$val['id']] = $val;
                } else {
                    $article_cate_list['sub'][$val['pid']][] = $val;
                }
            }
            $this->assign('article_cate_list', $article_cate_list);
            $this->assign('show_header', false);
            $this->display();
        }
    }

    function delete() {
        if ((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_POST['id']) || empty($_POST['id']))) {
            $this->error('��ѡ��Ҫɾ���ķ��࣡');
        }
        $article_cate_mod = M('article_cate');
        if (isset($_POST['id']) && is_array($_POST['id'])) {
            $cate_ids = implode(',', $_POST['id']);
            $article_cate_mod->delete($cate_ids);
        } else {
            $cate_id = intval($_GET['id']);
            $article_cate_mod->delete($cate_id);
        }
        $this->success(L('operation_success'));
    }

    function edit() {
        if (isset($_POST['dosubmit'])) {
            $article_cate_mod = M('article_cate');

            $old_cate = $article_cate_mod->where('id=' . $_POST['id'])->find();
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
            $vr = $article_cate_mod->where('pid=' . $old_cate['id'])->select();
            foreach ($vr as $val) {
                $children[] = $val['id'];
            }
            if (in_array($_POST['pid'], $children)) {
                $this->error('��ѡ����ϼ����಻���ǵ�ǰ������ߵ�ǰ������¼����࣡');
            }
            $vo = $article_cate_mod->create();
            $result = $article_cate_mod->save();
            if (false !== $result) {
                $this->success(L('operation_success'), '', '', 'edit');
            } else {
                $this->error(L('operation_failure'));
            }
        } else {
            $article_cate_mod = M('article_cate');
            if (isset($_GET['id'])) {
                $cate_id = isset($_GET['id']) && intval($_GET['id']) ? intval($_GET['id']) : $this->error(L('please_select') . L('article_name'));
            }
            $article_cate_info = $article_cate_mod->where('id=' . $cate_id)->find();
            $result = $article_cate_mod->order('sort_order ASC')->select();
            $cate_list = array();
            foreach ($result as $val) {
                if ($val['pid'] == 0) {
                    $cate_list['parent'][$val['id']] = $val;
                } else {
                    $cate_list['sub'][$val['pid']][] = $val;
                }
            }
            $this->assign('cate_list', $cate_list);
            $this->assign('article_cate_info', $article_cate_info);
            $this->assign('show_header', false);
            $this->display();
        }
    }

    private function _cate_exists($name, $pid, $id = 0) {
        $where = "name='" . $name . "' AND pid='" . $pid . "'";
        if ($id && intval($id)) {
            $where .= " AND id<>'" . $id . "'";
        }
        $result = M('article_cate')->where($where)->count();
        //echo(M('article_cate')->getLastSql());exit;
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function sort_order() {
        $article_cate_mod = M('article_cate');
        if (isset($_POST['listorders'])) {
            foreach ($_POST['listorders'] as $id => $sort_order) {
                $data['sort_order'] = $sort_order;
                $article_cate_mod->where('id=' . $id)->save($data);
            }
            $this->success(L('operation_success'));
        }
        $this->error(L('operation_failure'));
    }

    //�޸�״̬
    function status() {
        $article_cate_mod = D('article_cate');
        $id = intval($_REQUEST['id']);
        $type = trim($_REQUEST['type']);
        $sql = "update " . C('DB_PREFIX') . "article_cate set $type=($type+1)%2 where id='$id'";
        $res = $article_cate_mod->execute($sql);
        $values = $article_cate_mod->where('id=' . $id)->find();
        $this->ajaxReturn($values[$type]);
    }
}
?>