<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kelas_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if($this->login_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["kelass"] = $this->kelas_model->getAll();
        $this->template->load('base', 'kelas/data', $data);
    }

    public function add()
    {
        $kelas = $this->kelas_model;
        $validation = $this->form_validation;
        $validation->set_rules($kelas->rules());

        if ($validation->run()) {
            $kelas->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal disimpan');
        }

        redirect(site_url('kelas'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('kelas');
       
        $kelas = $this->kelas_model;
        $validation = $this->form_validation;
        $validation->set_rules($kelas->rules());

        if ($validation->run()) {
            $kelas->update();
            $this->session->set_flashdata('success', 'Berhasil diperbaharui');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal diperbaharui');
        }

        $data["kelas"] = $kelas->getById($id);
        if (!$data["kelas"]) show_404();
        
        redirect(site_url('kelas'));
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->kelas_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('kelas'));
    }
}