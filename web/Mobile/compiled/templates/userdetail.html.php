<?php
echo '


<div class="container">

        

			<div class="mod my-shelf">
				<div class="hd">
					<h4><i></i>������Ϣ</h4>
				</div>
				<div class="bd">
					<ul class="list reading">
                        <li><p class="name">ID��'.$this->_tpl_vars['uid'].'</p></li>                      
                        <li><p class="name">�ǳƣ�'.$this->_tpl_vars['name'].'</p></li>
						<li><p class="name">���֣�'.$this->_tpl_vars['score'].' ����</p></li>
						<li><p class="name">��'.$this->_tpl_vars['egold'].' '.$this->_tpl_vars['egoldname'].'</p></li>

						
						
							</ul>
				</div>
				</div>

<style>
.my-shelf li {
    padding: 15px;
    border-bottom: 1px solid #e0d7d3;
}
.reading li .name {
    color: #999;
}
</style>



      </div>';
?>