<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');	

	if ( !function_exists('assets_url') )
	{
		function assets_url()
	    {
	        $ci=& get_instance();
	        return $ci->config->item('assets_url');
	    }
	}

	if ( !function_exists('admin_url') )
	{
		function admin_url()
	    {
	        $ci=& get_instance();
	        return $ci->config->item('admin_url');
	    }
	}//

	if ( !function_exists('user_url') )
	{
		function user_url()
	    {
	        $ci=& get_instance();
	        return $ci->config->item('user_url');
	    }
	}

	if ( !function_exists('is_admin_logged_in') )
	{
		function is_admin_logged_in()
	    {
	    	$ci=& get_instance();
	    	
    		$admin_session_data = $ci->session->userdata('admin_session_data'); 
	        $is_admin_logged_in = $admin_session_data['is_admin_logged_in'];

	        if(!isset($is_admin_logged_in) || $is_admin_logged_in == FALSE)
	        {
	            redirect(admin_url());
	        }
	    }
	}//

	if ( !function_exists('is_user_logged_in') )
	{
		function is_user_logged_in()
	    {
	    	$ci=& get_instance();
	    	
    		$user_session_data = $ci->session->userdata('user_session_data'); 
	        $is_user_logged_in = $user_session_data['is_user_logged_in'];

	        if(!isset($is_user_logged_in) || $is_user_logged_in == FALSE)
	        {
	            redirect(user_url());
	        }
	    }
	}

	if ( !function_exists('init_admin_element') )
	{
		function init_admin_element()
	    {
	    	init_admin_head();
	    }
	}//

	if ( !function_exists('init_user_element') )
	{
		function init_user_element()
	    {
	    	init_user_head();
	    }
	}

	if ( !function_exists('init_admin_head') )
	{
		function init_admin_head()
	    {
    		$ci=& get_instance();
	    	$data = array();

	    	$controller = $ci->router->fetch_class(); // class = controller
			$method = $ci->router->fetch_method();

			$data['controller'] = $controller;
			$data['method'] = $method;			
			$data['page_title'] 		= "Test Admin";
			$data['page_keyword'] 		= "Test Admin";
			$data['page_description'] 	= "Test Admin";
			
			$data['a_session_data'] = $ci->session->userdata('admin_session_data'); 
			
			$ci->load->view('admin/include/head',$data,true);
	    }
	}//

	if ( !function_exists('init_user_head') )
	{
		function init_user_head()
	    {
    		$ci=& get_instance();
	    	$data = array();

	    	$controller = $ci->router->fetch_class(); // class = controller
			$method = $ci->router->fetch_method();

			$data['controller'] = $controller;
			$data['method'] = $method;			
			$data['page_title'] 		= "Test User";
			$data['page_keyword'] 		= "Test User";
			$data['page_description'] 	= "Test User";
			
			$data['b_session_data'] = $ci->session->userdata('user_session_data'); 
			
			$ci->load->view('user/include/head',$data,true);
	    }
	}

	//print old form data
	if (!function_exists('old')) {
		function old($field, $defult = '')
		{
			$ci =& get_instance();
			if (isset($ci->session->flashdata('form_data')[$field])) {
				return html_escape($ci->session->flashdata('form_data')[$field]);
			}else{
				return $defult;
			}
		}
	}

	function profileimage($photoname) {
	    $src = '';
        if($photoname != NULL) {
            if(file_exists(FCPATH.'uploads/profile/original/'.$photoname)) {
                $src = base_url('uploads/profile/original/'.$photoname);
            } else {
                $src = base_url('uploads/profile/default.png');
            }
        } else {
            $src = base_url('uploads/profile/default.png');
        }
	    return $src;
	}

	// function user() {
	// 	$ci =& get_instance();
	// 	return $ci->user;
	// }