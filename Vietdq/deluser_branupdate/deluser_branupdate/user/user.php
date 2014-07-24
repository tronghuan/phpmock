<?php
class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library("form_validation");
        $this->load->library("pagination");
    }
    public function index()
    {
   
    }
    public function insert()
    {
         
        if($this->input->post("ok")){
            $this->form_validation->set_rules("name","Ten thanh vien ","trim|required");
            $this->form_validation->set_rules("gender","Gioi tinh","trim|required");        
            $this->form_validation->set_rules("email","Email ","trim|required|valid_email");
            $this->form_validation->set_rules("address","Dia chi ","trim|required");
            $this->form_validation->set_rules("phone","So dien thoai ","trim|required");
            $this->form_validation->set_rules("level","Cap do ","trim|required|numeric");
            $this->form_validation->set_message("required","%s khong duoc bo trong");
            $this->form_validation->set_message("min_length","%s khong duoc nho hon %d ky tu");
            $this->form_validation->set_message("matches","%s khong dung");
            $this->form_validation->set_message("valid_email","%s khong dung dinh dang");
            $this->form_validation->set_message("numeric","%s phai la so");
            $this->form_validation->set_error_delimiters("<span class='error'>","</span>");
            if($this->form_validation->run()){
                $dataUser = array(
                                "usr_name"=>$this->input->post("name"),
                                "usr_gender"=>$this->input->post("gender"),
                                "usr_email"=>$this->input->post("email"),
                                "usr_address"=>$this->input->post("address"),
                                "usr_phone"=>$this->input->post("phone"),
                                "usr_level"=>$this->input->post("level")
                            );
                $this->user_model->insert($dataUser);
                redirect(base_url("/Day1/administrator/user/listuser"));
            }
            
        }
        $data = array();
        $this->load->view("administrator/user/insert",$data);
    }
    public function update()
    {
        $id = $this->uri->segment(4);
        $data['userInfo'] = $this->user_model->detail($id);
        if($this->input->post("ok")){
            $this->form_validation->set_rules("name","Ten thanh vien ","trim|required");
            $this->form_validation->set_rules("gender","Gioi tinh","trim|required");        
            $this->form_validation->set_rules("email","Email ","trim|required|valid_email");
            $this->form_validation->set_rules("address","Dia chi ","trim|required");
            $this->form_validation->set_rules("phone","So dien thoai ","trim|required");
            $this->form_validation->set_rules("level","Cap do ","trim|required|numeric");
            $this->form_validation->set_message("required","%s khong duoc bo trong");
            $this->form_validation->set_message("min_length","%s khong duoc nho hon %d ky tu");
            $this->form_validation->set_message("matches","%s khong dung");
            $this->form_validation->set_message("valid_email","%s khong dung dinh dang");
            $this->form_validation->set_message("numeric","%s phai la so");
            $this->form_validation->set_error_delimiters("<span class='error'>","</span>");
            if($this->form_validation->run()){
                $dataUser = array(
                                "usr_name"=>$this->input->post("name"),
                                "usr_gender"=>$this->input->post("gender"),
                                "usr_email"=>$this->input->post("email"),
                                "usr_address"=>$this->input->post("address"),
                                "usr_phone"=>$this->input->post("phone"),
                                "usr_level"=>$this->input->post("level")
                            );
                $this->user_model->update($dataUser,$id);
                redirect(base_url("/Day1/administrator/user/listuser"));
            }
        }
        $this->load->view("administrator/user/update",$data);
        
    }
    public function listuser()
    {
			$this->load->library('pagination');
			$this->load->helper('url');
			$this->load->library('table');
			
			// cấu hình phân trang
			$config['base_url'] = base_url('Day1/administrator/user/listuser'); // xác định trang phân trang
			$config['total_rows'] = $this->user_model->count_all(); // xác định tổng số record
			$config['per_page'] = 5; // xác định số record ở mỗi trang
			$config['uri_segment'] = 4; // xác định segment chứa page number
			$this->pagination->initialize($config);
			
			// tạo table
			/*$this->table->set_heading('id','name');*/
			$data['listuser'] = $this->user_model->list_all($config['per_page'],$this->uri->segment(4));
   
        $this->load->view("administrator/user/listuser",$data);
    }
    public function delete()
    {
        $id = $this->uri->segment(4);
        $this->user_model->deleteUser($id);
        redirect(base_url("/Day1/administrator/user/listuser"));
    }

    
}