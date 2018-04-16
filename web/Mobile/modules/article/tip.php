<?php
//打赏
?>
<?php

define("JIEQI_MODULE_NAME", "article");
require_once ("../../global.php");

if (empty($_REQUEST["id"])) {
	jieqi_printfail(LANG_ERROR_PARAMETER);
}

jieqi_checklogin();
jieqi_loadlang("tip", JIEQI_MODULE_NAME);
include_once ($jieqiModules["article"]["path"] . "/class/article.php");
$article_handler = &JieqiArticleHandler::getInstance("JieqiArticleHandler");
$article = $article_handler->get($_REQUEST["id"]);

if (!$article) {
	jieqi_printfail($jieqiLang["article"]["article_not_exists"]);
}

include_once (JIEQI_ROOT_PATH . "/class/users.php");
$users_handler = &JieqiUsersHandler::getInstance("JieqiUsersHandler");
$users = $users_handler->get($_SESSION["jieqiUserId"]);

if (!is_object($users)) {
	jieqi_printfail($jieqiLang["article"]["user_not_exists"]);
}

$userisvip = $users->getVar("isvip", "n");
$syncemoney = ($_POST["act"] == "post" ? false : true);
$usermoney = $users->getEmoney($syncemoney);

if ($usermoney["emoney"] <= 0) {
	jieqi_printfail($jieqiLang["article"]["user_no_emoney"]);
}

jieqi_getconfigs(JIEQI_MODULE_NAME, "configs");
$article_static_url = (empty($jieqiConfigs["article"]["staticurl"]) ? $jieqiModules["article"]["url"] : $jieqiConfigs["article"]["staticurl"]);
$article_dynamic_url = (empty($jieqiConfigs["article"]["dynamicurl"]) ? $jieqiModules["article"]["url"] : $jieqiConfigs["article"]["dynamicurl"]);

if (!isset($_POST["act"])) {
	$_POST["act"] = "show";
}

