<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/prodi_model');
        $this->load->model('admin/jurusan_model');
        $this->load->library('form_validation');
        $this->load->model('admin/login_model');
        if($this->login_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["prodis"] = $this->prodi_model->getAll();
        $data["jurusans"] = $this->jurusan_model->getAll();
        $this->template->load('admin/base', 'admin/prodi/data', $data);
    }

    public function add()
    {
        $prodi = $this->prodi_model;
        $validation = $this->form_validation;
        $validation->set_rules($prodi->rules());

        if ($validation->run()) {
            $prodi->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal disimpan');
        }

        redirect(site_url('admin/prodi'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/prodi');
       
        $prodi = $this->prodi_model;
        $validation = $this->form_validation;
        $validation->set_rules($prodi->rules());

        if ($validation->run()) {
            $prodi->update();
            $this->session->set_flashdata('success', 'Berhasil diperbaharui');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal diperbaharui');
        }

        $data["prodi"] = $prodi->getById($id);
        if (!$data["prodi"]) show_404();
        
        redirect(site_url('admin/prodi'));
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->prodi_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('admin/prodi'));
    }
}