<?php
//΢�ŵ�¼�ӿڲ�������
//δ����΢�ŵ�¼�ӿ��˺ŵģ��뵽 http://open.weixin.qq.com/ �ύ����

$apiOrder = 2; //�ӿ���ţ������޸�
$apiName = 'weixin'; //�ӿ����������޸�
$apiTitle = '΢��'; //�ӿڱ��⣬�����޸�

$apiConfigs[$apiName] = array(); //��ʼ���������飬�����޸�

$apiConfigs[$apiName]['appid'] = 'wx2bdf336a139027ad';  //Ӧ��ID������ʵ�������ֵ�޸�

$apiConfigs[$apiName]['appkey'] = '2cd0cf72f5a6aa139238b860b41fdb6a';  //�ӿ���Կ������ʵ�������ֵ�޸�

//$apiConfigs[$apiName]['callback'] = JIEQI_LOCAL_URL.'/api/'.$apiName.'/loginback.php';  //��¼�󷵻صı�վ��ַ�������޸�

$apiConfigs[$apiName]['callback'] = 'http://www.mianfeidushu.com/api/weixin/loginback.php';  //��¼�󷵻صı�վ��ַ�������޸�

$apiConfigs[$apiName]['scope'] = 'snsapi_login'; //������Ȩ��Щapi�ӿڣ���Ӣ�Ķ��ŷָ�

?>
