<?php

//��ҳ��Ϊ�������ã��������ֲ�Ҫ���κ��޸ġ���Ϥ�Կ͵۹������߿��������޸ģ����庬�嶼�Ѿ���עд�������������⡣

//ģ��˵��
$temptitle = "��ɫ���ۺ��̳�";
$tempabout = "��ɫ���ۺ��̳ǣ�����ģ�塣";

$default_soft_lang = "GBK";
$template_is_old = TRUE;  //�ɰ汾ģ����롣�����Զ�����һЩ֧�ֳ���
$TaoConfig["applicationdata"]["GJconfig"]["listlinktype"]="taobao";//�����б�ҳֱ�� ��ת�ƹ����ӣ�����������ҳ��


//��������ҳģ�������
/* ��ҳ���õ�ģ��ID
11=>"��ҳ�л�ͼ����½��",
12=>"�ۺϷ��ർ��",
13=>"�ٲ�����ҳģ������",
21=>"�Ա��ƹ�Ƶ��",
1=>"�Ա�����(�Ա�API)",				
2=>"�Ա���ʱ����(�Ա�API)",
3=>"�Ա���ͨ�ƹ�(�Ա�API)",
4=>"��������Ʒ",
7=>"(����)����̨�����",
5=>"B2C��Ʒ(b2c��API)",
6=>"������Ŀ",
9=>"B2C�̳��б�",
10=>"ָ���Ա�����(�Ա�API)",
15=>"������Ʒ(���ĵ�API)",
13=>"�Զ���htmlģ��",
8=>"��ַURL");
*/

$CustomVariable = array();

$CustomVariable["AllowIndexConfig"]["is_add"]="1";//���������ҳģ��
$CustomVariable["AllowIndexConfig"]["is_del"]="1";//����ɾ����ҳģ��
$CustomVariable["AllowIndexConfig"]["is_sort"]="1";//������ҳģ�����˳��

//ָ����ҳ�ۺ�������������õ���ҳ��Ŀ����,����"1,2,3,12"��ֻ����������������Ŀ�� ����޴˱�����Ĭ��ȫ�����͡��������Ա����Ķ�
$CustomVariable["AllowIndexType"]="2,3,4,5,6,7,10,11,12,15,13,21"; 

//ָ�����͵���ҳ��Ŀ���Զ����ֶΣ�����ģ�������Ŀ����������ã���ģ�������Ա����Ķ�
$CustomVariable["CustomField"]=array();

//�Զ������ҳ��Ŀ�����ò������м�����֣�������Ŀ���ͣ���������ֱ�ʾ�ֶα��������ơ�
$CustomVariable["CustomField"][2] = array("pronum"=>"��Ʒ����");
$CustomVariable["CustomField"][3] = array("pronum"=>"��Ʒ����");
$CustomVariable["CustomField"][4] = array("pronum"=>"��Ʒ����");
$CustomVariable["CustomField"][5] = array("pronum"=>"��Ʒ����","mall_id"=>"b2c�̳�ID");
$CustomVariable["CustomField"][6] = array("pronum"=>"��������");
$CustomVariable["CustomField"][7] = array("pronum"=>"��Ʒ����");
$CustomVariable["CustomField"][10] = array("pronum"=>"��Ʒ����");
$CustomVariable["CustomField"][15] = array("pronum"=>"��Ʒ����");
$CustomVariable["CustomField"][12] = array("pronum"=>"���Ż����");
$CustomVariable["CustomField"][21] = array("height"=>"�߶�(����)","hidentop"=>"����(����)");

$CustomVariable["AllowIndexTitle"][11] = "��ҳ�ֲ�ͼ��Ʒ���콢��";


//��������Ӧ���б�
$CustomVariable["AllowIndexTypeArr"][2] = 	array("title"=>"�����Ƽ����","typelevel"=>1,"is_pic"=>0,"max_num"=>8);  //��ҳģ���Ӧ���б� ��������ֱ��ǣ��Ա���ʱ�������ͣ������Ƽ���𣬿�������һ����𣬲���ͼƬ�������������Ϊ8��
$CustomVariable["AllowIndexTypeArr"][3] = 	array("title"=>"�����Ƽ����","typelevel"=>1,"is_pic"=>0,"max_num"=>8);  
$CustomVariable["AllowIndexTypeArr"][4] = 	array("title"=>"�����Ƽ����","typelevel"=>1,"is_pic"=>0,"max_num"=>8); 
$CustomVariable["AllowIndexTypeArr"][5] = 	array("title"=>"�����Ƽ����","typelevel"=>1,"is_pic"=>0,"max_num"=>8); 
$CustomVariable["AllowIndexTypeArr"][7] = 	array("title"=>"�����Ƽ����","typelevel"=>1,"is_pic"=>0,"max_num"=>8); 
$CustomVariable["AllowIndexTypeArr"][10] = 	array("title"=>"�����Ƽ����","typelevel"=>1,"is_pic"=>0,"max_num"=>8); 

$CustomVariable["AllowIndexTypeArr"][11]["pinpai"] = 	array("title"=>"Ʒ���콢��","typelevel"=>1,"is_pic"=>1,"max_num"=>6);  
$CustomVariable["AllowIndexTypeArr"][11]["tuijian"] = 	array("title"=>"�Ƽ����","typelevel"=>1,"is_pic"=>0,"max_num"=>4,"allow_tid"=>"2,3,4,5,7,10,15");  


