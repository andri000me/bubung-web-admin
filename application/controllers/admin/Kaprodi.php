<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kaprodi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/kaprodi_model');
        $this->load->model('admin/prodi_model');
        $this->load->library('form_validation');
        $this->load->model('admin/login_model');
        if($this->login_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["kaprodis"] = $this->kaprodi_model->getAll();
        $data["prodis"] = $this->prodi_model->getAll();
        $this->template->load('admin/base', 'admin/kaprodi/data', $data);
    }

    public function add()
    {
        $kaprodi = $this->kaprodi_model;
        $validation = $this->form_validation;
        $validation->set_rules($kaprodi->rules());

        if ($validation->run()) {
            $kaprodi->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal disimpan');
        }

        redirect(site_url('admin/kaprodi'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/kaprodi');
       
        $kaprodi = $this->kaprodi_model;
        $validation = $this->form_validation;
        $validation->set_rules($kaprodi->rules());

        if ($validation->run()) {
            $kaprodi->update();
            $this->session->set_flashdata('success', 'Berhasil diperbaharui');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal diperbaharui');
        }

        $data["kaprodi"] = $kaprodi->getById($id);
        if (!$data["kaprodi"]) show_404();
        
        redirect(site_url('admin/kaprodi'));
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->kaprodi_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('admin/kaprodi'));
    }
}