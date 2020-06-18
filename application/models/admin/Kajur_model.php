<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kajur_model extends CI_Model
{
    private $_table = "kajur";

    public $kajur_id;
    public $nama;
    public $username;
    public $password;
    public $status;
    public $jurusan_id;

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
            'rules' => 'required'],

            ['field' => 'jurusan_id',
            'label' => 'ID Jurusan',
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
        return $this->db->get_where($this->_table, ["kajur_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kajur_id = NULL;//uniqid();
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->status = 'A';
        $this->jurusan_id = $post["jurusan_id"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kajur_id = $post["kajur_id"];
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->status = $post["status"];
        $this->jurusan_id = $post["jurusan_id"];
        return $this->db->update($this->_table, $this, array('kajur_id' => $post['kajur_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kajur_id" => $id));
    }
}