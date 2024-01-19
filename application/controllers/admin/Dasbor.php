<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Dasbor extends Admin_Controller
{

    public function __construct()
    {
      parent::__construct();
      $this->load->model('admin/Dasbor_model', 'dasbor');
    }

    public function index()
    {
      $current_user = $this->ion_auth->user()->row();
      $data = array(
          'current_user' => $current_user,
          'count_user' => $this->dasbor->count_user(),
          'count_pengumuman' => $this->dasbor->count_pengumuman(),
          'count_jenis' => $this->dasbor->count_jenis(),
          'count_tingkat' => $this->dasbor->count_tingkat(),
          'count_prestasi' => $this->dasbor->count_prestasi(),
          'gravatar_url' => $this->gravatar->get($current_user->email));
      $this->template->load('templates/admin/dasbor_template', 'admin/dasbor', $data);
    }

}
