<?php

/**
 * @author easyvn.net
 * @copyright 2014
 */

class searchModel extends CI_Model{
  //  protected $_table = 'tbl_bran';
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get_results($search_term){
     
        $this->db->select('*');
        $this->db->from('tbl_bran');
        $this->db->like('bran_name',$search_term);

        // Execute the query.
        $query = $this->db->get();
       return $query->result_array();
    }
    
    
}

?>