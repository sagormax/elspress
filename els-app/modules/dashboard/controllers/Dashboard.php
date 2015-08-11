<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		if( ! $this->session->userdata('user_is_logged_in') ){
			redirect('admin', 'refresh');
		}
	}

	public function index()
	{
		$data['content'] = $this->load->view('homeView', '', true);
		$this->load->view('dashboard_layout', $data);
	}
	
	/*
	| Default 404 page
	*/
	public function pageNotFound()
	{
		$data['content'] = $this->load->view('backend/404/notFound', '', true);
		$this->load->view('dashboard_layout', $data);
	}

}
