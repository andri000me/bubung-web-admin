<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orangtua_model extends CI_Model
{
    private $_table = "orangtua";

    public $orangtua_id;
    public $nama;
    public $email;
    public $password;
    public $no_hp;
    public $alamat;

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
        return $this->db->get_where($this->_table, ["orangtua_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->orangtua_id = NULL;//uniqid();
        $this->nama = $post["nama"];
        $this->email = $post["email"];
        $this->password = $post["password"];
        $this->no_hp = $post["no_hp"];
        $this->alamat = $post["alamat"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->orangtua_id = $post["orangtua_id"];
        $this->nama = $post["nama"];
        $this->email = $post["email"];
        $this->password = $post["password"];
        $this->no_hp = $post["no_hp"];
        $this->alamat = $post["alamat"];
        return $this->db->update($this->_table, $this, array('orangtua_id' => $post['orangtua_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("orangtua_id" => $id));
    }
}