<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Dasbor extends Mahasiswa_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mahasiswa/Dasbor_model', 'dasbor');
    }

    public function index()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array(
            'current_user' => $current_user,
            'gravatar_url' => $this->gravatar->get($current_user->email),
            'skkm_belum_divalidasi' => $this->dasbor->skkm_belum_divalidasi($current_user->id),
            'skkm_valid' => $this->dasbor->skkm_valid($current_user->id),
            'skkm_tidak_valid' => $this->dasbor->skkm_tidak_valid($current_user->id));
        $this->template->load('templates/mahasiswa/dasbor_template', 'mahasiswa/dasbor', $data);
    }

}
