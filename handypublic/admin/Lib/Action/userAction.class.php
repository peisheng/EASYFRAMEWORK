<?php
class userAction extends baseAction{
	public function index(){
        $mod=D("user");
        $res=$mod->get_list();
		$this->assign('list',$res['list']);
		$this->assign('page',$res['page']);
		$this->display();
	}
	
	public function b2corder(){
		global $api59miao;
		
		if(empty($_GET["time_start"]))$_GET["time_start"] = date("Y-m-d");
		if(empty($_GET["time_end"]))$_GET["time_end"] = date("Y-m-d");
        $mod=D("mall_order");
		

		if (isset($_GET['search'])) {
			$time_start = strtotime($_GET["time_start"]);
			$time_end = strtotime($_GET["time_end"]);
			
			if($time_start > $time_end){
				$this->error(L("时间选择错误，结束时间小于起始时间。"));
			}
			if($time_end-$time_start > 86400*30){
				$this->error(L("时间选择错误，时间跨度太长，不能超过30天。"));
			}
			
			$orderArr = array();
			
			 for($i=$time_start;$i<$time_end+86400;$i=$i+86400){
				 $timetemp =date("Ymd",$i);
				 
				$fileds="order_id,seller_id,seller_name,app_key,created,order_amount,commission";
				$Api59miaoData=$api59miao->ListOrderReport($fileds,$timetemp);
		
				
				
				if(is_array($Api59miaoData["orders"]["order"])){
					
					if($Api59miaoData["orders"]["order"]["order_id"]!=""){
						
						$orderArr[] = $Api59miaoData["orders"]["order"];
					}else{
						$orderArr = array_merge($orderArr,$Api59miaoData["orders"]["order"]);	
					}
					
					
				}
				 
			 }
			 
			
			foreach($orderArr as $order){
			
				$data = array();
				$order["created"] = strtotime($order["created"]);
				$data = $order;
				
				$order_id = $mod->where("order_id='" . $data['order_id'] . "'")->getField('order_id');	
				
				if ($order_id) {
					$mod->where('order_id=' . $order_id)->save($data);
					$updatenum++;
				} else {
					$new_order_id = $mod->add($data);
					$addnum++;
				}
				
			}
		}

		
        $res=$mod->get_list();
		
		$this->assign('time_start',$_GET["time_start"]);
		$this->assign('time_end',$_GET["time_end"]);
		
		$this->assign('list',$res['list']);
		$this->assign('page',$res['page']);
		$this->display();
	}
	public function taoorder(){
		global $api59miao;
		global $userpiddp;
		global $Taoapi;
		
		$nowtimetemp = strtotime(date("Y-m-d"))-86400;
		
		if(empty($_GET["time_start"]))$_GET["time_start"] = date("Y-m-d",$nowtimetemp-86400);;
		if(empty($_GET["time_end"]))$_GET["time_end"] = date("Y-m-d",$nowtimetemp);

		
        $mod=D("tao_order");
		$page = 1;
		$page_size = 10;

		if (isset($_GET['search'])) {
			$time_start = strtotime($_GET["time_start"]);
			$time_end = strtotime($_GET["time_end"]);
			
			if($time_start > $time_end){
				$this->error(L("时间选择错误，结束时间小于起始时间。"));
			}
			if($time_end-$time_start > 86400*15){
				$this->error(L("时间选择错误，时间跨度太长，不能超过15天。"));
			}
			
			$orderArr = array();
			
			 for($i=$time_start;$i<$time_end+86400;$i=$i+86400){
				 $timetemp =date("Ymd",$i);
		
		
				$Taoapi->method = 'taobao.taobaoke.report.get';
				$Taoapi->fields = 'trade_parent_id,order_id,trade_id,real_pay_fee,commission_rate,commission,order_amount,app_key,outer_code,pay_time,pay_price,num_iid,item_title,item_num,category_id,category_name,shop_title,seller_nick';
				$Taoapi->date = $timetemp;
				$Taoapi->page_no = $page;
				$Taoapi->page_size = $page_size;
				$TaoapiItems = $Taoapi->Send('get','xml')->getArrayData();
			
			
				
				if(is_array($TaoapiItems["taobaoke_report"])){
					
					$totalNum = intval($TaoapiItems["taobaoke_report"]["total_results"]);
					
					if(isset($TaoapiItems["taobaoke_report"]["taobaoke_report_members"]["taobaoke_report_member"]["trade_id"])){
						$orderArr[] = $TaoapiItems["taobaoke_report"]["taobaoke_report_members"]["taobaoke_report_member"];
					}else{
						$orderArr = array_merge($orderArr,$TaoapiItems["taobaoke_report"]["taobaoke_report_members"]["taobaoke_report_member"]);	
					}
					
				}
				//计算分页
				if($totalNum>$page*$page_size){
					$page++;	
					$i=$i-86400;
				}else{
					$page = 1;
				}
					
			 }
			
			 
			foreach($orderArr as $order){
			
				$order["pay_time"] = strtotime($order["pay_time"]);
				$order["add_time"] = date();
				$order["seller_nick"] = Newiconv("UTF-8","GBK",$order["seller_nick"]);
				$order["item_title"] = Newiconv("UTF-8","GBK",$order["item_title"]);
				
				$order["shop_title"] = Newiconv("UTF-8","GBK",$order["shop_title"]);
				$order["category_name"] = Newiconv("UTF-8","GBK",$order["category_name"]);
				
				
					$trade_id = $mod->where("trade_id='" . $order['trade_id'] . "'")->getField('trade_id');	
					
					if ($trade_id) {
						$mod->where('trade_id=' . $trade_id)->save($order);
						$updatenum++;
					} else {
						$new_trade_id = $mod->add($order);
						$addnum++;
					}
				
			}
			
			//$mod->where('trade_id=""')->delete();
			
		}
		
        $res=$mod->get_list();
		
		$list = $res['list'];
		//$res = Newiconv("UTF-8","GBK",$res);
		foreach($list as $key=>&$order){
				
				$order["commission_rate"] = $order["commission_rate"]*100;
		}
		
		
		$this->assign('time_start',$_GET["time_start"]);
		$this->assign('time_end',$_GET["time_end"]);
		
		$this->assign('list',$list);
		$this->assign('page',$res['page']);
		$this->assign('sumfee',$res['sumfee']);
		$this->display();
		
		
	}
	
	
	function edit() {
		if (isset($_POST['dosubmit'])) {
			$mod = M('user');
			$data = $mod->create();
			
			if($_POST["password"]!=""){
				$data["passwd"]  = md5($_POST["password"]);	
			}
			

			$result = $mod->where("id=" . $data['id'])->save($data);
			if(false !== $result){
				$this->success(L('operation_success'), '', '', 'edit');
			}else{
				$this->error(L('operation_failure'));
			}
		} else {
			$mod = M('user');
			if (isset($_GET['id'])) {
				$id = isset($_GET['id']) && intval($_GET['id']) ? intval($_GET['id']) : $this->error('请选择要编辑的链接');
			}
			$info = $mod->where('id=' . $id)->find();
			$this->assign('info', $info);
			$this->assign('show_header', false);
			$this->display();
		}
	}
	
}