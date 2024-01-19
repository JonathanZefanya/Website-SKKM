<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Register extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Register_model', 'register');
  }

  public function get_prodi()
  {
    // bukan 'id_jurusan' tetapi 'row'. Lihat fungsi getProdi di javascript.
    $id_jurusan = $this->input->post('row');
    $prodi = $this->register->get_prodi($id_jurusan);

    echo '<select name="">';
    echo '<option value="">Pilih Prodi</option>';
    foreach ($prodi as $row) {
        echo '<option value="' . $row->id . '">' . $row->nama_prodi . '</option>';
    }
    echo '</select>';
  }

  public function index()
  {
    $data = array(
            'dd_jurusan' => $this->register->get_jurusan(),
            'dd_semester' => $this->register->get_semester(),
            'semester_selected' => $this->input->post('id_semester'),
            'dd_kelas' =>  $this->register->get_kelas(),
            'kelas_selected' => $this->input->post('id_kelas'));
    $this->template->load('templates/register_template', 'register', $data);
  }

  public function create_mahasiswa()
  {
    $this->register_rules();
    if ($this->form_validation->run() == FALSE) {
      $this->index();
    } else {
      $email = $this->input->post('email');
      $group_id = array('3'); // Set user to mahasiswa
      $password = 'password';

      $additional_data = array(
                        'nama_lengkap' => $this->input->post('nama_lengkap'),
                        'nim' => $this->input->post('nim'),
                        'id_jurusan' => $this->input->post('id_jurusan'),
                        'id_prodi' => $this->input->post('id_prodi'),
                        'id_kelas' => $this->input->post('id_kelas'),
                        'id_semester' => $this->input->post('id_semester'));

      // urutan parameter untuk register : username, password, email, data tambahan, id group
      $this->ion_auth->register( $email,$password, $email, $additional_data, $group_id);
      $this->session->set_flashdata('message', "<div style='color:#00a65a;'>" . $this->ion_auth->messages() . "</div>");
      redirect(site_url('login'));
    }
  }

  public function activate($id, $code = false)
  {
    if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('login');
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect('forgotpassword');
		}
  }

  public function register_rules()
  {
    $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('nim', 'NIM', 'trim|required|is_unique[users.nim]|numeric|min_length[10]|max_length[10]');
    $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required');
    $this->form_validation->set_rules('id_prodi', 'Prodi', 'trim|required');
    $this->form_validation->set_rules('id_semester', 'Semester', 'trim|required');
    $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

}
