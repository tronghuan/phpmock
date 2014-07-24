<?php
//writen by vietdq
class images_model extends CI_Model
{
    protected $_table = 'tbl_images';
    protected $_primary = 'img_id';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getAll()
    {
        
        // Lay ra danh sach cac ban ghi trong table
        return $this->db->get($this->_table)->result_array();
    }
    public function insert($data)
    {
        $this->db->insert($this->_table,$data);
    }
    public function detail($id)
    {
        $this->db->where("img_id = $id");
        return $this->db->get($this->_table)->row_array();
    }

    public function update($data,$id)
    {
        $this->db->where("img_id = $id");
        $this->db->update($this->_table,$data);
    }
    
    public function getImg($id)
    {
        $this->db->where("img_id = $id");
        return $this->db->get($this->_table)->row_array();
    }
    public function deleteImg($id)
    {
        $this->db->where("img_id = $id");
        $this->db->delete($this->_table);
    }    
    public function insertImg($data)
    {     
        $this->db->insert($this->_table,$data);
    }
    public function listImages($id) {
        $this->db->where("pro_id = $id");
        return $this->db->get($this->_table)->result_array();
    }
    public function countImages($id) {
        $this->db->where("pro_id=$id");
        return $this->db->count_all($this->_table);
      
   }


}