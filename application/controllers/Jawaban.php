<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jawaban extends CI_Controller {

    function __construct()
    {
        parent::__construct();              
        $this->load->model('Jawaban_model');

         if($this->session->userdata('role_id') != 1){
            redirect('auth');
    }
    
}

    public function index()
    {
        $data['title'] = 'Jawaban';
        $data['ambil'] = $this->Jawaban_model->ambil();
        $data['name'] = $this->session->userdata('name');
        
        // $data['soal'] = $this->soal_model->soal();
        // $data['jawaban'] = $this->soal_model->jawaban();
        // $this->session->userdata('soal')])->row_array();        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('jawaban/index', $data);
        $this->load->view('templates/footer', $data);
        
    }

    public function update()
    {
        $id = $this->input->post('id');
        $jawaban = $this->input->post('jawaban');

        $data = array(
            'jawaban' => $jawaban);

        $where = array(
            'id' => $id);

        $this->Jawaban_model->Update($where,$data,'tb_jawaban');
        $this->session->set_flashdata('message', '<script>swal("Success!", "Berhasil Ubah Data Jawaban!", "success");</script>');
        redirect ('jawaban/index');
    }

    public function edit($id)
    {

        $data['title'] = 'Jawaban';

        $data['name'] = $this->session->userdata('name');
        // $data['soal'] = $this->soal_model->Edit();
        $data['idjawab'] = $this->Jawaban_model->getJawabanById($id);

        $data['detailjawaban'] = $data['idjawab']['jawaban'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('jawaban/edit',$data);
        $this->load->view('templates/footer', $data);
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->Soal_model->Hapus($where,'tb_jawaban');
        $this->session->set_flashdata('message', '<script>swal("Success!", "Berhasil Hapus Data Jawaban!", "success");</script>');
        redirect('jawaban/index');
    }

}
