<?php
/**
 * 趣读商城
 * ============================================================================
 * * 版权所有 2015-2027 河南趣读信息科技有限公司，并保留所有权利。
 * 网站地址: http://www.qudukeji.com
 *
 * 小说接口类
 * ----------------------------------------------------------------------------
 * ============================================================================
 */

namespace Admin\Controller;
use Admin\Model\BookModel;
use Admin\Model\ChapterDataModel;
use Admin\Model\ZiycwDataModel;
use Think\AjaxPage;
use Admin\Model\BookDataModel;

class ApiController extends BaseController
{
	/**
	 * 接口列表
	 */
    public function apiList()
    {
    	$apiTypeID = I('apitype');

	    $apiType[0] = array('name' =>'书籍分类接口','action' => U('Api/apiBookList'));

	    $apiType[1] = array('name' =>'书籍列表接口','action' => U('Api/apiBookList'));

	    $apiType[2] = array('name' =>'书籍详情接口','action' => U('Api/apiBookList'));

	    $apiType[3] = array('name' =>'章节列表接口','action' => U('Api/apiBookList'));

	    $apiType[4] = array('name' =>'章节内容接口','action' => U('Api/apiBookList'));

	    $this->assign('apiname',$apiType[$apiTypeID]['name']);
	
	    $this->assign('apitypeid',$apiTypeID);

	    $this->display();
    }
	
	/**
	 * 加载接口列表
	 */
	public function ajaxApiList()
	{
		$keyWord   = I('key_word');
		
		$apiTypeID = I('apitypeid');
		
		$count     = M('shumeng_apis')->where(array('apitype' => $apiTypeID,array('channelname' => array('like','%' . $keyWord . '%'))))->count();
		
		$Page      = new AjaxPage($count,10);
		
		$show      = $Page->show();
		
		$orderStr  = "`{$_POST['orderby1']}` {$_POST['orderby2']}";
		
		$apiList = M('shumeng_apis')->where(array('apitype' => $apiTypeID,array('channelname' => array('like','%' . $keyWord . '%'))))->limit($Page->firstRow . ',' . $Page->listRows)->order($orderStr)->select();
		
		$this->assign('apilist',$apiList);
		
		$this->assign('apitypeid',$apiTypeID);
		
		$this->assign('page',$show);
		
		$this->display();
	}
    
