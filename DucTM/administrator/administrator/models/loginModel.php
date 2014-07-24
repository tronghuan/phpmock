<?php

/**
 * @author easyvn.net
 * @copyright 2014
 */

class loginModel extends CI_Model{
    protected $_table = 'tbl_user';
    protected $_primary = 'id';
    protected $_username;
    protected $_password;
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function is_Validate($dataUser){
            $data = $this->db->select()->where('usr_name',$dataUser['username'])->where('usr_password',$dataUser['password'])           
            ->get($this->_table)->row_array();
            if(count($data)>0){
                return $data;
            }else{
                return false;
            }  
    }

}
    
    


?>