<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Prestasi extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Prestasi_model', 'prestasi');
        $this->load->library('form_validation');
    }

    function index()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array(
                'current_user' => $current_user,
                'prestasi' => $this->prestasi->get_all(),
                'gravatar_url' => $this->gravatar->get($current_user->email));
        $this->template->load('templates/admin/prestasi_template', 'admin/prestasi/index', $data);
    }

    public function create()
    {
      $current_user = $this->ion_auth->user()->row();
      $data = array(
              'current_user' => $current_user,
              'dd_tingkat' => $this->prestasi->get_tingkat(),
              'tingkat_selected' => $this->input->post('id_tingkat_fk') ? $this->input->post('id_tingkat_fk') : '',
              'gravatar_url' => $this->gravatar->get($current_user->email));
      $this->template->load('templates/admin/prestasi_template', 'admin/prestasi/add', $data);
    }

    public function store()
    {
      $this->rules();
      if ($this->form_validation->run() == FALSE) {
        $this->create();
      } else {
        $prestasi = $this->input->post('prestasi');
        $bobot = $this->input->post('bobot');
        $id_tingkat_fk = $this->input->post('id_tingkat_fk');
        $data = array(
                'prestasi' => $prestasi,
                'bobot' => $bobot,
                'id_tingkat_fk' => $id_tingkat_fk);
        $this->prestasi->insert($data);
        $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Prestasi berhasil ditambah.</div>");
        redirect(site_url('admin/prestasi'));
      }
    }

    public function edit($id)
    {
      $current_user = $this->ion_auth->user()->row();
      $row = $this->prestasi->get_by_id($id);
      if ($row) {
          $data = array(
                  'id_prestasi' => $row->id_prestasi,
                  'prestasi' => $row->prestasi,
                  'bobot' => $row->bobot,
                  'id_tingkat_fk' => $row->id_tingkat_fk,
                  'dd_tingkat' => $this->prestasi->get_tingkat(),
                  'current_user' => $current_user,
                  'gravatar_url' => $this->gravatar->get($current_user->email));
          $this->template->load('templates/admin/prestasi_template', 'admin/prestasi/edit', $data);
      } else {
          $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
          redirect(site_url('admin/prestasi'));
      }
    }

    public function update($id)
    {
      $this->rules();
      if ($this->form_validation->run() == FALSE) {
        $this->edit($id);
      } else {
        $id = $this->input->post('id_prestasi');
        $prestasi = $this->input->post('prestasi');
        $bobot = $this->input->post('bobot');
        $id_tingkat_fk = $this->input->post('id_tingkat_fk');
        $data = array(
                'prestasi' => $prestasi,
                'bobot' => $bobot,
                'id_tingkat_fk' => $id_tingkat_fk);
        $this->prestasi->update($id, $data);
        $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Prestasi berhasil diubah.</div>");
        redirect(site_url('admin/prestasi'));
      }
    }

    public function delete($id)
    {
      $row = $this->prestasi->get_by_id($id);

      if ($row) {
          $this->prestasi->delete($id);
          $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Prestasi berhasil dihapus.</div>");
          redirect(site_url('admin/prestasi'));
      } else {
          $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
          redirect(site_url('admin/prestasi'));
      }
    }

    public function rules()
    {
      $this->form_validation->set_rules('prestasi', 'Prestasi', 'trim|required');
      $this->form_validation->set_rules('bobot', 'Bobot', 'trim|required|numeric');
      $this->form_validation->set_rules('id_tingkat_fk', 'Tingkat', 'trim|required');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
