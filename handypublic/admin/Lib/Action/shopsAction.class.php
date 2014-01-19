<?php

class shopsAction extends baseAction {

    public function index() {
        $shops_mod = D('shops');
        $shops_cate_mod = D('shops_cate');
        //搜索
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
        //排序
        $order_str = 'add_time desc';
        if ($order) {
            $order_str = $order . ' ' . $sort;
        }
        import("ORG.Util.Page");
        $count = $shops_mod->where($where)->count();
        $p = new Page($count, 20);
        $shops_list = $shops_mod->where($where)->relation('shops_site')->limit($p->firstRow . ',' . $p->listRows)->order($order_str)->select();

        $key = 1;
        foreach ($shops_list as $k => $val) {
            $shops_list[$k]['key'] = ++$p->firstRow;
            $shops_list[$k]['shops_cate'] = $shops_cate_mod->field('name')->where('id=' . $val['cid'])->find();
        }

        $page = $p->show();
        $this->assign('page', $page);

        $cate_list = $shops_cate_mod->get_list();
        $this->assign('cate_list', $cate_list['sort_list']);

        $this->assign('shops_list', $shops_list);
        $this->assign('order', $order);
        if ($sort == 'desc') {
            $sort = 'asc';
        } else {
            $sort = 'desc';
        }
        $this->assign('sort', $sort);
        $this->display();
    }
    public function taoapiadd() {
		global $userpiddp;
		global $Taoapi;
		global $sitetitleurl;
			$shops_mod = D('shops');
			$shops_cate_mod = D('shops_cate');
			$shops_site_mod = D('shops_site');
		
		$applicationarray = application("",ROOT."applicationdate.php");
		$shoplevelstart=$GJconfig["shoplevelstart"];
		$shoplevelend=$GJconfig["shoplevelend"];
		$stratmoneyKeys=$GJconfig["stratmoneyKeys"];
		$endmoneyKeys=$GJconfig["endmoneyKeys"];
		
		$setaction = var_request("setaction","");
		
		$cate_id = var_request("cate_id","13");
		$keyword = var_request("keyword","");
		$only_mall = var_request("only_mall","0");
		if($cate_id=="0") $keyword="旗舰";
		
		$sort = var_request("sort","commissionNum_desc");
		$types = var_request("types","2");
		
		$page = var_request("p","1");
		$p = var_request("p","1");

		$page = $page>99?99:$page;	

		
		$Taoapi->method = 'taobao.taobaoke.shops.get';
		$Taoapi->fields = 'user_id,click_url,shop_title,commission_rate,seller_credit,shop_type,auction_count,total_auction';
		$Taoapi->pid = $userpiddp;
		
		if($cate_id!="0") $Taoapi->cid = $cate_id;
		$Taoapi->page_no = $page;
		$Taoapi->page_size = 10;
		$Taoapi->sort_field = $sort;
		$Taoapi->sort_type = "desc";
		
		$Taoapi->start_credit = $shoplevelstart;
		$Taoapi->end_credit  = $shoplevelend;
		$Taoapi->start_commissionRate  = $stratmoneyKeys;
		$Taoapi->end_commissionRate  = $endmoneyKeys;
		
		//if($only_mall=="1")$Taoapi->only_mall = "true";
		
		$Taoapi->keyword = Newiconv("GBK","UTF-8",$keyword);
		
		$Taoapishops = $Taoapi->Send('get','xml')->getArrayData();
		
		
		$taobaokeItem = $Taoapishops["taobaoke_shops"]["taobaoke_shop"];

		

		$Taoapi->method = 'taobao.shopcats.list.get';
		$Taoapi->fields = 'cid,parent_cid,name,is_parent';
		$Taoapi->parent_cid = 0;
		$TaoapiSubCats = $Taoapi->Send('get','xml')->getArrayData();
		
		$TaoTypes = $TaoapiSubCats["shop_cats"]["shop_cat"];
		
		
		$TaoTypes_SelectItem="<option value=0>不选择类别(0)</option>";
		foreach($TaoTypes as $item){
			$TaoTypes_SelectItem.="<option value=".$item["cid"]." ".(($item["cid"]==$cate_id)?"selected='selected'":"").">".iconv("UTF-8","GBK",$item["name"])."(".$item["cid"].")"."</option>";
		}

		$count = $Taoapishops["total_results"];
		if($count==1){
			$taobaokeItem = array();
			$taobaokeItem[] = $Taoapishops["taobaoke_shops"]["taobaoke_item"];
		}

		if($count>0 && isset($taobaokeItem)){
		//过滤标题
			if($setaction=="daoru"){
				$ids = $_POST["id"];
				$updatenum = 0;
				$addnum = 0;
				$errornum = 0;
				foreach($ids as $userid){
					foreach($taobaokeItem as $items){
						if($userid==$items["user_id"]){
							$data = array();
							$data['info'] = "";
							$data['title'] = Newiconv("UTF-8","GBK",$items['shop_title']);
							$data['url'] = $items['click_url'];
							$data['item_key']="taobao_".$userid;
							$data['price']=$items['commission_rate']."%";
							$data['hits'] =  rand(100,999);
							$data['likes'] =  rand(1,12);
							$data['img'] = $sitetitleurl."/img/nopic.gif";
							$data['simg'] = $sitetitleurl."/img/nopic.gif";
							$data['bimg'] = $sitetitleurl."/img/nopic.gif";
							
							$data['cid'] = $_POST['pcid'];
							$data['level'] = "1";
							if ($_POST['pcid'] == "") {
								$this->error('请选择分类');
							}
							
							$data['sid'] = $shops_site_mod->where("alias='taobao'")->getField('id');
							
							$item_id = $shops_mod->where("item_key='" . $data['item_key'] . "'")->getField('id');
							
							
							if ($item_id) {
								$shops_mod->where('id=' . $item_id)->save($data);
								$updatenum++;
							} else {
								$new_item_id = $shops_mod->add($data);
								$addnum++;
							}
								$shops_cate_mod->where('id=' . $_POST['pcid'])->UpdateNum($_POST['pcid']);
							}
					}
				}
				
				
				
				$this->success(L(' 采集成功，添加'.$addnum."个店铺，更新".$updatenum."个店铺."));
				exit;
			}
			
			
			
			for($i = 0; $i < count($taobaokeItem); $i++) {
				$taobaokeItem[$i]["shop_title"] = Newiconv("UTF-8","GBK",(strip_tags($taobaokeItem[$i]["shop_title"])));
				$taobaokeItem[$i]["commission_rate"] = ($taobaokeItem[$i]["commission_rate"])."%";
			}
			
			
			
			
		}else{
			$taobaokeItem = null;
			
			$errstr = $Taoapishops;
			
			$this->error(L(' 调用淘宝接口失败，淘宝提示：'.loopArray($errstr)."。必须填写正确的APPKEY。"));
			exit;
			
		}

		
        import("ORG.Util.Page");

        $pa = new Page($count, 20);
		
		

        $page = $pa->show();
        $this->assign('page', $page);
        $this->assign('p', $p);

        $this->assign('TaoTypes_SelectItem', $TaoTypes_SelectItem);


        $shops_cate_mod = D('shops_cate');
        
        $first_cates_list = $shops_cate_mod->field('id,name')->where(array('pid' => 0))->order('ordid DESC')->select();
        $this->assign('first_cates_list', $first_cates_list);
		
        $this->assign('shops_list', $taobaokeItem);
        $this->assign('order', $order);
        $this->assign('only_mall', $only_mall);
        $this->assign('sort', $sort);
        $this->assign('keyword', $keyword);
        $this->assign('types', $types);
        $this->assign('cate_id', $cate_id);
		
        $this->display();
    }

