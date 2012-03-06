<?php

/**
 * @property CI_Session $session
 */

class Login extends CI_Controller {

	public function __construct() {

		parent::__construct();
	}

	public function Index() {

		if ( $this->input->post() ) {

			$this->form_validation->set_rules( 'userEmail', 'email', 'trim|required|valid_email|callback__check_login|xss_clean|strip_tags|trim');
			$this->form_validation->set_rules( 'userPassword', 'password', 'trim|required');

			if ( $this->form_validation->run() ) {

				if ( $this->user_model->userLogin( array(
					'userEmail' => $this->input->post('userEmail'),
					'userPassword' => $this->input->post('userPassword')
				) ) ) {

					$this->session->set_flashdata( 'successMessage', 'Welcome back');
					redirect( 'admin' );
				}
			}else {
				$this->smarty->assign('errorMessage', 'Check and fix the form errors below:');
			}
		}
		$this->smarty->view('admin/login.tpl');

	}

	public function logout() {

		$this->session->sess_destroy();
		redirect('admin/login');
	}

	function _check_login( $userEmail ) {
		if ( $this->input->post('userPassword') ) {

			$aUser = $this->user_model->getUsers( array(
				'userEmail' => $userEmail,
				'userPassword' => md5( $this->input->post( 'userPassword' ) )
			));

			if ( $aUser ) return true;
		}

		$this->form_validation->set_message('_check_login','Wrong Username or password');
		return false;
	}

}