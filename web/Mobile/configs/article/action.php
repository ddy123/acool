<?php
//会员各种动作相关参数设置
//acttitle-动作名称 minscore-多少积分以上才能执行本动作  
//islog-是否记录日志 isreview-是否发书评  isvip-是否VIP动作 ismessage-是否发站内信通知
//ispay-是否有消费  paytitle-消费名称 paybase-消费基数值 paymin-最小消费值 paymax-最大消费值
// earnscore-获得多少个人积分 earncredit-获得多少贡献值 earnvipvote-获得多少月票
//计算公式：获得积分= 实际操作数值 / paybase数值 * earnscore数值

$jieqiAction['article']['articleadd'] = array('acttitle'=>'发表新作', 'minscore'=>0, 'islog'=>0, 'isreview'=>0, 'isvip'=>0, 'ispay'=>0, 'paytitle'=>'', 'paybase'=>1, 'paymin'=>0, 'paymax'=>0, 'earnscore'=>20, 'earncredit'=>0);

$jieqiAction['article']['chapteradd'] = array('acttitle'=>'增加章节', 'minscore'=>0, 'islog'=>0, 'isreview'=>0, 'isvip'=>0, 'ispay'=>0, 'paytitle'=>'', 'paybase'=>1, 'paymin'=>0, 'paymax'=>0, 'earnscore'=>10, 'earncredit'=>10, 'earnvipvote' => '0'); 
  
$jieqiAction['article']['reviewadd'] = array('acttitle'=>'发表书评', 'minscore'=>0, 'islog'=>0, 'isreview'=>0, 'isvip'=>0, 'ispay'=>0, 'paytitle'=>'', 'paybase'=>1, 'paymin'=>0, 'paymax'=>0, 'earnscore'=>1, 'earncredit'=>0);

$jieqiAction['article']['reviewgood'] = array('acttitle'=>'书评精华', 'minscore'=>0, 'islog'=>0, 'isreview'=>0, 'isvip'=>0, 'ispay'=>0, 'paytitle'=>'', 'paybase'=>1, 'paymin'=>0, 'paymax'=>0, 'earnscore'=>3, 'earncredit'=>0);

$jieqiAction['article']['replyadd'] = array('acttitle'=>'发表回复', 'minscore'=>0, 'islog'=>0, 'isreview'=>0, 'isvip'=>0, 'ispay'=>0, 'paytitle'=>'', 'paybase'=>1, 'paymin'=>0, 'paymax'=>0, 'earnscore'=>1, 'earncredit'=>0);

$jieqiAction['article']['rate'] = array('acttitle'=>'小说评分', 'minscore'=>0, 'islog'=>0, 'isreview'=>0, 'isvip'=>0, 'ispay'=>1, 'paytitle'=>'评分票', 'paybase'=>1, 'paymin'=>0, 'paymax'=>0, 'earnscore'=>1, 'earncredit'=>0);

$jieqiAction['article']['poll'] = array('acttitle'=>'小说推荐', 'minscore'=>0, 'islog'=>0, 'isreview'=>0, 'isvip'=>0, 'ispay'=>1, 'paytitle'=>'推荐票', 'paybase'=>1, 'paymin'=>0, 'paymax'=>0, 'earnscore'=>1, 'earncredit'=>0);

$jieqiAction['article']['down'] = array('acttitle'=>'小说下载', 'minscore'=>0, 'islog'=>0, 'isreview'=>0, 'isvip'=>0, 'ispay'=>1, 'paytitle'=>'积分', 'paybase'=>1, 'paymin'=>0, 'paymax'=>0, 'earnscore'=>0, 'earncredit'=>0);

$jieqiAction['article']['flower'] = array('acttitle'=>'投鲜花', 'minscore'=>0, 'islog'=>0, 'isreview'=>0, 'isvip'=>0, 'ispay'=>1, 'paytitle'=>'鲜花', 'paybase'=>1, 'paymin'=>0, 'paymax'=>0, 'earnscore'=>1, 'earncredit'=>0);

$jieqiAction['article']['gifts'] = array('acttitle'=>'送礼物', 'minscore'=>0, 'islog'=>1, 'isreview'=>0, 'isvip'=>1, 'ispay'=>1, 'paytitle'=>'礼物', 'paybase'=>1, 'paymin'=>0, 'paymax'=>0, 'earnscore'=>1, 'earncredit'=>2);

