<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model
{
    private $_table = "guru";

    public $guru_id;
    public $nama;
    public $email;
    public $password;
    public $no_hp;
    public $alamat;
    public $kelas_id;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required'],

            ['field' => 'no_hp',
            'label' => 'No HP',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],

            ['field' => 'kelas_id',
            'label' => 'ID Kelas',
            'rules' => 'required']
        ];
    }

    public function getCount()
    {
        return $this->db->get($this->_table)->num_rows();
    }

    public function getAll()
    {
        $this->db->order_by('nama', 'ASC');
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["guru_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->guru_id = NULL;//uniqid();
        $this->nama = $post["nama"];
        $this->email = $post["email"];
        $this->password = $post["password"];
        $this->no_hp = $post["no_hp"];
        $this->alamat = $post["alamat"];
        $this->kelas_id = $post["kelas_id"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->guru_id = $post["guru_id"];
        $this->nama = $post["nama"];
        $this->email = $post["email"];
        $this->password = $post["password"];
        $this->no_hp = $post["no_hp"];
        $this->alamat = $post["alamat"];
        $this->kelas_id = $post["kelas_id"];
        return $this->db->update($this->_table, $this, array('guru_id' => $post['guru_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("guru_id" => $id));
    }
}