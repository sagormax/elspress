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

	// Edit User
	public function editUser( $id = null )
	{
		$data['userData'] = $this->umodel->getUserInfo( $id );
		( $data['userData'] ) ? $data['content'] = $this->load->view('editUserView', $data, true) : $data['content'] = $this->load->view('backend/404/notFound', '', true);
		$this->load->view('dashboard_layout', $data);
	}

	// User reg validate
	public function registrationValidate()
	{
		$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|max_length[30]|min_length[3]|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]|min_length[4]|xss_clean|is_unique[ep_users.user_name]');
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
				/*
				| First configure your mail server.
				| Send mail notification to user
				*/
				$uReq = $this->input->post('sendPasswd');
				$feedback = 0;
				if( $uReq ){

					// Mail Sending..
					$to      = $this->input->post("email", true); // Send email to our user
					$subject = 'Signup | Confirmation'; // Give the email a subject
					$message = '

					Thanks for signing up!
					Your account has been created, you can login with the following credentials.

					------------------------
					Username: '.$this->input->post("username", true).'
					Password: '.$this->input->post("pwd", true).'
					------------------------

					Please click this link to login your account:
					'.base_url('admin').'

					Thanks for using elsPress
					www.easyloopsoft.com
					';

					// Mail send
					$headers = 'From:no-reply@'.base_url() . "\r\n"; // Set from headers
					if ( ! @mail($to, $subject, $message, $headers) ){
						$this->session->set_flashdata('mailSendingError', 'Email sending failed to '.$to.'. Please contact your system Administrator. ');
					}


				}

				// show success Msg
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

	// User Edit Validate
	public function userEditValidate()
	{
		$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|max_length[30]|min_length[3]|xss_clean');
		//$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]|min_length[4]|xss_clean|is_unique[ep_users.user_name]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[30]|min_length[6]|xss_clean|valid_email');
		$this->form_validation->set_rules('nickname', 'Nickname', 'trim|required|max_length[20]|min_length[3]|xss_clean');

		// set validation custom message for username
		$this->form_validation->set_message('is_unique', 'Username already exists.');
		$id = $this->input->post('userid', true);

		if( $this->form_validation->run() == FALSE )
		{
			$data['userData'] = $this->umodel->getUserInfo( $id );
			( $data['userData'] ) ? $data['content'] = $this->load->view('editUserView', $data, true) : $data['content'] = $this->load->view('backend/404/notFound', '', true);
			$this->load->view('dashboard_layout', $data);
		}
		else
		{
			if( $this->umodel->updateUser( $id ) )
			{
				// show success Msg
				$this->session->set_flashdata('successMsg', 'User has been successfully updated.');
				redirect('users', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('errorMsg', 'User updating error has been occurred!!');
				redirect('addUser', 'refresh');
			}
		}
	}

	// User delete
	public function deleteUser( $id = null )
	{
		$current_user = $this->session->userdata('user_id');
		if( $id != $current_user )
		{
			$feedback = $this->umodel->deleteUser( $id );
			echo ( $feedback ) ? '1' : '-1';
		}
		else
			redirect('dashboard');
	}



}
