<?php
echo '
			<div class="top-alert">
				</div>
			<h1 class="page-title">捧场</h1>
			<form action="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/gifts.php?do=submit" class="form form-horizontal"  method="post" id="formgift" name="formgift">
				<div class="mod block form">
					<div class="bd">
						<div class="item donate-items" id="donate-items">
							<label desc="赏红包，望再接再厉，争取更大胜利！" for="item2" >
									<input type="radio" id="item2" checked="checked" name="rid" value="2"/>
									<img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv01.png" alt="红包" width="24" height="24" />
									<span class="name">红包</span>
									<span class="exchange"><em class="count">'.$this->_tpl_vars['redroses'].'</em> '.$this->_tpl_vars['eglodname'].'</span><span class="unit">/个</span>
								</label>
							<label desc="赏美酒，望再接再厉，争取更大胜利！" for="item3" >
									<input type="radio" id="item3" name="rid" value="3"/>
									<img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv02.png" alt="美酒" width="24" height="24" />
									<span class="name">美酒</span>
									<span class="exchange"><em class="count">'.$this->_tpl_vars['yellowroses'].'</em> '.$this->_tpl_vars['eglodname'].'</span><span class="unit">/杯</span>
								</label>
							<label desc="赏香囊，望再接再厉，争取更大胜利！" for="item4" >
									<input type="radio" id="item4" name="rid" value="4"/>
									<img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nv-giv01.png" alt="香囊" width="24" height="24" />
									<span class="name">香囊</span>
									<span class="exchange"><em class="count">'.$this->_tpl_vars['blueroses'].'</em> '.$this->_tpl_vars['eglodname'].'</span><span class="unit">/个</span>
								</label>
							<label desc="赏钻石，望再接再厉，争取更大胜利！" for="item5" >
									<input type="radio" id="item5" name="rid" value="5"/>
									<img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv03.png" alt="钻石" width="24" height="24" />
									<span class="name">钻石</span>
									<span class="exchange"><em class="count">'.$this->_tpl_vars['whiteroses'].'</em> '.$this->_tpl_vars['eglodname'].'</span><span class="unit">/颗</span>
								</label>
							<label desc="赏超跑，望再接再厉，争取更大胜利！" for="item6" >
									<input type="radio" id="item6" name="rid" value="6"/>
									<img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv04.png" alt="跑车" width="24" height="24" />
									<span class="name">跑车</span>
									<span class="exchange"><em class="count">'.$this->_tpl_vars['blackroses'].'</em> '.$this->_tpl_vars['eglodname'].'</span><span class="unit">/辆</span>
								</label>
							<label desc="赏桂冠，望再接再厉，争取更大胜利！" for="item7" >
									<input type="radio" id="item7" name="rid" value="7"/>
									<img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv05.png" alt="桂冠" width="24" height="24" />
									<span class="name">桂冠</span>
									<span class="exchange"><em class="count">'.$this->_tpl_vars['greenroses'].'</em> '.$this->_tpl_vars['eglodname'].'</span><span class="unit">/顶</span>
								</label>
							</div>
						<div class="item">
							<div class="item-label">
								数量
							</div>
							<div class="item-control">
								<input name="count" value="1" maxlength="10" class="text" type="text"/>
							</div>
						</div>
						<div class="item">
							<div class="item-label">
								贺词
							</div>
							<div class="item-control">
								<textarea rows="5" name="reply" class="text" id="donate-content"></textarea>
							</div>
						</div>
					</div>
					<div class="ft">
                    <input type="hidden" name="act" value="post" />'.$this->_tpl_vars['jieqi_token_input'].'
					<input type="hidden" name="id" value="'.$this->_tpl_vars['articleid'].'" />
					<input type="submit" name="submit" value="捧场" class="btn btn-auto btn-orange" />

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
		 var tips = layer.open({type: 2,content: \'加载中\'});
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