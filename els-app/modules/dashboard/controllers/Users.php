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

	// Add User
	public function addUser()
	{
		$data['content'] = $this->load->view('addUserView', '', true);
		$this->load->view('dashboard_layout', $data);
	}

	// User reg validate
	public function registrationValidate()
	{

		$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|max_length[30]|min_length[3]|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[10]|min_length[4]|xss_clean|is_unique[ep_users.user_name]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[30]|min_length[6]|xss_clean|valid_email');
		$this->form_validation->set_rules('pwd', 'Password', 'trim|required|max_length[30]|min_length[6]|xss_clean');
		$this->form_validation->set_rules('pwd2', 'Confirm password', 'trim|required|max_length[30]|min_length[6]|xss_clean|matches[pwd]');

		// set validation custom message for username
		$this->form_validation->set_message('is_unique', 'Username already exists.');

		if( $this->form_validation->run() == FALSE )
		{
			$data['content'] = $this->load->view('addUserView', '', true);
			$this->load->view('dashboard_layout', $data);	
		}
		else
		{
			if( $this->umodel->addNewUser() )
			{
				$this->session->set_flashdata('successMsg', 'New user has been successfully added.');
				redirect('users', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('errorMsg', 'User creation error has been occurred!!');
				redirect('addUser', 'refresh');
			}
		}


	}



}
