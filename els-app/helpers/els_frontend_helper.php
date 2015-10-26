<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Get header
*/
if ( ! function_exists('get_header'))
{
    function get_header( $part = null )
    {
      $CI	=& get_instance(); // Get CI Instance
      if( $part == null ){
        $CI->load->view('frontend/header');
      }
      else {
        $CI->load->view('frontend/header-'.$part);
      }
    }
}

/**
* Get footer
*/
if ( ! function_exists('get_footer'))
{
    function get_footer( $part = null )
    {
      $CI	=& get_instance(); // Get CI Instance
      if( $part == null ){
        $CI->load->view('frontend/footer');
      }
      else {
        $CI->load->view('frontend/footer-'.$part);
      }
    }
}


/**
* Get part
*/
if ( ! function_exists('include_file'))
{
    function include_file( $part = null )
    {
      $CI	=& get_instance(); // Get CI Instance
      if( $part == null ){
        echo "Null";
      }
      else {
        $CI->load->view('frontend/'.$part);
      }
    }
}

/**
* Get content
*/
if ( ! function_exists('get_posts'))
{
    function get_posts( $args = null )
    {
      $CI	=& get_instance(); // Get CI Instance
      if( $args == null ){
        echo "No post found";
      }
      else {
        echo 'looping';
      }
    }
}