switch ($_POST["act"]) {
case "post":
	jieqi_checkpost();
	$errtext = "";
	jieqi_getconfigs("article", "action", "jieqiAction");
	$jieqiAction["article"]["tip"]["paymin"] = intval($jieqiAction["article"]["tip"]["paymin"]);
	$_REQUEST["payegold"] = intval(trim($_REQUEST["payegold"]));

	if ($_REQUEST["payegold"] <= 0) {
		$errtext .= $jieqiLang["article"]["payegold_over_zero"] . "<br />";
	}
	else if ($_REQUEST["payegold"] < $jieqiAction["article"]["tip"]["paymin"]) {
		$errtext .= sprintf($jieqiLang["article"]["payegold_over_min"], $jieqiAction["article"]["tip"]["paymin"]) . "<br />";
	}
	else if ($usermoney["emoney"] < $_REQUEST["payegold"]) {
		$errtext .= $jieqiLang["article"]["payegold_over_emoney"] . "<br />";
	}

	if (empty($errtext)) {
		if ((0 < $article->getVar("sourceid", "n")) || defined("JIEQI_CLOUDPAY")) {
			jieqi_getconfigs("system", "setting", "jieqiSetting");
			if (isset($jieqiSetting["siteid"]) && (0 < intval($jieqiSetting["siteid"]))) {
				include_once (JIEQI_ROOT_PATH . "/include/apiclient.php");
				$jieqiapi = new JieqiApiClient($jieqiSetting);
				$params = array("aid" => intval($article->getVar("sourceid", "n")), "caid" => intval($article->getVar("articleid", "n")), "egold" => $_REQUEST["payegold"], "cuid" => intval($_SESSION["jieqiUserId"]), "cip" => jieqi_userip(), "caname" => $article->getVar("articlename", "n"));
				$ret = $jieqiapi->api("article/tip_article", $params);

				if ($ret["ret"] < 0) {
					jieqi_printfail(jieqi_htmlstr($ret["msg"]));
				}

				if (!is_array($ret["msg"])) {
					jieqi_printfail($jieqiLang["article"]["jieqiapi_return_formaterror"]);
				}

				$result = $ret["msg"];
				if (isset($result["ret"]) && ($result["ret"] < 0)) {
					jieqi_printfail(jieqi_htmlstr($result["msg"]));
				}
			}
		}

		$ret = $users_handler->payout($users, $_REQUEST["payegold"]);

		if (!$ret) {
			jieqi_printfail($jieqiLang["article"]["user_payout_failure"]);
		}

		$tid = (0 < $article->getVar("authorid", "n") ? $article->getVar("authorid", "n") : $article->getVar("posterid", "n"));
		$tname = (0 < $article->getVar("authorid", "n") ? $article->getVar("author", "n") : $article->getVar("poster", "n"));
		include_once ($jieqiModules["obook"]["path"] . "/include/funbuy.php");
		jieqi_obook_upincome(array("articleid" => $article->getVar("articleid", "n"), "egold" => $_REQUEST["payegold"], "etype" => 0, "intype" => "tip", "salenum" => 0));
		include_once $jieqiModules['obook']['path'] . '/include/actmreport.php';
		jieqi_obook_actmreport(array('articleid' => $article->getVar('articleid', 'n'), 'egold' => $_REQUEST["payegold"], 'etype' => 0, 'intype' => 'tip', 'salenum' => 0));
		include_once ($jieqiModules["article"]["path"] . "/include/funaction.php");
		$actions = array("actname" => "tip", "actnum" => $_REQUEST["payegold"], "actegold" => $_REQUEST["payegold"], "actbuy" => 0, "tid" => $tid, "tname" => $tname, "aname" => $article->getVar("articlename", "n"));
		jieqi_loadlang("action", "article");
		$actions["review_title"] = sprintf($jieqiLang["article"]["tip_review_title"], $_SESSION["jieqiUserName"], $actions["aname"], $_REQUEST["payegold"] . JIEQI_EGOLD_NAME);
		$actions["review_content"] = sprintf($jieqiLang["article"]["tip_review_content"], $_SESSION["jieqiUserName"], $actions["aname"], $_REQUEST["payegold"] . JIEQI_EGOLD_NAME);
		$actions["message_title"] = sprintf($jieqiLang["article"]["tip_message_title"], $_SESSION["jieqiUserName"], $actions["aname"], $_REQUEST["payegold"] . JIEQI_EGOLD_NAME);
		$actions["message_content"] = sprintf($jieqiLang["article"]["tip_message_content"], $_SESSION["jieqiUserName"], $actions["aname"], $_REQUEST["payegold"] . JIEQI_EGOLD_NAME);
		jieqi_article_actiondo($actions, $article);
		jieqi_msgwin(LANG_DO_SUCCESS, $jieqiLang["article"]["tip_save_success"]);
	}
	else {
		jieqi_printfail($errtext);
	}

	break;

case "show":
default:
	include_once (JIEQI_ROOT_PATH . "/header.php");
	$jieqiTpl->assign("article_static_url", $article_static_url);
	$jieqiTpl->assign("article_dynamic_url", $article_dynamic_url);
	$jieqiTpl->assign("articleid", $article->getVar("articleid"));
	$jieqiTpl->assign("articlename", $article->getVar("articlename"));
	$jieqiTpl->assign("vipid", $article->getVar("vipid"));
	$jieqiTpl->assign("postdate", date(JIEQI_DATE_FORMAT, $article->getVar("postdate")));
	$jieqiTpl->assign("lastupdate", date(JIEQI_DATE_FORMAT, $article->getVar("lastupdate")));
	$jieqiTpl->assign("authorid", $article->getVar("authorid"));
	$jieqiTpl->assign("author", $article->getVar("author"));
	$jieqiTpl->assign("useremoney", $usermoney["emoney"]);
	$jieqiTpl->assign("egoldname", JIEQI_EGOLD_NAME);

	if (empty($_REQUEST["ajax_request"])) {
		$jieqiTpl->assign("ajax_request", 0);
	}
	else {
		$jieqiTpl->assign("ajax_request", 1);
	}

	$jieqiTpl->setCaching(0);
	$jieqiTpl->assign("jieqi_contents", $jieqiTpl->fetch($jieqiModules["article"]["path"] . "/templates/tip.html"));
	include_once (JIEQI_ROOT_PATH . "/footer.php");
	break;
}

?>
