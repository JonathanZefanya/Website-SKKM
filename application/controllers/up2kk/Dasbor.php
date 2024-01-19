<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Dasbor extends UP2KK_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('up2kk/Dasbor_model', 'dasbor');
    }

    public function index()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array(
            'current_user' => $current_user,
            'count_mahasiswa' => $this->dasbor->count_mahasiswa($current_user->id_jurusan),
            'count_belum_divalidasi' => $this->dasbor->count_belum_divalidasi($current_user->id_jurusan),
            'count_tidak_valid' => $this->dasbor->count_tidak_valid($current_user->id_jurusan),
            'count_valid' => $this->dasbor->count_valid($current_user->id_jurusan),
            'gravatar_url' => $this->gravatar->get($current_user->email)
        );
        $this->template->load('templates/up2kk/dasbor_template', 'up2kk/dasbor', $data);
    }

}
