<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Login extends CI_Controller {

	public function __construct()
   	{	
   		parent::__construct();
   		$this->load->model(array('admin_model')); 
   		if(count((array)$this->session->userdata('admin_session_data'))>0)
   		{
   			redirect(admin_url().'dashboard', 'refresh');
   			exit(0);
   		} 
   	}
   
    public function index()
   	{	
		$this->load->view('admin/login/login_view');
	}

	public function do_login()
	{
		if($_SERVER['REQUEST_METHOD'] =='POST') {
			if($this->validate_form_data()==TRUE){
				$login_email= $this->input->post('emailid');
				$login_password= md5($this->input->post('password'));
				$return= $this->admin_model->check_valid_login($login_email,$login_password);
				if($return == TRUE){
					$result= $this->admin_model->getadmindetails($return);
					//echo "<pre>"; print_r($result); die;
					$sessdata=array(
						'admin_id' =>$result->id,
						 'username' =>$result->username,
						 'emailid' =>$result->emailid,
						 'is_admin_logged_in'	=>TRUE,
					);
					$this->session->set_userdata('admin_session_data',$sessdata); 
					redirect(admin_url().'dashboard');
				}else{
					$msg = 'Oops! Email/password invalid.';
   		            $this->session->set_flashdata('error_msg', $msg);
   		            redirect(admin_url(), 'refresh');
				}
			} else{
				$msg = validation_errors();
   	            $this->session->set_flashdata('error_msg', $msg);
   	            redirect(admin_url(), 'refresh');
			}
		}
	}

	function validate_form_data()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('emailid','emailid','trim|required|valid_email');
		$this->form_validation->set_rules('password','password','required');

		if ($this->form_validation->run()==True)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
   	


?>