    public function b2capiadd() {
		global $api59miao;
		global $sitetitleurl;
			$shops_mod = D('shops');
			$shops_cate_mod = D('shops_cate');
			$shops_site_mod = D('shops_site');
		
		
		$setaction = var_request("setaction","");
		
		$cate_id = var_request("cate_id","0");
		
		$page = var_request("p","1");
		$p = var_request("p","1");

		$page = $page>99?99:$page;	

		
		$fileds="sid,name,desc,shop_cat,logo,created,modified,click_url,cashback,payment,shipment,shipment_fee,cash_ondelivery,freeshipment,installment,has_invoice,status";
		/*
		 * $params可选参数 
		 * page_no页数
		 * page_size每页显示的数量   
		 * cid 可选参数  表示查询指定类别的商品的所有商家信息   cid=15表示出售钟表眼镜的商家的信息
		 * */
		$params=Array('page_no' => $page, 'page_size' => 10);   
		
		if($cate_id!="0")$params["cid"]=$cate_id;
		//$Api59miaoData=$api59miao->ShopListGet($fileds);  //$params不传参数 
		$Taoapishops=$api59miao->ListShopListGet($fileds,$params);
		
		$taobaokeItem = $Taoapishops["shops"]["shop"];
		
		$count = $Taoapishops["total_results"];
		
		$fileds="cid,name,count,status,sort_order";
		$Api59miaoData=$api59miao->ListShopCatsGet($fileds);
		
		if(isset($Api59miaoData["shop_cats"]["shop_cat"])){
		$TaoTypes = $Api59miaoData["shop_cats"]["shop_cat"];
		}
		
		$TaoTypes_SelectItem="<option value=0>不选择类别(0)</option>";
		foreach($TaoTypes as $item){
			$TaoTypes_SelectItem.="<option value=".$item["cid"]." ".(($item["cid"]==$cate_id)?"selected='selected'":"").">".$item["name"]."</option>";
		}

		$count = $Taoapishops["total_results"];
		if($Taoapishops["shops"]["shop"]["name"]!=""){
			$taobaokeItem = array();
			$taobaokeItem[] = $Taoapishops["shops"]["shop"];
		}

		if($count>0 && isset($taobaokeItem)){
		//过滤标题
			for($i = 0; $i < count($taobaokeItem); $i++) {
				$taobaokeItem[$i]["cashbacks-cashback-name"] = $taobaokeItem[$i]["cashbacks"]["cashback"]["name"];
				$taobaokeItem[$i]["cashbacks-cashback-scope"] = $taobaokeItem[$i]["cashbacks"]["cashback"]["scope"];
				$taobaokeItem[$i]["cashbacks-cashback-desc"] = $taobaokeItem[$i]["cashbacks"]["cashback"]["desc"];
			}
			
			if($setaction=="daoru"){
				$ids = $_POST["id"];
				$updatenum = 0;
				$addnum = 0;
				$errornum = 0;
				foreach($ids as $userid){
					
					foreach($taobaokeItem as $items){
						if($userid==$items["sid"]){
							$data = array();
							$data['info'] = $items["info"];
							$data['title'] = $items["name"];
							$data['url'] = $items['click_url'];
							$data['item_key']="taobao_".$userid;
							$data['price']=$items['cashbacks-cashback-scope'];
							$data['hits'] =  rand(100,999);
							$data['likes'] =  rand(1,12);
							$data['img'] = $items["logo"];
							$data['simg'] = $items["logo"];
							$data['bimg'] = $items["logo"];
							$data['is_index'] = 1;
							
							$data['cid'] = $_POST['pcid'];
							$data['level'] = "1";
							if ($_POST['pcid'] == "") {
								$this->error('请选择分类');
							}
							
							$data['sid'] = $shops_site_mod->where("alias='taobao'")->getField('id');
							
							$item_id = $shops_mod->where("item_key='" . $data['item_key'] . "'")->getField('id');
							
							
							if ($item_id) {
								$shops_mod->where('id=' . $item_id)->save($data);
								$updatenum++;
							} else {
								$new_item_id = $shops_mod->add($data);
								$addnum++;
							}
							
								$shops_cate_mod->where('id=' . $_POST['pcid'])->UpdateNum($_POST['pcid']);
								
							}
					}
				}
				
				$this->success(L(' 采集成功，添加'.$addnum."个店铺，更新".$updatenum."个店铺."));
				exit;
			}
			
			
			
			
			
			
		}else{
			$taobaokeItem = null;
			
			$errstr = $Taoapishops;
			
			$this->error(L(' 调用淘宝接口失败，B2C开放平台提示：'.loopArray($errstr)."。必须填写正确的B2C推广账号APPKEY。"));
			exit;
			
		}

		
        import("ORG.Util.Page");

        $pa = new Page($count, 20);

        $page = $pa->show();
		
        $this->assign('page', $page);
        $this->assign('p', $p);

        $this->assign('TaoTypes_SelectItem', $TaoTypes_SelectItem);


        $shops_cate_mod = D('shops_cate');
        
        $first_cates_list = $shops_cate_mod->field('id,name')->where(array('pid' => 0))->order('ordid DESC')->select();
        $this->assign('first_cates_list', $first_cates_list);
		
        $this->assign('shops_list', $taobaokeItem);
        $this->assign('order', $order);
        $this->assign('only_mall', $only_mall);
        $this->assign('sort', $sort);
        $this->assign('cate_id', $cate_id);
        $this->assign('types', $types);
		
        $this->display();
    }

	
    public function edit() {
        $shops_mod = D('shops');
        $shops_cate_mod = D('shops_cate');
        $shops_site_mod = D('shops_site');

        $shops_id = isset($_REQUEST['id']) && intval($_REQUEST['id']) ? intval($_REQUEST['id']) : $this->error(L('please_select'));
        if (isset($_POST['dosubmit'])) {
            $data = $shops_mod->create();
            
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
                $this->error('请选择分类');
            }
            
            if ($_FILES['img']['name'] != '') {
                $upload_list = $this->_upload($_FILES['img']);
                $data['simg'] = ROOTROAD . '/uploadfile/' . date("Y-m-d") . '/s_' . $upload_list['0']['savename'];
                $data['img'] = ROOTROAD . '/uploadfile/' . date("Y-m-d") . '/m_' . $upload_list['0']['savename'];
                $data['bimg'] = ROOTROAD . '/uploadfile/' . date("Y-m-d") . '/b_' . $upload_list['0']['savename'];
            }
            $result = $shops_mod->save($data);
			
                $this->success("修改成功","index.php?m=shops",0);
				exit;

        }
        $site_list = $shops_site_mod->field('id,name,alias')->select();
        $shops_info = $shops_mod->where('id=' . $shops_id)->find();


