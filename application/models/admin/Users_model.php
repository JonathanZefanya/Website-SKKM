<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Users_model extends CI_Model {

  public function __construct()
  {
        parent::__construct();
  }

  public function get_users()
  {
    $this->db->select('u.id, u.nama_lengkap, u.email, u.last_login, u.nim, u.nip, u.active, g.name, j.nama_jurusan, p.nama_prodi');
    $this->db->from('users u');
    $this->db->join('users_groups ug', 'ug.user_id = u.id', 'inner');
    $this->db->join('groups g', 'g.id = ug.group_id');
    $this->db->join('jurusan j', 'j.id = u.id_jurusan', 'left outer');
    $this->db->join('prodi p', 'p.id = u.id_prodi', 'left outer');
    return $this->db->get()->result();
  }

  public function get_jurusan()
  {
    $this->db->select('*');
    $this->db->from('jurusan');
    $result = $this->db->get();
    return $result->result();
  }

  // menampilkan prodi berdasarkan jurusan
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

  // menampilkan kelas
  public function get_kelas()
  {
    $this->db->order_by('kelas','asc');
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
    $this->db->order_by('semester','asc');
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
