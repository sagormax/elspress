<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('users', 'usersModel');
				
	}

	/*
	| Controller Default Calling 
	*/	
	public function index()
	{	
		if( $this->session->userdata('user_is_logged_in') ){
			redirect('welcome', 'refresh');
		}
		$this->load->view('backend/login/AdminLogin');
	}

	/*
	| Prepare MD5 Hash
	*/
	private function do_hash( $data )
	{
		return md5($data);
	}

	/*
	| Login Form Data Validation
	*/
	public function loginCheck()
	{
		$userName = $this->input->post('userName', TRUE);
		$pass = $this->do_hash( $this->input->post('userPass') );
		$feedBack = $this->usersModel->loginCredential($userName, $pass);
		if( $feedBack ) 
		{
			redirect('welcome', 'refresh');	
		} 
		else
		{
			$this->session->set_flashdata('authError', 'username or password is invalid!');
			redirect('admin', 'refresh');
		}
	}

	/*
	| Recover Form Data Validation
	*/	
	public function recoverUser()
	{
		echo 'done _ recover';
	}

	/*
	| Logout 
	*/	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin', 'refress');
	}	


}