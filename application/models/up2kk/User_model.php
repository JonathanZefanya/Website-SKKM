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
        $this->db->select('u.id, u.nama_lengkap, u.nip, u.email, j.id, j.nama_jurusan');
        $this->db->from('users u');
        $this->db->join('jurusan j', 'j.id = u.id_jurusan');
        $this->db->where('u.id', $id_user);
        return $this->db->get()->row();
    }

    public function get_jurusan()
    {
        $this->db->select('*');
        $this->db->from('jurusan');
        $result = $this->db->get();
        return $result->result();
    }

}
