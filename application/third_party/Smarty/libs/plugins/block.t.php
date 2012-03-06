<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {ci_language} function plugin
 *
 * Type:	 function<br>
 * Name:	 ci_language<br>
 * Purpose:  bridge to code igniter language files
 * @author Neighbor Webmastert <kepler ar neighborwebmaster dot com>
 * @param $params
 * @param $text
 * @param $smarty
 * @return
 * @internal param \Format $array :
 * <pre>
 * array('lang' => option language identifier - defaults to 'en')
 * </pre>
 * @internal param $Smarty
 */
function smarty_block_t($params, $content, $smarty, &$repeat) {

	if ( !$repeat ) {
		if (substr($content, 0, 1) == '$') {

			$val = $smarty->get_template_vars(substr($text, 1));
		} else {

			$CI = &get_instance();
			$val = $CI->lang->line($content);
		}

		if ( empty( $val ) ) {

			$val = '_'.$content;
		}
		return $val;
	}

}

?>
