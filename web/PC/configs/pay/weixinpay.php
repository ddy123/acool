<?php
/**
 * ΢��֧���������ļ�
 * Created by PhpStorm.
 * User: burn
 * Date: 2016/12/21
 * Time: ����10:45
 */

$jieqiPayset['weixinpay']['appid']       = 'wx59a74fce34b72421'; //�����˺�
  
$jieqiPayset['weixinpay']['mch_id']      = '1495475732'; //΢��֧��������̻���

$jieqiPayset['weixinpay']['paykey']      = '20180226juzizhongwenwang1147burn';

$jieqiPayset['weixinpay']['device_info'] = 'WEB'; //�豸��

$jieqiPayset['weixinpay']['sign_type']   = 'MD5';

$jieqiPayset['weixinpay']['body']        = '������������ֵ����-��ֵ'; //��Ʒ����

$jieqiPayset['weixinpay']['notify_url']  = 'http://www.juziread.com/modules/pay/weixinpayreturn.php'; //֪ͨ��ַ

$jieqiPayset['weixinpay']['ip']          = '47.96.146.134';//������ip

$jieqiPayset['weixinpay']['trade_type']  = 'NATIVE';//��������

//������������õĻ����û����Թ�������ֵ��������ң�����һԪǮ100�����㡣������������������������ֻ�ܰ�����������ã���Ӧ��Ҳ��Ǯ����Ӧ��ϵ���㣬�� '1000'=>'10' ��ָ 1000�������Ҫ10Ԫ
$jieqiPayset['weixinpay']['paylimit']    = array('3000'=>'30', '8000'=>'50', '13000'=>'80', '20000'=>'100', '50000'=>'200', '150000'=>'500');

$jieqiPayset['weixinpay']['moneytype']   = '0';  //0 ����� 1��ʾ��Ԫ

$jieqiPayset['weixinpay']['paysilver']   ='0';  //0 ��ʾ��ֵ�ɽ�� 1��ʾ����

$jieqiPayset['weixinpay']['payment_type']   = '1';  // ��Ʒ֧������ 1 ����Ʒ���� 2�������� 3���������� 4������ 5���ʷѲ��� 6������

$jieqiPayset['weixinpay']['api_url']        = 'https://api.mch.weixin.qq.com/pay/unifiedorder';//΢��֧����ͳһ�µ�API

$jieqiPayset['weixinpay']['orderquery_url'] = 'https://api.mch.weixin.qq.com/pay/orderquery';//΢��֧���Ĳ�ѯ������API

?>
