<?php
//草稿编辑
?>
<?php

define("JIEQI_MODULE_NAME", "article");
require_once ("../../global.php");

if (empty($_REQUEST["id"])) {
	jieqi_printfail(LANG_ERROR_PARAMETER);
}

$_REQUEST["id"] = intval($_REQUEST["id"]);
jieqi_getconfigs(JIEQI_MODULE_NAME, "power");
jieqi_checkpower($jieqiPower["article"]["newdraft"], $jieqiUsersStatus, $jieqiUsersGroup, false);
jieqi_getconfigs("obook", "power");
$customprice = jieqi_checkpower($jieqiPower["obook"]["customprice"], $jieqiUsersStatus, $jieqiUsersGroup, true);
jieqi_loadlang("draft", JIEQI_MODULE_NAME);
include_once ($jieqiModules["article"]["path"] . "/class/draft.php");
$draft_handler = &JieqiDraftHandler::getInstance("JieqiDraftHandler");
$draft = $draft_handler->get($_REQUEST["id"]);

if (!$draft) {
	jieqi_printfail($jieqiLang["article"]["draft_not_exists"]);
}

if ($draft->getVar("posterid") != $_SESSION["jieqiUserId"]) {
	jieqi_printfail($jieqiLang["article"]["noper_manage_draft"]);
}

jieqi_getconfigs(JIEQI_MODULE_NAME, "configs");
$article_static_url = (empty($jieqiConfigs["article"]["staticurl"]) ? $jieqiModules["article"]["url"] : $jieqiConfigs["article"]["staticurl"]);
$article_dynamic_url = (empty($jieqiConfigs["article"]["dynamicurl"]) ? $jieqiModules["article"]["url"] : $jieqiConfigs["article"]["dynamicurl"]);

if (!isset($_POST["act"])) {
	$_POST["act"] = "edit";
}

