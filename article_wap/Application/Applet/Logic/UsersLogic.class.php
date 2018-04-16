<?php
/**
 * 趣读商城
 * ============================================================================
 * * 版权所有 2015-2027 河南趣读信息科技有限公司，并保留所有权利。
 * 网站地址: http://www.qudukeji.com
 * ----------------------------------------------------------------------------
 * ============================================================================
 */

namespace Mobile\Logic;

use Think\Model\RelationModel;
use Think\Page;

/**
 * 分类逻辑定义
 * Class CatsLogic
 * @package Home\Logic
 */
class UsersLogic extends RelationModel
{
	/**
	 * 验证用户名和密码
	 * @param unknown $username 用户名
	 * @param unknown $password 密码
	 */
    public function login($username,$password)
    {
    	$result = array();
        
        if(!$username || !$password)
        {
        	$result = array('status' => 0,'msg' => '请填写账号或密码');
        }
        
        $user = M('distribution_system_users')->where("uname='{$username}'")->find();
	
        if(!$user)
        {
           $result = array('status' => -1,'msg' => '账号不存在!');
        }
        elseif(encrypt($password) != $user['pass'])
        {
           $result = array('status' => -2,'msg' => '密码错误!');
        }
        else
        {
           $result = array('status' => 1,'msg' => '登陆成功','result' => $user);
        }
        
        return $result;
    }

    /*
     * 第三方登录
     */
    public function thirdLogin($data = array())
    {
        $openid = $data['openid']; //第三方返回唯一标识
        $oauth  = $data['oauth']; //来源
        
        if(!$openid || !$oauth)
        {
        	return array('status' => -1,'msg' => '参数有误','result' => '');
        }
        
        //获取用户信息
        $user = get_user_info($openid,3,$oauth);
        
        if(!$user)
        {
			//账户不存在 注册一个
            $map['password'] = '';
            $map['openid']   = $openid;
            $map['nickname'] = $data['nickname'];
            $map['reg_time'] = time();
            $map['oauth']    = $oauth;
            $map['head_pic'] = $data['head_pic'];
            $row = M('users')->add($map);
            $user = get_user_info($openid,3,$oauth);
        }
        
        return array('status' => 1,'msg' => '登陆成功','result' => $user);
    }

    /**
     * 注册
     * @param $username  邮箱或手机
     * @param $password  密码
     * @param $password2 确认密码
     * @return array
     */
    public function reg($username,$password,$password2)
    {
    	$is_validated = 0 ;
    	
        if(check_email($username))
        {
            $is_validated = 1;
        }

        if(check_mobile($username))
        {
            $is_validated = 1;
        }

        if($is_validated != 1)
        {
        	return array('status' => -1,'msg' => '请用手机号或邮箱注册','result' => '');
        }

        if(!$username || !$password)
        {
        	return array('status' => -1,'msg' => '请输入用户名或密码','result' => '');
        }

        //验证两次密码是否匹配
        if($password2 != $password)
        {
        	return array('status' => -1,'msg' => '两次输入密码不一致','result' => '');
        }
        
        //验证是否存在用户名
        if(get_user_info($username,1) || get_user_info($username,2))
        {
        	return array('status' => -1,'msg' => '账号已存在','result' => '');
        }
	
	    $time                 = time();
        $map['uname']         = $username;
	    $map['name']          = DEFAULT_NICKNAME . getRandChar(10);
        $map['pass']          = encrypt($password);
	    $map['regdate']       = $time;
        $map['lastlogin']     = $time;
	    $map['sex']           = 0;
	    $map['faceImg']       = DEFAULT_FACE_IMG;
        $map['mobile']        = $username;
	    $map['channelid']     = session('channel_id');
	    $map['channelname']   = session('channel_name');
        
        $row = M('distribution_system_users')->add($map);
        
        if(!$row)
        {
        	return array('status' => -1,'msg' => '注册失败','result' => '');
        }
        else
        {
	        return array('status' => 1,'msg' => '注册成功','result' => $user);
        }
    }

     /*
      * 获取当前登录用户信息
      */
     public function get_info($user_id)
     {
		if(!$user_id > 0)
		{
			return array('status' => -1,'msg' => '缺少参数','result' => '');
		}
		
        $user_info = M('distribution_system_users')->where("uid = {$user_id}")->find();
        
        if(!$user_info)
        {
        	return false;
        }
         
		return array('status' => 1,'msg' => '获取成功','result' => $user_info);
     }
     
