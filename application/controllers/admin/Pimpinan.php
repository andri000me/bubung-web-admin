<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pimpinan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/pimpinan_model');
        $this->load->library('form_validation');
        $this->load->model('admin/login_model');
        if($this->login_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["pimpinans"] = $this->pimpinan_model->getAll();
        $this->template->load('admin/base', 'admin/pimpinan/data', $data);
    }

    public function add()
    {
        $pimpinan = $this->pimpinan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pimpinan->rules());

        if ($validation->run()) {
            $pimpinan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal disimpan');
        }

        redirect(site_url('admin/pimpinan'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/pimpinan');
       
        $pimpinan = $this->pimpinan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pimpinan->rules());

        if ($validation->run()) {
            $pimpinan->update();
            $this->session->set_flashdata('success', 'Berhasil diperbaharui');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal diperbaharui');
        }

        $data["pimpinan"] = $pimpinan->getById($id);
        if (!$data["pimpinan"]) show_404();
        
        redirect(site_url('admin/pimpinan'));
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pimpinan_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('admin/pimpinan'));
    }
}