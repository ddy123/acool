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
use Think\Controller;
use Mobile\Logic\UsersLogic;

class MobileBaseController extends Controller
{
	public $session_id;
	public $cateTrre = array();
	
	public $channelID   = '';
	public $channelType = '';
	public $channelName = '';
	public $secretKey   = '';
	
	/*
	 * 初始化操作
	 */
	public function _initialize()
	{
		$this->session_id = session_id(); // 当前的 session_id
		
		$isweiXinBrower = isWeiXin();
		
		if($isweiXinBrower)
		{
			$pos = strpos($_SERVER['REQUEST_URI'],'?code');
			
			if(ACTION_NAME == 'readChapter' && CONTROLLER_NAME == 'Article' && $pos)
			{
				$_SESSION['readchaptercount'] = 1;
			}
		}
		
//		if(CONTROLLER_NAME != 'LoginApi' &&  ACTION_NAME != 'pay' &&  ACTION_NAME != 'weixinOrderQuery')
//		{
//			file_put_contents('$into_' . ACTION_NAME . '.txt',print_r(ACTION_NAME,true));
//
//			//获取secretkey值
//			$this->getChannelFromSecretkey();
//
//			$this->getWXUserInfo();
//		}
		
		if(CONTROLLER_NAME == 'LoginApi')
		{

		}
		elseif(ACTION_NAME == 'pay')
		{

		}
		elseif(ACTION_NAME == 'weixinOrderQuery')
		{

		}
		else
		{
			//获取secretkey值
			$this->getChannelFromSecretkey();

//			$this->getWXUserInfo();
		}
		
		$this->public_assign();
	}
	
	/**
	 * 保存公告变量到 smarty中 比如 导航
	 */
	public function public_assign()
	{
		$siteTitle = C('WEB_SITE_TITILE');
		
		$isWeiXinBrower = isWeiXin();
		
		$this->assign('isweixin', $isWeiXinBrower);
		
		if($_SESSION['usercode'])
		{
			$isShow = 1;
		}
		else
		{
			$isShow = 0;
		}
		
		$this->assign('isshow',$isShow);
		
		$isweiXinBrower = isWeiXin();
		
//		if($isweiXinBrower)
//		{
//			if(cookie('channel_name'))
//			{
//				$this->assign('site_title', cookie('channel_name'));
//			}
//			else
//			{
//				$this->assign('site_title', $siteTitle);
//			}
//		}
//		else
		{
			$this->assign('site_title', $siteTitle);
		}
	}
	
	/**
	 * 获取相应频道的 热推书
	 * @param $channelID
	 * @return array
	 */
	public function getHotCommendBook($channelID)
	{
		$orderStr = '`showID` ASC';
		
		$tmpBookList = M('app_hotcommend')->where(1)->order($orderStr)->select();
		
		foreach($tmpBookList as $key => $value)
		{
			$tmpHotBook['title']   = $value['title'];
			
			$tmpHotBook['showid']  = $value['id'];
			
			$tmpHotCommendBookList = explode('|',$value['booksID']);
			
			$tmpHotCommendBookList = array_slice($tmpHotCommendBookList,0,4);
			
			$tmpHotBookList        = getBookInfoFromBookList($tmpHotCommendBookList);
			
			$tmpHotBook['booklist'] = $tmpHotBookList;
			
			unset($tmpHotBookList);
			
			$hotBookList[] = $tmpHotBook;
		}
		
		return $hotBookList;
	}
	
	public function getChannelFromSecretkey()
	{
//		if(empty($_COOKIE['channel_id']) || empty($_COOKIE['channel_name']) || empty($_COOKIE['secretkey']) || empty($_COOKIE['channel_type']))
		{
			$secretkeyStr = $_SERVER['QUERY_STRING'];
			
			if($secretkeyStr)
			{
				$serverList = explode('&', $secretkeyStr);
				
				foreach($serverList as $item)
				{
					$itemList = explode('=', $item);
					
					$str      = str_replace('%25','%',$itemList[1]);
					
					$str      = rawurldecode($str);
					
					$result[$itemList[0]] = trim($str);
				}
				
				if($result['channel'] && $result['type'] && $result['channelid'])
				{
					$channelID = M('distribution_channels')->where(array('channelname' => $result['channel'],'secretkey' => $result['secretkey'],'channeltype' => $result['type']))->field('channelid')->find();
					
					cookie('channel_id', $channelID['channelid']);
					
					cookie('channel_name', $result['channel']);
					
					cookie('secretkey', $result['secretkey']);
					
					cookie('channel_type', $result['type']);
					
					$_SESSION['channel_id']   = $channelID['channelid'];
					
					$_SESSION['channel_name'] = $result['channel'];
					
					$_SESSION['secretkey']    = $result['secretkey'];
					
					$_SESSION['channel_type'] = $result['type'];
				}
			}
		}
	}
	
	public function getChannelBySecretkey($channelKey,$channelName,$channelType)
	{
//		if(empty($_COOKIE['channel_id']) || empty($_COOKIE['channel_name']) || empty($_COOKIE['secretkey']) || empty($_COOKIE['channel_type']))
		{
			$channelID = M('distribution_channels')->where(array('channelname' => $channelName,'secretkey' => $channelKey,'channeltype' => $channelType))->field('channelid')->find();
			
			cookie('channel_id', $channelID['channelid']);
			
			cookie('channel_name', $channelName);
			
			cookie('secretkey', $channelKey);
			
			cookie('channel_type', $channelType);
			
			$_SESSION['channel_id']   = $channelName;

			$_SESSION['secretkey']    = $channelKey;
			
			$_SESSION['channel_type'] = $channelType;
		}
	}
	
