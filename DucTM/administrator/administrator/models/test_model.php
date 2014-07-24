<?php

/**
 * @author easyvn.net
 * @copyright 2014
 */

class test_model extends CI_Model{
    
    protected $_table = 'tbl_user';
    protected $_primary = 'id';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function getAll(){
        return $this->db->get($this->_table)->result_array();
    }
    
    public function insert($data){
        $this->db->insert($_table,$data);
    }
}

?>