<?php
class MySQLReback
{
	private $config;
	private $content;
	private $dbName = array();
	const DIR_SEP = DIRECTORY_SEPARATOR;
	public function __construct($config)
	{
		$this->config = $config;
		header ( "Content-type: text/html;charset=utf-8" );
		$this->connect();
	}
	private function connect()
	{
		if (mysql_connect($this->config['host']. ':' . $this->config['port'], $this->config['userName'], $this->config['userPassword']))
		{
			mysql_query("SET NAMES '{$this->config['charset']}'");
			mysql_query("set interactive_timeout=24*3600");
		}
		else
		{
			exit('无法连接到数据库!');
		}
	}
	public function setDBName($dbName = '*')
	{
		if ($dbName == '*')
		{
			$rs = mysql_list_dbs();
			$rows = mysql_num_rows($rs);
			if ($rows)
			{
				for ($i = 0; $i < $rows; $i++)
				{
					$dbName = mysql_tablename($rs, $i);
					$block = array('information_schema', 'mysql');
					if (!in_array($dbName, $block))
					{
						$this->dbName[] = $dbName;
					}
				}
			}
			else
			{
				exit('没有任何数据库!');
			}
		}
		else
		{
			$this->dbName = func_get_args();
		}
	}
	private function getFile($fileName)
	{
		$this->content = '';
		$fileName = $this->trimPath($this->config['path'] . self::DIR_SEP .$fileName);
		if (is_file($fileName))
		{
			$ext = strrchr($fileName, '.');
			if ($ext == '.sql')
			{
				$this->content = file_get_contents($fileName);
			}
			elseif ($ext == '.gz')
			{
				$this->content = implode('', gzfile($fileName));
			}
			else
			{
				exit('无法识别的文件格式!');
			}
		}
		else
		{
			exit('文件不存在!');
		}
	}
	private function setFile()
	{
		$recognize = '';
		$recognize = implode('_', $this->dbName);
		$fileName = $this->trimPath($this->config['path'] . self::DIR_SEP . $recognize.'_'.date('YmdHis') . '_' . mt_rand(100000000, 999999999) .'.sql');
		$path = $this->setPath($fileName);
		if ($path !== true)
		{
			exit("无法创建备份目录目录 '$path'");
		}
		if ($this->config['isCompress'] == 0)
		{
			if (!file_put_contents($fileName, $this->content, LOCK_EX))
			{
				exit('写入文件失败,请检查磁盘空间或者权限!');
			}
		}
		else
		{
			if (function_exists('gzwrite'))
			{
				$fileName .= '.gz';
				if ($gz = gzopen($fileName, 'wb'))
				{
					gzwrite($gz, $this->content);
					gzclose($gz);
				}
				else
				{
					exit('写入文件失败,请检查磁盘空间或者权限!');
				}
			}
			else
			{
				exit('没有开启gzip扩展!');
			}
		}
		if ($this->config['isDownload'])
		{
			$this->downloadFile($fileName);
		}
	}
	private function trimPath($path)
	{
		return str_replace(array('/', '\\', '//', '\\\\'), self::DIR_SEP, $path);
	}
	private function setPath($fileName)
	{
		$dirs = explode(self::DIR_SEP, dirname($fileName));
		$tmp = '';
		foreach ($dirs as $dir)
		{
			$tmp .= $dir . self::DIR_SEP;
			if (!file_exists($tmp) && !@mkdir($tmp, 0777))
				return $tmp;
		}
		return true;
	}
	private function downloadFile($fileName)
	{
		ob_end_clean();
		header ("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Length: ' . filesize($fileName));
		header('Content-Disposition: attachment; filename=' . basename($fileName));
		readfile($fileName);
	}
	private function backquote($str)
	{
		return "`{$str}`";
	}
	private function getTables($dbName)
	{
		@$rs = mysql_list_tables($dbName);
		$rows = mysql_num_rows($rs);
		$dbprefix = $this->config['dbprefix'];
		for ($i = 0; $i < $rows; $i++)
		{
			$tbName = mysql_tablename($rs, $i);
			if (substr($tbName, 0, strlen($dbprefix)) == $dbprefix)
			{
				$tables[] = $tbName;
			}
		}
		return $tables;
	}
	private function chunkArrayByByte($array, $byte = 5120)
	{
		$i = 0;
		$sum = 0;
		foreach ($array as $v)
		{
			$sum += strlen($v);
			if ($sum < $byte)
			{
				$return[$i][] = $v;
			}
			elseif ($sum == $byte)
			{
				$return[++$i][] = $v;
				$sum = 0;
			}
			else
			{
				$return[++$i][] = $v;
				$i++;
				$sum = 0;
			}
		}
		return $return;
	}
	
	public function backup($addconfig=1)
	{
		$this->content = '/* This file is created by MySQLReback ' . date('Y-m-d H:i:s') . ' */';
		foreach ($this->dbName as $dbName)
		{
			$qDbName = $this->backquote($dbName);
			$rs = mysql_query("SHOW CREATE DATABASE {$qDbName}");
			if ($row = mysql_fetch_row($rs))
			{
				mysql_select_db($dbName);
				$tables = $this->getTables($dbName);
				foreach ($tables as $table)
				{
					$table = $this->backquote($table);
					$tableRs = mysql_query("SHOW CREATE TABLE {$table}");
					if ($tableRow = mysql_fetch_row($tableRs))
					{
						$this->content .= "\r\n /* 创建表结构 {$table} */";
						$this->content .= "\r\n DROP TABLE IF EXISTS {$table};/* MySQLReback Separation */ {$tableRow[1]};/* MySQLReback Separation */";
						$tableDateRs = mysql_query("SELECT * FROM {$table}");
						$valuesArr = array();
						$values = '';
						while ($tableDateRow = mysql_fetch_row($tableDateRs))
						{
							foreach ($tableDateRow as &$v)
							{
								$v = "'" . addslashes($v) . "'";
							}
							$valuesArr[] = '(' . implode(',', $tableDateRow) . ')';
						}
						$temp = $this->chunkArrayByByte($valuesArr);
						if (is_array($temp))
						{
							foreach ($temp as $v)
							{
								$values = implode(',', $v) . ';/* MySQLReback Separation */';
								if ($values != ';/* MySQLReback Separation */')
								{
									$this->content .= "\r\n /* 插入数据 {$table} */";
									$this->content .= "\r\n INSERT INTO {$table} VALUES {$values}";
								}
							}
						}
					}
				}
			}
			else
			{
				exit('未能找到数据库!');
			}
		}
		if (!empty($this->content))
		{
			//同步表前缀。
			//$this->content = str_replace('`'.C('DB_PREFIX'), '`taoditable_', $this->content);
			
			$data = array();
			$data["configdata"] = (file_get_contents(WEBROOT."/data/configdata.php"));
			$data["indexdata"] = (file_get_contents(WEBROOT."/data/indexdata.php"));
			$data["singerpagedate"] = (file_get_contents(WEBROOT."/data/singerpagedate.php"));
			$data["replacekeydata"] = (file_get_contents(WEBROOT."/data/replacekeydata.php"));
			$data["applicationdate"] = (file_get_contents(WEBROOT."/data/applicationdate.php"));
			$data["appnum"] = (file_get_contents(WEBROOT."/data/appnum.php"));
			
			$datastr = base64_encode(serialize($data));
			
			if($addconfig){
			$this->content .="\r\n  /* taodi_data_backup_6_files(".$datastr.")*/";
			}else{
			$this->content .="\r\n  /* taodi_data_backup_6_files()*/";
			}
			$this->content .="\r\n  /* taodi_data_DB_PREFIX(".C('DB_PREFIX').")*/";
			
			$this->setFile();
		}
		return true;
	}
	public function recover($fileName)
	{
		$this->getFile($fileName);
		if (!empty($this->content))
		{
			$fillarr = explode("/* taodi_data_backup_6_files(",$this->content);
			$fillarr = $fillarr[1];
			$fillarr = explode(")*/",$fillarr);
			$datastr = $fillarr[0];
			$data = unserialize(base64_decode($datastr));
			
			if(isset($data["configdata"])) file_put_contents(WEBROOT."/data/configdata.php",($data["configdata"]));
			if(isset($data["indexdata"])) file_put_contents(WEBROOT."/data/indexdata.php",($data["indexdata"]));
			if(isset($data["singerpagedate"])) file_put_contents(WEBROOT."/data/singerpagedate.php",($data["singerpagedate"]));
			if(isset($data["replacekeydata"])) file_put_contents(WEBROOT."/data/replacekeydata.php",($data["replacekeydata"]));
			if(isset($data["applicationdate"])) file_put_contents(WEBROOT."/data/applicationdate.php",($data["applicationdate"]));
			if(isset($data["appnum"])) file_put_contents(WEBROOT."/data/appnum.php",($data["appnum"]));

			$fillarr = explode("/* taodi_data_DB_PREFIX(",$this->content);
			$fillarr = $fillarr[1];
			$fillarr = explode(")*/",$fillarr);
			$datastr = $fillarr[0];
			
			if(empty($datastr)){
				exit('备份文件版本不对!');
				exit;
			}
			
			$this->content = str_replace( '`'.$datastr, '`'.C('DB_PREFIX'),$this->content);
			
			$content = explode(';/* MySQLReback Separation */', $this->content);

			foreach ($content as $i => $sql)
			{
				$sql = trim($sql);
				if (!empty($sql))
				{
					$dbName = $this->dbName[0];
					if (!mysql_select_db($dbName)) exit('不存在的数据库!' . mysql_error());
					$rs = mysql_query($sql);
					if ($rs)
					{
						if (strstr($sql, 'CREATE DATABASE'))
						{
							$dbNameArr = sscanf($sql, 'CREATE DATABASE %s');
							$dbName = trim($dbNameArr[0], '`');
							mysql_select_db($dbName);
						}
					}
					else
					{
						exit('备份文件被损坏!' . mysql_error());
					}
				}
			}
			
			
		}
		else
		{
			$this->throwException('无法读取备份文件!');
		}
		return true;
	}
	private function throwException($error)
	{
		throw new Exception($error);
	}
}
?>