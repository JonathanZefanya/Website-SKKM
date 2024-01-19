<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Validasi extends UP2KK_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('up2kk/Validasi_model', 'validasi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $current_user = $this->ion_auth->user()->row();
        $mahasiswa = $this->validasi->get_mahasiswa($current_user->id_jurusan);
        $data = array(
                'current_user' => $current_user,
                'mahasiswa' => $mahasiswa,
                'gravatar_url' => $this->gravatar->get($current_user->email));
        $this->template->load('templates/up2kk/validasi_template', 'up2kk/validasi/index', $data);
    }

    public function list_skkm($id_user)
    {
        $current_user = $this->ion_auth->user()->row();
        $row = $this->validasi->get_skkm_mahasiswa($id_user);
        $data = array(
            'current_user' => $current_user,
            'list_skkm' => $row,
            'sum_belum_divalidasi' => $this->validasi->sum_belum_divalidasi($id_user),
            'sum_valid' => $this->validasi->sum_valid($id_user),
            'sum_tidak_valid' => $this->validasi->sum_tidak_valid($id_user),
            'status_skkm' => $this->validasi->status_skkm($id_user),
            'gravatar_url' => $this->gravatar->get($current_user->email)
        );
        $this->template->load('templates/up2kk/validasi_template', 'up2kk/validasi/list_skkm', $data);

    }

    public function edit_skkm($id_skkm)
    {
        $this->rules();
        $current_user = $this->ion_auth->user()->row();
        $row = $this->validasi->get_skkm($id_skkm);
        if ($this->form_validation->run() == FALSE) {
            if ($row) {
                $data = array(
                    'current_user' => $current_user,
                    'id' => $row->id,
                    'id_user' => $row->id_user,
                    'status' => $row->status,
                    'keterangan' => $row->keterangan,
                    'gravatar_url' => $this->gravatar->get($current_user->email)
                );
                $this->template->load('templates/up2kk/validasi_template', 'up2kk/validasi/skkm', $data);
            }
        }
    }

    public function update_skkm($id_skkm)
    {
        $id_user = $this->input->post('id_user');
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'id' => $id,
            'status' => $status,
            'keterangan' => $keterangan,
            'id_user' => $id_user
        );
        $this->validasi->validasi_skkm($id, $data);
        $this->session->set_flashdata('message', "<div style='color:#00a65a;'>SKKM berhasil divalidasi.</div>");
        redirect(site_url('up2kk/validasi/daftar-skkm/' . $id_user));
    }

    public function rules()
    {
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function list_skkm_tidak_valid()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array('current_user' => $current_user,
            'gravatar_url' => $this->gravatar->get($current_user->email),
            'skkm_tidak_valid' => $this->validasi->get_skkm_tidak_valid()
        );
        $this->template->load('templates/up2kk/validasi_template', 'up2kk/validasi/list_skkm_tidak_valid', $data);
    }

    public function list_skkm_belum_valid()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array('current_user' => $current_user,
            'gravatar_url' => $this->gravatar->get($current_user->email),
            'skkm_belum_valid' => $this->validasi->get_skkm_belum_valid()
        );
        $this->template->load('templates/up2kk/validasi_template', 'up2kk/validasi/list_skkm_belum_valid', $data);
    }

}
