<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model{

	/*
	| Prepare MD5 Hash
	*/
	private function do_hash( $data )
	{
		return md5($data);
	}

	/*
	| Get All User Lists
	*/	
	public function usersList()
	{	
		$attr = array('ID', 'user_name', 'user_nicename', 'user_email', 'user_url', 'user_registered', 'user_status', 'display_name');
		$this->db->select($attr);
		$query = $this->db->get('ep_users');
		return $query->result();		
	}

	/*
	| Add New User
	*/	
	public function addNewUser()
	{
		$attr = array(
			'user_pass'		=>	$this->do_hash( $this->input->post('pwd') ),
			'display_name'	=>	$this->input->post('fullname'),
			'user_name'		=>	$this->input->post('username'),
			'user_email'	=>	$this->input->post('email'),
		);

		try 
		{
            return $this->db->insert('ep_users', $attr);
        } 
        catch(Exception $e) 
        {
            return false;
        }

	}



}