switch ($_POST["act"]) {
case "update":
	jieqi_checkpost();
	$_POST = jieqi_funtoarray("trim", $_POST);
	include_once ($jieqiModules["article"]["path"] . "/include/actarticle.php");
	$attachvars = array();
	$errors = jieqi_article_chapterpcheck($_POST, $attachvars);

	if ($_REQUEST["isvip"] == 1) {
		$_POST["articleid"] = $_POST["obookid"];
	}

	$_POST["articleid"] = intval($_POST["articleid"]);

	if (empty($_POST["articleid"])) {
		$errors[] = $jieqiLang["article"]["draft_need_articleid"] . "<br />";
	}

	$articleid = 0;
	$articlename = "";
	$obookid = 0;

	if ($_REQUEST["isvip"] == 1) {
		include_once ($jieqiModules["obook"]["path"] . "/class/obook.php");
		$obook_handler = &JieqiObookHandler::getInstance("JieqiObookHandler");
		$obook = $obook_handler->get($_POST["articleid"]);

		if (!is_object($obook)) {
			$errors[] = $jieqiLang["article"]["draft_noe_article"] . "<br />";
		}
		else {
			$articleid = $obook->getVar("articleid", "n");
			$articlename = $obook->getVar("obookname", "n");
			$obookid = $obook->getVar("obookid", "n");
		}
	}
	else {
		include_once ($jieqiModules["article"]["path"] . "/class/article.php");
		$article_handler = &JieqiArticleHandler::getInstance("JieqiArticleHandler");
		$article = $article_handler->get($_POST["articleid"]);

		if (!is_object($article)) {
			$errors[] = $jieqiLang["article"]["draft_noe_article"] . "<br />";
		}
		else {
			$articleid = $article->getVar("articleid", "n");
			$articlename = $article->getVar("articlename", "n");
			$obookid = 0;
		}
	}

	if (empty($errors)) {
		$draftsize = strlen(preg_replace("/\s/", "", $_POST["chaptercontent"]));
		$draft->setVar("articleid", $articleid);
		$draft->setVar("articlename", $articlename);
		$draft->setVar("isvip", $_REQUEST["isvip"]);
		$draft->setVar("obookid", $obookid);
		$draft->setVar("lastupdate", JIEQI_NOW_TIME);
		$draft->setVar("chaptername", $_POST["chaptername"]);
		$draft->setVar("chaptercontent", $_POST["chaptercontent"]);
		$draft->setVar("notice", $_POST["notice"]);
		$draft->setVar("size", $draftsize);
		$saleprice = -1;
		if (($_REQUEST["isvip"] == 1) && is_numeric($_POST["saleprice"])) {
			$saleprice = intval($_POST["saleprice"]);
			if (!$customprice && ($saleprice != 0)) {
				$saleprice = -1;
			}

			if ($saleprice < 0) {
				$saleprice = -1;
			}
		}

		$draft->setVar("saleprice", $saleprice);

		if ($_POST["uptiming"] == 1) {
			$draft->setVar("ispub", 1);
			$draft->setVar("pubdate", $_POST["pubtime"]);
		}
		else {
			$draft->setVar("ispub", 0);
			$draft->setVar("pubdate", 0);
		}

		if (!$draft_handler->insert($draft)) {
			jieqi_printfail($jieqiLang["article"]["draft_edit_failure"]);
		}
		else {
			jieqi_jumppage($article_dynamic_url . "/draft.php", LANG_DO_SUCCESS, $jieqiLang["article"]["draft_edit_success"]);
		}
	}
	else {
		jieqi_printfail(implode("<br />", $errors));
	}

	break;

case "edit":
default:
	include_once (JIEQI_ROOT_PATH . "/header.php");
	$isvip = intval($draft->getVar("isvip"));
	$articleid = intval($draft->getVar("articleid"));
	$obookid = intval($draft->getVar("obookid"));
	if ((0 < $obookid) && ($articleid == 0)) {
		$articleid = $obookid;
	}

	if ((0 < $isvip) && ($obookid == 0)) {
		$obookid = $articleid;
	}

	$articlerows = array();
	include_once ($jieqiModules["article"]["path"] . "/class/article.php");
	$article_handler = &JieqiArticleHandler::getInstance("JieqiArticleHandler");
	$criteria = new CriteriaCompo(new Criteria("authorid", $_SESSION["jieqiUserId"]));
	$criteria->setLimit(100);
	$article_handler->queryObjects($criteria);
	$k = 0;

	while ($v = $article_handler->getObject()) {
		$articlerows[$k]["articleid"] = $v->getVar("articleid");
		$articlerows[$k]["articlename"] = $v->getVar("articlename");

		if ($articleid == $articlerows[$k]["articleid"]) {
			$articlerows[$k]["checked"] = 1;
		}
		else {
			$articlerows[$k]["checked"] = 0;
		}

		$k++;
	}

	$jieqiTpl->assign_by_ref("articlerows", $articlerows);
	include_once ($jieqiModules["obook"]["path"] . "/class/obook.php");
	$obook_handler = &JieqiObookHandler::getInstance("JieqiObookHandler");
	$obook_handler->queryObjects($criteria);
	$obookrows = array();
	$k = 0;

	while ($v = $obook_handler->getObject()) {
		$obookrows[$k]["obookid"] = $v->getVar("obookid");
		$obookrows[$k]["obookname"] = $v->getVar("obookname");

		if ($obookid == $obookrows[$k]["obookid"]) {
			$obookrows[$k]["checked"] = 1;
		}
		else {
			$obookrows[$k]["checked"] = 0;
		}

		$k++;
	}

	$jieqiTpl->assign_by_ref("obookrows", $obookrows);
	$jieqiTpl->assign("articleid", $articleid);
	$jieqiTpl->assign("articlename", $draft->getVar("articlename"));
	$jieqiTpl->assign("obookid", $obookid);
	$jieqiTpl->assign("draftid", $draft->getVar("draftid", "n"));
	$jieqiTpl->assign("isvip", $isvip);
	$jieqiTpl->assign("chaptername", $draft->getVar("chaptername", "e"));
	$jieqiTpl->assign("chaptercontent", $draft->getVar("chaptercontent", "e"));
	$jieqiTpl->assign("notice", $draft->getVar("notice", "e"));
	$jieqiTpl->assign("id", $_REQUEST["id"]);
	$pubdate = intval($draft->getVar("pubdate"));
	$jieqiTpl->assign("pubdate", $pubdate);

	if (0 < $pubdate) {
		$jieqiTpl->assign("pubyear", date("Y", $pubdate));
		$jieqiTpl->assign("pubmonth", date("m", $pubdate));
		$jieqiTpl->assign("pubday", date("d", $pubdate));
		$jieqiTpl->assign("pubhour", date("H", $pubdate));
		$jieqiTpl->assign("pubminute", date("i", $pubdate));
		$jieqiTpl->assign("pubsecond", date("s", $pubdate));
	}
	else {
		$jieqiTpl->assign("pubyear", date("Y", JIEQI_NOW_TIME));
		$jieqiTpl->assign("pubmonth", date("m", JIEQI_NOW_TIME));
		$jieqiTpl->assign("pubday", date("d", JIEQI_NOW_TIME));
	}

	if ($customprice) {
		$jieqiTpl->assign("customprice", 1);
	}
	else {
		$jieqiTpl->assign("customprice", 0);
	}

	$jieqiTpl->assign("egoldname", JIEQI_EGOLD_NAME);
	$saleprice = $draft->getVar("saleprice", "n");

	if ($saleprice < 0) {
		$saleprice = "";
	}

	$jieqiTpl->assign("saleprice", $saleprice);
	$jieqiTpl->assign("authorarea", 1);
	$jieqiTpl->setCaching(0);
	$jieqiTset["jieqi_contents_template"] = $jieqiModules["article"]["path"] . "/templates/draftedit.html";
	include_once (JIEQI_ROOT_PATH . "/footer.php");
	break;
}

?>
