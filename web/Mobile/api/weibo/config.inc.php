<?php
//����΢����¼�ӿڲ�������

$apiOrder = 4; //�ӿ���ţ������޸�
$apiName = 'weibo'; //�ӿ����������޸�
$apiTitle = '����΢��'; //�ӿڱ��⣬�����޸�

$apiConfigs[$apiName] = array(); //��ʼ���������飬�����޸�

$apiConfigs[$apiName]['appid'] = '2562976744';  //Ӧ��ID������ʵ�������ֵ�޸�

$apiConfigs[$apiName]['appkey'] = '61b0a9c9ffb96bf0f7594342a6cdd922';  //�ӿ���Կ������ʵ�������ֵ�޸�

$apiConfigs[$apiName]['callback'] = JIEQI_LOCAL_URL.'/api/'.$apiName.'/loginback.php';  //��¼�󷵻صı�վ��ַ�������޸�

$apiConfigs[$apiName]['scope'] = ''; //������Ȩ��Щapi�ӿڣ���Ӣ�Ķ��ŷָ�
?>