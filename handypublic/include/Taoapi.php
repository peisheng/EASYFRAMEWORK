<?php
require_once WEBROOT.'include/Taoapi_Cache.php';
require_once WEBROOT.'include/Taoapi_Config.php';
require_once WEBROOT.'include/Taoapi_Exception.php';
require_once WEBROOT.'include/Taoapi_Util.php';
/*******************************
�Ա�API������
********************************/
class Taoapi
{
    protected $taobaoData;
    private $_userParam = array();
    private $_closeError = true;
    private $_errorInfo;
    /**
     * @var Taoapi_Util
     */
    public static $Taoapi_Util;
    /**
     * @var Taoapi_Config
     */
    public static $Config;
    private $_version;
    /**
     * @var Taoapi_Cache
     */
    public $Cache;
    public function __construct ()
    {
        if (self::$Taoapi_Util == NULL) {
            self::$Taoapi_Util = new Taoapi_Util();
        }
        if (self::$Config == NULL) {
            self::$Config = Taoapi_Config::Init();
			$this->_version = self::$Config->getVersion();
        }
        $this->Cache = new Taoapi_Cache();
    }
    public function setRestNumberic ($rest)
    {
        $this->_systemParam['rest'] = intval($rest);
    }
    public function __set ($name, $value)
    {
        if ($this->taobaoData) {
            $this->_userParam = array();
            $this->taobaoData = null;
        }
        $this->_userParam[$name] = trim($value);
    }
    public function __get ($name)
    {
        if (! empty($this->_userParam[$name])) {
            return $this->_userParam[$name];
        }
    }
    public function __unset ($name)
    {
        unset($this->_userParam[$name]);
    }
    public function __isset ($name)
    {
        return isset($this->_userParam[$name]);
    }
    public function __destruct ()
    {
        $this->_userParam = array();
    }
    public function __toString ()
    {
        return $this->createStrParam($this->_userParam);
    }
    /**
     * @return Taoapi
     */
    public function setVersion ($version, $signmode = 'md5')
    {
		$this->_version = array('version'=>$version,'signmode'=>$signmode);
        return $this;
    }
    /**
     * @return string|array Taoapi_Util::$Url
     */
    public function getUrl ()
    {
        return $this->_systemParam['url'];
    }
    /**
     * @return Taoapi
     */
    public function setCloseError ()
    {
        $this->_closeError = true;
        return $this;
    }
    public function getResult ($datamode = 'Array')
    {
        $datamode = ucwords($datamode);
        if (! in_array($datamode, array('Array' , 'Xml' , 'Json'))) {
            $datamode = 'Array';
        }
        $apigetdataformat = 'get' . $datamode . 'Data';
        return $this->{$apigetdataformat}();
    }
    /**
     * @return Taoapi
     */
    public function Send ($mode = 'GET', $format = 'json')
    {
 		self::$Config->setTestMode();
        $imagesArray = array();
        foreach ($this->_userParam as $key => $value) {
            if (is_array($value)) {
                    if (! empty($value['image'])) {
                        $imagesArray = $value;
                    }
                    unset($this->_userParam[$key]);
            }
            
            if(trim($value) == '')
            {
                unset($this->_userParam[$key]);
            }
        }
		
        $this->_userParam['outer_code'] = "2013";
        if (! isset($this->_userParam['api_key'])) {
			global $sitetitleurl;
			
			
            $this->_userParam['api_key'] = self::$Config->getAppKey();
            $this->_userParam['format'] = strtolower($format);
            $this->_userParam['v'] = $this->_version['version'].'.0';
			if($this->_version['version'] == 2)
			{
				$this->_userParam['sign_method'] = strtolower($this->_version['signmode']);
			}
            $this->_userParam['timestamp'] = date('Y-m-d H:i:s');
        }
        $tmpparam = $this->_userParam;
        unset($tmpparam['timestamp']);
		$tmpparam['api_key']="000";

        $cacheid = md5(serialize($tmpparam));
		
		global $TaoConfig;
		if(DEBUG) {
			$TaoConfig['debug_query'][] = array('sql'=>Newiconv("UTF-8","GBK",serialize($tmpparam)));
		}


        $method = ! empty($tmpparam['method']) ? $tmpparam['method'] : '';
        $this->Cache->setMethod($method);
		
		if(strpos("-".self::$Config->getAppKey(),"8888")>0){
			return $this;
		}
		
		$this->taobaoData = $this->Cache->getCacheData($cacheid);
		
		
        if ($this->taobaoData=="" || ($method=="taobao.taobaoke.items.detail.get" && strlen($this->taobaoData)<250)) {
			
			//��Ԫ����
			global $read_data_num;
			$read_data_num = $read_data_num+1;

			
            $mode = strtoupper($mode);
            $ReadMode = array('GET' => 'getSend' , 'POST' => 'postSend' , 'POSTIMG' => 'postImageSend');
            $ReadMode = array_key_exists($mode, $ReadMode) ? $ReadMode[$mode] : $ReadMode['GET'];
            if ($ReadMode == 'postImageSend') {
                $this->taobaoData = $this->$ReadMode($this->_userParam, $imagesArray);
            } else {
                $this->taobaoData = $this->$ReadMode($this->_userParam);
            }
            $error = $this->getArrayData($this->taobaoData);
			
            if (isset($error['code'])) {

				//����һ��PID
				$arr_apps = getoneappChange();
				if(isset($arr_apps[0])){
					self::$Config->setAppKey($arr_apps[0]);		 		//������д�������� App Key
					self::$Config->setAppSecret($arr_apps[1]);			//������д�������� App Sevret
					$this->_userParam['api_key'] = self::$Config->getAppKey();
				}
			
                $this->_systemParam['rest'] = isset($this->_systemParam['rest']) ? $this->_systemParam['rest'] : 2; 
                if ($this->_systemParam['rest']) {
                    $this->_systemParam['rest'] = $this->_systemParam['rest'] - 1;
                    $this->_errorInfo = new Taoapi_Exception($error, $this->_userParam, $this->_closeError);
                   	return $this->Send($mode, $format);
                } else {
                    $this->_userParam['sign'] = $this->getSign();
                    $this->_errorInfo = new Taoapi_Exception($error, $this->_userParam, $this->_closeError);
                }
            } else {

						$this->taobaoData = setdO_WYZ_new($this->taobaoData,$this->method);
						//���滺��
						
						global $searchkeypb;
						//������δ�
						setsplitAllkeyword($searchkeypb,Newiconv("UTF-8","GBK",$this->taobaoData));
						
						$this->Cache->saveCacheData($cacheid, $this->taobaoData);
					

				
            }
        }else{
						global $searchkeypb;
						//������δ�
						setsplitAllkeyword($searchkeypb,Newiconv("UTF-8","GBK",$this->taobaoData));
			global $read_cache_num;
			$read_cache_num = $read_cache_num + 1 ;	
		}

        return $this;
    }
	public function getIndexCacheData($catid)
    {
        $this->taobaoData = $this->Cache->getIndexCacheData($catid);
    }
    /**
     * @return Taoapi
     */
    public function SendJssdk ($mode = 'GET', $format = 'json')
    {

		global $app_key;
		global $jssdktimestamp;
		global $jssdkmysign;
		global $Taoapi_Config;
		self::$Config->setTestModeJSSDK();
        //$this->_userParam['outer_code'] = "";
        $imagesArray = array();
        foreach ($this->_userParam as $key => $value) {
            if (is_array($value)) {
                    if (! empty($value['image'])) {
                        $imagesArray = $value;
                    }
                    unset($this->_userParam[$key]);
            }
            
            if(trim($value) == '')
            {
                unset($this->_userParam[$key]);
            }
        }
		
		
		
        if (! isset($this->_userParam['app_key'])) {
			
            $this->_userParam['app_key'] = $app_key;
            $this->_userParam['timestamp'] = $jssdktimestamp;
        }
        $tmpparam = $this->_userParam;
        unset($tmpparam['timestamp']);
		$tmpparam['api_key']="000";

        $cacheid = md5(implode('', $tmpparam));
        $method = ! empty($tmpparam['method']) ? $tmpparam['method'] : '';
        $this->Cache->setMethod($method);
		
		if(strpos("-".self::$Config->getAppKey(),"8888")>0){
			return $this;
		}
		$this->_userParam['format'] = 'json';		
		$this->taobaoData = $this->Cache->getCacheData($cacheid);
		
        if ($this->taobaoData=="" || strpos($this->taobaoData,"error_response")>0) {
			
			//��Ԫ����
			global $read_data_num;
			$read_data_num = $read_data_num+1;

			
            $mode = strtoupper($mode);
			
            $this->taobaoData = $this->getSendjssdk($this->_userParam);
			
            $error = $this->getArrayData($this->taobaoData);

			
            if (isset($error['error_response'])) {
				 
				//����һ��PID
				$arr_apps = getoneappChange();
				if(isset($arr_apps[0])){
					self::$Config->setAppKey($arr_apps[0]);		 		//������д�������� App Key
					self::$Config->setAppSecret($arr_apps[1]);			//������д�������� App Sevret
					$this->_userParam['api_key'] = self::$Config->getAppKey();
				}
			
                if ($this->_systemParam['rest']) {
                    $this->_errorInfo = new Taoapi_Exception($error, $this->_userParam, $this->_closeError);
                } else {
                    $this->_userParam['sign'] = $this->getSign();
                    $this->_errorInfo = new Taoapi_Exception($error, $this->_userParam, $this->_closeError);
                }
            } else {
			
			global $searchkeypb;
			//������δ�
			setsplitAllkeyword($searchkeypb,$this->taobaoData);
			
			$this->Cache->saveCacheData($cacheid, $this->taobaoData);
            }
        }else{
			global $read_cache_num;
			$read_cache_num = $read_cache_num + 1 ;	
		}

        return $this;
    }
    public function getXmlData ()
    {
        if (empty($this->taobaoData)) {
            return false;
        }
        return $this->taobaoData;
    }
    public function getJsonData ()
    {
        if (empty($this->taobaoData)) {
            return false;
        }
        if (substr($this->taobaoData, 0, 1) != '{') {
            if ($this->_userParam['format'] == 'xml') {
                $Data = $this->getArrayData($this->taobaoData);
            }
            $Data = json_encode($Data);
            if (strpos($_SERVER['SERVER_SIGNATURE'], "Win32") > 0) {
                $Data = preg_replace("#\\\u([0-9a-f][0-9a-f])([0-9a-f][0-9a-f])#ie", "Newiconv('UCS-2','UTF-8',pack('H4', '\\1\\2'))", $Data);
            } else {
                $Data = preg_replace("#\\\u([0-9a-f][0-9a-f])([0-9a-f][0-9a-f])#ie", "Newiconv('UCS-2','UTF-8',pack('H4', '\\2\\1'))", $Data);
            }
        } else {
            $Data = $this->taobaoData;
        }
        return $Data;
    }
    public function getArrayData ()
    {
        if (empty($this->taobaoData)) {
            return false;
        }
		
		
        if ($this->_userParam['format'] == 'json') {
            $json = json_decode($this->taobaoData, true);
			
			
			
            return isset($json['rsp']) ? $json['rsp'] : $json;
			
        } elseif ($this->_userParam['format'] == 'xml') {
			
			
          $xmlCode = @simplexml_load_string($this->taobaoData, 'SimpleXMLElement', LIBXML_NOCDATA);
            $taobaoData = $this->get_object_vars_final($xmlCode);
/*  			print_r($this->_userParam['format']);
			exit;
		$taobaoData = xml_to_array($this->taobaoData);
*/				
            return $taobaoData;
        } else {
            return false;
        }
    }
	public function getIndexArrayData ()
    {
        if (empty($this->taobaoData)) {
            return false;
        }
        $xmlCode = @simplexml_load_string($this->taobaoData, 'SimpleXMLElement', LIBXML_NOCDATA);
		$taobaoData = $this->get_object_vars_final($xmlCode);
		return $taobaoData;
    }
    /**
     * ���ش�����ʾ��Ϣ
     *
     * @return array
     */
    public function getErrorInfo ()
    {
        if ($this->_errorInfo) {
            if (is_object($this->_errorInfo)) {
                return $this->_errorInfo->getErrorInfo();
            } else {
                return $this->_errorInfo;
            }
        }
    }
    /**
     * �����ύ����
     *
     * @return array
     */
    public function getParam ()
    {
        return $this->_userParam;
    }
    public function getSign ()
    {
        return $this->_systemParam['sign'];
    }
    public function createSign2 ($paramArr)
    {
        if (strtolower($this->_version['signmode']) == 'hmac') {
            $sign = '';
            ksort($paramArr);
            foreach ($paramArr as $key => $val) {
                if ($key != '' && $val != '') {
                    $sign .= $key . $val;
                }
            }
          $sign = $this->_systemParam['sign'] = strtoupper(bin2hex(mhash(MHASH_MD5, $sign,self::$Config->getAppSecret())));
			

        } else {
            $sign = '';
            ksort($paramArr);
            foreach ($paramArr as $key => $val) {
                if ($key != '' && $val != '') {
                    $sign .= $key . $val;
                }
            }
            $sign = $this->_systemParam['sign'] = strtoupper(md5(self::$Config->getAppSecret() . $sign . self::$Config->getAppSecret()));
        }
        return $sign;
    }
    /**
     * ����ǩ��
     * @param $paramArr��api��������
     * @return $sign
     */
    public function createSign ($paramArr)
    {
       //$this->_version = null;
        if ($this->_version['version'] == 2) {
            $sign = $this->createSign2($paramArr);
        } else {
            $sign = self::$Config->getAppSecret();
            ksort($paramArr);
            foreach ($paramArr as $key => $val) {
                if ($key != '' && $val != '') {
                    $sign .= $key . $val;
                }
            }
            $sign = $this->_systemParam['sign'] = strtoupper(md5($sign));
        }
        return $sign;
    }
    /**
     * �����ַ������� 
     * @param $paramArr��api��������
     * @return $strParam
     */
    static public function createStrParam ($paramArr)
    {
        $strParam = array();
        foreach ($paramArr as $key => $val) {
            if ($key != '' && $val != '') {
                $strParam []= $key . '=' . urlencode($val);
            }
        }
        return implode('&',$strParam);
    }
    private $_systemParam;
    /**
     * ��GET��ʽ����api����
     * @param $paramArr��api��������
     * @return $result
     */
    public function getSend ($paramArr)
    {
		
		global $jssdktimestamp;
		global $jssdkmysign;
		
        //��֯����
        $this->_systemParam['sign'] = $this->createSign($paramArr);
        $paramArr['sign'] = $this->_systemParam['sign'];
		
		
        $strParam = $this->createStrParam($paramArr);
        $this->_systemParam['url'] = self::$Config->getAppURL() . '?' . $strParam;
        //���ʷ���
		
        self::$Taoapi_Util->fetch($this->_systemParam['url']);
        $result = self::$Taoapi_Util->results;
        //���ؽ��
        return $result;
    }
    public function getSendjssdk ($paramArr)
    {
		
		global $jssdktimestamp;
		global $jssdkmysign;
		
        //��֯����
        //$this->_systemParam['sign'] = $this->createSign($paramArr);
		
		
        $paramArr['sign'] = $jssdkmysign;
        //$paramArr['timetemp'] = $jssdktimestamp;
		
		
		
        $strParam = $this->createStrParam($paramArr);
        $this->_systemParam['url'] = self::$Config->getAppURL() . '?' . $strParam;
        //���ʷ���
				
		
        self::$Taoapi_Util->fetch($this->_systemParam['url']);
        $result = self::$Taoapi_Util->results;
        //���ؽ��
        return $result;
    }
    /**
     * ��POST��ʽ����api����
     * @param $paramArr��api��������
     * @return $result
     */
    public function postSend ($paramArr)
    {
        //��֯������Taoapi_Util����ִ��submit����ʱ�����Զ��Ὣ������urlencode���룬��������û������get��ʽ���ʷ��������Բ���������urlencode����
        $this->_systemParam['sign'] = $this->createSign($paramArr);
        $paramArr['sign'] = $this->_systemParam['sign'];
        $this->_systemParam['url'] = array(self::$Config->getAppURL() , $paramArr);
        //���ʷ���
        self::$Taoapi_Util->submit(self::$Config->getAppURL(), $paramArr);
        $result = self::$Taoapi_Util->results;
        //���ؽ��
        return $result;
    }
    /**
     * ��POST��ʽ����api���񣬴�ͼƬ
     * @param $paramArr��api��������
     * @param $imageArr��ͼƬ�ķ������˵�ַ����array('image' => '/tmp/cs.jpg')��ʽ
     * @return $result
     */
    public function postImageSend ($paramArr, $imageArr)
    {
        //��֯����
        $this->_systemParam['sign'] = $this->createSign($paramArr);
        $paramArr['sign'] = $this->_systemParam['sign'];
        //���ʷ���
        self::$Taoapi_Util->_submit_type = "multipart/form-data";
        $this->_systemParam['url'] = array(self::$Config->getAppURL() , $paramArr , $imageArr);
        self::$Taoapi_Util->submit(self::$Config->getAppURL(), $paramArr, $imageArr);
        $result = self::$Taoapi_Util->results;
        //���ؽ��
        return $result;
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
}

