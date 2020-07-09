<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mapelkelas_model extends CI_Model
{
    private $_table = "mapel_kelas";

    public $mapel_kelas_id;
    public $mapel_id;
    public $jam;
    public $hari;
    public $kelas_id;

    public function rules()
    {
        return [
            ['field' => 'jam',
            'rules' => 'required'],

            ['field' => 'hari',
            'rules' => 'required'],
        ];
    }

    public function getAll($kelas_id)
    {
        $this->db->join('mapel', 'mapel.mapel_id = mapel_kelas.mapel_id');
        $this->db->where('mapel_kelas.kelas_id', $kelas_id);
        $this->db->order_by('mapel_kelas_id', 'ASC');
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["mapel_kelas_id" => $id])->row();
    }

    public function save($kelas_id)
    {
        $post = $this->input->post();
        $this->mapel_kelas_id = NULL;//uniqid();
        $this->mapel_id = $post["mapel_id"];
        $this->jam = $post["jam"];
        $this->hari = $post["hari"];
        $this->kelas_id = $kelas_id;
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->mapel_kelas_id = $post["mapel_kelas_id"];
        $this->mapel_id = $post["mapel_id"];
        $this->jam = $post["jam"];
        $this->hari = $post["hari"];
        $this->kelas_id = $post["kelas_id"];
        return $this->db->update($this->_table, $this, array('mapel_kelas_id' => $post['mapel_kelas_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("mapel_kelas_id" => $id));
    }
}