<?php 

class News extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('News_model');
	}
    function index($data=null) {
        $data = $this->session->flashdata('data');
        if(!empty($_POST['delete'])) return $this->deteleNews();
        $this->load->library('pagination');

        $data['listnews'] = $this->News_model->listNews();

        $config['base_url'] = base_url('/admin/news');
        $config['total_rows'] = count((array)$data['listnews']);
        $config['per_page'] = 6;
        $config['use_page_numbers'] = true;
        $config['page_query_string'] = TRUE; 
        $config['first_url'] = site_url('/admin/news');
        $config['first_link'] = 'Trang đầu';
        $config['last_link'] = 'Trang cuối';
        $this->pagination->initialize($config);
        $page = (int)$this->input->get('per_page', TRUE);
        if($page<1) $page = 1;
        $start = ($page-1)*$config['per_page'];

        $data['active'] = 'news';
    	$data['listnews'] = $this->News_model->listNews();
        //var_dump($data['listnews']);exit;
        $this->load->view('admin/common/admin-header.php', $data);
        $this->load->view('admin/news',$data);
        $this->load->view('admin/common/admin-footer.php', $data);
    }
    function addNews() {
        if(!empty($_POST['news'])) {
            if(empty($_POST['news']['title'])) $data['error'] = 'Hãy điền tiêu đề tin tức';
            else { 
                $insert = array(
                    'title' => $_POST['news']['title'],
                    'content' => $_POST['news']['content'],
                );
                if($id=$this->News_model->insertNews($insert)) {
                    $data['success'] = 'Thêm tin tức thành công';
                    //return $this->index($data);
                } else $data['error'] = 'Thêm tin tức thất bại';
            }
            $this->session->set_flashdata('data', $data);
            redirect('admin/news');
        }
        $data['active'] = 'news';


        $this->load->view('admin/common/admin-header.php', $data);
        $this->load->view('admin/addnews.php', $data);
        $this->load->view('admin/common/admin-footer.php', $data);
        
    }
    function updateNews($id) {
    	if(!empty($_POST['news'])) {
            if(empty($_POST['news']['title'])) $data['error'] = 'Hãy điền tiêu đề tin tức';
            else { 
                $update = array(
                    'title' => $_POST['news']['title'],
                    'content' => $_POST['news']['content'],
                );
                if($id=$this->News_model->updateNews($update,$id)) {
                    $data['success'] = 'Cập nhập tin tức thành công';
                    return $this->index($data);
                } else $data['error'] = 'Cập nhập tin tức thất bại';
            }
            redirect('admin/news');
        }
        $data['news'] = $this->News_model->getNews($id);
        //var_dump($data['category']);exit;
        $this->load->view('admin/common/admin-header.php', $data);
        $this->load->view('admin/editnews.php', $data);
        $this->load->view('admin/common/admin-footer.php', $data);
    }
    function deteleNews($id=null) {
        $data = null;
        $id = !empty($_POST['delete']) ? $_POST['delete'] : $id;
        if($this->News_model->deleteNews($id)) $data['success'] = 'Xóa thể loại thành công';
        else $data['error'] = 'Xóa thể loại thất bại';

        $this->session->set_flashdata('data', $data);
        redirect('admin/news');
    }
}

?>