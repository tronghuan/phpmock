<?php
class user extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("form_validation");
        $this->load->model("user_model");
        $this->load->library('pagination');
        session_start();

    } // end __construct

    public function index(){
        $this->login();

    } // end index()

    // public function listUser(){
    //     $this->load->model("user_model");

    //     $data['listuser'] = $this->user_model->getAll();
        
    //     $this->load->view("user/listuser",$data);
    // } // end class l


    public function listuser(){
        $sortType = ($this->uri->segment(5)) ? $this->uri->segment(5) : 'asc';
        $column = ($this->uri->segment(4)) ? $this->uri->segment(4) : 'usr_id';
        // echo "sort" . $sortType;
        // echo "column" . $column;
        
        if ($this->input->post('btnok')){
            if ($this->input->post('show_all')){
                $_SESSION['show_all'] = $this->input->post('show_all');
            } else{
                if(isset($_SESSION['show_all'])) unset($_SESSION['show_all']);
                if ($this->input->post('per_page')){
                    $_SESSION['PerPageListUser'] = $this->input->post('per_page');
                }
            }
            
            // if($this->input->post('sort')){
            //     $_SESSION['sortType'] = $this->input->post('sort');
            // }
            
        }
        // echo $_SESSION['PerPageListUser'];
        $_SESSION['PerPageListUser']  = isset($_SESSION['PerPageListUser']) ? $_SESSION['PerPageListUser'] : 5;
        // $_SESSION['sortType'] = isset($_SESSION['sortType']) ? $_SESSION['sortType'] : "";
        $_SESSION['show_all']  = isset($_SESSION['show_all']) ? $_SESSION['show_all'] : "no";

        $config['per_page'] = $_SESSION['PerPageListUser'];
        // $sortType          = ($_SESSION['sortType'] != "none") ? $_SESSION['sortType'] : "";
        $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 1;

        $config['base_url']   = base_url("administrator/user/listuser/$column/$sortType/");
        $config['total_rows'] = $this->user_model->count_all();
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
        $data['listuser'] = $this->user_model->get_order($column,$sortType,$start,$config['per_page']);

        $data['link'] = $this->pagination->create_links();
        $data['per'] = $config['per_page'];
        $data['sortType'] = $sortType;
        $data['show_all'] = $_SESSION['show_all'];
        $data['column'] = $column;

        $this->load->view("user/listuser",$data);
        // $this->load->view("main/main");

    } // end class list user

    public function insertUser(){
        $dataUser = array();
        if ($this->input->post('btnok')){
            $this->form_validation->set_rules('usr_name','Username', 'required|alpha_numeric|min_length[6]');
            $this->form_validation->set_rules('usr_password','Password', 'required|min_length[6]|matches[usr_retype_password]');
            $this->form_validation->set_rules('usr_retype_password','Retype-Password', 'required');
            $this->form_validation->set_rules('usr_email','Email', 'required|valid_email');
            $this->form_validation->set_rules('usr_address','Address', 'required');
            $this->form_validation->set_rules('usr_phone','Phone', 'required|numeric|min_length[9]|max_length[11]');
            $this->form_validation->set_rules('usr_gender','Gender', 'required');

            $this->form_validation->set_message("required","%s không được bỏ trống");
            $this->form_validation->set_message("alpha_numeric","%s chỉ được chứa chữ cái và số");
            $this->form_validation->set_message("min_length","%s không được nhỏ hơn %d ký tự");
            $this->form_validation->set_message("max_length","%s không được lớn hơn %d ký tự");
            $this->form_validation->set_message("matches","%s không khớp");
            $this->form_validation->set_message("valid_email","%s không đúng định dạng");
            $this->form_validation->set_message("numeric","%s phải là số");
            $this->form_validation->set_error_delimiters("<span class='error'>","</span>");
            // echo $this->input->post("usr_level");
            // if($this->input->post("usr_level")){
            //     $dataUser['usr_level'] = $this->input->post("usr_level");
            // }
            // echo $dataUser['usr_level'];
            if($this->form_validation->run()){
                $dataUser = array(
                        'usr_name'            => $this->input->post('usr_name'),
                        'usr_password'        => $this->input->post('usr_password'),
                        'usr_email'           => $this->input->post('usr_email'),
                        'usr_address'         => $this->input->post('usr_address'),
                        'usr_phone'           => $this->input->post('usr_phone'),
                        'usr_gender'          => $this->input->post('usr_gender'),
                        'usr_level'           => $this->input->post('usr_level')
                        ); // end array
                
                $this->user_model->insert($dataUser);
                redirect(base_url("administrator/user/listuser"));
            } // end from_validation->run()

        } // end isset btnok
        $this->load->view('user/insertuser',$dataUser);
    } // end insertUser()

    // writen by VietDQ
    public function delete()
    {
        $id = $this->uri->segment(4);
        $this->user_model->deleteUser($id);
        // redirect(base_url("/administrator/user/listuser"));
        redirect(base_url("administrator/user/listuser"));
    }


    // Huan
    public function update(){
            $usr_id = $this->uri->segment(4);
            $data['userInfo'] = $this->user_model->getOnce($usr_id);
            if($this->input->post("ok")){
                 $this->form_validation->set_rules("usr_name", "Ten thanh vien", "trim|required");
                $this->form_validation->set_rules("usr_password", "Ten thanh vien", "trim|required");
                $this->form_validation->set_rules("usr_email", "Email", "trim|required|valid_email");
                $this->form_validation->set_rules("usr_address", "Dia chi khach hang", "trim|required");
                $this->form_validation->set_rules("usr_phone", "So dien thoai", "trim|required");
                $this->form_validation->set_rules("usr_gender", "Gioi tinh", "trim|required");
                $this->form_validation->set_rules("usr_level", "Level", "trim|required");

                $this->form_validation->set_message("required", "%s khong duoc bo trong");
                $this->form_validation->set_message("min_length", "%s khong duoc nho hon %d ky tu");
                $this->form_validation->set_message("matches", "%s khong dung");
                $this->form_validation->set_message("valid_email", "%s khong dung dinh dang");
                $this->form_validation->set_message("numeric", "%s phai la so");

                $this->form_validation->set_error_delimiters("<span class='error'>", "</span>");
                if($this->form_validation->run()){
                     $dataUser = array(
                                    "usr_name"=>$this->input->post("usr_name"),
                                    "usr_password"=>$this->input->post("usr_password"),
                                    "usr_email"=>$this->input->post("usr_email"),
                                    "usr_address"=>$this->input->post("usr_address"),
                                    "usr_phone"=>$this->input->post("usr_phone"),
                                    "usr_gender"=>$this->input->post("usr_gender"),
                                    "usr_level"=>$this->input->post("usr_level")
                                );
                    $this->user_model->update($dataUser,$usr_id);
                    //redirect(base_url("administrator/users/listusers"));
                    redirect(base_url("administrator/user/listuser"));
                }
            }
            $this->load->view("user/update", $data);
    } // update()

    // DucTM
    public function login(){
        $this->load->view("user/loginView");
        //echo "dcn";
        if($this->input->post("btnLogin")){
        
            $this->form_validation->set_rules('txtUser','Username','trim|required');
            $this->form_validation->set_rules('txtPass','Password','trim|required|min_length[5]|max_length[12]');
    
            
            $this->form_validation->set_message("required","%s khong duoc bo trong");
            $this->form_validation->set_error_delimiters('<div class="error">','</div>'); 
            echo 'alid: ' . $this->form_validation->run();
            if($this->form_validation->run()){
                $dataUser =array(
                    "username"=>$this->input->post("txtUser"),
                    "password"=>$this->input->post("txtPass")
                );
                $check = $this->user_model->is_Validate($dataUser);
                if($check){
                   $this->session->set_userdata('user',$check);
                    redirect(base_url('administrator/user/listuser'));
                }else{
                    $this->_check = false;
                }
            } // end if run
        } // end if btLogin
    } // end login()
    
    public function logout(){
        $this->session->unset_userdata('user');
         // $this->load->view("user/loginView");
        $this->login();
        //$obj = new user;
        //$obj->login();
    }
    public function success(){
        //$dataUser['user']=$this->session->set_userdata('user',"");
        $this->load->view("user/success");
       //$this->load>view('user/success',$dataUser);
    }
}
// end class user
// end file controller/user.php
