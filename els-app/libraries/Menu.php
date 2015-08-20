<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* This class is for generate multi menu
*/
class Menu{

	public function generateFrontendMenu($attr)
	{
	 	$CI =& get_instance();
	    $CI->load->model('usersModel', 'umodel');

	    $all_list = $CI->db->get('ep_menu')->result();

		$menu_data = $all_list;
		$ul_class = "nav nav-bar";
		$ul_ID = "nav";
		$li_class = "item_list";
		$ul_submenu_class = "secondary_menu";
		$ul_submenu_ID = "secondary";
		$custom_child_class = "";
		$output = "";

		$output .= '<ul class="'.$ul_class.' els-menu" id="'.$ul_ID.'">';
		foreach ($menu_data as $menu)
		{
		    $id = $menu->ID;
		    $parent_id = $menu->menu_parent;
		    $name = $menu->menu_name;
		    if($parent_id != 0) continue;

		    $output .= '<li class="'.$li_class.'">'.$name;
		    $child = $this->has_child($id, $menu_data, $custom_child_class);
		    if($child)
		    {
		      $output .= '<ul class="submenu">';
		        $output .= $child;
		      $output .= "</ul>";
		    }
		    $output .= "</li>";

		}
		$output .= '</ul>';
		return $output;

	}


	// Generate child Level 1 list
	public function has_child($id, $menu_data, $custom_child_class)
	{
	    $child_class = $custom_child_class." child_list_level_1";
	    $child_data = "";
	    $child_2_data = "";
	    foreach ($menu_data as $child)
	    {
	        $child_id = $child->ID;
	        $child_parent_id = $child->menu_parent;
	        if( $child_parent_id == $id )
	          $child_data .='<li class="'.$child_class.'">'.$child->menu_name;

			    $child_2 = $this->has_child_2($child_id, $menu_data);
			    if($child_2)
			    {
			      $child_2_data .= '<ul class="submenu level_2">';
			        $child_2_data .= $child_2;
			      $child_2_data .= "</ul>";
			    }
			    //$child_data .= $child_2_data;
			    $child_data .= "</li>";

	    }
	    return $child_data;
	}


	// Generate child 2nd level list
	public function has_child_2($child_id, $menu_data)
	{
	    $child_class = " child_list_level_2";
	    $child_data_2 = "";
	    foreach ($menu_data as $child_2)
	    {
	        $child_parent_id_2 = $child_2->menu_parent;
	        if( $child_parent_id_2 == $child_id )
	          $child_data_2 .='<li class="'.$child_class.'">'.$child_2->menu_name.'</li>';

	    }
	    return $child_data_2;
	}

}