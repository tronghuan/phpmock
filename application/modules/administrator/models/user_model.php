<?php
class user_model extends CI_Model{

    protected $_table = 'tbl_user';
    protected $_primary = 'usr_id';


    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library("session");

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


    public function count_all(){
        $this->db->from($this->_table);
        return $this->db->count_all_results();
        // return $this->db->get($this->_table)->result_array();
    }

    public function get_order($column, $sortType = '', $limit = '', $start = ''){
        // $this->db->select("*");
        // $this->db->from($this->_table);
        // $this->db->order_by("bran_name");
        // return $this->db->get($this->_table);
        $sql = "SELECT * FROM {$this->_table}";
        if($sortType) $sql .=" ORDER BY {$column} {$sortType}";
        $sql .= " LIMIT {$limit},{$start}";
        
        // echo $sql;
        $result = mysql_query($sql);
        $data = array();
        while($row = mysql_fetch_assoc($result)){
            $data[] = $row; 
        }
        // echo "<pre>";
        // print_r($data);
        return $data;
    }

    // writen by VietDQ
    public function deleteUser($id)
    {
        $this->db->where("usr_id = $id");
        $this->db->delete($this->_table);
    }

    // Huan
    // update user model
    public function update($data, $usr_id){
            $this->db->where("usr_id = $usr_id");
            $this->db->update($this->_table, $data);
    }


    // DucTM
    // is_Validate($dataUser);
    public function is_Validate($dataUser){
            $data = $this->db->select()->where('usr_name',$dataUser['username'])
            ->where('usr_password',$dataUser['password'])           
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