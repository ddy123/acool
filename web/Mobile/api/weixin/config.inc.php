<?php
//΢�ŵ�¼�ӿڲ�������
//δ����΢�ŵ�¼�ӿ��˺ŵģ��뵽 http://open.weixin.qq.com/ �ύ����

$apiOrder = 2; //�ӿ���ţ������޸�
$apiName = 'weixin'; //�ӿ����������޸�
$apiTitle = '΢��'; //�ӿڱ��⣬�����޸�

$apiConfigs[$apiName] = array(); //��ʼ���������飬�����޸�

$apiConfigs[$apiName]['appid'] = 'wx4e2123dfe5ca4006';  //Ӧ��ID������ʵ�������ֵ�޸�

$apiConfigs[$apiName]['appkey'] = '6de0119bc5ff320b4e813cc258e3caf8';  //�ӿ���Կ������ʵ�������ֵ�޸�

//$apiConfigs[$apiName]['callback'] = JIEQI_LOCAL_URL.'/api/'.$apiName.'/loginback.php';  //��¼�󷵻صı�վ��ַ�������޸�

$apiConfigs[$apiName]['callback'] = 'http://m.mianfeidushu.com/api/weixin/loginback.php';  //��¼�󷵻صı�վ��ַ�������޸�

$apiConfigs[$apiName]['scope'] = 'snsapi_login'; //������Ȩ��Щapi�ӿڣ���Ӣ�Ķ��ŷָ�

?>
