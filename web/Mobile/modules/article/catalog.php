<?php
/**
显示一篇文章的全部章节
**/
define('JIEQI_MODULE_NAME', 'article');
require_once ('../../global.php');

if (isset($_REQUEST['aid'])) {
	$_REQUEST['aid'] = intval($_REQUEST['aid']);
}

if (isset($_REQUEST['acode']) && !preg_match('/^[a-z0-9_]+$/i', $_REQUEST['acode'])) {
	$_REQUEST['acode'] = '';
}

if ((empty($_REQUEST['aid']) || !is_numeric($_REQUEST['aid'])) && empty($_REQUEST['acode'])) {
	jieqi_printfail(LANG_ERROR_PARAMETER);
}
jieqi_getconfigs(JIEQI_MODULE_NAME, 'configs');
$jieqiTset['jieqi_contents_template'] = $jieqiModules['article']['path'] . '/templates/catalog.html';
include_once (JIEQI_ROOT_PATH . '/header.php');
$jieqiPset = jieqi_get_pageset();

include_once ($jieqiModules['article']['path'] . '/include/funarticle.php');
if (empty($_REQUEST['aid']) && !empty($_REQUEST['acode'])) {
	$jieqiTset['jieqi_contents_cacheid'] = $_REQUEST['acode'];
}
else {
	$jieqiTset['jieqi_contents_cacheid'] = $_REQUEST['aid'];
}
$pagecacheid = $jieqiTset['jieqi_contents_cacheid'];
$jieqiTset['jieqi_contents_cacheid'] .= '_' . $_REQUEST['page'];
$content_used_cache = false;

if (JIEQI_USE_CACHE && ($_REQUEST['page'] <= $jieqiConfigs['article']['cachenum'])) {
	$jieqiTpl->setCaching(1);
	$jieqiTpl->setCachType(1);

	if ($jieqiTpl->is_cached($jieqiTset['jieqi_contents_template'], $jieqiTset['jieqi_contents_cacheid'], NULL, NULL, NULL, false)) {
		$uptime = jieqi_article_getuptime();
		$cachedtime = $jieqiTpl->get_cachedtime($jieqiTset['jieqi_contents_template'], $jieqiTset['jieqi_contents_cacheid']);
		if (($uptime < $cachedtime) || ((JIEQI_NOW_TIME - $cachedtime) < 15)) {
			$content_used_cache = true;
		}
		else {
			$jieqiTpl->setCaching(2);
		}
	}
}
else {
	$jieqiTpl->setCaching(0);
}

