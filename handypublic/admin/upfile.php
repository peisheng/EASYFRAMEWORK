<?php 
require_once '../include/adminfunction.php';

checkadmin();

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<title>上传图片</title>
<link rel='stylesheet' href='images/order.css'>
<style>
body{margin:0;}
</style>
</head>
<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0">

<?php


$filename = var_request("filename","");
$formID = var_request("formID","");
$strParm = "filename=".$filename."&formID=".$formID;


if(!empty($_GET[submit])) { 	
	$path="../uploadfile/admin/"; //上传路径 	//echo $_FILES["filename"]["type"]; 	
	
	if($filename == "xtaoAuth"){
		
		$path = "../";
		
		
		if($_FILES["filename"]["name"]!="xtaoAuth.html" && $_FILES["filename"]["name"]!="root.txt" ) 	{ 		
			echo "验证文件格式不对！"; 		
			echo("<input type=\"button\" name=\"Submit\" value=\"重新上传\" onClick=\"history.go(-1);\">");		
			exit; 	
		}//END IF
		
	}
	
	if($_FILES["filename"]["name"])  { 		
		$file1=$_FILES["filename"]["name"]; 		
		$fileExt = File_extend($file1);
		$file2 = $path.time().".".$fileExt; 	
		if(!empty($filename)){
			$file2 = $path.$filename.".".$fileExt; 	
		}
			
		$flag=1; 	
	}//END IF 		
	
		if($filename == "xtaoAuth" || $filename=="root"){
			$result = _upload($_FILES['filename'],$path);
			echo"上传成功，文件 ".$result[0]["savename"]." 请点击验证按钮。";
			exit;
		}else{
			$result = _upload($_FILES['filename'],$path,uniqid);
			
			if($result) 	{ 		
				$filename = str_replace("../uploadfile",$rootroad."/uploadfile",$result[0]["savepath"]).$result[0]["savename"];
				
				$strParm = "filename=".$filename."&formID=".$formID;
				
				
				
				
				
				
				redirect_to(SETSERVERURL."?action=upfileEnd&".$strParm);
				exit;
			}
		}

}
?>
<table border="0" align="left" cellpadding="0" cellspacing="0">
  <form action="upfile.php?submit=1&<?php echo $strParm;?>" method="post" enctype="multipart/form-data" name="form1"><tr>
    <td height="25" align="center" valign="middle" bgcolor="#FFCCFF">
        <span class="STYLE2"></span>
        <input name="filename" type="file" id="filename" size="20">
        <!-- MAX_FILE_SIZE must precede the file input field -->
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <input type="submit" name="Submit" value="上传">
  </td>
  </tr>  </form>
</table>
</body>
</html>