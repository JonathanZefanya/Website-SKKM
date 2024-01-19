<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Skkm extends Mahasiswa_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mahasiswa/Skkm_model', 'skkm');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array(
            'current_user' => $current_user,
            'gravatar_url' => $this->gravatar->get($current_user->email),
            'list_skkm' => $this->skkm->get_all($current_user->id),
            'sum_valid' => $this->skkm->sum_valid($current_user->id),
            'sum_belum_divalidasi' => $this->skkm->sum_belum_divalidasi($current_user->id),
            'sum_tidak_valid' => $this->skkm->sum_tidak_valid($current_user->id),
            'status_skkm' => $this->skkm->status_skkm($current_user->id)
        );
        $this->template->load('templates/mahasiswa/skkm_template', 'mahasiswa/skkm/index', $data);
    }

    public function list_skkm_valid()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array(
            'current_user' => $current_user,
            'gravatar_url' => $this->gravatar->get($current_user->email),
            'list_skkm_valid' => $this->skkm->get_skkm_valid($current_user->id),
            'sum_valid' => $this->skkm->sum_valid($current_user->id),
            'sum_belum_divalidasi' => $this->skkm->sum_belum_divalidasi($current_user->id),
            'sum_tidak_valid' => $this->skkm->sum_tidak_valid($current_user->id),
            'status_skkm' => $this->skkm->status_skkm($current_user->id)
        );
        $this->template->load('templates/mahasiswa/skkm_template', 'mahasiswa/skkm/list_valid', $data);
    }

    public function list_skkm_tidak_valid()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array(
            'current_user' => $current_user,
            'gravatar_url' => $this->gravatar->get($current_user->email),
            'list_skkm_tidak_valid' => $this->skkm->get_skkm_tidak_valid($current_user->id),
            'sum_valid' => $this->skkm->sum_valid($current_user->id),
            'sum_belum_divalidasi' => $this->skkm->sum_belum_divalidasi($current_user->id),
            'sum_tidak_valid' => $this->skkm->sum_tidak_valid($current_user->id),
            'status_skkm' => $this->skkm->status_skkm($current_user->id)
        );
        $this->template->load('templates/mahasiswa/skkm_template', 'mahasiswa/skkm/list_tidak_valid', $data);
    }

    public function list_skkm_belum_valid()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array(
            'current_user' => $current_user,
            'gravatar_url' => $this->gravatar->get($current_user->email),
            'list_skkm_belum_valid' => $this->skkm->get_skkm_belum_valid($current_user->id),
            'sum_valid' => $this->skkm->sum_valid($current_user->id),
            'sum_belum_divalidasi' => $this->skkm->sum_belum_divalidasi($current_user->id),
            'sum_tidak_valid' => $this->skkm->sum_tidak_valid($current_user->id),
            'status_skkm' => $this->skkm->status_skkm($current_user->id)
        );
        $this->template->load('templates/mahasiswa/skkm_template', 'mahasiswa/skkm/list_belum_valid', $data);
    }

    public function get_tingkat()
    {
        $id_jenis = $this->input->post('value');
        $tingkat = $this->skkm->get_tingkat($id_jenis);

        echo '<select name="">';
        echo '<option value="">Pilih Tingkat</option>';
        foreach ($tingkat as $row) {
            echo '<option value="' . $row->id_tingkat . '">' . $row->tingkat . '</option>';
        }
        echo '</select>';
    }

    public function get_prestasi()
    {
        $id_tingkat = $this->input->post('value');
        $prestasi = $this->skkm->get_prestasi($id_tingkat);

        echo '<select name="">';
        echo '<option value="">Pilih Prestasi</option>';
        foreach ($prestasi as $row) {
            echo '<option value="' . $row->id_prestasi . '">' . $row->prestasi . '</option>';
        }
        echo '</select>';
    }

    public function get_nilai()
    {
        $id_prestasi = $this->input->post('value');
        $nilai = $this->skkm->get_nilai($id_prestasi);

        $data = array();
        foreach ($nilai as $row) {
            $data['value'] = $row->bobot;
        }
        echo $data['value'];
    }

    public function create()
    {
      $current_user = $this->ion_auth->user()->row();
      $data = array(
              'current_user' => $current_user,
              'gravatar_url' => $this->gravatar->get($current_user->email),
              'dd_jenis' => $this->skkm->get_jenis(),
              'jenis_selected' => $this->input->post('id_jenis') ? $this->input->post('id_jenis') : '',
              'tingkat_selected' => $this->input->post('id_tingkat') ? $this->input->post('id_tingkat') : '',
              'prestasi_selected' => $this->input->post('id_prestasi') ? $this->input->post('id_prestasi') : '');
      $this->template->load('templates/mahasiswa/skkm_template', 'mahasiswa/skkm/add', $data);
    }

    public function store()
    {
      $this->rules();
      if ($this->form_validation->run() == FALSE) {
        $this->create();
      } else {
        $config = array(
            'upload_path' => './fileskkm/',
            'allowed_types' => 'jpeg|jpg|png',
            'max_size' => '5120',
            'max_width' => '5000',
            'max_height' => '5000'
        );
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('filefoto')) {
            $this->session->set_flashdata('message', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
            redirect(site_url('mahasiswa/skkm/create'));
        } else {
            $file = $this->upload->data();
            $data = array(
                'id_user' => $this->input->post('id_user'),
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'filefoto' => $file['file_name'],
                'id_jenis' => $this->input->post('id_jenis'),
                'id_tingkat' => $this->input->post('id_tingkat'),
                'id_prestasi' => $this->input->post('id_prestasi'),
                'nilai' => '0',
                'status' => $this->input->post('status') ? $this->input->post('status') : 0,
                'keterangan' => $this->input->post('keterangan') ? $this->input->post('keterangan') : '-'
            );

            $data["nilai"] = $this->skkm->get_bobot($data["id_prestasi"], $data["id_tingkat"])[0]->bobot;

            $this->skkm->insert($data);
        }
        $this->session->set_flashdata('message', "<div style='color:#00a65a;'>SKKM berhasil ditambah.</div>");
        redirect(site_url('mahasiswa/skkm'));
      }
    }

    public function edit($id)
    {
      $current_user = $this->ion_auth->user()->row();
      $row = $this->skkm->get_by_id($id);
      $data = array(
              'current_user' => $current_user,
              'gravatar_url' => $this->gravatar->get($current_user->email),
              'id' => $row->id,
              'id_user' => $row->id_user,
              'nama_kegiatan' => $row->nama_kegiatan,
              'filefoto' => $row->filefoto,
              'id_jenis' => $row->id_jenis,
              'dd_jenis' => $this->skkm->get_jenis(),
              'id_tingkat' => $row->id_tingkat,
              'dd_tingkat' => $this->skkm->get_tingkat($row->id_jenis),
              'id_prestasi' => $row->id_prestasi,
              'dd_prestasi' => $this->skkm->get_prestasi($row->id_tingkat),
              'nilai' => $row->nilai);
      $this->template->load('templates/mahasiswa/skkm_template', 'mahasiswa/skkm/edit', $data);
    }

    public function ubah($id)
    {
      $this->rules();
      if ($this->form_validation->run() == FALSE) {
        $current_user = $this->ion_auth->user()->row();
      $row = $this->skkm->get_by_id($id);
      $data = array(
              'current_user' => $current_user,
              'gravatar_url' => $this->gravatar->get($current_user->email),
              'id' => $row->id,
              'id_user' => $row->id_user,
              'nama_kegiatan' => $row->nama_kegiatan,
              'filefoto' => $row->filefoto,
              'id_jenis' => $row->id_jenis,
              'dd_jenis' => $this->skkm->get_jenis(),
              'id_tingkat' => $row->id_tingkat,
              'dd_tingkat' => $this->skkm->get_tingkat($row->id_jenis),
              'id_prestasi' => $row->id_prestasi,
              'dd_prestasi' => $this->skkm->get_prestasi($row->id_tingkat),
              'nilai' => $row->nilai);
      $this->template->load('templates/mahasiswa/skkm_template', 'mahasiswa/skkm/ubah', $data);
      } else {
        $row = $this->skkm->get_by_id($id);
        // Do this if there is an image upload
        if ($_FILES AND $_FILES['filefoto']['name']) {
            // Start uploading file
            $config = array(
                      'upload_path' => './fileskkm/',
                      'allowed_types' => 'jpeg|jpg|png',
                      'max_size' => '5120',
                      'max_width' => '5000',
                      'max_height' => '5000');
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('filefoto')) {
                $this->session->set_flashdata('message', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
                redirect(site_url('mahasiswa/skkm/ubah/' . $row->id));
            } else {

                // Remove filefoto using unlink() function
                unlink('fileskkm/'.$row->filefoto);

                // Upload file here
                $file = $this->upload->data();
                $id = $this->input->post('id');
                $data = array(
                        'id_user' => $this->input->post('id_user'),
                        'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                        'filefoto' => $file['file_name'],
                        'id_jenis' => $this->input->post('id_jenis'),
                        'id_tingkat' => $this->input->post('id_tingkat'),
                        'id_prestasi' => $this->input->post('id_prestasi'),
                        'nilai' => '0',
                        'status' => $this->input->post('status') ? $this->input->post('status') : 0,
                        'keterangan' => $this->input->post('keterangan') ? $this->input->post('keterangan') : '-');

                $data["nilai"] = $this->skkm->get_bobot($data["id_prestasi"], $data["id_tingkat"])[0]->bobot;

                $this->skkm->update($id, $data);
            }
        }
        // Do this if there is no image upload
        else {
            // No file uploaded
            $id = $this->input->post('id');
            $data = array(
                    'id_user' => $this->input->post('id_user'),
                    'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                    'id_jenis' => $this->input->post('id_jenis'),
                    'id_tingkat' => $this->input->post('id_tingkat'),
                    'id_prestasi' => $this->input->post('id_prestasi'),
                    'nilai' => '0',
                    'status' => $this->input->post('status') ? $this->input->post('status') : 0,
                    'keterangan' => $this->input->post('keterangan') ? $this->input->post('keterangan') : '-');
                    
            $data["nilai"] = $this->skkm->get_bobot($data["id_prestasi"], $data["id_tingkat"])[0]->bobot;

            $this->skkm->update($id, $data);
        }
        $this->session->set_flashdata('message', "<div style='color:#00a65a;'>SKKM berhasil diedit.</div>");
        redirect(site_url('mahasiswa/daftar-skkm-belum-valid'));
      }
    }

    public function update($id)
    {
      $this->rules();
      if ($this->form_validation->run() == FALSE) {
        $this->edit($id);
      } else {
        $row = $this->skkm->get_by_id($id);
        // Do this if there is an image upload
        if ($_FILES AND $_FILES['filefoto']['name']) {
            // Start uploading file
            $config = array(
                      'upload_path' => './fileskkm/',
                      'allowed_types' => 'jpeg|jpg|png',
                      'max_size' => '5120',
                      'max_width' => '5000',
                      'max_height' => '5000');
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('filefoto')) {
                $this->session->set_flashdata('message', "<div style='color:#ff0000;'>" . $this->upload->display_errors() . "</div>");
                redirect(site_url('mahasiswa/skkm/edit/' . $row->id));
            } else {

                // Remove filefoto using unlink() function
                unlink('fileskkm/'.$row->filefoto);

                // Upload file here
                $file = $this->upload->data();
                $id = $this->input->post('id');
                $data = array(
                        'id_user' => $this->input->post('id_user'),
                        'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                        'filefoto' => $file['file_name'],
                        'id_jenis' => $this->input->post('id_jenis'),
                        'id_tingkat' => $this->input->post('id_tingkat'),
                        'id_prestasi' => $this->input->post('id_prestasi'),
                        'nilai' => '0',
                        'status' => $this->input->post('status') ? $this->input->post('status') : 0,
                        'keterangan' => $this->input->post('keterangan') ? $this->input->post('keterangan') : '-');

                $data["nilai"] = $this->skkm->get_bobot($data["id_prestasi"], $data["id_tingkat"])[0]->bobot;

                $this->skkm->update($id, $data);
            }
        }
        // Do this if there is no image upload
        else {
            // No file uploaded
            $id = $this->input->post('id');
            $data = array(
                    'id_user' => $this->input->post('id_user'),
                    'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                    'id_jenis' => $this->input->post('id_jenis'),
                    'id_tingkat' => $this->input->post('id_tingkat'),
                    'id_prestasi' => $this->input->post('id_prestasi'),
                    'nilai' => '0',
                    'status' => $this->input->post('status') ? $this->input->post('status') : 0,
                    'keterangan' => $this->input->post('keterangan') ? $this->input->post('keterangan') : '-');
                    
            $data["nilai"] = $this->skkm->get_bobot($data["id_prestasi"], $data["id_tingkat"])[0]->bobot;

            $this->skkm->update($id, $data);
        }
        $this->session->set_flashdata('message', "<div style='color:#00a65a;'>SKKM berhasil diedit.</div>");
        redirect(site_url('mahasiswa/skkm'));
      }
    }

    public function delete($id)
    {
      $row = $this->skkm->get_by_id($id);

      if ($row) {

          // Remove filefoto
          unlink('fileskkm/'.$row->filefoto);

          $this->skkm->delete($id);
          $this->session->set_flashdata('message', "<div style='color:#00a65a;'>SKKM berhasil dihapus.</div>");
          redirect(site_url('mahasiswa/skkm'));
      } else {
          $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
          redirect(site_url('mahasiswa/skkm'));
      }
    }

    public function hapus($id)
    {
      $row = $this->skkm->get_by_id($id);

      if ($row) {

          // Remove filefoto
          unlink('fileskkm/'.$row->filefoto);

          $this->skkm->delete($id);
          $this->session->set_flashdata('message', "<div style='color:#00a65a;'>SKKM berhasil dihapus.</div>");
          redirect(site_url('mahasiswa/daftar-skkm-belum-valid'));
      } else {
          $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
          redirect(site_url('mahasiswa/daftar-skkm-belum-valid'));
      }
    }

    public function hapus_tidak_valid($id)
    {
      $row = $this->skkm->get_by_id($id);

      if ($row) {

          // Remove filefoto
          unlink('fileskkm/'.$row->filefoto);

          $this->skkm->delete($id);
          $this->session->set_flashdata('message', "<div style='color:#00a65a;'>SKKM berhasil dihapus.</div>");
          redirect(site_url('mahasiswa/daftar-skkm-tidak-valid'));
      } else {
          $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
          redirect(site_url('mahasiswa/daftar-skkm-tidak-valid'));
      }
    }

    public function cetak_laporan()
    {
      $current_user = $this->ion_auth->user()->row();
      $result = array(
          'profil' => $this->skkm->get_profil($current_user->id),
          'skkm' => $this->skkm->get_all($current_user->id),
          'sum_valid' => $this->skkm->sum_valid($current_user->id),
          'sum_belum_divalidasi' => $this->skkm->sum_belum_divalidasi($current_user->id),
          'sum_tidak_valid' => $this->skkm->sum_tidak_valid($current_user->id)
      );
      $this->load->view('mahasiswa/skkm/laporan', $result);
    }

    public function rules()
    {
      $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required');
      $this->form_validation->set_rules('id_jenis', 'Jenis', 'trim|required');
      $this->form_validation->set_rules('id_tingkat', 'Tingkat', 'trim|required');
      $this->form_validation->set_rules('id_prestasi', 'Prestasi', 'trim|required');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
