<?php
// ������ϵͳ�Զ����ɣ�����������;
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
		
				
				
				//$this->success('��¼�ɹ���',u('manage'));
				echo("<script language=\"JavaScript\">location.href='./index.php?m=Index&a=manage';</script>");
				exit;
				exit;
		
			}else{

				if($adminuser!=$manage_adminname){
					echo("<script language=\"JavaScript\">alert(\"�˺Ŵ�������������ȷ�˺š�\");history.go(-1);</script>");
					exit;
				}else{
					echo("<script language=\"JavaScript\">alert(\"�����������������ȷ���롣\");history.go(-1);</script>");
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