<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    private $_table = "admin";

    public $admin_id;
    public $nama;
    public $username;
    public $password;
    public $status;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],
            
            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->order_by('nama', 'ASC');
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["admin_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->admin_id = NULL;//uniqid();
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->status = "A";
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->admin_id = $post["admin_id"];
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->status = $post["status"];
        return $this->db->update($this->_table, $this, array('admin_id' => $post['admin_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("admin_id" => $id));
    }
}