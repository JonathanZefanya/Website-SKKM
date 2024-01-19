<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Beranda extends CI_Controller
{
    public $beranda;
    public $template;
    public $load;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Beranda_model', 'beranda');
    }

    public function index()
    {
        $data['pengumuman'] = $this->beranda->pengumuman();
        $this->template->load('templates/beranda_template', 'beranda', $data);
    }

}
