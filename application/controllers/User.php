<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        
    }

    public function index()
    {
        $data['title'] = "LKPD | FKIP";
        if ($this->session->userdata('waktu_start')) {
            redirect('soaluser');
        }
        if ($this->session->userdata('role_id') == null) {
            show_404();
        }
        $data['name'] = $this->session->userdata('nama');
        $this->load->view('templatesoal/header', $data); //untuk mengirim data
        $this->load->view('soaluser/opening', $data); //untuk mengirim data
        $this->load->view('templatesoal/footer');
    }

    public function soal(){
        $data['title'] = "LKPD | FKIP";
        $data['soal'] = $this->User_model->soal();
        $data['jawaban'] = $this->User_model->jawaban();
        $data['tampil'] = $this->User_model->tampilSoal();

        $this->load->view('templatesoal/header', $data); //untuk mengirim data
        $this->load->view('templatesoal/sidebar', $data); //untuk mengirim data
        $this->load->view('user/soal', $data); //untuk mengirim data
        $this->load->view('templatesoal/footer', $data);
    }
}
