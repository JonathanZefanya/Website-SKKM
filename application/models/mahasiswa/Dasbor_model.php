<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Dasbor_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // menghitung total nilai skkm valid
    public function skkm_valid($id_user)
    {
        $this->db->select('SUM(nilai) as total');
        $this->db->from('skkm');
        $this->db->where('status', 1);
        $this->db->where('id_user', $id_user);
        return $result = $this->db->get()->row()->total;
    }

    // menghitung total nilai skkm tidak valid
    public function skkm_tidak_valid($id_user)
    {
        $this->db->select('SUM(nilai) as total');
        $this->db->from('skkm');
        $this->db->where('status', 2);
        $this->db->where('id_user', $id_user);
        return $result = $this->db->get()->row()->total;
    }

    // menghitung total nilai skkm belum divalidasi
    public function skkm_belum_divalidasi($id_user)
    {
        $this->db->select('SUM(nilai) as total');
        $this->db->from('skkm');
        $this->db->where('status', 0);
        $this->db->where('id_user', $id_user);
        return $result = $this->db->get()->row()->total;
    }

}
