<?php
// echo "<br>đã import listProducts_Model.php<br>";
class createProduct{
	public $name;
	public $image;
	public $descript;
	public $price;
	public function __construct($name,$image,$descript,$price){
		$this->name = $name;
		$this->image = $image;
		$this->descript = $descript;
		$this->price = $price;
	}
}
class listProducts_Model{
	public function __construct(){
		// echo "<br>đã khởi tạo đối tượng listProducts_Model";
	}
	public function loadProducts(){
		// echo "<br> quyenstring";
		return array(

			"Product1" => new createProduct("iphone 5","public/template/site/images/product1.jpg" ,"this is a description","500$") , 
			"Product2" => new createProduct("iphone 6","public/template/site/images/product2.jpg" ,"this is a description","600$") , 
			"Product3" => new createProduct("iphone 7","public/template/site/images/product3.jpg" ,"this is a description","700$"),
			"Product4" => new createProduct("Sony Xperia M4 Aqua Dual","public/template/site/images/product4.jpg" ,"this is a description","700$"),
			"Product5" => new createProduct("Samsung Galaxy Note 5","public/template/site/images/product5.jpg" ,"this is a description","700$"),
			"Product6" => new createProduct("Sony Xperia M4 Aqua Dual","public/template/site/images/product6.jpg" ,"this is a description","700$")

		);
	}
	public function showProducts(){
		
	}
}



?>