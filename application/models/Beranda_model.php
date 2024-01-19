<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Beranda_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function pengumuman()
    {
        $this->db->select('pengumuman.id, judul, isi_pengumuman, slug, tanggal, users.nama_lengkap');
        $this->db->join('users', 'users.id = pengumuman.id_user');
        return $this->db->get('pengumuman')->result();
    }

    public function pengumuman_paging($limit)
    {
        $this->db->select('pengumuman.id, judul, isi_pengumuman, slug, tanggal, users.nama_lengkap');
        $this->db->from('pengumuman');
        $this->db->join('users', 'users.id = pengumuman.id_user');
        $this->db->limit($limit['perpage'], $limit['offset']);
        return $this->db->get()->result();
    }

    public function single($slug)
    {
        $this->db->select('pengumuman.id, judul, isi_pengumuman, tanggal, slug, users.nama_lengkap');
        $this->db->join('users', 'pengumuman.id_user = users.id');
        $this->db->where('slug', $slug);
        return $this->db->get('pengumuman')->result();
    }

}
