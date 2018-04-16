<?php 
/**
 * 梦联支付-提交处理
 *
 * 梦联支付-提交处理 (http://www.nationm.com.cn)
 * 
 * 调用模板：/modules/pay/templates/nationm.html
 * 
 * @category   jieqicms
 * @package    pay
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: nationm.php 326 2009-02-04 00:26:22Z juny $
 */

define('JIEQI_MODULE_NAME', 'pay');
define('JIEQI_PAY_TYPE', 'nationm');
require_once('../../global.php');
jieqi_loadlang('pay', JIEQI_MODULE_NAME);
if(!jieqi_checklogin(true)) jieqi_printfail($jieqiLang['pay']['need_login']);
jieqi_getconfigs(JIEQI_MODULE_NAME, JIEQI_PAY_TYPE, 'jieqiPayset');

if(isset($_REQUEST['egold']) && is_numeric($_REQUEST['egold']) && $_REQUEST['egold']>0){
	$_REQUEST['egold']=intval($_REQUEST['egold']);
	if(!empty($jieqiPayset[JIEQI_PAY_TYPE]['paylimit'])){
		if(!empty($jieqiPayset[JIEQI_PAY_TYPE]['paylimit'][$_REQUEST['egold']])) $money=intval($jieqiPayset[JIEQI_PAY_TYPE]['paylimit'][$_REQUEST['egold']] * 100);
		else jieqi_printfail($jieqiLang['pay']['buy_type_error']);
	}else{
		$money=intval($_REQUEST['egold']);
	}
	include_once($jieqiModules['pay']['path'].'/class/paylog.php');
	$paylog_handler=JieqiPaylogHandler::getInstance('JieqiPaylogHandler');
	$paylog= $paylog_handler->create();
	$paylog->setVar('siteid', JIEQI_SITE_ID);
	$paylog->setVar('buytime', JIEQI_NOW_TIME);
	$paylog->setVar('rettime', 0);
	$paylog->setVar('buyid', $_SESSION['jieqiUserId']);
	$paylog->setVar('buyname', $_SESSION['jieqiUserName']);
	$paylog->setVar('buyinfo', '');
	$paylog->setVar('moneytype', $jieqiPayset[JIEQI_PAY_TYPE]['moneytype']);
	$paylog->setVar('money', $money);
	$paylog->setVar('egoldtype', $jieqiPayset[JIEQI_PAY_TYPE]['paysilver']);
	$paylog->setVar('egold', $_REQUEST['egold']);
	$paylog->setVar('paytype', JIEQI_PAY_TYPE);
	$paylog->setVar('retserialno', '');
	$paylog->setVar('retaccount', '');
	$paylog->setVar('retinfo', '');
	$paylog->setVar('masterid', 0);
	$paylog->setVar('mastername', '');
	$paylog->setVar('masterinfo', '');
	$paylog->setVar('note', '');
	$paylog->setVar('payflag', 0);
	if(!$paylog_handler->insert($paylog)) jieqi_printfail($jieqiLang['pay']['add_paylog_error']);
	else{
		$merchantID=$jieqiPayset[JIEQI_PAY_TYPE]['payid'];  //商户号
		$interfaceType='NSTP'; //接口类型,这里是NSTP
		$orderID=intval($paylog->getVar('payid')); //定单号
		$merchantURL=$jieqiPayset[JIEQI_PAY_TYPE]['payreturn']; //接收梦联信通支付结果信息的程序名称和地址
		$submitSURL=$jieqiModules['pay']['url'].'/nationmsuc.php';  //梦联信通成功提交支付后将要跳转的程序名称和地址
		$submitFURL=$jieqiModules['pay']['url'].'/nationmerr.php';  //梦联信通提交支付失败后将要跳转的程序名称和地址
		$goodsID=$jieqiPayset[JIEQI_PAY_TYPE]['goodsid'];  //商品编码
		$countNumber=$jieqiPayset[JIEQI_PAY_TYPE]['countNumber'];  //商品数量
		$amount=intval($money);  //订单总金额，单位分
		$currentType=$jieqiPayset[JIEQI_PAY_TYPE]['currentType'];  //币种 000:人民币010:美元020:港币
		$noticeType=$jieqiPayset[JIEQI_PAY_TYPE]['noticeType']; //信息发送类型
		$key=$jieqiPayset[JIEQI_PAY_TYPE]['sendkey'];  //提交时候的密钥
		$md5Info=strtoupper(md5($merchantID.$interfaceType.$orderID.$goodsID.$countNumber.$amount.$key));

		include_once(JIEQI_ROOT_PATH.'/header.php');
		include_once(JIEQI_ROOT_PATH.'/lib/template/template.php');
		$jieqiTpl =& JieqiTpl::getInstance();
		$jieqiTpl->assign('url_pay', $jieqiPayset[JIEQI_PAY_TYPE]['payurl']);
		$jieqiTpl->assign('buyname', $_SESSION['jieqiUserName']);
		$jieqiTpl->assign('egold', $_REQUEST['egold']);
		$jieqiTpl->assign('egoldname', JIEQI_EGOLD_NAME);
		$jieqiTpl->assign('money', sprintf('%0.2f', $amount / 100));
		
		$jieqiTpl->assign('merchantID', $merchantID);
		$jieqiTpl->assign('interfaceType', $interfaceType);
		$jieqiTpl->assign('orderID', $orderID);
		$jieqiTpl->assign('merchantURL', $merchantURL);
		$jieqiTpl->assign('submitSURL', $submitSURL);
		$jieqiTpl->assign('submitFURL', $submitFURL);
		$jieqiTpl->assign('goodsID', $goodsID);
		$jieqiTpl->assign('countNumber', $countNumber);
		$jieqiTpl->assign('amount', $amount);
		$jieqiTpl->assign('currentType', $currentType);
		$jieqiTpl->assign('noticeType', $noticeType);
		$jieqiTpl->assign('md5Info', $md5Info);
		if(is_array($jieqiPayset[JIEQI_PAY_TYPE]['addvars'])){
         	foreach($jieqiPayset[JIEQI_PAY_TYPE]['addvars'] as $k=>$v) $jieqiTpl->assign($k, $v);
		}
		$jieqiTpl->setCaching(0);
		$jieqiTset['jieqi_contents_template'] = $jieqiModules['pay']['path'].'/templates/nationm.html';
		include_once(JIEQI_ROOT_PATH.'/footer.php');
	}
}else{
	jieqi_printfail($jieqiLang['pay']['need_buy_type']);
}

?>