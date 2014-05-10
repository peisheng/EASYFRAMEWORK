<?php

if (!defined('ROOT')) exit('Can\'t Access !');
$ologin_lang = ROOT.'/lang/'.config::get('lang_type').'/ologin/alipaylogin.php';
if (file_exists($ologin_lang)) {
    global $_LANG;
    include_once($ologin_lang);
}
if (isset($set_modules) &&$set_modules == TRUE) {
    $i = isset($modules) ?count($modules) : 0;
    $modules[$i]['code']    = basename(__FILE__,'.php');
    $modules[$i]['desc']    = 'alipaylogin_desc';
    $modules[$i]['is_cod']  = '0';
    $modules[$i]['is_online']  = '1';
    $modules[$i]['author']  = 'CmsEasy';
    $modules[$i]['website'] = 'http://www.alipay.com';
    $modules[$i]['version'] = '1.0.0';
    $modules[$i]['config']  = array(
            array('name'=>'alipaylogin_id','type'=>'text','value'=>''),
            array('name'=>'alipaylogin_key','type'=>'text','value'=>''),
    );
    return;
}
class alipaylogin {
    
    function get_code($ologin) {
        $aliapy_config['partner'] = $ologin['alipaylogin_id'];
        $aliapy_config['key'] = $ologin['alipaylogin_key'];
        $aliapy_config['return_url'] = ologin::url(basename(__FILE__,'.php'));
        $aliapy_config['sign_type']    = 'MD5';
        $aliapy_config['input_charset']= 'utf-8';
        $aliapy_config['transport']    = 'http';
        require_once("alipayauth/alipay_service.class.php");
        $parameter = array(
                        "service" => "alipay.auth.authorize",
                        "target_service" => 'user.auth.quick.login',
                        "partner" => trim($aliapy_config['partner']),
                        "_input_charset" => trim(strtolower($aliapy_config['input_charset'])),
                        "return_url" => trim($aliapy_config['return_url']),
                        "anti_phishing_key" => '',
                        "exter_invoke_ip" => '',
        );
        $alipayService = new AlipayService($aliapy_config);
        $login_url = $alipayService->alipay_auth_authorize($parameter);
        echo $login_url;exit;
        return $login_url;
    }
    
    function respond() {
        
        $where = array('ologin_code'=>front::$get['ologin_code']);
        $ologins = ologin::getInstance()->getrows($where);
        $ologin = unserialize_config($ologins[0]['ologin_config']);
        
        $aliapy_config['partner'] = $ologin['alipaylogin_id'];
        $aliapy_config['key'] = $ologin['alipaylogin_key'];
        $aliapy_config['return_url'] = ologin::url(basename(__FILE__,'.php'));
        $aliapy_config['sign_type']    = 'MD5';
        $aliapy_config['input_charset']= 'utf-8';
        $aliapy_config['transport']    = 'http';
        require_once("alipayauth/alipay_notify.class.php");
        $alipayNotify = new AlipayNotify($aliapy_config);
        $verify_result = $alipayNotify->verifyReturn();
        if($verify_result) {//验证成功
            $user_id = front::$get['user_id'];
            $token = front::$get['token'];
            session::set('access_token',$token);
            session::set("openid",$user_id);
            return array('nickname'=>  front::get('real_name'));
        }
        else {
            echo "验证失败";exit;
        }
    }
}