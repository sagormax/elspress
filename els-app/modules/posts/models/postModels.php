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
	public function permalinkCkh($permalink, $ID)
	{
		$this->db->where('ID !=', $ID);
		$this->db->where('post_permalink =', $permalink);
		$query = $this->db->get('ep_posts');
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
	| Category by ID
	*/
	public function getCatByID($id)
	{
		$query = $this->db->get_where('ep_post_category', array('ID' => $id));
		//var_dump($query->num_rows());exit();
		if( $query->num_rows() ){
			return $query->result();
		}
		else{	
			$this->session->set_flashdata('errorMsg', 'Category Listing failed.');
			redirect('posts/categories', 'refresh');
		}
	}

	/*
	| Tag by ID
	*/
	public function getTagByID($id)
	{
		$query = $this->db->get_where('ep_post_tag', array('ID' => $id));
		//var_dump($query->num_rows());exit();
		if( $query->num_rows() ){
			return $query->result();
		}
		else{	
			$this->session->set_flashdata('errorMsg', 'Tag Listing failed.');
			redirect('posts/tag', 'refresh');
		}
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
		$pStatus = $this->input->post('postStatus', TRUE);
		$pStatus = ( $pStatus == 1 ) ? "publish" : "disable";
		$pParent = $this->input->post('postParent', TRUE);
		$pParent = ( $pParent == -1 ) ? 0 : $pParent;
		$cat = $this->CatTagFilter($catSet, 'ep_post_category', 'cat_permalink');
		$tag = $this->CatTagFilter($tagSet, 'ep_post_tag', 'tag_permalink');

		$attr = array(
			'post_title'		=> $this->input->post('postTitle', TRUE),
			'post_permalink'  	=> $this->input->post('postPermalink', TRUE),
			'post_content'  	=> $this->input->post('postDescription', TRUE),
			'post_excerpt'  	=> $this->input->post('postExcerpt', TRUE),
			'post_categories'  	=> $cat,
			'post_tag'  		=> $tag,
			'post_status'  		=> $pStatus,
			'post_parent'  		=> $pParent,
			'menu_order'  		=> $this->input->post('postOrder', TRUE),
			'post_modified'  	=> $this->input->post('postDate', TRUE),
			'post_author' 		=> $this->session->userdata('user_name'),
		);

		try {
			return $this->db->insert('ep_posts', $attr);
		} catch (Exception $e) {
			return false;
		}

	}


	/*
	| Update new post
	*/
	public function updatePost()
	{
		$updatePostID = $this->input->post('updatePostID', TRUE);
		$catSet = $this->input->post('postCategory[]', TRUE);
		$tagSet = $this->input->post('postTag[]', TRUE);
		$pStatus = $this->input->post('postStatus', TRUE);
		$pStatus = ( $pStatus == 1 ) ? "publish" : "disable";
		$pParent = $this->input->post('postParent', TRUE);
		$pParent = ( $pParent == -1 ) ? 0 : $pParent;
		$cat = $this->CatTagFilter($catSet, 'ep_post_category', 'cat_permalink');
		$tag = $this->CatTagFilter($tagSet, 'ep_post_tag', 'tag_permalink');

		$attr = array(
			'post_title'		=> $this->input->post('postTitle', TRUE),
			'post_permalink'  	=> $this->input->post('postPermalink', TRUE),
			'post_content'  	=> $this->input->post('postDescription', TRUE),
			'post_excerpt'  	=> $this->input->post('postExcerpt', TRUE),
			'post_categories'  	=> $cat,
			'post_tag'  		=> $tag,
			'post_status'  		=> $pStatus,
			'post_parent'  		=> $pParent,
			'menu_order'  		=> $this->input->post('postOrder', TRUE),
			'post_modified'  	=> $this->input->post('postDate', TRUE),
			'post_author' 		=> $this->session->userdata('user_name'),
		);

		try {
			$this->db->where('ID', $updatePostID);
			return $this->db->update('ep_posts', $attr);
		} catch (Exception $e) {
			return false;
		}

	}

	/*
	| Delete Post
	*/
	public function deletePost( $id )
	{
		$attr = array(
			'ID'	=>	$id
		);

		try
		{
            return $this->db->delete('ep_posts', $attr);
        }
        catch(Exception $e)
        {
            return false;
        }
	}	


	/*
	| Cat and tag filter
	*/
	private function CatTagFilter($items, $table, $select)
	{
		if( !empty($items) )
		{
			$this->db->select($select);
			$this->db->where_in('ID', $items);
			$catQuery = $this->db->get($table);
			$results = $catQuery->result();
			$data = array();
			foreach ($results as $key => $result) {
				array_push($data, $result->$select);
			}

			$results = implode(',', $data);

			return $results;
		}
		else{	
			return '';
		}
	}



	/*
	| Submit new Category
	*/
	public function submitCat()
	{
		$catName = $this->input->post('catName', TRUE);
		$catPermalink = strtolower($catName);
		$catPermalink = str_replace(" ", "-", $catPermalink);

		$attr = array(
			'cat_name'		=> $catName,
			'cat_permalink'	=> $catPermalink,
		);

		try {
			return $this->db->insert('ep_post_category', $attr);
		} catch (Exception $e) {
			return false;
		}

	}



	/*
	| Update Category
	*/
	public function updateCat()
	{
		$catName = $this->input->post('catName', TRUE);
		$catPermalink = $this->input->post('updateCatPermalink', TRUE);
		$catID = $this->input->post('catHiddenID', TRUE);

		$catPermalink = strtolower($catPermalink);
		$catPermalink = str_replace(" ", "-", $catPermalink);

		$this->db->where('ID !=', $catID);
		$this->db->where('cat_permalink =', $catPermalink);
		$query = $this->db->get('ep_post_category');
		$feedback = $query->num_rows();

		if( ! $feedback ){ 
			$attr = array(
				'cat_name'		=> $catName,
				'cat_permalink'	=> $catPermalink,
			);

			try {
				$this->db->where('ID', $catID);
				return $this->db->update('ep_post_category', $attr);
			} catch (Exception $e) {
				return false;
			}
		}
		else{
			// Permalink is already exists
			$this->session->set_flashdata('errorMsg', 'Category Name or Permalink already exists.');
			redirect('posts/categories', 'refresh');
		}

	}

	/*
	| Delete category
	*/
	public function deleteCat( $id )
	{
		$attr = array(
			'ID'	=>	$id
		);

		try
		{
            return $this->db->delete('ep_post_category', $attr);
        }
        catch(Exception $e)
        {
            return false;
        }
	}	


	/*
	| Submit new Tag
	*/
	public function submitTag()
	{
		$tagName = $this->input->post('tagName', TRUE);
		$tagPermalink = strtolower($tagName);
		$tagPermalink = str_replace(" ", "-", $tagPermalink);

		$attr = array(
			'tag_name'		=> $tagName,
			'tag_permalink'	=> $tagPermalink,
		);

		try {
			return $this->db->insert('ep_post_tag', $attr);
		} catch (Exception $e) {
			return false;
		}

	}

	/*
	| Delete Tag
	*/
	public function deleteTag( $id )
	{
		$attr = array(
			'ID'	=>	$id
		);

		try
		{
            return $this->db->delete('ep_post_tag', $attr);
        }
        catch(Exception $e)
        {
            return false;
        }
	}		

	/*
	| Get post by ID
	*/		
	public function getPostByID($id)
	{
		$query = $this->db->get_where('ep_posts', array('ID' => $id));
		return $query->result();

	}


}