<?php
class BakAction extends Action {
    public function index() {
		error_reporting(7);
        //检测文件夹权限
        $check_file = array(
            '/data',
            '/data/applicationdate.php',
            '/data/appnum.php',
            '/data/configdata.php',
            '/data/indexdata.php',
            '/data/replacekeydata.php',
            '/data/singerpagedate.php',
            '/databak'
        );
        $error = array();
		$flag = true;
        foreach ($check_file as $file) {
            $path_file = ROOT_PATH . $file;
            if (!file_exists($path_file)) {
                $error[] = $file . "不存在!";
                $flag = false;
                continue;
            }
            if (!is_writable($path_file)) {
                $error[] = $file . "不可读写!";
                $flag = false;
            }
        }
		
		
		
		global $config;
		
        $DataDir = "../databak/";
        if (!empty($_GET['Action'])) {
            import("ORG.MySQLReback");
            $config = array(
                'host' => C('DB_HOST'),
                'port' => C('DB_PORT'),
                'userName' => C('DB_USER'),
                'userPassword' => C('DB_PWD'),
                'dbprefix' => C('DB_PREFIX'),
                'charset' => 'UTF8',
                'path' => $DataDir,
                'isCompress' => 0, //是否开启gzip压缩
                'isDownload' => 0  
            );
			
			
			
            $mr = new MySQLReback($config);
            $mr->setDBName(C('DB_NAME'));
            if ($_GET['Action'] == 'backup') {
				
                $mr->backup();                
				$this->success(L(' 数据库备份成功。'));
             } elseif ($_GET['Action'] == 'backup0') {
				
                $mr->backup(0);                
				$this->success(L(' 数据库备份成功。'));
            } elseif ($_GET['Action'] == 'RL') {
				
				
                $mr->recover($_GET['File']);                
				
				$this->success(L(' 数据库还原成功。'));
				
				
				
				
				
				
				
            } elseif ($_GET['Action'] == 'Del') {
                if (@unlink($DataDir . $_GET['File'])) {
					$this->success(L(' 删除成功。'));
                } else {                    
					$this->error(L(' 删除失败。'));
                }
            }
            if ($_GET['Action'] == 'dow') {
                function DownloadFile($fileName) {
                    //ob_end_clean();
                    //header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                    //header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Length: ' . filesize($fileName));
                   header('Content-Disposition: attachment; filename=' . basename($fileName));
                    readfile($fileName);
                }
                DownloadFile($DataDir . $_GET['file']);
				
            }
			exit();
        }else{
        $this->assign('DB_PREFIX', C('DB_PREFIX'));
        	$this->display();
		}
    }
}
?>