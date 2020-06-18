<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/jurusan_model');
        $this->load->library('form_validation');
        $this->load->model('admin/login_model');
        if($this->login_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["jurusans"] = $this->jurusan_model->getAll();
        $this->template->load('admin/base', 'admin/jurusan/data', $data);
    }

    public function add()
    {
        $jurusan = $this->jurusan_model;
        $validation = $this->form_validation;
        $validation->set_rules($jurusan->rules());

        if ($validation->run()) {
            $jurusan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal disimpan');
        }

        redirect(site_url('admin/jurusan'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/jurusan');
       
        $jurusan = $this->jurusan_model;
        $validation = $this->form_validation;
        $validation->set_rules($jurusan->rules());

        if ($validation->run()) {
            $jurusan->update();
            $this->session->set_flashdata('success', 'Berhasil diperbaharui');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal diperbaharui');
        }

        $data["jurusan"] = $jurusan->getById($id);
        if (!$data["jurusan"]) show_404();
        
        redirect(site_url('admin/jurusan'));
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->jurusan_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('admin/jurusan'));
    }
}