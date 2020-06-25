<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soaluser extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');

        if ($this->session->userdata('role_id') == null) {
            show_404();
        }
    }

    public function index()
    {
        $data = array(
            'title' => "LKPD | FKIP",
            'nis' => $this->session->userdata('nis'),
            'name' => $this->session->userdata('nama'),
            'soal' => $this->User_model->soal(),
            'jawaban' => $this->User_model->jawaban(),
            'tampil' => $this->User_model->tampilSoal(),
        );

        $infologin = [
            'status' => '2',
        ];
        $this->db->where('nama', $this->session->userdata('nama'));
        $this->db->update('tb_login', $infologin);

        if($this->session->has_userdata('waktu_start') != null){
            $lewat = time() - (int)$this->session->userdata('waktu_start');
            }else{
                $this->session->set_userdata('waktu_start',time());
                $lewat = 0;
            }
            $data['lewat'] = $lewat;

        $this->load->view('soaluser/index', $data); //untuk mengirim data
    }
}
