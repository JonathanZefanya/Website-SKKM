<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Users extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Users_model', 'users');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $current_user = $this->ion_auth->user()->row();
        $data = array(
            'current_user' => $current_user,
            'users' => $this->users->get_users(),
            'gravatar_url' => $this->gravatar->get($current_user->email));
        $this->template->load('templates/admin/users_template', 'admin/users/index', $data);
    }

    public function get_prodi()
    {
        // bukan 'id_jurusan' tetapi 'row'. Lihat fungsi getProdi di javascript.
        $id_jurusan = $this->input->post('row');
        $prodi = $this->users->get_prodi($id_jurusan);

        echo '<select name="">';
        echo '<option value="">Pilih Prodi</option>';
        foreach ($prodi as $row) {
            echo '<option value="' . $row->id . '">' . $row->nama_prodi . '</option>';
        }
        echo '</select>';
    }

    public function create()
    {
      $current_user = $this->ion_auth->user()->row();
      $data = array(
          'groups' => $this->ion_auth->groups()->result(),
          'dd_jurusan' => $this->users->get_jurusan(),
          'dd_semester' => $this->users->get_semester(),
          'semester_selected' => $this->input->post('id_semester'),
          'dd_kelas' => $this->users->get_kelas(),
          'kelas_selected' => $this->input->post('id_kelas'),
          'current_user' => $current_user,
          'gravatar_url' => $this->gravatar->get($current_user->email));
      $this->template->load('templates/admin/users_template', 'admin/users/add', $data);
    }

    public function store()
    {
      $this->rules_create();
      if ($this->form_validation->run() == FALSE) {
        $this->create();
      } else {
        $email = $this->input->post('email');
        $group_id = $this->input->post('groups');

        $additional_data = array(
          'nama_lengkap' => $this->input->post('nama_lengkap'),
          'nim' => $this->input->post('nim'),
          'nip' => $this->input->post('nip'),
          'id_jurusan' => $this->input->post('id_jurusan'),
          'id_prodi' => $this->input->post('id_prodi'),
          'id_kelas' => $this->input->post('id_kelas'),
          'id_semester' => $this->input->post('id_semester'));

        // urutan parameter untuk register : username, password, email, data tambahan, id group
        // parameter $password diganti dengan 'password'. Jadi, password sudah tersetting otomatis dengan kata 'password'.
        $this->ion_auth->register('', 'password', $email, $additional_data, $group_id);
        $this->session->set_flashdata('message', "<div style='color:#00a65a;'>" . $this->ion_auth->messages() . "</div>");
        redirect(site_url('admin/users'));
      }
    }

    // Manual user activation
    public function activate($id)
    {
      if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
        return show_error("Kamu harus menjadi admin untuk melakukan aksi ini.");
      } elseif ($this->ion_auth->is_admin()) {
        $activation = $this->ion_auth->activate($id);
      }

      if ($activation) {
        $this->session->set_flashdata('message', "<div style='color:#00a65a'>" . $this->ion_auth->messages() . "</div>");
  			redirect(site_url('admin/users'));
      }
    }

    // Manual user deactivation
    public function deactivate($id)
    {
      if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
  		{
  			// redirect them to the home page because they must be an administrator to view this
  			return show_error('You must be an administrator to view this page.');
  		}

      $id = (int) $id;

      if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
        $deactivation = $this->ion_auth->deactivate($id);
      }

      if ($deactivation) {
        $this->session->set_flashdata('message', "<div style='color:#00a65a'>" . $this->ion_auth->messages() . "</div>");
  			redirect(site_url('admin/users'));
      }
    }

    public function edit($user_id)
    {
      $current_user = $this->ion_auth->user()->row();
      $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : $user_id;

      if ($user = $this->ion_auth->user((int)$user_id)->row()) {
          $data = array(
              'user' => $user,
              'groups' => $this->ion_auth->groups()->result(),
              'usergroups' => array(),
              'dd_jurusan' => $this->users->get_jurusan(),
              'dd_prodi' => $this->users->get_prodi($user->id_jurusan),
              'dd_kelas' => $this->users->get_kelas(),
              'dd_semester' => $this->users->get_semester(),
              'current_user' => $current_user,
              'gravatar_url' => $this->gravatar->get($current_user->email));
      } else {
        $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
        redirect(site_url('admin/users'));
      }
      $data['groups'] = $this->ion_auth->groups()->result();
      $data['usergroups'] = array();
      if ($usergroups = $this->ion_auth->get_users_groups($user->id)->result()) {
        foreach ($usergroups as $group) {
            $data['usergroups'][] = $group->id;
        }
      }
      $this->template->load('templates/admin/users_template', 'admin/users/edit', $data);
    }

    public function update($user_id)
    {
      $this->rules_edit();
      if ($this->form_validation->run() == FALSE) {
        $this->edit($user_id);
      } else {
        $user_id = $this->input->post('user_id');
        $new_data = array(
            'email' => $this->input->post('email'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'nim' => $this->input->post('nim'),
            'nip' => $this->input->post('nip'),
            'id_jurusan' => $this->input->post('id_jurusan'),
            'id_prodi' => $this->input->post('id_prodi'),
            'id_kelas' => $this->input->post('id_kelas'),
            'id_semester' => $this->input->post('id_semester')
        );
        $this->ion_auth->update($user_id, $new_data);

        // Update groups
        $groups = $this->input->post('groups');
        if (isset($groups) && !empty($groups)) {
            $this->ion_auth->remove_from_group('', $user_id);
            foreach ($groups as $group) {
                $this->ion_auth->add_to_group($group, $user_id);
            }
        }

        $this->session->set_flashdata('message', "<div style='color:#00a65a;'>" . $this->ion_auth->messages() . "</div>");
        redirect(site_url('admin/users'));
      }
    }

    public function delete($user_id)
    {
      if (is_null($user_id)) {
          $this->session->set_flashdata('message', "<div style='color:#dd4b39;'>Data tidak ditemukan.</div>");
      } else {
          $this->ion_auth->delete_user($user_id);
          $this->session->set_flashdata('message', "<div style='color:#00a65a;'>" . $this->ion_auth->messages() . "</div>");
      }
      redirect(site_url('admin/users'));
    }

    public function rules_create()
    {
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
      $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
      $this->form_validation->set_rules('groups[]', 'Hak Akses', 'required|integer');
      $this->form_validation->set_rules('nim', 'Nim', 'trim|is_unique[users.nim]|numeric|min_length[10]|max_length[10]');
      $this->form_validation->set_rules('nip', 'Nip', 'trim|is_unique[users.nip]|numeric|min_length[18]|max_length[18]');
      $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim');
      $this->form_validation->set_rules('id_prodi', 'Prodi', 'trim');
      $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim');
      $this->form_validation->set_rules('id_semester', 'Semester', 'trim');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function rules_edit()
    {
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
      $this->form_validation->set_rules('groups[]', 'Hak Akses', 'required|integer');
      $this->form_validation->set_rules('nim', 'Nim', 'trim|numeric|min_length[10]');
      $this->form_validation->set_rules('nip', 'Nip', 'trim|numeric|min_length[18]');
      $this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim');
      $this->form_validation->set_rules('id_prodi', 'Prodi', 'trim');
      $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim');
      $this->form_validation->set_rules('id_semester', 'Semester', 'trim');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
