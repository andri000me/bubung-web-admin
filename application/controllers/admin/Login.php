<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/login_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if(!empty($this->session->userdata('admin_id'))){
            redirect(site_url('admin/home'));
        }
        $this->load->view("admin/login");
    }

    public function aksi_login(){
        $login = $this->login_model;
        $data = $login->cek();
        if ($data != null) {
            
            $data_session = array(
				'admin_id' => $data->admin_id
				);
 
			$this->session->set_userdata($data_session);
            redirect(site_url('admin/home'));
        }
        else {
            $this->session->set_flashdata('failed', 'Username atau password salah');
            redirect(site_url('admin/login'));
        }
	}

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('admin/login'));
    }
}