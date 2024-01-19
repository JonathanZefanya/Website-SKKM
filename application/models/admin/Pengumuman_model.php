<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Pengumuman_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $this->db->select('pengumuman.id, judul, isi_pengumuman, tanggal, users.nama_lengkap');
        $this->db->join('users', 'users.id = pengumuman.id_user');
        $this->db->order_by('pengumuman.id', 'DESC');
        return $this->db->get('pengumuman')->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('pengumuman')->row();
    }

    public function insert($data)
    {
        $this->db->insert('pengumuman', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('pengumuman', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pengumuman');
    }

}
