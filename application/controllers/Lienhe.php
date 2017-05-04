<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lienhe extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function view()
	{
		$data['active'] = 'lienhe';
		//get all methods in class by class name
		// print_r(get_class_methods(get_class($this->load)));
		print_r(get_object_vars ($this->load));
		$this->load->view('common/header', $data);
        $this->load->view('lienhe',$data);
        $this->load->view('common/footer', $data);
	}
}
