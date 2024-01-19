<?php defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Pengumuman extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Pengumuman_model', 'pengumuman');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array(
            'current_user' => $current_user,
            'pengumuman' => $this->pengumuman->get_all(),
            'gravatar_url' => $this->gravatar->get($current_user->email)
        );
        $this->template->load('templates/admin/pengumuman_template', 'admin/pengumuman/index', $data);
    }

    public function create()
    {
      $current_user = $this->ion_auth->user()->row();
      $data = array(
              'current_user' => $current_user,
              'gravatar_url' => $this->gravatar->get($current_user->email));
      $this->template->load('templates/admin/pengumuman_template', 'admin/pengumuman/add', $data);
    }

    public function store()
    {
      $this->rules();
      if ($this->form_validation->run() == FALSE) {
        $this->create();
      } else {
        $current_user = $this->ion_auth->user()->row();
        $judul = $this->input->post('judul');
        $isi_pengumuman = $this->input->post('isi_pengumuman');
        $slug = url_title($judul, 'dash', TRUE);
        $data = array(
                'judul' => $judul,
                'isi_pengumuman' => $isi_pengumuman,
                'slug' => $slug,
                'id_user' => $current_user->id);
        $this->pengumuman->insert($data);
        $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Pengumuman berhasil ditambah.</div>");
        redirect(site_url('admin/pengumuman'));
      }
    }

    public function edit($id)
    {
      $current_user = $this->ion_auth->user()->row();
      $row = $this->pengumuman->get_by_id($id);
      if ($row) {
          $data = array(
              'id' => set_value('id', $row->id),
              'judul' => set_value('judul', $row->judul),
              'isi_pengumuman' => set_value('isi_pengumuman', $row->isi_pengumuman),
              'id_user' => set_value('id_user', $row->id_user),
              'current_user' => $current_user,
              'gravatar_url' => $this->gravatar->get($current_user->email)
          );
          $this->template->load('templates/admin/pengumuman_template', 'admin/pengumuman/edit', $data);
      } else {
          $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
          redirect(site_url('admin/pengumuman'));
      }
    }

    public function update($id)
    {
      $this->rules();
      if ($this->form_validation->run() == FALSE) {
        $this->edit($id);
      } else {
        $current_user = $this->ion_auth->user()->row();
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $isi_pengumuman = $this->input->post('isi_pengumuman');
        $slug = url_title($judul, 'dash', TRUE);
        $data = array(
            'judul' => $judul,
            'isi_pengumuman' => $isi_pengumuman,
            'slug' => $slug,
            'id_user' => $current_user->id
        );
        $this->pengumuman->update($id, $data);
        $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Pengumuman berhasil diubah.</div>");
        redirect(site_url('admin/pengumuman'));
      }
    }

    public function delete($id)
    {
        $row = $this->pengumuman->get_by_id($id);

        if ($row) {
            $this->pengumuman->delete($id);
            $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Pengumuman berhasil dihapus.</div>");
            redirect(site_url('admin/pengumuman'));
        } else {
            $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
            redirect(site_url('admin/pengumuman'));
        }

    }

    function rules()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('isi_pengumuman', 'Isi', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
