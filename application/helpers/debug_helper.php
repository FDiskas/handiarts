<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
if (!function_exists('dbx')) {

	function dbx() {
		$aTrace     = debug_backtrace();
		$aArgsList  = func_get_args();
		$mLast      = end( $aArgsList );
		$sTrace     = '';

		foreach ( $aArgsList as $mArg ) {

			echo '<pre style="color:blue">' . str_replace( array( '&lt;?php&nbsp;', '?&gt;' ), '', highlight_string( '<?php ' . var_export( $mArg, 1 ) . '?>', 1 ) ) . '</pre>';
		}

		foreach ( $aTrace as $k=> $v ) {

			if ( $k > 5 || !isset( $v['file'] ) ) {

				continue;
			}
			$v['file'] = str_replace( FCPATH, '', $v['file'] );

			if ( $v['function'] == "include" || $v['function'] == "include_once" || $v['function'] == "require_once" || $v['function'] == "require" ) {

				$sTrace .= "#" . $k . " " . $v['function'] . "(" . str_replace( FCPATH, '', $v['args'][0] ) . ") called at [" . $v['file'] . ":" . $v['line'] . "]<br />";
			} else {

				$sTrace .= "#" . $k . " " . $v['function'] . "() called at [" . $v['file'] . ":" . $v['line'] . "]<br />";
			}
		}
		echo '<span style="color:silver">' . $sTrace . '</span>';

		if ( sizeof( $aArgsList ) > 1 && is_scalar( $mLast ) && !is_string( $mLast ) && (bool) $mLast ) {

			die();
		}

		return true;
	}

}