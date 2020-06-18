<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan_model extends CI_Model
{
    private $_table = "jurusan";

    public $jurusan_id;
    public $jurusan_nama;

    public function rules()
    {
        return [
            ['field' => 'jurusan_nama',
            'label' => 'Nama Jurusan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->order_by('jurusan_nama', 'ASC');
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["jurusan_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->jurusan_id = NULL;//uniqid();
        $this->jurusan_nama = $post["jurusan_nama"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->jurusan_id = $post["jurusan_id"];
        $this->jurusan_nama = $post["jurusan_nama"];
        return $this->db->update($this->_table, $this, array('jurusan_id' => $post['jurusan_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("jurusan_id" => $id));
    }
}