<?php
class user_model extends CI_Model{

    protected $_table = 'tbl_user';
    protected $_primary = 'usr_id';


    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

    } // end __construct()

    public function getAll(){
        return $this->db->get($this->_table)->result_array();
    } // end listUser();
    public function insert($data){
        $this->db->insert($this->_table,$data);
    } // end insert()

    public function getOnce($id){
        $this->db->where("usr_id = $id");
        return $this->db->get($this->_table)->row_array(); 
    } // end getOnce

    public function is_Validate($dataUser){
            $data = $this->db->select()->where('usr_name',$dataUser['username'])->where('usr_password',$dataUser['password'])           
            ->get($this->_table)->row_array();
            if(count($data)>0){
                return $data;
            }else{
                return false;
            }  
    } // end is_validate()
}
// end class CI_model
// end file model/user_model.php