<?php
/**
 * 后台小说连载导航配置
 *
 * 后台小说连载导航配置
 * 
 * 调用模板：无
 * 
 * @category   jieqicms
 * @package    article
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: adminmenu.php 187 2008-11-24 09:30:03Z juny $
 */

/**
'layer'     - 菜单深度，默认 0
'caption'   - 菜单标题
'command'   - 链接的网址
'target'    - 点击链接是否打开新窗口(0-不新开；1-新开)
'publish'   - 是否显示（0-不显示；1-显示）
*/

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '参数设置', 'command'=>JIEQI_URL.'/admin/configs.php?mod=article', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '权限管理', 'command'=>JIEQI_URL.'/admin/power.php?mod=article', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '动作参数设置', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/action.php?mod=article', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '权利设置', 'command'=>JIEQI_URL.'/admin/right.php?mod=article', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '生成标签配置', 'command'=>JIEQI_URL.'/admin/tag.php?action=do', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '小说管理', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/article.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '待审核章节', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/draftaudit.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '第三方平台接口', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/articleapi.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '全部草稿列表', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/draftlist.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '包月管理', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/articlebaoyue.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '书评管理', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/reviews.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '作者管理', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/author.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '小说授权', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/articleper.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '催更记录', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/articlehurry.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '处理催更', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/hurrydo.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '签约申请记录', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/articleup.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '单篇采集', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/collect.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '批量采集', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/batchcollect.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '采集配置', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/collectset.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '书评管理', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/reviews.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '作家申请审核', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/applylist.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '章节更新记录', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/chapter.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '搜索关键字', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/searchcache.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '小说删除日志', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/articlelog.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '小说批量生成', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/batchrepack.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '小说批量清理', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/batchclean.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['article'][] = array('layer' => 0, 'caption' => '小说批量替换', 'command'=>$GLOBALS['jieqiModules']['article']['url'].'/admin/batchreplace.php', 'target' => 0, 'publish' => 1);

?>