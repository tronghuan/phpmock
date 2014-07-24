<?php
class user_model extends CI_Model
{
    protected $_table = 'tbl_user';
    protected $_primary = 'usr_id';
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
        $this->db->where("usr_id = $id");
        return $this->db->get($this->_table)->row_array();
    }
    public function update($data,$id)
    {
        $this->db->where("usr_id = $id");
        $this->db->update($this->_table,$data);
    }
    public function deleteUser($id)
    {
        $this->db->where("usr_id = $id");
        $this->db->delete($this->_table);
    }    
   	public function getPage($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');	
		$this->db->order_by('usr_id','DESC');
		$this->db->limit(15,$id);
		$query = $this->db->get();
		return $query->result();
	}
    		// lấy dữ liệu theo từng phần
		function list_all($number, $offset){
			$query =  $this->db->get($this->_table,$number,$offset);
			return $query->result_array();
		}
		
		// đếm tổng số record trong table book
		function count_all(){
			return $this->db->count_all($this->_table);
		}

}