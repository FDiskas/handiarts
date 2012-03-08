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


	public function Index( $page = 0 ) {

		if ( $this->input->get('search')) {

			$aUser = $this->user_model->getUsers( array( 'userEmail' => $this->input->get('search'), 'iLimit' => 10, 'iOffset' => $page ) );
		} else {

			$aUser = $this->user_model->getUsers( array( 'iLimit' => 10, 'iOffset' => $page ) );
		}
		unset( $aUser['userPassword'] );

		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/users/';
		$config['total_rows'] = $this->user_model->totalUsers();
		$config['per_page'] = 10;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$config['anchor_class'] = 'number';
		$config['cur_tag_open'] = '<a href="#" class="number current">';
		$config['cur_tag_close'] = '</a>';
//		$config['num_tag_open'] = '';

		$this->pagination->initialize($config);

		$sPages = $this->pagination->create_links();

		$this->smarty->assign('sPages', $sPages );
		$this->smarty->assign('aUsers', $aUser );

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