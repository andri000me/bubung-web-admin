<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model
{
    private $_table = "kelas";

    public $kelas_id;
    public $kelas_nama;

    public function rules()
    {
        return [
            ['field' => 'kelas_nama',
            'label' => 'Nama Kelas',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->order_by('kelas_nama', 'ASC');
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kelas_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kelas_id = NULL;//uniqid();
        $this->kelas_nama = $post["kelas_nama"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kelas_id = $post["kelas_id"];
        $this->kelas_nama = $post["kelas_nama"];
        return $this->db->update($this->_table, $this, array('kelas_id' => $post['kelas_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kelas_id" => $id));
    }
}