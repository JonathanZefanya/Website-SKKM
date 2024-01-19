<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Tingkat_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_all()
    {
        $this->db->select('id_tingkat, jenis.jenis, tingkat');
        $this->db->join('jenis', 'jenis.id_jenis = tingkat.id_jenis_fk');
        $this->db->order_by('id_tingkat', 'DESC');
        return $this->db->get('tingkat')->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id_tingkat', $id);
        return $this->db->get('tingkat')->row();
    }

    function get_jenis()
    {
        $result = $this->db->get('jenis');

        $dd[''] = 'Silahkan Pilih';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                // value di sebelah kiri dan label di sebelah kanan
                $dd[$row->id_jenis] = $row->jenis;
            }
        }
        return $dd;
    }

    public function insert($data)
    {
        $this->db->insert('tingkat', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_tingkat', $id);
        $this->db->update('tingkat', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_tingkat', $id);
        $this->db->delete('tingkat');
    }

}