if (!$content_used_cache) {

		
	jieqi_loadlang('article', JIEQI_MODULE_NAME);
	include_once ($jieqiModules['article']['path'] . '/class/article.php');
	$article_handler = &JieqiArticleHandler::getInstance('JieqiArticleHandler');
	if (empty($_REQUEST['aid']) && !empty($_REQUEST['acode'])) {
		$article = $article_handler->get($_REQUEST['acode'], 'articlecode');
	}
	else {
		$article = $article_handler->get($_REQUEST['aid']);
	}
	
	if (!$article) {
		jieqi_printfail($jieqiLang['article']['article_not_exists']);
	}
	else if ($article->getVar('display') != 0) {
		jieqi_getconfigs(JIEQI_MODULE_NAME, 'power');

		if (!jieqi_checkpower($jieqiPower['article']['manageallarticle'], $jieqiUsersStatus, $jieqiUsersGroup, true)) {
			if ($article->getVar('display') == 1) {
				jieqi_printfail($jieqiLang['article']['article_not_audit']);
			}
			else {
				jieqi_printfail($jieqiLang['article']['article_not_exists']);
			}
		}
	}

	$_REQUEST['aid'] = intval($article->getVar('articleid', 'n'));

	if ($article->getVar('display') != 0) {
		$jieqiTpl->setCaching(0);
		$jieqiConfigs['article']['makehtml'] = 0;
	}

	$_REQUEST['class'] = $article->getVar('sortid');
	$_REQUEST['sortid'] = $article->getVar('sortid');
	jieqi_getconfigs('article', 'sort', 'jieqiSort');
	jieqi_getconfigs('article', 'option', 'jieqiOption');
	$article_static_url = (empty($jieqiConfigs['article']['staticurl']) ? $jieqiModules['article']['url'] : $jieqiConfigs['article']['staticurl']);
	$article_dynamic_url = (empty($jieqiConfigs['article']['dynamicurl']) ? $jieqiModules['article']['url'] : $jieqiConfigs['article']['dynamicurl']);
	$jieqiTpl->assign('article_static_url', $article_static_url);
	$jieqiTpl->assign('article_dynamic_url', $article_dynamic_url);
	$jieqiTpl->assign('makefull', $jieqiConfigs['article']['makefull']);
	$jieqiTpl->assign('makezip', $jieqiConfigs['article']['makezip']);
	$jieqiTpl->assign('makejar', $jieqiConfigs['article']['makejar']);
	$jieqiTpl->assign('makeumd', $jieqiConfigs['article']['makeumd']);
	$jieqiTpl->assign('maketxtfull', $jieqiConfigs['article']['maketxtfull']);
	$jieqiTpl->assign('maketxt', $jieqiConfigs['article']['maketxt']);
	$jieqiTpl->assign('ratemax', intval($jieqiConfigs['article']['maxrates']));
	include_once ($jieqiModules['article']['path'] . '/include/funarticle.php');
	$articlevals = jieqi_article_vars($article, true);
	$jieqiTpl->assign_by_ref('articlevals', $articlevals);

	foreach ($articlevals as $k => $v ) {
		$jieqiTpl->assign($k, $articlevals[$k]);
	}
	
	    jieqi_getconfigs('article', 'configs', 'jieqiConfigs');
		include_once ($jieqiModules['article']['path'] . '/include/funchapter.php');
		include_once ($jieqiModules['article']['path'] . '/class/chapter.php');
		$chapter_handler = &JieqiChapterHandler::getInstance('JieqiChapterHandler');
		//$criteria = new CriteriaCompo(new Criteria('articleid', $_REQUEST['aid'], '='));
		$criteria = new CriteriaCompo();
        $criteria->add(new Criteria('articleid', $_REQUEST['aid']));
	    $criteria->setSort('chapterorder');
		if($_REQUEST['asc'] == 1) $criteria->setOrder('DESC');
		else $criteria->setOrder('ASC');
		//$criteria->setOrder('ASC');
		$criteria->setLimit($jieqiPset['rows']);
		$criteria->setStart($jieqiPset['start']);
		$chapter_handler->queryObjects($criteria);
		//$i = 0;
		$chapterrows = array();
		$k = 0;
		
		while ($v = $chapter_handler->getObject()) {
			$chapterrows[$k] = jieqi_article_chaptervars($v);
            $k++;
		}
		
		$jieqiTpl->assign_by_ref('chapterrows', $chapterrows);	
	


include_once (JIEQI_ROOT_PATH . '/lib/html/page.php');
	if (JIEQI_USE_CACHE) {
		jieqi_getcachevars('article', 'chapterlog');

		if (!is_array($jieqiChapterlog)) {
			$jieqiChapterlog = array();
		}

		if (!isset($jieqiChapterlog[$pagecacheid]) || (JIEQI_CACHE_LIFETIME < (JIEQI_NOW_TIME - $jieqiChapterlog[$pagecacheid]['time']))) {
			$jieqiChapterlog[$pagecacheid] = array('rows' => $chapter_handler->getCount($criteria), 'time' => JIEQI_NOW_TIME);
			jieqi_setcachevars('chapterlog', 'jieqiChapterlog', $jieqiChapterlog, 'article');
		}

		$chapter = $jieqiChapterlog[$pagecacheid]['rows'];
	}
	else {
		$chapter = $chapter_handler->getCount($criteria);
	}

	$jieqiPset['count'] = $chapter;
	$jumppage = new JieqiPage($jieqiPset);
	$jumppage->setlink(jieqi_geturl('article', 'catalog', $_REQUEST['aid'], $_REQUEST['acode'], 0));
	//$jumppage->setlink(jieqi_geturl('article', 'articlelist', 0, $_GET['sortcode'], $_GET['fullflag']));
	$jieqiTpl->assign('url_jumppage', $jumppage->whole_bar());
}
if (!isset($jieqiConfigs['article']['visitstatnum']) || !empty($jieqiConfigs['article']['visitstatnum'])) {
	include_once ($jieqiModules['article']['path'] . '/articlevisit.php');
}
include_once (JIEQI_ROOT_PATH . '/footer.php');
?>