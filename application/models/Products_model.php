<?php
class Theloai_model extends CI_Model
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->database();
    }
	public function getMainCategory(){
		$category = DB::table('category')->where('parent', 0)->get();
		return $category;
	}
	public function getSubCategory($parent){
		$category = DB::table('category')->where('parent', $parent)->get();
		return $category;
	}
}

?>