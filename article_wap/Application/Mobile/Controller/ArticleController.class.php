<?php
/**
 * 免费读书手机网站
 * ======================================================================
 * * 版权所有 2015-2027 河南趣读信息科技有限公司，并保留所有权利。
 * 网站地址: http://www.qudukeji.com
 * ----------------------------------------------------------------------------
 * ======================================================================
 *
 */

namespace Mobile\Controller;

use Mobile\Logic\ArticleLogic;

use Think\Page;

class ArticleController extends MobileBaseController
{
    public function index()
    {
        $articleID = I('get.id');
	
        $article   = M('article_article')->where(array('articleid' =>  $articleID))->find();
        $articles   = M('distribution_obook_obook')->where(array('articleid' =>  $articleID))->find();
        $num=1;
        $data['allvisit'] =$articles['allvisit']+$num ;
        M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);

        //        日点击计算
        $day=date("d",time());
        if(!empty($articles['daydate'])){

            if ($day ==$articles['daydate'] ){
                $data['dayvisit'] =$articles['dayvisit']+$num ;
                M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);
            }else{
                $data['dayvisit'] = $num;
                $data['daydate']=$day;
                M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);
            }
        }else{
            $data['dayvisit'] = $num;
            $data['daydate']=$day;
            M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);
        }

        //周点击计算
        $week=date("W",time());
        if(!empty($articles['weekdate'])){

            if ($week ==$articles['weekdate'] ){
                $data['weekvisit'] =$articles['weekvisit']+$num ;
                M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);
            }else{
                $data['weekvisit'] = $num;
                $data['weekdate']=$week;
                M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);
            }
        }else{
            $data['weekvisit'] = $num;
            $data['weekdate']=$week;
            M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);
        }

        //月点击计算
        $month=date("m",time());
        if(!empty($articles['monthdate'])){
            if ($month ==$articles['monthdate'] ){
                $data['monthvisit'] =$articles['monthvisit']+$num ;
                M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);
            }else{
                $data['monthvisit'] = $num;
                $data['monthdate']=$month;
                M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);
            }
        }else{
            $data['monthvisit'] = $num;
            $data['monthdate']=$month;
            M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);
        }
        
        $bookInfo = getBookInfoFromArticleInfo($article);
	
        $this->assign('book_info',$bookInfo);
        
        $this->display();
        
        $this->insertObookInfo($articleID);
    }
	
	/**
	 * 插入和更新jieqi_distribution_obook_obook和jieqi_distribution_obook_ochapter，便于后期统计书籍销售情况
	 *
	 * @param $articleID
	 */
    private function insertObookInfo($articleID)
    {
    	$articleLogic = new ArticleLogic();
	
	    $articleLogic->insertObooKInfo($articleID);
    }
    
    /**
     * 书籍目录
     */
    public function getDirectory()
    {
    	$articleID = I('id');
	
    	$orderBy   = "`chapterorder` ASC";
	
	    $count     = M('article_chapter')->where(array('articleid' => $articleID))->count();
	
	    $page      = new Page($count,C('PAGE_SIZE'));
    	
        $list = M('article_chapter')->where(array('articleid' => $articleID))->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->select();
        
	    $this->assign('chapterlist',$list);// 赋值分页输出
	
	    $this->assign('bookid',$list[0]['articleid']);//书籍id
	
	    $this->assign('bookname',$list[0]['articlename']);//书籍id
	    
	    $this->assign('page',$page);// 赋值分页输出
	
	    if($_GET['is_ajax'])
	    {
		    $this->display('ajaxBookListFromSortID');
	    }
	    else
	    {
		    $this->display();
	    }
    }
    
    public function ajaxDirectoryList()
    {
	    $articleID = I('articleid');
	
	    $count     = M('article_chapter')->where(array('articleid' => $articleID))->count();
	
	    $page      = new Page($count,C('PAGE_SIZE'));
	
	    $orderBy   = "`chapterorder` ASC";
	
	    $list      = M('article_chapter')->where(array('articleid' => $articleID))->order($orderBy)->limit($page->firstRow . ',' . $page->listRows)->select();
	
	    $show      = $page->show();
	
	    $this->assign('bookid',$list[0]['articleid']);//书籍id
	
	    $this->assign('bookname',$list[0]['articlename']);//书籍id
	
	    $this->assign('chapterlist',$list);// 赋值分页输出
	
	    $this->assign('page',$show);// 赋值分页输出
	
	    $this->display();
    }
    
    public function readChapter()
    {
	    $flag = $this->getUserReadChapterCount();

        $articleID = I('book_id');
        $articles   = M('distribution_obook_obook')->where(array('articleid' =>  $articleID))->find();
        $num=1;
        $data['allvisit'] =$articles['allvisit']+$num ;
        M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);

        //        日点击计算
        $day=date("d",time());
        if(!empty($articles['daydate'])){

            if ($day ==$articles['daydate'] ){
                $data['dayvisit'] =$articles['dayvisit']+$num ;
                M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);
            }else{
                $data['dayvisit'] = $num;
                $data['daydate']=$day;
                M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);
            }
        }else{
            $data['dayvisit'] = $num;
            $data['daydate']=$day;
            M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);
        }

        //周点击计算
        $week=date("W",time());
        if(!empty($articles['weekdate'])){

            if ($week ==$articles['weekdate'] ){
                $data['weekvisit'] =$articles['weekvisit']+$num ;
                M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);
            }else{
                $data['weekvisit'] = $num;
                $data['weekdate']=$week;
                M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);
            }
        }else{
            $data['weekvisit'] = $num;
            $data['weekdate']=$week;
            M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);
        }

        //月点击计算
        $month=date("m",time());
        if(!empty($articles['monthdate'])){
            if ($month ==$articles['monthdate'] ){
                $data['monthvisit'] =$articles['monthvisit']+$num ;
                M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);
            }else{
                $data['monthvisit'] = $num;
                $data['monthdate']=$month;
                M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);
            }
        }else{
            $data['monthvisit'] = $num;
            $data['monthdate']=$month;
            M('distribution_obook_obook')->where(array('articleid' => $articleID))->save($data);
        }
        
	    if($flag)
	    {
		    $articleID   = I('book_id');
		
		    $chapterID   = I('chapter_id');
		
		    $chapterInfo = M('article_chapter')->where(array('chapterid' => $chapterID,'display' => 0))->field('articleid,articlename,chapterid,chaptername,summary,isvip,lastupdate,poster,size,chapterorder')->find();
		
		    $this->addBookCaseChapterInfo($articleID,$chapterID);
		
		    $author      = M('article_article')->where(array('articleid' => $articleID))->field('author')->find();
		
		    $chapterInfo['author']      = $author['author'];
		
		    $chapterInfo['prechapter']  = $this->getContextChapterID($chapterInfo['chapterorder'],$chapterInfo['articleid'],-1);
		
		    $chapterInfo['nextchapter'] = $this->getContextChapterID($chapterInfo['chapterorder'],$chapterInfo['articleid'],1);
			$chapterInfo['cover']=getBookCoverUrl($articleID);
		
		    if($chapterInfo['isvip'] == 0)//免费章节
		    {
			    $content = getChapterContent($articleID,$chapterID);
			
			    if($content != -1)
			    {
				    $chapterInfo['content'] = $content;
				
				    $chapterInfo['size']    = intval($chapterInfo['size'] / 2);
				
				    $this->assign('chapter',$chapterInfo);
				
				    $this->display();
			    }
		    }
		    else//付费章节
		    {
			    $articleLogic = new ArticleLogic();
			
			    $buyFlag = $articleLogic->getUserOChapterByChapterID($articleID,$chapterID);
			
			    if($buyFlag)
			    {
				    $content = getChapterContent($articleID,$chapterID);
				
				    if($content != -1)
				    {
					    $chapterInfo['content'] = $content;
					
					    $chapterInfo['size']    = intval($chapterInfo['size'] / 2);
					
					    $this->assign('chapter',$chapterInfo);
					
					    $this->display('readChapter');
				    }
			    }
			    else
			    {
				    $flag = $this->autoBuyVipChapter($articleID,$chapterID);
				
				    //是否自动购买
				    if($flag)
				    {
					    $content = getChapterContent($articleID,$chapterID);
					
					    if($content != -1)
					    {
						    $chapterInfo['content'] = $content;
						
						    $chapterInfo['size']    = intval($chapterInfo['size'] / 2);
						
						    $this->assign('chapter',$chapterInfo);
						
						    $this->display('readChapter');
					    }
				    }
				    elseif($flag == -1)
				    {
					    $this->error('余额不足，自动购买失败，请充值！',U('User/buyEgold'));
				    }
				    else
				    {
					    $chapterInfo['size'] = intval($chapterInfo['size'] / 2);
					
					    $this->assign('chapter',$chapterInfo);
					
					    $this->display('readVipChapter');
				    }
			    }
		    }
	    }
	    else
	    {
		    header("Location:" . C('FORCED_ATTENTION_URL'));
	    }
    }
	
	/**
	 * @param $chapterID
	 * @param $bookID
	 * @param $direction -1是向前查找，1是向后查找
	 * @return mixed
	 */
    public function getContextChapterID($chapterOrder,$bookID,$direction)
    {
    	if($direction == 1)
	    {
		    $condition['chapterorder'] = array("gt",$chapterOrder);
		
		    $order                     = '`chapterorder` ASC';
	    }
	    else
	    {
		    $condition['chapterorder'] = array("lt",$chapterOrder);
		
		    $order                     = '`chapterorder` DESC';
	    }
	
	    $condition['articleid'] = $bookID;
	
	    $condition['size']      = array('neq',0);
	
	    $condition['_logic']    = 'AND';
	    
	    $chapter = M('article_chapter')->where($condition)->field('chapterid')->order($order)->select();
	
	    $chapterID = $chapter[0]['chapterid'];
	    
	    if(!$chapterID)
	    {
		    $chapterID = -1;
	    }
	    
        return 	$chapterID;
    }
	
    public function buyVipChapter()
    {
    	if($_COOKIE['uid'] > 0)
	    {
		    $articleID    = I('book_id');
		
		    $chapterID    = I('chapter_id');
		
		    $chapterInfo  = M('article_chapter')->where(array('chapterid' => $chapterID))->field('chaptername,chapterorder,articlename')->find();
		
		    $articleLogic = new ArticleLogic();
		
		    $buyList      = $articleLogic->showBuyInfo($articleID,$chapterInfo['chapterorder']);
		
		    $buyIndex     = I('buy_index');
		
		    $userBuyInfo  = $buyList[$buyIndex];
		
		    $userInfo     = $articleLogic->getUserInfo();
		
		    if($userInfo['egold'] >= $userBuyInfo['totalprice'])
		    {
		    	$payEgold = $userBuyInfo['totalprice'];
		    	
			    $flag     = $this->deductFromUser($_COOKIE['uid'],$payEgold);
			
			    //扣用户钱
			    if($flag)//扣钱成功
			    {
					//添加用户的详细购买信息
				    $flag = $this->addUserBuyInfo($articleID,$chapterInfo['articlename'],$userBuyInfo);
				    
				    if($flag)
				    {
					    $alertMsg = iconv('utf-8','gbk','购买成功！') ;
					    
					    echo ("<script> alert('" . $alertMsg . "'); window.location.href='" . U('Article/readChapter',array('book_id' => $articleID ,'chapter_id' => $chapterID)) ."'; </script>");
					
					    exit();
				    }
				    else
				    {
					    $alertMsg = iconv('utf-8','gbk','支付失败！') ;
					
					    echo ("<script> alert('" . $alertMsg . "'); </script>");
					
					    exit();
				    }
			    }
			    else//扣钱失败
			    {
				    $alertMsg = iconv('utf-8','gbk','支付失败！') ;
				
				    echo ("<script> alert('" . $alertMsg . "'); </script>");
				
				    exit();
			    }
		    }
		    else
		    {
			    $alertMsg = iconv('utf-8','gbk','余额不足，请充值！') ;
			
			    echo ("<script> alert('" . $alertMsg . "'); window.location.href='" . U('User/buyEgold') ."'; </script>");
			
			    exit();
		    }
	    }
	    else
	    {
		    $alertMsg = iconv('utf-8','gbk','请登录！') ;
		
		    echo ("<script> alert('" . $alertMsg . "'); window.location.href='" . U('User/login') ."'; </script>");
	    	
		    exit();
	    }
    }

	public function userBuyChapter()
	{
		if($_COOKIE['uid'] > 0)
		{
			$articleID    = I('get.book_id');

			$chapterID    = I('get.chapter_id');

			$chapterInfo  = M('article_chapter')->where(array('chapterid' => $chapterID))->field('chaptername,chapterorder')->find();
			
			$articleLogic = new ArticleLogic();

			$buyList      = $articleLogic->showBuyInfo($articleID,$chapterInfo['chapterorder']);
			
			$userInfo     = $articleLogic->getUserInfo();

			$this->assign('userbalance',$userInfo['egold']);

			$eglodName = C('DEFAULT_EGOLD_NAME');

			$this->assign('eglodname',$eglodName);

			$this->assign('chaptername',$chapterInfo['chaptername']);

			$this->assign('buylist',$buyList);

			$data = $this->fetch("showBuyInfo");
			
			echo json_encode_ex(array('status' => 1 ,'url' => $data));
			
			return;
		}
		else
		{
			echo json_encode_ex(array('status' => -1 ,'url' => U('User/login')));

			return;
		}
	}
	
	/**
	 * 购买vip章节的时候，扣用户的钱
	 *
	 * @param $authorID
	 * @param $egold
	 * @return bool
	 */
	private function deductFromUser($userID,$egold)
	{
		if($userID)
		{
			$userOldInfo   = M('distribution_system_users')->where(array('uid' => $userID))->find();
			
			$data['egold'] = $userOldInfo['egold'] - $egold;
			
			$authorInfo    = M('distribution_system_users')->where(array('uid' => $userID))->save($data);
			
			if($authorInfo)
			{
				$flag = true;
			}
			else
			{
				$flag = false;
			}
		}
		else
		{
			$flag = true;
		}
		
		return $flag;
	}
	
	/**
	 * 添加用户购买信息
	 *
	 * @param $articleID
	 * @param $articleName
	 * @param $buyInfo
	 * @return bool|mixed
	 */
	private function addUserBuyInfo($articleID,$articleName,$buyInfo)
	{
		if($buyInfo)
		{
			$autoBuy = I('auto_buy');
			
			if($buyInfo['buychapterlist'] && $buyInfo['buychapterpricelist'])
			{
				foreach($buyInfo['buychapterlist'] as $chapterID => $chapterName)
				{
					$buyData['buytime']     = time();
					$buyData['userid']      = $_COOKIE['uid'];
					$buyData['username']    = $_COOKIE['uname'];
					$buyData['articleid']   = $articleID;
					$buyData['ochapterid']  = $chapterID;
					$buyData['obookname']   = $articleName;
					$buyData['chaptername'] = $chapterName;
					$buyData['buyprice']    = $buyInfo['buychapterpricelist'][$chapterID];
					$buyData['buynum']      = 1;
					$buyData['autobuy']     = $autoBuy;
					$buyData['channelid']   = cookie('channel_id');
					$buyData['channeltype'] = cookie('channel_type');
				
					$flag = M('distribution_obook_obuyinfo')->add($buyData);
					
					if($flag)
					{
						$ochapterInfo = M('distribution_obook_ochapter')->where(array('chapterid' => $chapterID))->find();
						
						$ochapterData['salenum'] = $ochapterInfo['salenum'] + 1;
						
						$ochapterData['sumegold'] = $ochapterInfo['sumegold'] + $buyInfo['buychapterpricelist'][$chapterID];
						
						$flag = M('distribution_obook_ochapter')->where(array('chapterid' => $chapterID))->save($ochapterData);
						
						$OldBookData = M('distribution_obook_obook')->where(array('articleid' => $ochapterInfo['articleid']))->find();
						
						$bookData['sumegold'] = $OldBookData['sumegold'] + $buyData['buyprice'];
						
						$bookData['sumsale']  = $OldBookData['sumsale'] + $buyData['buyprice'];
						
						M('distribution_obook_obook')->where(array('articleid' => $ochapterInfo['articleid']))->save($bookData);
					}
					else
					{
						return false;
					}
				}
				
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	
	/**
	 * 根据章节信息增加用户的购买信息
	 *
	 * @param $chapterID
	 * @param $autoBuy
	 * @return bool|mixed
	 *
	 */
	private function addUserBuyInfoByChapterID($chapterID,$autoBuy)
	{
		$chapterInfo = M('article_chapter')->where(array('chapterid' => $chapterID))->find();
		
		if($chapterInfo)
		{
			$buyData['buytime']     = time();
			$buyData['userid']      = $_COOKIE['uid'];
			$buyData['username']    = $_COOKIE['uname'];
			$buyData['articleid']   = $chapterInfo['articleid'];
			$buyData['ochapterid']  = $chapterInfo['chapterid'];;
			$buyData['obookname']   = $chapterInfo['articlename'];
			$buyData['chaptername'] = $chapterInfo['chaptername'];
			$buyData['buyprice']    = $chapterInfo['saleprice'];;
			$buyData['buynum']      = 1;
			$buyData['autobuy']     = $autoBuy;
			$buyData['channelid']   = cookie('channel_id');
			$buyData['channeltype'] = cookie('channel_type');
			
			$flag = M('distribution_obook_obuyinfo')->add($buyData);
			
			if($flag)
			{
				$ochapterInfo = M('distribution_obook_ochapter')->where(array('chapterid' => $chapterID))->find();
				
				$ochapterData['salenum']  = $ochapterInfo['salenum'] + 1;
				
				$ochapterData['sumegold'] = $ochapterInfo['sumegold'] + $buyData['buyprice'];
				
				$flag = M('distribution_obook_ochapter')->where(array('chapterid' => $chapterID))->save($ochapterData);
				
				$OldBookData = M('distribution_obook_obook')->where(array('articleid' => $ochapterInfo['articleid']))->find();
				
				$bookData['sumegold'] = $OldBookData['sumegold'] + $buyData['buyprice'];
				
				$bookData['sumsale']  = $OldBookData['sumsale'] + $buyData['buyprice'];
				
				M('distribution_obook_obook')->where(array('articleid' => $ochapterInfo['articleid']))->save($bookData);
				
				return $flag;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * 自动购买vip章节
	 *
	 * @param $articleID
	 * @param $chapterID
	 * @return bool|int
	 */
	private function autoBuyVipChapter($articleID,$chapterID)
	{
		$flag = M('distribution_obook_obuyinfo')->where(array('userid' => $_COOKIE['uid'],'articleid' => $articleID,'autobuy' => 1))->count();
		
		if($flag)
		{
			$chapterInfo = M('article_chapter')->where(array('chapterid' => $chapterID,'isvip' => 1))->find();
			
			if($chapterInfo)
			{
				$payEgold = $chapterInfo['saleprice'];
				
				$articleLogic = new ArticleLogic();
				
				$userInfo     = $articleLogic->getUserInfo();
				
				if($userInfo['egold'] >= $payEgold)
				{
					$flag = $this->deductFromUser($_COOKIE['uid'],$payEgold);
					
					//扣钱成功
					if($flag)
					{
						$flag = $this->addUserBuyInfoByChapterID($chapterID,1);
						
						if($flag)
						{
							return true;
						}
						else
						{
							return false;
						}
					}
					else
					{
						return false;
					}
				}
				else
				{
					return -1;//余额不足，自动购买失败，请充值
				}
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * 增加书架的章节阅读信息
	 */
	public function addBookCaseChapterInfo($articleID,$chapterID)
	{
		$count = M('distribution_article_bookcase')->where(array('userid' => $_COOKIE['uid'],'articleid' => $articleID))->count();
		
		if($count)
		{
			$chapterInfo = M('article_chapter')->where(array('chapterid' => $chapterID))->find();
			
			if(is_array($chapterInfo) && $chapterInfo)
			{
				$bookCaseInfo = M('distribution_article_bookcase')->where(array('userid' => $_COOKIE['uid'],'articleid' => $articleID))->find();
				
				$data['chapterid']    = $chapterID;
				
				$data['chaptername']  = $chapterInfo['chaptername'];
				
				$data['chapterorder'] = $chapterInfo['chapterorder'];
				
				$data['joindate']     = time();
				
				M('distribution_article_bookcase')->where(array('caseid' => $bookCaseInfo['caseid']))->save($data);
			}
		}
		else
		{
			$chapterInfo = M('article_chapter')->where(array('chapterid' => $chapterID))->find();
			
			if(is_array($chapterInfo) && $chapterInfo)
			{
				$data['articleid']    = $chapterInfo['articleid'];
				
				$data['articlename']  = $chapterInfo['articlename'];;
				
				$data['userid']       = $_COOKIE['uid'];
				
				$data['username']     = $_COOKIE['uname'];
				
				$data['chapterid']    = $chapterID;
				
				$data['chaptername']  = $chapterInfo['chaptername'];
				
				$data['chapterorder'] = $chapterInfo['chapterorder'];
				
				$data['joindate']     = time();
				
				M('distribution_article_bookcase')->add($data);
			}
		}
	}
	
	public function readChapterFromBookCase()
	{
		$bookCaseID   = I('bookcase_id');
		
		$bookCaseInfo = M('distribution_article_bookcase')->where(array('caseid' => $bookCaseID))->find();
		
		header("Location:" . U('Article/readChapter',array('book_id' => $bookCaseInfo['articleid'], 'chapter_id' => $bookCaseInfo['chapterid'])));
	}
	
	/**
	 * 判断用户是否可以继续阅读，可以继续阅读则显示章节内容，否则，跳转强制关注页面
	 *
	 * @return bool
	 */
	public function getUserReadChapterCount()
	{
		$flag = true;
		
		$weiXinBrower = isWeiXin();
		
		if($weiXinBrower)
		{
			if(!$_SESSION['subscribe'])
			{
				if($_COOKIE['channel_id'])
				{
					$channelInfo = M('distribution_channels')->where(array('channelid' => $_COOKIE['channel_id']))->find();
					
					if(isset($_SESSION['readchaptercount']))
					{
						if($_SESSION['readchaptercount'] <= $channelInfo['readchaptercount'])
						{
							$_SESSION['readchaptercount']++;
							
							$flag = true;
						}
						else
						{
							$flag = false;
						}
					}
					else
					{
						$_SESSION['readchaptercount'] = 1;
						
						$flag = true;
					}
				}
			}
		}
		
		return $flag;
	}
	
	public function weiXinUserReadChapter()
	{
		$weiXinBrower = isWeiXin();
		
		if($weiXinBrower)
		{
			if(!$_COOKIE['uid'])
			{
				header("Location:" . U('Index/index'));
			}
			else
			{
				$count = M('distribution_article_bookcase')->where(array('userid' => $_COOKIE['uid']))->order('`joindate` DESC')->count();
				
				if($count)
				{
					$bookCaseList              = M('distribution_article_bookcase')->where(array('userid' => $_COOKIE['uid']))->order('`joindate` DESC')->select();
					
					$bookCaseChapterInfo       = $bookCaseList[0];
					
					$curChapterInfo            = M('article_chapter')->where(array('chapterid' => $bookCaseChapterInfo['chapterid']))->find();
					
					$condition['articleid']    = $bookCaseChapterInfo['articleid'];
					
					$condition['chapterorder'] = array('gt',$curChapterInfo['chapterorder']);
					
					$nextChapaterInfoList      = M('article_chapter')->where($condition)->select();
					
					if(is_array($nextChapaterInfoList) && $nextChapaterInfoList)
					{
						$nextChapaterInfo = $nextChapaterInfoList[0];
					
						header("Location:" . U('Article/readChapter',array('book_id' => $nextChapaterInfo['articleid'], 'chapter_id' => $nextChapaterInfo['chapterid'])));
					}
					else
					{
						header("Location:" . U('Index/index'));
					}
				}
				else
				{
					header("Location:" . U('Index/index'));
				}
			}
		}
	}
}