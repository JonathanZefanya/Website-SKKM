<?php defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class User extends Mahasiswa_Controller
{

    public function __construct()
    {
      parent::__construct();
      $this->load->model('mahasiswa/User_model', 'user');
      $this->load->model('mahasiswa/Skkm_model', 'skkm');
      $this->load->library('form_validation');
    }

    public function index()
    {
      $current_user = $this->ion_auth->user()->row();
      $data = array(
              'current_user' => $current_user,
              'gravatar_url' => $this->gravatar->get($current_user->email),
              'profil' => $this->user->get_profil($current_user->id),
              'sum_valid' => $this->skkm->sum_valid($current_user->id),
              'sum_tidak_valid' => $this->skkm->sum_tidak_valid($current_user->id),
              'sum_belum_divalidasi' => $this->skkm->sum_belum_divalidasi($current_user->id),
              'status_skkm' => $this->skkm->status_skkm($current_user->id));
      $this->template->load('templates/mahasiswa/user_template', 'mahasiswa/user/index', $data);
    }

    public function get_prodi()
    {
      $id_jurusan = $this->input->post('row'); // bukan 'id_jurusan' tetapi 'row'. Lihat fungsi getProdi di javascript.
      $prodi = $this->user->get_prodi($id_jurusan);
      echo '<select name="">';
      echo '<option value="">Pilih Prodi</option>';
      foreach ($prodi as $row) {
          echo '<option value="' . $row->id . '">' . $row->nama_prodi . '</option>';
      }
      echo '</select>';
    }

    public function profil()
    {
      $current_user = $this->ion_auth->user()->row();
      $data = array(
              'current_user' => $current_user,
              'dd_jurusan' => $this->user->get_jurusan(),
              'dd_prodi' => $this->user->get_prodi($current_user->id_jurusan),
              'dd_kelas' => $this->user->get_kelas(),
              'dd_semester' => $this->user->get_semester(),
              'gravatar_url' => $this->gravatar->get($current_user->email));
      $this->template->load('templates/mahasiswa/user_template', 'mahasiswa/user/profil', $data);
    }

    public function update_profil()
    {
      $this->profil_rules();
      if ($this->form_validation->run() == FALSE) {
        $this->profil();
      } else {
        $user_id = $this->input->post('user_id');
        $new_data = array(
                    'nama_lengkap' => $this->input->post('nama_lengkap'),
                    'nim' => $this->input->post('nim'),
                    'email' => $this->input->post('email'),
                    'id_jurusan' => $this->input->post('id_jurusan'),
                    'id_prodi' => $this->input->post('id_prodi'),
                    'id_kelas' => $this->input->post('id_kelas'),
                    'id_semester' => $this->input->post('id_semester'));
        $this->ion_auth->update($user_id, $new_data);

        $this->session->set_flashdata('message', "<div style='color:#00a65a;'>" . $this->ion_auth->messages() . "</div>");
        redirect(site_url('mahasiswa/user'));
      }
    }

    public function password()
    {
      $current_user = $this->ion_auth->user()->row();
      $data = array(
              'current_user' => $current_user,
              'gravatar_url' => $this->gravatar->get($current_user->email));
      $this->template->load('templates/mahasiswa/user_template', 'mahasiswa/user/password', $data);
    }

    public function update_password()
    {
      $this->password_rules();
      if ($this->form_validation->run() == FALSE) {
        $this->password();
      } else {
        $id_user = $this->input->post('user_id');
        $data = array('password' => $this->input->post('password_baru'));

        $this->ion_auth->update($id_user, $data);

        $this->ion_auth->logout();
        $this->session->set_flashdata('message', "<div style='color:#00a65a;'>Password berhasil diubah.</div>");
        redirect(site_url('login'));
      }
    }

    public function profil_rules()
    {
      $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
      $this->form_validation->set_rules('nim', 'Nim', 'trim|required|min_length[10]|max_length[10]|numeric');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required');
      $this->form_validation->set_rules('id_prodi', 'Prodi', 'trim|required');
      $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required');
      $this->form_validation->set_rules('id_semester', 'Semester', 'trim|required');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function password_rules()
    {
      $this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required|min_length[8]|max_length[20]');
      $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'trim|required|matches[password_baru]|min_length[8]|max_length[20]');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