    /**
     * 更新用户信息
     * @param $user_id
     * @param $post  要更新的信息
     * @return bool
     */
    public function update_info($user_id,$post=array())
    {
    	$key = array_keys($post);
	
	    $key = $key[0];
	
	    $result = M('distribution_system_users')->where("uid = $user_id")->field($key)->find();
	    
	    if($result[$key] == $post[$key])
	    {
		    return true;
	    }
	    else
	    {
		    $row = M('distribution_system_users')->where("uid = $user_id")->save($post);
		
		    if($row == false)
		    {
			    return false;
		    }
		
		    return true;
	    }
    }
	
	/**
	 * 生成阿里支付信息
	 *
	 * @param $money
	 */
    public function generateAliPayInfo($payID,$money)
    {
    	if($_COOKIE['uid'])
	    {
		    $aliPayConfPath = C('ALI_PAY_CONF_PATH');
		
		    include $aliPayConfPath;
	    	
		    $urlvars = array();
		    $urlvars['service']        = $jieqiPayset['alipay']['service']; //交易类型
		    $urlvars['partner']        = $jieqiPayset['alipay']['payid']; //合作商户号
		    $urlvars['return_url']     = 'http://wap.mianfeidushu.com/User/aliPayReturn.html';  //同步返回

		    $urlvars['notify_url']     = 'http://wap.mianfeidushu.com/User/aliPayReturn.html';  //异步返回
		
//		    $urlvars['return_url']     = $jieqiPayset['alipay']['payreturn'];  //同步返回
//
//            $urlvars['notify_url']     = $jieqiPayset['alipay']['notify_url'];  //异步返回
		    
		    $urlvars['_input_charset'] = 'utf-8';  //字符集，默认为GBK
		
		    $urlvars['subject']        = '小说币';  //商品名称，必填
		    $urlvars['out_trade_no']   = $payID; //商品外部交易号，必填,每次测试都须修改
//		    $urlvars['total_fee']      = $money; //商品总价
		
		    $urlvars['total_fee']      = 0.01; //商品总价
		    
		    $urlvars['payment_type']   = $jieqiPayset['alipay']['payment_type']; // 商品支付类型 1 ＝商品购买 2＝服务购买 3＝网络拍卖 4＝捐赠 5＝邮费补偿 6＝奖金
		    $urlvars['show_url']       = $jieqiPayset['alipay']['show_url'];  //商品相关网站公司
		
//		    $urlvars['show_url']       = 'http://wap.mianfeidushu.com/User/index.html';
		    
		    $urlvars['seller_email']   = $jieqiPayset['alipay']['seller_email'];   //卖家邮箱，必填
		
		    ksort($urlvars);
		    reset($urlvars);
		    $sign  = '';
		    $query = '';
		
		    foreach($urlvars as $k => $v)
		    {
			    if(!empty($sign))
			    {
				    $sign.='&';
			    }
			
			    $sign .= $k . '=' . $v;
			
			    if(!empty($query))
			    {
				    $query.='&';
			    }
			
			    $query .= $k . '=' . urlencode($v);
		    }
		
		    $sign   = md5($sign . $jieqiPayset['alipay']['paykey']);
		    $query .= '&sign_type=' . $jieqiPayset['alipay']['sign_type']. '&sign=' . $sign;
		    $query  = $jieqiPayset['alipay']['payurl'] . '?' . $query;
		
		    header('Location: ' . $query);
	    }
	    else
	    {
		    header('Location: ' . U('Mobile/User/login'));
	    }
    }

