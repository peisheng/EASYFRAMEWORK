<?php
//��ҳ��Ϊģ��ṹ�������ã��ǿ�����Ա����Ķ����ᵼ��ģ�����������Ա���Կ�ע�������޸ġ�
//ģ��˵��

$temptitle = "�Կ͵۹�6.0�ٷ�ģ��";  //ģ��ı���

$tempabout = "�Կ͵۹�6.0�ٷ�ģ�棬ӵ�����г����Ѿ�֧�ֵĹ��ܣ������汾���¡�"; //ģ��ļ��
$default_soft_lang = "GBK";

//��������ҳģ�������
/* ��ҳ���õ�ģ��ID
11=>"��ҳ�л�ͼ����½��",
12=>"�ۺϷ��ർ��",
13=>"�ٲ�����ҳģ������",
21=>"�Ա��ƹ�Ƶ��",
1=>"�Ա�����(�Ա�API)",				��Ӧ�ļ� index_mode1.php
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
$CustomVariable["AllowIndexType"]="2,3,4,5,6,7,9,10,11,12,15,13,21"; 

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
$CustomVariable["CustomField"][12] = array("pronum"=>"�Ƽ���Ʒ��");
$CustomVariable["CustomField"][21] = array("height"=>"�߶�(����)","hidentop"=>"����(����)");

//��������Ӧ���б�
$CustomVariable["AllowIndexTypeArr"][2] = 	array("title"=>"�����Ƽ����","typelevel"=>1,"is_pic"=>0,"max_num"=>8);  //��ҳģ���Ӧ���б� ��������ֱ��ǣ��Ա���ʱ�������ͣ������Ƽ���𣬿�������һ����𣬲���ͼƬ�������������Ϊ8��
$CustomVariable["AllowIndexTypeArr"][3] = 	array("title"=>"�����Ƽ����","typelevel"=>1,"is_pic"=>0,"max_num"=>8);  
$CustomVariable["AllowIndexTypeArr"][4] = 	array("title"=>"�����Ƽ����","typelevel"=>1,"is_pic"=>0,"max_num"=>8); 
$CustomVariable["AllowIndexTypeArr"][5] = 	array("title"=>"�����Ƽ����","typelevel"=>1,"is_pic"=>0,"max_num"=>8); 
$CustomVariable["AllowIndexTypeArr"][7] = 	array("title"=>"�����Ƽ����","typelevel"=>1,"is_pic"=>0,"max_num"=>8); 
$CustomVariable["AllowIndexTypeArr"][10] = 	array("title"=>"�����Ƽ����","typelevel"=>1,"is_pic"=>0,"max_num"=>8); 
$CustomVariable["AllowIndexTypeArr"][15] = 	array("title"=>"�����Ƽ����","typelevel"=>1,"is_pic"=>0,"max_num"=>8); 
//�Զ�����б�
$CustomVariable["AllowIndexTypeArr"][12] = 	array("title"=>"�༭�Ƽ���Ʒ","typelevel"=>1,"is_pic"=>0,"max_num"=>1,"allow_tid"=>"2,3,4,5,7,10,15"); 
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
$CustomVariable["AllowDaoHangType"]="1,2,3,4,5,6,7,8,10,15,21"; 

//�趨�����������õĵ������͡�
$CustomVariable["CustomDaohang"]["daohang"] = 	array("title"=>"����������","typelevel"=>2,"is_pic"=>0);  //����������
$CustomVariable["CustomDaohang"]["daohang"]["CustomSetField"]["ishot"] = array("memo"=>"�Ƿ����ű�ǩ","default"=>"2","list"=>array("1"=>"��","2"=>"��")); 

$CustomVariable["CustomDaohang"]["cidaohang"] = array("title"=>"��������","typelevel"=>2,"is_pic"=>0);  //�ε���
$CustomVariable["CustomDaohang"]["keyword"] = 	array("title"=>"��������","typelevel"=>1,"is_pic"=>0);  //�ؼ��ʵ���



//��������ҳ����������
$CustomVariable["CustomDaohangField"][21] = array("height"=>"�߶�(����)","hidentop"=>"����(����)");
$CustomVariable["CustomDaohangField"][5] = array("mall_id"=>"b2c�̳�ID");


//�Զ������������������������ã�����ģ�����ж��á�
$CustomVariable["CustomSetField"]["SetSearch"] = array("memo"=>"�Զ�����������","default"=>"","list"=>"textarea");  //���档
$CustomVariable["CustomSetField"]["SetLogin"] = array("memo"=>"�Զ����½��λ�ô���","default"=>"","list"=>"textarea");  //���档
$CustomVariable["CustomSetField"]["showhelp"] = 			array("memo"=>"�ײ�����ģ����ʾ","default"=>"1","list"=>array("1"=>"��ʾ","2"=>"����"));  //�б�ҳ����
$CustomVariable["CustomSetField"]["showuser"] = 			array("memo"=>"�û���½���Ƿ���ʾ","default"=>"1","list"=>array("1"=>"��ʾ","2"=>"����"));  //�б�ҳ����
$CustomVariable["CustomSetField"]["ProlistType"] = 			array("memo"=>"�б�ҳĬ�����ͣ���ѡ���������","default"=>"1","list"=>array("1"=>"����","2"=>"����"));  //�б�ҳ����
$CustomVariable["CustomSetField"]["ProListSmalltypeKG"] = 	array("memo"=>"��Ʒ�б�ҳ������Ƿ���ʾ","default"=>"close","list"=>array("open"=>"��ʾ","close"=>"����ʾ"));  //�б�ҳ�Ƿ���ʾ�����
$CustomVariable["CustomSetField"]["ProListSmallSortKG"] = 	array("memo"=>"��Ʒ�б�ҳ����ʽ�Ƿ���ʾ","default"=>"open","list"=>array("open"=>"��ʾ","close"=>"����ʾ"));  //�б�ҳ�Ƿ���ʾ������
$CustomVariable["CustomSetField"]["ProListArtNum"] = 		array("memo"=>"�������Ƽ���������","default"=>"10","list"=>"no");  //�б�ҳ�Ƿ���ʾ������
$CustomVariable["CustomSetField"]["ProListproNum"] = 		array("memo"=>"�����б�ҳ���Ƽ���Ʒ����","default"=>"10","list"=>"no");  //����ҳ���Ƽ���Ʒ���������á�
$CustomVariable["CustomSetField"]["ProArticleproNum"] = 	array("memo"=>"��������ҳ���Ƽ���Ʒ����","default"=>"8","list"=>"no");  //����ҳ���Ƽ���Ʒ���������á�
$CustomVariable["CustomSetField"]["ProArticleproKeyword"] = array("memo"=>"��������ҳ��Ĭ����Ʒ������","default"=>"����","list"=>"no");  //����ҳ���Ƽ���Ʒ���������á�
$CustomVariable["CustomSetField"]["ProListproKeyword"] = 	array("memo"=>"�����б�ҳ��Ĭ����Ʒ������","default"=>"����","list"=>"no");  //����ҳ���Ƽ���Ʒ���������á�


//ģ���Դ����λ
$CustomAdList=array();
$CustomAdList["tonglan"] = 		array("name"=>"ͨ�����","height"=>"auto","width"=>"980","description"=>"����ҳ��ĵ��������á�������ҳ��������");

$CustomAdList["dongtai"] = 		array("name"=>"��Ա��̬�����","height"=>"167","width"=>"234","description"=>"��Ա��̬����ķ���λ��");
$CustomAdList["typesright"] = 	array("name"=>"�ۺ�����Ҳ��","height"=>"auto","width"=>"285","description"=>"���ۺ�����Ҳ࣬TAGS�б������λ�á��߶ȿ������⡣");
$CustomAdList["top"] = 			array("name"=>"����Ĺ��","height"=>"auto","width"=>"auto","description"=>"����Ĺ�棬�����Ƴ���ġ�");
$CustomAdList["mleft"] = 		array("name"=>"��½��ע������","height"=>"auto","width"=>"399","description"=>"��½ע��ҳ�������ͼƬλ�á�");
$CustomAdList["footer"] = 		array("name"=>"����µ�һ��СͼƬ","height"=>"auto","width"=>"auto","description"=>"����µ�һ��ͼƬ��Ҫ�޸���������λ�ġ�");
$CustomAdList["typestop"] = 	array("name"=>"�ۺϷ����Ϸ�","height"=>"auto","width"=>"980","description"=>"�ۺϷ���ģ�������ͨ����");

$CustomAdList["paileft"] = 	array("name"=>"�����б�ҳ����·�","height"=>"auto","width"=>"230","description"=>"�����б�ҳ����߷��������λ�ã��߶Ȳ����ơ�");
$CustomAdList["B2Cleft"] = 	array("name"=>"B2C�б�ҳ����·�","height"=>"auto","width"=>"230","description"=>"B2C�б�ҳ����߷��������λ�ã��߶Ȳ����ơ�");
$CustomAdList["taoleft"] = 	array("name"=>"�Ա��б�ҳ����·�","height"=>"auto","width"=>"230","description"=>"�Ա��б�ҳ����߷��������λ�ã��߶Ȳ����ơ�");
//ģ���Զ����̨���ñ���


?>