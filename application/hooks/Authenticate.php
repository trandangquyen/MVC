<?php
class Authenticate {
	private $CI;
	function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->library('session');
	}
	function AllowOnlyAdmin() {
		$user = $this->CI->session->userdata("login");
		$controller = $this->CI->uri->uri_string();
		if(preg_match('/^admin/i',$controller)) {
			if(!$user || $user['admin']!=1) {
				redirect('user');
			}
		}
		//echo 'Display in hook OK<br/>';
	}
}