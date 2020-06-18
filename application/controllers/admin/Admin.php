<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/admin_model');
        $this->load->library('form_validation');
        $this->load->model('admin/login_model');
        if($this->login_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["admins"] = $this->admin_model->getAll();
        $this->template->load('admin/base', 'admin/admin/data', $data);
    }

    public function add()
    {
        $admin = $this->admin_model;
        $validation = $this->form_validation;
        $validation->set_rules($admin->rules());

        if ($validation->run()) {
            $admin->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal disimpan');
        }

        redirect(site_url('admin/admin'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/admin');
       
        $admin = $this->admin_model;
        $validation = $this->form_validation;
        $validation->set_rules($admin->rules());

        if ($validation->run()) {
            $admin->update();
            $this->session->set_flashdata('success', 'Berhasil diperbaharui');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal diperbaharui');
        }

        $data["admin"] = $admin->getById($id);
        if (!$data["admin"]) show_404();
        
        redirect(site_url('admin/admin'));
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->admin_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('admin/admin'));
    }
}