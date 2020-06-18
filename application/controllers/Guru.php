<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('guru_model');
        $this->load->model('kelas_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if($this->login_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["gurus"] = $this->guru_model->getAll();
        $data["kelass"] = $this->kelas_model->getAll();
        $this->template->load('base', 'guru/data', $data);
    }

    public function add()
    {
        $guru = $this->guru_model;
        $validation = $this->form_validation;
        $validation->set_rules($guru->rules());

        if ($validation->run()) {
            $guru->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal disimpan');
        }

        redirect(site_url('guru'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('guru');
       
        $guru = $this->guru_model;
        $validation = $this->form_validation;
        $validation->set_rules($guru->rules());

        if ($validation->run()) {
            $guru->update();
            $this->session->set_flashdata('success', 'Berhasil diperbaharui');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal diperbaharui');
        }

        $data["guru"] = $guru->getById($id);
        if (!$data["guru"]) show_404();
        
        redirect(site_url('guru'));
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->guru_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('guru'));
    }
}