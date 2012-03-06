<?php

/**
 * @property User_model $user_model
 * @property CI_Session $session
 * @property CI_Lang $lang
 */

class User extends CI_Controller {

	public function __construct() {

		parent::__construct();

		if ( !$this->user_model->isAdmin() ) {
			$this->lang->load('messages');

			$this->session->set_flashdata('errorMessage', $this->lang->line('access denied'));
			redirect( 'admin/login' );
		}
	}


	public function Index() {

		echo ', NOT :D';
		die();
	}

	public function Edit( $iID = 0 ) {

		if ( empty( $iID ) ) {

			$this->session->set_flashdata('errorMessage', $this->lang->line('User not found'));
		} else {
			// Try to get info from DB

			$what = $this->user_model->getUsers( array( 'userId' => $iID ) );
				//echo $what->userEmail;
			dbx( $what );
			//$this->smarty->assign()
			$item['url'] = 'labas';
			$item['title'] = 'Laba diena';
			$this->smarty->view('admin/user.tpl', array('item' => $item ) );
		}
	}
}