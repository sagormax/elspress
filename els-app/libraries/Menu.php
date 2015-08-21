<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* This class is for generate multi menu
*/
class Menu{

	public function generateMenu($attr)
	{
	 	$CI 					=& get_instance(); // Get CI Instance
	 	$table_name 			= $CI->security->xss_clean($attr['table_name']); // Receive table name

	 	if( $CI->db->table_exists( $table_name ) ) // Checking table
	 	{
			return $this->menuProcess( $attr, $table_name );
	 	}
	 	else
	 	{
	 		$CI->load->dbforge();

			$fields = array(
		        'ID' => array(
	                 'type' => 'bigint',
	                 'constraint' => 20,
	                 'auto_increment' => TRUE
	            ),
		        'menu_cat_id' => array(
                     'type' => 'bigint',
                     'constraint' => '20',
                ),
		        'menu_cat_name' => array(
                     'type' =>'VARCHAR',
                     'constraint' => '200',
                ),
		        'menu_name' => array(
                     'type' =>'VARCHAR',
                     'constraint' => '200',
                ),
		        'menu_parent' => array(
                     'type' => 'bigint',
                     'constraint' => '20',
                ),
		        'menu_url' => array(
                     'type' =>'VARCHAR',
                     'constraint' => '200',
                ),
			);
			$CI->dbforge->add_key('ID', TRUE); // Set Primary Key
			$CI->dbforge->add_field($fields); // Set fields
	 		$CI->dbforge->create_table($table_name, TRUE); // Creating Table

	 		/**
	 		* Insert sample data
	 		*/
	 		$sampleData1 = array(
	 			'menu_cat_id'		=> 1,
	 			'menu_cat_name'		=> 'Header Menu',
	 			'menu_name'			=> 'HTML',
	 			'menu_parent'		=> '0',
	 			'menu_url'			=> '#',
	 		);
	 		$CI->db->insert($table_name, $sampleData1);
	 		$sampleData2 = array(
	 			'menu_cat_id'		=> 1,
	 			'menu_cat_name'		=> 'Header Menu',
	 			'menu_name'			=> 'CSS',
	 			'menu_parent'		=> '0',
	 			'menu_url'			=> '#',
	 		);
	 		$CI->db->insert($table_name, $sampleData2);
	 		$sampleData3 = array(
	 			'menu_cat_id'		=> 1,
	 			'menu_cat_name'		=> 'Header Menu',
	 			'menu_name'			=> 'Body',
	 			'menu_parent'		=> '1',
	 			'menu_url'			=> 'http://www.google.com',
	 		);
	 		$CI->db->insert($table_name, $sampleData3);
	 		$sampleData4 = array(
	 			'menu_cat_id'		=> 1,
	 			'menu_cat_name'		=> 'Header Menu',
	 			'menu_name'			=> 'Color',
	 			'menu_parent'		=> '3',
	 			'menu_url'			=> '#',
	 		);
	 		$CI->db->insert($table_name, $sampleData4);
	 		$sampleData5 = array(
	 			'menu_cat_id'		=> 1,
	 			'menu_cat_name'		=> 'Header Menu',
	 			'menu_name'			=> 'Style',
	 			'menu_parent'		=> '2',
	 			'menu_url'			=> 'http://www.facebook.com',
	 		);
	 		$CI->db->insert($table_name, $sampleData5);
	 		$sampleData6 = array(
	 			'menu_cat_id'		=> 1,
	 			'menu_cat_name'		=> 'Header Menu',
	 			'menu_name'			=> 'Pink',
	 			'menu_parent'		=> '4',
	 			'menu_url'			=> 'http://www.color.com',
	 		);
	 		$CI->db->insert($table_name, $sampleData6);
	 		$sampleData7 = array(
	 			'menu_cat_id'		=> 1,
	 			'menu_cat_name'		=> 'Header Menu',
	 			'menu_name'			=> 'About',
	 			'menu_parent'		=> '0',
	 			'menu_url'			=> 'http://www.about.com',
	 		);
	 		$CI->db->insert($table_name, $sampleData7);
	 		$sampleData8 = array(
	 			'menu_cat_id'		=> 1,
	 			'menu_cat_name'		=> 'Header Menu',
	 			'menu_name'			=> 'Contact',
	 			'menu_parent'		=> '0',
	 			'menu_url'			=> 'http://www.contact.com',
	 		);
	 		$CI->db->insert($table_name, $sampleData8);


	 		return $this->menuProcess( $attr, $table_name ); // After creating table call again menuProcess
	 	}

	}



