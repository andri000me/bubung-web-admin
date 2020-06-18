<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/dosen_model');
        $this->load->model('admin/kelas_model');
        $this->load->library('form_validation');
        $this->load->model('admin/login_model');
        if($this->login_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["dosens"] = $this->dosen_model->getAll();
        $data["kelass"] = $this->kelas_model->getAll();
        $this->template->load('admin/base', 'admin/dosen/data', $data);
    }

    public function add()
    {
        $dosen = $this->dosen_model;
        $validation = $this->form_validation;
        $validation->set_rules($dosen->rules());

        if ($validation->run()) {
            $dosen->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal disimpan');
        }

        redirect(site_url('admin/dosen'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/dosen');
       
        $dosen = $this->dosen_model;
        $validation = $this->form_validation;
        $validation->set_rules($dosen->rules());

        if ($validation->run()) {
            $dosen->update();
            $this->session->set_flashdata('success', 'Berhasil diperbaharui');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal diperbaharui');
        }

        $data["dosen"] = $dosen->getById($id);
        if (!$data["dosen"]) show_404();
        
        redirect(site_url('admin/dosen'));
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->dosen_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('admin/dosen'));
    }
}