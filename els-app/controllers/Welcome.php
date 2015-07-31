<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('users', 'usersModel');
		if( ! $this->session->userdata('user_is_logged_in') ){
			redirect('admin', 'refresh');
		}
	}

	public function index()
	{

		$this->load->view('welcome_message');
	}
}
