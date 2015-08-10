<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		if( ! $this->session->userdata('user_is_logged_in') )
		{
			redirect('admin', 'refresh');
		}
		$this->load->model('usersModel', 'umodel');
	}

	public function index()
	{	
		$feedback['getAllUser'] = $this->umodel->usersList();
		$data['content'] = $this->load->view('usersView', $feedback, true);
		$this->load->view('dashboard_layout', $data);
	}
}
