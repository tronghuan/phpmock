<?php
/**
 * @author easyvn.net
 * @copyright 2014
 */

class product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
  
    }

    public function index()
    {
    	$data['template'] = 'product/listproduct';
	
        $this->load->view("layout/layout", $data);
        
    }

   

} // end class product


?>