<?php
//writen by vietdq
class country_model extends CI_Model{
	protected $_table = 'tbl_country';
	protected $primary = 'coun_id';

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getAll(){
        return $this->db->get($this->_table)->result_array();
    }
}