	/**
	 * 如果是微信用户的话，获取用户的信息
	 */
	public function getWXUserInfo()
	{
		$isWeiXinBrower = isWeiXin();
		
		if($isWeiXinBrower)
		{
			$logic = new UsersLogic();
			
			$pos   = strpos($_SERVER['REQUEST_URI'],'?code');
			
			if($pos)
			{
				$info     = getResonseInfoFromRequesURI();
				
				$code     = $info['code'];
				
				session('usercode',$code);
				
				$_SESSION['usercode'] = $code;
				
				$userInfo = $this->getWXUserInfoByCode($_SESSION['usercode']);
				
				$data     = $logic->thirdLogin($userInfo);
				
				if($data['status'] == 1)
				{
					$user = $data['result'];
					
					cookie('uid',$user['uid']);
					
					$_COOKIE['uid']   = $user['uid'];
					
					$_COOKIE['uname'] = $user['uname'];
					
					cookie('uname',$user['uname']);
					
					$logic->addUserAccessLog();
				}
			}
		}
	}

	public function getWXUserInfoByCode($code)
	{
		$accessTokenURL = "https://api.weixin.qq.com/sns/oauth2/access_token";//通过code获取access_token
		
		$accessTokenURL2 = "https://api.weixin.qq.com/cgi-bin/token";//通过code获取access_token
		
		//		$openidURL = "https://api.weixin.qq.com/sns/userinfo";
		
		$openidURL = "https://api.weixin.qq.com/cgi-bin/user/info";
		
		$weixinPay = C('WEIXIN_APP_PAY_CONF');
		
		$accessTokenParams['appid']      = $weixinPay['appid'];
		$accessTokenParams['secret']     = $weixinPay['opendkey'];
		$accessTokenParams['code']       = $code;
		$accessTokenParams['grant_type'] = 'authorization_code';
		
		$accessTokenUrl  = $accessTokenURL . '?' . http_build_query($accessTokenParams);
		
		$accessTokenInfo = $this->getWxContents($accessTokenUrl);
		
		$accessTokenInfo = json_decode($accessTokenInfo,true);
		
		$accessToken2Params['appid']      = $weixinPay['appid'];
		$accessToken2Params['secret']     = $weixinPay['opendkey'];
		$accessToken2Params['code']       = $code;
		$accessToken2Params['grant_type'] = 'client_credential';
		
		$accessToken2Url  = $accessTokenURL2 . '?' . http_build_query($accessToken2Params);
		
		$accessToken2Info = $this->getWxContents($accessToken2Url);
		
		$accessToken2Info = json_decode($accessToken2Info,true);
		
		//获取用户个人信息（UnionID机制）
		$apiParams['access_token'] = $accessToken2Info['access_token'];
		
		if($accessTokenInfo['openid'])
		{
			$apiParams['openid'] = $accessTokenInfo['openid'];
			
			$_SESSION['code']    = $apiParams['openid'];
			
			$_COOKIE['code']     = $apiParams['openid'];
			
			$apiParams['lang']   = 'zh_CN';
			
			$open_id_url = $openidURL . '?' . http_build_query($apiParams);
			
			$userJson = file_get_contents($open_id_url);
			
			$userInfo = json_decode($userJson,true);
			
			if(isset($userInfo['subscribe']))
			{
				$_SESSION['subscribe'] = $userInfo['subscribe'];
			}
		}
		
		$userInfo['headimgurl'] = $userInfo['headimgurl'] ? $userInfo['headimgurl'] : DEFAULT_FACE_IMG;
		
		$userInfo['nickname']   = $userInfo['nickname'] ? $userInfo['nickname'] : DEFAULT_VISITOR_NICKNAME . date('YmdHis',time());
		
		$resulf =  array
		(
			'uname'    => $userInfo['openid'],//支付宝用户号
			'oauth'    => 'weixinlogin',
			'nickname' => $userInfo['nickname'],
			'head_pic' => $userInfo['headimgurl']
		);
		
		return $resulf;
	}
	
	private function getWxContents($url)
	{
		$ch = curl_init();
		$timeout = 5;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_contents = curl_exec($ch);
		curl_close($ch);
		return $file_contents;
	}
	
	private function testGetWeiXinUserInfo($isweiXinBrower)
	{
//		http://m.kyread.com/User/getWeiXinInfo/backurl/User-index/secretkey/28511ec7dad79ab8/channel/%E5%BE%AE%E4%BF%A1%E6%87%92%E4%BA%BA%E9%98%85%E8%AF%BB/type/%E5%BE%AE%E4%BF%A1.html
		
		if($isweiXinBrower)
		{
			$channelKey  = urldecode(I('secretkey'));
			
			$channelName = urldecode(I('channel'));
			
			$channelType = urldecode(I('type'));
			
			if($channelKey && $channelName && $channelType)
			{
				$this->getChannelBySecretkey($channelKey,$channelName,$channelType);
			}
			
			$backUrl       = I('backurl');
			
			if($channelKey || $channelName || $channelType)
			{
				$_SESSION['authorized_login'] = 0;
			}
			
			$backUrl       = str_replace('-','/',$backUrl);
			
			$weixinPayData = new UsersLogic();
			
			$weixinPayData->testGetWXUserOpenID($backUrl);
		}
	}
}
?>