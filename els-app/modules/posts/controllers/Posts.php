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
		$data['postLists'] = $this->pmodel->postsList();
		$data['content'] = $this->load->view('all_posts', $data, true);
		$this->load->view('dashboard/dashboard_layout', $data);
	}

	/*
	| Add new post
	*/
	public function addPost()
	{
		$data['content'] = $this->load->view('add_post', '', true);
		$this->load->view('dashboard/dashboard_layout', $data);
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