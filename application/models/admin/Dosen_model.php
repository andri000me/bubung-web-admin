<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model
{
    private $_table = "dosen";

    public $dosen_id;
    public $nama;
    public $username;
    public $password;
    public $status;
    public $kelas_id;

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

            ['field' => 'kelas_id',
            'label' => 'ID Kelas',
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
        return $this->db->get_where($this->_table, ["dosen_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->dosen_id = NULL;//uniqid();
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->status = 'A';
        $this->kelas_id = $post["kelas_id"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->dosen_id = $post["dosen_id"];
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->status = $post["status"];
        $this->kelas_id = $post["kelas_id"];
        return $this->db->update($this->_table, $this, array('dosen_id' => $post['dosen_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("dosen_id" => $id));
    }
}