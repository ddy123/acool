<?php
//֧����alipay֧����ز���

$jieqiPayset['alipay']['payid']='2088821972302501';  //�������ID

$jieqiPayset['alipay']['paykey']='2vaisb66agnzxmak3bqo4nkke5yqsn45';  //��Կֵ

$jieqiPayset['alipay']['payurl']='https://www.alipay.com/cooperate/gateway.do';  //�ύ���Է�����ַ  

$jieqiPayset['alipay']['payreturn']='http://www.juziread.com/modules/pay/alipayreturn.php';  //���շ��صĵ�ַ (www.domain.com ��ָ�����ַ)

//������������õĻ����û����Թ�������ֵ��������ң�����һԪǮ100�����㡣������������������������ֻ�ܰ�����������ã���Ӧ��Ҳ��Ǯ����Ӧ��ϵ���㣬�� '1000'=>'10' ��ָ 1000�������Ҫ10Ԫ
$jieqiPayset['weixinpay']['paylimit']    = array('3000'=>'30', '8000'=>'50', '13000'=>'80', '20000'=>'100', '50000'=>'200','150000'=>'500');

$jieqiPayset['alipay']['moneytype']='0';  //0 ����� 1��ʾ��Ԫ

$jieqiPayset['alipay']['paysilver']='0';  //0 ��ʾ��ֵ�ɽ�� 1��ʾ����

$jieqiPayset['alipay']['service']='create_direct_pay_by_user';  //��������
$jieqiPayset['alipay']['agent']='';  //������id
$jieqiPayset['alipay']['_input_charset']='GBK';  //�ַ���
$jieqiPayset['alipay']['body']='�������';  //��Ʒ����
$jieqiPayset['alipay']['payment_type']='1';  // ��Ʒ֧������ 1 ����Ʒ���� 2�������� 3���������� 4������ 5���ʷѲ��� 6������
$jieqiPayset['alipay']['show_url']='http://www.juziread.com';  //��Ʒ�����վ��˾
$jieqiPayset['alipay']['seller_email']='beireadvip@163.com';  //�������䣬����
$jieqiPayset['alipay']['sign_type']='MD5';  //ǩ����ʽ

$jieqiPayset['alipay']['notify_url']='http://www.juziread.com/modules/pay/alipayreturn.php'; //�첽������Ϣ
$jieqiPayset['alipay']['notifycheck']='http://notify.alipay.com/trade/notify_query.do';  //֪ͨ��֤��ַ

$jieqiPayset['alipay']['addvars']=array();  //���Ӳ���
?>
