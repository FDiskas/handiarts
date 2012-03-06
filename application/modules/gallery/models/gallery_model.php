<?php

class Gallery_model extends CI_Model
{

	public $sGalleryPath;

	public function __construct() {
		parent::__construct();

		$this->sGalleryPath = realpath(APPPATH . '../gallery');
	}

	public function Upload() {

	}

	private function _createDir($sFileName = null) {


	}

	function saveTo($dir, $id) {
		// Check for safe mode
		if (ini_get('safe_mode')) {
			// Do it the safe mode way
			return saveTo_on($dir, $id);
		} else {
			// Do it the regular way
			return saveTo_off($dir, $id);
		}
	}

	function saveTo_off($dir, $id) {
		$arr = split_str($id, 2);

		foreach ($arr as $d) {
			$dir .= $d . '/';
			if (!is_dir($dir)) {
				mkdir($dir);
				chmod($dir, 0777);
			}
		}
		return $dir;
	}

	function saveTo_on($dir, $id) {
		$arr = split_str($id, 2);
		$path = '/' . $dir;
		$create = false;

		foreach ($arr as $d) {
			$dir .= $d . '/';
			if (!is_dir($dir)) {
				$create = true;
			}
		}
		logs('Creating directory: ' . $dir);
		if ($create) {
			$server = 'logfriend.com'; // ftp server
			// login to ftp server
			$user = "projektas@logfriend.com";
			$pass = "projektas";
			if ((!isset($connection)) || (!isset($result))) {
				$connection = ftp_connect($server); // connection
				$result = ftp_login($connection, $user, $pass);
				ftp_chdir($connection, $path); // go to destination dir
			}
			foreach ($arr as $d) {
				// check if connection was made
				if ((!$connection) || (!$result)) {
					klaida('Error', 'Safe mode is on. Ftp login information is wrong');
					die();
				} else {

					if (!@ftp_chdir($connection, $d)) {
						if (ftp_mkdir($connection, $d)) { // create directory
							ftp_site($connection, "CHMOD 777 $d") or die(klaida('Error', "FTP site CMD failed:" . $path . '/' . $d));
							ftp_chdir($connection, $d);
						} else {
							klaida('Error', 'Error creating a directory:' . $path . '/' . $d);
							die();
						}
					}
				}
			}
			ftp_close($connection); // close connection
		}

		return $dir;
	}

}