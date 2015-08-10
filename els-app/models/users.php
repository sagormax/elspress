<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model{

	/*
	| User Name & Password Checking
	*/
	public function loginCredential($userName, $userPass)
	{
		$attr = array(
			'user_name' => $userName,
			'user_pass' => $userPass,
			'user_status' => 1,
		);
		$feedback = $this->db->get_where('ep_users', $attr);
		if( $feedback->num_rows() == 1 )
		{
			$attr = array(
				'user_id'	=> 	$feedback->first_row()->ID,
				'user_name'	=> 	$feedback->first_row()->display_name,
				'user_is_logged_in'	=> 	1,
			);
			$this->session->set_userdata($attr);			
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}



}