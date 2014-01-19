<?php



class itemsAction extends baseAction {

    public function index() {
        $items_mod = D('items');
        $items_cate_mod = D('items_cate');
        //����
        $where = '1=1';
        $keyword = isset($_GET['keyword']) && trim($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $cate_id = isset($_GET['cate_id']) && intval($_GET['cate_id']) ? intval($_GET['cate_id']) : '';
        $time_start = isset($_GET['time_start']) && trim($_GET['time_start']) ? trim($_GET['time_start']) : '';
        $time_end = isset($_GET['time_end']) && trim($_GET['time_end']) ? trim($_GET['time_end']) : '';
        $is_index = isset($_GET['is_index']) ? intval($_GET['is_index']) : '-1';
        $status = isset($_GET['status']) ? intval($_GET['status']) : '-1';
        $order = isset($_GET['order']) && trim($_GET['order']) ? trim($_GET['order']) : '';
        $sort = isset($_GET['sort']) && trim($_GET['sort']) ? trim($_GET['sort']) : 'desc';
        if ($keyword) {
            $where .= " AND title LIKE '%" . $keyword . "%'";
            $this->assign('keyword', $keyword);
        }
        if ($cate_id) {
            $where .= " AND cid=" . $cate_id;
            $this->assign('cate_id', $cate_id);
        }
        if ($time_start) {
            $time_start_int = strtotime($time_start);
            $where .= " AND add_time>='" . $time_start_int . "'";
            $this->assign('time_start', $time_start);
        }
        if ($time_end) {
            $time_end_int = strtotime($time_end);
            $where .= " AND add_time<='" . $time_end_int . "'";
            $this->assign('time_end', $time_end);
        }
        $is_index >= 0 && $where .= " AND is_index=" . $is_index;
        $status >= 0 && $where .= " AND status=" . $status;
		
        $this->assign('is_index', $is_index);
        $this->assign('status', $status);
        //����
        $order_str = 'add_time desc';
        if ($order) {
            $order_str = $order . ' ' . $sort;
        }
        import("ORG.Util.Page");
        $count = $items_mod->where($where)->count();
        $p = new Page($count, 20);
        $items_list = $items_mod->where($where)->relation('items_site')->limit($p->firstRow . ',' . $p->listRows)->order($order_str)->select();

        $key = 1;
        foreach ($items_list as $k => $val) {
            $items_list[$k]['key'] = ++$p->firstRow;
            $items_list[$k]['items_cate'] = $items_cate_mod->field('name')->where('id=' . $val['cid'])->find();
			
			if(substr($items_list[$k]['item_key'],0,6)=="taobao"){
				$items_list[$k]['site']="<font color=#FF0000>�Ա�</font>";
			}
			if(substr($items_list[$k]['item_key'],0,6)=="paipai"){
				$items_list[$k]['site']="<font color=#CC00FF>����</font>";
			}
				$items_list[$k]['item_id']=substr($items_list[$k]['item_key'],7);
			
        }

        $page = $p->show();
        $this->assign('page', $page);

        $cate_list = $items_cate_mod->get_list();
        $this->assign('cate_list', $cate_list['sort_list']);

        $this->assign('items_list', $items_list);
        $this->assign('order', $order);
        if ($sort == 'desc') {
            $sort = 'asc';
        } else {
            $sort = 'desc';
        }
        $this->assign('sort', $sort);
        $this->display();
    }
	public function getarrayTaoBao(&$count){
		global $userpiddp;
		global $Taoapi;
		
		
		$page = var_request("p","1");
		$page = $page>99?99:$page;	

		
		
		$param = array();
		$param["showtype"] = intval(var_request("showtype",$CustomSetFieldValue["ProlistType"]));
		$param["start_price"] = intval(var_request("start_price",""));
		$param["end_price"] = intval(var_request("end_price",""));
		$param["keyword"] = htmlspecialchars(urldecode(var_request("keyword","�Ƽ�")));
		$param["sort"] = htmlspecialchars(var_request("sort","default"),ENT_QUOTES);
		$param["page_size"] = 40;
		$param["page_no"] = $pages;
		$param["start"] = ($page-1)*52;
		
		$taobaokeItem = GetTaoZheKou($param,$count,$sortarr,$typearr);
		
				if($count>400) $count=400;

		
		if($count>0 && isset($taobaokeItem)){
		//���˱���
			for($i = 0; $i < count($taobaokeItem); $i++) {

				$taobaokeItem[$i]["pic_url"] = $taobaokeItem[$i]["pic_path"];
				
				$taobaokeItem[$i]["num_iid"] = $taobaokeItem[$i]["item_id"];
				if($taobaokeItem[$i]["price_with_rate"] != "") $taobaokeItem[$i]["price"].=" �ۿۼۣ�".$taobaokeItem[$i]["price_with_rate"];
				
				
			}
		}else{
			$taobaokeItem = null;
			$errstr = $TaoapiItems;
			return array();
			$this->error(L(' �����Ա��ӿ�ʧ�ܣ��Ա���ʾ��'.loopArray($errstr)."��������д��ȷ��APPKEY��"));
			exit;
		}
		
		return $taobaokeItem ;
	}
    public function taoapiadd() {
		global $userpid;
		global $Taoapi;
		
		
		
		$keyword = var_request("keyword","�Ƽ�");
		$cate_id = var_request("cate_id","0");
		$sort = var_request("sort","commissionNum_desc");
		$types = var_request("types","2");
		$start_price = intval(var_request("start_price",""));
		$end_price = intval(var_request("end_price",""));
		
		$page = var_request("p","1");
		if($types=="2"){
		$page = $page>99?99:$page;	
		}else{
		$page = $page>10?10:$page;	
		}
		
		$pagenum = $page;
		$count = 0 ;
		$taobaokeItem = $this->getarrayTaoBao($count); 



		
        import("ORG.Util.Page");

		if($count>400) $count=400;

        $p = new Page($count, 40);
		
		

        $page = $p->show();
        $this->assign('page', $page);



        $items_cate_mod = D('items_cate');
        
        $first_cates_list = $items_cate_mod->field('id,name')->where(array('pid' => 0))->order('ordid DESC')->select();
        $this->assign('first_cates_list', $first_cates_list);
		
        $this->assign('items_list', $taobaokeItem);
        $this->assign('order', $order);
        $this->assign('sort', $sort);
        $this->assign('sort', $sort);
        $this->assign('keyword', $keyword);
        $this->assign('pagenum', $pagenum);
        $this->assign('start_price', $start_price);
        $this->assign('end_price', $end_price);
        $this->assign('userpid', $userpid);
        $this->assign('types', $types);
		
        $this->display();
    }
    public function taoapiaddok() {
        if (isset($_POST['dosubmit'])) {
			global $userpiddp;
			global $Taoapi;
			
			$ids = $_POST["id"];
			if (isset($ids) == "") {
				$this->error('��ѡ�����');
				exit;
			}
			$items_mod = D('items');
			$items_cate_mod = D('items_cate');
			$items_site_mod = D('items_site');
			$items_tags_mod = D('items_tags');
			$items_tags_item_mod = D('items_tags_item');
			
			$updatenum = 0;
			$addnum = 0;
			$errornum = 0;


		$keyword = var_request("keyword","�Ƽ�");
		$cate_id = var_request("cate_id","0");
		$sort = var_request("sort","commissionNum_desc");
		$types = var_request("types","2");
		$start_price = intval(var_request("start_price",""));
		$end_price = intval(var_request("end_price",""));
		
		$page = var_request("p","1");
		if($types=="2"){
		$page = $page>99?99:$page;	
		}else{
		$page = $page>10?10:$page;	
		}
		
		$count = 0;
		$taobaokeItem = $this->getarrayTaoBao($count);

			
			
			foreach($taobaokeItem as $TaoapiItem){
				
				
				$iid = $TaoapiItem[num_iid];
				if(in_array($iid,$ids)) {
				
				
				$data = array();


                if (is_array($TaoapiItem)) {
					$result = $TaoapiItem;
					
                    //$data['info'] = $result['desc'];
                    $data['title'] = $result['title'];
                    $data['url'] = "";
					$data['item_key']="taobao_".$iid;
					$data['price']=$result['price'];
					
					if($result['coupon_price']!=""){
						$data['price']=$result['coupon_price'];
					}
					
					$data['hits'] =  rand(100,999);
					$data['likes'] =  rand(1,12);
					$data['img'] = $result['pic_url'];
					$data['simg'] = $result['pic_url'];
					$data['bimg'] = $result['pic_url'];
					
					
					
						$data['add_time'] = time();
						$data['last_time'] = time();
						if (($_POST['cid'] != "")&&($_POST['scid'] != "")&&($_POST['pcid'] != "")) {
							$data['cid']    = $_POST['cid'];
							$data['level']  = "3";
						} elseif (($_POST['scid'] != "")&&($_POST['pcid'] != "")) {
							$data['cid'] = $_POST['scid'];
							$data['level'] = "2";               
						}elseif ($_POST['pcid'] != "") {
							$data['cid'] = $_POST['pcid'];
							$data['level'] = "1";
						}elseif ($_POST['pcid'] == "") {
							$this->error('��ѡ�����');
						}
						
			
						//��Դ
						$author = isset($_POST['author']) ? $_POST['author'] : '';
						$data['sid'] = $items_site_mod->where("alias='taobao'")->getField('id');
						
						$item_id = $items_mod->where("item_key='" . $data['item_key'] . "'")->getField('id');
						
						if ($item_id) {
							$items_mod->where('id=' . $item_id)->save($data);
							$updatenum++;
						} else {
							$new_item_id = $items_mod->add($data);
							$addnum++;
						}
						if ($new_item_id) {
							//�����ǩ
							$tags = isset($_POST['tags']) && trim($_POST['tags']) ? trim($_POST['tags']) : '';
							if ($tags) {
								$tags_arr = explode(' ', $tags);
								$tags_arr = array_unique($tags_arr);
								foreach ($tags_arr as $tag) {
									$isset_id = $items_tags_mod->where("name='" . $tag . "'")->getField('id');
									if ($isset_id) {
										$items_tags_mod->where('id=' . $isset_id)->setInc('item_nums');
										$items_tags_item_mod->add(array(
											'item_id' => $new_item_id,
											'tag_id' => $isset_id
										));
									} else {
										$tag_id = $items_tags_mod->add(array(
											'name' => $tag
												));
										$items_tags_item_mod->add(array(
											'item_id' => $new_item_id,
											'tag_id' => $tag_id
										));
									}
								}
							}
						}
					//$items_cate_mod->setInc('item_nums', 1);
					$items_cate_mod->where('id=' . $data['cid'])->UpdateNum($data['cid']);
						
				
				}else{
				$errornum++;	
				}
				
			}
			}
			
			
			$this->success(L(' �ɼ��ɹ������'.$addnum."����Ʒ������".$updatenum."����Ʒ,ʧ��".$errornum."����Ʒ��"));

			
		}
		
		
	}
	
    public function edit() {
        $items_mod = D('items');
        $items_cate_mod = D('items_cate');
        $items_site_mod = D('items_site');
        $items_tags_mod = D('items_tags');
        $items_pics_mod = D('items_pics');
        $items_tags_item_mod = D('items_tags_item');

        $items_id = isset($_REQUEST['id']) && intval($_REQUEST['id']) ? intval($_REQUEST['id']) : $this->error(L('please_select'));
        if (isset($_POST['dosubmit'])) {
            $data = $items_mod->create();
            
            $data['last_time'] = time();
            if (($_POST['cid'] != "")&&($_POST['scid'] != "")&&($_POST['pcid'] != "")) {
                $data['cid']    = $_POST['cid'];
                $data['level']  = "3";
            } elseif (($_POST['scid'] != "")&&($_POST['pcid'] != "")) {
                $data['cid'] = $_POST['scid'];
                $data['level'] = "2";               
            }elseif ($_POST['pcid'] != "") {
                $data['cid'] = $_POST['pcid'];
                $data['level'] = "1";
            }elseif ($_POST['pcid'] == "") {
                $this->error('��ѡ�����');
            }

            if ($_FILES['img']['name'] != '') {
                $upload_list = $this->_upload($_FILES['img']);
                $data['simg'] = ROOTROAD . '/uploadfile/' . date("Y-m-d") . '/s_' . $upload_list['0']['savename'];
                $data['img'] = ROOTROAD . '/uploadfile/' . date("Y-m-d") . '/m_' . $upload_list['0']['savename'];
                $data['bimg'] = ROOTROAD . '/uploadfile/' . date("Y-m-d") . '/b_' . $upload_list['0']['savename'];
            }
            $result = $items_mod->save($data);

            //�����ǩ
            $items_tags_item_mod->where("item_id in(" . $items_id . ")")->delete();
            $tags = isset($_POST['tags']) && trim($_POST['tags']) ? trim($_POST['tags']) : '';
            if ($tags) {
                $tags_arr = explode(' ', $tags);
                $tags_arr = array_unique($tags_arr);
                foreach ($tags_arr as $tag) {
                    $isset_id = $items_tags_mod->where("name='" . $tag . "'")->getField('id');
                    if ($isset_id) {
                        $items_tags_mod->where('id=' . $isset_id)->setInc('item_nums');
                        $items_tags_item_mod->add(array(
                            'item_id' => $items_id,
                            'tag_id' => $isset_id
                        ));
                    } else {
                        $tag_id = $items_tags_mod->add(array(
                            'name' => $tag
                                ));
                        $items_tags_item_mod->add(array(
                            'item_id' => $items_id,
                            'tag_id' => $tag_id
                        ));
                    }
                }
            }

            //����ϴ�
            if ($_FILES['pic']['name'][0] != '') {
                $pic_list = array();
                $_upload_list = $this->_upload($_FILES['pic']);
                foreach ($_upload_list as $_img) {
                    $pic_list[] = array(
                        'item_id' => $data['id'],
                        'add_time' => time(),
                        'url' => ROOTROAD . "/uploadfile/" . date("Y-m-d") . "/b_" . $_img['savename'],
                    );
                }
                $items_pics_mod->addAll($pic_list);
            }
            if (false !== $result) {
                $this->success(L('operation_success'), U('items/index'));
            } else {
                $this->error(L('operation_failure'));
            }
        }
        $items_info = $items_mod->relation('items_tags')->where('id=' . $items_id)->find();
        foreach ($items_info['items_tags'] as $tag) {
            $tag_arr[] = $tag['name'];
        }
        $items_info['tags'] = implode(' ', $tag_arr);
        $site_list = $items_site_mod->field('id,name,alias')->select();

        //��Ʒ���
        $pic_list = $items_pics_mod->where(array('item_id' => $items_id))->select();
        $this->assign('pic_list', $pic_list);

        //��Ʒ�������ϼ�����
        $level = $items_info['level'];
        $str_cid = $items_info['cid'];
        if ($level == "3") {
            //��������
            $three_id = $str_cid;
            $cates = $items_cate_mod->field('id,pid')->where(array('id' => $three_id))->find();
            $second_id = $cates['pid'];
            $cates = $items_cate_mod->field('id,pid')->where(array('id' => $second_id))->find();
            $first_id = $cates['pid'];
        } elseif ($level == "2") {
            //��������
            $three_id = "";
            $second_id = $str_cid;
            $cates = $items_cate_mod->field('id,pid')->where(array('id' => $second_id))->find();
            $first_id = $cates['pid'];
        } else {
            //һ������
            $three_id   = "";
            $second_id  = "";
            $first_id   = $str_cid;
        }
        $this->assign('first_id', $first_id);
        $this->assign('second_id', $second_id);
        $this->assign('three_id', $three_id);

        $first_cates_list = $items_cate_mod->field('id,name')->where(array('pid' => 0))->order('ordid DESC')->select();
        $this->assign('first_cates_list', $first_cates_list);
        
        $second_cates_list = $items_cate_mod->field('id,name')->where(array('pid' => $first_id))->select();
        $this->assign('second_cates_list', $second_cates_list);
        $three_cates_list = $items_cate_mod->field('id,name')->where(array('pid' => $second_id))->select();
        $this->assign('three_cates_list', $three_cates_list);

        $this->assign('site_list', $site_list);
        $this->assign('items', $items_info);
        $this->display();
    }

    public function collect_item() {
        $itemcollect_mod = D('itemcollect');
        $items_cate_mod = D('items_cate');
        $items_tags_mod = D('items_tags');
		
		

		
        $url = isset($_REQUEST['url']) ? $_REQUEST['url'] : '';
		
/*		$url="http://item.taobao.com/item.htm?spm=a1z10.1.w4004-2307920639.2.U0f0ez&id=15076208400";
		$url="http://auction1.paipai.com/8456F632000000000401000024F3DB9C";
		$url="http://auction1.paipai.com/4C98357500000000040100000F6C5FF3.3000?pps=etg.0_43109_0_0&outinfo=&outerchn=43109&PTAG=10076.11.1";
*/        !$url && $this->ajaxReturn('', '', 0);
		
        $url = urldecode($url);


		$data = GetUrlProduct($url);
		
		if(!is_array($data)){
			$data = array();	
		}
		
        $tags = $items_tags_mod->get_tags_by_title($data['item']['title']);
		

        //�Զ�����
        $data['item']['cid'] = $items_cate_mod->get_cid_by_tags($tags);
        $data['item']['tags'] = implode(' ', $tags);
        $data['item']['volume'] = rand(2, 2000);
        $data['item']['hits'] = rand(2, 2000);
		$return = array();
		$return["data"] = $data;
        $this->ajaxReturn($return);
    }

    public function add() {
        $items_mod = D('items');
        $items_cate_mod = D('items_cate');
        $items_site_mod = D('items_site');
        $items_tags_mod = D('items_tags');
        $items_tags_item_mod = D('items_tags_item');
		
        if (isset($_POST['dosubmit'])) {
            if ($_POST['title'] == '') {
                $this->error('����д��Ʒ����');
            }
            if (false === $data = $items_mod->create()) {
                $this->error($items_mod->error());
            }
            $data['add_time'] = time();
            $data['last_time'] = time();
            if (($_POST['cid'] != "")&&($_POST['scid'] != "")&&($_POST['pcid'] != "")) {
                $data['cid']    = $_POST['cid'];
                $data['level']  = "3";
            } elseif (($_POST['scid'] != "")&&($_POST['pcid'] != "")) {
                $data['cid'] = $_POST['scid'];
                $data['level'] = "2";               
            }elseif ($_POST['pcid'] != "") {
                $data['cid'] = $_POST['pcid'];
                $data['level'] = "1";
            }elseif ($_POST['pcid'] == "") {
                $this->error('��ѡ�����');
            }
            
            $data['img'] = $_POST['input_img'];
            $data['simg'] = $_POST['input_img'];
            $data['bimg'] = $_POST['input_img'];

            //��Դ
            $author = isset($_POST['author']) ? $_POST['author'] : '';
            $data['sid'] = 1;
            $item_id = $items_mod->where("item_key='" . $data['item_key'] . "'")->getField('id');
            if ($item_id) {
                $items_mod->where('id=' . $item_id)->save($data);
                $this->success(L('operation_success')."1");
            } else {
                $new_item_id = $items_mod->add($data);
            }
            if ($new_item_id) {
                //�����ǩ
                $tags = isset($_POST['tags']) && trim($_POST['tags']) ? trim($_POST['tags']) : '';
                if ($tags) {
                    $tags_arr = explode(' ', $tags);
                    $tags_arr = array_unique($tags_arr);
                    foreach ($tags_arr as $tag) {
                        $isset_id = $items_tags_mod->where("name='" . $tag . "'")->getField('id');
                        if ($isset_id) {
                            $items_tags_mod->where('id=' . $isset_id)->setInc('item_nums');
                            $items_tags_item_mod->add(array(
                                'item_id' => $new_item_id,
                                'tag_id' => $isset_id
                            ));
                        } else {
                            $tag_id = $items_tags_mod->add(array(
                                'name' => $tag
                                    ));
                            $items_tags_item_mod->add(array(
                                'item_id' => $new_item_id,
                                'tag_id' => $tag_id
                            ));
                        }
                    }
                }
                $items_cate_mod->setInc('item_nums', 1);
                $this->success(L('operation_success')."2");
            } else {
                $this->error(L('operation_failure')."3");
            }
        }

        $site_list = $items_site_mod->field('id,name,alias')->select();

        //��Ʒ�������ϼ�����
        $item_cate_first_list = $items_cate_mod->field('id,name')->where(array('pid' => 0))->order('ordid DESC')->select();
        $this->assign('first_cates_list', $item_cate_first_list);

        $this->assign('site_list', $site_list);
        $this->display();
    }

    public function handel_item() {
        $items_mod = D('items');
        $items_cate_mod = D('items_cate');
        $items_site_mod = D('items_site');
        $items_tags_mod = D('items_tags');
        $items_pics_mod = D('items_pics');
        $items_tags_item_mod = D('items_tags_item');
        if (isset($_POST['dosubmit'])) {
            if ($_POST['title'] == '') {
                $this->error('����д��Ʒ����');
            }
            if (false === $data = $items_mod->create()) {
                $this->error($items_mod->error());
            }
            $data['add_time'] = time();
            $data['last_time'] = time();
            if (($_POST['cid'] != "")&&($_POST['scid'] != "")&&($_POST['pcid'] != "")) {
                $data['cid']    = $_POST['cid'];
                $data['level']  = "3";
            } elseif (($_POST['scid'] != "")&&($_POST['pcid'] != "")) {
                $data['cid'] = $_POST['scid'];
                $data['level'] = "2";               
            }elseif ($_POST['pcid'] != "") {
                $data['cid'] = $_POST['pcid'];
                $data['level'] = "1";
            }elseif ($_POST['pcid'] == "") {
                $this->error('��ѡ�����');
            }

            if ($_FILES['img']['name'] != '') {
                $upload_list = $this->_upload($_FILES['img']);

                $data['simg'] = ROOTROAD . '/uploadfile/' . date("Y-m-d") . '/s_' . $upload_list['0']['savename'];
                $data['img'] = ROOTROAD . '/uploadfile/' . date("Y-m-d") . '/m_' . $upload_list['0']['savename'];
                $data['bimg'] = ROOTROAD . '/uploadfile/' . date("Y-m-d") . '/b_' . $upload_list['0']['savename'];


                //$data['img'] = $data['simg'] = $data['bimg'] = $this->site_root . 'data/items/m_' . $upload_list['0']['savename'];
            } else {
                $this->error('��ƷͼƬ����Ϊ��');
            }

            $data['item_key'] = 'handel_' . time();
            //��Դ
            $author = 'handel';
            $data['sid'] = 1;
            $item_id = $items_mod->where("item_key='" . $data['item_key'] . "'")->getField('id');
            if ($item_id) {
                $items_mod->where('id=' . $item_id)->save($data);
                $this->success(L('operation_success'));
            } else {
                $new_item_id = $items_mod->add($data);
            }
            if ($new_item_id) {
                //����ϴ�
                if ($_FILES['pic']['name'][0] != '') {
                    $pic_list = array();
                    $_upload_list = $this->_upload($_FILES['pic']);

                    foreach ($_upload_list as $_img) {
                        $pic_list[] = array(
                            'item_id' => $new_item_id,
                            'add_time' => time(),
                            'url' => ROOTROAD . "/uploadfile/" . date("Y-m-d") . "/b_" . $_img['savename'],
                        );
                    }
                    $items_pics_mod->addAll($pic_list);
                }

                //�����ǩ
                $tags = isset($_POST['tags']) && trim($_POST['tags']) ? trim($_POST['tags']) : '';
                if ($tags) {
                    $tags_arr = explode(' ', $tags);
                    $tags_arr = array_unique($tags_arr);
                    foreach ($tags_arr as $tag) {
                        $isset_id = $items_tags_mod->where("name='" . $tag . "'")->getField('id');
                        if ($isset_id) {
                            $items_tags_mod->where('id=' . $isset_id)->setInc('item_nums');
                            $items_tags_item_mod->add(array(
                                'item_id' => $new_item_id,
                                'tag_id' => $isset_id
                            ));
                        } else {
                            $tag_id = $items_tags_mod->add(array(
                                'name' => $tag
                                    ));
                            $items_tags_item_mod->add(array(
                                'item_id' => $new_item_id,
                                'tag_id' => $tag_id
                            ));
                        }
                    }
                }
                $items_cate_mod->setInc('item_nums', 1);
                $this->success(L('operation_success'));
            } else {
                $this->error(L('operation_failure'));
            }
        }

        $site_list = $items_site_mod->field('id,name,alias')->select();

        //��Ʒ�������ϼ�����
        $first_cates_list = $items_cate_mod->field('id,name')->where(array('pid' => 0 ))->order('ordid DESC')->select();
        $this->assign('first_cates_list', $first_cates_list);

        $this->assign('site_list', $site_list);
        $this->display();
    }

    function get_tags() {
        $data = array();
        $items_tags_mod = D('items_tags');
        $title = $this->_get('title', 'trim', '');
        $tags = $items_tags_mod->get_tags_by_title($title);
        $data['tags'] = implode(' ', $tags);
        $this->ajaxReturn($data['tags']);
    }

    function update() {
        $items_mod = D('items');

        if ((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_POST['id']) || empty($_POST['id']))) {
            $this->error('��ѡ��Ҫ���µ���Ʒ��');
        }
        if (isset($_REQUEST['id'])) {
            $ids = is_array($_REQUEST['id']) ? implode(',', $_REQUEST['id']) : intval($_REQUEST['id']);
            $res = $items_mod->where("id in (" . $ids . ")")->setField('last_time', time());
            //var_dump($res);
        }
        $this->success(L('operation_success'));
    }

