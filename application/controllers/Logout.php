<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Logout extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        // Log the user out
        $this->ion_auth->logout();

        // redirect them to the login page
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect(site_url('login'));
    }

}
