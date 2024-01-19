<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Kontak extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->template->load('templates/beranda_template', 'kontak');
    }

    public function kirim_pesan()
    {
        $from = $this->input->post('email');

		if (!isset($from)) {
			redirect("kontak");
			return;
		}

        $to = "jonathan.natannael@student.iti.ac.id";
        $name = $this->input->post('nama');
        $subject = $this->input->post('perihal');
        $message = $this->input->post('pesan');

        // Load email library
        $this->load->library('email');

        $this->email->from($from, $name);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        // Kirim email
        // if ($this->email->send()) {
        //     $this->session->set_flashdata('email_sent', 'Pesan berhasil dikirim.');
        // } else {
        //     $this->session->set_flashdata('email_sent', 'Gagal kirim pesan.');
        // }
        // $this->template->load('templates/beranda_template', 'kontak');

		// FIXME: Buat keamanan, kirim ema	il akan selalu gagal (sengaja)
		$this->session->set_flashdata('email_sent', '<span style="color:red;">Gagal kirim pesan.</span>');
        $this->template->load('templates/beranda_template', 'kontak');
    }

}