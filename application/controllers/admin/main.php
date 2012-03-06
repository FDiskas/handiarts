<?php

/**
 * @property CI_Session $session
 * @property CI_URI $uri
 */

class Main extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->output->enable_profiler(TRUE);
	}

	public function Index() {

		if ( $this->user_model->userAccess( array( 'userType' ) ) == 'admin' ) {

			$this->smarty->view('admin/index.tpl');
		} else {

			$this->lang->load('messages');

			$this->session->set_flashdata( 'errorMessage', $this->lang->line('access denied') );
			redirect('admin/login');
		}

	}

}