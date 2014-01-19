<?php
/**�Ա���������**/
class Taoapi_Exception
{
    private $_ErrorInfo;
    private $_ErrorLevel;
    public function __construct ($error, $paramArr = null, $closeerror = false)
    {
        return $this->ViewError($error, $paramArr, $closeerror);
    }
    public function getErrorInfo ()
    {
        return $this->_ErrorInfo;
    }
    private function ErrorInfo ($errorcode)
    {
 		$errorinfo[0] = array('en'=>'Unknown Error','cn'=>'δ֪����');
 		$errorinfo[3] = array('en'=>'Upload fail','cn'=>'�ϴ�����ʧ��');
 		$errorinfo[4] = array('en'=>'User Call limited','cn'=>'�û���api�ĵ��ó�������');
		$errorinfo[5] = array('en'=>'Session Call limited','cn'=>'�û��Ự�ں���Ƶ������');
		$errorinfo[7] = array('en'=>'App Call Limited','cn'=>'app��api�ĵ��ó�������');
		$errorinfo[8] = array('en'=>'App call exceeds limited frequency','cn'=>'ÿ���ӵ��ô�app�Ĵ�������������');
		$errorinfo[9] = array('en'=>'Http action not allowed','cn'=>'�÷���������ʹ�ô�Http����');
		$errorinfo[10] = array('en'=>'Service currently unavailable','cn'=>'���񲻿���');
		$errorinfo[11] = array('en'=>'Insufficient ISV permissions','cn'=>'����������Ȩ�޲���');
		$errorinfo[12] = array('en'=>'Insufficient user permissions','cn'=>'�û�Ȩ�޲���');
		$errorinfo[15] = array('en'=>'Remote service error','cn'=>'ִ��Զ�̷���ʱ����');
		$errorinfo[21] = array('en'=>'Missing Method','cn'=>'������ʧ');
		$errorinfo[22] = array('en'=>'Invalid Method','cn'=>'������Ч');
		$errorinfo[23] = array('en'=>'Invalid Format','cn'=>'��Ӧ��ʽ��Ч');
		$errorinfo[24] = array('en'=>'Missing signature','cn'=>'ǩ���� APP SECRET��ʧ');
		$errorinfo[25] = array('en'=>'Invalid signature','cn'=>'ǩ���� APP SECRET��Ч');
		$errorinfo[26] = array('en'=>'Missing session','cn'=>'�Ự��ʶ���붪ʧ');
		$errorinfo[27] = array('en'=>'Invalid session','cn'=>'�Ự��ʶ������Ч');
		$errorinfo[28] = array('en'=>'Missing API Key','cn'=>'App_Key��ʧ');
		$errorinfo[29] = array('en'=>'Invalid API Key','cn'=>'App_Key��Ч');
		$errorinfo[30] = array('en'=>'Missing timestamp','cn'=>'ʱ�����ʧ');
		$errorinfo[31] = array('en'=>'Invalid timestamp','cn'=>'ʱ�����Ч');
		$errorinfo[32] = array('en'=>'Missing version','cn'=>'�汾��ʧ');
		$errorinfo[33] = array('en'=>'Invalid version','cn'=>'�汾����');
		$errorinfo[34] = array('en'=>'Unsupported version','cn'=>'�汾δ����API֧��');
		$errorinfo[40] = array('en'=>'Missing required arguments','cn'=>'������ʧ��ָ�� method ,session ,timestamp ,format ,app_key ,v ,sign�������������ʧ');
		$errorinfo[41] = array('en'=>'Invalid arguments','cn'=>'������ʽ����');
		$errorinfo[550] = array('en'=>'User service unvailable','cn'=>'�û����ݷ��񲻿���');
		$errorinfo[551] = array('en'=>'Item service unvailable','cn'=>'��Ʒ���ݷ��񲻿���');
		$errorinfo[552] = array('en'=>'Item image service unvailable','cn'=>'��ƷͼƬ���ݷ��񲻿���');
		$errorinfo[553] = array('en'=>'Item simple update service unavailable','cn'=>'���¼ܣ��Ƽ���ȡ���Ƽ� ���񲻿���');
		$errorinfo[560] = array('en'=>'Trade service unvailable','cn'=>'�������ݷ��񲻿���');
		$errorinfo[590] = array('en'=>'Shop service unavailable','cn'=>'���̷��񲻿���');
		$errorinfo[591] = array('en'=>'Shop showcase remainCount unavailable','cn'=>'����ʣ���Ƽ��� ���񲻿���');
		$errorinfo[601] = array('en'=>'User not exist','cn'=>'�û������� ');
		
        if (! array_key_exists($errorcode, $errorinfo)) {
            $errorcode = 0;
        }
        return $errorinfo[$errorcode];
    }
    public function WriteError ($error, $paramArr)
    {
        $errorpath = WEBROOT.'/data/log';
        if (! is_dir($errorpath)) {
            @mkdir($errorpath, 755);
        }
        if ($fp = @fopen($errorpath . '/' . date('Y-m-d') . '.log', 'a')) {
            $errorinfotext[] = date('Y-m-d H:i:s');
            $errorinfotext[] = "Code:".$error['code']." Error:" . $error['sub_code'] . " ";
			$pagestr = $_SERVER["REQUEST_URI"];
            $errorinfotext[] = $pagestr . " ";
			
			
            foreach ($paramArr as $key => $value) {
                $errorinfotext[] = $key . " : " . $value;
            }
                $errorinfotext[] = $key . " : " . $value;
			
            $errorinfotext = implode("\t", $errorinfotext) . "\r\n";
            @fwrite($fp, $errorinfotext);
            fclose($fp);
        }
    }
    public function ViewError ($error, $paramArr = null, $closeerror = false)
    {
        $debug = debug_backtrace(false);
        rsort($debug);
        if (is_array($error)) {
            if ($error['code'] < 100) {
                $errorlevel = 'ϵͳ������ ';
            } else {
                $errorlevel = 'ҵ�񼶴���';
            }
            $errortitle = (object) $this->ErrorInfo($error['code']);
            $this->_ErrorInfo = $errortitle;
            if ($closeerror) {
                $this->WriteError($error, $paramArr);
                return false;
            }
            $errortitlediy = $errorlevel . ": " . $errortitle->en . " (" . $errortitle->cn . ")";
        } else {
            $errortitlediy = $error;
        }
		
		
        $view[] = "<br /><font size='1'><table dir='ltr' border='1' cellspacing='0' cellpadding='1' width=\"100%\">";
        $view[] = "<tr><th align='left' bgcolor='#f57900' colspan=\"3\"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> " . $errortitlediy . " in " . $debug[count($debug) - 2]['file'] . " on line <i>" . $debug[count($debug) - 2]['line'] . "</i></th></tr>";
        $view[] = "<tr><th align='left' bgcolor='#e9b96e' colspan='3'>���ú���</th></tr>";
        $view[] = "<tr><th align='center' bgcolor='#eeeeec' width='30'>#</th><th align='left' bgcolor='#eeeeec'>������</th><th align='left' bgcolor='#eeeeec'>�����ļ�</th></tr>";
        $mainfile = basename($debug[0]['file']);
        $view[] = "<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec'>{main}(  )</td><td bgcolor='#eeeeec'>../{$mainfile}<b>:</b>0</td></tr>";
        foreach ($debug as $key => $value) {
            $value['file'] = basename($value['file']);
            $key = $key + 2;
            $view[] = "<tr><td bgcolor='#eeeeec' align='center'>$key</td><td bgcolor='#eeeeec'>{$value['class']}{$value['type']}{$value['function']}(  )</td><td title='{$value['file']}' bgcolor='#eeeeec'>../{$value['file']}<b>:</b>{$value['line']}</td></tr>";
        }
        $view[] = '</table></font>';
        if ($paramArr) {
            $view[] = "<br /><font size='1'><table dir='ltr' border='1' cellspacing='0' cellpadding='1' width=\"100%\">";
            $view[] = "<tr><th align='left' bgcolor='#e9b96e' colspan='4' height='25px'>�Ա�API ���ò����б�</th></tr>";
            $view[] = "<tr><th align='center' bgcolor='#eeeeec' width='30px'>#</th><th width='120' align='left' bgcolor='#eeeeec'>��������</th><th align='left' bgcolor='#eeeeec'>����</th><th align='left' bgcolor='#eeeeec' width='50px'>����</th></tr>";
            $i = 1;
            foreach ($paramArr as $key => $value) {
                $view[] = "<tr><td bgcolor='#eeeeec' align='center'>$i</td><td bgcolor='#eeeeec'>{$key}</td><td bgcolor='#eeeeec'>" . implode(', ', explode(',', $value)) . "</td><td bgcolor='#eeeeec'><b>" . strlen($value) . "</b></td></tr>";
                $i ++;
            }
            $view[] = '</table></font>';
        }
        //echo implode("\n", $view);
        if (! empty($error['code']) && $error['code'] < 100) {
            exit();
        }
        if (is_string($error)) {
            exit();
        }
    }
}