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
	| Ajax Permalink check
	*/
	public function permalinkCkh()
	{
		$permalink = $this->input->post('permalink', TRUE);
		$feedback = $this->pmodel->permalinkCkh($permalink);
		if ($feedback) {
			echo -1;
		}
		else{
			echo 1;
		}

	}

}