	/**
	 * 添加/编辑接口
	 */
    public function addEditApi()
    {
    	if(cookie('uid') && cookie('permissions') == 1)
	    {
		    $apiType[0] = array('name' =>'书籍分类接口','action' => U('Api/apiList' , array('apitype' => 0)));
		
		    $apiType[1] = array('name' =>'书籍列表接口','action' => U('Api/apiList' , array('apitype' => 1)));
		
		    $apiType[2] = array('name' =>'书籍详情接口','action' => U('Api/apiList' , array('apitype' => 2)));
		
		    $apiType[3] = array('name' =>'章节列表接口','action' => U('Api/apiList' , array('apitype' => 3)));
		
		    $apiType[4] = array('name' =>'章节内容接口','action' => U('Api/apiList' , array('apitype' => 4)));
		
		
		    $action = I('action');
		
		    if(!$action)
		    {
			    $action = 'add';
		    }
		
		    $channelList = M('shumeng_channels')->where('1=1')->select();
		
		    $apiID   = I('id');
		
		    $apiInfo = M('shumeng_apis')->where(array('id' => $apiID))->find();
		
		    if(($_GET['is_ajax'] == 1) && IS_POST)
		    {
			    $action = trim(I('action'));
			
			    if($action == 'add')
			    {
				    $channelID   = trim(I('channelid'));
				
				    $channelInfo = M('shumeng_channels')->where(array('id' => $channelID))->find();
				
				    $apiTypeID   = trim(I('apitypeid'));
				
				    $apiTypeName = $apiType[$apiTypeID]['name'];
				
				    $count = M('shumeng_apis')->where(array('channelid' => $channelInfo['id'],'apitype' => $apiTypeID))->count();
				
				    if($count)
				    {
					    $return_arr = array
					    (
						    'status' => '0',
						    'msg'    => '存在该渠道的' . $apiTypeName . '接口，请选择相应的接口进行修改！',
						    'data'   => array('url' => $apiType[$apiTypeID]['action'])
					    );
				    }
				    else
				    {
					    $apiData['channelid']   = $channelInfo['id'];
					
					    $apiData['channelname'] = $channelInfo['channelname'];
					
					    $apiData['apitype']     = $apiTypeID;
					
					    $apiData['api']         = I('channelapi');
					
					    $apiData['posttime']    = time();
					
					    $flag = M('shumeng_apis')->add($apiData);
					
					    if($flag)
					    {
						    $return_arr = array
						    (
							    'status' => '1',
							    'msg'    => '添加成功',
							    'data'   => array('url' => $apiType[$apiTypeID]['action'])
						    );
					    }
					    else
					    {
						    $return_arr = array
						    (
							    'status' => '0',
							    'msg'    => '添加失败',
							    'data'   => array('url' => $apiType[$apiTypeID]['action'])
						    );
					    }
				    }
			    }
			    elseif($action == 'edit')
			    {
				    $apiData['id']       = trim(I('apiid'));
				
				    $apiData['api']      = I('channelapi');
				
				    $apiData['posttime'] = time();
				
				    $flag                = M('shumeng_apis')->save($apiData);
				
				    $apiTypeID           = M('shumeng_apis')->where(array('id' => $apiData['id']))->getField('apitype');
				
				    if($flag)
				    {
					    $return_arr = array
					    (
						    'status' => '1',
						    'msg'    => '修改成功',
						    'data'   => array('url' => $apiType[$apiTypeID]['action'])
					    );
				    }
				    else
				    {
					    $return_arr = array
					    (
						    'status' => '0',
						    'msg'    => '修改失败',
						    'data'   => array('url' => $apiType[$apiTypeID]['action'])
					    );
				    }
			    }
			
			    $this->ajaxReturn(json_encode($return_arr));
		    }
		
		    $this->assign('channellist',$channelList);
		
		    $this->assign('apitypelist',$apiType);
		
		    $this->assign('apiinfo',$apiInfo);
		
		    $this->assign('apiname',$apiType[$apiInfo['apitype']]['name']);
		
		    $this->assign('action',$action);
		
		    $this->display();
	    }
	    else
	    {
		    $this->display('Admin/Login');
	    }
    }
	
	/**
	 * 删除接口
	 */
    public function delApi()
    {
    	if(cookie('uid') && cookie('permissions') == 1)
	    {
		    $apiID   = I('id');
		
		    $apiType = I('apitype');
		
		    $apiType[0] = array('name' =>'书籍分类接口','action' => U('Api/ajaxApiList' , array('apitypeid' => 0)));
		
		    $apiType[1] = array('name' =>'书籍列表接口','action' => U('Api/ajaxApiList' , array('apitypeid' => 1)));
		
		    $apiType[2] = array('name' =>'书籍详情接口','action' => U('Api/ajaxApiList' , array('apitypeid' => 2)));
		
		    $apiType[3] = array('name' =>'章节列表接口','action' => U('Api/ajaxApiList' , array('apitypeid' => 3)));
		
		    $apiType[4] = array('name' =>'章节内容接口','action' => U('Api/ajaxApiList' , array('apitypeid' => 4)));
		
		    $flag  = M('shumeng_apis')->where(array('id' => $apiID))->delete();
		
		    if($flag)
		    {
			    $return_arr = array
			    (
				    'status' => '1',
				    'msg'    => '删除成功',
				    'data'   => array('url' => $apiType[$apiType]['action'])
			    );
		    }
		    else
		    {
			    $return_arr = array
			    (
				    'status' => '0',
				    'msg'    => '删除失败',
				    'data'   => array('url' => $apiType[$apiType]['action'])
			    );
		    }
		
		    $this->ajaxReturn(json_encode($return_arr));
	    }
	    else
	    {
		    $this->display('Admin/Login');
	    }
    }
	
