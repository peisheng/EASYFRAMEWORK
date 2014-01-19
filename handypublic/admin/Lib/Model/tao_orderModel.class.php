<?php
class tao_orderModel extends RelationModel{
	protected $_link = array(
        'items_comments' => array(
            'mapping_type'  => HAS_MANY ,
            'class_name'    => 'items_comments',
            'foreign_key'   => 'id',)
	);
	public function get_tao_order($id){
		$mod=D('tao_order');
		return $mod->where('id='.$id)->find();
	}
	function get_list($where=" 1=1 ",$pagesize=20){
		import("ORG.Util.Page");

		$mod=D('tao_order');
		$time_start = strtotime($_REQUEST["time_start"]);
		$time_end = strtotime($_REQUEST["time_end"]);

		if(isset($_REQUEST['keyword'])){
			$keys = $_REQUEST['keyword'];
			$where.=" and name like '%$keys%'";
		}
		if(isset($_REQUEST['time_start'])){
			$where.=" and pay_time >= '$time_start'";
		}
		if(isset($_REQUEST['time_end'])){
			$where.=" and pay_time <= '$time_end'";
		}
		
		

		$count = $mod->where($where)->count();
		$sumfee = $mod->where($where)->sum("commission");
		
		$p = new Page($count,$pagesize);

		$list=$mod->where($where)->order("pay_time desc")->limit($p->firstRow.','.$p->listRows)->select();
		
		return array('list'=>$list,'page'=>$p->show(),'count'=>$count,'sumfee'=>$sumfee);
	}
}