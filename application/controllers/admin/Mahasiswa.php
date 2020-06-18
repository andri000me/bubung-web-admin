<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/mahasiswa_model');
        $this->load->model('admin/kelas_model');
        $this->load->library('form_validation');
        $this->load->model('admin/login_model');
        if($this->login_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["mahasiswas"] = $this->mahasiswa_model->getAll();
        $data["kelass"] = $this->kelas_model->getAll();
        $this->template->load('admin/base', 'admin/mahasiswa/data', $data);
    }

    public function add()
    {
        $mahasiswa = $this->mahasiswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($mahasiswa->rules());

        if ($validation->run()) {
            $mahasiswa->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal disimpan');
        }

        redirect(site_url('admin/mahasiswa'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/mahasiswa');
       
        $mahasiswa = $this->mahasiswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($mahasiswa->rules());

        if ($validation->run()) {
            $mahasiswa->update();
            $this->session->set_flashdata('success', 'Berhasil diperbaharui');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal diperbaharui');
        }

        $data["mahasiswa"] = $mahasiswa->getById($id);
        if (!$data["mahasiswa"]) show_404();
        
        redirect(site_url('admin/mahasiswa'));
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->mahasiswa_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('admin/mahasiswa'));
    }
}