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

}