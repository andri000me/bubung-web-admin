<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    private $_table = "admin";

    public $admin_id;
    public $username;
    public $password;
    public $nama;

    public function rules()
    {
        return [
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],
            
            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required'],
            
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required']
        ];
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["admin_id" => $id])->row();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->admin_id = $post["admin_id"];
        $this->username = $post["username"];
        $this->nama = $post["nama"];
        $this->password = $post["password"];
        return $this->db->update($this->_table, $this, array('admin_id' => $post['admin_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("admin_id" => $id));
    }
}