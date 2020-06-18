<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa_model');
        $this->load->model('kelas_model');
        $this->load->model('orangtua_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if($this->login_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["siswas"] = $this->siswa_model->getAll();
        $data["kelass"] = $this->kelas_model->getAll();
        $data["orangtuas"] = $this->orangtua_model->getAll();
        $this->template->load('base', 'siswa/data', $data);
    }

    public function add()
    {
        $siswa = $this->siswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($siswa->rules());

        if ($validation->run()) {
            $siswa->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal disimpan');
        }

        redirect(site_url('siswa'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('siswa');
       
        $siswa = $this->siswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($siswa->rules());

        if ($validation->run()) {
            $siswa->update();
            $this->session->set_flashdata('success', 'Berhasil diperbaharui');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal diperbaharui');
        }

        $data["siswa"] = $siswa->getById($id);
        if (!$data["siswa"]) show_404();
        
        redirect(site_url('siswa'));
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->siswa_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('siswa'));
    }
}