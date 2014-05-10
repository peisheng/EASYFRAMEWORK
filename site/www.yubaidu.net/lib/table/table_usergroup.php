<?php

if (!defined('ROOT')) exit('Can\'t Access !');
class table_usergroup extends table_mode {
	
	function save_before() {
		parent::save_before();
		front::$post['powerlist'] = serialize(front::$post['powerlist']);
		if(front::$post['powerlist'] == 'N;') front::$post['powerlist'] = '';
	}
	
	function view_before(&$data) {
		if($data['powerlist'] != 'all' && $data['powerlist'] != ''){
			$data['powerlist'] = unserialize($data['powerlist']);
		}
	}
}