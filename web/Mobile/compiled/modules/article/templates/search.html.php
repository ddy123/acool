<?php
echo '<form name="articlesearch" method="post" action="'.$this->_tpl_vars['jieqi_modules']['article']['url'].'/search.php">
 <table class="grid" width="60%" style="min-width:480px;">
   <caption>С˵����</caption>
    <tr align="center">
      <td style="padding:1em;"><table width="100%" class="hide">
        <tr>
          <td width="30%" align="right" valign="middle">��������</td>
          <td width="70%">
		  <select name="searchtype" id="searchtype" class="select">
		  <option value="all" selected="selected">�ۺ�</option>
		  <option value="articlename">С˵����</option>
		  <option value="author">С˵����</option>
		  <option value="keywords">�ؼ���</option>
		  </select>
          </td>
        </tr>
        <tr>
          <td align="right" valign="middle">�ؼ��֣�</td>
          <td><input name="searchkey" type="text" class="text" id="searchkey" size="20" maxlength="50"></td>
        </tr>
        <tr>
		  <td><input type="hidden" name="act" value="search">'.$this->_tpl_vars['jieqi_token_input'].'</td>
          <td><input type="submit" class="button" value="&nbsp;��&nbsp;&nbsp;��&nbsp;" name="submit"></td>
          </tr>
      </table></td>
    </tr>
  </table>
</form>';
?>