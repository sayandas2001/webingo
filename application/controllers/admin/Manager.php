<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Manager extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('manager_model');
        //$this->isLoggedIn();
        $this->load->helper('url', 'form');
        $this->load->library("pagination");
    }

    public function index()
    {
        $data['allmanager'] = $this->manager_model->manager_listing();

        $this->load->view("admin/manager/manager_listing",$data);
    }

    public function add()
    {
        if (strtolower($_SERVER["REQUEST_METHOD"]) == 'post'){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Name', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim');
            $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
            $this->form_validation->set_rules('dob', 'DOB', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            //$this->form_validation->set_rules('c_password', 'Confirm Password', 'required|trim');
            $this->form_validation->set_rules('c_password', 'Confirm Password', 'required|trim|matches[password]');
    
            if ($this->form_validation->run() == TRUE) {
                $post_data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'dob' => $this->input->post('dob'),
                    'password' => md5($this->input->post('password')),
                    'created_at'=>date('Y-m-d H:i:s')
                );
    
                //print_r($post_data); die;
                $this->manager_model->manager_add($post_data);
    
                $msg = 'Manager has been successfully added.';
                $this->session->set_flashdata('success_msg', $msg);
                redirect(admin_url() . 'manager', 'refresh');
            } else {
                $msg = validation_errors();
                $this->session->set_flashdata('error_msg', $msg);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
        else {
            $this->load->view('admin/manager/addmanager');
        }
    
    }

    public function update($manager_id){
        $data['managerInfo'] = $this->manager_model->getmanagerInfoById($manager_id);
        //echo "<pre>"; print_r($data['bannerInfo']); die;
        $this->load->view("admin/manager/editmanager",$data);
    }

    public function editmanager()
    {
        $this->load->library('form_validation');
        $manager_id = $this->input->post('id');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('dob', 'DOB', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $msg = validation_errors();
            $this->session->set_flashdata('error_msg', $msg);
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $post_data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'dob' => $this->input->post('dob'),
                'updated_at'=>date('Y-m-d H:i:s')
            );

            $result = $this->manager_model->editmanager($post_data, $manager_id);

            if ($result == true) {
                $this->session->set_flashdata('success', 'Updated successfully');
            } else {
                $this->session->set_flashdata('error', 'Updation failed');
            }

            redirect(admin_url() . 'manager', 'refresh');
        }
    }

    public function delete($manager_id){
        $result = $this->manager_model->delete($manager_id);
        if ($result == true) {  
            $this->session->set_flashdata('success_msg', 'Data has been deleted successfully');
        } else {
            $this->session->set_flashdata('error_msg', 'Something wrong');
        }
        redirect(admin_url() . 'manager', 'refresh');
    } 

    public function download_csv($id) {
        $data['allmanager'] = $this->manager_model->getmanagerInfoById($id);
        $this->load->helper('download');
        $filename = 'manager_records_' . date('Y-m-d') . '.csv';
        $csv_data = $this->generate_csv($data);
    
        force_download($filename, $csv_data);
    }

    function generate_csv($data) {
        //echo "<pre>"; print_r($data); die;
        if (empty($data)) {
            return '';
        }
        $row = (array) $data['allmanager'];

        $csv = '';
        $csv .= implode(',', array_keys($row)) . "\n";
        $csv .= '"' . implode('","', array_map('addslashes', $row)) . '"' . "\n";
    
        return $csv;
    }
}
?>