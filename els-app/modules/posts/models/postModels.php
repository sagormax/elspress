<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostModels extends CI_Model{

	/*
	| Get All Post Lists
	*/
	public function postsList()
	{

		$query = $this->db->get('ep_posts');
		return $query->result();
	}


}