	// Checking data
	private function menuProcess( $attr, $table_name )
	{
		$CI 					=& get_instance(); // Get CI Instance
		$where					= array( 'menu_cat_id' => $attr['menu_cat_ID'] );
	    $all_list 				= $CI->db->get_where($table_name, $where)->result(); // Get table all data

	    if( empty($all_list) ) return "No data in this table" ;

		$menu_data 				= $all_list;
		$ul_class 				= $attr['ul_class'];
		$ul_ID 					= $attr['ul_ID'];
		$ul_attr 				= $attr['ul_attr'];
		$li_class 				= $attr['li_class'];
		$li_if_submenu_class	= $attr['li_if_submenu_class'];
		$ul_submenu_class 		= $attr['ul_submenu_class'];
		$ul_submenu_ID 			= $attr['ul_submenu_ID'];
		$output 				= "";

		$output .= '<ul class="'.$ul_class.' els-menu" id="'.$ul_ID.'" '.$ul_attr.'>';
		foreach ($menu_data as $menu)
		{
		    $id 		= $menu->ID;
		    $parent_id 	= $menu->menu_parent;
		    $name 		= $menu->menu_name;
		    $url 		= $menu->menu_url;

		    if($parent_id != 0) continue; // stop repeating

		    $child = $this->has_child($id, $menu_data, $li_if_submenu_class, $ul_submenu_class);
		    if($child)
		    {
		      $output .= '<li class="'.$li_if_submenu_class.' '.$li_class.'"><a href="'.$url.'">'.$name.'</a>';
			      $output .= '<ul class="'.$ul_submenu_class.'" id="'.$ul_submenu_ID.'">';
			        $output .= $child;
			      $output .= "</ul>";
			  $output .= "</li>";
		    }
		    else
		    {
		      $output .= '<li class="'.$li_class.'"><a href="'.$url.'">'.$name.'</a></li>';
		    }

		}
		$output .= '</ul>';
		return $output;


	}




	// Generate childs list
	private function has_child($id, $menu_data, $li_if_submenu_class, $ul_submenu_class)
	{
	    $child_class 	= $li_if_submenu_class." child-list";
	    $child_data 	= "";
	    $child_tree 	= ""; // Get under the child data
	    foreach ($menu_data as $child)
	    {
	        $child_id 			= $child->ID; // current child ID
	        $child_parent_id 	= $child->menu_parent; // current child parent ID
	        $url 				= $child->menu_url;
	        if( $child_parent_id == $id )
	        {
	          	// Recursive call for get child tree data
			    $results = $this->has_child($child_id, $menu_data, $li_if_submenu_class, $ul_submenu_class);

			    if($results)
			    {
			      $child_tree .= '<li class="'.$child_class.'"><a href="'.$url.'">'.$child->menu_name.'</a>';
				      $child_tree .= '<ul class="'.$ul_submenu_class.'">';
				        $child_tree .= $results;
				      $child_tree .= "</ul>";
				  $child_tree .= "</li>";
				  $child_data .= $child_tree; // concate under the child all data
			    }
			    else
			    {
			     $child_data .='<li class="child-list"><a href="'.$url.'">'.$child->menu_name.'</a></li>';
			    }

			}
	    }
	    return $child_data;
	}


}