<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Front page login
 */
class Welcome extends CI_Controller
{

  public function index()
  {
    $this->load->view('frontend/index');
  }

}
