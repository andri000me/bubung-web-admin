<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orangtua extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('orangtua_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if($this->login_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["orangtuas"] = $this->orangtua_model->getAll();
        $this->template->load('base', 'orangtua/data', $data);
    }

    public function add()
    {
        $orangtua = $this->orangtua_model;
        $validation = $this->form_validation;
        $validation->set_rules($orangtua->rules());

        if ($validation->run()) {
            $orangtua->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal disimpan');
        }

        redirect(site_url('orangtua'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('orangtua');
       
        $orangtua = $this->orangtua_model;
        $validation = $this->form_validation;
        $validation->set_rules($orangtua->rules());

        if ($validation->run()) {
            $orangtua->update();
            $this->session->set_flashdata('success', 'Berhasil diperbaharui');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal diperbaharui');
        }

        $data["orangtua"] = $orangtua->getById($id);
        if (!$data["orangtua"]) show_404();
        
        redirect(site_url('orangtua'));
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->orangtua_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('orangtua'));
    }
}