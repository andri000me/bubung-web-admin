<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mapelkelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kelas_model');
        $this->load->model('mapel_model');
        $this->load->model('mapelkelas_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if($this->login_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["kelass"] = $this->kelas_model->getAll();
        $this->template->load('base', 'mapelkelas/data', $data);
    }

    public function open($kelas_id)
    {
        $data['mapels'] = $this->mapel_model->getAll();
        $data["mapelkelass"] = $this->mapelkelas_model->getAll($kelas_id);
        $data['kelas'] = $this->kelas_model->getById($kelas_id);
        $this->template->load('base', 'mapelkelas/open', $data);
    }

    public function add($kelas_id)
    {
        $mapelkelas = $this->mapelkelas_model;
        $validation = $this->form_validation;
        $validation->set_rules($mapelkelas->rules());

        if ($validation->run()) {
            $mapelkelas->save($kelas_id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal disimpan');
        }

        redirect(site_url('mapelkelas/open/'.$kelas_id));
    }

    public function edit($kelas_id, $id = null)
    {
        if (!isset($id)) redirect('mapelkelas/open/'.$kelas_id);
       
        $mapelkelas = $this->mapelkelas_model;
        $validation = $this->form_validation;
        $validation->set_rules($mapelkelas->rules());

        if ($validation->run()) {
            $mapelkelas->update();
            $this->session->set_flashdata('success', 'Berhasil diperbaharui');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal diperbaharui');
        }

        $data["mapelkelas"] = $mapelkelas->getById($id);
        if (!$data["mapelkelas"]) show_404();
        
        redirect(site_url('mapelkelas/open/'.$kelas_id));
    }

    public function delete($kelas_id, $id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->mapelkelas_model->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('mapelkelas/open/'.$kelas_id));
    }
}