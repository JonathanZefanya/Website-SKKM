<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Dasbor_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // menghitung jumlah mahasiswa
    public function count_mahasiswa($id_jurusan)
    {
        $this->db->select('COUNT(users.id) as total, groups.name, jurusan.nama_jurusan');
        $this->db->from('users');
        $this->db->join('users_groups', 'users_groups.user_id = users.id');
        $this->db->join('groups', 'users_groups.group_id = groups.id');
        $this->db->join('jurusan', 'users.id_jurusan = jurusan.id');
        $this->db->where('jurusan.id', $id_jurusan);
        $this->db->where('groups.id', 3);
        return $result = $this->db->get()->row()->total;
    }

    // menghitung jumlah skkm yang tidak valid
    public function count_tidak_valid($id_jurusan)
    {
        $this->db->select('u.id, COUNT(s.nilai) as total, g.name, j.nama_jurusan');
        $this->db->from('users u');
        $this->db->join('skkm s', 's.id_user = u.id');
        $this->db->join('users_groups ug', 'ug.user_id = u.id');
        $this->db->join('groups g', 'ug.group_id = g.id');
        $this->db->join('jurusan j', 'u.id_jurusan = j.id');
        $this->db->where('j.id', $id_jurusan);
        $this->db->where('g.id', 3);
        $this->db->where('s.status', 2);
        return $result = $this->db->get()->row()->total;
    }

    // menghitung jumlah skkm yang valid
    public function count_valid($id_jurusan)
    {
        $this->db->select('u.id, COUNT(s.nilai) as total, g.name, j.nama_jurusan');
        $this->db->from('users u');
        $this->db->join('skkm s', 's.id_user = u.id');
        $this->db->join('users_groups ug', 'ug.user_id = u.id');
        $this->db->join('groups g', 'ug.group_id = g.id');
        $this->db->join('jurusan j', 'u.id_jurusan = j.id');
        $this->db->where('j.id', $id_jurusan);
        $this->db->where('g.id', 3);
        $this->db->where('s.status', 1);
        return $result = $this->db->get()->row()->total;
    }

    // menghitung jumlah skkm yang belum divalidasi
    public function count_belum_divalidasi($id_jurusan)
    {
        $this->db->select('u.id, COUNT(s.nilai) as total, g.name, j.nama_jurusan');
        $this->db->from('users u');
        $this->db->join('skkm s', 's.id_user = u.id');
        $this->db->join('users_groups ug', 'ug.user_id = u.id');
        $this->db->join('groups g', 'ug.group_id = g.id');
        $this->db->join('jurusan j', 'u.id_jurusan = j.id');
        $this->db->where('j.id', $id_jurusan);
        $this->db->where('g.id', 3);
        $this->db->where('s.status', 0);
        return $result = $this->db->get()->row()->total;
    }

}
