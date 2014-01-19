<?php   
class SubPages{   
     
  private  $each_disNums;//每页显示的条目数   
  private  $nums;//总条目数   
  private  $current_page;//当前被选中的页   
  private  $sub_pages;//每次显示的页数   
  private  $pageNums;//总页数   
  private  $page_array = array();//用来构造分页的数组   
  private  $subPage_link;//每个分页的链接   
  private  $subPage_type;//显示分页的类型   
  private  $wjt_htm;
  
  function __construct($each_disNums,$nums,$current_page,$sub_pages=10,$subPage_type = 1){   
  	global $wjtpagehz;
  	global $pagenums;
	if($weijingtai=="1"){
		$this->wjt_htm=$wjtpagehz;
	}
   $this->each_disNums=intval($each_disNums);   
   $this->nums=intval($nums);   
    if(!$current_page){   
    $this->current_page=1;   
    }else{   
    $this->current_page=intval($current_page);   
    }
		
   $this->sub_pages=intval($sub_pages);   
   $this->subPage_type=intval($subPage_type);   
   $this->pageNums=ceil($nums/$each_disNums)>$pagenums ? $pagenums : ceil($nums/$each_disNums);   
   
  }   
 
  function __destruct(){   
    unset($each_disNums);   
    unset($nums);   
    unset($current_page);   
    unset($sub_pages);   
    unset($pageNums);   
    unset($page_array);   
    unset($subPage_link);   
    unset($subPage_type);   
   }   
 
  function show(){   
  	$subPage_type = $this->subPage_type;
    if($subPage_type == 1){   
    return $this->subPageCss1();   
    }elseif ($subPage_type == 2){   
    return $this->subPageCss2();   
    }elseif ($subPage_type == 3) {
    return $this->subPageCss3();   
	}
   }   
     
 
  function initArray(){   
    for($i=0;$i<$this->sub_pages;$i++){   
    $this->page_array[$i]=$i;   
    }   
    return $this->page_array;   
   }   
      
  function construct_num_Page(){   
    if($this->pageNums < $this->sub_pages){   
    $current_array=array();   
     for($i=0;$i<$this->pageNums;$i++){    
     $current_array[$i]=$i+1;   
     }   
    }else{   
    $current_array=$this->initArray();   
     if($this->current_page <= 3){   
      for($i=0;$i<count($current_array);$i++){   
      $current_array[$i]=$i+1;   
      }   
     }elseif ($this->current_page <= $this->pageNums && $this->current_page > $this->pageNums - $this->sub_pages + 1 ){   
      for($i=0;$i<count($current_array);$i++){   
      $current_array[$i]=($this->pageNums)-($this->sub_pages)+1+$i;   
      }   
     }else{   
      for($i=0;$i<count($current_array);$i++){   
      $current_array[$i]=$this->current_page-2+$i;   
      }   
     }   
    }   
      
    return $current_array;   
   }   

  function setpageurl($num){
	global $TaoConfig,$_GET,$_SERVER;
			$script_name=$_SERVER["SCRIPT_NAME"];
			$this->subPage_link=$script_name;
	
		
		if($TaoConfig["WJTconfig"]["weijingtai"]=="1"){
			
			$url = $this->subPage_link;
			if($TaoConfig["WJTconfig"]["pagetype"]=="rewrite"){
				$url = substr($url,0,strlen($url)-strlen(".php"));
			}
			
			
			if(!empty($_GET["rule"])){
				$string = $url."/".$_GET["rule"];
			}else{
				$string = $url;
			}
			
			
			
			$pattern = "/page\/([0-9]*$)/i";  
			$replacement = "page/".$num;
			
			if(preg_match($pattern,$string)){
				$url = preg_replace($pattern, $replacement, $string);  
			}else{
				$url = $string."/page/".$num;
			}
			$url.=$TaoConfig["WJTconfig"]["pagehz"];
			
			
		} else { 
			$this->subPage_link.='?'.$_SERVER['QUERY_STRING'];
			
			$url = $this->subPage_link;
			$string = $url;
		
			$pattern = "/page=([0-9]*$)/i";  
			$replacement = "page=".$num;
	
			if(preg_match($pattern,$string)){
				$url = preg_replace($pattern, $replacement, $string);  
			}else{
				$url = $string."&page=".$num;
			}
			$url = str_replace("?&","?",$url);
		}
		
		
	return  $url;
  }


  function subPageCss1(){   
   $subPageCss2Str="";   
   //$subPageCss2Str.="当前第".$this->current_page."页 / 共".$this->pageNums."页";   
      
    if($this->current_page > 1){   
		$firstPageUrl=$this->setpageurl(1);   
		$prewPageUrl=$this->setpageurl($this->current_page-1);   
		
		$subPageCss2Str.="<div class='page1'><a href='$firstPageUrl'><<</a></div>";   
		$subPageCss2Str.="<div class='page1'><a href='$prewPageUrl' title='转到上一页'><</a></div>";   
    }else {   
		$subPageCss2Str.="";   
		$subPageCss2Str.="";   
    }   
      
   $a=$this->construct_num_Page();   
    for($i=0;$i<count($a);$i++){   
    $s=$a[$i];   
     if($s == $this->current_page ){   
     $subPageCss2Str.="<div class='page1 page2'>".$s."</div>";   
     }else{   
     $url=$this->setpageurl($s);   
     $subPageCss2Str.="<div class='page1'><a href='$url'>".$s."</a></div>";   
     }   
    }   
      
    if($this->current_page < $this->pageNums){   
    $lastPageUrl=$this->setpageurl($this->pageNums);   
    $nextPageUrl=$this->setpageurl($this->current_page+1);   
    $subPageCss2Str.="<div class='page1'><a href='$nextPageUrl' title='转到下一页'>></a></div>";   
    $subPageCss2Str.="<div class='page1'><a href='$lastPageUrl'>>></a></div> ";   
    }else {   
    $subPageCss2Str.="";   
    $subPageCss2Str.="";   
    }   
	  
	  return $subPageCss2Str;
   }   
     

  function subPageCss2(){   
   $subPageCss2Str="";   
   //$subPageCss2Str.="当前第".$this->current_page."页 / 共".$this->pageNums."页";   
      
    if($this->current_page > 1){   
		$firstPageUrl=$this->setpageurl(1);   
		$prewPageUrl=$this->setpageurl($this->current_page-1);   
	
    $subPageCss2Str.="<a href='$firstPageUrl'>首页</a>";   
    $subPageCss2Str.="<a href='$prewPageUrl' title='转到上一页'>上一页</a>";   
    }else {   
    $subPageCss2Str.="";   
    $subPageCss2Str.="";   
    }   
      
   $a=$this->construct_num_Page();   
    for($i=0;$i<count($a);$i++){   
    $s=$a[$i];   
     if($s == $this->current_page ){   
     $subPageCss2Str.="<span>".$s."</span>";   
     }else{   
     $url=$this->setpageurl($s);   
     $subPageCss2Str.="<a href='$url'>".$s."</a>";   
     }   
    }   
      
    if($this->current_page < $this->pageNums){   
    $lastPageUrl=$this->setpageurl($this->pageNums);   
    $nextPageUrl=$this->setpageurl($this->current_page+1);   
    $subPageCss2Str.="<a href='$nextPageUrl' title='转到下一页'>下一页</a>";   
    $subPageCss2Str.="<a href='$lastPageUrl'>尾页</a> ";   
    }else {   
    $subPageCss2Str.="";   
    $subPageCss2Str.="";   
    }   

	  return $subPageCss2Str;
   }   
}   
?>