<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Prestasi_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_all()
    {
        $this->db->select('id_prestasi, tingkat.tingkat, prestasi, bobot');
        $this->db->join('tingkat', 'tingkat.id_tingkat = prestasi.id_tingkat_fk');
        $this->db->order_by('id_prestasi', 'DESC');
        return $this->db->get('prestasi')->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id_prestasi', $id);
        return $this->db->get('prestasi')->row();
    }

    function get_tingkat()
    {
        $result = $this->db->get('tingkat');

        $dd[''] = 'Silahkan Pilih';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                // value di sebelah kiri dan label di sebelah kanan
                $dd[$row->id_tingkat] = $row->tingkat;
            }
        }
        return $dd;
    }

    public function insert($data)
    {
        $this->db->insert('prestasi', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_prestasi', $id);
        $this->db->update('prestasi', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_prestasi', $id);
        $this->db->delete('prestasi');
    }

}
