<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel_model extends CI_Model
{
    private $_table = "mapel";

    public $mapel_id;
    public $mapel_nama;

    public function rules()
    {
        return [
            ['field' => 'mapel_nama',
            'rules' => 'required']
        ];
    }

    public function getCount()
    {
        return $this->db->get($this->_table)->num_rows();
    }

    public function getAll()
    {
        $this->db->order_by('mapel_nama', 'ASC');
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["mapel_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->mapel_id = NULL;//uniqid();
        $this->mapel_nama = $post["mapel_nama"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->mapel_id = $post["mapel_id"];
        $this->mapel_nama = $post["mapel_nama"];
        return $this->db->update($this->_table, $this, array('mapel_id' => $post['mapel_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("mapel_id" => $id));
    }
}