    function delete() {

        $items_mod = D('items');
        $items_cate_mod = D('items_cate');
        $items_likes_mod = D('items_likes');
        $items_pics_mod = D('items_pics');
        $items_tags_mod = D('items_tags_item');
        $items_comments_mod = D('user_comments');

        if ((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_POST['id']) || empty($_POST['id']))) {
            $this->error('��ѡ��Ҫɾ������Ʒ��');
        }
        if (isset($_REQUEST['id'])) {
            $ids = is_array($_REQUEST['id']) ? implode(',', $_REQUEST['id']) : intval($_REQUEST['id']);
            $items_mod->delete($ids);
            $items_likes_mod->where("items_id in(" . $ids . ")")->delete();
            $items_pics_mod->where("item_id in(" . $ids . ")")->delete();
            $items_tags_mod->where("item_id in(" . $ids . ")")->delete();
            $items_comments_mod->where("pid in(" . $ids . ")")->delete();
        }
        //������Ʒ���������
        $items_nums = $items_mod->field('cid,count(id) as cate_nums')->group('cid')->select();
        foreach ($items_nums as $val) {
            $items_cate_mod->save(array('id' => $val['cid'], 'item_nums' => $val['cate_nums']));
        }

        $this->success(L('operation_success'));
    }

    private function _upload($imgage, $path = '', $isThumb = true) {
        import("ORG.Net.UploadFile");
        $upload = new UploadFile();
        //�����ϴ��ļ���С
        $upload->maxSize = 2097153;
        $upload->allowExts = explode(',', 'jpg,gif,png,jpeg');

        if (empty($path)) {
            $upload->savePath = WEBROOT.'uploadfile/' . date("Y-m-d") . "/";
        } else {
            $upload->savePath = $path;
        }
        if ($isThumb === true) {
            $upload->thumb = true;
            $upload->imageClassPath = 'ORG.Util.Image';
            $upload->thumbPrefix = 'b_,m_,s_';
            $upload->thumbMaxWidth = '450,210,64';
            //��������ͼ���߶�
            $upload->thumbMaxHeight = '5000,3000,1000';
            $upload->saveRule = uniqid;
            $upload->thumbRemoveOrigin = false;
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

    function delete_pic() {
        $items_pics_mod = D('items_pics');
        $item_id = isset($_GET['item_id']) && intval($_GET['item_id']) ? intval($_GET['item_id']) : exit('0');
        $id = isset($_GET['id']) && intval($_GET['id']) ? intval($_GET['id']) : exit('0');
        $items_pics_mod->where(array('id' => $id, 'item_id' => $item_id))->delete();
        echo '1';
        exit;
    }

    function likes() {
        $items_mod = D('items');

        if ((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_POST['id']) || empty($_POST['id']))) {
            $this->error('��ѡ����Ʒ��');
        }
        if (isset($_REQUEST['id'])) {
            $likes = trim($_REQUEST['likes']);
            $id = is_array($_REQUEST['id']) ? implode(',', $_REQUEST['id']) : intval($_REQUEST['id']);
            $items_mod->where("id='" . $id . "'")->setField('likes', $likes);
        }
        $this->success(L('operation_success'));
    }

    function status() {
        $id = intval($_REQUEST['id']);
        $type = trim($_REQUEST['type']);
        $items_mod = D('items');
        $res = $items_mod->where('id=' . $id)->setField($type, array('exp', "(" . $type . "+1)%2"));
        $values = $items_mod->where('id=' . $id)->getField($type);
        $this->ajaxReturn($values[$type]);
    }

    function batch_add() {
        $items_cate_mod = D('items_cate');
        
        $first_cates_list = $items_cate_mod->field('id,name')->where(array('pid' => 0))->order('ordid DESC')->select();
        $this->assign('first_cates_list', $first_cates_list);

        if (isset($_POST['dosubmit'])) {
            $data = array();
            $success_update_list = '';
            $success_insert_list = '';
            $fail_list = '';

            $items_mod = M('items');
            $items_site_mod = D('items_site');
            $itemcollect_mod = D('itemcollect');
            $items_tags_mod = D('items_tags');
            $items_tags_item_mod = D('items_tags_item');
            
            $urls = preg_split('/[\r\n]/', $_POST['urls']);
            $items_nums = 0;
            foreach ($urls as $url) {
                $url = urldecode(trim($url));
				
				$result = GetUrlProduct($url);
				
				if(!is_array($result)){
					$result = array();	
				}
				
				
                if (is_array($result)) {
                    $result = $result['item'];
                    
                    $data['add_time'] = time();
                    $data['last_time'] = time();
                    if ($this->setting['likes_status'] == "0") {
                        $data['likes'] = "0";
                        $data['haves'] =  "0";
                    }else{
                        if($result['volume']!="") {
                            $data['likes'] =  $result['volume'];
                            $data['haves'] =  $result['volume'];
                        }else{
                            $data['likes'] = rand(0,2000);
                            $data['haves'] =  rand(0,2000);
                        }
                    }
                    if (($_POST['cid'] != "")&&($_POST['scid'] != "")&&($_POST['pcid'] != "")) {
                        $data['cid']    = $_POST['cid'];
                        $data['level']  = "3";
                    } elseif (($_POST['scid'] != "")&&($_POST['pcid'] != "")) {
                        $data['cid'] = $_POST['scid'];
                        $data['level'] = "2";               
                    }elseif ($_POST['pcid'] != "") {
                        $data['cid'] = $_POST['pcid'];
                        $data['level'] = "1";
                    }elseif ($_POST['pcid'] == "") {
                        $this->error('��ѡ�����');
                        exit;
                    }
                    
                    foreach ($result as $key => $val) {
                        if ($key == 'key') {
                            $data['item_key'] = $result['key'];
                        } else {
                            $data[$key] = $result[$key];
                        }
                    }
                    $data['sid'] = 1;

                    //$item_id = $items_mod->where("item_key='" . $data['item_key'] . "'")->getField('id');
                    if ($item_id) {
                        //update
                        //$item_id = $items_mod->where("id=$item_id")->save($data);
                        //$success_update_list .= $url . "<br/>";
                    } else {
                        //insert
                       
                    }
                        $item_id = $items_mod->add($data);
                        $item_id = $items_mod->add($data);
                        $success_insert_list .= $url . "_1<br/>";
						
                    
                    $tags = $items_tags_mod->get_tags_by_title($result['title']);
                    if ($tags) {
                        $tags_arr = array_unique($tags);
                        foreach ($tags_arr as $tag) {
                            $isset_id = $items_tags_mod->where("name='" . $tag . "'")->getField('id');
                            if ($isset_id) {
                                $items_tags_mod->where('id=' . $isset_id)->setInc('item_nums');
                                $items_tags_item_mod->add(array(
                                    'item_id' => $item_id,
                                    'tag_id' => $isset_id
                                ));
                            } else {
                                $tag_id = $items_tags_mod->add(array(
                                    'name' => $tag
                                        ));
                                $items_tags_item_mod->add(array(
                                    'item_id' => $item_id,
                                    'tag_id' => $tag_id
                                ));
                            }
                        }
                    }
                    $items_nums++;
                } else {
                    $fail_list .= $url . "<br/>";
                }
            }
            //���·������Ʒ��
            //if ($items_nums > 0) {
            //  $items_cate_mod->where('id=' . $cid)->setInc('item_nums', $items_nums);
            //}
            $this->ajaxReturn(array(
                'success_update_list' => $success_update_list,
                'success_insert_list' => $success_insert_list,
                'fail_list' => $fail_list
            ));
        } else {
            $this->display();
        }
    }
    function batch_add_submit() {
            $data = array();
            $success_update_list = '';
            $success_insert_list = '';
            $fail_list = '';

            $items_mod = M('items');
            $items_site_mod = D('items_site');
            $itemcollect_mod = D('itemcollect');
            $items_tags_mod = D('items_tags');
            $items_tags_item_mod = D('items_tags_item');
            
			
            $urls = preg_split('/[\r\n]/', $_POST['urls']);
            $items_nums = 0;
            foreach ($urls as $url) {
				
				//$url = "http://auction1.paipai.com/4109C98F0000000004010000232EC593";
				
                $url = urldecode(trim($url));
				
				$result = GetUrlProduct($url);
				
				if($result==0){
						$fail_list .= $url . "<br/>";
				}
				
				
                if (is_array($result)) {
                    $result = $result['item'];
                    
                    $data['add_time'] = time();
                    $data['last_time'] = time();
                    if ($this->setting['likes_status'] == "0") {
                        $data['likes'] = "0";
                        $data['haves'] =  "0";
                    }else{
                        if($result['volume']!="") {
                            $data['likes'] =  $result['volume'];
                            $data['haves'] =  $result['volume'];
                        }else{
                            $data['likes'] = rand(0,2000);
                            $data['haves'] =  rand(0,2000);
                        }
                    }
                    if (($_POST['cid'] != "")&&($_POST['scid'] != "")&&($_POST['pcid'] != "")) {
                        $data['cid']    = $_POST['cid'];
                        $data['level']  = "3";
                    } elseif (($_POST['scid'] != "")&&($_POST['pcid'] != "")) {
                        $data['cid'] = $_POST['scid'];
                        $data['level'] = "2";               
                    }elseif ($_POST['pcid'] != "") {
                        $data['cid'] = $_POST['pcid'];
                        $data['level'] = "1";
                    }elseif ($_POST['pcid'] == "") {
                        $this->error('��ѡ�����');
                        exit;
                    }
                    
                    foreach ($result as $key => $val) {
                        if ($key == 'key') {
                            $data['item_key'] = $result['key'];
                        } else {
                            $data[$key] = $result[$key];
                        }
                    }
                    $data['sid'] = 1;
					$data['simg'] = $data['img'];
					$data['bimg'] = $data['img'];
					
					$data['title'] = newiconv("UTF-8","GBK",$data["title"]);
					
					
/*
                    if ($result["isown"]=="ok") {
                        //update
                        $item_id = $items_mod->where("item_key='".$data['item_key']."'")->save($data);
                        $success_update_list .= $url . "<br/>";
                    } else {
                        //insert
                    }
*/
  
  
                        $item_id = $items_mod->add($data);
                        $success_insert_list .= $url . "<br/>";
                    
                } else {
                }
            }
            //���·������Ʒ��
            //if ($items_nums > 0) {
            //  $items_cate_mod->where('id=' . $cid)->setInc('item_nums', $items_nums);
            //}
			
			$data=array();
			$data["data"] = array(
                'success_update_list' => $success_update_list,
                'success_insert_list' => $success_insert_list,
                'fail_list' => $fail_list
            );
			
            $this->ajaxReturn($data);
    }

    function comments() {
        $mod = M('user_comments');
        import("ORG.Util.Page");
        $prex = C('DB_PREFIX');

        //����
        $where = 'type="item" ';
        $keyword = isset($_GET['keyword']) && trim($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $time_start = isset($_GET['time_start']) && trim($_GET['time_start']) ? trim($_GET['time_start']) : '';
        $time_end = isset($_GET['time_end']) && trim($_GET['time_end']) ? trim($_GET['time_end']) : '';
        $status = isset($_GET['status']) ? intval($_GET['status']) : '-1';
        if ($keyword) {
            $where .= " AND " . $prex . "user_comments.info LIKE '%" . $keyword . "%'";
            $this->assign('keyword', $keyword);
        }
        if ($time_start) {
            $time_start_int = strtotime($time_start);
            $where .= " AND " . $prex . "user_comments.add_time>='" . $time_start_int . "'";
            $this->assign('time_start', $time_start);
        }
        if ($time_end) {
            $time_end_int = strtotime($time_end);
            $where .= " AND " . $prex . "user_comments.add_time<='" . $time_end_int . "'";
            $this->assign('time_end', $time_end);
        }
        $status >= 0 && $where .= " AND " . $prex . "user_comments.status='" . $status . "'";
        $this->assign('status', $status);

        $count = $mod->where($where)->count();
        $p = new Page($count, 20);

        $list = $mod->where($where)->field($prex . 'user_comments.*,' . $prex . 'items.title as title,' . $prex . 'items.img as items_img')->join('LEFT JOIN ' . $prex . 'items ON ' . $prex . 'user_comments.pid = ' . $prex . 'items.id ')->limit($p->firstRow . ',' . $p->listRows)->order($prex . 'user_comments.add_time DESC')->select();

        $key = 1;
        foreach ($list as $k => $val) {
            $list[$k]['key'] = ++$p->firstRow;
        }

        $page = $p->show();
        $this->assign('page', $page);
        $this->assign('list', $list);
        $this->display();
    }

    function comments_delete() {
        $items_mod = D('items');
        $mod = D('user_comments');
        if ((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_POST['id']) || empty($_POST['id']))) {
            $this->error('��ѡ��Ҫɾ���ļ�¼��');
        }
        if (isset($_POST['id']) && is_array($_POST['id'])) {
            $ids = implode(',', $_POST['id']);
            $mod->delete($ids);
        } else {
            $id = intval($_GET['id']);
            $mod->where('id=' . $id)->delete();
        }
        $this->success(L('operation_success'));
    }

    function comments_status() {
        $id = intval($_REQUEST['id']);
        $mod = D('user_comments');
        $res = $mod->where('id=' . $id)->setField('status', array(
            'exp',
            "(status+1)%2"
                ));
        $values = $mod->where('id=' . $id)->getField('status');
        $this->ajaxReturn($values['status']);
    }

    function collect_by_words() {
        $items_cate_mod = D('items_cate');
        $cate_list = $items_cate_mod->get_list();
        $this->assign('cate_list', $cate_list['sort_list']);

        if (isset($_REQUEST['dosubmit'])) {
            $cate_id = isset($_REQUEST['cate_id']) && intval($_REQUEST['cate_id']) ? intval($_REQUEST['cate_id']) : $this->error('��ѡ�����');
            $keywords = isset($_REQUEST['keywords']) && trim($_REQUEST['keywords']) ? trim($_REQUEST['keywords']) : $this->error('����д�ؼ���');
            $pages = isset($_REQUEST['pages']) && intval($_REQUEST['pages']) ? intval($_REQUEST['pages']) : 1;

            $p = isset($_GET['p']) && intval($_GET['p']) ? intval($_GET['p']) : 1; //��ǰҳ
            $this->assign('data', $_REQUEST);
            $this->assign('p', $p);

            $items_cate_mod = D('items_cate');
            $items_site_mod = D('items_site');
            $collect_taobao_mod = D('collect_taobao');
            $tb_top = $this->taobao_client();
            $req = $tb_top->load_api('TaobaokeItemsGetRequest');
            $req->setFields("num_iid,title,nick,pic_url,price,click_url,shop_click_url,seller_credit_score,item_location,volume");
            $req->setPid($this->setting['taobao_pid']);
            $req->setKeyword($keywords);
            $req->setPageNo($p);
            $req->setPageSize(40);
            $resp = $tb_top->execute($req);

            $res = $this->simplexml_obj2array($resp);
            if ($res['code']) {
                exit($res['msg']);
            }

            $goods_list = (array) $resp->taobaoke_items;

            $sid = $items_site_mod->where("alias='taobao'")->getField('id');

            foreach ($goods_list['taobaoke_item'] as $item) {
                $item = (array) $item;
                $item['item_key'] = 'taobao_' . $item['num_iid'];
                $item['sid'] = $sid;
                $this->_collect_insert($item, $cate_id);
            }

            //��¼�ɼ�ʱ��
            $islog = $collect_taobao_mod->where('cate_id=' . $cate_id)->count();
            if ($islog) {
                $collect_taobao_mod->save(array(
                    'cate_id' => $cate_id,
                    'collect_time' => time()));
            } else {
                $collect_taobao_mod->add(array(
                    'cate_id' => $cate_id,
                    'collect_time' => time()));
            }
        }
        $this->display();
    }

    private function _collect_insert($item, $cate_id) {
        $items_mod = D('items');
        $items_cate_mod = D('items_cate');
        $items_tags_mod = D('items_tags');
        $items_tags_item_mod = D('items_tags_item');

        //��Ҫ�ж���Ʒ�Ƿ��Ѿ�����
        $isset = $items_mod->where("item_key='" . $item['item_key'] . "'")->getField('id');
        if ($isset) {
            return;
        }
        $add_time = time();
        if ($this->setting['likes_status'] == "0") {
            $item['volume'] = "0";
        }
        $item_id = $items_mod->add(array(
            'title' => strip_tags($item['title']),
            'cid' => $cate_id,
            'sid' => $item['sid'],
            'item_key' => $item['item_key'],
            'img' => $item['pic_url'] . '_210x1000.jpg',
            'simg' => $item['pic_url'] . '_64x64.jpg',
            'bimg' => $item['pic_url'],
            'price' => $item['price'],
            'url' => $item['click_url'],
            'likes' => $item['volume'],
            'haves' => $item['volume'],
            'add_time' => $add_time,
            'last_time' => $add_time,));
        if ($item_id) {
            $items_cate_mod->where('id=' . $cate_id)->setInc('item_nums');
        }
        //�����ǩ
        $tags = $items_tags_mod->get_tags_by_title(strip_tags($item['title']));
        if ($tags) {
            $tags = array_unique($tags);
            foreach ($tags as $tag) {
                $isset_id = $items_tags_mod->where("name='" . $tag . "'")->getField('id');
                if ($isset_id) {
                    $items_tags_mod->where('id=' . $isset_id)->setInc('item_nums');
                    $items_tags_item_mod->add(array(
                        'item_id' => $item_id,
                        'tag_id' => $isset_id
                    ));
                } else {
                    $tag_id = $items_tags_mod->add(array(
                        'name' => $tag
                            ));
                    $items_tags_item_mod->add(array(
                        'item_id' => $item_id,
                        'tag_id' => $tag_id
                    ));
                }
            }
        }
    }

    /*
     * ��ȡ�ӷ���  ����ȡ�����ķ���
     */

    public function get_child_cates() {
        $items_cate_mod = D('items_cate');
        $parent_id = $this->_get('parent_id', 'intval');
		
        if($parent_id=="") {
            $content = "<option value=''>--��ѡ��--</option>";
        }else{
            $cate_list = $items_cate_mod->field('id,name')->where(array('pid' => $parent_id))->order('ordid DESC')->select();
            $content = "<option value=''>--��ѡ��--</option>";
            foreach ($cate_list as $val) {
                $content .= "<option value=" . $val['id'] . ">" . $val['name'] . "</option>";
            }
        }
		
        $data2 = array(
            'content' => NewIconv("GBK","UTF-8",$content),
        );
        echo json_encode($data2);
    }
    public function get_child_catesAll() {
        $items_cate_mod = D('items_cate');
        $parent_id = $this->_get('parent_id', 'intval');
		
            $cate_list = $items_cate_mod->field('id,name,pid')->order('ordid DESC')->select();
            $content = "<option value=''>--��ѡ�����--</option>";
            foreach ($cate_list as $val) {
				if($val["pid"]=="0"){
					$content .= "<option value=" . $val['id'] . ">" . $val['name'] . "</option>";
					foreach ($cate_list as $val2) {
						if($val2["pid"]==$val['id']){
						$content .= "<option value=" . $val2['id'] . ">--" . $val2['name'] . "</option>";
							foreach ($cate_list as $val3) {
								if($val3["pid"]==$val2['id']){
								$content .= "<option value=" . $val3['id'] . ">----" . $val3['name'] . "</option>";
								
								
								}
							}
						}
					}
				}

            }
	
        $data2 = array(
            'content' => NewIconv("GBK","UTF-8",$content),
        );
		exit($_GET['callback'].'('.json_encode($data2).')');
    }

    public function get_child_ArticleTypeAll() {
		$article_cate_mod = D('article_cate');
		
		$result = $article_cate_mod->order('sort_order ASC')->select();

            $content = "<option value=''>--��ѡ�����--</option>";
            foreach ($result as $val) {
				if($val["pid"]=="0"){
                	$content .= "<option value=" . $val['id'] . ">" . $val['name'] . "</option>";
            		foreach ($result as $val2) {
						if($val2["pid"]==$val['id']){
                			$content .= "<option value=" . $val2['id'] . ">--" . $val2['name'] . "</option>";
							
								foreach ($result as $val3) {
									if($val3["pid"]==$val2['id']){
										$content .= "<option value=" . $val3['id'] . ">----" . $val3['name'] . "</option>";
									}
								}
						}
					}
				}
            }
			
			
        $data2 = array(
            'content' => NewIconv("GBK","UTF-8",$content),
        );
		exit($_GET['callback'].'('.json_encode($data2).')');
    }
    /*
     * ����������ɾ��
     */

    function delete_search() {
        $items_mod = D('items');
        $items_cate_mod = D('items_cate');
        $items_likes_mod = D('items_likes');
        $items_pics_mod = D('items_pics');
        $items_tags_mod = D('items_tags_item');
        $items_comments_mod = D('user_comments');

        if (isset($_REQUEST['dosubmit'])) {
            if ($_REQUEST['isok'] == "1") {
                //����
                $where = '1=1';
                $keyword = trim($_POST['keyword']);
                $cate_id = trim($_POST['cate_id']);
                $time_start = trim($_POST['time_start']);
                $time_end = trim($_POST['time_end']);
                $status = trim($_POST['status']);
                $min_price = trim($_POST['min_price']);
                $max_price = trim($_POST['max_price']);

                if ($keyword != '') {
                    $where .= " AND title LIKE '%" . $keyword . "%'";
                }
                if ($cate_id != '') {
                    $where .= " AND cid=" . $cate_id;
                }
                if ($time_start != '') {
                    $time_start_int = strtotime($time_start);
                    $where .= " AND add_time>='" . $time_start_int . "'";
                }
                if ($time_end != '') {
                    $time_end_int = strtotime($time_end);
                    $where .= " AND add_time<='" . $time_end_int . "'";
                }
                if ($status != '') {
                    $where .= " AND status=" . $status;
                }
                if ($min_price != '') {
                    $where .= " AND price>=" . $min_price;
                }
                if ($max_price != '') {
                    $where .= " AND price<=" . $max_price;
                }

                $ids_list = $items_mod->where($where)->select();
                $ids = "";
                foreach ($ids_list as $val) {
                    $ids .= $val['id'] . ",";
                }
                if ($ids != "") {
                    $ids = substr($ids, 0, 1);
                    $items_likes_mod->where("items_id in(" . $ids . ")")->delete();
                    $items_pics_mod->where("item_id in(" . $ids . ")")->delete();
                    $items_tags_mod->where("item_id in(" . $ids . ")")->delete();
                    $items_comments_mod->where("pid in(" . $ids . ")")->delete();
                }
                $items_mod->where($where)->delete();

                //������Ʒ���������
                $items_nums = $items_mod->field('cid,count(id) as cate_nums')->group('cid')->select();
                foreach ($items_nums as $val) {
                    $items_cate_mod->save(array('id' => $val['cid'], 'items_nums' => $val['cate_nums']));
                }

                $this->success('ɾ���ɹ�', U('items/delete_search'));
            } else {
                $this->success('ȷ���Ƿ�Ҫɾ����', U('items/delete_search'));
            }
        } else {
            $cate_list = $items_cate_mod->get_list();
            $this->assign('cate_list', $cate_list['sort_list']);
            $this->display();
        }
    }

}

?>