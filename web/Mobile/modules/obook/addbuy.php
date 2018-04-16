<?php
define("JIEQI_MODULE_NAME", "obook");
require_once ("../../global.php");

$_REQUEST["obuyid"] = intval($_REQUEST["obuyid"]);

include_once (JIEQI_ROOT_PATH . '/class/users.php');
$users_handler = &JieqiUsersHandler::getInstance('JieqiUsersHandler');
$jieqiUsers = $users_handler->get($_SESSION['jieqiUserId']);

if (!$jieqiUsers) {
	jieqi_printfail(LANG_NO_USER);
}
jieqi_includedb();
$query = JieqiQueryHandler::getInstance("JieqiQueryHandler");
include_once ($jieqiModules["article"]["path"] . "/class/article.php");
$article_handler = &JieqiArticleHandler::getInstance("JieqiArticleHandler");
$article = $article_handler->get($_REQUEST["obuyid"]);


if (!empty($_REQUEST["obuyid"])) {
	
	$sql = "SELECT * FROM " . jieqi_dbprefix("obook_obuy") . " WHERE userid = " . intval($_SESSION["jieqiUserId"]) . " AND articleid = " . intval($_REQUEST["obuyid"]) . " LIMIT 0, 1";
    $res = $query->execute($sql);
    $persons = $query->getRow($res);
	if($article->getVar("isvip") == 0){
		jieqi_printfail('该小说还不是签约小说，不能订阅！');
	}
		
	        if(!$persons){
        	   $sql = "INSERT INTO " . jieqi_dbprefix("obook_obuy") . " (`userid` ,`username`,`articleid`,`obookid`,`obookname` ,`autobuy`)VALUES ('" . $_SESSION["jieqiUserId"] . "', '" . $_SESSION["jieqiUserName"] . "', '" . intval($_REQUEST["obuyid"]) . "', '" . $article->getVar("vipid") . "', '" . $article->getVar("articlename") . "', '1');";
			   $query->execute($sql);
        	}else{
        	  if (0 < $_REQUEST["obuyid"]) {
				  if($persons['autobuy'] == 1){
					if (0 < $_REQUEST["obuyid"]) {
			        $sql = "UPDATE " . jieqi_dbprefix("obook_obuy") . " SET autobuy = 0 WHERE articleid = " . $_REQUEST["obuyid"] ." AND userid = " . intval($_SESSION["jieqiUserId"]);
			        $query->execute($sql);
		            }
					jieqi_printfail('关闭自动订阅成功');
				  }else{
					if (0 < $_REQUEST["obuyid"]) {
             	  $sql = "UPDATE " . jieqi_dbprefix("obook_obuy") . " SET autobuy = 1 WHERE articleid = " . $_REQUEST["obuyid"] ." AND userid = " . intval($_SESSION["jieqiUserId"]);
            	  $query->execute($sql);
				  }
				  }
				  jieqi_printfail('开启自动订阅成功');
        	    } 
        	}
			jieqi_printfail('开启自动订阅成功');

}else {
	jieqi_printfail('小说不存在！');
}

?>
