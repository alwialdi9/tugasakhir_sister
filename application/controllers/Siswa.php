<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();

        $this->load->model('Siswa_model');
        if ($this->session->userdata('role_id') == null || $this->session->userdata('role_id') == 2){
            redirect('user');
        }

    }

    public function index()
    {
    	$data['title'] = 'Siswa';
        $data['siswa'] = $this->db->get_where('tb_siswa', ['nis' => $this->session->userdata('nis')])->row_array();
        $data['datasiswa'] = $this->Siswa_model->getSiswa();

        $data['name'] = $data['siswa']['nama'];
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getSiswaById()
    {
        $id = $this->input->post('id');
         
        $data = $this->Siswa_model->getSiswaById($id);
          
        $arr = array('success' => false, 'data' => '');
        if($data){
        $arr = array('success' => true, 'data' => $data);
        }
        echo json_encode($arr);
    }

    public function delete()
    {
        $this->Siswa_model->delete();
        echo json_encode(array("status" => TRUE));
    }

    public function store()
    {
        $data = array(
            'nama' => htmlspecialchars($this->input->post('nama')),
            'nis' => htmlspecialchars($this->input->post('nis')),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'mapel' => htmlspecialchars($this->input->post('mapel')),
            'status' => 'offline',
            );
         // var_dump($data);
        $status = false;
 
        $id = $this->input->post('id');
 
        if($id){
           $update = $this->Siswa_model->update($data);
           $status = true;
        }else{
           $id = $this->Siswa_model->addSiswa($data);
           $status = true;
        }
 
        $data = $this->Siswa_model->getSiswaById($id);
 
        echo json_encode(array("status" => $status , 'data' => $data));
    }
}