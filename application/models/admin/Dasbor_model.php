<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Dasbor_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    // menghitung jumlah user terdaftar
    public function count_user()
    {
        return $this->db->count_all('users');
    }

    // menghitung jumlah pengumuman yang dibuat
    public function count_pengumuman()
    {
        return $this->db->count_all('pengumuman');
    }

    // menghitung jumlah jenis
    public function count_jenis()
    {
        return $this->db->count_all('jenis');
    }

    // menghitung jumlah tingkat
    public function count_tingkat()
    {
        return $this->db->count_all('tingkat');
    }

    // menghitung jumlah sebagai
    public function count_prestasi()
    {
        return $this->db->count_all('prestasi');
    }

}
