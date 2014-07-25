<?php 
$this->load->view('layout/header');
$this->load->view('layout/left_content');
$this->load->view("$template");
$this->load->view('layout/right_content');
$this->load->view('layout/footer');
?>