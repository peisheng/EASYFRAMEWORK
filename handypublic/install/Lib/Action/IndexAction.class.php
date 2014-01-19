<?php

class indexAction extends Action {

    public function _initialize() {
        L(include LANG_PATH . 'common.php');
		
    }

    /**
     * ��װЭ��
     */
    public function index() {
		$config_install = ROOT_PATH . '/data/install.lock';
		if (file_exists($config_install)) {
			exit("���ã��Ѿ���װ���ˡ��������Ҫ���°�װ����ֱ��ɾ�� \"data/install.lock\"���ɣ�����ļ�������dataĿ¼�¡�  <br> Ĭ�Ϻ�̨Ŀ¼�� http://��������/admin Ŀ¼��");
		}
        $this->assign('step_curr', 'eula');
        $eula_html = file_get_contents(LANG_PATH . 'eula.html');
        $this->assign('eula_html', $eula_html);
        if (isset($_POST['dosubmit'])) {
            if (!isset($_POST['accept']) || !$_POST['accept']) {
                $error_msg = L('please_accept');
                $this->assign('error_msg', $error_msg);
                $this->display();
            } else {
                unset($_POST);
                //header('location:' . u('Index/check')); 
				echo("<script language=\"JavaScript\">location.href='./install.php?m=Index&a=check';</script>");
				exit;

                //$this->check();
            }
        } else {
            $this->display();
        }
    }

    /**
     * ������������
     */
    public function check() {
		$config_install = ROOT_PATH . '/data/install.lock';
		if (file_exists($config_install)) {
			exit("���ã��Ѿ���װ���ˡ��������Ҫ���°�װ����ֱ��ɾ�� \"data/install.lock\"���ɣ�����ļ�������dataĿ¼�¡�  <br> Ĭ�Ϻ�̨Ŀ¼�� http://��������/admin Ŀ¼��");
		}
        $this->assign('step_curr', 'check');
        $flag = true;
        //����ļ���Ȩ��
        $check_file = array(
            '/data/config.inc.php',
            '/data',
            '/data/tpl_cache',
            '/data/applicationdate.php',
            '/data/appnum.php',
            '/data/configdata.php',
            '/data/indexdata.php',
            '/data/replacekeydata.php',
            '/data/singerpagedate.php',
            '/Apicache',
            '/install/Runtime',
        );
        $error = array();
        foreach ($check_file as $file) {
            $path_file = ROOT_PATH . $file;
            if (!file_exists($path_file)) {
                $error[] = $file . "������!";
                $flag = false;
                continue;
            }
            if (!is_writable($path_file)) {
                $error[] = $file . "����д��!";
                $flag = false;
            }
        }
        if (!function_exists("curl_getinfo")) {
            //$error[] = "ϵͳ��֧��curl!";
            //$flag = false;
        }

        if (!function_exists("gd_info")) {
            //$error[] = "ϵͳ��֧��GD!";
            //$flag = false;
        }


        if (!$flag) {
            $this->assign('error', $error);
            $this->display('check');
        } else {
            //$this->redirect('Index/setconf');
 				echo("<script language=\"JavaScript\">location.href='./install.php?m=Index&a=setconf';</script>");
				exit;
       }
    }

    /**
     * ��д������Ϣ
     */
    public function setconf() {
		$config_install = ROOT_PATH . '/data/install.lock';
		if (file_exists($config_install)) {
			exit("���ã��Ѿ���װ���ˡ��������Ҫ���°�װ����ֱ��ɾ�� \"data/install.lock\"���ɣ�����ļ�������dataĿ¼�¡�  <br> Ĭ�Ϻ�̨Ŀ¼�� http://��������/admin Ŀ¼��");
		}
        $this->assign('step_curr', 'setconf');
        $this->assign('database_name_tip', L('database_name_tip'));
        $this->assign('db_host', 'localhost');
        $this->assign('db_port', '3306');
        $this->assign('db_user', 'root');
        $this->assign('db_name', 'taodiv6');
        $this->assign('db_prefix', 'td6_');

        $this->assign('admin_user', 'admin');
        $this->assign('db_pass', '');
        $this->assign('admin_pass', '');
        $this->assign('admin_pass_confirm', '');
        $this->assign('admin_email', '');

        if (isset($_POST['dosubmit'])) {
            foreach ($_POST as $key => $val) {
                $this->assign($key, $val);
            }
            extract($_POST);
            if (!$db_host || !$db_port || !$db_name || !$db_user || !$db_prefix || !$admin_user || !$admin_pass) {
                $this->assign('error_msg', L('please_input_config_info'));
                $this->display();
                exit;
            }
            if ($admin_pass != $admin_pass_confirm) {
                $this->assign('error_msg', L('admin_pass_error'));
                $this->display();
                exit;
            }
			

			
           //�����������ݿ�
            $conn = @mysql_connect($db_host . ':' . $db_port, $db_user, $db_pass);
            if (!$conn) {
                $this->assign('error_msg', L('connect_mysql_error'));
                $this->display();
                exit;
            }
            $selected_db = @mysql_select_db($db_name);
            if ($selected_db) {
                //������ݿ���� �������氲װ��   ��ʾ�Ƿ񸲸�
                $query = @mysql_query("SHOW TABLES LIKE '{$db_prefix}%'");
                $was_install = false;
                while ($row = mysql_fetch_assoc($query)) {
                    $was_install = true;
                    break;
                }
                if ($was_install && !isset($force_install)) {
                    $this->assign('database_name_tip', L('db_isset'));
                    $this->display();
                    exit;
                } else {
                    $this->_set_temp($_POST);
                    $this->redirect('Index/install');
                }
            } else {
                if (mysql_get_server_info($conn) > '4.1') {
                    $charset = C('DEFAULT_CHARSET');
                    $sql = "CREATE DATABASE IF NOT EXISTS `{$db_name}` DEFAULT CHARACTER SET " . str_replace('-', '', $charset);
                } else {
                    $sql = "CREATE DATABASE IF NOT EXISTS `{$db_name}`";
                }
                if (!mysql_query($sql, $conn)) {
                    $this->assign('error_msg', L('create_db_error'));
                    $this->display();
                    exit;
                }
                $this->_set_temp($_POST);
                //$this->redirect('Index/install');
 				echo("<script language=\"JavaScript\">location.href='./install.php?m=Index&a=install';</script>");
				exit;
            }
        } else {
            $this->display();
        }
    }

