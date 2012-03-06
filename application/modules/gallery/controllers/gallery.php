<?php

class Gallery extends MX_Controller {

	public function __construct() {

		parent::__construct();
	}

	public function Index() {
		$this->smarty->view('gallery/demo.tpl');
	}

	public function Upload() {
		$config['upload_path'] = FCPATH . '/images/';
		$config['allowed_types'] = 'jpg|txt|psd|gif|png';
		$config['max_size']	= '1000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			print_r($this->upload->display_errors());

			//$this->smarty->view('gallery/demo.tpl', $error);
		}
		else
		{

#			print_r($this->upload->data());


			$data = array('upload_data' => $this->upload->data());
			print_r($data);
			//$this->smarty->view('gallery/demo.tpl', $data);
		}
	}
}