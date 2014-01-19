<?php
if(is_file(dirname(__FILE__)."/"."global.php")){
require_once dirname(__FILE__)."/".'global.php';
}
error_reporting(7);
phpversion() >= '5.1.0' && date_default_timezone_set('UTC');
header("Content-Type: text/html; charset=utf-8");


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<title>淘客帝国版本：<?php echo Newiconv("GBK","UTF-8",VERSON);?></title>
<meta name="keywords" content="9Gan PHP探针,PHP探针,PHP探针下载,PHP空间探针,PHP服务器探针,PHP探针程序,探针" />

<style type="text/css">
<!--
* {font-family: Tahoma, "Microsoft Yahei", Arial; }
body{text-align: center; margin: 0 auto; padding: 0; background-color:#FFFFFF;font-size:12px;font-family:Tahoma, Arial}
h1 {font-size: 23px; font-weight: normal; padding: 0; margin: 0;}
h1 a {color: #00BCFF; }
h1 small {font-size: 11px; font-family: Tahoma; font-weight: bold; color: #999;}
a{color: #00BCFF; text-decoration:none;}
a.black{color: #000; text-decoration:none;}
b{color: #00CF91;}
table{clear:both;padding: 0; margin: 0 0 10px;border-collapse:collapse; border-spacing: 0;}
th{padding: 3px 6px; font-weight:bold;background:#D7E9FB;color:#000;}
tr{padding: 0; background:#FFF;}
td{padding: 3px 6px; border:1px solid #D7E9FB;}
input{padding: 2px; background: #FFF; border-top:1px solid #666; border-left:1px solid #666; border-right:1px solid #CCC; border-bottom:1px solid #CCC; font-size:12px}
input.btn{font-weight: bold; height: 20px; line-height: 20px; padding: 0 6px; color:#FFF; background: #10AF7B; border-top:1px solid #65DAB4; border-left:1px solid #65DAB4; border-right:1px solid #1A664E; border-bottom:1px solid #1A664E; font-size:12px}
.bar {border:1px solid #000; height:5px; font-size:2px; width:60%; margin:2px 0 5px 0;}
.barli{background:#0EEF96; height:5px; margin:0; padding:0;}
#page {width: 920px; padding: 0 20px; margin: 0 auto; text-align: left;}
#header{position: relative; padding: 10px;}
#footer {padding: 15px 0; text-align: center; font-size: 11px; font-family: Tahoma, Verdana;}
#download {position: absolute; top: 20px; right: 10px; text-align: right; font-weight: bold; color: #06C;}
#download a {color: #00BCFF; text-decoration: underline;}
-->
</style>
</head>
<body>
<?php
//淘客帝国空间探针，可以检测空间是否能运行淘客帝国程序。

//本文件可以删除。
function Newiconv($_input_charset,$_output_charset,$input ) {

              $output = "";

              if($_input_charset == $_output_charset || $input ==null) {

                     $output = $input;

              } elseif (function_exists("mb_convert_encoding")){

                     $output = mb_convert_encoding($input,$_output_charset,$_input_charset);

              } elseif(function_exists("Newiconv")) {

                     $output = Newiconv($_input_charset,$_output_charset,$input);

              } else die("对不起，你的服务器系统无法进行字符转码.请联系空间商。");

              return $output;

       }

$apiip = $_GET["apiip"];

if(!empty($apiip)) { 

	class Taoapi_Util
	{
		/**** Public variables ****/
		/* user definable vars */
		var $host = "www.php.net"; // host name we are connecting to
		var $port = 80; // port we are connecting to
		var $proxy_host = ""; // proxy host to use
		var $proxy_port = ""; // proxy port to use
		var $proxy_user = ""; // proxy user to use
		var $proxy_pass = ""; // proxy password to use
		var $agent = "Snoopy v1.2.4"; // agent we masquerade as
		var $referer = ""; // referer info to pass
		var $cookies = array(); // array of cookies to pass
		// $cookies["username"]="joe";
		var $rawheaders = array(); // array of raw headers to send
		// $rawheaders["Content-type"]="text/html";
		var $maxredirs = 5; // http redirection depth maximum. 0 = disallow
		var $lastredirectaddr = ""; // contains address of last redirected address
		var $offsiteok = true; // allows redirection off-site
		var $maxframes = 0; // frame content depth maximum. 0 = disallow
		var $expandlinks = true; // expand links to fully qualified URLs.
		// this only applies to fetchlinks()
		// submitlinks(), and submittext()
		var $passcookies = true; // pass set cookies back through redirects
		// NOTE: this currently does not respect
		// dates, domains or paths.
		var $user = ""; // user for http authentication
		var $pass = ""; // password for http authentication
		// http accept types
		var $accept = "image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, */*";
		var $results = ""; // where the content is put
		var $error = ""; // error messages sent here
		var $response_code = ""; // response code returned from server
		var $headers = array(); // headers returned from server sent here
		var $maxlength = 500000; // max return data length (body)
		var $read_timeout = 0; // timeout on read operations, in seconds
		// supported only since PHP 4 Beta 4
		// set to 0 to disallow timeouts
		var $timed_out = false; // if a read operation timed out
		var $status = 0; // http request status
		var $temp_dir = "/tmp"; // temporary directory that the webserver
		// has permission to write to.
		// under Windows, this should be C:\temp
		var $curl_path = "/usr/local/bin/curl";
		// Snoopy will use cURL for fetching
		// SSL content if a full system path to
		// the cURL binary is supplied here.
		// set to false if you do not have
		// cURL installed. See http://curl.haxx.se
		// for details on installing cURL.
		// Snoopy does *not* use the cURL
		// library functions built into php,
		// as these functions are not stable
		// as of this Snoopy release.
		/**** Private variables ****/
		var $_maxlinelen = 4096; // max line length (headers)
		var $_httpmethod = "GET"; // default http request method
		var $_httpversion = "HTTP/1.0"; // default http request version
		var $_submit_method = "POST"; // default submit method
		var $_submit_type = "application/x-www-form-urlencoded"; // default submit type
		var $_mime_boundary = ""; // MIME boundary for multipart/form-data submit type
		var $_redirectaddr = false; // will be set if page fetched is a redirect
		var $_redirectdepth = 0; // increments on an http redirect
		var $_frameurls = array(); // frame src urls
		var $_framedepth = 0; // increments on frame depth
		var $_isproxy = false; // set if using a proxy server
		var $_fp_timeout = 30; // timeout for socket connection
		/*======================================================================*\
		Function:	fetch
		Purpose:	fetch the contents of a web page
					(and possibly other protocols in the
					future like ftp, nntp, gopher, etc.)
		Input:		$URI	the location of the page to fetch
		Output:		$this->results	the output text from the fetch
	\*======================================================================*/
		function fetch ($URI)
		{
			//preg_match("|^([^:]+)://([^:/]+)(:[\d]+)*(.*)|",$URI,$URI_PARTS);
			$URI_PARTS = parse_url($URI);
			if (! empty($URI_PARTS["user"]))
				$this->user = $URI_PARTS["user"];
			if (! empty($URI_PARTS["pass"]))
				$this->pass = $URI_PARTS["pass"];
			if (empty($URI_PARTS["query"]))
				$URI_PARTS["query"] = '';
			if (empty($URI_PARTS["path"]))
				$URI_PARTS["path"] = '';
			switch (strtolower($URI_PARTS["scheme"])) {
				case "http":
					$this->host = $URI_PARTS["host"];
					if (! empty($URI_PARTS["port"]))
						$this->port = $URI_PARTS["port"];
					if ($this->_connect($fp)) {
						if ($this->_isproxy) {
							// using proxy, send entire URI
							$this->_httprequest($URI, $fp, $URI, $this->_httpmethod);
						} else {
							$path = $URI_PARTS["path"] . ($URI_PARTS["query"] ? "?" . $URI_PARTS["query"] : "");
							// no proxy, send only the path
							$this->_httprequest($path, $fp, $URI, $this->_httpmethod);
						}
						$this->_disconnect($fp);
						if ($this->_redirectaddr) {
							/* url was redirected, check if we've hit the max depth */
							if ($this->maxredirs > $this->_redirectdepth) {
								// only follow redirect if it's on this site, or offsiteok is true
								if (preg_match("|^http://" . preg_quote($this->host) . "|i", $this->_redirectaddr) || $this->offsiteok) {
									/* follow the redirect */
									$this->_redirectdepth ++;
									$this->lastredirectaddr = $this->_redirectaddr;
									$this->fetch($this->_redirectaddr);
								}
							}
						}
						if ($this->_framedepth < $this->maxframes && count($this->_frameurls) > 0) {
							$frameurls = $this->_frameurls;
							$this->_frameurls = array();
							while (list (, $frameurl) = each($frameurls)) {
								if ($this->_framedepth < $this->maxframes) {
									$this->fetch($frameurl);
									$this->_framedepth ++;
								} else
									break;
							}
						}
					} else {
						$results = file_get_contents($URI);
						$this->results = $results;
					}
					return true;
					break;
				case "https":
					if (! $this->curl_path)
						return false;
					if (function_exists("is_executable"))
						if (! is_executable($this->curl_path))
							return false;
					$this->host = $URI_PARTS["host"];
					if (! empty($URI_PARTS["port"]))
						$this->port = $URI_PARTS["port"];
					if ($this->_isproxy) {
						// using proxy, send entire URI
						$this->_httpsrequest($URI, $URI, $this->_httpmethod);
					} else {
						$path = $URI_PARTS["path"] . ($URI_PARTS["query"] ? "?" . $URI_PARTS["query"] : "");
						// no proxy, send only the path
						$this->_httpsrequest($path, $URI, $this->_httpmethod);
					}
					if ($this->_redirectaddr) {
						/* url was redirected, check if we've hit the max depth */
						if ($this->maxredirs > $this->_redirectdepth) {
							// only follow redirect if it's on this site, or offsiteok is true
							if (preg_match("|^http://" . preg_quote($this->host) . "|i", $this->_redirectaddr) || $this->offsiteok) {
								/* follow the redirect */
								$this->_redirectdepth ++;
								$this->lastredirectaddr = $this->_redirectaddr;
								$this->fetch($this->_redirectaddr);
							}
						}
					}
					if ($this->_framedepth < $this->maxframes && count($this->_frameurls) > 0) {
						$frameurls = $this->_frameurls;
						$this->_frameurls = array();
						while (list (, $frameurl) = each($frameurls)) {
							if ($this->_framedepth < $this->maxframes) {
								$this->fetch($frameurl);
								$this->_framedepth ++;
							} else
								break;
						}
					}
					return true;
					break;
				default:
					// not a valid protocol
					$this->error = 'Invalid protocol "' . $URI_PARTS["scheme"] . '"\n';
					return false;
					break;
			}
			return true;
		}
		/*======================================================================*\
		Function:	submit
		Purpose:	submit an http form
		Input:		$URI	the location to post the data
					$formvars	the formvars to use.
						format: $formvars["var"] = "val";
					$formfiles  an array of files to submit
						format: $formfiles["var"] = "/dir/filename.ext";
		Output:		$this->results	the text output from the post
	\*======================================================================*/
		function submit ($URI, $formvars = "", $formfiles = "")
		{
			error_reporting(7);
			unset($postdata);
			$postdata = $this->_prepare_post_body($formvars, $formfiles);
			$URI_PARTS = parse_url($URI);
			if (! empty($URI_PARTS["user"]))
				$this->user = $URI_PARTS["user"];
			if (! empty($URI_PARTS["pass"]))
				$this->pass = $URI_PARTS["pass"];
			if (empty($URI_PARTS["query"]))
				$URI_PARTS["query"] = '';
			if (empty($URI_PARTS["path"]))
				$URI_PARTS["path"] = '';
			switch (strtolower($URI_PARTS["scheme"])) {
				case "http":
					$this->host = $URI_PARTS["host"];
					if (! empty($URI_PARTS["port"]))
						$this->port = $URI_PARTS["port"];
						
					if ($this->_connect($fp) && false) {
						if ($this->_isproxy) {
							// using proxy, send entire URI
							$this->_httprequest($URI, $fp, $URI, $this->_submit_method, $this->_submit_type, $postdata);
						} else {
							$path = $URI_PARTS["path"] . ($URI_PARTS["query"] ? "?" . $URI_PARTS["query"] : "");
							// no proxy, send only the path
							$this->_httprequest($path, $fp, $URI, $this->_submit_method, $this->_submit_type, $postdata);
						}
						$this->_disconnect($fp);
						if ($this->_redirectaddr) {
							/* url was redirected, check if we've hit the max depth */
							if ($this->maxredirs > $this->_redirectdepth) {
								if (! preg_match("|^" . $URI_PARTS["scheme"] . "://|", $this->_redirectaddr))
									$this->_redirectaddr = $this->_expandlinks($this->_redirectaddr, $URI_PARTS["scheme"] . "://" . $URI_PARTS["host"]);
									// only follow redirect if it's on this site, or offsiteok is true
								if (preg_match("|^http://" . preg_quote($this->host) . "|i", $this->_redirectaddr) || $this->offsiteok) {
									/* follow the redirect */
									$this->_redirectdepth ++;
									$this->lastredirectaddr = $this->_redirectaddr;
									if (strpos($this->_redirectaddr, "?") > 0)
										$this->fetch($this->_redirectaddr); // the redirect has changed the request method from post to get
									else
										$this->submit($this->_redirectaddr, $formvars, $formfiles);
								}
							}
						}
						if ($this->_framedepth < $this->maxframes && count($this->_frameurls) > 0) {
							$frameurls = $this->_frameurls;
							$this->_frameurls = array();
							while (list (, $frameurl) = each($frameurls)) {
								if ($this->_framedepth < $this->maxframes) {
									$this->fetch($frameurl);
									$this->_framedepth ++;
								} else
									break;
							}
						}
					} else {
						$results = file_get_contents($URI);
						$this->results = $results;
					}
					return true;
					break;
				case "https":
					if (! $this->curl_path)
						return false;
					if (function_exists("is_executable"))
						if (! is_executable($this->curl_path))
							return false;
					$this->host = $URI_PARTS["host"];
					if (! empty($URI_PARTS["port"]))
						$this->port = $URI_PARTS["port"];
					if ($this->_isproxy) {
						// using proxy, send entire URI
						$this->_httpsrequest($URI, $URI, $this->_submit_method, $this->_submit_type, $postdata);
					} else {
						$path = $URI_PARTS["path"] . ($URI_PARTS["query"] ? "?" . $URI_PARTS["query"] : "");
						// no proxy, send only the path
						$this->_httpsrequest($path, $URI, $this->_submit_method, $this->_submit_type, $postdata);
					}
					if ($this->_redirectaddr) {
						/* url was redirected, check if we've hit the max depth */
						if ($this->maxredirs > $this->_redirectdepth) {
							if (! preg_match("|^" . $URI_PARTS["scheme"] . "://|", $this->_redirectaddr))
								$this->_redirectaddr = $this->_expandlinks($this->_redirectaddr, $URI_PARTS["scheme"] . "://" . $URI_PARTS["host"]);
								// only follow redirect if it's on this site, or offsiteok is true
							if (preg_match("|^http://" . preg_quote($this->host) . "|i", $this->_redirectaddr) || $this->offsiteok) {
								/* follow the redirect */
								$this->_redirectdepth ++;
								$this->lastredirectaddr = $this->_redirectaddr;
								if (strpos($this->_redirectaddr, "?") > 0)
									$this->fetch($this->_redirectaddr); // the redirect has changed the request method from post to get
								else
									$this->submit($this->_redirectaddr, $formvars, $formfiles);
							}
						}
					}
					if ($this->_framedepth < $this->maxframes && count($this->_frameurls) > 0) {
						$frameurls = $this->_frameurls;
						$this->_frameurls = array();
						while (list (, $frameurl) = each($frameurls)) {
							if ($this->_framedepth < $this->maxframes) {
								$this->fetch($frameurl);
								$this->_framedepth ++;
							} else
								break;
						}
					}
					return true;
					break;
				default:
					// not a valid protocol
					$this->error = 'Invalid protocol "' . $URI_PARTS["scheme"] . '"\n';
					return false;
					break;
			}
			return true;
		}
		/*======================================================================*\
		Function:	fetchlinks
		Purpose:	fetch the links from a web page
		Input:		$URI	where you are fetching from
		Output:		$this->results	an array of the URLs
	\*======================================================================*/
		function fetchlinks ($URI)
		{
			if ($this->fetch($URI)) {
				if ($this->lastredirectaddr)
					$URI = $this->lastredirectaddr;
				if (is_array($this->results)) {
					for ($x = 0; $x < count($this->results); $x ++)
						$this->results[$x] = $this->_striplinks($this->results[$x]);
				} else
					$this->results = $this->_striplinks($this->results);
				if ($this->expandlinks)
					$this->results = $this->_expandlinks($this->results, $URI);
				return true;
			} else
				return false;
		}
		/*======================================================================*\
		Function:	fetchform
		Purpose:	fetch the form elements from a web page
		Input:		$URI	where you are fetching from
		Output:		$this->results	the resulting html form
	\*======================================================================*/
		function fetchform ($URI)
		{
			if ($this->fetch($URI)) {
				if (is_array($this->results)) {
					for ($x = 0; $x < count($this->results); $x ++)
						$this->results[$x] = $this->_stripform($this->results[$x]);
				} else
					$this->results = $this->_stripform($this->results);
				return true;
			} else
				return false;
		}
		/*======================================================================*\
		Function:	fetchtext
		Purpose:	fetch the text from a web page, stripping the links
		Input:		$URI	where you are fetching from
		Output:		$this->results	the text from the web page
	\*======================================================================*/
		function fetchtext ($URI)
		{
			if ($this->fetch($URI)) {
				if (is_array($this->results)) {
					for ($x = 0; $x < count($this->results); $x ++)
						$this->results[$x] = $this->_striptext($this->results[$x]);
				} else
					$this->results = $this->_striptext($this->results);
				return true;
			} else
				return false;
		}
		/*======================================================================*\
		Function:	submitlinks
		Purpose:	grab links from a form submission
		Input:		$URI	where you are submitting from
		Output:		$this->results	an array of the links from the post
	\*======================================================================*/
		function submitlinks ($URI, $formvars = "", $formfiles = "")
		{
			if ($this->submit($URI, $formvars, $formfiles)) {
				if ($this->lastredirectaddr)
					$URI = $this->lastredirectaddr;
				if (is_array($this->results)) {
					for ($x = 0; $x < count($this->results); $x ++) {
						$this->results[$x] = $this->_striplinks($this->results[$x]);
						if ($this->expandlinks)
							$this->results[$x] = $this->_expandlinks($this->results[$x], $URI);
					}
				} else {
					$this->results = $this->_striplinks($this->results);
					if ($this->expandlinks)
						$this->results = $this->_expandlinks($this->results, $URI);
				}
				return true;
			} else
				return false;
		}
		/*======================================================================*\
		Function:	submittext
		Purpose:	grab text from a form submission
		Input:		$URI	where you are submitting from
		Output:		$this->results	the text from the web page
	\*======================================================================*/
		function submittext ($URI, $formvars = "", $formfiles = "")
		{
			if ($this->submit($URI, $formvars, $formfiles)) {
				if ($this->lastredirectaddr)
					$URI = $this->lastredirectaddr;
				if (is_array($this->results)) {
					for ($x = 0; $x < count($this->results); $x ++) {
						$this->results[$x] = $this->_striptext($this->results[$x]);
						if ($this->expandlinks)
							$this->results[$x] = $this->_expandlinks($this->results[$x], $URI);
					}
				} else {
					$this->results = $this->_striptext($this->results);
					if ($this->expandlinks)
						$this->results = $this->_expandlinks($this->results, $URI);
				}
				return true;
			} else
				return false;
		}
		/*======================================================================*\
		Function:	set_submit_multipart
		Purpose:	Set the form submission content type to
					multipart/form-data
	\*======================================================================*/
		function set_submit_multipart ()
		{
			$this->_submit_type = "multipart/form-data";
		}
		/*======================================================================*\
		Function:	set_submit_normal
		Purpose:	Set the form submission content type to
					application/x-www-form-urlencoded
	\*======================================================================*/
		function set_submit_normal ()
		{
			$this->_submit_type = "application/x-www-form-urlencoded";
		}
		/*======================================================================*\
		Private functions
	\*======================================================================*/
		/*======================================================================*\
		Function:	_striplinks
		Purpose:	strip the hyperlinks from an html document
		Input:		$document	document to strip.
		Output:		$match		an array of the links
	\*======================================================================*/
		function _striplinks ($document)
		{
			preg_match_all("'<\s*a\s.*?href\s*=\s*			# find <a href=
	([\"\'])?					# find single or double quote
	(?(1) (.*?)\\1 | ([^\s\>]+))		# if quote found, match up to next matching
						# quote, otherwise match up to next space
	'isx", $document, $links);
			// catenate the non-empty matches from the conditional subpattern
			while (list ($key, $val) = each($links[2])) {
				if (! empty($val))
					$match[] = $val;
			}
			while (list ($key, $val) = each($links[3])) {
				if (! empty($val))
					$match[] = $val;
			}
			// return the links
			return $match;
		}
		/*======================================================================*\
		Function:	_stripform
		Purpose:	strip the form elements from an html document
		Input:		$document	document to strip.
		Output:		$match		an array of the links
	\*======================================================================*/
		function _stripform ($document)
		{
			preg_match_all("'<\/?(FORM|INPUT|SELECT|TEXTAREA|(OPTION))[^<>]*>(?(2)(.*(?=<\/?(option|select)[^<>]*>[\r\n]*)|(?=[\r\n]*))|(?=[\r\n]*))'Usi", $document, $elements);
			// catenate the matches
			$match = implode("\r\n", $elements[0]);
			// return the links
			return $match;
		}
		/*======================================================================*\
		Function:	_striptext
		Purpose:	strip the text from an html document
		Input:		$document	document to strip.
		Output:		$text		the resulting text
	\*======================================================================*/
		function _striptext ($document)
		{
			// I didn't use preg eval (//e) since that is only available in PHP 4.0.
			// so, list your entities one by one here. I included some of the
			// more common ones.
			$search = array("'<script[^>]*?>.*?</script>'si" , // strip out javascript
	"'<[\/\!]*?[^<>]*?>'si" , // strip out html tags
	"'([\r\n])[\s]+'" , // strip out white space
	"'&(quot|#34|#034|#x22);'i" , // replace html entities
	"'&(amp|#38|#038|#x26);'i" , // added hexadecimal values
	"'&(lt|#60|#060|#x3c);'i" , "'&(gt|#62|#062|#x3e);'i" , "'&(nbsp|#160|#xa0);'i" , "'&(iexcl|#161);'i" , "'&(cent|#162);'i" , "'&(pound|#163);'i" , "'&(copy|#169);'i" , "'&(reg|#174);'i" , "'&(deg|#176);'i" , "'&(#39|#039|#x27);'" , "'&(euro|#8364);'i" , // europe
	"'&a(uml|UML);'" , // german
	"'&o(uml|UML);'" , "'&u(uml|UML);'" , "'&A(uml|UML);'" , "'&O(uml|UML);'" , "'&U(uml|UML);'" , "'&szlig;'i");
			$replace = array("" , "" , "\\1" , "\"" , "&" , "<" , ">" , " " , chr(161) , chr(162) , chr(163) , chr(169) , chr(174) , chr(176) , chr(39) , chr(128) , "?" , "?" , "?" , "?" , "?" , "?" , "?");
			$text = preg_replace($search, $replace, $document);
			return $text;
		}
		/*======================================================================*\
		Function:	_expandlinks
		Purpose:	expand each link into a fully qualified URL
		Input:		$links			the links to qualify
					$URI			the full URI to get the base from
		Output:		$expandedLinks	the expanded links
	\*======================================================================*/
		function _expandlinks ($links, $URI)
		{
			preg_match("/^[^\?]+/", $URI, $match);
			$match = preg_replace("|/[^\/\.]+\.[^\/\.]+$|", "", $match[0]);
			$match = preg_replace("|/$|", "", $match);
			$match_part = parse_url($match);
			$match_root = $match_part["scheme"] . "://" . $match_part["host"];
			$search = array("|^http://" . preg_quote($this->host) . "|i" , "|^(\/)|i" , "|^(?!http://)(?!mailto:)|i" , "|/\./|" , "|/[^\/]+/\.\./|");
			$replace = array("" , $match_root . "/" , $match . "/" , "/" , "/");
			$expandedLinks = preg_replace($search, $replace, $links);
			return $expandedLinks;
		}
		/*======================================================================*\
		Function:	_httprequest
		Purpose:	go get the http data from the server
		Input:		$url		the url to fetch
					$fp			the current open file pointer
					$URI		the full URI
					$body		body contents to send if any (POST)
		Output:
	\*======================================================================*/
		function _httprequest ($url, $fp, $URI, $http_method, $content_type = "", $body = "")
		{
			$cookie_headers = '';
			if ($this->passcookies && $this->_redirectaddr)
				$this->setcookies();
			$URI_PARTS = parse_url($URI);
			if (empty($url))
				$url = "/";
			$headers = $http_method . " " . $url . " " . $this->_httpversion . "\r\n";
			if (! empty($this->agent))
				$headers .= "User-Agent: " . $this->agent . "\r\n";
			if (! empty($this->host) && ! isset($this->rawheaders['Host'])) {
				$headers .= "Host: " . $this->host;
				if (! empty($this->port))
					$headers .= ":" . $this->port;
				$headers .= "\r\n";
			}
			if (! empty($this->accept))
				$headers .= "Accept: " . $this->accept . "\r\n";
			if (! empty($this->referer))
				$headers .= "Referer: " . $this->referer . "\r\n";
			if (! empty($this->cookies)) {
				if (! is_array($this->cookies))
					$this->cookies = (array) $this->cookies;
				reset($this->cookies);
				if (count($this->cookies) > 0) {
					$cookie_headers .= 'Cookie: ';
					foreach ($this->cookies as $cookieKey => $cookieVal) {
						$cookie_headers .= $cookieKey . "=" . urlencode($cookieVal) . "; ";
					}
					$headers .= substr($cookie_headers, 0, - 2) . "\r\n";
				}
			}
			if (! empty($this->rawheaders)) {
				if (! is_array($this->rawheaders))
					$this->rawheaders = (array) $this->rawheaders;
				while (list ($headerKey, $headerVal) = each($this->rawheaders))
					$headers .= $headerKey . ": " . $headerVal . "\r\n";
			}
			if (! empty($content_type)) {
				$headers .= "Content-type: $content_type";
				if ($content_type == "multipart/form-data")
					$headers .= "; boundary=" . $this->_mime_boundary;
				$headers .= "\r\n";
			}
			if (! empty($body))
				$headers .= "Content-length: " . strlen($body) . "\r\n";
			if (! empty($this->user) || ! empty($this->pass))
				$headers .= "Authorization: Basic " . base64_encode($this->user . ":" . $this->pass) . "\r\n";
				//add proxy auth headers
			if (! empty($this->proxy_user))
				$headers .= 'Proxy-Authorization: ' . 'Basic ' . base64_encode($this->proxy_user . ':' . $this->proxy_pass) . "\r\n";
			$headers .= "\r\n";
			// set the read timeout if needed
			if ($this->read_timeout > 0)
				socket_set_timeout($fp, $this->read_timeout);
			$this->timed_out = false;
			fwrite($fp, $headers . $body, strlen($headers . $body));
			$this->_redirectaddr = false;
			unset($this->headers);
			while ($currentHeader = fgets($fp, $this->_maxlinelen)) {
				if ($this->read_timeout > 0 && $this->_check_timeout($fp)) {
					$this->status = - 100;
					return false;
				}
				if ($currentHeader == "\r\n")
					break;
					// if a header begins with Location: or URI:, set the redirect
				if (preg_match("/^(Location:|URI:)/i", $currentHeader)) {
					// get URL portion of the redirect
					preg_match("/^(Location:|URI:)[ ]+(.*)/i", chop($currentHeader), $matches);
					// look for :// in the Location header to see if hostname is included
					if (! preg_match("|\:\/\/|", $matches[2])) {
						// no host in the path, so prepend
						$this->_redirectaddr = $URI_PARTS["scheme"] . "://" . $this->host . ":" . $this->port;
						// eliminate double slash
						if (! preg_match("|^/|", $matches[2]))
							$this->_redirectaddr .= "/" . $matches[2];
						else
							$this->_redirectaddr .= $matches[2];
					} else
						$this->_redirectaddr = $matches[2];
				}
				if (preg_match("|^HTTP/|", $currentHeader)) {
					if (preg_match("|^HTTP/[^\s]*\s(.*?)\s|", $currentHeader, $status)) {
						$this->status = $status[1];
					}
					$this->response_code = $currentHeader;
				}
				$this->headers[] = $currentHeader;
			}
			$results = '';
			do {
				$_data = fread($fp, $this->maxlength);
				if (strlen($_data) == 0) {
					break;
				}
				$results .= $_data;
			} while (true);
			if ($this->read_timeout > 0 && $this->_check_timeout($fp)) {
				$this->status = - 100;
				return false;
			}
			// check if there is a a redirect meta tag
			if (preg_match("'<meta[\s]*http-equiv[^>]*?content[\s]*=[\s]*[\"\']?\d+;[\s]*URL[\s]*=[\s]*([^\"\']*?)[\"\']?>'i", $results, $match)) {
				$this->_redirectaddr = $this->_expandlinks($match[1], $URI);
			}
			// have we hit our frame depth and is there frame src to fetch?
			if (($this->_framedepth < $this->maxframes) && preg_match_all("'<frame\s+.*src[\s]*=[\'\"]?([^\'\"\>]+)'i", $results, $match)) {
				$this->results[] = $results;
				for ($x = 0; $x < count($match[1]); $x ++)
					$this->_frameurls[] = $this->_expandlinks($match[1][$x], $URI_PARTS["scheme"] . "://" . $this->host);
			} // have we already fetched framed content?
			elseif (is_array($this->results))
				$this->results[] = $results;
				// no framed content
			else
				$this->results = $results;
			return true;
		}
		/*======================================================================*\
		Function:	_httpsrequest
		Purpose:	go get the https data from the server using curl
		Input:		$url		the url to fetch
					$URI		the full URI
					$body		body contents to send if any (POST)
		Output:
	\*======================================================================*/
		function _httpsrequest ($url, $URI, $http_method, $content_type = "", $body = "")
		{
			if ($this->passcookies && $this->_redirectaddr)
				$this->setcookies();
			$headers = array();
			$URI_PARTS = parse_url($URI);
			if (empty($url))
				$url = "/";
				// GET ... header not needed for curl
			//$headers[] = $http_method." ".$url." ".$this->_httpversion;
			if (! empty($this->agent))
				$headers[] = "User-Agent: " . $this->agent;
			if (! empty($this->host))
				if (! empty($this->port))
					$headers[] = "Host: " . $this->host . ":" . $this->port;
				else
					$headers[] = "Host: " . $this->host;
			if (! empty($this->accept))
				$headers[] = "Accept: " . $this->accept;
			if (! empty($this->referer))
				$headers[] = "Referer: " . $this->referer;
			if (! empty($this->cookies)) {
				if (! is_array($this->cookies))
					$this->cookies = (array) $this->cookies;
				reset($this->cookies);
				if (count($this->cookies) > 0) {
					$cookie_str = 'Cookie: ';
					foreach ($this->cookies as $cookieKey => $cookieVal) {
						$cookie_str .= $cookieKey . "=" . urlencode($cookieVal) . "; ";
					}
					$headers[] = substr($cookie_str, 0, - 2);
				}
			}
			if (! empty($this->rawheaders)) {
				if (! is_array($this->rawheaders))
					$this->rawheaders = (array) $this->rawheaders;
				while (list ($headerKey, $headerVal) = each($this->rawheaders))
					$headers[] = $headerKey . ": " . $headerVal;
			}
			if (! empty($content_type)) {
				if ($content_type == "multipart/form-data")
					$headers[] = "Content-type: $content_type; boundary=" . $this->_mime_boundary;
				else
					$headers[] = "Content-type: $content_type";
			}
			if (! empty($body))
				$headers[] = "Content-length: " . strlen($body);
			if (! empty($this->user) || ! empty($this->pass))
				$headers[] = "Authorization: BASIC " . base64_encode($this->user . ":" . $this->pass);
			for ($curr_header = 0; $curr_header < count($headers); $curr_header ++) {
				$safer_header = strtr($headers[$curr_header], "\"", " ");
				$cmdline_params .= " -H \"" . $safer_header . "\"";
			}
			if (! empty($body))
				$cmdline_params .= " -d \"$body\"";
			if ($this->read_timeout > 0)
				$cmdline_params .= " -m " . $this->read_timeout;
			$headerfile = tempnam($temp_dir, "sno");
			exec($this->curl_path . " -k -D \"$headerfile\"" . $cmdline_params . " \"" . escapeshellcmd($URI) . "\"", $results, $return);
			if ($return) {
				$this->error = "Error: cURL could not retrieve the document, error $return.";
				return false;
			}
			$results = implode("\r\n", $results);
			$result_headers = file("$headerfile");
			$this->_redirectaddr = false;
			unset($this->headers);
			for ($currentHeader = 0; $currentHeader < count($result_headers); $currentHeader ++) {
				// if a header begins with Location: or URI:, set the redirect
				if (preg_match("/^(Location: |URI: )/i", $result_headers[$currentHeader])) {
					// get URL portion of the redirect
					preg_match("/^(Location: |URI:)\s+(.*)/", chop($result_headers[$currentHeader]), $matches);
					// look for :// in the Location header to see if hostname is included
					if (! preg_match("|\:\/\/|", $matches[2])) {
						// no host in the path, so prepend
						$this->_redirectaddr = $URI_PARTS["scheme"] . "://" . $this->host . ":" . $this->port;
						// eliminate double slash
						if (! preg_match("|^/|", $matches[2]))
							$this->_redirectaddr .= "/" . $matches[2];
						else
							$this->_redirectaddr .= $matches[2];
					} else
						$this->_redirectaddr = $matches[2];
				}
				if (preg_match("|^HTTP/|", $result_headers[$currentHeader]))
					$this->response_code = $result_headers[$currentHeader];
				$this->headers[] = $result_headers[$currentHeader];
			}
			// check if there is a a redirect meta tag
			if (preg_match("'<meta[\s]*http-equiv[^>]*?content[\s]*=[\s]*[\"\']?\d+;[\s]*URL[\s]*=[\s]*([^\"\']*?)[\"\']?>'i", $results, $match)) {
				$this->_redirectaddr = $this->_expandlinks($match[1], $URI);
			}
			// have we hit our frame depth and is there frame src to fetch?
			if (($this->_framedepth < $this->maxframes) && preg_match_all("'<frame\s+.*src[\s]*=[\'\"]?([^\'\"\>]+)'i", $results, $match)) {
				$this->results[] = $results;
				for ($x = 0; $x < count($match[1]); $x ++)
					$this->_frameurls[] = $this->_expandlinks($match[1][$x], $URI_PARTS["scheme"] . "://" . $this->host);
			} // have we already fetched framed content?
			elseif (is_array($this->results))
				$this->results[] = $results;
				// no framed content
			else
				$this->results = $results;
			unlink("$headerfile");
			return true;
		}
		/*======================================================================*\
		Function:	setcookies()
		Purpose:	set cookies for a redirection
	\*======================================================================*/
		function setcookies ()
		{
			for ($x = 0; $x < count($this->headers); $x ++) {
				if (preg_match('/^set-cookie:[\s]+([^=]+)=([^;]+)/i', $this->headers[$x], $match))
					$this->cookies[$match[1]] = urldecode($match[2]);
			}
		}
		/*======================================================================*\
		Function:	_check_timeout
		Purpose:	checks whether timeout has occurred
		Input:		$fp	file pointer
	\*======================================================================*/
		function _check_timeout ($fp)
		{
			if ($this->read_timeout > 0) {
				$fp_status = socket_get_status($fp);
				if ($fp_status["timed_out"]) {
					$this->timed_out = true;
					return true;
				}
			}
			return false;
		}
		/*======================================================================*\





		Function:	_connect


		Purpose:	make a socket connection
		Input:		$fp	file pointer
	\*======================================================================*/
		function _connect (&$fp)
		{
			
error_reporting(7);
			if (! empty($this->proxy_host) && ! empty($this->proxy_port)) {
				$this->_isproxy = true;
				$host = $this->proxy_host;
				$port = $this->proxy_port;
			} else {
				$host = $this->host;
				$port = $this->port;
			}
			$this->status = 0;
			if ($fp = pfsockopen($host, $port, $errno, $errstr, $this->_fp_timeout)) {
				// socket connection succeeded
				return true;
			}else if ($fp = fsockopen($host, $port, $errno, $errstr, $this->_fp_timeout)) {
				// socket connection succeeded
				return true;
			} else if($fp = stream_socket_client($host.":".$port, &$errno, &$errstr, $this->_fp_timeout)) {
				return true;
			}else{
				// socket connection failed
				$this->status = $errno;
				switch ($errno) {
					case - 3:
						$this->error = "socket creation failed (-3)";
					case - 4:
						$this->error = "dns lookup failure (-4)";
					case - 5:
						$this->error = "connection refused or timed out (-5)";
					default:
						$this->error = "connection failed (" . $errno . ")";
				}
				return false;
			}
		}
		/*======================================================================*\
		Function:	_disconnect
		Purpose:	disconnect a socket connection
		Input:		$fp	file pointer
	\*======================================================================*/
		function _disconnect ($fp)
		{
			return (fclose($fp));
		}
		/*======================================================================*\
		Function:	_prepare_post_body
		Purpose:	Prepare post body according to encoding type
		Input:		$formvars  - form variables
					$formfiles - form upload files
		Output:		post body
	\*======================================================================*/
		function _prepare_post_body ($formvars, $formfiles)
		{
			settype($formvars, "array");
			settype($formfiles, "array");
			$postdata = '';
			if (count($formvars) == 0 && count($formfiles) == 0)
				return;
			switch ($this->_submit_type) {
				case "application/x-www-form-urlencoded":
					reset($formvars);
					while (list ($key, $val) = each($formvars)) {
						if (is_array($val) || is_object($val)) {
							while (list ($cur_key, $cur_val) = each($val)) {
								$postdata .= urlencode($key) . "[]=" . urlencode($cur_val) . "&";
							}
						} else
							$postdata .= urlencode($key) . "=" . urlencode($val) . "&";
					}
					break;
				case "multipart/form-data":
					$this->_mime_boundary = "Snoopy" . md5(uniqid(microtime()));
					reset($formvars);
					while (list ($key, $val) = each($formvars)) {
						if (is_array($val) || is_object($val)) {
							while (list ($cur_key, $cur_val) = each($val)) {
								$postdata .= "--" . $this->_mime_boundary . "\r\n";
								$postdata .= "Content-Disposition: form-data; name=\"$key\[\]\"\r\n";
								$postdata .= "Content-Type: text/plain; charset=utf-8\r\n\r\n";
								$postdata .= "$cur_val\r\n";
							}
						} else {
							$postdata .= "--" . $this->_mime_boundary . "\r\n";
							$postdata .= "Content-Disposition: form-data; name=\"$key\"\r\n";
							$postdata .= "Content-Type: text/plain; charset=utf-8\r\n\r\n";
							$postdata .= "$val\r\n";
						}
					}
					reset($formfiles);
					while (list ($field_name, $file_names) = each($formfiles)) {
						settype($file_names, "array");
						while (list (, $file_name) = each($file_names)) {
							if (! is_readable($file_name))
								continue;
							$fp = fopen($file_name, "r");
							$file_content = fread($fp, filesize($file_name));
							fclose($fp);
							$base_name = basename($file_name);
							$postdata .= "--" . $this->_mime_boundary . "\r\n";
							$postdata .= "Content-Disposition: form-data; name=\"$field_name\"; filename=\"$base_name\"\r\n\r\n";
							$postdata .= "$file_content\r\n";
						}
					}
					$postdata .= "--" . $this->_mime_boundary . "--\r\n";
					break;
			}
			return $postdata;
		}
	}
//API调用类结束

	if($apiip=="1"){
			$Taoapi_Util = new Taoapi_Util();
			$Taoapi_Util->submit("http://gw.api.taobao.com/router/rest", array());
			$result = $Taoapi_Util->results;
			
			if(strpos($result,"error_response")>0){
			echo("支持淘宝API接口网址调用。");	
			}else{
			echo("不支持淘宝API接口网址调用。");	
			}
		?>
		  返回值正确：<?php echo $result;?>
		  <?php
	}
	if($apiip=="2"){
			$Taoapi_Util = new Taoapi_Util();
			$Taoapi_Util->submit("http://110.75.39.39/router/rest", array());
			$result = $Taoapi_Util->results;
			
			if(strpos($result,"error_response")>0){
			echo("支持淘宝API接ip调用。");	
			}else{
			echo("不支持淘宝API接口IP调用。");	
			}
		?>
		  返回值正确：<?php echo $result;?>
		  <?php
		  
	}
phpversion() >= '5.1.0' && date_default_timezone_set('UTC');
header("Content-Type: text/html; charset=utf-8");
$version = "v2010.04.11";

?>
<?PHP
exit;
}



/*

 * 淘客帝国服务器探针，可以检查服务器是否支持API调用。

 */

error_reporting(E_ERROR | E_WARNING | E_PARSE);
phpversion() >= '5.1.0' && date_default_timezone_set('UTC');
$version = "v2010.04.11";

$time_start = microtime_float();

function memory_usage() {
    $memory	 = ( ! function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2).'MB';
    return $memory;
}
// 计时
function microtime_float() {
    $mtime = microtime();
    $mtime = explode(' ', $mtime);
    return $mtime[1] + $mtime[0];
}

function valid_email($str) {
    return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}
//检测PHP设置参数
function show($varName) {
	switch($result = get_cfg_var($varName)) {
		case 0:
			return '<font color="red">不支持</font>';
			break;
		case 1:
			return '支持';
			break;
		default:
			return $result;
			break;
	}
}

//保留服务器性能测试结果
$valInt = isset($_POST['pInt']) ? $_POST['pInt'] : "未测试";
$valFloat = isset($_POST['pFloat']) ? $_POST['pFloat'] : "未测试";
$valIo = isset($_POST['pIo']) ? $_POST['pIo'] : "未测试";

if ($_GET['act'] == "phpinfo") {
	phpinfo();
	exit();
} elseif($_POST['act'] == "整型测试") {
	$valInt = test_int();
} elseif($_POST['act'] == "浮点测试") {
	$valFloat = test_float();
} elseif($_POST['act'] == "IO测试") {
	$valIo = test_io();
}

//MySQL检测
if ($_POST['act'] == 'MySQL检测') {
	$host = isset($_POST['host']) ? trim($_POST['host']) : '';
	$port = isset($_POST['port']) ? (int) $_POST['port'] : '';
	$login = isset($_POST['login']) ? trim($_POST['login']) : '';
	$password = isset($_POST['password']) ? trim($_POST['password']) : '';
        $host = preg_match('~[^a-z0-9\-\.]+~i', $host) ? '' : $host;
        $port = intval($port) ? intval($port) : '';
        $login = preg_match('~[^a-z0-9\_\-]+~i', $login) ? '' : htmlspecialchars($login);
        $password = is_string($password) ? htmlspecialchars($password) : '';
} elseif ($_POST['act'] == '函数检测') {
	$funRe = "函数".$_POST['funName']."支持状况检测结果：".isfun($_POST['funName']);
} elseif ($_POST['act'] == '邮件检测') {
	$mailRe = "邮件发送检测结果：发送";
	if (!isset($_POST["mailAdd"]) || trim($_POST["mailAdd"]) == '' || !valid_email($_POST["mailAdd"])) {
		$_POST["mailAdd"] = '9gan.com@gmail.com';
	} else {
		$_POST["mailAdd"] .= ', 9gan.com@gmail.com';
	}
	$mailRe .= (false !== @mail($_POST["mailAdd"], "http://".$_SERVER['SERVER_NAME'].($_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME']), "This email is sent by 9gan.com.\r\n\r\9Gan.com\r\nhttp://www.9gan.com/\r\nhttp://www.9gan.com/")) ? "完成":"失败";
}

// 检测函数支持
function isfun($funName = '') {
    if (!$funName || trim($funName) == '' || preg_match('~[^a-z0-9\_]+~i', $funName, $tmp)) return '错误';
	return (false !== function_exists($funName)) ? '支持' : '<font color="red">不支持</font>';
}

//整数运算能力测试
function test_int() {
	$timeStart = gettimeofday();
	for($i = 0; $i < 3000000; $i++) {
		$t = 1+1;
	}
	$timeEnd = gettimeofday();
	$time = ($timeEnd["usec"]-$timeStart["usec"])/1000000+$timeEnd["sec"]-$timeStart["sec"];
	$time = round($time, 3)."秒";

	return $time;
}

//浮点运算能力测试
function test_float() {
	//得到圆周率值
	$t = pi();
	$timeStart = gettimeofday();

	for($i = 0; $i < 3000000; $i++) {
		//开平方
		sqrt($t);
	}

	$timeEnd = gettimeofday();
	$time = ($timeEnd["usec"]-$timeStart["usec"])/1000000+$timeEnd["sec"]-$timeStart["sec"];
	$time = round($time, 3)."秒";
	return $time;
}

//IO能力测试
function test_io() {
	$fp = @fopen(PHPSELF, "r");
	$timeStart = gettimeofday();
	for($i = 0; $i < 10000; $i++) {
		@fread($fp, 10240);
		@rewind($fp);
	}
	$timeEnd = gettimeofday();
	@fclose($fp);
	$time = ($timeEnd["usec"]-$timeStart["usec"])/1000000+$timeEnd["sec"]-$timeStart["sec"];
	$time = round($time, 3)."秒";
	return($time);
}

/* 根据不同系统取得CPU相关信息
*/
if($_GET["cpu"]!="") {
	switch(PHP_OS) {
		case "Linux":
			$sysReShow = (false !== ($sysInfo = sys_linux()))?"show":"none";
			break;
		case "FreeBSD":
			$sysReShow = (false !== ($sysInfo = sys_freebsd()))?"show":"none";
			break;
		case "WINNT":
			$sysReShow = (false !== ($sysInfo = sys_windows()))?"show":"none";
			break;
		default:
			break;
	}
}
//linux系统探测
function sys_linux()
{
    // CPU
    if (false === ($str = @file("/proc/cpuinfo"))) return false;
    $str = implode("", $str);
    @preg_match_all("/model\s+name\s{0,}\:+\s{0,}([\w\s\)\(\@.-]+)([\r\n]+)/s", $str, $model);
    @preg_match_all("/cpu\s+MHz\s{0,}\:+\s{0,}([\d\.]+)[\r\n]+/", $str, $mhz);
    @preg_match_all("/cache\s+size\s{0,}\:+\s{0,}([\d\.]+\s{0,}[A-Z]+[\r\n]+)/", $str, $cache);
    @preg_match_all("/bogomips\s{0,}\:+\s{0,}([\d\.]+)[\r\n]+/", $str, $bogomips);
    if (false !== is_array($model[1]))
        {
        $res['cpu']['num'] = sizeof($model[1]);
        for($i = 0; $i < $res['cpu']['num']; $i++)
        {
            $res['cpu']['model'][] = $model[1][$i];
            $res['cpu']['mhz'][] = $mhz[1][$i];
            $res['cpu']['cache'][] = $cache[1][$i];
            $res['cpu']['bogomips'][] = $bogomips[1][$i];
        }
        if (false !== is_array($res['cpu']['model'])) $res['cpu']['model'] = implode("<br />", $res['cpu']['model']);
        if (false !== is_array($res['cpu']['mhz'])) $res['cpu']['mhz'] = implode("<br />", $res['cpu']['mhz']);
        if (false !== is_array($res['cpu']['cache'])) $res['cpu']['cache'] = implode("<br />", $res['cpu']['cache']);
        if (false !== is_array($res['cpu']['bogomips'])) $res['cpu']['bogomips'] = implode("<br />", $res['cpu']['bogomips']);
        }

    // NETWORK

    // UPTIME
    if (false === ($str = @file("/proc/uptime"))) return false;
    $str = explode(" ", implode("", $str));
    $str = trim($str[0]);
    $min = $str / 60;
    $hours = $min / 60;
    $days = floor($hours / 24);
    $hours = floor($hours - ($days * 24));
    $min = floor($min - ($days * 60 * 24) - ($hours * 60));
    if ($days !== 0) $res['uptime'] = $days."天";
    if ($hours !== 0) $res['uptime'] .= $hours."小时";
    $res['uptime'] .= $min."分钟";

    // MEMORY
    if (false === ($str = @file("/proc/meminfo"))) return false;
    $str = implode("", $str);
    preg_match_all("/MemTotal\s{0,}\:+\s{0,}([\d\.]+).+?MemFree\s{0,}\:+\s{0,}([\d\.]+).+?Cached\s{0,}\:+\s{0,}([\d\.]+).+?SwapTotal\s{0,}\:+\s{0,}([\d\.]+).+?SwapFree\s{0,}\:+\s{0,}([\d\.]+)/s", $str, $buf);

    $res['memTotal'] = round($buf[1][0]/1024, 2);
    $res['memFree'] = round($buf[2][0]/1024, 2);
    $res['memCached'] = round($buf[3][0]/1024, 2);
    $res['memUsed'] = ($res['memTotal']-$res['memFree']);
    $res['memPercent'] = (floatval($res['memTotal'])!=0)?round($res['memUsed']/$res['memTotal']*100,2):0;
    $res['memRealUsed'] = ($res['memTotal'] - $res['memFree'] - $res['memCached']);
    $res['memRealPercent'] = (floatval($res['memTotal'])!=0)?round($res['memRealUsed']/$res['memTotal']*100,2):0;

    $res['swapTotal'] = round($buf[4][0]/1024, 2);
    $res['swapFree'] = round($buf[5][0]/1024, 2);
    $res['swapUsed'] = ($res['swapTotal']-$res['swapFree']);
    $res['swapPercent'] = (floatval($res['swapTotal'])!=0)?round($res['swapUsed']/$res['swapTotal']*100,2):0;

    // LOAD AVG
    if (false === ($str = @file("/proc/loadavg"))) return false;
    $str = explode(" ", implode("", $str));
    $str = array_chunk($str, 4);
    $res['loadAvg'] = implode(" ", $str[0]);

    return $res;
}

//FreeBSD系统探测
function sys_freebsd() {
	//CPU
	if (false === ($res['cpu']['num'] = get_key("hw.ncpu"))) return false;
	$res['cpu']['model'] = get_key("hw.model");

	//LOAD AVG
	if (false === ($res['loadAvg'] = get_key("vm.loadavg"))) return false;

	//UPTIME
	if (false === ($buf = get_key("kern.boottime"))) return false;
	$buf = explode(' ', $buf);
	$sys_ticks = time() - intval($buf[3]);
	$min = $sys_ticks / 60;
	$hours = $min / 60;
	$days = floor($hours / 24);
	$hours = floor($hours - ($days * 24));
	$min = floor($min - ($days * 60 * 24) - ($hours * 60));
	if ($days !== 0) $res['uptime'] = $days."天";
	if ($hours !== 0) $res['uptime'] .= $hours."小时";
$res['uptime'] .= $min."分钟";

//MEMORY
if (false === ($buf = get_key("hw.physmem"))) return false;
$res['memTotal'] = round($buf/1024/1024, 2);

$str = get_key("vm.vmtotal");
preg_match_all("/\nVirtual Memory[\:\s]*\(Total[\:\s]*([\d]+)K[\,\s]*Active[\:\s]*([\d]+)K\)\n/i", $str, $buff, PREG_SET_ORDER);
preg_match_all("/\nReal Memory[\:\s]*\(Total[\:\s]*([\d]+)K[\,\s]*Active[\:\s]*([\d]+)K\)\n/i", $str, $buf, PREG_SET_ORDER);

$res['memRealUsed'] = round($buf[0][2]/1024, 2);
$res['memCached'] = round($buff[0][2]/1024, 2);
$res['memUsed'] = round($buf[0][1]/1024, 2) + $res['memCached'];
$res['memFree'] = $res['memTotal'] - $res['memUsed'];
$res['memPercent'] = (floatval($res['memTotal'])!=0)?round($res['memUsed']/$res['memTotal']*100,2):0;

$res['memRealPercent'] = (floatval($res['memTotal'])!=0)?round($res['memRealUsed']/$res['memTotal']*100,2):0;

return $res;
}

//取得参数值 FreeBSD
function get_key($keyName) {
return do_command('sysctl', "-n $keyName");
}

//确定执行文件位置 FreeBSD
function find_command($commandName) {
$path = array('/bin', '/sbin', '/usr/bin', '/usr/sbin', '/usr/local/bin', '/usr/local/sbin');
foreach($path as $p) {
	if (@is_executable("$p/$commandName")) return "$p/$commandName";
}
return false;
}

//执行系统命令 FreeBSD
function do_command($commandName, $args) {
$buffer = "";
if (false === ($command = find_command($commandName))) return false;
if ($fp = @popen("$command $args", 'r')) {
	while (!@feof($fp)){
		$buffer .= @fgets($fp, 4096);
	}
	return trim($buffer);
}
return false;
}

//windows系统探测
function sys_windows() {
if (PHP_VERSION >= 5) {
	$objLocator = new COM("WbemScripting.SWbemLocator");
	$wmi = $objLocator->ConnectServer();
	$prop = $wmi->get("Win32_PnPEntity");
} else {
	return false;
}

//CPU
$cpuinfo = GetWMI($wmi,"Win32_Processor", array("Name","L2CacheSize","NumberOfCores"));
$res['cpu']['num'] = $cpuinfo[0]['NumberOfCores'];
if (null == $res['cpu']['num']) {
	$res['cpu']['num'] = 1;
}
for ($i=0;$i<$res['cpu']['num'];$i++){
	$res['cpu']['model'] .= $cpuinfo[0]['Name']."<br />";
	$res['cpu']['cache'] .= $cpuinfo[0]['L2CacheSize']."<br />";
}
// SYSINFO
$sysinfo = GetWMI($wmi,"Win32_OperatingSystem", array('LastBootUpTime','TotalVisibleMemorySize','FreePhysicalMemory','Caption','CSDVersion','SerialNumber','InstallDate'));
$res['win_n'] = $sysinfo[0]['Caption']." ".$sysinfo[0]['CSDVersion']." <b>序列号</b>:{$sysinfo[0]['SerialNumber']} 于".date('Y年m月d日H:i:s',strtotime(substr($sysinfo[0]['InstallDate'],0,14)))."安装";
//UPTIME
$res['uptime'] = $sysinfo[0]['LastBootUpTime'];

$sys_ticks = 3600*8 + time() - strtotime(substr($res['uptime'],0,14));
$min = $sys_ticks / 60;
$hours = $min / 60;
$days = floor($hours / 24);
$hours = floor($hours - ($days * 24));
$min = floor($min - ($days * 60 * 24) - ($hours * 60));
if ($days !== 0) $res['uptime'] = $days."天";
if ($hours !== 0) $res['uptime'] .= $hours."小时";
$res['uptime'] .= $min."分钟";

//MEMORY
$res['memTotal'] = $sysinfo[0]['TotalVisibleMemorySize'];
$res['memFree'] = $sysinfo[0]['FreePhysicalMemory'];
$res['memUsed'] = $res['memTotal'] - $res['memFree'];
$res['memPercent'] = round($res['memUsed'] / $res['memTotal']*100,2);

$swapinfo = GetWMI($wmi,"Win32_PageFileUsage", array('AllocatedBaseSize','CurrentUsage'));

// LoadPercentage
$loadinfo = GetWMI($wmi,"Win32_Processor", array("LoadPercentage"));
$res['loadAvg'] = $loadinfo[0]['LoadPercentage'];

return $res;
}

function GetWMI($wmi,$strClass, $strValue = array()) {
$arrData = array();

$objWEBM = $wmi->Get($strClass);
$arrProp = $objWEBM->Properties_;
$arrWEBMCol = $objWEBM->Instances_();
foreach($arrWEBMCol as $objItem) {
	@reset($arrProp);
	$arrInstance = array();
	foreach($arrProp as $propItem) {
		eval("\$value = \$objItem->" . $propItem->Name . ";");
		if (empty($strValue)) {
			$arrInstance[$propItem->Name] = trim($value);
		} else {
			if (in_array($propItem->Name, $strValue)) {
				$arrInstance[$propItem->Name] = trim($value);
			}
		}
	}
	$arrData[] = $arrInstance;
}
return $arrData;
}

//比例条
function bar($percent) {
?>
<div class="bar"><div class="barli" style="width:<?php echo $percent?>%">&nbsp;</div></div>
<?php
}
?>

<div id="page">
    <div id="header">
        <h1><a href="http://www.cnmysoft.com/">淘客帝国服务器探针 </a><a href="http://www.cnmysoft.com/">淘客帝国版本：<?php echo Newiconv("GBK","UTF-8",VERSON);?><small></small></a></h1> 
    </div>

<!--服务器相关参数-->
<table width="100%" cellpadding="3" cellspacing="0" align="center">
  <tr><th colspan="4">服务器参数</th></tr>
  <tr>
    <td>用户 - 服务器</td>
    <td colspan="3"><?php echo @get_current_user();?> - <?php echo $_SERVER['SERVER_NAME'];?>(<?php echo $_SERVER['SERVER_ADDR'];?><?//php echo gethostbyname($_SERVER['SERVER_NAME']);?>)</td>
  </tr>
  <tr>
    <td>服务器解译引擎</td>
    <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
    <td>服务器操作系统</td>
    <td><?$os = explode(" ", php_uname());?><?php echo $os[0];?> &nbsp;内核版本： <?php echo $os[2]?></td>
  </tr>
  <tr>
    <td>服务器标识</td>
    <td><?php if($sysInfo['win_n'] != ''){echo $sysInfo['win_n'];}else{echo @php_uname();};?> </td>
    <td>访客IP：</td>
    <td><?php echo $_SERVER['REMOTE_ADDR']?>&nbsp;</td>
  </tr>
  <tr>
    <td width="13%">服务器时间</td>
    <td width="37%"><?php echo date("Y年n月j日 H:i:s")?>
          &nbsp;北京时间：
          <?php echo gmdate("Y年n月j日 H:i:s",time()+8*3600)?></td>
    <td width="13%">可用空间(磁盘区)</td>
    <td width="37%"><?php echo round(@disk_free_space(".")/(1024*1024),2);?>&nbsp;M</td>
  </tr>
  <tr>
    <td>服务器语言</td>
    <td><?php echo getenv("HTTP_ACCEPT_LANGUAGE");?></td>
    <td>服务器端口</td>
    <td><?php echo $_SERVER['SERVER_PORT'];?></td>
  </tr>
  <tr>
	  <td>管理员邮箱</td>
	  <td><a href="mailto:<?php echo $_SERVER['SERVER_ADMIN'];?>"><?php echo $_SERVER['SERVER_ADMIN'];?></a></td>
	  <td>绝对路径</td>
	  <td><?php echo $_SERVER['DOCUMENT_ROOT']. "<br />".$_SERVER['$PATH_INFO'];?></td>
	</tr>
  <tr>
	  <td>Zend Optimizer</td>
	  <td><?php echo (get_cfg_var("zend_optimizer.optimization_level")||get_cfg_var("zend_extension_manager.optimizer_ts")||get_cfg_var("zend_extension_ts")) ? '<b>支持</b>' : '<font color="red">不支持</font>'; ?></td>
		<td>系统平均负载</td>
		<td><?php echo $sysInfo['loadAvg']?></td>
	</tr>
</table>
<?php if(is_file(WEBROOT."data\configdata.php")) {?>
<table width="100%" cellpadding="3" cellspacing="0" align="center">
  <tr>
    <th colspan="2">文件目录读写检测</th>
  </tr>
  <tr>
    <td width="30%">data目录：</td>
    <td>
      <?php
	  clearstatcache() ;
    if(!is_writable(WEBROOT."data")){
	echo("<font color='#FF0000'>无法写入</font>");	
	}else{
	echo("允许写入");	
	}


    ?></td>
  </tr>
  <tr>
    <td>Apicache目录：</td>
    <td><?php
    if(!is_writable(WEBROOT."Apicache")){
	echo("<font color='#FF0000'>无法写入</font>");	
	}else{
	echo("允许写入");	
	}

    ?></td>
  </tr>
  <tr>
    <td>data/log淘宝API日志目录：</td>
    <td><?php
    if(!is_writable(WEBROOT."data\log")){
	echo("<font color='#FF0000'>无法写入</font>");	
	}else{
	echo("允许写入");	
	}

    ?></td>
  </tr>
  <tr>
    <td>伪静态规则：：</td>
    <td><?php
    if(!is_writable(WEBROOT.".htaccess")){
	echo("<font color='#FF0000'>.htaccess无法写入</font  >");	
	}else{
	echo(".htaccess允许写入  ");	
	}
    if(!is_writable(WEBROOT."httpd.ini")){
	echo("<font color='#FF0000'>httpd.ini无法写入</font>  ");	
	}else{
	echo("httpd.ini允许写入  ");	
	}
    if(!is_writable(WEBROOT."web.config")){
	echo("<font color='#FF0000'>web.config无法写入</font>  ");	
	}else{
	echo("web.config允许写入  ");	
	}
    if(!is_writable(WEBROOT."nginx.conf")){
	echo("<font color='#FF0000'>nginx.conf无法写入</font>  ");	
	}else{
	echo("nginx.conf允许写入  ");	
	}

    ?></td>
  </tr>
  <tr>
    <td>data/configdata.php：</td>
    <td><?php
    if(!is_writable(WEBROOT."data\configdata.php")){
	echo("<font color='#FF0000'>无法写入</font>");	
	}else{
	echo("允许写入");	
	}

    ?></td>
  </tr>
</table>
<?php } ?>
<table width="100%" cellpadding="3" cellspacing="0" align="center">
  <tr>
    <th colspan="2">是否支持淘宝API</th>
  </tr>
  <tr>
    <td width="30%">淘宝API调用测试（网址方式）：</td>
    <td>
          <iframe src="phpinfo.php?apiip=1" frameborder="0" scrolling="no" height="60" width="600"></iframe>
	  </td>
  </tr>
  <tr>
    <td width="30%">淘宝API调用测试（ＩＰ方式）：</td>
    <td> <iframe src="phpinfo.php?apiip=2" frameborder="0" height="60" width="600"></iframe></td>
  </tr>
  <tr>
    <td colspan="2">如果您的服务器支持淘宝API，但是您获取不到数据，请检查APP是否设置正确。</td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<table width="100%" cellpadding="3" cellspacing="0" align="center">
  <tr>
    <th width="100%">最近100条API出错日志：</th>
  </tr>
  <tr>
    <td>
    <?php
       $errorpath = 'data/log' . '/' . date('Y-m-d') . '.log';
	   if(is_file($errorpath))
        if ($fp = file_get_contents($errorpath, 'a')) {
			
			
			$arrays = explode("\r",$fp);
			for($i=count($arrays)-1;$i>=0;$i--)
			{
					$str = 	$arrays[$i];
					$strarr = explode("fields",$str);
					
					$api_key = explode("api_key",$str);
					
				if(!empty($api_key[1])){
					echo("app".substr($api_key[1],0,10)." ".$strarr[0]."<br>");
					
					if(count($arrays)-$i > 100){
						break;	
					}
				}
			}
			
         }

	
	?>
    </td>
  </tr>
</table>

<?php 
if("show"==$sysReShow){?>
<table width="100%" cellpadding="3" cellspacing="0" align="center">
  <tr><th colspan="6">服务器CPU及内存相关运行参数</th></tr>
  <tr>
    <td>CPU核数</td>
    <td><?php echo $sysInfo['cpu']['num'];?>&nbsp;</td>
    <td>服务器已运行时间</td>
    <td><?php echo $sysInfo['uptime'];?></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>CPU型号</td>
    <td><?php echo $sysInfo['cpu']['model'];?></td>
    <td>CPU二级缓存</td>
    <td><?php echo $sysInfo['cpu']['cache'];?></td>
    <td>系统Bogomips</td>
    <td><?php echo $sysInfo['cpu']['bogomips']?></td>
  </tr>
	  <tr>
		<td>内存使用状况</td>
		<td colspan="5">
          物理内存：共
          <?php echo $sysInfo['memTotal']?>
          M, 已使用
          <?php echo $sysInfo['memUsed']?>
          M, 空闲
          <?php echo $sysInfo['memFree']?>
          M, 使用率
          <?php echo $sysInfo['memPercent']?>
          %
          <?php echo bar($sysInfo['memPercent'])?>
          Cache化内存为
          <?php echo $sysInfo['memCached']?>
          M, 真实内存使用率为
          <?php echo $sysInfo['memRealPercent']?>
          %
          <?php echo bar($sysInfo['memRealPercent'])?>
          SWAP区：共
          <?php echo $sysInfo['swapTotal']?>
          M, 已使用
          <?php echo $sysInfo['swapUsed']?>
          M, 空闲
          <?php echo $sysInfo['swapFree']?>
          M, 使用率
          <?php echo $sysInfo['swapPercent']?>
          %
          <?php echo bar($sysInfo['swapPercent'])?>

	  </td>
	</tr>
</table>
<?}?>

<?php

if($_GET["cpu"]!="") {
 if (false !== ($strs = @file("/proc/net/dev"))) : ?>
<table width="100%" cellpadding="3" cellspacing="0" align="center">
    <tr><th colspan="3" align="center">网络使用状况</th></tr>
<?php for ($i = 2; $i < count($strs); $i++ ) : ?>
<?php preg_match_all( "/([^\s]+):[\s]{0,}(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/", $strs[$i], $info );?>
     <tr>
        <td><?php echo $info[1][0]?> : </td>
        <td>已接收 : <?php $tmp = round($info[2][0]/1024/1024, 2); $tmp2 = round($tmp / 1024, 2);?> <?php echo $tmp?> MB (<b><?php echo $tmp2?> GB</b>)</td>
        <td>已发送 : <?php $tmp = round($info[10][0]/1024/1024, 2); $tmp2 = round($tmp / 1024, 2);?> <?php echo $tmp?> MB (<b><?php echo $tmp2?> GB</b>)</td>
    </tr>
<?php endfor; ?>
</table>
<?php endif; 

}?>

<table width="100%" cellpadding="3" cellspacing="0" align="center">

  <tr><th colspan="4" align="center">PHP相关参数</th></tr>
  <tr>
    <td width="35%">PHP信息（phpinfo）：</td>
    <td width="15%">
		<?php
		$phpSelf = $_SERVER[PHP_SELF] ? $_SERVER[PHP_SELF] : $_SERVER[SCRIPT_NAME];
		$disFuns=get_cfg_var("disable_functions");
		?>
    <?php echo (false!==eregi("phpinfo",$disFuns))? 'NO' :"<a href='$phpSelf?act=phpinfo' target='_blank'>PHPINFO</a>";?>
    </td>
    <td width="35%">PHP版本（php_version）：</td>
    <td width="15%"><?php echo PHP_VERSION;?></td>
  </tr>
  <tr>
    <td>PHP运行方式：</td>
    <td><?php echo strtoupper(php_sapi_name());?></td>
    <td>脚本占用最大内存（memory_limit）：</td>
    <td><?php echo show("memory_limit");?></td>
  </tr>
  <tr>
    <td>PHP安全模式（safe_mode）：</td>
    <td><?php echo show("safe_mode");?></td>
    <td>POST方法提交最大限制（post_max_size）：</td>
    <td><?php echo show("post_max_size");?></td>
  </tr>
  <tr>
    <td>上传文件最大限制（upload_max_filesize）：</td>
    <td><?php echo show("upload_max_filesize");?></td>
    <td>浮点型数据显示的有效位数（precision）：</td>
    <td><?php echo show("precision");?></td>
  </tr>
  <tr>
    <td>脚本超时时间（max_execution_time）：</td>
    <td><?php echo show("max_execution_time");?>秒</td>
    <td>socket超时时间（default_socket_timeout）：</td>
    <td><?php echo show("default_socket_timeout");?>秒</td>
  </tr>
  <tr>
    <td>PHP页面根目录（doc_root）：</td>
    <td><?php echo show("doc_root");?></td>
    <td>用户根目录（user_dir）：</td>
    <td><?php echo show("user_dir");?></td>
  </tr>
  <tr>
    <td>dl()函数（enable_dl）：</td>
    <td><?php echo show("enable_dl");?></td>
    <td>指定包含文件目录（include_path）：</td>
    <td><?php echo show("include_path");?></td>
  </tr>
  <tr>
    <td>显示错误信息（display_errors）：</td>
    <td><?php echo show("display_errors");?></td>
    <td>自定义全局变量（register_globals）：</td>
    <td><?php echo show("register_globals");?></td>
  </tr>
  <tr>
    <td>数据反斜杠转义（magic_quotes_gpc）：</td>
    <td><?php echo show("magic_quotes_gpc");?></td>
    <td>"&lt;?...?&gt;"短标签（short_open_tag）：</td>
    <td><?php echo show("short_open_tag");?></td>
  </tr>
  <tr>
    <td>"&lt;% %&gt;"ASP风格标记（asp_tags）：</td>
    <td><?php echo show("asp_tags");?></td>
    <td>忽略重复错误信息（ignore_repeated_errors）：</td>
    <td><?php echo show("ignore_repeated_errors");?></td>
  </tr>
  <tr>
    <td>忽略重复的错误源（ignore_repeated_source）：</td>
    <td><?php echo show("ignore_repeated_source");?></td>
    <td>报告内存泄漏（report_memleaks）：</td>
    <td><?php echo show("report_memleaks");?></td>
  </tr>
  <tr>
    <td>自动字符串转义（magic_quotes_gpc）：</td>
    <td><?php echo show("magic_quotes_gpc");?></td>
    <td>外部字符串自动转义（magic_quotes_runtime）：</td>
    <td><?php echo show("magic_quotes_runtime");?></td>
  </tr>
  <tr>
    <td>打开远程文件（allow_url_fopen）：</td>
    <td><?php echo show("allow_url_fopen");?></td>
    <td>声明argv和argc变量（register_argc_argv）：</td>
    <td><?php echo show("register_argc_argv");?></td>
  </tr>
	<tr>
		<td colspan="4">被禁用的函数（disable_functions）： <?php echo (""==($disFuns=get_cfg_var("disable_functions")))?"无":str_replace(",",", ",$disFuns)?></td>
	</tr>
</table>
<!--组件信息-->
<table width="100%" cellpadding="3" cellspacing="0" align="center">
  <tr><th colspan="4">组件支持</th></tr>
  <tr>
    <td width="30%">FTP支持：</td>
    <td width="20%"><?php echo isfun("ftp_login");?></td>
    <td width="30%">XML解析支持：</td>
    <td width="20%"><?php echo isfun("xml_set_object");?></td>
  </tr>
  <tr>
    <td>Session支持：</td>
    <td><?php echo isfun("session_start");?></td>
    <td>Socket支持：</td>
    <td><?php echo isfun("socket_accept");?></td>
  </tr>
  <tr>
    <td>ZEND Optimizer支持：</td>
    <td><?php echo (get_cfg_var("zend_optimizer.optimization_level")||get_cfg_var("zend_extension_manager.optimizer_ts")||get_cfg_var("zend.ze1_compatibility_mode")||get_cfg_var("zend_extension_ts"))?'支持':'<font color="red">不支持</font>';?></td>
    <td>允许URL打开文件：</td>
    <td><?php echo show("allow_url_fopen");?></td>
  </tr>
  <tr>
    <td>GD库支持：</td>
    <td><?php echo isfun("gd_info");?>
    <?php
        if(function_exists(gd_info)) {
            $gd_info = @gd_info();
	        $gd_info = $gd_info["GD Version"];
            echo $gd_info ? '&nbsp; 版本：'.$gd_info : '';
	    }
	?></td>
    <td>压缩文件支持(Zlib)：</td>
    <td><?php echo isfun("gzclose");?></td>
  </tr>
  <tr>
    <td>IMAP电子邮件系统函数库：</td>
    <td><?php echo isfun("imap_close");?></td>
    <td>历法运算函数库：</td>
    <td><?php echo isfun("JDToGregorian");?></td>
  </tr>
  <tr>
    <td>正则表达式函数库：</td>
    <td><?php echo isfun("preg_match");?></td>
    <td>WDDX支持：</td>
    <td><?php echo isfun("wddx_add_vars");?></td>
  </tr>
  <tr>
    <td>Iconv编码转换：</td>
    <td><?php echo isfun("iconv");?></td>
    <td>mbstring：</td>
    <td><?php echo isfun("mb_eregi");?></td>
  </tr>
  <tr>
    <td>高精度数学运算：</td>
    <td><?php echo isfun("bcadd");?></td>
    <td>LDAP目录协议：</td>
    <td><?php echo isfun("ldap_close");?></td>
  </tr>
  <tr>
    <td>MCrypt加密处理：</td>
    <td><?php echo isfun("mcrypt_cbc");?></td>
    <td>哈稀计算：</td>
    <td><?php echo isfun("mhash_count");?></td>
  </tr>
</table>
<!--数据库支持-->
<table width="100%" cellpadding="3" cellspacing="0" align="center">
  <tr><th colspan="2">数据库支持</th></tr>
  <tr>
    <td width="30%">MySQL 数据库：</td>
    <td><?php echo isfun("mysql_close");?>
      <?php
    if(function_exists("mysql_get_server_info")) {
        $s = @mysql_get_server_info();
        $s = $s ? '&nbsp; mysql_server 版本：'.$s : '';
	    $c = '&nbsp; mysql_client 版本：'.@mysql_get_client_info();
        echo $s ? $s : $c;
    }
    ?>
    </td>
    </tr>
</table>
<?php if($_GET["cpu"]!="" && false) {
?>
<form action="<?php echo $_SERVER[PHP_SELF]."#bottom";?>" method="post">
<!--服务器性能检测-->
<table width="100%" cellpadding="3" cellspacing="0" align="center">
  <tr><th colspan="4">服务器性能检测</th></tr>
  <tr align="center">
    <td width="34%">参照对象</td>
    <td width="22%">整数运算能力检测<br />(1+1运算300万次)</td>
    <td width="22%">浮点运算能力检测<br />(圆周率开平方300万次)</td>
    <td width="22%">数据I/O能力检测<br />(读取10K文件1万次)</td>
  </tr>
  <tr align="center">
    <td><a href="http://www.9gan.com/" class="black">Lunarpages Linux 虚拟主机</a></td>
    <td>0.228秒</td>
    <td>0.734秒</td>
    <td>0.100秒</td>
  </tr>
  <tr align="center">
    <td><a href="http://www.9gan.com/" class="black">Godaddy Linux 虚拟主机</a></td>
    <td>0.211秒</td>
    <td>0.72 秒</td>
    <td>0.093秒</td>
  </tr>
  <tr align="center">
    <td><a href="http://www.9gan.com/" class="black">BlueHost Linux 虚拟主机</a></td>
    <td>0.212 秒</td>
    <td>0.72 秒</td>
    <td>0.073 秒</td>
  </tr>
  <tr align="center">
    <td><a href="http://www.9gan.com/" class="black">IXwebhosting Linux 虚拟主机</a></td>
    <td>0.281 秒</td>
    <td>0.938 秒</td>
    <td>0.028 秒</td>
  </tr>
  <tr align="center">
    <td>本台服务器</td>
    <td><b><?php echo $valInt;?></b><br /><input class="btn" name="act" type="submit" value="整型测试" /></td>
    <td><b><?php echo $valFloat;?></b><br /><input class="btn" name="act" type="submit" value="浮点测试" /></td>
    <td><b><?php echo $valIo;?></b><br /><input class="btn" name="act" type="submit" value="IO测试" /></td>
  </tr>
</table>
<input type="hidden" name="pInt" value="<?php echo $valInt;?>" />
<input type="hidden" name="pFloat" value="<?php echo $valFloat;?>" />
<input type="hidden" name="pIo" value="<?php echo $valIo;?>" />
<!--MySQL数据库连接检测-->
<table width="100%" cellpadding="3" cellspacing="0" align="center">
	<tr><th colspan="3">MySQL数据库连接检测</th></tr>
  <tr>
    <td width="15%"></td>
    <td width="60%">
      地址：<input type="text" name="host" value="localhost" size="10" />
      端口：<input type="text" name="port" value="3306" size="10" />
      用户名：<input type="text" name="login" size="10" />
      密码：<input type="password" name="password" size="10" />
    </td>
    <td width="25%">
      <input class="btn" type="submit" name="act" value="MySQL检测" />
    </td>
  </tr>
</table>
  <?php
  if ($_POST['act'] == 'MySQL检测') {
  	if(function_exists("mysql_close")==1) {
  		$link = @mysql_connect($host.":".$port,$login,$password);
  		if ($link){
  			echo "<script>alert('连接到MySql数据库正常')</script>";
  		} else {
  			echo "<script>alert('无法连接到MySql数据库！')</script>";
  		}
  	} else {
  		echo "<script>alert('服务器不支持MySQL数据库！')</script>";
  	}
  }
	?>
<!--函数检测-->
<table width="100%" cellpadding="3" cellspacing="0" align="center">
	<tr><th colspan="3">函数检测</th></tr>
  <tr>
    <td width="15%"></td>
    <td width="60%">
      请输入您要检测的函数：
      <input type="text" name="funName" size="50" />
    </td>
    <td width="25%">
      <input class="btn" type="submit" name="act" align="right" value="函数检测" />
    </td>
  </tr>
  <?php
  if ($_POST['act'] == '函数检测') {
  	echo "<script>alert('$funRe')</script>";
  }
  ?>
</table>
<!--邮件发送检测-->

</form>
<?php }?>
<a id="bottom"></a>

<div id="footer">
&copy; 2010 <a href="http://www.cnmysoft.com/">淘客帝国</a> PHP探针 <?php echo $version; ?> All Rights Reserved.<br />
<?php $run_time = sprintf('%0.4f', microtime_float() - $time_start);?>
Processed in <?php echo $run_time?> seconds. <?php echo memory_usage();?> memory usage.
</div>

</div>
</div>
</body>
</html>