        //商品分类最上级分类
        $level = $shops_info['level'];
        $str_cid = $shops_info['cid'];
		//一级分类
		$three_id   = "";
		$second_id  = "";
		$first_id   = $str_cid;
		
        $this->assign('first_id', $first_id);

        $first_cates_list = $shops_cate_mod->field('id,name')->where(array('pid' => 0))->order('ordid DESC')->select();
        $this->assign('first_cates_list', $first_cates_list);
        

        $this->assign('site_list', $site_list);
        $this->assign('shops', $shops_info);
		
		
		
        $this->display();
    }

    public function collect_item() {
        $itemcollect_mod = D('itemcollect');
        $shops_cate_mod = D('shops_cate');

        $url = isset($_REQUEST['url']) ? $_REQUEST['url'] : '';
        !$url && $this->ajaxReturn('', '', 0);
		
        $url = urldecode($url);

        $itemcollect_mod->url_parse($url);
        $data = $itemcollect_mod->fetch();



        //自动分类
        $data['item']['cid'] = $shops_cate_mod->get_cid_by_tags($tags);
        $data['item']['volume'] = rand(2, 2000);
        $data['item']['hits'] = rand(2, 2000);
		$return = array();
		$return["data"] = $data;
        $this->ajaxReturn($return);
    }

    public function add() {
        $shops_mod = D('shops');
        $shops_cate_mod = D('shops_cate');
        $shops_site_mod = D('shops_site');
		
        if (isset($_POST['dosubmit'])) {
            if ($_POST['title'] == '') {
                $this->error('请填写商品标题');
            }
            if (false === $data = $shops_mod->create()) {
                $this->error($shops_mod->error());
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
                $this->error('请选择分类');
            }
            
            $data['img'] = $_POST['input_img'];

            //来源
            $author = isset($_POST['author']) ? $_POST['author'] : '';
            $data['sid'] = $shops_site_mod->where("alias='" . $author . "'")->getField('id');
            $item_id = $shops_mod->where("item_key='" . $data['item_key'] . "'")->getField('id');
            if ($item_id) {
                $shops_mod->where('id=' . $item_id)->save($data);
                $this->success(L('operation_success'));
            } else {
                $new_item_id = $shops_mod->add($data);
            }
            if ($new_item_id) {
                $shops_cate_mod->setInc('item_nums', 1);
                $this->success(L('operation_success'));
            } else {
                $this->error(L('operation_failure'));
            }
        }

        $site_list = $shops_site_mod->field('id,name,alias')->select();

        //商品分类最上级分类
        $item_cate_first_list = $shops_cate_mod->field('id,name')->where(array('pid' => 0))->order('ordid DESC')->select();
        $this->assign('first_cates_list', $item_cate_first_list);

        $this->assign('site_list', $site_list);
        $this->display();
    }

    public function handel_item() {
        $shops_mod = D('shops');
        $shops_cate_mod = D('shops_cate');
        $shops_site_mod = D('shops_site');
        if (isset($_POST['dosubmit'])) {
            if ($_POST['title'] == '') {
                $this->error('请填写商品标题');
            }
            if (false === $data = $shops_mod->create()) {
                $this->error($shops_mod->error());
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
                $this->error('请选择分类');
            }
			

            if ($_FILES['img']['name'] != '') {
                $upload_list = $this->_upload($_FILES['img']);

                $data['simg'] = ROOTROAD . '/uploadfile/' . date("Y-m-d") . '/s_' . $upload_list['0']['savename'];
                $data['img'] = ROOTROAD . '/uploadfile/' . date("Y-m-d") . '/m_' . $upload_list['0']['savename'];
                $data['bimg'] = ROOTROAD . '/uploadfile/' . date("Y-m-d") . '/b_' . $upload_list['0']['savename'];
            } else {
                $this->error('商品图片不能为空');
            }

            $data['item_key'] = 'handel_' . time();
            //来源
            $author = 'handel';
            $data['sid'] = "0";
			
            $item_id = $shops_mod->where("item_key='" . $data['item_key'] . "'")->getField('id');
            if ($item_id) {
                $shops_mod->where('id=' . $item_id)->save($data);
                $this->success(L('operation_success'));
            } else {
                $new_item_id = $shops_mod->add($data);
            }
            if ($new_item_id) {

                $shops_cate_mod->setInc('item_nums', 1);
                $this->success(L('operation_success'));
            } else {
                $this->error(L('operation_failure'));
            }
        }

        $site_list = $shops_site_mod->field('id,name,alias')->select();

        //商品分类最上级分类
        $first_cates_list = $shops_cate_mod->field('id,name')->where(array('pid' => 0 ))->order('ordid DESC')->select();
        $this->assign('first_cates_list', $first_cates_list);

        $this->assign('site_list', $site_list);
        $this->display();
    }

    function update() {
        $shops_mod = D('shops');

        if ((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_POST['id']) || empty($_POST['id']))) {
            $this->error('请选择要更新的商品！');
        }
        if (isset($_REQUEST['id'])) {
            $ids = is_array($_REQUEST['id']) ? implode(',', $_REQUEST['id']) : intval($_REQUEST['id']);
            $res = $shops_mod->where("id in (" . $ids . ")")->setField('last_time', time());
            //var_dump($res);
        }
        $this->success(L('operation_success'));
    }

    function delete() {

        $shops_mod = D('shops');
        $shops_cate_mod = D('shops_cate');
        $shops_likes_mod = D('shops_likes');
        $shops_comments_mod = D('user_comments');

        if ((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_POST['id']) || empty($_POST['id']))) {
            $this->error('请选择要删除的商品！');
        }
        if (isset($_REQUEST['id'])) {
            $ids = is_array($_REQUEST['id']) ? implode(',', $_REQUEST['id']) : intval($_REQUEST['id']);
            $shops_mod->delete($ids);
            $shops_likes_mod->where("shops_id in(" . $ids . ")")->delete();
            $shops_comments_mod->where("pid in(" . $ids . ")")->delete();
        }
        //更新商品分类的数量
        $shops_nums = $shops_mod->field('cid,count(id) as cate_nums')->group('cid')->select();
        foreach ($shops_nums as $val) {
            $shops_cate_mod->save(array('id' => $val['cid'], 'item_nums' => $val['cate_nums']));
        }

        $this->success(L('operation_success'));
    }
    private function _upload($imgage, $path = '', $isThumb = true) {
		
		
        import("ORG.Net.UploadFile");
        $upload = new UploadFile();
        //设置上传文件大小
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
            //设置缩略图最大高度
            $upload->thumbMaxHeight = '5000,3000,1000';
            $upload->saveRule = uniqid;
            $upload->thumbRemoveOrigin = false;
        }
        if (!$upload->uploadOne($imgage)) {
            //捕获上传异常
            $this->error($upload->getErrorMsg());
        } else {
            //取得成功上传的文件信息
            $uploadList = $upload->getUploadFileInfo();
        }
        return $uploadList;
    }

    function delete_pic() {
        $shops_pics_mod = D('shops_pics');
        $item_id = isset($_GET['item_id']) && intval($_GET['item_id']) ? intval($_GET['item_id']) : exit('0');
        $id = isset($_GET['id']) && intval($_GET['id']) ? intval($_GET['id']) : exit('0');
        $shops_pics_mod->where(array('id' => $id, 'item_id' => $item_id))->delete();
        echo '1';
        exit;
    }

    function likes() {
        $shops_mod = D('shops');

        if ((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_POST['id']) || empty($_POST['id']))) {
            $this->error('请选择商品！');
        }
        if (isset($_REQUEST['id'])) {
            $likes = trim($_REQUEST['likes']);
            $id = is_array($_REQUEST['id']) ? implode(',', $_REQUEST['id']) : intval($_REQUEST['id']);
            $shops_mod->where("id='" . $id . "'")->setField('likes', $likes);
        }
        $this->success(L('operation_success'));
    }

    function status() {
        $id = intval($_REQUEST['id']);
        $type = trim($_REQUEST['type']);
        $shops_mod = D('shops');
        $res = $shops_mod->where('id=' . $id)->setField($type, array('exp', "(" . $type . "+1)%2"));
        $values = $shops_mod->where('id=' . $id)->getField($type);
        $this->ajaxReturn($values[$type]);
    }

    function batch_add() {
        $shops_cate_mod = D('shops_cate');
        
        $first_cates_list = $shops_cate_mod->field('id,name')->where(array('pid' => 0))->order('ordid DESC')->select();
        $this->assign('first_cates_list', $first_cates_list);

        if (isset($_POST['dosubmit'])) {
            $data = array();
            $success_update_list = '';
            $success_insert_list = '';
            $fail_list = '';

            $shops_mod = M('shops');
            $shops_site_mod = D('shops_site');
            $itemcollect_mod = D('itemcollect');
            
            $urls = preg_split('/[\r\n]/', $_POST['urls']);
            $shops_nums = 0;
            foreach ($urls as $url) {
                $url = urldecode(trim($url));
                $itemcollect_mod->url_parse($url);
                $result = $itemcollect_mod->fetch();
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
                        $this->error('请选择分类');
                        exit;
                    }
                    
                    foreach ($result as $key => $val) {
                        if ($key == 'key') {
                            $data['item_key'] = $result['key'];
                        } else {
                            $data[$key] = $result[$key];
                        }
                    }
                    $data['sid'] = $shops_site_mod->where("alias='" . $data['author'] . "'")->getField('id');

                    $item_id = $shops_mod->where("item_key='" . $data['item_key'] . "'")->getField('id');
                    if ($item_id) {
                        //update
                        $item_id = $shops_mod->where("id=$item_id")->save($data);
                        $success_update_list .= $url . "<br/>";
                    } else {
                        //insert
                        $item_id = $shops_mod->add($data);
                        $success_insert_list .= $url . "<br/>";
                       
                    }
                    
                    $shops_nums++;
                } else {
                    $fail_list .= $url . "<br/>";
                }
            }
            //更新分类表商品数
            //if ($shops_nums > 0) {
            //  $shops_cate_mod->where('id=' . $cid)->setInc('item_nums', $shops_nums);
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

    function comments() {
        $mod = M('user_comments');
        import("ORG.Util.Page");
        $prex = C('DB_PREFIX');

        //搜索
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

        $list = $mod->where($where)->field($prex . 'user_comments.*,' . $prex . 'shops.title as title,' . $prex . 'shops.img as shops_img')->join('LEFT JOIN ' . $prex . 'shops ON ' . $prex . 'user_comments.pid = ' . $prex . 'shops.id ')->limit($p->firstRow . ',' . $p->listRows)->order($prex . 'user_comments.add_time DESC')->select();

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
        $shops_mod = D('shops');
        $mod = D('user_comments');
        if ((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_POST['id']) || empty($_POST['id']))) {
            $this->error('请选择要删除的记录！');
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
        $shops_cate_mod = D('shops_cate');
        $cate_list = $shops_cate_mod->get_list();
        $this->assign('cate_list', $cate_list['sort_list']);

        if (isset($_REQUEST['dosubmit'])) {
            $cate_id = isset($_REQUEST['cate_id']) && intval($_REQUEST['cate_id']) ? intval($_REQUEST['cate_id']) : $this->error('请选择分类');
            $keywords = isset($_REQUEST['keywords']) && trim($_REQUEST['keywords']) ? trim($_REQUEST['keywords']) : $this->error('请填写关键词');
            $pages = isset($_REQUEST['pages']) && intval($_REQUEST['pages']) ? intval($_REQUEST['pages']) : 1;

            $p = isset($_GET['p']) && intval($_GET['p']) ? intval($_GET['p']) : 1; //当前页
            $this->assign('data', $_REQUEST);
            $this->assign('p', $p);

            $shops_cate_mod = D('shops_cate');
            $shops_site_mod = D('shops_site');
            $collect_taobao_mod = D('collect_taobao');
            $tb_top = $this->taobao_client();
            $req = $tb_top->load_api('TaobaokeshopsGetRequest');
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

            $goods_list = (array) $resp->taobaoke_shops;

            $sid = $shops_site_mod->where("alias='taobao'")->getField('id');

            foreach ($goods_list['taobaoke_item'] as $item) {
                $item = (array) $item;
                $item['item_key'] = 'taobao_' . $item['num_iid'];
                $item['sid'] = $sid;
                $this->_collect_insert($item, $cate_id);
            }

            //记录采集时间
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
        $shops_mod = D('shops');
        $shops_cate_mod = D('shops_cate');
        $shops_tags_mod = D('shops_tags');
        $shops_tags_item_mod = D('shops_tags_item');

        //需要判断商品是否已经存在
        $isset = $shops_mod->where("item_key='" . $item['item_key'] . "'")->getField('id');
        if ($isset) {
            return;
        }
        $add_time = time();
        if ($this->setting['likes_status'] == "0") {
            $item['volume'] = "0";
        }
        $item_id = $shops_mod->add(array(
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
            $shops_cate_mod->where('id=' . $cate_id)->setInc('item_nums');
        }
        //处理标签
        $tags = $shops_tags_mod->get_tags_by_title(strip_tags($item['title']));
        if ($tags) {
            $tags = array_unique($tags);
            foreach ($tags as $tag) {
                $isset_id = $shops_tags_mod->where("name='" . $tag . "'")->getField('id');
                if ($isset_id) {
                    $shops_tags_mod->where('id=' . $isset_id)->setInc('item_nums');
                    $shops_tags_item_mod->add(array(
                        'item_id' => $item_id,
                        'tag_id' => $isset_id
                    ));
                } else {
                    $tag_id = $shops_tags_mod->add(array(
                        'name' => $tag
                            ));
                    $shops_tags_item_mod->add(array(
                        'item_id' => $item_id,
                        'tag_id' => $tag_id
                    ));
                }
            }
        }
    }

    /*
     * 获取子分类  至获取单级的分类
     */

    public function get_child_cates() {
        $shops_cate_mod = D('shops_cate');
        $parent_id = $this->_get('parent_id', 'intval');
		
        if($parent_id=="") {
            $content = "<option value=''>--请选择--</option>";
        }else{
            $cate_list = $shops_cate_mod->field('id,name')->where(array('pid' => $parent_id))->order('ordid DESC')->select();
            $content = "<option value=''>--请选择--</option>";
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
        $shops_cate_mod = D('shops_cate');
        $parent_id = $this->_get('parent_id', 'intval');
		
            $cate_list = $shops_cate_mod->field('id,name,pid')->order('ordid DESC')->select();
            $content = "<option value=''>--请选择分类--</option>";
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

            $content = "<option value=''>--请选择分类--</option>";
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
     * 按搜索条件删除
     */

    function delete_search() {
        $shops_mod = D('shops');
        $shops_cate_mod = D('shops_cate');
        $shops_likes_mod = D('shops_likes');
        $shops_pics_mod = D('shops_pics');
        $shops_tags_mod = D('shops_tags_item');
        $shops_comments_mod = D('user_comments');

        if (isset($_REQUEST['dosubmit'])) {
            if ($_REQUEST['isok'] == "1") {
                //搜索
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

                $ids_list = $shops_mod->where($where)->select();
                $ids = "";
                foreach ($ids_list as $val) {
                    $ids .= $val['id'] . ",";
                }
                if ($ids != "") {
                    $ids = substr($ids, 0, 1);
                    $shops_likes_mod->where("shops_id in(" . $ids . ")")->delete();
                    $shops_pics_mod->where("item_id in(" . $ids . ")")->delete();
                    $shops_tags_mod->where("item_id in(" . $ids . ")")->delete();
                    $shops_comments_mod->where("pid in(" . $ids . ")")->delete();
                }
                $shops_mod->where($where)->delete();

                //更新商品分类的数量
                $shops_nums = $shops_mod->field('cid,count(id) as cate_nums')->group('cid')->select();
                foreach ($shops_nums as $val) {
                    $shops_cate_mod->save(array('id' => $val['cid'], 'shops_nums' => $val['cate_nums']));
                }

                $this->success('删除成功', U('shops/delete_search'));
            } else {
                $this->success('确认是否要删除？', U('shops/delete_search'));
            }
        } else {
            $cate_list = $shops_cate_mod->get_list();
            $this->assign('cate_list', $cate_list['sort_list']);
            $this->display();
        }
    }

}

?>