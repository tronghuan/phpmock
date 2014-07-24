<?php
class LoginControl extends CI_Controller{
    private $_check = false;
    public function __construct(){
        parent::__construct();
        $this->load->model("loginModel");
        $this->load->library("form_validation");
        $this->load->library("session");
        $this->load->helper("url");
        //echo __METHOD__."LognController";
    }
    public function index(){
        
        $this->load->helper(array('form'));
        $this->load->view("loginView");
    }
    
    public function login(){
        $this->load->view("loginView");
        //echo "dcn";
        if($this->input->post("btnLogin")){
            echo 'sdaf';
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
                $check = $this->loginModel->is_Validate($dataUser);
                if($check){
                   $this->session->set_userdata('user',$check);
                    redirect(base_url('sucess'));
                }else{
                    $this->_check = false;
                }
        }
      }
}     
    public function lougout(){
        $this->session->unset_userdata('user');
        redirect(base_url('loginView'));
    }
    public function success(){
        $dataUser['user']=$this->session->set_datauser('user');
        $this->load>view('success',$dataUser);
    }    
}


?>