	/**
	 * 调用接口列表
	 */
	public function callApiList()
	{
		$this->display();
	}
	
	/**
	 * 接口列表
	 */
	public function ajaxCalApiList()
	{
		if(cookie('uid') && cookie('permissions') == 1)
		{
			$keyWord   = I('key_word');
			
			$count     = M('shumeng_channels')->where( array('channelname' => array('like','%' . $keyWord . '%')))->count();
			
			$Page      = new AjaxPage($count,10);
			
			$show      = $Page->show();
			
			$orderStr  = "`{$_POST['orderby1']}` {$_POST['orderby2']}";
			
			$apiList = M('shumeng_channels')->where(array('channelname' => array('like','%' . $keyWord . '%')))->limit($Page->firstRow . ',' . $Page->listRows)->order($orderStr)->select();
			
			$this->assign('apilist',$apiList);
			
			$this->assign('page',$show);
			
			$this->display();
		}
		else
		{
			$this->display('Admin/Login');
		}
	}
	
	/**
	 * 调用接口
	 */
	public function callApi()
	{
		if(cookie('uid') && cookie('permissions') == 1)
		{
			$channelID   = M('shumeng_channels')->where(array('uid' => cookie('uid')))->getField('id');
			
			$apiType[0] = array('name' =>'书籍分类接口','action' => U('Api/apiList' , array('apitype' => 0)));
			
			$apiType[1] = array('name' =>'书籍列表接口','action' => U('Api/apiList' , array('apitype' => 1)));
			
			$apiType[2] = array('name' =>'书籍详情接口','action' => U('Api/apiList' , array('apitype' => 2)));
			
			$apiType[3] = array('name' =>'章节列表接口','action' => U('Api/apiList' , array('apitype' => 3)));
			
			$apiType[4] = array('name' =>'章节内容接口','action' => U('Api/apiList' , array('apitype' => 4)));
			
			$channelInfo = M('shumeng_channels')->where(array('id' => $channelID))->find();
			
			$apiList     = M('shumeng_apis')->where(array('channelid' => $channelID))->select();
			
			foreach($apiList as $key => $value)
			{
				$apiList[$key]['apitypename'] = $apiType[$value['apitype']]['name'];
				
				$apiList[$key]['orderid']     = $key + 1;
			}
			
			$this->assign('apicount',count($apiList));
			
			$this->assign('apilist',$apiList);
			
			$this->assign('channelinfo',$channelInfo);
			
			$this->display();
		}
		else
		{
			$this->display('Admin/Login');
		}
	}
	
	/**
	 * ajax调用对接接口
	 */
	public function ajaxCallApi()
	{
		if(cookie('uid') && cookie('permissions') == 1)
		{
			$apiCount  = I('apicount');
			
			$channelID = I('channelid');
			
			$return_arr = array
			(
				'status' => '1',
				'msg'    => '正在进行接口对接，稍后登录网站后天进行书籍的管理！',
				'data'   => array('url' => U('Api/callApiList')),
			);
			
			$this->ajaxReturn(json_encode($return_arr));
		}
		else
		{
			$this->display('Admin/Login');
		}
	}
	
	public function callZiycwApi()
	{
		$callApi = new ZiycwDataModel();
		
		$callApi->run();
	}
	
	public function test()
	{
		echo 'test';
		
		vendor("DbManage",__ROOT__,'.php');
		
		print_var(__ROOT__,'__ROOT__');
		
		
		$backup = new  \DbManage();

//		$backup->test();
	}
	
	public function callZiycwApiUpdate()
	{
		$callApi = new ZiycwDataModel();

		$callApi->updateDB();
	}
	
}