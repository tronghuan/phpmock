<?php
class comment_model extends CI_Model{
	protected $_table = "tbl_comment";
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function getAll(){
		return $this->db->get($this->_table)->result_array();
	}
	
	public function delete($id){
		$data = array(
			'com_status' => 0
		);
		$this->db->where('com_id', $id);
		$this->db->update($this->_table, $data);
	}
}