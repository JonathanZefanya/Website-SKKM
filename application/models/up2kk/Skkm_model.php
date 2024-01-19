<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Skkm_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_mahasiswa($id_jurusan)
    {
        $this->db->select('u.id, u.nama_lengkap, u.nim, g.name, j.nama_jurusan, p.nama_prodi, p.jenjang, s.semester, k.kelas');
        $this->db->from('users u');
        $this->db->join('users_groups ug', 'ug.user_id = u.id');
        $this->db->join('groups g', 'g.id = ug.group_id');
        $this->db->join('jurusan j', 'j.id = u.id_jurusan');
        $this->db->join('prodi p', 'p.id = u.id_prodi');
        $this->db->join('semester s', 's.id = u.id_semester');
        $this->db->join('kelas k', 'k.id = u.id_kelas');
        $this->db->where('j.id', $id_jurusan);
        $this->db->where('g.id', 3);
        return $this->db->get()->result();
    }

    public function get_skkm_mahasiswa($id_user)
    {
        $this->db->select('id, id_user, nama_kegiatan, filefoto, jenis.jenis, tingkat.tingkat, prestasi.prestasi, nilai, status, keterangan');
        $this->db->from('skkm');
        $this->db->join('jenis', 'jenis.id_jenis = skkm.id_jenis');
        $this->db->join('tingkat', 'tingkat.id_tingkat = skkm.id_tingkat');
        $this->db->join('prestasi', 'prestasi.id_prestasi = skkm.id_prestasi');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    // menghitung total skkm valid
    public function sum_valid($id_user)
    {
        $this->db->select('SUM(nilai) as total');
        $this->db->from('skkm');
        $this->db->where('status', 1);
        $this->db->where('id_user', $id_user);
        return $result = $this->db->get()->row()->total;
    }

    // menghitung total skkm tidak valid
    public function sum_tidak_valid($id_user)
    {
        $this->db->select('SUM(nilai) as total');
        $this->db->from('skkm');
        $this->db->where('status', 2);
        $this->db->where('id_user', $id_user);
        return $result = $this->db->get()->row()->total;
    }

    // menghitung total skkm belum divalidasi
    public function sum_belum_divalidasi($id_user)
    {
        $this->db->select('SUM(nilai) as total');
        $this->db->from('skkm');
        $this->db->where('status', 0);
        $this->db->where('id_user', $id_user);
        return $result = $this->db->get()->row()->total;
    }

    // mengecek status kelulusan skkm
    public function status_skkm($id_user)
    {
        $this->db->select('u.id, p.jenjang, s.standar as total');
        $this->db->from('users u');
        $this->db->join('prodi p', 'u.id_prodi = p.id');
        $this->db->join('standar s', 's.jenjang = p.jenjang');
        $this->db->where('u.id', $id_user);
        return $result = $this->db->get()->row()->total;
    }

    // mendapatkan data status dan keterangan
    public function get_skkm($id_skkm)
    {
        $this->db->select('id, id_user, status, keterangan');
        $this->db->from('skkm');
        $this->db->where('id', $id_skkm);
        return $this->db->get()->row();
    }

    public function get_skkm_valid()
    {
        $this->db->select('id, nama_kegiatan, filefoto, jenis.jenis, tingkat.tingkat, prestasi.prestasi, nilai, status, keterangan');
        $this->db->from('skkm');
        $this->db->join('jenis', 'jenis.id_jenis = skkm.id_jenis');
        $this->db->join('tingkat', 'tingkat.id_tingkat = skkm.id_tingkat');
        $this->db->join('prestasi', 'prestasi.id_prestasi = skkm.id_prestasi');
        $this->db->where('status', 1);
        return $this->db->get()->result();
    }

}
