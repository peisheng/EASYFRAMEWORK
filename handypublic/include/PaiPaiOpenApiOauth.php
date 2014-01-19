<?php
/**
 * Created by JetBrains PhpStorm.
 * User: denniszhu
 * Date: 12-8-13
 * Time: ����4:26
 * To change this template use File | Settings | File Templates.
 */

require_once WEBROOT.'include/HttpClient.class.php';

require_once WEBROOT.'include/Taoapi_Cache.php';

class PaiPaiOpenApiOauth
{

    private $uin;
    private $appOAuthID;
    private $appOAuthkey;
    private $accessToken;
    private $hostName="api.paipai.com";
    private $format="xml";
    private $charset="gbk";
    private $method = "get";	//POST or GET
    private $params ;           //{String, Object}

    private  $apiPath;
    private  $debugOn; //�Ƿ�򿪵���ģʽ

    public $Cache;

    public function __construct($appOAuthID,$appOAuthkey,$accessToken,$uin){
        $this->appOAuthID = $appOAuthID;
        $this->appOAuthkey = $appOAuthkey;
        $this->accessToken = $accessToken;
        $this->uin = $uin;
        $this->PaiPaiOpenApiOauth();
		
        $this->Cache = new Taoapi_Cache();
    }


    private function PaiPaiOpenApiOauth(){
        $this->params = array();
        $this->params["randomValue"] = (rand() * 100000+11229);
        $this->params["timeStamp"] = $this->getMillisecond();
    }


    private function getMillisecond (){
        list($s1, $s2) = explode(' ', microtime());
        $ret =  (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000) . "";
        return $ret;
    }


    private function invokeOpenApi(){


        $this->params["appOAuthID"] = $this->appOAuthID;
        $this->params["accessToken"] = $this->accessToken;
        $this->params["uin"] = $this->uin;
        $this->params["format"] = $this->format;
        $this->params["charset"] = $this->charset;

        $protocol = "http";                 // "http" | "https"

        // �ڶ����� ������Կ���õ���Կ�ķ�ʽ����Ӧ�õ�appOAuthkeyĩβ����һ���ֽڵġ�&������appOAuthkey&
        $secret = $this->appOAuthkey . "&";

        //����ǩ����ʹ��HMAC-SHA1�����㷨����Step1�еĵ���Դ���Լ�Step2�еõ�����Կ���м��ܡ�Ȼ�󽫼��ܺ���ַ�������Base64���롣
        $sign = $this->makeSign($this->method, $secret);
        $this->params["sign"] = $sign;

        //echo "@@@@:invokeOpenApi: sign :" ;var_dump( $sign);echo "<br/>";
        //echo "@@@@:invokeOpenApi: encodeUrl(sign) :" ;var_dump($this->encodeUrl($sign));echo "<br/>";
        $url = $protocol . "://" . $this->hostName . $this->apiPath . '?charset=' . $this->params["charset"] .'&';

        unset($this->params["charset"]);

        $cookies = null;
        $resp = null;
		
		
		
		//���û���
		$cacheid = $this->getcacheidparam();
		$this->Cache->setMethod($this->getapipath_name());

		$resp = $this->Cache->getCacheData($cacheid);
		
			global $searchkeypb;
		
		if($resp==""){
			global $read_data_num;
			$read_data_num = $read_data_num+1;
				
				if(!strcmp("POST", strtoupper($this->method))){
					$resp = $this->postRequest($url, $cookies, $protocol);
				}else if(!strcmp("GET", strtoupper($this->method))){
					$resp = $this->getRequest($url, $cookies, $protocol);
				}else{
					$resp = "";//error
				}
			$resp_return = $this->getarrdata($resp);
			
									//������δ�
				setsplitAllkeyword($searchkeypb,Newiconv("UTF-8","GBK",$resp));
			
			$this->Cache->saveCacheData($cacheid, $resp);
		}else{
			$resp_return = $this->getarrdata($resp);
			
			
			//if($resp_return["errorCode"]!="0" || ($resp_return["errorCode"]=="0" && $resp_return["hitNum"]=="0")){
			if($resp_return["errorCode"]!="0"){
				global $read_data_num;
				$read_data_num = $read_data_num+1;
				if(!strcmp("POST", strtoupper($this->method))){
					$resp = $this->postRequest($url, $cookies, $protocol);
				}else if(!strcmp("GET", strtoupper($this->method))){
					$resp = $this->getRequest($url, $cookies, $protocol);
				}else{
					$resp = "";//error
				}
				$resp_return = $this->getarrdata($resp);
	
				if($resp_return["errorCode"]=="0"){
									//������δ�
				setsplitAllkeyword($searchkeypb,Newiconv("UTF-8","GBK",$resp));
					$this->Cache->saveCacheData($cacheid, $resp);
				}else{
					
					//print_r($resp);	
				}
			}else{
				
									//������δ�
				setsplitAllkeyword($searchkeypb,Newiconv("UTF-8","GBK",$resp));

				global $read_cache_num;
				$read_cache_num = $read_cache_num + 1 ;	
	
			}
			
		}
		
		
        return $resp_return;
    }
	