    public function aliPayReturn()
    {
	    $aliPayConfPath = C('ALI_PAY_CONF_PATH');
	
	    include $aliPayConfPath;
	
	    $info = getAliPayReturnInfo();
	    
	    if(!empty($info['notify_id']) && !empty($info['buyer_email']) && !empty($info['out_trade_no']))
	    {
		    echo 'success';
		
	    	if($info['seller_email'] == $jieqiPayset['alipay']['seller_email'] && $info['seller_id'] == $jieqiPayset['alipay']['payid'])
		    {
			    //直接返回模式
			    $getvars  = $info;
			
			    $showmode = 1;
		    }
		    else
		    {
		    	return;
		    }
	    }
	    elseif(!empty($_POST['notify_id']) && !empty($_POST['buyer_email']) && !empty($_POST['out_trade_no']))
	    {
		    //异步返回模式
		    echo 'success';
		
		    if(I('post.seller_email') == $jieqiPayset['alipay']['seller_email'] && I('post.seller_id') == $jieqiPayset['alipay']['payid'])
		    {
			    //直接返回模式
			    $getvars  = I('post.');
			
			    $showmode = 0;
		    }
		    else
		    {
			    return;
		    }
	    }
	    else
	    {
		    echo 'fail';

		    exit;
	    }

	    //检查交易状态(是不是付款成功)
	    if(strtoupper($getvars['trade_status']) != 'TRADE_SUCCESS')
	    {
		    if(!$showmode)
		    {
			    exit;
		    }
	    }

	    //md5校验
	    ksort($getvars);
	    reset($getvars);
	    $signtext   = '';
	    $signdecode = '';

	    foreach($getvars as $k => $v)
	    {
		    if($k != 'sign' && $k != 'sign_type')
		    {
			    if(!empty($signtext))
			    {
				    $signtext   .= '&';
				    $signdecode .= '&';
			    }

			    $signtext   .= $k . '=' . $v;
			    $signdecode .= $k . '=' . urldecode($v);
		    }
	    }
	
	    $signtext = base64_encode($signtext);
	    
	    $count = M('distribution_pay_paylog')->where(array('receiptdata' => $signtext))->count();
	    
	    if(!$count)
	    {
		    $orderid = intval($getvars['out_trade_no']);
		
		    $paylog  = M('distribution_pay_paylog')->where(array('payid' => $orderid))->find();
		
		    if(is_array($paylog))
		    {
			    $buyid   = $paylog['buyid'];
			    $buyname = $paylog['buyname'];
			    $payflag = $paylog['payflag'];
			    $egold   = $paylog['egold'];
			
			    if($payflag == 0)
			    {
				    $userInfo = M('distribution_system_users')->where(array('uid' => $_COOKIE['uid']))->find();
				
				    $userData['egold'] = $userInfo['egold'] + $egold;
				
				    M('distribution_system_users')->where(array('uid' => $_COOKIE['uid']))->save($userData);
				
				    $paylogData['payflag'] = 1;
				
				    $note = sprintf('给 %s 增加%s %s', $buyname, C('DEFAULT_EGOLD_NAME'), $egold);
				    $paylogData['note'] = $note;
				
				    $paylogData['receiptdata'] = $signtext;
				    
				    $flag = M('distribution_pay_paylog')->where(array('payid' => $orderid))->save($paylogData);
				
				    $this->addEgoldTOChannel($egold);
				    
				    return $flag;
			    }
		    }
		    else
		    {
			    return;
		    }
	    }
	    else
	    {
	    	return;
	    }
	}
	
	public function generateWeiXinPayInfo($payID,$money)
	{
		if($_COOKIE['uid'])
		{
			$weixinPayConfPath = C('WEIXIN_PAY_CONF_PATH');
			
			include $weixinPayConfPath;
			
			$urlvars = array();
			$urlvars['appid']    = $jieqiPayset['weixinpay']['appid']; //公众账号ID
			
			$jieqiPayset['weixinpay']['body'] = iconv('GB2312','UTF-8',$jieqiPayset['weixinpay']['body']);//商品描述
			
			$urlvars['body'] = $jieqiPayset['weixinpay']['body'];
			
			$urlvars['device_info']      = $jieqiPayset['weixinpay']['device_info']; //设备号
			
			$urlvars['mch_id']           = $jieqiPayset['weixinpay']['mch_id']; //合作商户号
			
			$urlvars['nonce_str']        = getRandChar(16);//随机数生成
			
			$urlvars['out_trade_no']     = $urlvars['mch_id'] . date("YmdHis") . $payID; //商品外部交易号，必填,每次测试都须修改
			 
			$urlvars['total_fee']        = $money;//标价金额，单位为分
			
			$urlvars['spbill_create_ip'] = gethostbyname($_ENV['COMPUTERNAME']);//终端IP，获取服务器的IP
			
			$urlvars['notify_url']       = $jieqiPayset['weixinpay']['notify_url']; //通知地址
			
			$urlvars['trade_type']       = $jieqiPayset['weixinpay']['trade_type']; //交易类型
			
			ksort($urlvars);
			
			$sign = toUrlParams($urlvars);
			
			$keyStr = "&key=" . $jieqiPayset['weixinpay']['paykey']; //key
			
			$sign .= $keyStr;
			
			$sign  = strtoupper(md5($sign));
			
			$urlvars['sign'] = $sign;
			
			$dataXML = toXml($urlvars);
			
			$apiUrl = $jieqiPayset['weixinpay']['api_url'];
			
			$startTimeStamp = getMillisecond();//请求开始时间
			
			$response = postXmlCurl($dataXML, $apiUrl);
			
			$data = fromXml($response);
			
			$flag = checkSign($data,$jieqiPayset['weixinpay']['paykey']);
			
			if($flag)
			{
				reportCostTime($apiUrl, $startTimeStamp, $data);//上报请求花费时间
				
				$result['code_url']     = $data['code_url'];
				
				$result['total_fee']    = $urlvars['total_fee'] / 100;
				
				$result['out_trade_no'] = $urlvars['out_trade_no'];
				
				return $result;
			}
			else
			{
				return;
			}
		}
		else
		{
			header('Location: ' . U('Mobile/User/login'));
		}
	}
	
