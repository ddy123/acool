<?php
echo '

<div class="top-alert" id="fav-alert" style="display:none;">
				<div class="alert alert-success" id="fav-tips">�ղسɹ�</div>
</div>

			<div class="mod detail">
				<div class="bd column-2">
					<div class="left">
						<img src="'.$this->_tpl_vars['url_simage'].'?v='.date('Y-m-d H:i',$this->_tpl_vars['lastupdate']).'" width="90" height="126" alt="" />
					</div>
					<div class="right">
						<h2>'.$this->_tpl_vars['articlename'].' </h2>
						<p class="info">
							���ߣ�'.$this->_tpl_vars['author'].'<br />
                                                       ���'.$this->_tpl_vars['sort'].'<br />
                                                        ���ʣ�'.$this->_tpl_vars['issign'].'<br /> 
							������'.$this->_tpl_vars['size_c'].'�� <br />
							�����'.$this->_tpl_vars['allvisit'].'<br />
							 <!--���ԣ�<span id="fav">

'.$this->_tpl_vars['goodnum'].'</span>--> </p>
                            <span class="status is-serialize">'.$this->_tpl_vars['fullflag'].'</span>
						</div>
				</div>
				<div class="ft">
					<table class="control" width="100%">
						<tr>
							<td width="33%">
							    ';
if($this->_tpl_vars['jiluiccid'] > 0){
echo ' 
								<a class="read" href="'.jieqi_geturl('article','chapter',$this->_tpl_vars['jiluiccid'],$this->_tpl_vars['articleid'],$this->_tpl_vars['jiluicisvip']).'">�����Ķ�</a>
								';
}else{
echo '
								<a class="read" href="'.$this->_tpl_vars['jieqi_url'].'/modules/article/articleread.php?id='.$this->_tpl_vars['articleid'].'">��ʼ�Ķ�</a>
								';
}
echo '
							</td>
							<td width="5">&nbsp;</td>
							<td width="33%">
								    <a class="collect" href="javascript:;"  onclick="GPage.addbook(\''.$this->_tpl_vars['url_bookcase'].'\',\'addbook\');" id="addbook" >׷��</a>
								</td>
							<td width="5">&nbsp;</td>
							<td width="33%">
								    <a class="auto close" href="javascript:;"  onclick="GPage.addbook(\''.$this->_tpl_vars['jieqi_modules']['obook']['url'].'/addbuy.php?obuyid='.$this->_tpl_vars['articleid'].'\',\'addbook\');" id="addbook">�Զ�����</a>
								</td>
						</tr>
					</table>
				</div>
			</div>

			<ul class="vote">
						<li><a href="'.$this->_tpl_vars['jieqi_url'].'/modules/article/addreward.php?id='.$this->_tpl_vars['articleid'].'" class="diamond">
						<img src="/_res/css/heiyan/img/pengchang.png" height="48"/><br/>
						<em>����</em><span class="count">'.$this->_tpl_vars['giftnums'].'</span></a></li>
						<li><a href="javascript:;"  onclick="GPage.addbook(\''.$this->_tpl_vars['url_uservote'].'\',\'addbook\');" id="addbook" class="support">
						<img src="/_res/css/heiyan/img/tuijian.png" height="48"/><br/>
						<em>�Ƽ�</em><span class="count" id="support">'.$this->_tpl_vars['allvote'].'</span></a></li>
					</ul>
			
			<div class="mod book-intro">
				<div class="bd">
					<p>
					'.htmlclickable($this->_tpl_vars['intro']).'
					</p>
					</div>
				
			</div>
       <div class="mod block update">
	   ';