	public function getpaidata(){
				return $resp;
	}
	
	public function getcacheidparam(){
		
		$arr = $this->params;
		$arr["randomValue"] = "";
		$arr["timeStamp"] = "";
		$arr["sign"] = "";
		
		$returnstr = md5(serialize($arr));
		
		return $returnstr;
	}
	public function getapipath_name(){
		
		$returnstr = str_replace("/",".",$this->apiPath);
		$returnstr = "paipai".str_replace(".xhtml","",$returnstr);
		
		return $returnstr;
	}

    public function invoke(){
        $res = $this->invokeOpenApi();
		
        return $res;
    }
	
    public function getarrdata($res){
        if($this->format=="xml"){
          $xmlCode = @simplexml_load_string($res, 'SimpleXMLElement', LIBXML_NOCDATA);
            $res = $this->get_object_vars_final($xmlCode);
			
        }else if($this->format=="json"){
			$res = json_decode($res, true);
			
        }else{
            throw new Exception();
        }
		return $res;
	}

    private function get_object_vars_final ($obj)
    {
        if (is_object($obj)) {
            $obj = get_object_vars($obj);
        }
        if (is_array($obj)) {
            foreach ($obj as $key => $value) {
                $obj[$key] = $this->get_object_vars_final($value);
            }
        }
        return $obj;
    }

    /**
     * ������������ǩ��ֵ��
     * 1. ʹ��HMAC-SHA1�����㷨����Step1�еĵ���Դ���Լ�Step2�еõ�����Կ���м��ܡ�
     * 2. Ȼ�󽫼��ܺ���ַ�������Base64���롣
     * 3. �õ���ǩ��ֵ������£�
     *
     * more,to see: http://php.net/manual/en/function.hash-hmac.php
     * @param $method
     * @param $secret
     */
    public function makeSign($method, $secret){
        $sig = "";
        try{
            //echo "@@@@:makeSign: (secret)  :" ;var_dump($secret);echo "<br/>";
            //��ȡ��Ҫ���ܵ�ԭ��
            $mk = $this->makeSource($method, $this->apiPath);
            //echo "@@@@:makeSign: makeSign(mk) Src String :" ;var_dump($mk);echo "<br/>";
            //ʹ��sha1 �����㷨����
            //ע�⣺�����������Ϊtrue�� When set to TRUE, outputs raw binary data. FALSE outputs lowercase hexits.
            $hash = hash_hmac("sha1", $mk, $secret, true);

            //�����ܺ���ַ�����base64��ʽ����
            $sig = base64_encode($hash);
        }catch (Exception $e){
            throw new Exception();
        }
        return $sig;
    }


