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

	/*
	| Category history
	*/
	public function getPostCatHistory()
	{
		$query = $this->db->get('ep_post_category');
		return $query->result();
	}

	/*
	| Tag history
	*/
	public function getPostTagHistory()
	{
		$query = $this->db->get('ep_post_tag');
		return $query->result();
	}

	/*
	| Submit new post
	*/
	public function submitPost()
	{
		$catSet = $this->input->post('postCategory[]', TRUE);
		$tagSet = $this->input->post('postTag[]', TRUE);
		//$tag = implode(',', $tagSet);

		$this->db->select('cat_permalink');
		$this->db->where_in('ID', $catSet);
		$catQuery = $this->db->get('ep_post_category');
		$results = $catQuery->result();
		$data = array();
		foreach ($results as $key => $result) {
			array_push($data, $result->cat_permalink);
		}

		$cat = implode(',', $data);

		//var_dump($data);
		echo $cat;

		// $attr = array(
		// 	'post_title'		=> $this->input->post('postTitle', TRUE),
		// 	'post_permalink'  	=> $this->input->post('postPermalink', TRUE),
		// 	'post_content'  	=> $this->input->post('postDescription', TRUE),
		// 	'post_excerpt'  	=> $this->input->post('postExcerpt', TRUE),
		// 	'post_categories'  	=> $cat,
		// 	'post_tag'  		=> $tag,
		// 	'post_status'  		=> $this->input->post('postStatus', TRUE),
		// 	'post_parent'  		=> $this->input->post('postParent', TRUE),
		// 	'menu_order'  		=> $this->input->post('postOrder', TRUE),
		// 	'post_modified'  	=> $this->input->post('postDate', TRUE),
		// );

		// try {
		// 	return $this->db->insert('ep_posts', $attr);
		// } catch (Exception $e) {
		// 	return false;
		// }

	}

}