    /**
     * ��װ
     */
    public function install() {
		$config_install = ROOT_PATH . '/data/install.lock';
		if (file_exists($config_install)) {
			exit("���ã��Ѿ���װ���ˡ��������Ҫ���°�װ����ֱ��ɾ�� \"data/install.lock\"���ɣ�����ļ�������dataĿ¼�¡�  <br> Ĭ�Ϻ�̨Ŀ¼�� http://��������/admin Ŀ¼��");
		}
		
        $this->assign('step_curr', 'install');
        $this->display();
    }

    /**
     * ��ʾ��װ����
     */
    public function show_process() {
		
					
		
		$config_install = ROOT_PATH . '/data/install.lock';
		if (file_exists($config_install)) {
			exit("���ã��Ѿ���װ���ˡ��������Ҫ���°�װ����ֱ��ɾ�� \"data/install.lock\"���ɣ�����ļ�������dataĿ¼�¡�  <br> Ĭ�Ϻ�̨Ŀ¼�� http://��������/admin Ŀ¼��");
		}
        $charset = C('DEFAULT_CHARSET');
        header('Content-type:text/html;charset=' . $charset);
		set_time_limit(0);
        ob_start();
		//��ʼ�������ݿ�
		$temp_info = include_once(DATA_PATH . 'install.temp.php');
		
		
		
		
		
		
        $conn = mysql_connect($temp_info['db_host'] . ':' . $temp_info['db_port'], $temp_info['db_user'], $temp_info['db_pass']);
        $version = mysql_get_server_info();
        $charset = "utf8";
		
		
        if ($version > '4.1') {
            if ($charset != 'latin1') {
                mysql_query("SET character_set_connection={$charset}, character_set_results={$charset}, character_set_client=binary", $conn);
            }if ($version > '5.0.1') {
                mysql_query("SET sql_mode=''", $conn);
            }
        }
        $selected_db = mysql_select_db($temp_info['db_name'], $conn);
        //�������ݱ�
        echo L('create_table_begin') . '<br />';
        $sqls = $this->_get_sql(APP_PATH . '/Sql_data/create_table.sql');



		
	
       foreach ($sqls as $sql) {
            //�滻ǰ׺
            $sql = str_replace('`td6_', '`' . $temp_info['db_prefix'], $sql);
            //��ñ���
            $run = mysql_query($sql, $conn);
            if (substr($sql, 0, 12) == 'CREATE TABLE') {
                $table_name = $temp_info['db_prefix'] . preg_replace("/CREATE TABLE `" . $temp_info['db_prefix'] . "([a-z0-9_]+)` .*/is", "\\1", $sql);
                echo sprintf(L('create_table_successed'), $table_name) . '<br />';
                //flush();
                //ob_flush();
            }
        }
		
		
		
		
		
		
		
		/*
        //���Ĭ������
        echo L('insert_initdate_begin') . '<br />';
        $sqls = $this->_get_sql(APP_PATH . '/Sql_data/initdata.sql');
        //��ӹ���Ա�ʺ�
        $admin_pass = md5($temp_info['admin_pass']);
        $add_time = time();
        $sqls[] = "INSERT INTO `" . $temp_info['db_prefix'] . "admin` (`user_name`, `password`, `add_time`, `role_id`) VALUES " .
                "('" . $temp_info['admin_user'] . "', '" . $admin_pass . "', '" . $add_time . "', 1);";
        foreach ($sqls as $sql) {
            //�滻ǰ׺
            $sql = str_replace('`pp_', '`' . $temp_info['db_prefix'], $sql);
            //��ñ���
            if (substr($sql, 0, 11) == 'INSERT INTO') {
                $table_name = $temp_info['db_prefix'] . preg_replace("/INSERT INTO `" . $temp_info['db_prefix'] . "([a-z0-9_]+)` .* /is", "\\1", $sql);
                $run = mysql_query($sql, $conn);
                echo sprintf(L('insert_initdate_successed'), $table_name) . '<br />';
                flush();
                ob_flush();
            }
        }
		*/
       //�޸������ļ�
        $config_file = ROOT_PATH . '/data/config.inc.php';
        $config_data = array();
        $config_data['DB_HOST'] = $temp_info['db_host'];
        $config_data['DB_NAME'] = $temp_info['db_name'];
        $config_data['DB_USER'] = $temp_info['db_user'];
        $config_data['DB_PWD'] = $temp_info['db_pass'];
        $config_data['DB_PORT'] = $temp_info['db_port'];
        $config_data['DB_PREFIX'] = $temp_info['db_prefix'];
		
        file_put_contents($config_file, "<?php\r\nreturn " . var_export($config_data, true) . "; \r\n?>");
		
		
        /**/
		global $manage_adminname;
		global $manage_adminpass;
		global $rootroad;
		global $sitetitleurl;
		
			
		
		//����˺�����
        $manage_adminname = $temp_info['admin_user'];
        $manage_adminpass = md5($temp_info['admin_pass']);
		$rootroad = str_replace("/install.php","",$_SERVER['SCRIPT_NAME']);
		$sitetitleurl = "http://".$_SERVER['SERVER_NAME'];
		
		saveConfigFile();
		exit;
    }

