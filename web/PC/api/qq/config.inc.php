<?php
//QQ��¼�ӿڲ�������
//δ����QQ��¼�ӿ��˺ŵģ��뵽 http://connect.opensns.qq.com/ �ύ����

$apiOrder = 1; //�ӿ���ţ������޸�
$apiName = 'qq'; //�ӿ����������޸�
$apiTitle = 'QQ'; //�ӿڱ��⣬�����޸�

$apiConfigs[$apiName] = array(); //��ʼ���������飬�����޸�

$apiConfigs[$apiName]['appid'] ='1106652159';  //Ӧ��ID������ʵ�������ֵ�޸�

$apiConfigs[$apiName]['appkey'] ='st4jtapeysQmQALQ';  //�ӿ���Կ������ʵ�������ֵ�޸�

$apiConfigs[$apiName]['callback'] = JIEQI_LOCAL_URL.'/api/'.$apiName.'/loginback.php';  //��¼�󷵻صı�վ��ַ�������޸�  JIEQI_LOCAL_URL.'/api/'.$apiName.'/loginback.php'

$apiConfigs[$apiName]['scope'] = 'get_user_info,add_share,list_album,add_album,upload_pic,add_topic,add_one_blog,add_weibo'; //������Ȩ��Щapi�ӿڣ���Ӣ�Ķ��ŷָ�

?>