$jieqiAction['article']['redrose'] = array('acttitle'=>'红包', 'minscore'=>0, 'islog'=>1, 'isreview'=>0, 'isvip'=>1, 'ispay'=>1, 'paytitle'=>'红包', 'paybase'=>1, 'paymin'=>0, 'paymax'=>0, 'earnscore'=>1, 'earncredit'=>2);

$jieqiAction['article']['yellowrose'] = array('acttitle'=>'美酒', 'minscore'=>0, 'islog'=>1, 'isreview'=>0, 'isvip'=>1, 'ispay'=>1, 'paytitle'=>'美酒', 'paybase'=>1, 'paymin'=>0, 'paymax'=>0, 'earnscore'=>1, 'earncredit'=>2);

$jieqiAction['article']['bluerose'] = array('acttitle'=>'香囊', 'minscore'=>0, 'islog'=>1, 'isreview'=>0, 'isvip'=>1, 'ispay'=>1, 'paytitle'=>'香囊', 'paybase'=>1, 'paymin'=>0, 'paymax'=>0, 'earnscore'=>1, 'earncredit'=>2);

$jieqiAction['article']['whiterose'] = array('acttitle'=>'钻石', 'minscore'=>0, 'islog'=>1, 'isreview'=>0, 'isvip'=>1, 'ispay'=>1, 'paytitle'=>'钻石', 'paybase'=>1, 'paymin'=>0, 'paymax'=>0, 'earnscore'=>1, 'earncredit'=>2);

$jieqiAction['article']['blackrose'] = array('acttitle'=>'超跑', 'minscore'=>0, 'islog'=>1, 'isreview'=>0, 'isvip'=>1, 'ispay'=>1, 'paytitle'=>'超跑', 'paybase'=>1, 'paymin'=>0, 'paymax'=>0, 'earnscore'=>1, 'earncredit'=>2);

$jieqiAction['article']['greenrose'] = array('acttitle'=>'桂冠', 'minscore'=>0, 'islog'=>1, 'isreview'=>0, 'isvip'=>1, 'ispay'=>1, 'paytitle'=>'桂冠', 'paybase'=>1, 'paymin'=>0, 'paymax'=>0, 'earnscore'=>1, 'earncredit'=>2);

$jieqiAction['article']['egg'] = array('acttitle'=>'扔鸡蛋', 'minscore'=>0, 'islog'=>0, 'isreview'=>0, 'isvip'=>0, 'ispay'=>1, 'paytitle'=>'鸡蛋', 'paybase'=>1, 'paymin'=>0, 'paymax'=>0, 'earnscore'=>1, 'earncredit'=>0);

$jieqiAction['article']['vipvote'] = array('acttitle'=>'投月之钻', 'minscore'=>0, 'islog'=>1, 'isreview'=>0, 'isvip'=>0, 'ispay'=>1, 'paytitle'=>'月之钻', 'paybase'=>1, 'paymin'=>0, 'paymax'=>0, 'earnscore'=>3, 'earncredit'=>1);

$jieqiAction['article']['tip'] = array('acttitle'=>'打赏', 'minscore'=>0, 'islog'=>1, 'isreview'=>1, 'isvip'=>1, 'ispay'=>1, 'paytitle'=>JIEQI_EGOLD_NAME, 'paybase'=>1, 'paymin'=>20, 'paymax'=>0, 'earnscore'=>1, 'earncredit'=>2, 'ismessage'=>0);

$jieqiAction['article']['hurry'] = array('acttitle'=>'催更', 'minscore'=>0, 'islog'=>1, 'isreview'=>1, 'isvip'=>1, 'ispay'=>1, 'paytitle'=>JIEQI_EGOLD_NAME, 'paybase'=>2, 'paymin'=>20, 'paymax'=>0, 'earnscore'=>1, 'earncredit'=>2, 'minhour'=>0, 'ismessage'=>1);  //minhour - 要求提交的催更到期时间至少在当前时间的几个小时以后

$jieqiAction['article']['buychapter'] = array('acttitle'=>'订阅章节', 'minscore'=>0, 'islog'=>1, 'isreview'=>0, 'isvip'=>1, 'ismessage' => '0', 'ispay'=>1, 'paytitle'=>JIEQI_EGOLD_NAME, 'paybase'=>1, 'paymin'=>20, 'paymax'=>0, 'earnscore'=>200, 'earncredit'=>200, 'earnvipvote' => '0');
?>