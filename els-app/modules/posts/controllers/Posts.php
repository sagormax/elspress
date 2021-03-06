<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends MX_Controller {


	function __construct()
	{
		parent::__construct();
		if( ! $this->session->userdata('user_is_logged_in') ){
			redirect('admin', 'refresh');
		}
		$this->load->model('postModels', 'pmodel');
	}

	public function index()
	{
		$data['postLists'] = $this->getPostHistory();
		$data['content'] = $this->load->view('all_posts', $data, true);
		$this->load->view('dashboard/dashboard_layout', $data);
	}

	/*
	| Get all post history
	*/
	private function getPostHistory()
	{
		return $this->pmodel->postsList();
	}

	/*
	| Get all Category history
	*/
	private function getPostCatHistory()
	{
		return $this->pmodel->getPostCatHistory();
	}

	/*
	| Get all Tag history
	*/
	private function getPostTagHistory()
	{
		return $this->pmodel->getPostTagHistory();
	}

	/*
	| Add new post
	*/
	public function addPost()
	{
		$data['postLists'] = $this->getPostHistory();
		$data['postCat'] = $this->getPostCatHistory();
		$data['postTag'] = $this->getPostTagHistory();
		$data['content'] = $this->load->view('add_post', $data, true);
		$this->load->view('dashboard/dashboard_layout', $data);
	}

	/*
	| Submit new post
	*/
	public function submitPost()
	{
		$feedback = $this->pmodel->submitPost();
		if( $feedback ){
			$this->session->set_flashdata('successMsg', 'Post added successfully.');
			redirect('posts/addPost', 'refresh');
		}
		else{
			$this->session->set_flashdata('errorMsg', 'Post added Failed.');
			redirect('posts/addPost', 'refresh');
		}
	}

	/*
	| Update new post
	*/
	public function updatePost()
	{
		$updatePostID = $this->input->post('updatePostID', TRUE);
		$feedback = $this->pmodel->updatePost();
		if( $feedback ){
			$this->session->set_flashdata('successMsg', 'Post updated successfully.');
			redirect('posts/getPost/'.$updatePostID, 'refresh');
		}
		else{
			$this->session->set_flashdata('errorMsg', 'Post updated Failed.');
			redirect('posts/getPost/'.$updatePostID, 'refresh');
		}
	}	

	/*
	| Delete post
	*/
	public function deletePost( $id = null )
	{
		$feedback = $this->pmodel->deletePost( $id );
		echo ( $feedback ) ? '1' : '-1';

	}	

	/*
	| Ajax Permalink check for new post
	*/
	public function permalinkCkh()
	{
		$permalink = $this->input->post('permalink', TRUE);
		$ID = $this->input->post('id', TRUE);
		$feedback = $this->pmodel->permalinkCkh($permalink, $ID);
		if ($feedback) {
			echo -1;
		}
		else{
			echo 1;
		}

	}
	

	/*
	| Category View
	*/
	public function categories()
	{
		$data['postCat'] = $this->getPostCatHistory();
		$data['content'] = $this->load->view('add_cat', $data, true);
		$this->load->view('dashboard/dashboard_layout', $data);
	}


	/*
	| Delete category
	*/
	public function deleteCat( $id = null )
	{
		$feedback = $this->pmodel->deleteCat( $id );
		echo ( $feedback ) ? '1' : '-1';

	}

	/*
	| Tag View
	*/
	public function tag()
	{
		$data['postTag'] = $this->getPostTagHistory();
		$data['content'] = $this->load->view('add_tag', $data, true);
		$this->load->view('dashboard/dashboard_layout', $data);
	}	

	/*
	| Delete Tag
	*/
	public function deleteTag( $id = null )
	{
		$feedback = $this->pmodel->deleteTag( $id );
		echo ( $feedback ) ? '1' : '-1';

	}	

	/*
	| Category Submit
	*/
	public function submitCat()
	{
		$this->form_validation->set_rules('catPermalink', 'Category Name', 'trim|required|xss_clean|is_unique[ep_post_category.cat_permalink]');
		
		// set validation custom message for username
		$this->form_validation->set_message('is_unique', 'Category Name already exists.');

		if( $this->form_validation->run() == FALSE )
		{
			$this->session->set_flashdata('errorMsg', 'Category Name already exists.');
			redirect('posts/categories', 'refresh');
		}
		else
		{
			$feedback = $this->pmodel->submitCat();
			if( $feedback ){
				$this->session->set_flashdata('successMsg', 'Category added successfully.');
				redirect('posts/categories', 'refresh');
			}
			else{
				$this->session->set_flashdata('errorMsg', 'Category added failed.');
				redirect('posts/categories', 'refresh');
			}			
		}
	}

	/*
	| Category update view
	*/
	public function updateCatView( $id = null )
	{
		$data['editCat'] = $this->pmodel->getCatByID($id);
		$data['postCat'] = $this->getPostCatHistory();
		$data['content'] = $this->load->view('add_cat', $data, true);
		$this->load->view('dashboard/dashboard_layout', $data);
	}


	/*
	| Category update
	*/
	public function updateCat()
	{	
		$feedback = $this->pmodel->updateCat();
		if( $feedback ){
			$this->session->set_flashdata('successMsg', 'Category updated successfully.');
			redirect('posts/categories', 'refresh');	
		}
		else{
			$this->session->set_flashdata('errorMsg', 'Category updated failed.');
			redirect('posts/categories', 'refresh');
		}
	}


	/*
	| Tag Submit
	*/
	public function submitTag()
	{
		$this->form_validation->set_rules('tagPermalink', 'Tag Name', 'trim|required|xss_clean|is_unique[ep_post_tag.tag_permalink]');
		
		// set validation custom message for username
		$this->form_validation->set_message('is_unique', 'Tag Name already exists.');

		if( $this->form_validation->run() == FALSE )
		{
			$this->session->set_flashdata('errorMsg', 'Tag Name already exists.');
			redirect('posts/tag', 'refresh');
		}
		else
		{
			$feedback = $this->pmodel->submitTag();
			if( $feedback ){
				$this->session->set_flashdata('successMsg', 'Tag added successfully.');
				redirect('posts/tag', 'refresh');
			}
			else{
				$this->session->set_flashdata('errorMsg', 'Tag added failed.');
				redirect('posts/tag', 'refresh');
			}			
		}
	}

	/*
	| Tag update view
	*/
	public function updateTagView( $id = null )
	{
		$data['editTag'] = $this->pmodel->getTagByID($id);
		// var_dump($data['editTag']);exit();
		$data['postTag'] = $this->getPostTagHistory();
		$data['content'] = $this->load->view('add_tag', $data, true);
		$this->load->view('dashboard/dashboard_layout', $data);
	}


	/*
	| Tag update
	*/
	public function updateTag()
	{	
		$feedback = $this->pmodel->updateTag();
		if( $feedback ){
			$this->session->set_flashdata('successMsg', 'Tag updated successfully.');
			redirect('posts/tag', 'refresh');	
		}
		else{
			$this->session->set_flashdata('errorMsg', 'Tag updated failed.');
			redirect('posts/tag', 'refresh');
		}
	}			
		

	/*
	| Edit post view
	*/	
	public function getPost($id = null)
	{
		$data['post'] = $this->pmodel->getPostByID($id);
		$data['postLists'] = $this->getPostHistory();
		$data['postCat'] = $this->getPostCatHistory();
		$data['postTag'] = $this->getPostTagHistory();
		if( $data['post'] ){
			$data['content'] = $this->load->view('edit_posts', $data, true);
			$this->load->view('dashboard/dashboard_layout', $data);
		}
		else{
			redirect('posts', 'refresh');
		}	
	}	


}