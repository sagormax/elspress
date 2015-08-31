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
	/*
	| Post permalink check
	*/
	public function permalinkCkh($permalink)
	{
		$args = array(
			'post_permalink'  =>  $permalink,
		);
		$query = $this->db->get_where('ep_posts', $args);
		return $query->num_rows();
	}

}