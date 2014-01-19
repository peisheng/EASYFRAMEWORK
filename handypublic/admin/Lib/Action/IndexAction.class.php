<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
	
		if(checkadminHT()) {
				echo("<script language=\"JavaScript\">location.href='./index.php?m=Index&a=manage';</script>");
				exit;
		}

		//dump($Data);
        $this->display();
		
    }

    public function login(){
			$adminuser = var_request("username","");
			$adminpass = md5(var_request("password",""));
			global $manage_adminname;
			global $manage_adminpass;
			
			if($adminuser==$manage_adminname && $adminpass == $manage_adminpass){
				SetCookie("COOKIEadminuser", $adminuser,time()+3600*24,"/");  
				$_SESSION['adminuser'] = $adminuser;
				SetCookie("COOKIEadminpass", var_request("password",""),time()+3600*24,"/");  
				$_SESSION['adminpass'] = var_request("password","");
		
				
				
				//$this->success('登录成功！',u('manage'));
				echo("<script language=\"JavaScript\">location.href='./index.php?m=Index&a=manage';</script>");
				exit;
				exit;
		
			}else{

				if($adminuser!=$manage_adminname){
					echo("<script language=\"JavaScript\">alert(\"账号错误，请重新填正确账号。\");history.go(-1);</script>");
					exit;
				}else{
					echo("<script language=\"JavaScript\">alert(\"密码错误，请重新填正确密码。\");history.go(-1);</script>");
					exit;
				}
			}		
	  
        //$this->display("index");
    }
    public function loginout(){
				$_SESSION['adminuser'] = "";
		
				SetCookie("COOKIEadminuser", "",time()-3600*24,"/");  
		
				echo("<script language=\"JavaScript\">location.href='./index.php?m=Index&a=index';</script>");
				exit;
	}
    public function manage(){
		if(!checkadminHT()) {
			$this->redirect("index");
		}
		
        $this->display();
		
	}
    public function left(){
		if(!checkadminHT()) {
			$this->redirect("index");
		}
		
        $this->display();
		
	}
    public function top(){
		
        $this->display();
		
	}
	
	
}