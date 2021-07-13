<?php
/**
 * @package Exec-PHP
 */
/*
Plugin Name: Exec-PHP Remodel
Plugin URI: http://bluesome.net/post/2005/08/18/50/
Description: Executes &lt;?php ?&gt; code in your posts, pages and text widgets.<a href="https://qooga.jb-jk.net/wp-exec-php/" target="_blank">QoogaKIKAKU (T.O)によるPHP7対応の改造版</a>。<strong>※自己責任でご使用ください</strong>
Author: S&ouml;ren Weber
Author URI: http://bluesome.net
Version: 4.10.dev Remodel
*/

require_once(dirname(__FILE__).'/includes/manager.php');

function execphpstart($text) {
	return str_replace("< ?php","<?php",$text);
}
add_filter('the_content', 'execphpstart',1);

// ----------------------------------------------------------------------------
// main
// ----------------------------------------------------------------------------

global $g_execphp_manager;
if (!isset($g_execphp_manager)) {
	// strange assignment because of explaination how references work;
	// this will generate warnings with error_reporting(E_STRICT) using PHP5;
	// http://www.php.net/manual/en/language.references.whatdo.php
	$GLOBALS['g_execphp_manager'] = new ExecPhp_Manager();
}

?>