<?php
//����΢����¼�ӿڲ�������

$apiOrder = 4; //�ӿ���ţ������޸�
$apiName = 'weibo'; //�ӿ����������޸�
$apiTitle = '����΢��'; //�ӿڱ��⣬�����޸�

$apiConfigs[$apiName] = array(); //��ʼ���������飬�����޸�

$apiConfigs[$apiName]['appid'] = '3793059400';  //Ӧ��ID������ʵ�������ֵ�޸�

$apiConfigs[$apiName]['appkey'] = ' 9d7291b4c1b4e3575d1102ef1efaafa4 ';  //�ӿ���Կ������ʵ�������ֵ�޸�

$apiConfigs[$apiName]['callback'] = JIEQI_LOCAL_URL.'/api/'.$apiName.'/loginback.php';  //��¼�󷵻صı�վ��ַ�������޸�

//$apiConfigs[$apiName]['callback'] = 'http://www.juziread.com/api/weibo/loginback.php';  //��¼�󷵻صı�վ��ַ�������޸�

$apiConfigs[$apiName]['scope'] = 'snsapi_login'; //������Ȩ��Щapi�ӿڣ���Ӣ�Ķ��ŷָ�
?>