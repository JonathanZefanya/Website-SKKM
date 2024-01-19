<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Skkm_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all($id_user)
    {
        $this->db->select('id, id_user, nama_kegiatan, filefoto, j.jenis, t.tingkat, p.prestasi, nilai, status, keterangan');
        $this->db->from('skkm');
        $this->db->join('jenis j', 'j.id_jenis = skkm.id_jenis');
        $this->db->join('tingkat t', 't.id_tingkat = skkm.id_tingkat');
        $this->db->join('prestasi p', 'p.id_prestasi = skkm.id_prestasi');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_skkm_valid($id_user)
    {
        $this->db->select('id, id_user, nama_kegiatan, filefoto, j.jenis, t.tingkat, p.prestasi, nilai, status, keterangan');
        $this->db->from('skkm');
        $this->db->join('jenis j', 'j.id_jenis = skkm.id_jenis');
        $this->db->join('tingkat t', 't.id_tingkat = skkm.id_tingkat');
        $this->db->join('prestasi p', 'p.id_prestasi = skkm.id_prestasi');
        $array = array('id_user' => $id_user, 'status' => 1);
        $this->db->where($array);
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_skkm_belum_valid($id_user)
    {
        $this->db->select('id, id_user, nama_kegiatan, filefoto, j.jenis, t.tingkat, p.prestasi, nilai, status, keterangan');
        $this->db->from('skkm');
        $this->db->join('jenis j', 'j.id_jenis = skkm.id_jenis');
        $this->db->join('tingkat t', 't.id_tingkat = skkm.id_tingkat');
        $this->db->join('prestasi p', 'p.id_prestasi = skkm.id_prestasi');
        $array = array('id_user' => $id_user, 'status' => 0);
        $this->db->where($array);
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_skkm_tidak_valid($id_user)
    {
        $this->db->select('id, id_user, nama_kegiatan, filefoto, j.jenis, t.tingkat, p.prestasi, nilai, status, keterangan');
        $this->db->from('skkm');
        $this->db->join('jenis j', 'j.id_jenis = skkm.id_jenis');
        $this->db->join('tingkat t', 't.id_tingkat = skkm.id_tingkat');
        $this->db->join('prestasi p', 'p.id_prestasi = skkm.id_prestasi');
        $array = array('id_user' => $id_user, 'status' => 2);
        $this->db->where($array);
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('skkm')->row();
    }

    public function get_jenis()
    {
        $this->db->select('*');
        $this->db->from('jenis');
        $result = $this->db->get();
        return $result->result();
    }

    public function get_tingkat($id_jenis)
    {
        if (isset($id_jenis)) {
            $this->db->where('id_jenis_fk', $id_jenis);
        }

        $this->db->select('*');
        $this->db->from('tingkat');
        $result = $this->db->get();
        return $result->result();
    }

    public function get_prestasi($id_tingkat)
    {
        if (isset($id_tingkat)) {
            $this->db->where('id_tingkat_fk', $id_tingkat);
        }

        $this->db->select('id_prestasi, prestasi');
        $this->db->from('prestasi');
        $result = $this->db->get();
        return $result->result();
    }

    public function get_nilai($id_prestasi)
    {
        if (isset($id_prestasi)) {
            $this->db->where('id_prestasi', $id_prestasi);
        }

        $this->db->select('id_prestasi, bobot');
        $this->db->from('prestasi');
        $result = $this->db->get();
        return $result->result();
    }

    // START OF COBA COBA JONATHAN SUS
    public function get_bobot($id_prestasi, $id_tingkat_fk) {
        if (isset($id_prestasi)) {
            $this->db->where('id_prestasi', $id_prestasi);
            $this->db->where('id_tingkat_fk', $id_tingkat_fk);
        }

        $this->db->select('id_prestasi, bobot');
        $this->db->from('prestasi');
        $result = $this->db->get();
        return $result->result();
    }
    // END OF COBA COBA JONATHAN SUS

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

    // mengetahui status kelulusan skkm
    public function status_skkm($id_user)
    {
        $this->db->select('u.id, p.jenjang, s.standar as total');
        $this->db->from('users u');
        $this->db->join('prodi p', 'u.id_prodi = p.id');
        $this->db->join('standar s', 's.jenjang = p.jenjang');
        $this->db->where('u.id', $id_user);
        $result = $this->db->get()->row();

        if ($result == null) {
            return true;
        }

        return $result->total;
    }

    public function insert($data)
    {
        $this->db->insert('skkm', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('skkm', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('skkm');
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

}
