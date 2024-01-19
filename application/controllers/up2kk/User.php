<?php defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class User extends UP2KK_Controller
{

    public function __construct()
    {
      parent::__construct();
      $this->load->model('up2kk/User_model', 'user');
      $this->load->library('form_validation');
    }

    public function index()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array(
                'current_user' => $current_user,
                'gravatar_url' => $this->gravatar->get($current_user->email),
                'profil' => $this->user->get_profil($current_user->id));
        $this->template->load('templates/up2kk/user_template', 'up2kk/user/index', $data);
    }

    public function profil()
    {
      $current_user = $this->ion_auth->user()->row();
      $data = array(
              'dd_jurusan' => $this->user->get_jurusan(),
              'current_user' => $current_user,
              'gravatar_url' => $this->gravatar->get($current_user->email));
      $this->template->load('templates/up2kk/user_template', 'up2kk/user/profil', $data);
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
                    'nip' => $this->input->post('nip'),
                    'email' => $this->input->post('email'),
                    'id_jurusan' => $this->input->post('id_jurusan'));
        $this->ion_auth->update($user_id, $new_data);

        $this->session->set_flashdata('message', "<div style='color:#00a65a;'>" . $this->ion_auth->messages() . "</div>");
        redirect('up2kk/user', 'refresh');
      }
    }

    public function password()
    {
      $current_user = $this->ion_auth->user()->row();
      $data = array(
              'current_user' => $current_user,
              'gravatar_url' => $this->gravatar->get($current_user->email));
      $this->template->load('templates/up2kk/user_template', 'up2kk/user/password', $data);
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
        redirect('login', 'refresh');
      }
    }

    public function profil_rules()
    {
      $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('nip', 'Nip', 'trim|required|min_length[18]|max_length[18]|numeric');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function password_rules()
    {
      $this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required|min_length[8]|max_length[20]');
      $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'trim|required|matches[password_baru]|min_length[8]|max_length[20]');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
