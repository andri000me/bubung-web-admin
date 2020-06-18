<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi_model extends CI_Model
{
    private $_table = "prodi";

    public $prodi_id;
    public $prodi_nama;
    public $jurusan_id;

    public function rules()
    {
        return [
            ['field' => 'prodi_nama',
            'label' => 'Nama Prodi',
            'rules' => 'required'],

            ['field' => 'jurusan_id',
            'label' => 'ID Jurusan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->join('jurusan', 'jurusan.jurusan_id = prodi.jurusan_id');
        $this->db->order_by('prodi_nama', 'ASC');
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["prodi_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->prodi_id = NULL;//uniqid();
        $this->prodi_nama = $post["prodi_nama"];
        $this->jurusan_id = $post["jurusan_id"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->prodi_id = $post["prodi_id"];
        $this->prodi_nama = $post["prodi_nama"];
        $this->jurusan_id = $post["jurusan_id"];
        return $this->db->update($this->_table, $this, array('prodi_id' => $post['prodi_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("prodi_id" => $id));
    }
}