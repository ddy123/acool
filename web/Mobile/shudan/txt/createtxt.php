<?php
date_default_timezone_set("Asia/Shanghai");
header("Content-type: text/html; charset=utf-8");  
error_reporting(0); 
// 获取小说ID
$id=$_GET['id']; 
$LF="\n\r";
$url="http://127.0.0.3";
// 获取过滤的书单ID
function getFiltrationArr(){
	$html="";
	$file_path = "novel.txt";
	$file = fopen($file_path,"r");
	while(!feof($file))
	{
		$html.=fgets($file);
	}
	$arr=explode(",",$html);
	fclose($file);
	return $arr;
}





// 获取书单ID
$arr=getFiltrationArr();

$ids="";
if(empty($id)){
	for($i=0;$i<count($arr);$i++){
		if($arr[$i]!=""){
			if($i==count($arr)-1){
				$ids.=str_replace("\n"," ",$arr[$i]);
			}else{
				$ids.=str_replace("\n"," ",$arr[$i])." or a.articleid=";
			}
		}
	}
}else{
	$ids=$id;
}


include("db.php");
$db = new DB;
$db_1 = new DB;
$sql="select *,a.intro AS aintro,a.siteid AS asiteid from jieqi_article_article a left join jieqi_system_users b on a.authorid=b.uid where a.articleid=".$ids;
$db->query($sql);

for($j=0;$j<$db->num_rows();$j++){
	$db->next_record();

	$articleid = $db->f(articleid);
	$siteid = substr($articleid,0,strlen($articleid)>"3"?-3:-0)==""?"0":substr($articleid,0,strlen($articleid)>"3"?-3:-0);
	
	
	$file = fopen("txt/".$articleid.".txt",'w+');
	fwrite($file,"");
	fclose($file);
	echo $articleid."    <a href='/shudan/txt/txt/".$articleid.".txt'>右键点击下载</a></br>";

	$sql="select * FROM  jieqi_article_chapter WHERE articleid=".$articleid." ORDER BY chapterorder ASC LIMIT 0 , 99999";
	$db_1->query($sql);
	// 列表数据组合
	for($i=0;$i< $db_1->num_rows();$i++){
		$db_1->next_record();
		
		$chapterid = $db_1->f(chapterid); //章节ID
		$chaptername = iconv('GBK', 'UTF-8//IGNORE', $db_1->f(chaptername)); //章节名称
		$postdate = $db_1->f(postdate);
		$lastupdate = $db_1->f(lastupdate);//最后更新时间
		$chapterorder = $db_1->f(chapterorder); //排序
		$size = round($db_1->f(size)/2,0); //章节内容大小
		$chaptertype = $db_1->f(chaptertype); //1是卷0是章节
		$isvip = $i<21?0:1; //1是vip 0不是
	
		if($chaptertype!=1){
			$content="";
			//echo $chaptername.$LF;
			//echo $chapterid.$LF;
			
			$content=$chaptername.$LF.getCont($articleid,$siteid,$chapterid).$LF;
			
			$file = fopen("txt/".$articleid.".txt",'a+');
			fwrite($file,$content);
			fclose($file);
		}
	}
}

$db->free();
mysql_close($db);
// 组合头尾











// 获取内容
function getCont($aid,$siteid,$cid){
	$html="";
	
	$db2 = new DB;
	$sql="select * FROM  jieqi_article_chapter WHERE articleid=".$aid." AND chapterid=".$cid."";
	$db2->query($sql);
	$db2->next_record();
	$isvip = $db2->f(isvip); //1是vip 0不是
	
	$sql="select * FROM  jieqi_obook_ocontent WHERE ochapterid=".$cid." ORDER BY ochapterid ASC LIMIT 0 , 1";
	$db2->query($sql);
	$db2->next_record();
	$ocontent = $db2->f(ocontent); 
	$html=$isvip;
	if($isvip==1){
		$html = iconv('GBK', 'UTF-8//IGNORE',$ocontent);
	}else{
		$file_path = "../../files/article/txt/".$siteid."/".$aid."/".$cid.".txt";
		$html = iconv('GBK', 'UTF-8//IGNORE', file_get_contents($file_path));
	}
	$db2->free();
	mysql_close($db2);
	
	
	//$html=preg_replace("/\s+/","</p><p>",$html);
	//$html=preg_replace("</p>","",$html,1);
	//$html=str_replace("<>","",$html);
	return $html;
}


exit;
?>

 
