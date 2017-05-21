<?php
class Authenticate {
	private $CI;
	function AllowOnlyAdmin() {
		$this->CI =& get_instance();
		//return true;
		//var_dump($_SESSION);exit;
		//$CI = & get_instance();
		var_dump($this->CI);exit;


		$CI->load->library('session');
		$user = $CI->session->userdata("login");
		$controller = $CI->uri->uri_string();
		if(preg_match('/^admin/i',$controller)) {
			if($user && $user->admin!=1) {
				redirect('user');
			}
		}
		echo 'Display in hook OK<br/>';
	}
}