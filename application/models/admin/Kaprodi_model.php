<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kaprodi_model extends CI_Model
{
    private $_table = "kaprodi";

    public $kaprodi_id;
    public $nama;
    public $username;
    public $password;
    public $status;
    public $prodi_id;

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

            ['field' => 'prodi_id',
            'label' => 'ID Prodi',
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
        return $this->db->get_where($this->_table, ["kaprodi_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kaprodi_id = NULL;//uniqid();
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->status = 'A';
        $this->prodi_id = $post["prodi_id"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kaprodi_id = $post["kaprodi_id"];
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->status = $post["status"];
        $this->prodi_id = $post["prodi_id"];
        return $this->db->update($this->_table, $this, array('kaprodi_id' => $post['kaprodi_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kaprodi_id" => $id));
    }
}