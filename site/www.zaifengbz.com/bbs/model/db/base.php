<?php
class db_base {
	protected $odb;
	protected $dbName;
	protected $tblName;
	protected static $_instance = array();
    /**
     * 单例模型
     * @return db_table
     */
	static function getInstance($modelName) {
        if( !isset(db_base::$_instance[$modelName]) ) {
            db_base::$_instance[$modelName] = new $modelName();
        }
        return db_base::$_instance[$modelName];
	}
	protected function __construct($tblName = '') {
		$this->tblName = $GLOBALS['config']['database']['prefix'].str_replace('db_','',$tblName);
		$this->odb = new DB($GLOBALS['config']['database']['hostname'],'3306',$GLOBALS['config']['database']['database'],$GLOBALS['config']['database']['user'],$GLOBALS['config']['database']['password']);
	}
	public function getAll($order = ''){
		$sql = "SELECT * FROM {$this->tblName} WHERE 1 {$order}";
		$data = $this->odb->getRows($sql);
		return $data;
	}
	public function getDataLimit($field = '*',$where = '1'){
		$sql = "SELECT {$field} FROM {$this->tblName} WHERE {$where}";
        $data = $this->odb->getRows($sql);
        return $data;
	}
	public function inserData($data){
       $r = $this->odb->insert($this->tblName,$data);
       if($r)
           return $this->odb->getInsertId();
       else
           return false;
	}
	public function updateData($data,$conditiaon){
       $r = $this->odb->update($this->tblName,$data,$conditiaon);
       return $r;
	}
	public function deleteData($where){
		$sql = "DELETE FROM {$this->tblName} WHERE {$where};";
		return $this->odb->execSql($sql);
	}
}

?>