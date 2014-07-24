
<?php
/**
 * @author easyvn.net
 * @copyright 2014
 */

class product extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("productModel");
        $this->load->library("pagination");
        $this->load->helper("url");
          session_start();
    }
    public function index(){
        $this->load->view("product/productList");
    }
    
//    public function listAll(){
//        $data['listproduct'] = $this->productModel->getAll();
//        $this->load->view("product/productList",$data);
//    }
    
    public function listProduct(){
            $sort_type = "";
        
        if ($this->input->post('btnSubmit')){
          //  echo $this->input->post('btnSubmit');
            if ($this->input->post('show_all')){
                $_SESSION['show_all'] = $this->input->post('show_all');
            } else{
                unset($_SESSION['show_all']);
                if ($this->input->post('per_page')){
                    $_SESSION['per_page'] = $this->input->post('per_page');
                }
            }
            
            if($this->input->post('sort')){
                $_SESSION['sort_type'] = $this->input->post('sort');
            }
            
        }
        $_SESSION['per_page']  = isset($_SESSION['per_page']) ? $_SESSION['per_page'] : 5;
        $_SESSION['sort_type'] = isset($_SESSION['sort_type']) ? $_SESSION['sort_type'] : "";
        $_SESSION['show_all'] = isset($_SESSION['show_all']) ? $_SESSION['show_all'] : "";

        $config['per_page'] = $_SESSION['per_page'];
        $sort_type= ($_SESSION['sort_type'] != "none") ? $_SESSION['sort_type'] : "";
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;

        $config['base_url'] = base_url("administrator/product/listproduct");
        $config['total_rows'] = $this->productModel->countAll();
        if($config['per_page'] > $config['total_rows'] || $_SESSION['show_all'] == 'show'){
            $config['per_page'] = $config['total_rows'];
            $page = 1;
        }

        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 4;
        $config['next_link'] = "Prev";
        $config['prev_link'] = "Next";
        $this->pagination->initialize($config); 

        $start = ($page - 1) * $config['per_page'];
        $data['listproduct'] = $this->productModel->get_order($sort_type,$start,$config['per_page']);

        $data['link'] = $this->pagination->create_links();
        $data['per'] = $config['per_page'];
        $data['sort_type'] = $_SESSION['sort_type'];
        $data['show_all'] = $_SESSION['show_all'];

        $this->load->view("product/productList",$data);

    }
}
    

?>