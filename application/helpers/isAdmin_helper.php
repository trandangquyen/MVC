<?php

	$CI = & get_instance();
	$CI->load->library('session');
	$user = $CI->session->userdata("login");
	$controller = $CI->uri->uri_string();
	if(preg_match('/^admin/i',$controller)) {
		if($user && $user->admin!=1) {
			redirect('user');
			return true;
		}
	    return false;
	}

?>