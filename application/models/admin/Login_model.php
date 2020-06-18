<?php

class Login_model extends CI_Model
{
    private $_table = "admin";

    public $username;
    public $password;

    public function cek(){
        $post = $this->input->post();
        $this->username = $post["username"];
        $this->password = $post["password"];
        $where = array(
			'username' => $this->username,
			// 'password' => MD5($this->password)
			'password' => $this->password
			);
        return $this->db->get_where($this->_table, $where)->row();
    }

    public function isNotLogin(){
        return $this->session->userdata('admin_id') === null;
    }
}