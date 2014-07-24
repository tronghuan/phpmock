<?php
class category_model extends CI_Model
{
    protected $_table = 'tbl_category';
    protected $_primary = 'cate_id';
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
        $this->db->where("cate_id = $id");
        return $this->db->get($this->_table)->row_array();
    }
        public function detailparent($id)
    {
        $this->db->where("cate_parent = $id");
        return $this->db->get($this->_table)->result_array();
    }
    public function update($data,$id)
    {
        $this->db->where("cate_id = $id");
        $this->db->update($this->_table,$data);
    }
    public function deletecategory($id)
    {
        $this->db->where("cate_id = $id");
        $this->db->delete($this->_table);
    }    
    		function list_all($number, $offset){
			$query =  $this->db->get($this->_table,$number,$offset);
			return $query->result_array();
		}
		
		// đếm tổng số record trong table book
		function count_all(){
			return $this->db->count_all($this->_table);
		}
   public function count($id) {
        $this->db->where("cate_parent=$id");
        return $this->db->count_all_results();
      
   }
   
     public function infochild($id)
    {
        $this->db->where("cate_parent = $id");
        return $this->db->get($this->_table)->result_array();
    }
         public function infoparent($id)
    {
        $this->db->where("cate_id = $id");
        return $this->db->get($this->_table)->row_array();
    }
}