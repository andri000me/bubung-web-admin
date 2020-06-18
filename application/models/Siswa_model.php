<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    private $_table = "siswa";

    public $siswa_id;
    public $nama;
    public $kelas_id;
    public $orangtua_id;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'kelas_id',
            'label' => 'ID Kelas',
            'rules' => 'required'],

            ['field' => 'orangtua_id',
            'label' => 'ID Orang Tua',
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
        return $this->db->get_where($this->_table, ["siswa_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->siswa_id = NULL;//uniqid();
        $this->nama = $post["nama"];
        $this->kelas_id = $post["kelas_id"];
        $this->orangtua_id = $post["orangtua_id"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->siswa_id = $post["siswa_id"];
        $this->nama = $post["nama"];
        $this->kelas_id = $post["kelas_id"];
        $this->orangtua_id = $post["orangtua_id"];
        return $this->db->update($this->_table, $this, array('siswa_id' => $post['siswa_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("siswa_id" => $id));
    }
}