$CustomVariable["AllowIndexTypeArr"][15] = 	array("title"=>"�����Ƽ����","typelevel"=>1,"is_pic"=>0,"max_num"=>8); 
//�Զ�����б�
$CustomVariable["AllowIndexTypeArr"][12] = 	array("title"=>"�༭���Ż","typelevel"=>1,"is_pic"=>1,"max_num"=>10); 
$CustomVariable["AllowIndexTypeArr"][12]["base"] = 	array("title"=>"�ۺϷ���","typelevel"=>2,"is_pic"=>0); 
//����ģ���������
$CustomVariable["AllowIndexTypeArr"][6] = 	array("title"=>"�������","typelevel"=>1,"is_pic"=>0,"max_num"=>0,"allow_tid"=>"6"); 

//�����ǵ���ģ�������
/* �������õ�ģ��ID
1=>"�Ա�����(�Ա�API)",
2=>"�Ա���ʱ����(�Ա�API)",
3=>"�Ա���ͨ�ƹ�(�Ա�API)",
4=>"��������Ʒ",
7=>"(����)����̨�����",
5=>"B2C��Ʒ(b2c��API)",
6=>"������Ŀ",
8=>"��ַURL"
9=>"B2C�̳�",
10=>"ָ���Ա�����(�Ա�API)",
15=>"������Ʒ(���ĵ�API)",
*/

//ָ����������������õ���������,����"1,2,3,12"��ֻ����������������Ŀ�� ����޴˱�����Ĭ��ȫ�����͡��������Ա����Ķ�
$CustomVariable["AllowDaoHangType"]="1,2,3,5,6,7,8,10,15,21"; 

//�趨�����������õĵ������͡�
$CustomVariable["CustomDaohang"]["daohang"] = 	array("title"=>"����������","typelevel"=>1,"is_pic"=>0);  //����������
$CustomVariable["CustomDaohang"]["cidaohang"] = array("title"=>"������","typelevel"=>2,"is_pic"=>0,"max_num"=>5);  //�ε���
$CustomVariable["CustomDaohang"]["keyword"] = 	array("title"=>"��������","typelevel"=>1,"is_pic"=>0);  //�ؼ��ʵ���
$CustomVariable["CustomDaohang"]["topdaohang"] = 	array("title"=>"��������","typelevel"=>1,"is_pic"=>0);  //�ؼ��ʵ���

//��������ҳ����������
$CustomVariable["CustomDaohangField"][21] = array("height"=>"�߶�(����)","hidentop"=>"����(����)");
$CustomVariable["CustomDaohangField"][5] = array("mall_id"=>"b2c�̳�ID");


//�Զ������������������������ã�����ģ�����ж��á�
$CustomVariable["CustomSetField"]["SetSearch"] = array("memo"=>"�Զ�����������","default"=>"","list"=>"textarea");  //���档
$CustomVariable["CustomSetField"]["ProListSmalltypeKG"] = 	array("memo"=>"��Ʒ�б�ҳ������Ƿ���ʾ","default"=>"close","list"=>array("open"=>"��ʾ","close"=>"����ʾ"));  //�б�ҳ�Ƿ���ʾ�����
$CustomVariable["CustomSetField"]["ProListSmallSortKG"] = 	array("memo"=>"��Ʒ�б�ҳ����ʽ�Ƿ���ʾ","default"=>"open","list"=>array("open"=>"��ʾ","close"=>"����ʾ"));  //�б�ҳ�Ƿ���ʾ������
$CustomVariable["CustomSetField"]["ProListKeyword"] = array("memo"=>"��Ʒ�б�ҳ�Ƽ���Ʒ������","default"=>"����","list"=>"no");  //����ҳ���Ƽ���Ʒ���������á�
$CustomVariable["CustomSetField"]["ProShiChang"] = array("memo"=>"�г��۱�������","default"=>"1.3","list"=>"no");  //�г��۱�����


//ģ���Դ����λ
$CustomAdList=array();
$CustomAdList["tonglan"] = 		array("name"=>"ͨ�����","height"=>"auto","width"=>"980","description"=>"����ҳ��ĵ��������á�������ҳ��������");
$CustomAdList["top"] = 			array("name"=>"����Ĺ��","height"=>"auto","width"=>"auto","description"=>"����Ĺ�棬�����Ƴ���ġ�");
$CustomAdList["footer"] = 		array("name"=>"����µ�һ��СͼƬ","height"=>"auto","width"=>"auto","description"=>"����µ�һ��ͼƬ��Ҫ�޸���������λ�ġ�");

$CustomAdList["paileft"] = 	array("name"=>"��Ʒ�б�ҳ����·�","height"=>"auto","width"=>"230","description"=>"��Ʒ�б�ҳ����߷��������λ�ã��߶Ȳ����ơ�");
//$CustomAdList["B2Cleft"] = 	array("name"=>"B2C�б�ҳ����·�","height"=>"auto","width"=>"230","description"=>"B2C�б�ҳ����߷��������λ�ã��߶Ȳ����ơ�");
//$CustomAdList["taoleft"] = 	array("name"=>"�Ա��б�ҳ����·�","height"=>"auto","width"=>"230","description"=>"�Ա��б�ҳ����߷��������λ�ã��߶Ȳ����ơ�");
//$CustomAdList["shareleft"] = 	array("name"=>"�����б�ҳ����·�","height"=>"auto","width"=>"230","description"=>"�Ա������б�ҳ����߷��������λ�ã��߶Ȳ����ơ�");
//ģ���Զ����̨���ñ���


?>