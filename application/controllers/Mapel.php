<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mapel_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if($this->login_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["mapels"] = $this->mapel_model->getAll();
        $this->template->load('base', 'mapel/data', $data);
    }

    public function add()
    {
        $mapel = $this->mapel_model;
        $validation = $this->form_validation;
        $validation->set_rules($mapel->rules());

        if ($validation->run()) {
            $mapel->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal disimpan');
        }

        redirect(site_url('mapel'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('mapel');
       
        $mapel = $this->mapel_model;
        $validation = $this->form_validation;
        $validation->set_rules($mapel->rules());

        if ($validation->run()) {
            $mapel->update();
            $this->session->set_flashdata('success', 'Berhasil diperbaharui');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal diperbaharui');
        }

        $data["mapel"] = $mapel->getById($id);
        if (!$data["mapel"]) show_404();
        
        redirect(site_url('mapel'));
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->mapel_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('mapel'));
    }
}