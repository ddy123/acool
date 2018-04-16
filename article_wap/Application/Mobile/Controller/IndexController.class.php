<?php
/**
 * 免费读书手机网站
 * ============================================================================
 * * 版权所有 2015-2027 河南趣读信息科技有限公司，并保留所有权利。
 * 网站地址: http://www.qudukeji.com
 * ----------------------------------------------------------------------------
 * ============================================================================
 *
 */

namespace Mobile\Controller;
use Think\AjaxPage;
use Think\Page;

class IndexController extends MobileBaseController
{
    public function index()
    {
	    $tmpBookList = M('app_slidebanner')->where(array('channel' => 0))->select();
	
	    $coverList   = explode('|',$tmpBookList[0]['booksCover']);
	    
	    $bookList    = explode('|',$tmpBookList[0]['booksID']);
	    
	    //顶部banner轮播书
	    foreach($bookList as $key => $item)
	    {
	    	$flag = articleExist($item);
	    	
	    	if($flag)
		    {
			    $tmpBook['bookid']    = $item;
			
			    $tmpBook['bookcover'] = $coverList[$key];
			
			    $tmpBook['url']       = U('Article/index',array('id' => $tmpBook['bookid']));
			    
			    $bannerBookList[]     = $tmpBook;
		    }
	    }
	    
	    //获取精选频道的热推书
	    $hotCommondBookList = $this->getHotCommendBook(0);
	
	    $this->assign('slidebannerlist',$bannerBookList);
	    
	    $this->assign('hotcommondbooklist',$hotCommondBookList);
	
	    $this->assign('type',1);
	    
	    $this->display();
	    
	    if(cookie('uid') && cookie('uname'))
	    {
	        $this->addUserAccessLog();
	    }
    }

	/*
	 * 获取相应的热推小说列表
	 */
	public function getHotCommendBookList()
	{
		$showID = I('show_id');
		
		$tmpCommendBook = M('app_hotcommend')->where(array('id' => $showID))->find();
		
		$siteTitle = $tmpCommendBook['title'];
		
		$tmpHotCommendBookList  = explode('|',$tmpCommendBook['booksID']);
		
		$tmpHotBookList         = getBookInfoFromBookList($tmpHotCommendBookList);
		
		$reusltBookList         = $tmpHotBookList;
		
		$this->assign('site_title',$siteTitle);
		
		$this->assign('resultbooklist',$reusltBookList);
		
		$this->display('bookList');
	}
	
	/**
	 * 获取书籍的分类列表
	 */
	public function getSortList()
	{
		$filePath = C('DIR_PATH') . C('SECONDE_SORT_FILE_PATH');
		
		include $filePath;
		
		if(isset($jieqiSort['article']) && $jieqiSort['article'])
		{
			$orderStr = '`lastupdate` DESC';
			
			foreach($jieqiSort['article'] as $key => $value)
			{
				$sortIDList[$key]['sortname'] = iconv('GBK','UTF-8',$value['caption']);
				
				$firstBook = M('article_article')->where(array('sortid' => $key))->order($orderStr)->limit(1)->field('articleid')->select();
				
				$bookInfo = getBookInfoFromBookList($firstBook[0]);
				
				if($bookInfo[0]['cover'])
				{
					$sortIDList[$key]['cover'] = $bookInfo[0]['cover'];
				}
				else
				{
					$sortIDList[$key]['cover'] = C('DEFAULT_ARTICLE_COVER');
				}
			}
		}
		
		$siteTitle = '分类';
		
		$this->assign('site_title',$siteTitle);
		
		$this->assign('resultbooklist',$sortIDList);
		
		$this->assign('type',2);
		
		$this->display('sortList');
	}
	
	public function getBookListFromSortID()
	{
		$sortID    = I('sort_id');
		
		$siteTitle = getSortName($sortID);
		
		$this->assign('site_title',$siteTitle);
		
		$this->assign('sort_id',$sortID);
		
		$order  = I('order_by');
		
		if(!$order)
		{
			$order = 'lastupdate';
		}
		
		$orderBy = "`" . $order . "` DESC";
		
		$count   = M('article_article')->where(array('sortid' => $sortID))->count();
		
		$page    = new Page($count,C('PAGE_SIZE'));
		
		$tmpBookList = M('article_article')->where(array('sortid' => $sortID))->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->field('articleid,articlename,author,size,intro')->select();
		
		$reusltBookList = getBookInfoFromArticleList($tmpBookList);
		
		if($order == 'lastupdate')
		{
			$showType = 1;
		}
		else
		{
			$showType = 2;
		}
		
		$this->assign('show_type',$showType);
		
		$this->assign('order_by',$order);
		
		$this->assign('resultbooklist',$reusltBookList);
		
		$this->assign('page',$page);// 赋值分页输出
		
		if($_GET['is_ajax'])
		{
			$this->display('ajaxBookListFromSortID');
		}
		else
		{
			$this->display('sortBookList');
		}
	}
	
