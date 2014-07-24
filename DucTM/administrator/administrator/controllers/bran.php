<?php
class bran extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("form_validation");
        session_start();

    } // end __construct

    public function index(){
        $this->listbran();

    } // end index()
        
    
    public function listbran(){
        $this->load->model("bran_model");
        $this->load->library('pagination');

        $sort_type = "";
        
        if ($this->input->post('btnok')){
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
        $sort_type          = ($_SESSION['sort_type'] != "none") ? $_SESSION['sort_type'] : "";
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;

        $config['base_url'] = base_url("administrator/bran/listbran");
        $config['total_rows'] = $this->bran_model->count_all();
        if($config['per_page'] > $config['total_rows'] || $_SESSION['show_all'] == 'show'){
            $config['per_page'] = $config['total_rows'];
            $page = 1;
        }

        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 4;
        $config['next_link'] = "Sau";
        $config['prev_link'] = "Trước";
        $this->pagination->initialize($config); 

        $start = ($page - 1) * $config['per_page'];

        // echo "sort_type " . $sort_type . "<br/>";
        // echo "start: " . $start . "<br/>";
        // echo "per_page" . $config['per_page'] . "<br/>";
        // echo "page: " . $page;
        $data['listbran'] = $this->bran_model->get_order($sort_type,$start,$config['per_page']);

        $data['link'] = $this->pagination->create_links();
        $data['per'] = $config['per_page'];
        $data['sort_type'] = $_SESSION['sort_type'];
        $data['show_all'] = $_SESSION['show_all'];

        $this->load->view("bran/listbran",$data);

    }
    public function search(){
        $this->load->model("bran_model");
        if(isset($_POST["btnSearch"])){
            $search_term = $this->input->post("txtSearch");
            $data['result'] = $this->bran_model->get_results($search_term);
            $this->load->view("administrator/bran/searchResult",$data);
            print_r($data);
        }else{
            $this->load->view("administrator/bran/searchView");
        }
    } // end search()
} // end class bran
// end file bran.php