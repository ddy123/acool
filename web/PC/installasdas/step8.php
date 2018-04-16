<?php

function jieqi_splitsqlfile(&$ret, $sql, $release = 32270)
{
	$sql = trim($sql);
	$sql_len = strlen($sql);
	$char = '';
	$string_start = '';
	$in_string = false;
	$i = 0;

	for (; $i < $sql_len; ++$i) {
		$char = $sql[$i];

		if ($in_string) {
			for (; ; ) {
				$i = strpos($sql, $string_start, $i);

				if (!$i) {
					$ret[] = $sql;
					return true;
				}
				else {
					if (($string_start == '`') || ($sql[$i - 1] != '\\')) {
						$string_start = '';
						$in_string = false;
						break;
					}
					else {
						$j = 2;
						$escaped_backslash = false;
						48	SUB	2	1:$i	2:$j	>#25	;0	<<60	
						49	IS_SMALLER	19	1:0	2:#25:$i - $j	>#26	;0	
						50	JMPZ_EX	46	1:#26:$sql[$i - $j] == '\\'	2:U:55	>#26	;0	>>55	
						51	SUB	2	1:$i	2:$j	>#27	;0	
						52	FETCH_DIM_R	81	1:$sql	2:#27:$i - $j	>$28	;0	
						53	IS_EQUAL	17	1:$28:$sql[$i - $j]	2:'\\'	>#29	;0	
						54	BOOL	52	1:#29:$sql[$i - $j] == '\\'	2:U:0	>#26	;0	
						55	JMPZ	43	1:#26:$sql[$i - $j] == '\\'	2:U:61	>U:0	;0	>>61	<<50	
						56	BOOL_NOT	13	1:$escaped_backslash	2:U:0	>#30	;0	
						57	ASSIGN	38	1:$escaped_backslash	2:#30:!$escaped_backslash	>$31	;0	
						58	POST_INC	36	1:$j	2:U:0	>#32	;0	
						59	756: ::printBacktrace()
2442: Decompiler::getOpVal(array('op_type' => 2, 'var' => 32, 'EA.type' => 0), array('Ts' => array, 'indent' => '						', 'nextbbs' => array, 'op_array' => array, 'opcodes' => array, ...))
2471: Decompiler::dumpop(array('opcode' => 70, 'result' => array, 'op1' => array, 'op2' => array, 'extended_value' => 0, ...), array('Ts' => array, 'indent' => '						', 'nextbbs' => array, 'op_array' => array, 'opcodes' => array, ...))
844: Decompiler::dumpRange(array('Ts' => array, 'indent' => '						', 'nextbbs' => array, 'op_array' => array, 'opcodes' => array, ...), array(0 => 48, 1 => 60))
1317: Decompiler::decompileBasicBlock(array('Ts' => array, 'indent' => '						', 'nextbbs' => array, 'op_array' => array, 'opcodes' => array, ...), array(0 => 48, 1 => 60), true)
1354: Decompiler::decompileComplexBlock(array('Ts' => array, 'indent' => '						', 'nextbbs' => array, 'op_array' => array, 'opcodes' => array, ...), array(0 => 48, 1 => 60))
1042: Decompiler::recognizeAndDecompileClosedBlocks(array('Ts' => array, 'indent' => '						', 'nextbbs' => array, 'op_array' => array, 'opcodes' => array, ...), array(0 => 45, 1 => 67))
1354: Decompiler::decompileComplexBlock(array('Ts' => array, 'indent' => '						', 'nextbbs' => array, 'op_array' => array, 'opcodes' => array, ...), array(0 => 41, 1 => 67))
1042: Decompiler::recognizeAndDecompileClosedBlocks(array('Ts' => array, 'indent' => '						', 'nextbbs' => array, 'op_array' => array, 'opcodes' => array, ...), array(0 => 34, 1 => 67))
1354: Decompiler::decompileComplexBlock(array('Ts' => array, 'indent' => '						', 'nextbbs' => array, 'op_array' => array, 'opcodes' => array, ...), array(0 => 30, 1 => 67))
1000: Decompiler::recognizeAndDecompileClosedBlocks(array('Ts' => array, 'indent' => '						', 'nextbbs' => array, 'op_array' => array, 'opcodes' => array, ...), array(0 => 22, 1 => 68))
1354: Decompiler::decompileComplexBlock(array('Ts' => array, 'indent' => '						', 'nextbbs' => array, 'op_array' => array, 'opcodes' => array, ...), array(0 => 21, 1 => 68))
1019: Decompiler::recognizeAndDecompileClosedBlocks(array('Ts' => array, 'indent' => '						', 'nextbbs' => array, 'op_array' => array, 'opcodes' => array, ...), array(0 => 20, 1 => 69))
1354: Decompiler::decompileComplexBlock(array('Ts' => array, 'indent' => '						', 'nextbbs' => array, 'op_array' => array, 'opcodes' => array, ...), array(0 => 20, 1 => 216))
1000: Decompiler::recognizeAndDecompileClosedBlocks(array('Ts' => array, 'indent' => '						', 'nextbbs' => array, 'op_array' => array, 'opcodes' => array, ...), array(0 => 17, 1 => 217))
1354: Decompiler::decompileComplexBlock(array('Ts' => array, 'indent' => '						', 'nextbbs' => array, 'op_array' => array, 'opcodes' => array, ...), array(0 => 14, 1 => 217))
1537: Decompiler::recognizeAndDecompileClosedBlocks(array('Ts' => array, 'indent' => '						', 'nextbbs' => array, 'op_array' => array, 'opcodes' => array, ...), array(0 => 0, 1 => 231), '	')
2563: Decompiler::dop_array(array('type' => 2, 'function_name' => 'jieqi_splitsqlfile', 'fn_flags' => 0, 'arg_info' => array, 'num_args' => 3, ...), '	')
2830: Decompiler::dfunction(array('op_array' => array))
36: Decompiler::output()

Notice: Undefined offset: 32 in D:\ÔÆÂ·php½âÃÜ V2.0 Ãâ·Ñ°æ\bin-free\xdezend\scripts\Decompiler.class.php on line 758
FREE	70	1:#32:	2:U:0	>U:0	;0	
						60	JMP	42	1:U:48	2:U:0	>U:0	;0	>>48	
						==

						$escaped_backslash = !$escaped_backslash;
						$j++;

						if ($escaped_backslash) {
							$string_start = '';
							$in_string = false;
							break;
						}
						else {
							$i++;
						}
					}
				}
			}
		}
		else if ($char == ';') {
			$ret[] = substr($sql, 0, $i);
			$sql = ltrim(substr($sql, min($i + 1, $sql_len)));
			$sql_len = strlen($sql);

			if ($sql_len) {
				$i = -1;
			}
			else {
				return true;
			}
		}
		else {
			if (($char == '"') || ($char == '\'') || ($char == '`')) {
				$in_string = true;
				$string_start = $char;
			}
			else {
				if (($char == '#') || (($char == ' ') && (1 < $i) && (($sql[$i - 2] . $sql[$i - 1]) == '--'))) {
					$start_of_comment = ($sql[$i] == '#' ? $i : $i - 2);
					$end_of_comment = (strpos(' ' . $sql, "\n", $i + 2) ? strpos(' ' . $sql, "\n", $i + 2) : strpos(' ' . $sql, "\r", $i + 2));

					if (!$end_of_comment) {
						if (0 < $start_of_comment) {
							$ret[] = trim(substr($sql, 0, $start_of_comment));
						}

						return true;
					}
					else {
						$sql = substr($sql, 0, $start_of_comment) . ltrim(substr($sql, $end_of_comment));
						$sql_len = strlen($sql);
						$i--;
					}
				}
				else {
					if (($release < 32270) && ($char == '!') && (1 < $i) && (($sql[$i - 2] . $sql[$i - 1]) == '/*')) {
						$sql[$i] = ' ';
					}
				}
			}
		}
	}

	if (!empty($sql) && preg_match('/[^[:space:]]+/', $sql)) {
		$ret[] = $sql;
	}

	return true;
}

