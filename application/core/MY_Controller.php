<?php 
// Create file application/core/MY_Controller.php
class Auth_Controller extends CI_Controller {
    function __construct() {
        parent::__construct();
        $user = $this->session->userdata("login");
		$controller = $this->uri->uri_string();
		/*if(preg_match('/^admin/i',$controller)) {
			if(!$user || $user->admin!=1) {
				redirect('user');
			}
		}*/
    }
}
?>