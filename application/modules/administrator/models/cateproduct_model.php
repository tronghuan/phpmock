<?php
//writen by vietdq
class cateproduct_model extends CI_Model
{
    protected $_table = 'tbl_cateproduct';
    protected $_primary = 'pro_id';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getCate($id)
    {
        $this->db->where("pro_id = $id");
        return $this->db->get($this->_table)->result_array();
    }
    public function deleteCate($id)
    {
        $this->db->where("pro_id = $id");
        $this->db->delete($this->_table);
    }    
    public function insertCate($data)
    {     
        $this->db->insert($this->_table,$data);
    }
}