if($this->_tpl_vars['isvip_n'] > 0){
echo '
					<div class="hd">
						<span class="time">'.date('Y-m-d H:i',$this->_tpl_vars['viptime']).'</span>
						<h4>���¸���</h4>
					</div>
					<div class="bd">
						<a href="'.$this->_tpl_vars['url_vipchapter'].'" style="display:block">
                            <img src="/_res/css/heiyan/img/vip.png" alt="vip">
                             ';
if($this->_tpl_vars['vipvolume'] != ''){
echo $this->_tpl_vars['vipvolume'].' ';
}
echo $this->_tpl_vars['vipchapter'].'</a>
					</div>
        ';
}else{
echo '
					<div class="hd">
						<span class="time">'.date('Y-m-d H:i',$this->_tpl_vars['lastupdate']).'</span>
						<h4>���¸���</h4>
					</div>
					<div class="bd">
						<a href="'.$this->_tpl_vars['url_lastchapter'].'" style="display:block">
                             ';
if($this->_tpl_vars['lastvolume'] != ''){
echo $this->_tpl_vars['lastvolume'].' ';
}
echo $this->_tpl_vars['lastchapter'].'</a>
					</div>
		';
}
echo '			
					<div class="ft more">
						<a href="'.$this->_tpl_vars['url_read'].'" class="btn btn-auto">�½�Ŀ¼</a>
					</div>
				</div>

			<div class="mod block recent-donate-list">
				<div class="hd">
					<a href="'.$this->_tpl_vars['jieqi_url'].'/modules/article/addreward.php?id='.$this->_tpl_vars['articleid'].'">��Ҫ����</a>
					<h4>��������: <span class="count">'.$this->_tpl_vars['giftnums'].'</span></h4>
				</div>
				<div class="bd">
					<div class="donate-counts">
						<table>
							<tr>
								<td>
										<p><img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv01.png" alt="���" width="32" height="32" /></p>
				    	        		<p><span class="count">'.$this->_tpl_vars['redrose'].'</span></p>
				    	        		��</td>
								<td>
										<p><img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv02.png" alt="����" width="32" height="32" /></p>
				    	        		<p><span class="count">'.$this->_tpl_vars['yellowrose'].'</span></p>
				    	        		��</td>
								<td>
										<p><img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nv-giv01.png" alt="����" width="32" height="32" /></p>
				    	        		<p><span class="count">'.$this->_tpl_vars['bluerose'].'</span></p>
				    	        		��</td>
								<td>
										<p><img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv03.png" alt="��ʯ" width="32" height="32" /></p>
				    	        		<p><span class="count">'.$this->_tpl_vars['whiterose'].'</span></p>
				    	        		ö</td>
								<td>
										<p><img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv04.png" alt="����" width="32" height="32" /></p>
				    	        		<p><span class="count">'.$this->_tpl_vars['blackrose'].'</span></p>
				    	        		��</td>
								<td>
										<p><img src="'.$this->_tpl_vars['jieqi_url'].'/images/liwu/nan-giv05.png" alt="���" width="32" height="32" /></p>
				    	        		<p><span class="count">'.$this->_tpl_vars['greenrose'].'</span></p>
				    	        		��</td>
								
								</tr>
						</table>
					</div>
					<h4>����������</h4>
					<ul>
					'.jieqi_get_block(array('bid'=>'0', 'blockname'=>'���ͼ�¼', 'module'=>'article', 'filename'=>'block_actlog', 'classname'=>'BlockArticleActlog', 'side'=>'-1', 'title'=>'���ͼ�¼', 'vars'=>'addtime,5,0,$articleid,', 'template'=>'block_actlog.html', 'contenttype'=>'4', 'custom'=>'0', 'publish'=>'3', 'hasvars'=>'1'), 1).'							
							</ul>
					</div>
				<div class="ft more">
						<a href="/modules/article/donate.php?id='.$this->_tpl_vars['articleid'].'" class="btn btn-auto">ȫ��������¼</a>
					</div>
				</div>
			<div class="mod block comments reviews">
				<div class="hd">
					<h4>����<em class="count">('.$this->_tpl_vars['reviewsnum'].')</em></h4>
				</div>

				<div class="bd">
					<ul id="reviewcontent">
								     
									 </ul>
   	                </div>
				<div class="ft more">
						<a href="'.$this->_tpl_vars['jieqi_url'].'/modules/article/reviewsajax.php?aid='.$this->_tpl_vars['articleid'].'"  id="loadreview" class="btn btn-auto">��������..</a>
					</div>
	
				</div>
				
			<form name="review" id="review" method="post" action="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/reviews.php?aid='.$this->_tpl_vars['articleid'].'"  data-validator-option="{theme:\'simple_right\'}">
				<div class="mod block form form-horizontal">
					<div class="bd">
						<input name="bookId" type="hidden" value="40863">
						<div class="item">
 							<div class="item-label">
 								����
 							</div>
 							<div class="item-control">
 								<input name="ptitle" class="text" type="text" maxlength="100" size="28" value="">
 							</div>
 						</div>
 						<div class="item">
 							<div class="item-label">
 								����
 							</div>
 							<div class="item-control">
 								<textarea name="pcontent" rows="5" class="text"></textarea>
 							</div>
 						</div>
					</div>
					<div class="ft">
					    <input type="hidden" name="formhash" value="" />
						<input type="hidden" name="act" id="act" value="newpost" />'.$this->_tpl_vars['jieqi_token_input'].'
						<input type="submit" value="��������" class="btn btn-auto btn-orange" id="btn_pcontent">
					</div>
				</div>
			</form>
			<div class="mod block">
					<div class="hd" boxid="heiyanMobileCoverJingcai2">
						<h4>�����Ƽ�</h4>
					</div>
					<div class="bd">
						<div class="column-list">
							<ul class="list">
								'.$this->_tpl_vars['jieqi_pageblocks']['3']['content'].'
								</ul>
						</div>
					</div>
				</div>
 <!--     </div> -->
