<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/profile_model');
        // $this->load->library('form_validation');
        $this->load->model('admin/login_model');
        if($this->login_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $user = $this->profile_model;
        $id = $this->session->userdata('admin_id');
        $data["user"] = $user->getById($id);
        $data["roles"] = array(
            'admin'=>'Administrator',
            'mahasiswa'=>'Mahasiswa',
            'dosen_wali'=>'Dosen Wali',
            'ka_prodi'=>'KA. Prodi',
            'kajur'=>'KAJUR',
            'pimpinan'=>'Pimpinan'
        );
        if (!$data["user"]) redirect(site_url('login/logout'));
        
        $this->template->load('admin/base', 'admin/profile/data', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect(site_url('login/logout'));
       
        $user = $this->profile_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Profile berhasil diperbaharui.<br>Jika anda merubah username atau password. Mohon login berikutnya menggunakan username atau password baru anda.');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal diperbaharui');
        }

        $data["user"] = $user->getById($id);
        if (!$data["user"]) show_404();
        
        redirect(site_url('admin/profile'));
    }

}