<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kajur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/kajur_model');
        $this->load->model('admin/jurusan_model');
        $this->load->library('form_validation');
        $this->load->model('admin/login_model');
        if($this->login_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["kajurs"] = $this->kajur_model->getAll();
        $data["jurusans"] = $this->jurusan_model->getAll();
        $this->template->load('admin/base', 'admin/kajur/data', $data);
    }

    public function add()
    {
        $kajur = $this->kajur_model;
        $validation = $this->form_validation;
        $validation->set_rules($kajur->rules());

        if ($validation->run()) {
            $kajur->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal disimpan');
        }

        redirect(site_url('admin/kajur'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/kajur');
       
        $kajur = $this->kajur_model;
        $validation = $this->form_validation;
        $validation->set_rules($kajur->rules());

        if ($validation->run()) {
            $kajur->update();
            $this->session->set_flashdata('success', 'Berhasil diperbaharui');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal diperbaharui');
        }

        $data["kajur"] = $kajur->getById($id);
        if (!$data["kajur"]) show_404();
        
        redirect(site_url('admin/kajur'));
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->kajur_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('admin/kajur'));
    }
}