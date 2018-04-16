<?php
$jieqiBlocks['0'] = array (
  'bid' => 0,
  'blockname' => '作者作品',
  'module' => 'article',
  'filename' => 'block_aarticles',
  'classname' => 'BlockArticleAarticles',
  'side' => -1,
  'title' => '',
  'vars' => 'lastupdate,5,0,$author',
  'template' => 'info_aarticles.html',
  'contenttype' => 4,
  'custom' => 0,
  'publish' => 3,
  'hasvars' => 1,
  'showtype' => 0,
);
$jieqiBlocks['1'] = array (
  'bid' => 0,
  'blockname' => '粉丝排行榜',
  'module' => 'article',
  'filename' => 'block_credit',
  'classname' => 'BlockArticleCredit',
  'side' => '-1',
  'title' => '',
  'vars' => 'point,10,0,id',
  'template' => 'info_credit.html',
  'contenttype' => 4,
  'custom' => 0,
  'publish' => '3',
  'hasvars' => 1,
  'showtype' => 0,
);
$jieqiBlocks['2'] = array (
  'bid' => 0,
  'blockname' => '我的粉丝值',
  'module' => 'article',
  'filename' => 'block_mycredit',
  'classname' => 'BlockArticleMycredit',
  'side' => -1,
  'title' => '我的粉丝值',
  'vars' => 'id',
  'template' => 'block_mycredit.html',
  'contenttype' => 4,
  'custom' => 0,
  'publish' => 3,
  'hasvars' => 1,
  'showtype' => 0,
);
$jieqiBlocks['3'] = array (
  'bid' => 0,
  'blockname' => '热门推荐',
  'module' => 'article',
  'filename' => 'block_articlelist',
  'classname' => 'BlockArticleArticlelist',
  'side' => '-1',
  'title' => '',
  'vars' => 'size,8,0,0,0,0',
  'template' => 'info_tuijian.html',
  'contenttype' => 4,
  'custom' => 0,
  'publish' => '3',
  'hasvars' => 1,
  'showtype' => 0,
);
$jieqiBlocks['4'] = array (
  'bid' => 0,
  'blockname' => '新书榜',
  'module' => 'article',
  'filename' => 'block_articlelist',
  'classname' => 'BlockArticleArticlelist',
  'side' => '-1',
  'title' => '',
  'vars' => 'monthvisit,10,0,0,0,0',
  'template' => 'yc_tuijian.html',
  'contenttype' => 4,
  'custom' => 0,
  'publish' => '3',
  'hasvars' => 1,
  'showtype' => 0,
);
$jieqiBlocks['5'] = array (
  'bid' => 0,
  'blockname' => '最后六章',
  'module' => 'article',
  'filename' => 'block_achapters',
  'classname' => 'BlockArticleAchapters',
  'side' => -1,
  'title' => '',
  'vars' => '0,6,2,$articleid,1',
  'template' => 'info_zj.html',
  'contenttype' => 4,
  'custom' => 0,
  'publish' => 3,
  'hasvars' => 1,
  'showtype' => 0,
);
$jieqiBlocks['6'] = array (
  'bid' => 0,
  'blockname' => '最前六章',
  'module' => 'article',
  'filename' => 'block_achapters',
  'classname' => 'BlockArticleAchapters',
  'side' => -1,
  'title' => '',
  'vars' => '0,6,1,$articleid,1',
  'template' => 'info_zj.html',
  'contenttype' => 4,
  'custom' => 0,
  'publish' => 3,
  'hasvars' => 1,
  'showtype' => 0,
);
$jieqiBlocks['7'] = array (
  'bid' => 0,
  'blockname' => '最新评论',
  'module' => 'article',
  'filename' => 'block_areviews',
  'classname' => 'BlockArticleAreviews',
  'side' => -1,
  'title' => '',
  'vars' => '10,0,0,id',
  'template' => 'info_pinglun.html',
  'contenttype' => 4,
  'custom' => 0,
  'publish' => 3,
  'hasvars' => 1,
  'showtype' => 0,
);
$jieqiBlocks['8'] = array (
  'bid' => 0,
  'blockname' => '最新状态',
  'module' => 'article',
  'filename' => 'block_actlog',
  'classname' => 'BlockArticleActlog',
  'side' => -1,
  'title' => '',
  'vars' => 'actlogid,30,0,id',
  'template' => 'block_actlog.html',
  'contenttype' => 4,
  'custom' => 0,
  'publish' => 3,
  'hasvars' => 1,
  'showtype' => 0,
);

?>