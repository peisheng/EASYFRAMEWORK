<?php
class shopsModel extends RelationModel
{
    protected $_link = array(
        'shops_cate' => array(
            'mapping_type'  => BELONGS_TO,
            'class_name'    => 'shops_cate',
            'foreign_key'   => 'cid',
        ),
        'shops_site' => array(
            'mapping_type'  => BELONGS_TO,
            'class_name'    => 'shops_site',
            'foreign_key'   => 'sid',
        ),
        'shops_tags' => array(
        	'mapping_type'  => MANY_TO_MANY,
        	'class_name'    => 'shops_tags',
        	'foreign_key'   => 'item_id',
        	'relation_foreign_key'=>'tag_id',
            'relation_table'=>'shops_tags_item',
            'auto_prefix' => true
        ),
    );
}