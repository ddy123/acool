<?php
echo '<div class="container">
<div class="mod block form">
				<div class="hd"><h4>�û���½</h4></div>
                 
				<form action="'.$this->_tpl_vars['url_login'].'" method="post" name="frmlogin" id="frmlogin" class="form-horizontal">
					<div class="bd">				
						<div class="item">
							<div class="item-label">�û���:</div>
							<div class="item-control">
								<input type="text" maxlength="60" size="28" class="text" name="username" value="">
							</div>
						</div>
                        <div class="item">
							<div class="item-label">��&nbsp;&nbsp;&nbsp;��:</div>
							<div class="item-control">
								<input type="password" maxlength="60" size="28" class="text" name="password" value="">
							</div>
						</div>
                    <div class="item">
							<label for="keeplogin"><input name="usecookie" type="checkbox" checked="checked" /> ��ס��</label>
						</div>

					</div>
					<div class="ft fcc">
					<input type="hidden" name="act" value="login">
						<input type="submit" value="������½" class="btn btn-auto btn-blue">
					</div>
					<div class="ft fcc"><a class="btn btn-auto btn-blue" href="/register.php">ע��</a></div>
				</form>
			</div>

        </div>
		
      <div class="container">

	  <div class="mod block form">
				<div class="hd"><h4>��ݵ�¼</h4></div>
                <div align="center" style=" padding:20px;">
                        <div style=" width:33%; float:left; text-align:center;">
                        <a href="'.$this->_tpl_vars['jieqi_url'].'/api/qq/login.php">
                        <div style="background: transparent url(/_res/css/heiyan/img/sprite_bg.png) no-repeat scroll 0px 0px;width: 80px;height: 80px;text-indent: -9999px;margin: 0px auto 5px;"></div>
                        <div style="padding-top:5px;">QQ��¼</div></a>
                        </div>
                        <div style="width:33%; float:left; text-align:center;">
                            <a href="'.$this->_tpl_vars['jieqi_url'].'/api/weibo/login.php"><div style="background: transparent url(/_res/css/heiyan/img/sprite_bg.png) no-repeat scroll 0px -104px;width: 80px;height: 80px;text-indent: -9999px;margin: 0px auto 5px;"></div>
                            <div style="padding-top:5px;">΢����¼</div></a>
                        </div>

<div style="width:33%; float:left; text-align:center;">
                            <a href="'.$this->_tpl_vars['jieqi_url'].'/api/weixin/login.php"><div style="background: transparent url(/_res/css/heiyan/img/sprite_bg.png) no-repeat scroll 0px -208px;width: 80px;height: 80px;text-indent: -9999px;margin: 0px auto 5px;"></div>
                            <div style="padding-top:5px;">΢�ŵ�¼</div></a>
                        </div>

                 </div>
                 <div style="padding:20px 20px; line-height:20px;text-align:left;clear:both;">
                 	<p>���ã���վ֧��QQ��΢����΢���˺�һ����¼���ɹ���½����ʹ�ñ�վ��ȫ�����ܣ�</p>
                 </div>
      </div>
		
<script type="text/javascript">
$(function(){
		$(\'#frmlogin\').on(\'submit\', function(e){
		e.preventDefault();
		 var tips = layer.open({type: 2,content: \'������\'});
				GPage.postForm(\'frmlogin\', $("#frmlogin").attr("action"),
			   function(data){
					if(data.status==\'OK\'){
					    layer.close(tips);
						$.ajaxSetup ({ cache: false });
						jumpurl(data.jumpurl);
					}else{
					    layer.close(tips);
		                openMsg(data.msg);
					}
			   });
//			}
		});
});
$(\'#recode\').click(function(){
	$(\'#checkcode\').attr(\'src\',\''.$this->_tpl_vars['jieqi_url'].'/checkcode.php?rand=\'+Math.random());
});
</script>';
?>