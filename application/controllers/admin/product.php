<?php 

class Product extends CI_Controller {
	function __construct() {
		parent::__construct();
        $this->load->model('Products_model');
		$this->load->model('Category_model');
        $this->load->helper('url','isAdmin');
        $this->load->database();
	}
    function index($data=null) {
        $data = $this->session->flashdata('data');
        if(!empty($_POST['delete'])) return $this->deteleProduct();
        $this->load->library('pagination');
        //$data['products'] = $this->Products_model->listProducts();

        $data['products'] = $this->Products_model->listProducts();
        $config['base_url'] = base_url('/admin/product');
        $config['total_rows'] = count((array)$data['products']);
        $config['per_page'] = 6;
        $config['use_page_numbers'] = true;
        $config['page_query_string'] = TRUE; 
        $config['first_url'] = site_url('/admin/product');
        $config['first_link'] = 'Trang đầu';
        $config['last_link'] = 'Trang cuối';
        $this->pagination->initialize($config);
        $page = (int)$this->input->get('per_page', TRUE);
        if($page<1) $page = 1;
        $start = ($page-1)*$config['per_page'];
        $data['products'] = $this->Products_model->listProducts(null,null,$start,6);

        //$this->load->view('admin/product', $data);

        $data['active'] = 'sanpham';

        $this->load->view('admin/common/admin-header.php', $data);
        $this->load->view('admin/product.php', $data);
        $this->load->view('admin/common/admin-footer.php', $data);

    }
    function addProduct() {
        if(!empty($_POST['product'])) {
            if(empty($_POST['product']['name'])) $data['error'] = 'Hãy điền tên sản phẩm';
            else { 
        		$insert = array(
                    'name' => $_POST['product']['name'],
                    'price' => $_POST['product']['price'],
                    'category_id' => @implode(',',$_POST['product']['categorys']),
                    'description' => $_POST['product']['description'],
                    'display' => isset($_POST['product']['display']) ? 1 : 0,
                );
                //var_dump($insert);exit;
                if(!empty($_FILES['product'])) {
                    /*$config['upload_path']          = './uploads/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 1000;
                    $this->upload->do_upload($field_name);
                    $this->load->library('upload', $config);
                    */
                    $images = null;
                    for($i=0;$i<count($_FILES['product']['name']['image']);$i++) {
                        $filename = $_FILES['product']['name']['image'][$i];
                        $tmp_name = $_FILES['product']['tmp_name']['image'][$i];
                        $filesize = $_FILES['product']['size']['image'][$i];
                        $pathfile = './upload/'.$filename;
                        if($filename && $filesize) {
                            if(move_uploaded_file($tmp_name, $pathfile)) { 
                                $images[] = array(
                                    'title' => $filename,
                                    'url' => $pathfile,
                                    //'product_id' => $id,
                                );
                            }
                        }
                    }
                    if(!empty($images)) $insert['thumb'] = $images[0]['url'];
                }
        		if($id=$this->Products_model->addProduct($insert)) {
                    if(!empty($images)) {
                        for($i=0;$i<count($images);$i++) {
                            $images[$i]['product_id'] = $id;
                        }
                        $this->Products_model->addImageProducts($images);
                    }
                    $data['success'] = 'Thêm sản phẩm thành công';
                    //return $this->index($data);
                } else $data['error'] = 'Thêm sản phẩm thất bại';
        	}
            $this->session->set_flashdata('data', $data);
            redirect('admin/product');
        }
        $data['active'] = 'sanpham';
        $data['categorys'] = $this->Category_model->getAllCategory();
        //var_dump($data['categorys']);exit;

        $this->load->view('admin/common/admin-header.php', $data);
        $this->load->view('admin/addproduct.php', $data);
        $this->load->view('admin/common/admin-footer.php', $data);
    }
    function updateProduct($id) {
        if(!empty($_POST['product'])) {
            if(empty($_POST['product']['name'])) $data['error'] = 'Hãy điền tên sản phẩm';
            else { 
                $update = array(
                    'name' => $_POST['product']['name'],
                    'price' => $_POST['product']['price'],
                    'category_id' => @implode(',',$_POST['product']['categorys']),
                    'description' => $_POST['product']['description'],
                    'display' => isset($_POST['product']['display']) ? 1 : 0,
                );
                if($this->Products_model->updateProduct($update,$id)) $data['success'] = 'Cập nhập sản phẩm thành công';
                else $data['error'] = 'Cập nhập sản phẩm thất bại: '.$this->db->last_query();;

            }
        }
        $data['product'] = $this->Products_model->getProduct($id);
        $data['product']->image = $this->Products_model->getImageProducts($id);
        $data['product']->category_name = $this->Category_model->getNameCategory($data['product']->category_id);
        $data['active'] = 'sanpham';
        $data['categorys'] = $this->Category_model->getAllCategory();
        
        $data['active'] = 'sanpham';

        $this->load->view('admin/common/admin-header.php', $data);
        $this->load->view('admin/editproduct.php', $data);
        $this->load->view('admin/common/admin-footer.php', $data);
    }
    function deteleProduct($id=null) {
        $data = null;
        if($id) {
        	if($this->Products_model->deleteProduct($id)) $data['success'] = 'Xóa sản phẩm thành công';
            else $data['error'] = 'Xóa sản phẩm thất bại';
        } else if(!empty($_POST['delete'])) {
            foreach ($_POST['delete'] as $key => $value) {
                $ids[] = (int) $value;
            }
            if($this->Products_model->deleteProducts($ids))
                $data['success'] = 'Xóa các sản phẩm thành công';
            else $data['error'] = 'Xóa các sản phẩm thất bại';
        }
        $this->session->set_flashdata('data', $data);
        redirect('admin/product');
        //unset($_POST['delete']);
        //return $this->index($data);
    }
}

?>