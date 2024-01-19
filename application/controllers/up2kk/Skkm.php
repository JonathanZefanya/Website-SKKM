<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Skkm extends UP2KK_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('up2kk/Skkm_model', 'skkm');
    }

    public function index()
    {
        $current_user = $this->ion_auth->user()->row();
        $mahasiswa = $this->skkm->get_mahasiswa($current_user->id_jurusan);
        $data = array(
            'current_user' => $current_user,
            'mahasiswa' => $mahasiswa,
            'gravatar_url' => $this->gravatar->get($current_user->email)
        );
        $this->template->load('templates/up2kk/skkm_template', 'up2kk/skkm/index', $data);
    }

    public function list_skkm($id_user)
    {
        $current_user = $this->ion_auth->user()->row();
        $row = $this->skkm->get_skkm_mahasiswa($id_user);
        $data = array(
            'current_user' => $current_user,
            'gravatar_url' => $this->gravatar->get($current_user->email),
            'list_skkm' => $row,
            'sum_belum_divalidasi' => $this->skkm->sum_belum_divalidasi($id_user),
            'sum_valid' => $this->skkm->sum_valid($id_user),
            'sum_tidak_valid' => $this->skkm->sum_tidak_valid($id_user),
            'status_skkm' => $this->skkm->status_skkm($id_user)
        );
        $this->template->load('templates/up2kk/skkm_template', 'up2kk/skkm/list_skkm', $data);
    }

    public function list_skkm_valid()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array('current_user' => $current_user,
            'gravatar_url' => $this->gravatar->get($current_user->email),
            'skkm_valid' => $this->skkm->get_skkm_valid()
        );
        $this->template->load('templates/up2kk/skkm_template', 'up2kk/skkm/list_skkm_valid', $data);
    }

}
