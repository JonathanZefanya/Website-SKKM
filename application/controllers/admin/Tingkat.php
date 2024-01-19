<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Tingkat extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Tingkat_model', 'tingkat');
        $this->load->library('form_validation');
    }

    function index()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array(
                'current_user' => $current_user,
                'tingkat' => $this->tingkat->get_all(),
                'gravatar_url' => $this->gravatar->get($current_user->email));
        $this->template->load('templates/admin/tingkat_template', 'admin/tingkat/index', $data);
    }

    public function create()
    {
      $current_user = $this->ion_auth->user()->row();
      $data = array(
              'current_user' => $current_user,
              'dd_jenis' => $this->tingkat->get_jenis(),
              'jenis_selected' => $this->input->post('id_jenis_fk') ? $this->input->post('id_jenis_fk') : '',
              'gravatar_url' => $this->gravatar->get($current_user->email));
      $this->template->load('templates/admin/tingkat_template', 'admin/tingkat/add', $data);
    }

    public function store()
    {
      $this->rules();
      if ($this->form_validation->run() == FALSE) {
        $this->create();
      } else {
        $tingkat = $this->input->post('tingkat');
        $id_jenis_fk = $this->input->post('id_jenis_fk');
        $data = array(
                'tingkat' => $tingkat,
                'id_jenis_fk' => $id_jenis_fk);
        $this->tingkat->insert($data);
        $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Tingkat berhasil ditambah.</div>");
        redirect(site_url('admin/tingkat'));
      }
    }

    public function edit($id)
    {
      $current_user = $this->ion_auth->user()->row();
      $row = $this->tingkat->get_by_id($id);
      if ($row) {
          $data = array(
                  'id_tingkat' => $row->id_tingkat,
                  'tingkat' => $row->tingkat,
                  'id_jenis_fk' => $row->id_jenis_fk,
                  'dd_jenis' => $this->tingkat->get_jenis(),
                  'current_user' => $current_user,
                  'gravatar_url' => $this->gravatar->get($current_user->email));
          $this->template->load('templates/admin/tingkat_template', 'admin/tingkat/edit', $data);
      } else {
          $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
          redirect(site_url('admin/tingkat'));
      }
    }

    public function update($id)
    {
      $this->rules();
      if ($this->form_validation->run() == FALSE) {
        $this->edit($id);
      } else {
        $id = $this->input->post('id_tingkat');
        $tingkat = $this->input->post('tingkat');
        $id_jenis_fk = $this->input->post('id_jenis_fk');
        $data = array(
                'tingkat' => $tingkat,
                'id_jenis_fk' => $id_jenis_fk);
        $this->tingkat->update($id, $data);
        $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Tingkat berhasil diubah.</div>");
        redirect(site_url('admin/tingkat'));
      }
    }

    public function delete($id)
    {
      $row = $this->tingkat->get_by_id($id);

      if ($row) {
          $this->tingkat->delete($id);
          $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Tingkat berhasil dihapus.</div>");
          redirect(site_url('admin/tingkat'));
      } else {
          $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
          redirect(site_url('admin/tingkat'));
      }
    }

    public function rules()
    {
      $this->form_validation->set_rules('tingkat', 'Tingkat', 'trim|required');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
