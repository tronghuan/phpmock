<?php
class bran extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("form_validation");
        $this->load->model("bran_model");
        $this->load->library('pagination');
        session_start();

    } // end __construct

    public function index(){
        $this->listbran();

    } // end index()

    public function listbran(){
        $sortType = ($this->uri->segment(5)) ? $this->uri->segment(5) : 'asc';
        $column = ($this->uri->segment(4)) ? $this->uri->segment(4) : 'bran_id';
        // echo "sort" . $sortType;
        // echo "column" . $column;
        
        if ($this->input->post('btnok')){
            if ($this->input->post('show_all')){
                $_SESSION['show_all'] = $this->input->post('show_all');
            } else{
                if(isset($_SESSION['show_all'])) unset($_SESSION['show_all']);
                if ($this->input->post('per_page')){
                    $_SESSION['PerPageListBran'] = $this->input->post('per_page');
                }
            }
            
            // if($this->input->post('sort')){
            //     $_SESSION['sortType'] = $this->input->post('sort');
            // }
            
        }
        // echo $_SESSION['PerPageListBran'];
        $_SESSION['PerPageListBran']  = isset($_SESSION['PerPageListBran']) ? $_SESSION['PerPageListBran'] : 5;
        // $_SESSION['sortType'] = isset($_SESSION['sortType']) ? $_SESSION['sortType'] : "";
        $_SESSION['show_all']  = isset($_SESSION['show_all']) ? $_SESSION['show_all'] : "no";

        $config['per_page'] = $_SESSION['PerPageListBran'];
        // $sortType          = ($_SESSION['sortType'] != "none") ? $_SESSION['sortType'] : "";
        $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 1;

        $config['base_url']   = base_url("administrator/bran/listbran/$column/$sortType/");
        $config['total_rows'] = $this->bran_model->count_all();
        if($config['per_page'] > $config['total_rows'] || $_SESSION['show_all'] == 'show'){
            $config['per_page'] = $config['total_rows'];
            $page = 1;
            // echo "page = 1";
        }

        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 6;
        $config['next_link'] = "Sau";
        $config['prev_link'] = "Trước";
        $this->pagination->initialize($config); 

        $start = ($page - 1) * $config['per_page'];

        // echo "sortType " . $sortType . "<br/>";
        // echo "start: " . $start . "<br/>";
        // echo "per_page" . $config['per_page'] . "<br/>";
        // echo "page: " . $page;
        $data['listbran'] = $this->bran_model->get_order($column,$sortType,$start,$config['per_page']);

        $data['link'] = $this->pagination->create_links();
        $data['per'] = $config['per_page'];
        $data['sortType'] = $sortType;
        $data['show_all'] = $_SESSION['show_all'];
        $data['column'] = $column;

        $this->load->view("bran/listbran",$data);
        // $this->load->view("main/main");

    } // end class list bran

    // writen by VietDQ
    public function update(){
        $id = $this->uri->segment(4);
        $data['branInfo'] = $this->bran_model->detail($id);
        
        if($this->input->post("ok")){
            $this->form_validation->set_rules("name","Tên brand ","trim|required");          
            $this->form_validation->set_message("required","%s không được bỏ trống");

            $this->form_validation->set_error_delimiters("<span class='error'>","</span>");
            $updateName=$this->input->post("name");
            
       
            if($this->form_validation->run()){
                $listall=$this->bran_model->getAll();
                
             foreach ($listall as $row) {
                if (in_array(trim($updateName),$row)&& ($row['bran_id']!=$id)) $data['errorName']="Đã tồn tại";

             }   
             
             if (!isset($data['errorName']))
            
             {
         
    
                $dataBran = array(
                                "bran_name"=>$this->input->post("name"),

                            );
                $this->bran_model->update($dataBran,$id);
                
                redirect(base_url("administrator/bran/listbran"));
                }
            }
        }
        $this->load->view("administrator/bran/update",$data);
        
    }

    // Huan
    // delete bran controller
    public function delete(){
            $bran_id = $this->uri->segment(4);
            $this->bran_model->delete($bran_id);
            
            redirect(base_url("administrator/bran/listbran"));
    } // end delete()


    // DucTM
    public function search(){
        $this->load->model("bran_model");
        if(isset($_POST["btnSearch"])){
            $search_term = $this->input->post("txtSearch");
            $data['result'] = $this->bran_model->get_results($search_term);
            $this->load->view("administrator/bran/searchResult",$data);
            // print_r($data);
        }else{
            $this->load->view("administrator/bran/searchView");
        }
    } // end search()
} // end class bran
// end file bran.php