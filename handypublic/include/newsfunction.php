<?php
//织梦数据库调用代码

$addarticletype = $applicationarray["addarticletype"];

if(is_array($addarticletype["dede"])) {
	$open_dede=$addarticletype["dede"]["open_dede"];
	$folder_dede=$addarticletype["dede"]["folder_dede"];
	$guolv_dede="0,".$addarticletype["dede"]["guolv_dede"].",";
}

if(is_array($addarticletype["discuz"])) {
	$open_discuz=$addarticletype["discuz"]["open_discuz"];
	$folder_discuz=$addarticletype["discuz"]["folder_discuz"];
	$guolv_discuz="0,".$addarticletype["discuz"]["guolv_discuz"].",";
}
if(is_array($addarticletype["discuzx2"])) {
	$open_discuzx2=$addarticletype["discuzx2"]["open_discuzx2"];
	$folder_discuzx2=$addarticletype["discuzx2"]["folder_discuzx2"];
	$guolv_discuzx2="0,".$addarticletype["discuzx2"]["guolv_discuzx2"].",";
}
if(is_array($addarticletype["wordpress"])) {
	$open_wordpress=$addarticletype["wordpress"]["open_wordpress"];
	$folder_wordpress=$addarticletype["wordpress"]["folder_wordpress"];
	$guolv_wordpress="0,".$addarticletype["wordpress"]["guolv_wordpress"].",";
}
if(is_array($addarticletype["phpwind"])) {
	$open_phpwind=$addarticletype["phpwind"]["open_phpwind"];
	$folder_phpwind=$addarticletype["phpwind"]["folder_phpwind"];
	$guolv_phpwind="0,".$addarticletype["phpwind"]["guolv_phpwind"].",";
	
}



$limit_article = empty($addarticletype["num_article"])?1:$addarticletype["num_article"];

$newslist = array();