    /**
     * ����ԭ��
     * Դ������3���������á�&��ƴ�������ģ�   HTTP����ʽ & urlencode(uri) & urlencode(a=x&b=y&...)
     * @param $method  get | post
     * @param $urlPath if our url is http://api.paipai.com/deal/sellerSearchDealList.xhtml,then
     * $urlPath=/deal/sellerSearchDealList.xhtml
     */
    public function makeSource($method, $urlPath){
        $keys = $this->params;
        ksort($keys);//���չؼ����С��������
        //��ƴװ  HTTP����ʽ & urlencode(uri) &
        $buffer = "" . strtoupper($method) . "&" . $this->encodeUrl($urlPath) . "&";
        //ƴװ ��������
        $buffer2 = "";
        foreach($keys as $key => $value){
            $buffer2 .= $key . "=" . $value . "&";
        }
        $buffer2 = substr_replace($buffer2, '', -1, 1 );
        //��װ��Ԥ�ڵġ�ԭ����
        $buffer .= $this->encodeUrl($buffer2);

        return $buffer;
    }


    private function getRequest($url, $cookies, $protocol){
        $httpClient = new HttpClient($this->hostName);
        $httpClient->setDebug($this->getDebugOn());//�Ƿ��debugģʽ
        try{
            $httpClient->setUserAgent("PaiPai API Invoker/PHP " . PHP_VERSION);
			
			
			
            if (!$httpClient->get($url, $this->getParams())) {
                return '<p>Request failed!</p>';
            } else {
                return $httpClient->getContent();
            }
        }catch (Exception $e){

        }
    }


    private function postRequest($url, $cookies, $protocol){
        $httpClient = new HttpClient($this->hostName);
        $httpClient->setDebug(true);
        try{
            $httpClient->setUserAgent("PaiPai API Invoker/PHP " . PHP_VERSION);
            if(!$httpClient->post($url,$this->getParams())){
                return '<p>Request failed!</p>';
            }else{
                return $httpClient->getContent();
            };
        }catch (Exception $e){

        }
    }


    private function encodeUrl($input) {
        try{
            $tmpUrl = urlencode($input);
            $tmpUrl = str_replace("+", "%20",$tmpUrl);
            $tmpUrl = str_replace("*", "%2A",$tmpUrl);
            return $tmpUrl;
        }catch (Exception $e){
            throw new Exception($e->getMessage(),$e->getCode());
        }
    }


    /**
     * the follows are getters and setters
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function setApiPath($apiPath)
    {
        $this->apiPath = $apiPath;
    }

    public function getApiPath()
    {
        return $this->apiPath;
    }

    public function setAppOAuthID($appOAuthID)
    {
        $this->appOAuthID = $appOAuthID;
    }

    public function getAppOAuthID()
    {
        return $this->appOAuthID;
    }

    public function setAppOAuthkey($appOAuthkey)
    {
        $this->appOAuthkey = $appOAuthkey;
    }

    public function getAppOAuthkey()
    {
        return $this->appOAuthkey;
    }

    public function setCharset($charset)
    {
        $this->charset = $charset;
    }

    public function getCharset()
    {
        return $this->charset;
    }

    public function setFormat($format)
    {
        $this->format = $format;
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function setHostName($hostName)
    {
        $this->hostName = $hostName;
    }

    public function getHostName()
    {
        return $this->hostName;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public static function setOauth($oauth)
    {
        self::$oauth = $oauth;
    }

    public static function getOauth()
    {
        return self::$oauth;
    }

    public function setUin($uin)
    {
        $this->uin = $uin;
    }

    public function getUin()
    {
        return $this->uin;
    }

    public function setParams($params)
    {
        $this->params = $params;
    }

    /**
     * @return mixed this is a reference!!!!
     */
    public function &getParams()
    {
        return $this->params;
    }

    public function setDebugOn($debugOn)
    {
        $this->debugOn = $debugOn;
    }

    public function getDebugOn()
    {
        return $this->debugOn;
    }


}
