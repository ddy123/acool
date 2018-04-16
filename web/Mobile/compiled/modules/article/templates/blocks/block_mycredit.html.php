<?php
echo '<ul class="ulrow">
<li>您当前的等级：<img src="'.$this->_tpl_vars['mycredits']['img'].'"></li>
<li>您当前粉丝值：'.$this->_tpl_vars['mycredits']['credit'].'</li>
<li>距离下级还差：'.$this->_tpl_vars['mycredits']['upcredit'].'</li>
</ul>';
?>