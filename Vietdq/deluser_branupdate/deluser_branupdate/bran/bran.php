<?php
class bran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("bran_model");
        $this->load->library("form_validation");
    }
    public function index()
    {
        
    }
    public function insert()
    {
         
        if($this->input->post("ok")){
            $this->form_validation->set_rules("name","Ten bran ","trim|required");          
            $this->form_validation->set_message("required","%s khong duoc bo trong");

            $this->form_validation->set_error_delimiters("<span class='error'>","</span>");
            if($this->form_validation->run()){
                $dataBran = array(
                                "bran_name"=>$this->input->post("name"),
                            );
                $this->bran_model->insert($dataBran);
                redirect(base_url("/Day1/administrator/bran/listbran"));
            }
            
        }
        $data = array();
        $this->load->view("administrator/bran/insert",$data);
    }
    public function update()
    {
        $id = $this->uri->segment(4);
        $data['branInfo'] = $this->bran_model->detail($id);
        
        if($this->input->post("ok")){
            $this->form_validation->set_rules("name","Ten bran ","trim|required");          
            $this->form_validation->set_message("required","%s khong duoc bo trong");

            $this->form_validation->set_error_delimiters("<span class='error'>","</span>");
            $updateName=$this->input->post("name");
            
       
            if($this->form_validation->run()){
                $listall=$this->bran_model->getAll();
                
             foreach ($listall as $row) {
                if (in_array(trim($updateName),$row)&& ($row['bran_id']!=$id)) $data['errorName']="Da ton tai";

             }   
             
             if (!isset($data['errorName']))
            
             {
         
    
                $dataBran = array(
                                "bran_name"=>$this->input->post("name"),

                            );
                $this->bran_model->update($dataBran,$id);
                
                redirect(base_url("/Day1/administrator/bran/listbran"));
                }
            }
        }
        $this->load->view("administrator/bran/update",$data);
        
    }
    public function listbran()
    {
  
 			$this->load->library('pagination');
			$this->load->helper('url');
			$this->load->library('table');

			$config['base_url'] = base_url('Day1/administrator/bran/listbran'); // xác định trang phân trang
			$config['total_rows'] = $this->bran_model->count_all(); // xác định tổng số record
			$config['per_page'] = 5; // xác định số record ở mỗi trang
			$config['uri_segment'] = 4; // xác định segment chứa page number
			$this->pagination->initialize($config);

			$data['listbran'] = $this->bran_model->list_all($config['per_page'],$this->uri->segment(4));
        $this->load->view("administrator/bran/listbran",$data);
    }
    public function delete()
    {
        $id = $this->uri->segment(4);
        $this->bran_model->deleteBran($id);
        redirect(base_url("/Day1/administrator/bran/listbran"));
    }
    
}