<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
if (!function_exists('dbx')) {

	function dbx($data) {
		$dub = debug_backtrace();
		$data = var_export($data, true);
		$data = highlight_string( "<?php\n" . $data . "\n?>", true );
		$data = str_replace( array( '&lt;?php', '?&gt;' ), '', $data);


		echo '<pre><span >';
		echo $dub[0]['file'] . "<br/>On Line Number ";
		echo $dub[0]['line'] . "<br/></span>";

		echo $data;

		echo '</pre>';
	}

}