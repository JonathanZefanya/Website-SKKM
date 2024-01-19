<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Pengumuman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Beranda_model', 'beranda');
        // load helper text for using character_limiter
        $this->load->helper('text');
    }

    public function index($offset = 0)
    {
        // tentukan jumlah data per halaman
        $perpage = 3;

        // konfigurasi tampilan paging
        $config = array(
            'base_url' => base_url('pengumuman/index'),
            'total_rows' => count($this->beranda->pengumuman()),
            'per_page' => $perpage
        );

        // inisialisasi pagination dan config
        $this->pagination->initialize($config);
        $limit['perpage'] = $perpage;
        $limit['offset'] = $offset;

        $data['pengumuman'] = $this->beranda->pengumuman_paging($limit);
        $data = array(
            'pengumuman' => $this->beranda->pengumuman_paging($limit),
            'daftar_pengumuman' => $this->beranda->pengumuman()
        );
        $this->template->load('templates/beranda_template', 'pengumuman', $data);
    }

    public function single($slug)
    {
        $data = array(
            'single' => $this->beranda->single($slug),
            'daftar_pengumuman' => $this->beranda->pengumuman()
        );
        $this->template->load('templates/beranda_template', 'single', $data);
    }

}
