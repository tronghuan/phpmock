<?php

/**
 * @author easyvn.net
 * @copyright 2014
 */

class Bran extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model("searchModel");
        $this->load->helper("url");
       // echo "abc";
    }
    public function index(){
       
    }
    public function search(){
        if(isset($_POST["btnSearch"])){
        $seach_term = $this->input->post("txtSearch");
        $data['result'] = $this->searchModel->get_results($seach_term);
        $this->load->view("administrator/bran/searchResult",$data);
        print_r($data);
        }else{
        $this->load->view("administrator/bran/adsearchView");
        }
    }
}

?>