//织梦的整合代码
if($open_dede=="1" && is_file(WEBROOT.$folder_dede."/include/common.inc.php")) {
	require_once(WEBROOT.$folder_dede.'/include/common.inc.php');
	require_once(WEBROOT.$folder_dede.'/include/arc.listview.class.php');
	
	$dede_list = array();
	
	$dsql->SetQuery("Select id,typename,typedir,siteurl,sitepath 
	                                        from `#@__arctype` where ispart<>2 And ishidden<>1 order by sortrank asc,id asc");
	$dsql->Execute();
	
	$clist  = array();
	while($rowArtType = $dsql->GetArray()) {
		if(strpos(",".$guolv_dede.",",",".$rowArtType["id"].",")==0){
			$clist[] = $rowArtType;
		}
	}


		foreach( $clist as $rowArtType){
			
			$rowArtType["typedir"] = str_replace("{cmspath}",$rootroad."/".$folder_dede,$rowArtType["typedir"]);
 			$artlist = array();
			
			$arttype = array();
			$arttype["id"] = $rowArtType["id"];
			$arttype["typename"] = (strtolower($cfg_db_language)=="gbk"?$rowArtType["typename"]:Newiconv("UTF-8","GBK",$rowArtType["typename"]));
			$arttype["typedir"] = $rowArtType["typedir"];
			
			$dsql->setQuery("select id,typeid,click,title,pubdate,color,keywords,description,filename from #@__archives where typeid='".$rowArtType["id"]."' and arcrank<>-2 and arcrank<>-1 order by pubdate desc limit $limit_article;");
			$dsql->Execute();
			
			while($result = $dsql->getArray())
			{
				$arrtemp = $result;
				$aid = ereg_replace('[^0-9]','',$result["id"]);
			
				//获取主表信息
				$query = "Select arc.*,ch.maintable,ch.addtable,ch.issystem,ch.editcon,
						  tp.typedir,tp.typename,tp.corank,tp.namerule,tp.namerule2,tp.ispart,tp.moresite,tp.sitepath,tp.siteurl
					   From `#@__arctiny` arc
					   left join `#@__arctype` tp on tp.id=arc.typeid
					   left join `#@__channeltype` ch on ch.id=tp.channeltype
					   where arc.id='$aid' ";
				$trow = $dsql->GetOne($query);
				$trow['maintable'] = ( trim($trow['maintable'])=='' ? '#@__archives' : trim($trow['maintable']) );
				if($trow['issystem'] != -1)
				{
					$arcQuery = "Select arc.*,tp.typedir,tp.typename,tp.corank,tp.namerule,tp.namerule2,tp.ispart,tp.moresite,tp.sitepath,tp.siteurl
							   from `{$trow['maintable']}` arc left join `#@__arctype` tp on arc.typeid=tp.id
							   left join `#@__channeltype` ch on ch.id=arc.channel where arc.id='$aid' ";
					$arcRow = $dsql->GetOne($arcQuery);
				}
				else
				{
					$arcRow['id'] = $aid;
					$arcRow['typeid'] = $trow['typeid'];
					$arcRow['senddate'] = $trow['senddate'];
					$arcRow['title'] = '';
					$arcRow['ismake'] = 1;
					$arcRow['arcrank'] = $trow['corank'];
					$arcRow['namerule'] = $trow['namerule'];
					$arcRow['typedir'] = $trow['typedir'];
					$arcRow['money'] = 0;
					$arcRow['filename'] = '';
					$arcRow['moresite'] = $trow['moresite'];
					$arcRow['siteurl'] = $trow['siteurl'];
					$arcRow['sitepath'] = $trow['sitepath'];
				}
				$arcurl  = GetFileUrl($arcRow['id'],$arcRow['typeid'],$arcRow['senddate'],$arcRow['title'],$arcRow['ismake'],$arcRow['arcrank'],$arcRow['namerule'],$arcRow['typedir'],$arcRow['money'],$arcRow['filename'],$arcRow['moresite'],$arcRow['siteurl'],$arcRow['sitepath']);
				$arcfile = GetFileUrl($arcRow['id'],$arcRow['typeid'],$arcRow['senddate'],$arcRow['title'],$arcRow['ismake'],$arcRow['arcrank'],$arcRow['namerule'],$arcRow['typedir'],$arcRow['money'],$arcRow['filename']);
				if(eregi('^http:',$arcfile))
				{
					//$arcfile = eregi_replace("^http://([^/]*)/",$rootroad."/".$folder_dede.'/',$arcfile);
				}
				$arrtemp["arcurl"] = $arcfile;
				
				$newstmp = array();
				$newstmp["id"] = $arrtemp["id"];
				$newstmp["title"] = (strtolower($cfg_db_language)=="gbk"?$arrtemp["title"]:Newiconv("UTF-8","GBK",$arrtemp["title"]));
				$newstmp["url"] = "".$arrtemp["arcurl"];
				$newstmp["date"] = $arrtemp["pubdate"];
				
				
				$artlist[] = $newstmp;
			}
			
			$arttype["artlist"] = $artlist;
			
			//if(count($artlist) >= $limit_article) {
				$newslist[] = $arttype;
			//}
			
		}

}

//discuz 的整合代码
if($open_discuz=="1" && is_file(WEBROOT.$folder_discuz."/config.inc.php")) {
	
	
	require_once WEBROOT.$folder_discuz.'/config.inc.php';

	$DBlink = mysql_connect($dbhost,$dbuser,$dbpw);
	if(!$DBlink) 
	{
		echo "数据库连接错误！";
		exit();
	}
	mysql_select_db($dbname,$DBlink);
	mysql_query("SET NAMES ".$charset);


	$rsupdate = @mysql_query("select * from ".$tablepre."settings where variable='rewritestatus'");
	$discuzX2Rule = array();
	while($result=@mysql_fetch_array($rsupdate)){
		$rewritestatus = ($result["value"]);
	}


	$discuz_list = array();
	$query = @mysql_query("SELECT fid,fup,name,status FROM ".$tablepre."forums WHERE displayorder!=-1 and type='forum' order by displayorder asc,fid desc");

	$discuz_forums = array();

	$artlist = array();
	while($sub = @mysql_fetch_array($query)) {


		if(strpos(",".$guolv_discuz.",",",".$sub["fid"].",")==0){
			$sub['url'] = !($rewritestatus & 1) ? $rootroad."/".$folder_discuz."/forumdisplay.php?fid=".$sub["fid"] : $rootroad."/".$folder_discuz."/forum-".$sub['fid']."-1.html";
	
			$arttype = array();
			$arttype["typename"] = (strtolower($charset)=="gbk"?$sub["name"]:Newiconv("UTF-8","GBK",$sub["name"]));
			$arttype["typedir"] = $sub['url'];
			$arttype["id"] = $sub['fid'];
			$discuz_forums[] = $arttype;
		}

		
	}
	
	foreach($discuz_forums as $arrforums) {
		
		$query = @mysql_query("SELECT tid,fid,typeid,author,subject,dateline,lastpost,lastposter FROM {$tablepre}threads WHERE fid=".$arrforums['id']." and displayorder=0 order by tid desc limit $limit_article");
		$discuz_thread = array();
		while($sub = @mysql_fetch_array($query)) {
			$sub['url'] = !($rewritestatus & 2) ? $rootroad."/".$folder_discuz."/viewthread.php?tid=".$sub["tid"] : $rootroad."/".$folder_discuz."/thread-".$sub['tid']."-1-1.html";
				$newstmp = array();
				$newstmp["id"] = $sub["tid"];
				$newstmp["title"] = (strtolower($charset)=="gbk"?$sub["subject"]:Newiconv("UTF-8","GBK",$sub["subject"]));
				$newstmp["url"] = $sub["url"];
				$newstmp["date"] = $sub["dateline"];
				
			$discuz_thread[] = $newstmp;
		}

				
				$arrforums["artlist"] = $discuz_thread;
		
		//if(count($discuz_thread) >= $limit_article) {
			$newslist[] = $arrforums;
		//}
	}
}

//discuz X2 的整合代码
if($open_discuzx2=="1" && is_file(WEBROOT.$folder_discuzx2."/config/config_global.php")) {
	require_once WEBROOT.$folder_discuzx2."/config/config_global.php";

	
	$DBlink = mysql_connect($_config['db']['1']['dbhost'],$_config['db']['1']['dbuser'],$_config['db']['1']['dbpw']);
	if(!$DBlink) 
	{
		echo "数据库连接错误！";
		exit();
	}
	mysql_select_db($_config['db']['1']['dbname'],$DBlink);
	mysql_query("SET NAMES ".$_config['db']['1']['dbcharset']);
	
	$rsupdate = @mysql_query("select skey,svalue from ".$_config['db']['1']['tablepre']."common_setting where skey='rewriterule' or skey='rewritestatus'");
	$discuzX2Rule = array();
	while($result=@mysql_fetch_array($rsupdate)){
		$discuzX2Rule[$result["skey"]] = unserialize($result["svalue"]);
	}

	$discuzX2Rule['rewriterule']["forum_forumdisplay"] = str_replace("{page}",1,$discuzX2Rule['rewriterule']["forum_forumdisplay"]);
	$discuzX2Rule['rewriterule']["forum_viewthread"] = str_replace("{page}",1,$discuzX2Rule['rewriterule']["forum_viewthread"]);
	$discuzX2Rule['rewriterule']["forum_viewthread"] = str_replace("{prevpage}",1,$discuzX2Rule['rewriterule']["forum_viewthread"]);
	
	$rsupdate = @mysql_query("select  fid,name from ".$_config['db']['1']['tablepre']."forum_forum where type='forum' order by displayorder asc,fid asc");
	
	while($result=@mysql_fetch_array($rsupdate))
	{
			$arttype = array();
			$arttype["id"] = $result["fid"];

		if(strpos(",".$guolv_discuzx2.",",",".$result["fid"].",")==0){


			$arttype["typename"] = (strtolower($_config['db']['1']['dbcharset'])=="gbk"?$result["name"]:Newiconv("UTF-8","GBK",$result["name"]));;
			$arttype["typedir"] =  $rootroad."/".$folder_discuzx2.(in_array('forum_forumdisplay', $discuzX2Rule['rewritestatus'])?"/".str_replace("{fid}",$result["fid"],$discuzX2Rule['rewriterule']["forum_forumdisplay"]):"/forum.php?mod=forumdisplay&fid=".$result["fid"]);
			$arttype["artlist"] = array();
			
			$rslist = @mysql_query("select tid,subject,dateline from ".$_config['db']['1']['tablepre']."forum_thread where fid='".$result["fid"]."' and displayorder=0 order by dateline desc limit $limit_article");
				while($resultlist=@mysql_fetch_array($rslist)) {
					
					$newstmp = array();
					$newstmp["id"] = $resultlist["tid"];
					$newstmp["title"] = (strtolower($_config['db']['1']['dbcharset'])=="gbk"?$resultlist["subject"]:Newiconv("UTF-8","GBK",$resultlist["subject"]));
					$newstmp["url"] = $rootroad."/".$folder_discuzx2.(in_array('forum_viewthread', $discuzX2Rule['rewritestatus'])?"/".str_replace("{tid}",$resultlist["tid"],$discuzX2Rule['rewriterule']["forum_viewthread"]):"/forum.php?mod=viewthread&tid=".$resultlist["tid"]);
					$newstmp["date"] = $resultlist["dateline"];
					$arttype["artlist"][] = $newstmp;
				}
				
			//if(count($arttype["artlist"]) >= $limit_article) {
				$newslist[] = $arttype;
			//}
		}
	}
	
}

//wordpress 的整合代码：
if($open_wordpress=="1" && is_file(WEBROOT.$folder_wordpress."/wp-config.php") && $open_dede!="1" ) {
	require_once WEBROOT.$folder_wordpress."/wp-config.php";
	require_once WEBROOT.$folder_wordpress."/wp-includes/link-template.php";


	
	
	$DBlink = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
	if(!$DBlink) 
	{
		echo "数据库连接错误！";
		exit();
	}
	mysql_select_db(DB_NAME,$DBlink);
	mysql_query("SET NAMES ".DB_CHARSET);

	$rsupdate = @mysql_query("select ".$table_prefix."terms.term_id,".$table_prefix."term_taxonomy.term_taxonomy_id,name from ".$table_prefix."terms inner join ".$table_prefix."term_taxonomy on ".$table_prefix."terms.term_id = ".$table_prefix."term_taxonomy.term_id where taxonomy='category'");
	while($result=@mysql_fetch_array($rsupdate))
	{
			$arttype = array();
			$arttype["id"] = $result["term_id"];

		if(strpos(",".$guolv_wordpress.",",",".$arttype["id"].",")==0){

			$arttype["typename"] = (strtolower(DB_CHARSET)=="gbk"?$result["name"]:Newiconv("UTF-8","GBK",$result["name"]));
			$arttype["typedir"] =  $rootroad."/".$folder_wordpress."/?cat=".$result["term_id"];
			$arttype["typedir"] =  get_category_link($result["term_id"]);
			$arttype["artlist"] = array();
			$sql = "select ID,post_title,(post_date) as post_date  from ".$table_prefix."posts inner join ".$table_prefix."term_relationships on ".$table_prefix."posts.id=".$table_prefix."term_relationships.object_id where ".$table_prefix."term_relationships.term_taxonomy_id='".$result["term_taxonomy_id"]."' and ".$table_prefix."posts.post_status='publish' order by ID desc limit $limit_article";
			$rslist = @mysql_query($sql);
				while($resultlist=@mysql_fetch_array($rslist)) {
					
					$newstmp = array();
					$newstmp["id"] = $resultlist["ID"];
					$newstmp["title"] = (strtolower(DB_CHARSET)=="gbk"?$resultlist["post_title"]:Newiconv("UTF-8","GBK",$resultlist["post_title"]));
					$newstmp["url"] = $rootroad."/".$folder_wordpress."/?p=".$resultlist["ID"];
					$newstmp["url"] = get_permalink($resultlist["ID"]);
					$newstmp["date"] = ($resultlist["post_date"]);
					$arttype["artlist"][] = $newstmp;
				}
				
			//if(count($arttype["artlist"]) >= $limit_article) {
				$newslist[] = $arttype;
			//}

		}
	}
	
	
}

//phpwind 的整合代码：
if($open_phpwind=="1" && is_file(WEBROOT.$folder_phpwind."/data/sql_config.php") ) {
	require_once WEBROOT.$folder_phpwind."/data/sql_config.php";


	$DBlink = mysql_connect($dbhost,$dbuser,$dbpw);
	if(!$DBlink) 
	{
		echo "数据库连接错误！";
		exit();
	}
	mysql_select_db($dbname,$DBlink);
	mysql_query("SET NAMES ".$charset);

	$rsupdate = @mysql_query("select  fid,name from ".$PW."forums where type='forum'");
	
	while($result=@mysql_fetch_array($rsupdate))
	{

		
			$arttype = array();
			$arttype["id"] = $result["fid"];

		if(strpos(",".$guolv_phpwind.",",",".$result["fid"].",")==0){


			$arttype["typename"] = (strtolower($charset)=="gbk"?$result["name"]:Newiconv("UTF-8","GBK",$result["name"]));;
			$arttype["typedir"] =  $rootroad."/".$folder_phpwind."/thread.php?fid=".$result["fid"];
			$arttype["artlist"] = array();
			
			$rslist = @mysql_query("select tid,subject,postdate from ".$PW."threads where fid='".$result["fid"]."' order by postdate desc limit $limit_article");
				while($resultlist=@mysql_fetch_array($rslist)) {
					
					$newstmp = array();
					$newstmp["id"] = $resultlist["tid"];
					$newstmp["title"] = (strtolower($charset)=="gbk"?$resultlist["subject"]:Newiconv("UTF-8","GBK",$resultlist["subject"]));
					$newstmp["url"] = $rootroad."/".$folder_phpwind."/read.php?tid=".$resultlist["tid"];
					$newstmp["date"] = $resultlist["postdate"];
					$arttype["artlist"][] = $newstmp;
				}
				
			//if(count($arttype["artlist"]) >= $limit_article) {
				$newslist[] = $arttype;
			//}
		}
	}
	
}


?>