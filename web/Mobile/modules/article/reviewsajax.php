<?php
define('JIEQI_MODULE_NAME', 'article');  //定义程序所属模块

require_once ('../../global.php');  //包含通用预处理程序

$conn = mysql_connect(JIEQI_DB_HOST,JIEQI_DB_USER,JIEQI_DB_PASS) or die('链接失败');mysql_select_db(JIEQI_DB_NAME, $conn);@mysql_query("SET names gbk");//SQL连接

if (empty($_REQUEST['aid']) || !is_numeric($_REQUEST['aid']))
{
	jieqi_printfail(LANG_ERROR_PARAMETER);
}

function jieqi_apis_out($data = array(), $format = 'json')
{
	switch ($format)
	{
		case 'json':
		default:
		{
			if(JIEQI_SYSTEM_CHARSET != 'utf-8')
			{
				global $charsetary;
				include_once JIEQI_ROOT_PATH . '/include/changecode.php';
				$data = jieqi_funtoarray('jieqi_' . $charsetary[JIEQI_SYSTEM_CHARSET] . '2' . $charsetary['utf-8'], $data);
			}
			
			header('Content-Type:text/html; charset=utf-8');
			$jsone = json_encode($data);
			$c = $_REQUEST['CALLBACK'];
			$d = '(';
			$e = ')';
			echo $c . $d . $jsone . $e;
			exit;
			break;
		}
	}
}

include_once(JIEQI_ROOT_PATH.'/class/users.php');

$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
$jieqiUsers    = $users_handler->get($_SESSION['jieqiUserId']);

include_once(JIEQI_ROOT_PATH.'/header.php');

@$page      = max(1, intval($_REQUEST["page"]));
$aid        = $_REQUEST['aid'];

//burn修改，2017-02-05，没有`display`字段
//$result     = mysql_query("SELECT * FROM `jieqi_article_reviews` WHERE `ownerid` = $aid AND `display` = 0 ");

$sql        = "SELECT * FROM `jieqi_article_reviews` WHERE `ownerid` = $aid";

$result     = mysql_query($sql);

$num        = mysql_num_rows($result);//总记录数

$pagesize   = 10;

$pagenum    = ceil($num / $pagesize);

$startindex = ($page - 1) * $pagesize;

if($page <= 1)
{
	$pages = 1;
}

if($page < $pagenum)
{
	$pages = 1;
}
else if($page == $pagenum)
{
	$pages = 0;
}

else if($page > $pagenum)
{
	$pages = 0;
}

$jieqiTpl->assign( "pages", $pages );	
$jieqiTpl->assign( "page", $page );
$jieqiTpl->assign( "pagenum", $pagenum );

if($page <= $pagenum )
{
	//burn修改，2017-02-05，没有`display`字段
	$sql  = "SELECT * FROM `jieqi_article_reviews` WHERE `ownerid` = $aid order by istop desc,posttime desc limit $startindex,$pagesize";
	
//    $sql3 = mysql_query("SELECT * FROM `jieqi_article_reviews` WHERE `ownerid` = $aid  AND `display` = 0 order by istop desc,posttime desc limit $startindex,$pagesize");
	
	$sql3 = mysql_query($sql);

    while($list = mysql_fetch_array($sql3,1))
    {
//	    echo '<br><br>$list = ';
//
//	    var_dump($list);
//
//	    echo '<br><br>';
    	
        $listdd[] = $list;
    }
    
//    echo '<br><br>$listdd = ';
//
//    var_dump($listdd);
//
//	echo '<br><br>';
    
    foreach($listdd as $v)
    {
		$rt        = jieqi_getsubdir($v[articleid]);
		$uurl      = str_replace('',"",jieqi_geturl('article', 'article', $v[articleid]));
		
		$egoldname = JIEQI_EGOLD_NAME;
		$url       = str_replace('',"",JIEQI_URL);
		$userurl   = str_replace('',"",jieqi_geturl('system', 'user',$v[posterid]));
		
		if($v[istop] == 1)
		{
			$top = '<span class="top">[置顶]</span>';
		}
		else
		{
			$top = '';
		}
		
		if($v[isgood] == 1)
		{
			$good = '<span class="good">[精华]</span>';
		}
		else
		{
			$good = '';
		}
		
		//VIP徽章
		include_once(JIEQI_ROOT_PATH.'/class/users.php');
		
        $users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
        $jieqiUsers    = $users_handler->get($v[posterid]);
		
        if($jieqiUsers)
        {
			jieqi_getconfigs('system', 'vipgrade','jieqiVipgrade');
			$vip = jieqi_gethonorarray($jieqiUsers->getVar('isvip'), $jieqiVipgrade);
			jieqi_getconfigs('system', 'honors');
			$honorid = jieqi_gethonorid($jieqiUsers->getVar('score'), $jieqiHonors);
		}
		
        $re  = mysql_query("SELECT * FROM `jieqi_article_replies` WHERE `topicid`= $v[topicid] AND `istopic`= 1");
        
	    $ret = mysql_fetch_array($re);
	    
	    $re  = $ret['posttext'];
		  
	    $reurl = JIEQI_URL.'/modules/article/showajax.php?aid='.$v[ownerid].'&rid='.$v[topicid].'&page=&method=showReplies&display=';
    
	    if ($ret['posttext'] !== false)
	    {
			if ($enableubb)
			{
				if (!is_object($jieqiTxtcvt))
				{
					include_once JIEQI_ROOT_PATH . '/lib/text/textconvert.php';
					$jieqiTxtcvt = TextConvert::getInstance('TextConvert');
				}

				$ret['posttext'] = $jieqiTxtcvt->displayTarea($ret['posttext'], 0, 1, 1, 1, 1);
			}
			else
			{
				if (!is_object($jieqiTxtcvt))
				{
					include_once JIEQI_ROOT_PATH . '/lib/text/textconvert.php';
					
					$jieqiTxtcvt = TextConvert::getInstance('TextConvert');
				}

				$ret['posttext'] = jieqi_htmlstr(preg_replace(array('/\\[\\/?(code|url|color|font|align|email|b|i|u|d|img|quote|size)[^\\[\\]]*\\]/is'), '', $ret['posttext']));
				$ret['posttext'] = $jieqiTxtcvt->smile(preg_replace('/https?:\\/\\/[^\\s\\r\\n\\t\\f<>]+/i', '<a href="\\0">\\0</a>', $ret['posttext']));
			}
		}

		$replies .= '<li>
                        <div class="right">
                            <h3><a>'.$top.''.$good.''.$v['title'].'</a></h3>
                            <p class="summary">'.$ret['posttext'].'</p>
                            <div class="controls">
                                <a class="name" href="'.$userurl.'" style="padding-top:3px;">'.$v[poster].'</a>
                                <span class="time">'.date("Y-m-d H:i:s",$v[posttime]).'</span>
                                <a class="reply" href="javascript:void(0);" onclick="return showReplies(this,\''.$reurl.'\')" id="'.$v[topicid].'" class="reply">回复(<span class="num">'.$v[replies].'</span>)</a>
                            </div>
                        </div>
						 <div id="show'.$v[topicid].'" class="reply-list" style="display:none"></div>
			            </li>';
    }
}
	
$input .= '<input type="hidden" name="loadreview_has_next_page"   value="'.$pages.'" />';
	
if($_REQUEST['ajax_request'] > 0)
{
	jieqi_apis_out($replies.$input);
}
else
{
	echo $replies.$input;
}
?>