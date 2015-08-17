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
	| Prepare Rand Number
	*/
	private function do_rand()
	{
		return md5(rand());
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
			'user_status'	=>	1,
			'user_activation_key'  => $this->do_rand(),
			'user_url'		=>	base_url('user/'.$this->input->post('username')),
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

	/*
	| Delete User
	*/
	public function deleteUser( $id )
	{

		$attr = array(
			'ID'	=>	$id
		);

		try
		{
            return $this->db->delete('ep_users', $attr);
        }
        catch(Exception $e)
        {
            return false;
        }

	}


	/*
	| Get Perticular User Info
	*/
	public function getUserInfo( $id )
	{

		$attr = array(
			'ID'	=>	$id
		);

		$selectAttr = array('ID', 'user_name', 'user_email', 'user_nicename', 'display_name');

		try
		{
			$this->db->select($selectAttr);
			$query = $this->db->get_where('ep_users', $attr);
			return $query->result();
        }
        catch(Exception $e)
        {
            return false;
        }

	}

	/*
	| User Update
	*/
	public function updateUser( $id )
	{

		$attr = array(
			'display_name'	=>	$this->input->post('fullname'),
			'user_email'	=>	$this->input->post('email'),
			'user_nicename'	=>	$this->input->post('nickname'),
		);

		try
		{
			$this->db->where('ID', $id);
			return $this->db->update('ep_users', $attr);
        }
        catch(Exception $e)
        {
            return false;
        }

	}



}