	public function ajaxBookListFromSortID()
	{
		$sortID = I('sort_id');
		
		$order  = I('order_by');
		
		if(!$order)
		{
			$order = 'lastupdate';
		}
		
		$orderBy = "`" . $order . "` DESC";
		
		$count    = M('article_article')->where(array('sortid' => $sortID))->count();

		$page     = new AjaxPage($count,C('PAGE_SIZE'));
		
		$show     = $page->show();
		
		$tmpBookList = M('article_article')->where(array('sortid' => $sortID))->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->field('articleid,articlename,author,size,intro')->select();
		
		$reusltBookList = getBookInfoFromArticleList($tmpBookList);
		
		$this->assign('resultbooklist',$reusltBookList);

		$this->assign('page',$show);// 赋值分页输出

		$this->display();
	}
	
	/**
	 * 获取专题列表
	 */
	public function getTopicList()
	{
		$orderBy   = "`topicID` DESC";
		
		$count     = M('app_topic')->where(1)->count();
		
		$page      = new Page($count,C('PAGE_SIZE'));
		
		$topicList = M('app_topic')->where(1)->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->field('id,cover,summary,title')->select();
		
		$this->assign('topiclist',$topicList);
		
		$siteTitle = '专题';
		
		$this->assign('site_title',$siteTitle);
		
		$this->assign('type',3);
		
		$this->assign('page',$page);// 赋值分页输出
		
		if($_GET['is_ajax'])
		{
			$this->display('ajaxBookListFromSortID');
		}
		else
		{
			$this->display('topicList');
		}
	}
	
	public function ajaxTopicList()
	{
		$orderBy = "`topicID` DESC";
		
		$count     = M('app_topic')->where(1)->count();
		
		$page      = new Page($count,C('PAGE_SIZE'));
		
		$topicList = M('app_topic')->where(1)->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->field('id,cover,title')->select();
		
		$show      = $page->show();
		
		$this->assign('topiclist',$topicList);
		
		$this->assign('page',$show);// 赋值分页输出
		
		$this->display();
	}
	
	public function getBookListFromTopicId()
	{
		$topicID        = I('topic_id');
		
		$topic          = M('app_topic')->where(array('id'  => $topicID))->find();
		
		$siteTitle      = $topic['title'];
		
		$tmpBookList    = explode('|',$topic['booksID']);
		
		$reusltBookList = getBookInfoFromBookList($tmpBookList);
		
		$this->assign('site_title',$siteTitle);
		
		$this->assign('resultbooklist',$reusltBookList);
		
		$this->display('bookList');
	}
	
	public function searchBook()
	{
		$keyWord = I('key_word');
		
		$keyWord = trim($keyWord);
		
		$condition['articlename'] = array("like","%" . $keyWord . "%");
		
		$condition['author']      = array("like","%" . $keyWord . "%");
		
		$condition['_logic'] = 'OR';
		
		$articleList = M('article_article')->where($condition)->field('articleid,articlename,author,size,intro,sortid')->select();
		
		$reusltBookList = getBookInfoFromArticleList($articleList);
		
		foreach($reusltBookList as $key => $value)
		{
			$book['url']                 = $value['url'];
			
			$book['info']['articleid']   = $value['articleid'];
			
			$book['info']['articlename'] = $value['articlename'];
			
			$book['cover']               = $value['cover'];
			
			$book['info']['author']      = $value['author'];
			
			$book['info']['size']        = $value['size'];
			
			$book['info']['sort']        = $value['sort'];
			
			$book['info']['intro']       = $value['intro'];
			
			$reusltBookList[$key]        = $book;
		}
		
		$this->assign('resultbooklist',$reusltBookList);
		
		$this->display('bookList');
	}
	
	/**
	 * 增加用户访问记录
	 */
	private function addUserAccessLog()
	{
		$uid       = cookie('uid');
		
		$channleID = cookie('channel_id');
		
		$todayTime = strtotime(date('Y-m-d'));
		
		$condition['accesstime'] = array('egt',$todayTime);
		
		$condition['uid']        = $uid;
		
		if($channleID)
		{
			$condition['channelid']  = $channleID;
		}
		
		$count = M('distribution_user_access_log')->where($condition)->count();
		
		if(!$count)
		{
			$data['uid']         = $uid;
			
			$data['uname']       = cookie('uname');
			
			$data['channelid']   = cookie('channel_id');
			
			$data['channelname'] = cookie('channel_name');
			
			$data['ip']          = getIP();
			
			$data['accesstime']  = time();
			
			M('distribution_user_access_log')->add($data);
		}
	}
}