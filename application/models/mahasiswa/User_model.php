<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_profil($id_user)
    {
        $this->db->select('u.id, u.nama_lengkap, u.nim, u.email, j.id, j.nama_jurusan, p.id, p.nama_prodi, p.jenjang, s.id, s.semester, k.id, k.kelas');
        $this->db->from('users u');
        $this->db->join('jurusan j', 'j.id = u.id_jurusan');
        $this->db->join('prodi p', 'p.id = u.id_prodi');
        $this->db->join('kelas k', 'k.id = u.id_kelas');
        $this->db->join('semester s', 's.id = u.id_semester');
        $this->db->where('u.id', $id_user);
        return $query = $this->db->get()->row();
    }

    public function get_jurusan()
    {
        $this->db->select('*');
        $this->db->from('jurusan');
        $result = $this->db->get();
        return $result->result();
    }

    public function get_prodi($id_jurusan)
    {
        if (isset($id_jurusan)) {
            $this->db->where('id_jurusan', $id_jurusan);
        }

        $this->db->select('id, id_jurusan, nama_prodi');
        $this->db->from('prodi');
        $result = $this->db->get();
        return $result->result();
    }

    public function get_kelas()
    {
        $this->db->order_by('kelas', 'asc');
        $result = $this->db->get('kelas');

        $dd[''] = 'Silahkan Pilih';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                // menentukan value sebelah kiri dan label sebelah kanan
                $dd[$row->id] = $row->kelas;
            }
        }
        return $dd;
    }

    public function get_semester()
    {
        $this->db->order_by('semester', 'asc');
        $result = $this->db->get('semester');

        $dd[''] = 'Silahkan Pilih';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                // menentukan value sebelah kiri dan label sebelah kanan
                $dd[$row->id] = $row->semester;
            }
        }
        return $dd;
    }

}
