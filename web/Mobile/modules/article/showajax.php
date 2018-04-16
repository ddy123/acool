<?php
define('JIEQI_MODULE_NAME', 'article');  //定义程序所属模块
require_once ('../../global.php');  //包含通用预处理程序
$conn=mysql_connect(JIEQI_DB_HOST,JIEQI_DB_USER,JIEQI_DB_PASS) or die('链接失败');mysql_select_db(JIEQI_DB_NAME, $conn);@mysql_query("SET names gbk");//SQL连接
if (empty($_REQUEST['aid']) || !is_numeric($_REQUEST['aid'])) {
	jieqi_printfail(LANG_ERROR_PARAMETER);
}
function jieqi_apis_out($data = array(), $format = 'json')
{
	switch ($format) {
	case 'json':
	default:
		if (JIEQI_SYSTEM_CHARSET != 'utf-8') {
			global $charsetary;
			include_once JIEQI_ROOT_PATH . '/include/changecode.php';
			$data = jieqi_funtoarray('jieqi_' . $charsetary[JIEQI_SYSTEM_CHARSET] . '2' . $charsetary['utf-8'], $data);
		}

		header('Content-Type:text/html; charset=utf-8');
		$jsone=json_encode($data);
		$c = $_REQUEST['CALLBACK'];
        $d ='(';
        $e = ')';	
		echo $c.$d.$jsone.$e;
		exit ;
		break;
	}
}

$aid=$_REQUEST['aid'];
$rid=$_REQUEST['rid'];

       $sql3 = mysql_query("SELECT * FROM `jieqi_article_replies` WHERE `topicid`= $rid AND `ownerid` = $aid AND `istopic`= 0 order by `posttime` desc");
        while($list = mysql_fetch_array($sql3,1)){
            $listdd[] = $list;
        }
		foreach((array)$listdd as $v){
			$userurl = str_replace('',"",jieqi_geturl('system', 'user',$v[posterid]));
			//VIP徽章
			include_once(JIEQI_ROOT_PATH.'/class/users.php');
            $users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
            $jieqiUsers = $users_handler->get($v[posterid]);
			if($jieqiUsers){
			jieqi_getconfigs('system', 'vipgrade','jieqiVipgrade');
			$vip = jieqi_gethonorarray($jieqiUsers->getVar('isvip'), $jieqiVipgrade);
			jieqi_getconfigs('system', 'honors');
			$honorid=jieqi_gethonorid($jieqiUsers->getVar('score'), $jieqiHonors);
			}
			        if ($v['posttext'] !== false) {
			        		if ($enableubb) {
			        			if (!is_object($jieqiTxtcvt)) {
			        				include_once JIEQI_ROOT_PATH . '/lib/text/textconvert.php';
			        				$jieqiTxtcvt = TextConvert::getInstance('TextConvert');
			        			}

			        			$v['posttext'] = $jieqiTxtcvt->displayTarea($v['posttext'], 0, 1, 1, 1, 1);
			        }
			        else {
			        			if (!is_object($jieqiTxtcvt)) {
			        				include_once JIEQI_ROOT_PATH . '/lib/text/textconvert.php';
			        				$jieqiTxtcvt = TextConvert::getInstance('TextConvert');
            			        }

			        			$v['posttext'] = jieqi_htmlstr(preg_replace(array('/\\[\\/?(code|url|color|font|align|email|b|i|u|d|img|quote|size)[^\\[\\]]*\\]/is'), '', $v['posttext']));
			        			$v['posttext'] = $jieqiTxtcvt->smile(preg_replace('/https?:\\/\\/[^\\s\\r\\n\\t\\f<>]+/i', '<a href="\\0">\\0</a>', $v['posttext']));
			        }
	}
	
	$res .='
	<li>
					           						<div class="summary">
					           							<a class="name" href="'.$userurl.'">'.$v[poster].'</a> ：'.$v['posttext'].'</div>
					           						<div class="controls">
					           							<span class="time">'.date("Y-m-d H:i:s",$v[posttime]).'</span>
                                                           <a class="reply" href="#show'.$v[topicid].'" onclick="showat(\''.$v[poster].'\','.$v[topicid].');">回复</a>
					           						</div>
					           					</li>
	';
		}
    $replies .='
	<div class="ico"></div>
	<ul>
	'.$res.'
	</ul> 
	<div class="pages"></div> 
        <div class="form column-2 ">
            <form id="reply'.$rid.'" method="post" action="/modules/article/reviewshow.php?tid='.$rid.'&aid='.$aid.'" onSubmit="return submit_reply(this);">
                <table class="tablebtn" style="border-width:1px;">
					<tbody><tr>
						<td>
						<input type="text" id="pcontent'.$rid.'" name="pcontent" maxlength="100" size="28" value="" placeholder="我也来评一句">
                            
						</td>
						<td width="70">
						<input type="hidden" name="act" value="newpost" />
				        <input type="hidden" id="rid" value="'.$rid.'" />
						<input type="hidden" name="' . JIEQI_TOKEN_NAME . '" value="' . htmlspecialchars($_SESSION["jieqiUserToken"], ENT_QUOTES) . '" />
				        <input type="hidden" id="get_reply_url" value="/modules/article/showajax.php?aid='.$aid.'&rid='.$rid.'" />
						<button name="dosubmit" type="submit" class="btn btn-auto btn-blue vm" id="btn_pcontent'.$rid.'">回应</button>
						</td>
					</tr>
				</tbody></table>


                
            </form>
 </div>
	<script type="text/javascript">
	function showat(poster,rid){
		if(rid && poster){
		$("#pcontent"+rid).val("回复@"+poster+" :");
		}
	}
</script>
	';

jieqi_apis_out($replies);
?>