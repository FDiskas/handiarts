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

			$this->session->set_flashdata('errorMessage', $this->lang->line('access denied'));
			redirect( 'admin/login' );
		}
	}


	public function Index( $page = 0) {

		$aUser = $this->user_model->getUsers( array( 'iLimit' => 10, 'iOffset' => $page ) );
		unset( $aUser['userPassword'] );

		dbx( $aUser );
		die();

		$this->smarty->assign('tr', array('class="alt-row"','class=""'));
		$this->smarty->assign('aUsers', array_values( $aUser ) );

		$this->smarty->view('admin/user.tpl' );
	}

	public function Edit( $iID = 0 ) {

		if ( empty( $iID ) ) {

			$this->session->set_flashdata('errorMessage', $this->lang->line('User not found'));
		} else {
			// Try to get info from DB

			$aUser[] = $this->user_model->getUsers( array( 'userId' => $iID ) );

			unset( $aUser['userPassword'] );

			$this->smarty->assign('aUsers', $aUser);
			$this->smarty->view('admin/user.tpl' );
		}
	}
}