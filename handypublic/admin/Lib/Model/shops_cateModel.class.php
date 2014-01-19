<?php
class shops_cateModel extends RelationModel
{
	protected $_link = array(
        'shops' => array(
        	'mapping_type'  => HAS_MANY,
        	'class_name'    => 'shops',
        	'foreign_key'   => 'cid',
	),
        'shops_tags' => array(
        	'mapping_type'  => MANY_TO_MANY,
        	'class_name'    => 'shops_tags',
        	'foreign_key'   => 'cate_id',
        	'relation_foreign_key'=>'tag_id',
            'relation_table' => 'shops_tags_cate',
            'auto_prefix' => true
	)
	);

    public function UpdateNum($id) {
		
		$shops_mod = D('shops');
		$nums = $shops_mod->where("cid=".$id)->count();
        return $this->setField("item_nums",array('exp',$nums));
    }
	public function get_tags_ids($cate_id)
	{
		$list = $this->relation('shops_tags')->where("id=".$cate_id)->find();
		$ids = array();
		foreach($list['shops_tags'] as $tag)
		{
			$ids[] = $tag['id'];
		}
		return $ids;
	}

	public function get_cid_by_tags($tags)
	{
		$tags = array_unique($tags);
		$shops_tags_mod = D('shops_tags');
		
		
		foreach ($tags as $tag) {
			
			$tag = NewIconv("UTF-8","GBK",$tag);
			$re = $shops_tags_mod->field(C('DB_PREFIX')."shops_tags.id,".C('DB_PREFIX')."shops_tags.name,itc.cate_id")->JOIN("LEFT JOIN ".C('DB_PREFIX')."shops_tags_cate as itc ON itc.tag_id=".C('DB_PREFIX')."shops_tags.id")->where(C('DB_PREFIX')."shops_tags.name='".$tag."'")->find();
			
			if ($re) {
				return $re['cate_id'];
			}
		}
		return 0;
	}
	function get_list($id=0){
		$shops_cate_mod=D('shops_cate');
		
		$list=array();
		$res=$shops_cate_mod->order('ordid DESC')->where('pid='.$id)->select();
		foreach($res as $key=>$val){
                    $val['level']=0;
                    $list[]=$val;
                    //二级分类
                    $arr=$shops_cate_mod->order('ordid DESC')->where('pid='.$val['id'])->select();
                    $res[$key]['shops']=$arr;
		}
		return array('list'=>$res,'sort_list'=>$list);
	}
	function get_list2($id=0){
		$shops_cate_mod=D('shops_cate');
		
		$list=array();
		$res=$shops_cate_mod->order('ordid DESC')->where('pid='.$id)->select();
		foreach($res as $key=>$val){
                    $val['level']=0;
                    $list[]=$val;
                    //二级分类
                    $arr=$shops_cate_mod->order('ordid DESC')->where('pid='.$val['id'])->select();
                    //三级分类
                    foreach($arr as $k2=>$v2){
                        $v2['level']=1;
                        $v2['cls']="sub_".$val['id'];
                        $list[]=$v2;

                        $res3=$arr[$k2]['shops']=$shops_cate_mod->order('ordid DESC')->where('pid='.$v2['id'])->select();
                        foreach($res3 as $k3=>$v3){
                            $v3['level']=2;
                            $v3['cls']="sub_".$val['id']." sub_".$v2['id'];
                            $list[]=$v3;
                        }
                    }
                    $res[$key]['shops']=$arr;
		}
		return array('list'=>$res,'sort_list'=>$list);
	}
}