<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Register_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  // menampilkan jurusan
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

    $dd[''] = 'Pilih Kelas';
    if ($result->num_rows() > 0) {
      foreach ($result->result() as $row) {
        // menentukan value sebelah kiri dan label sebelah kanan
        $dd[$row->id] = $row->kelas;
      }
    }
    return $dd;
  }

  // menampilkan semester
  public function get_semester()
  {
    $this->db->order_by('semester','asc');
    $result = $this->db->get('semester');

    $dd[''] = 'Pilih Semester';
    if ($result->num_rows() > 0) {
      foreach ($result->result() as $row) {
        // menentukan value sebelah kiri dan label sebelah kanan
        $dd[$row->id] = $row->semester;
      }
    }
    return $dd;
  }

}
