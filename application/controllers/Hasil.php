<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Hasil extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Hasil_model');
        $this->load->model('Soal_model'); //nampilin soal
        $this->load->model('Jawaban_model'); //nampilin jawaban


        if ($this->session->userdata('role_id') != 1) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Hasil';
        $data['ambil'] = $this->Hasil_model->ambil();
        $data['name'] = $this->session->userdata('name');

        // $data['soal'] = $this->soal_model->soal();
        // $data['jawaban'] = $this->soal_model->jawaban();
        // $this->session->userdata('soal')])->row_array();        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('hasil/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Hasil';
        $data['detail'] = $this->Hasil_model->detailId($id);
        $data['name'] = $this->session->userdata('name');
        $data['detail_nis'] = $data['detail']['nis'];
        $data['detail_nama'] = $data['detail']['nama'];
        $data['detail_nilai'] = $data['detail']['nilai'];
        $data['detail_waktu'] = $data['detail']['date'];
        if ($data['detail_nilai'] <= 60) {
            $data['keterangan'] = "Remedial";
        } else {
            $data['keterangan'] = "Lulus";
        }
        // $data['detail_jawaban'] = $this->Hasil_model->Ambil();
        $data['detail_jawab'] = $this->db->get_where('tb_hasil',['id' => $id])->row_array();
        $data['detail_soal'] = $this->Soal_model->Ambil();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('hasil/detail', $data);
        $this->load->view('templates/footer', $data);
    }
}