	public function weixinOrderQuery()
	{
		if(isset($_REQUEST["out_trade_no"]) && $_REQUEST["out_trade_no"] != "")
		{
			$outTradeNo = I('post.out_trade_no');
			
			$weixinPayConfPath = C('WEIXIN_PAY_CONF_PATH');
			
			include $weixinPayConfPath;
			
			//参数数组
			$varArray = array();
			
			$varArray['appid']        = $jieqiPayset['weixinpay']['appid'];
			$varArray['mch_id']       = $jieqiPayset['weixinpay']['mch_id'];
			$varArray['out_trade_no'] = $outTradeNo;
			$varArray['nonce_str']    = getRandChar(16);
			
			//按字典序排序参数
			ksort($varArray);
			
			//生成签名
			$sign   = toUrlParams($varArray);
			
			$keyStr = "&key=" . $jieqiPayset['weixinpay']['paykey']; //key
			
			$sign  .= $keyStr;
			
			$sign   = strtoupper(md5($sign));
			
			$varArray['sign'] = $sign;
			
			$dataXML  = toXml($varArray);
			
			$orderURL = $jieqiPayset['weixinpay']['orderquery_url'];
			
			$startTimeStamp = getMillisecond();//请求开始时间
			$response = postXmlCurl($dataXML, $orderURL);
			
			$result = fromXml($response);
			
			checkSign($result,$jieqiPayset['weixinpay']['paykey']);
			
			reportCostTime($orderURL,$startTimeStamp,$result);
			
			echo $result['trade_state'];
			
			if($result['trade_state'] == 'SUCCESS')
			{
				//获取payID
				$mchIDLength = strlen($jieqiPayset['weixinpay']['mch_id']);
				
				$dateLength  = 14;
				
				$orderid     = intval(substr(strval($outTradeNo),$mchIDLength + $dateLength));
				
				$paylog      = M('distribution_pay_paylog')->where(array('payid' => $orderid))->find();
				
				if(is_array($paylog))
				{
					$buyid   = $paylog['buyid'];
					$buyname = $paylog['buyname'];
					$payflag = $paylog['payflag'];
					$egold   = $paylog['egold'];
					
					if($payflag == 0)
					{
						$userInfo = M('distribution_system_users')->where(array('uid' => $_COOKIE['uid']))->find();
						
						$userData['egold'] = $userInfo['egold'] + $egold;
						
						M('distribution_system_users')->where(array('uid' => $_COOKIE['uid']))->save($userData);
						
						$paylogData['payflag'] = 1;
						
						$note = sprintf('给 %s 增加%s %s', $buyname, C('DEFAULT_EGOLD_NAME'), $egold);
						$paylogData['note'] = $note;
						
						M('distribution_pay_paylog')->where(array('payid' => $orderid))->save($paylogData);
						
						$this->addEgoldTOChannel($egold);
					}
				}
			}
		}
	}
	
	/**
	 * 增加渠道的可兑换金额，小说币
	 *
	 * @param $egold 要增加的小说
	 */
	private function addEgoldTOChannel($egold)
	{
		if(session('channel_id') && session('channel_name'))
		{
			$oldData = M('distribution_pay_log')->where(array('channelid' => session('channel_id'),'channelname' => session('channel_name')))->find();
			
			if($oldData)
			{
				$payData['remainmoney'] = $oldData['remainmoney'] + $egold;
				
				M('distribution_pay_log')->where(array('id' => $oldData['id']))->save($payData);
			}
			else
			{
				$payData['channelid']   = session('channel_id');
				
				$payData['channelname'] = session('channel_name');
				
				$payData['remainmoney'] = $egold;
				
				M('distribution_pay_log')->add($payData);
			}
		}
	}
}