@session_start();
@define('JIEQI_MODULE_NAME', 'install');
@define('CURRENT_STEP', 8);
@define('JIEQI_IS_OPEN', '1');

if (@is_array($_COOKIE['jieqi_step'])) {
	if (!@in_array(CURRENT_STEP, $_COOKIE['jieqi_step'])) {
		@header('Location: index.php');
		break;
	}
}

@setcookie('jieqi_step[' . (CURRENT_STEP + 1) . ']', CURRENT_STEP + 1);
require_once '../global.php';
include_once JIEQI_ROOT_PATH . '/' . JIEQI_MODULE_NAME . '/lang/language.php';
include_once JIEQI_ROOT_PATH . '/' . JIEQI_MODULE_NAME . '/header.php';
$jieqiTpl->assign('step_title', $jieqiLang[JIEQI_MODULE_NAME]['step' . CURRENT_STEP . '_title']);
$jieqiTpl->assign('step_summary', $jieqiLang[JIEQI_MODULE_NAME]['step' . CURRENT_STEP . '_summary']);
$jieqiTpl->assign('current_step', CURRENT_STEP);
$sql_dir = 'sql';
jieqi_includedb();
$db_query = JieqiQueryHandler::getInstance('JieqiQueryHandler');
$db_query->execute('show tables');
$mysql_version = @mysql_get_server_info();
$upmodules = false;
unset($jieqiModules);
include JIEQI_ROOT_PATH . '/configs/modules.php';
if (is_array($_POST['mod_name']) && (0 < count($_POST['mod_name']))) {
	foreach ($_POST['mod_name'] as $v) {
		if (file_exists($sql_dir . '/' . $v . '/struct.sql') && file_exists($sql_dir . '/' . $v . '/data.sql')) {
			if (!isset($jieqiModules[$v])) {
				$jieqiModules[$v] = array('caption' => $v, 'dir' => '', 'path' => '', 'url' => '', 'theme' => '', 'publish' => '1');
				$upmodules = true;
			}
			else if ($jieqiModules[$v]['publish'] <= 0) {
				$jieqiModules[$v]['publish'] = 1;
				$upmodules = true;
			}

			$file_content = jieqi_readfile($sql_dir . '/' . $v . '/struct.sql');
			$file_content .= jieqi_readfile($sql_dir . '/' . $v . '/data.sql');
			$sqlary = array();
			jieqi_splitsqlfile($sqlary, preg_replace(array('/DROP\\s+TABLE\\s+IF\\s+EXISTS\\s+`?jieqi_([a-z1-9_]+)`?\\s*;/isU', '/TABLE\\s+`?jieqi_([a-z1-9_]+)`?(;|\\s)/isU', '/INSERT\\s+INTO\\s+`?jieqi_([a-z1-9_]+)`?(;|\\s)/isU', '/UPDATE\\s+`?jieqi_([a-z1-9_]+)`?(;|\\s)/isU'), array('DROP TABLE IF EXISTS `' . JIEQI_DB_PREFIX . '_\\1`;', 'TABLE `' . JIEQI_DB_PREFIX . '_\\1`\\2', 'INSERT INTO `' . JIEQI_DB_PREFIX . '_\\1`\\2', 'UPDATE `' . JIEQI_DB_PREFIX . '_\\1`\\2'), $file_content));
			$sqlerr = array();

			foreach ($sqlary as $v) {
				$v = trim($v);
				if (!empty($v) && (5 < strlen($v))) {
					if ($mysql_version < '4.1') {
						if (preg_match('/^\\s*CREATE\\s+TABLE/is', $v)) {
							$v = preg_replace(array('/ENGINE\\s*=\\s*MyISAM[^;]*;/i', '/TYPE\\s*=\\s*MEMORY[^;]*;/i'), array('TYPE=MyISAM;', 'TYPE=HEAP;'), $v);
						}
					}
					else if (preg_match('/^\\s*CREATE\\s+TABLE/is', $v)) {
						$v = preg_replace(array('/DEFAULT CHARSET\\s*=\\s*[a-zA-Z0-9_-]+/', '/TYPE\\s*=\\s*MyISAM/i', '/TYPE\\s*=\\s*HEAP/i'), array('DEFAULT CHARSET=' . JIEQI_DB_CHARSET, 'ENGINE=MyISAM DEFAULT CHARSET=' . JIEQI_DB_CHARSET, 'TYPE=MEMORY DEFAULT CHARSET=' . JIEQI_DB_CHARSET), $v);
					}

					$retflag = $db_query->execute($v);

					if (!$retflag) {
						$sqlerr[] = array('sql' => $v, 'error' => $db_query->db->error());
						$jieqiTpl->assign('status', 0);
						$jieqiTpl->assign('step_content', sprintf($jieqiLang[JIEQI_MODULE_NAME]['print_sql_error'], jieqi_htmlstr($v), jieqi_htmlstr($db_query->db->error())));
						break;
					}
				}
			}
		}
	}

	if (!empty($sqlerr)) {
		$errorinfo = '';

		foreach ($sqlerr as $v) {
			$errorinfo .= sprintf($jieqiLang[JIEQI_MODULE_NAME]['show_error_format'], jieqi_htmlstr($v['sql']), jieqi_htmlstr($v['error']));
		}

		$jieqiTpl->assign('status', 0);
		$jieqiTpl->assign('step_content', sprintf($jieqiLang[JIEQI_MODULE_NAME]['sql_some_error'], $errorinfo));
	}
	else {
		$errorinfo = '';
		if ($_SESSION['system_user'] && $_SESSION['system_pass']) {
			include_once JIEQI_ROOT_PATH . '/lib/text/textfunction.php';

			if (!$db_query->execute('DELETE FROM ' . jieqi_dbprefix('system_users'))) {
				$errorinfo .= $jieqiLang[JIEQI_MODULE_NAME]['delete_table_error'] . '<br />';
			}

			if (!$db_query->execute('INSERT INTO `' . jieqi_dbprefix('system_users') . '` (`uid`, `siteid`, `uname`, `name`, `pass`, `groupid`, `regdate`, `initial`, `sex`, `email`) VALUES (0, 0, \'' . jieqi_dbslashes($_SESSION['system_user']) . '\', \'' . jieqi_dbslashes($_SESSION['system_user']) . '\', \'' . jieqi_dbslashes(md5($_SESSION['system_pass'])) . '\', 2, ' . time() . ', \'' . jieqi_dbslashes(jieqi_getinitial($_SESSION['system_user'])) . '\', 0, \'' . jieqi_dbslashes($_SESSION['system_email']) . '\')')) {
				$errorinfo .= $jieqiLang[JIEQI_MODULE_NAME]['insert_table_error'] . '<br />';
			}

			if (isset($_SESSION['local_root'])) {
				$db_query->execute('UPDATE ' . jieqi_dbprefix('system_configs') . ' SET cvalue = \'' . jieqi_dbslashes($_SESSION['local_root']) . '\' WHERE modname=\'system\' AND cname=\'JIEQI_URL\';');
			}

			if (isset($_SESSION['mysql_host'])) {
				$db_query->execute('UPDATE ' . jieqi_dbprefix('system_configs') . ' SET cvalue = \'' . jieqi_dbslashes($_SESSION['mysql_host']) . '\' WHERE modname=\'system\' AND cname=\'JIEQI_DB_HOST\';');
			}

			if (isset($_SESSION['mysql_name'])) {
				$db_query->execute('UPDATE ' . jieqi_dbprefix('system_configs') . ' SET cvalue = \'' . jieqi_dbslashes($_SESSION['mysql_name']) . '\' WHERE modname=\'system\' AND cname=\'JIEQI_DB_NAME\';');
			}

			if (isset($_SESSION['mysql_user'])) {
				$db_query->execute('UPDATE ' . jieqi_dbprefix('system_configs') . ' SET cvalue = \'' . jieqi_dbslashes($_SESSION['mysql_user']) . '\' WHERE modname=\'system\' AND cname=\'JIEQI_DB_USER\';');
			}

			if (isset($_SESSION['mysql_pass'])) {
				$db_query->execute('UPDATE ' . jieqi_dbprefix('system_configs') . ' SET cvalue = \'' . jieqi_dbslashes($_SESSION['mysql_pass']) . '\' WHERE modname=\'system\' AND cname=\'JIEQI_DB_PASS\';');
			}

			if (isset($_SESSION['mysql_charset'])) {
				$db_query->execute('UPDATE ' . jieqi_dbprefix('system_configs') . ' SET cvalue = \'' . jieqi_dbslashes($_SESSION['mysql_charset']) . '\' WHERE modname=\'system\' AND cname=\'JIEQI_DB_CHARSET\';');
			}

			unset($_SESSION);
		}

		if (empty($errorinfo)) {
			$jieqiTpl->assign('admin_page', JIEQI_URL . '/admin/');
			$jieqiTpl->assign('index_page', JIEQI_URL);
			$jieqiTpl->assign('status', 1);
			$jieqiTpl->assign('step_content', $jieqiLang[JIEQI_MODULE_NAME]['execute_sql_success']);
			$lockdata = '';

			if ($upmodules) {
				$varstring = '<?php' . "\n" . '' . jieqi_extractvars('jieqiModules', $jieqiModules) . '' . "\n" . '?>';
				jieqi_writefile(JIEQI_ROOT_PATH . '/configs/modules.php', $varstring);
			}

			jieqi_writefile(JIEQI_ROOT_PATH . '/configs/install.lock', $lockdata);
		}
		else {
			$jieqiTpl->assign('status', 0);
			$jieqiTpl->assign('step_content', $errorinfo);
		}
	}
}

$jieqiTpl->setCaching(0);
$jieqiTpl->assign('jieqi_content', $jieqiTpl->fetch(JIEQI_ROOT_PATH . '/' . JIEQI_MODULE_NAME . '/templates/step' . CURRENT_STEP . '.html'));
include_once JIEQI_ROOT_PATH . '/' . JIEQI_MODULE_NAME . '/footer.php';

?>