<script>	
  //��Ҫ����
  $(".i-comm").click(function(){
	$(".commbox").toggle();
  });
  $(function(){
	//��������
	var listurl = "'.$this->_tpl_vars['jieqi_url'].'/modules/article/reviewsajax.php?aid='.$this->_tpl_vars['articleid'].'",
		catalogurl = "";
	if(\'86\' != 0){
	  GPage.loadpage(\'reviewcontent\', listurl);
	}else{
	  $("#reviewcontent").html("<li><p class=\'loading rem-4\' style=\'padding-bottom:12px;\'>�ף�������ɳ��!</p></li>");
	}
	//����Ŀ¼
	GPage.loadpage(\'catalogbook\', catalogurl);
	//�ύ����
	$(\'#review\').bind(\'submit\', function(e){
	  e.preventDefault();
	  if(getUserId()<1){
         userLogin();
	  }else{
	    var tips = layer.open({type: 2,content: \'������\'});
	    GPage.postForm(\'review\', $("#review").attr("action"), function(data){
		  if(data.status==\'OK\'){
		    $.ajaxSetup ({ cache: false });
		    GPage.loadpage(\'reviewcontent\', listurl);
		    document.getElementById("review").reset();			//�������������
		    checkMsgLen(\'pcontent\');
		    layer.close(tips);
		    openMsg(data.msg);
		    $(\'.numb\').html(parseInt($(\'.numb\').html())+1);
		  }else{
		    layer.close(tips);
		    openMsg(data.msg);
		  }
	    });
	  }
	});
	//abelId ��ǩID��ContainerId ����ID
	addLoad(\'loadreview\',\'reviewcontent\');
  }); 
    function act(num,obj){
	$(\'dd.current\'+num).removeClass("current"+num);
	$(obj).parent().addClass("current"+num);
	$(\'#current\'+num).val($(obj).attr("id"));
  }
 //�ύ�ظ�
function submit_reply(_this){
  var url = $(_this).attr("action");
  if(getUserId()<1){
	 userLogin();
  }else{
    var tips = layer.open({type: 2,content: \'������\'});
    GPage.postForm(\'reply\'+_this.rid.value,url,function(data){
	  if(data.status==\'OK\'){
	    $.ajaxSetup ({ cache: false });
		//addreplise(_this.rid.value+\'span\');
		GPage.loadpage(\'show\'+_this.rid.value,_this.get_reply_url.value);
		layer.close(tips);
		//openMsg(data.msg);
	  }else{
		layer.close(tips);
		openMsg(data.msg);
	  }
	});
  }
  return false;
}	 

function addLoad(abelId,ContainerId){
    var i = 2;
	$(\'#\'+abelId).on(\'click\',function(e){
		e.preventDefault();
		//var ii = layer.load(0);
		var loadurl = this.href;
		    tips = layer.open({type: 2,content: \'�����С���\'});
		if (loadurl.indexOf("display=") < 0)
		{
			loadurl = this.href +"&page="+i;
		}else{
			loadurl = this.href +"&page="+i;
		}
		if(i == $(this).attr("page")) $(this).remove();//���һҳ�ļ��ظ���ɾ��
		GPage.getJson(urlParams(loadurl,\'ajax_gets=\'+ContentTag),function(data){
			if ($.trim(data) != "")
			{
				$(\'#\'+ContainerId).html($(\'#\'+ContainerId).html()+data);
				i++;
				layer.close(tips);
				if($("input[name=\'"+abelId+"_has_next_page\']:last").val() == 0){
					$(\'#\'+abelId).die(\'click\');
					$(\'#\'+abelId).text("��,û��������");
					$(\'#\'+abelId).attr("disabled",true);
				}
			}
		});
	});
}
//��ʾ�ظ��ͷ�ҳ��ʾ�ظ�
function showReplies(_this, url, show)
{
    var relayid = "show"+_this.id;
	if(show!=\'1\') $("#"+relayid).toggle();
	GPage.loadpage(relayid, url);
}	
  //�ж�����
  function checkMsgLen(tag){
    var content=$(\'#\'+tag).val();
    try{
	  var len=GetLength(content),
		  strTag = tag+\'msgLen\';
	  if(len>150){
		$(\'#\'+strTag+\' #fontnum\').html(len-150);
	  }else{
		var n=150-len;
		$(\'#\'+strTag+\' #fontnum\').html(n);
	  }
    }catch(e){
	  return false;
    }
  }

  //��ȡ�ַ����ȣ�����Ϊ2���ַ�
  function GetLength(str){
	var realLength=0,
		n=str.length,
		len=0;
	for(var i=0;i<n;i++){
	  var ns=str[i];
	  if(ns==null){
		ns=str.substring(i,i+1);
	  }
	  if(ns.match(/[^\\x00-\\xff]/ig)!=null){
		len+=2;
	  }else{
		len+=1;
	  }
	}
    len=parseInt(len/2);
    return len;
  }
</script>';
?>