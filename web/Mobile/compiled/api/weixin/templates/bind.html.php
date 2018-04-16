<?php
echo '<div class="container">
	<div class="mod block form">
	</div>
	<div class="mod block tab recommend">
		<div class="hd c3">
			<span index="0" class="item active">新建账号</span>
			<span index="1" class="item">已有账号</span>
		</div>
		<div class="bd">
			<ul class="item" style="">
				<form class="form-horizontal" name="frmbindnew" id="frmbindnew" action="'.$this->_tpl_vars['jieqi_user_url'].'/api/'.$this->_tpl_vars['apiname'].'/bind.php?do=submit" method="post">
					<input value="37987" type="hidden" name="ID">
					<div class="bd">
						<div class="item">
							<div class="item-label">
							用&nbsp;&nbsp;户&nbsp;名：
							</div>
							<div class="item-control">
								<input type="text" class="text" maxlength="60" size="28" name="username" value="'.$this->_tpl_vars['api_nickname'].'" onblur="Ajax.Update(\''.$this->_tpl_vars['check_url'].'?item=u&username=\'+this.value, {outid:\'usermsg\', tipid:\'usermsg\', onLoading:\'<img border=\\\'0\\\' height=\\\'16\\\' width=\\\'16\\\' src=\\\''.$this->_tpl_vars['jieqi_url'].'/images/loading.gif\\\'/> Loading...\'});" style="padding: 6px;width: 95%;" placeholder="用户名" />
							</div>
						</div>
						<div class="item">
							<div class="item-label">
							密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：
							</div>
							<div class="item-control">
								<input type="password" maxlength="60" size="28" class="text" name="password" value="" style="padding: 6px;width: 95%;" placeholder="密码" />
							</div>
						</div>
						<div class="item">
							<div class="item-label">
							确认密码：
							</div>
							<div class="item-control">
								<input type="password" maxlength="60" size="28" class="text" name="repassword" value="" style="padding: 6px;width: 95%;" placeholder="确认密码" />
							</div>
						</div>
						<div class="item">
							<div class="item-label">
							电子邮箱：
							</div>
							<div class="item-control">
								<input type="text" maxlength="60" size="28" class="text" name="email" onblur="Ajax.Update(\''.$this->_tpl_vars['check_url'].'?item=m&email=\'+this.value, {outid:\'mailmsg\', tipid:\'mailmsg\', onLoading:\'<img border=\\\'0\\\' height=\\\'16\\\' width=\\\'16\\\' src=\\\''.$this->_tpl_vars['jieqi_url'].'/images/loading.gif\\\'/> Loading...\'});" style="padding: 6px;width: 95%;" placeholder="电子邮箱" />
							</div>
						</div>
					</div>
					<div class="ft fcc">
						<input type="hidden" name="action" id="action" value="bindnew"/>
						<input type="submit" value="确认绑定" class="btn btn-auto btn-blue">
					</div>
				</form>
			</ul>
			<ul class="item" style="display: none">
				<form name="frmbindold" class="form-horizontal" id="frmbindold" action="'.$this->_tpl_vars['jieqi_user_url'].'/api/'.$this->_tpl_vars['apiname'].'/bind.php?do=submit" method="post">
					<input value="37987" type="hidden" name="ID">
					<div class="bd">
						<div class="item">
							<div class="item-label">
							用户名：
							</div>
							<div class="item-control">
								<input type="text" maxlength="60" size="28" class="text" name="username" value="" style="padding: 6px;width: 95%;" placeholder="用户名" />
							</div>
						</div>
						<div class="item">
							<div class="item-label">
							密&nbsp;&nbsp;&nbsp;码：
							</div>
							<div class="item-control">
								<input type="password" maxlength="60" size="28" class="text" name="password" value="" style="padding: 6px;width: 95%;" placeholder="密码" />
							</div>
						</div>
					</div>
					<div class="ft fcc">
						<input type="hidden" name="action" id="action" value="bindold"/>
						<input type="submit" value="确认绑定" class="btn btn-auto btn-blue">
					</div>
				</form>
			</ul>
		</div>
	</div>
</div>';
?>