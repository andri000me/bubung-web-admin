<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('guru_model');
        $this->load->model('orangtua_model');
        $this->load->model('siswa_model');
        if($this->login_model->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["total_guru"] = $this->guru_model->getCount();
        $data["total_orangtua"] = $this->orangtua_model->getCount();
        $data["total_siswa"] = $this->siswa_model->getCount();
        $this->template->load('base', 'home', $data);
    }
}
