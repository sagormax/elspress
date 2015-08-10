<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model{

	/*
	| Get all Users Details
	*/
	public function usersList()
	{	
		$attr = array('ID', 'user_name', 'user_nicename', 'user_email', 'user_url', 'user_registered', 'user_status', 'display_name');
		$this->db->select($attr);
		$query = $this->db->get('ep_users');
		return $query->result();		
	}
}