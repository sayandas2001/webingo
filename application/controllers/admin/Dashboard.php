<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    private $upload_path = '';
    private $image_medium_width = 398;
    private $image_medium_height = 210;

    function __construct(){
		parent :: __construct();
		init_admin_element();
		is_admin_logged_in();
		$this->load->helper('url','form');
    	$this->load->library("pagination");
		$this->load->model(array('admin_model')); 
		//$this->upload_path = UPLOAD_PATH.'offer/';
		$this->load->library(array('upload','image_lib'));
		//$this->load->library('excel');
		// $this->load->library('PHPExcel',null,'excel');
	}

    public function index(){
        $this->load->view('admin/dashboard/index_view');
    }
}
?>
