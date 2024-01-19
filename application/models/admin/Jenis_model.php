<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Jenis_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_all()
    {
      $this->db->order_by('id_jenis', 'DESC');
      return $this->db->get('jenis')->result();
    }

    public function get_by_id($id)
    {
      $this->db->where('id_jenis', $id);
      return $this->db->get('jenis')->row();
    }

    public function insert($data)
    {
      $this->db->insert('jenis', $data);
    }

    public function update($id, $data)
    {
      $this->db->where('id_jenis', $id);
      $this->db->update('jenis', $data);
    }

    public function delete($id)
    {
      $this->db->where('id_jenis', $id);
      $this->db->delete('jenis');
    }

}
