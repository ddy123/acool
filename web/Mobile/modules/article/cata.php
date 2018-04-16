<?php
/**
显示一个章节的内容
**/
function chapterpageid($chapterorder)
{
    jieqi_includedb();
	$query = JieqiQueryHandler::getInstance('JieqiQueryHandler');
	$sql = 'SELECT * FROM ' . jieqi_dbprefix('article_chapter') . ' WHERE articleid = '.$_REQUEST['aid'].' AND chapterorder = '.$chapterorder.' LIMIT 0, 1';
	$query->execute($sql);
	$row = $query->getRow();
	
	if($row['chapterid'] ==''){
		$chapterid = 0;
	}
    else {
		$chapterid = $row['chapterid'];
	}
	return $chapterid;
	
	
}
function chapterisvip($chapterid)
{
	jieqi_includedb();
	$query = JieqiQueryHandler::getInstance('JieqiQueryHandler');
	$sql = 'SELECT * FROM ' . jieqi_dbprefix('article_chapter') . ' WHERE chapterid = '.$chapterid.' LIMIT 0, 1';
	$query->execute($sql);
	$row = $query->getRow();
    $cvip = $row['isvip'];
	return $cvip;
	
	
}
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
$jieqiTset['jieqi_contents_template'] = $jieqiModules['article']['path'] . '/templates/cata.html';
include_once (JIEQI_ROOT_PATH . '/header.php');

include_once ($jieqiModules['article']['path'] . '/include/funarticle.php');
if (empty($_REQUEST['aid']) && !empty($_REQUEST['acode'])) {
	$jieqiTset['jieqi_contents_cacheid'] = $_REQUEST['acode'].'_'.$_REQUEST['cid'];
}
else {
	$jieqiTset['jieqi_contents_cacheid'] = $_REQUEST['aid'].'_'.$_REQUEST['cid'];
}

$content_used_cache = false;
if (JIEQI_USE_CACHE) {
	$jieqiTpl->setCaching(1);
	$jieqiTpl->setCachType(1);

	if ($jieqiTpl->is_cached($jieqiTset['jieqi_contents_template'], $jieqiTset['jieqi_contents_cacheid'], NULL, NULL, NULL, false)) {
		$content_used_cache = true;
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
	include_once ($jieqiModules['article']['path'] . '/class/chapter.php');
	$chapter_handler = &JieqiChapterHandler::getInstance('JieqiChapterHandler');
	$chapter = $chapter_handler->get($_REQUEST['cid']);
	
	$chaptervals = jieqi_query_rowvars($chapter, 'e');
	$jieqiTpl->assign_by_ref('chaptervals', $chaptervals);

	foreach ($chaptervals as $k => $v ) {
		$jieqiTpl->assign($k, $chaptervals[$k]);
	}
	$jieqiTpl->assign('chaptertime', $chapter->getVar('lastupdate', 'n'));
	$jieqiTpl->assign('chaptersize_c', ceil($chapter->getVar('size', 'n') / 2));
	
	if(!isset($jieqiConfigs['article'])) jieqi_getconfigs('article', 'configs', 'jieqiConfigs');
	$txtdir = jieqi_uploadpath($jieqiConfigs['article']['txtdir'], 'article') . jieqi_getsubdir($article->getVar('articleid', 'n')) . '/' . $article->getVar('articleid', 'n');
	$content = jieqi_readfile($txtdir . '/' . $chapter->getVar('chapterid', 'n') . $jieqi_file_postfix['txt']);
	$nextid=chapterpageid($chapter->getVar('chapterorder', 'n') + 1);
	$preid=chapterpageid($chapter->getVar('chapterorder', 'n') - 1);
	if($nextid == 0){
		$nexturl = jieqi_geturl('article', 'catalog', $_REQUEST['aid'], $_REQUEST['acode'], 1);
	}else {
	    $nexturl = jieqi_geturl('article', 'chapter', $nextid, $article->getVar('articleid', 'n'), chapterisvip($nextid), $article->getVar('articlecode', 'n'));
	}
	if($preid == 0){
		$preurl = jieqi_geturl('article', 'catalog', $_REQUEST['aid'], $_REQUEST['acode'], 1);
	}else {
		$preurl = jieqi_geturl('article', 'chapter', $preid, $article->getVar('articleid', 'n'), chapterisvip($preid), $article->getVar('articlecode', 'n'));
	}
	$jieqiTpl->assign('previous_chapterid', $nextid);
	$jieqiTpl->assign('next_chapterid', $preid);
	$jieqiTpl->assign('page_previous', $preurl);
	$jieqiTpl->assign('page_next', $nexturl);
	$jieqiTpl->assign('page_index', jieqi_geturl('article', 'catalog', $_REQUEST['aid'], $_REQUEST['acode'], 1));
	$jieqiTpl->assign('content', jieqi_htmlclickable(jieqi_htmlstr($content)));
	$jieqiTpl->assign('dynamic_url', $article_dynamic_url);
    $jieqiTpl->assign('static_url', $article_static_url);
	$jieqiTpl->assign('new_url', JIEQI_LOCAL_URL);

}
include_once ($jieqiModules['article']['path'] . '/class/chapter.php');
	$chapter_handler = &JieqiChapterHandler::getInstance('JieqiChapterHandler');
	$chapter = $chapter_handler->get($_REQUEST['cid']);
	if($chapter->getVar('isvip', 'n') > 0) 
{
	header('Location: ' . jieqi_geturl('article', 'chapter', $chapter->getVar('chapterid', 'n'), $article->getVar('articleid', 'n'), $chapter->getVar('isvip', 'n'), $article->getVar('articlecode', 'n')));
}
if (!isset($jieqiConfigs['article']['visitstatnum']) || !empty($jieqiConfigs['article']['visitstatnum'])) {
	include_once ($jieqiModules['article']['path'] . '/articlevisit.php');
}
include_once (JIEQI_ROOT_PATH . '/cookies.php');
        $cid['cid'] = $_REQUEST['cid'];
		$cid['isvip'] = 1;
		$cid['time'] = date('Y-m-d H:i:s', time());
        gc($_REQUEST['aid'],serialize($cid));
include_once (JIEQI_ROOT_PATH . '/footer.php');
?>