    /**
     * ��װ���
     */
    public function finish() {
        $this->assign('step_curr', 'finish');
		
		
		
        //������װ����
        touch(ROOT_PATH . '/data/install.lock');
        $this->display();
        //ɾ����װĿ¼
        //import("ORG.Io.Dir");
        //Dir::delDir(APP_PATH);
        //unlink('./install.php');
    }
    public function noinstall() {
		
		$config_install = ROOT_PATH . '/data/install.lock';
		if (file_exists($config_install)) {
			exit("���ã��Ѿ���װ���ˡ��������Ҫ���°�װ����ֱ��ɾ�� \"data/install.lock\"���ɣ�����ļ�������dataĿ¼�¡�  <br> Ĭ�Ϻ�̨Ŀ¼�� http://��������/admin Ŀ¼��");
		}
		
        $config_file = ROOT_PATH . '/data/config.inc.php';
        $config_data = array();
        $config_data['DB_HOST'] = "noinstall_taodiv6_not";
        $config_data['DB_NAME'] = $temp_info['db_name'];
        $config_data['DB_USER'] = $temp_info['db_user'];
        $config_data['DB_PWD'] = $temp_info['db_pass'];
        $config_data['DB_PORT'] = $temp_info['db_port'];
        $config_data['DB_PREFIX'] = $temp_info['db_prefix'];
		
        file_put_contents($config_file, "<?php\r\nreturn " . var_export($config_data, true) . "; \r\n?>");
		echo("<script language=\"JavaScript\">location.href='install.php?m=Index&a=finish';</script>");
		exit;
    }

    private function _set_temp($temp_data) {
        $file = DATA_PATH . 'install.temp.php';
        $temp_data = array(
            'db_host' => $temp_data['db_host'],
            'db_port' => $temp_data['db_port'],
            'db_user' => $temp_data['db_user'],
            'db_pass' => $temp_data['db_pass'],
            'db_name' => $temp_data['db_name'],
            'db_prefix' => $temp_data['db_prefix'],
            'admin_user' => $temp_data['admin_user'],
            'admin_pass' => $temp_data['admin_pass'],
            'admin_email' => $temp_data['admin_email'],
        );
        file_put_contents($file, "<?php\r\nreturn " . var_export($temp_data, true) . "; \r\n?>");
    }

    private function _get_sql($sql_file) {
        $contents = file_get_contents($sql_file);
        $contents = str_replace("\r\n", "\n", $contents);
        $contents = trim(str_replace("\r", "\n", $contents));
        $return_items = $items = array();
        $items = explode(";\n", $contents);

        foreach ($items as $item) {
            $return_item = '';
            $item = trim($item);
            $lines = explode("\n", $item);
            foreach ($lines as $line) {
                if (isset($line[1]) && $line[0] . $line[1] == '--') {
                    continue;
                }
                $return_item .= $line;
            }
            if ($return_item) {
                $return_items[] = $return_item; //.";";
            }
        }
        return $return_items;
    }

    public function is_email($email) {
        $chars = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,5}\$/i";
        if (strpos($email, '@') !== false && strpos($email, '.') !== false) {
            if (preg_match($chars, $email)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}