<?php
echo '
			<div class="top-alert">
				</div>
			<h1 class="page-title">����</h1>
			<form action="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/gifts.php?do=submit" class="form form-horizontal"  method="post" id="formgift" name="formgift">
				<div class="mod block form">
					<div class="bd">
						<div class="item donate-items" id="donate-items">
							<label desc="�ͺ�������ٽ���������ȡ����ʤ����" for="item2" >
									<input type="radio" id="item2" checked="checked" name="rid" value="2"/>
									<img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv01.png" alt="���" width="24" height="24" />
									<span class="name">���</span>
									<span class="exchange"><em class="count">'.$this->_tpl_vars['redroses'].'</em> '.$this->_tpl_vars['eglodname'].'</span><span class="unit">/��</span>
								</label>
							<label desc="�����ƣ����ٽ���������ȡ����ʤ����" for="item3" >
									<input type="radio" id="item3" name="rid" value="3"/>
									<img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv02.png" alt="����" width="24" height="24" />
									<span class="name">����</span>
									<span class="exchange"><em class="count">'.$this->_tpl_vars['yellowroses'].'</em> '.$this->_tpl_vars['eglodname'].'</span><span class="unit">/��</span>
								</label>
							<label desc="�����ң����ٽ���������ȡ����ʤ����" for="item4" >
									<input type="radio" id="item4" name="rid" value="4"/>
									<img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nv-giv01.png" alt="����" width="24" height="24" />
									<span class="name">����</span>
									<span class="exchange"><em class="count">'.$this->_tpl_vars['blueroses'].'</em> '.$this->_tpl_vars['eglodname'].'</span><span class="unit">/��</span>
								</label>
							<label desc="����ʯ�����ٽ���������ȡ����ʤ����" for="item5" >
									<input type="radio" id="item5" name="rid" value="5"/>
									<img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv03.png" alt="��ʯ" width="24" height="24" />
									<span class="name">��ʯ</span>
									<span class="exchange"><em class="count">'.$this->_tpl_vars['whiteroses'].'</em> '.$this->_tpl_vars['eglodname'].'</span><span class="unit">/��</span>
								</label>
							<label desc="�ͳ��ܣ����ٽ���������ȡ����ʤ����" for="item6" >
									<input type="radio" id="item6" name="rid" value="6"/>
									<img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv04.png" alt="�ܳ�" width="24" height="24" />
									<span class="name">�ܳ�</span>
									<span class="exchange"><em class="count">'.$this->_tpl_vars['blackroses'].'</em> '.$this->_tpl_vars['eglodname'].'</span><span class="unit">/��</span>
								</label>
							<label desc="�͹�ڣ����ٽ���������ȡ����ʤ����" for="item7" >
									<input type="radio" id="item7" name="rid" value="7"/>
									<img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv05.png" alt="���" width="24" height="24" />
									<span class="name">���</span>
									<span class="exchange"><em class="count">'.$this->_tpl_vars['greenroses'].'</em> '.$this->_tpl_vars['eglodname'].'</span><span class="unit">/��</span>
								</label>
							</div>
						<div class="item">
							<div class="item-label">
								����
							</div>
							<div class="item-control">
								<input name="count" value="1" maxlength="10" class="text" type="text"/>
							</div>
						</div>
						<div class="item">
							<div class="item-label">
								�ش�
							</div>
							<div class="item-control">
								<textarea rows="5" name="reply" class="text" id="donate-content"></textarea>
							</div>
						</div>
					</div>
					<div class="ft">
                    <input type="hidden" name="act" value="post" />'.$this->_tpl_vars['jieqi_token_input'].'
					<input type="hidden" name="id" value="'.$this->_tpl_vars['articleid'].'" />
					<input type="submit" name="submit" value="����" class="btn btn-auto btn-orange" />

					</div>
				</div>
			</form>


    <script>
        (function () {
            var txt = document.getElementById("donate-content");
            var labels = document.getElementById("donate-items").getElementsByTagName("label");
            for (var i in labels) {
                labels[i].onclick = function () {
                    txt.value = this.getAttribute("desc");
                }
            }
            if (txt.value == "") {
                txt.value = labels[0].getAttribute("desc")
            }
        })();

	</script>
<script>
$(function(){
		$(\'#formgift\').on(\'submit\', function(e){
		e.preventDefault();
		 var tips = layer.open({type: 2,content: \'������\'});
				GPage.postForm(\'formgift\', $("#formgift").attr("action"),
			   function(data){
					if(data.status==\'OK\'){
                        $.ajaxSetup ({ cache: false });
					    layer.close(tips);
                        jumpurl(data.jumpurl);
					}else{
					    layer.close(tips);
		                openMsgs(data.msg);
					}
			   });
//			}
		});
});
</script>';
?>