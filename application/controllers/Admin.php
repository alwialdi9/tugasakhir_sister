<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_model');
       if ($this->session->userdata('role_id') == null || $this->session->userdata('role_id') == 2){
            redirect('user');
        }
        // } else {
        //     $this->load->view('admin/index');
        // }
    }
    
    public function index() 
    {
        $data['title'] = 'Admin';
        $data['admin'] = $this->db->get_where('tb_user', ['nis' => $this->session->userdata('nis')])->row_array();

        $data['dataadmin'] = $this->Admin_model->getAdmin();
        $data['name'] = $data['admin']['name'];
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);

    }

    public function waktu()
    {
        $data['title'] = 'Waktu';
        $data['admin'] = $this->db->get_where('tb_user', ['nis' => $this->session->userdata('nis')])->row_array();

        $data['waktu'] = $this->db->get('tb_timer')->row_array();
        $data['timer'] = $data['waktu']['waktu'];
        $data['idtimer'] = $data['waktu']['id'];

        $data['name'] = $data['admin']['name'];
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/waktu', $data);
        $this->load->view('templates/footer', $data);
    }

    public function editwaktu(){
        $this->Admin_model->ubahWaktu();
        $data['title'] = 'Waktu';
        $data['admin'] = $this->db->get_where('tb_user', ['nis' => $this->session->userdata('nis')])->row_array();

        $data['waktu'] = $this->db->get('tb_timer')->row_array();
        $data['timer'] = $data['waktu']['waktu'];
        $data['idtimer'] = $data['waktu']['id'];

        $data['name'] = $data['admin']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/waktu', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getAdminById()
    {
        $id = $this->input->post('id');
         
        $data = $this->Admin_model->getAdminById($id);
          
        $arr = array('success' => false, 'data' => '');
        if($data){
        $arr = array('success' => true, 'data' => $data);
        }
        echo json_encode($arr);
    }

    public function delete()
    {
        $this->Admin_model->delete();
        echo json_encode(array("status" => TRUE));
    }

   
    public function store()
    {
        if (strtolower($this->input->post('role')) == 'admin') {
            $role = 1;
        }else{
            $role = 2;
        }
        
        $data = array(
            'name' => htmlspecialchars($this->input->post('nama')),
            'nis' => htmlspecialchars($this->input->post('nis')),
            'email' => htmlspecialchars($this->input->post('email')),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => $role,
            'date_created' => time(),
            'image' => 'default.jpg',
            );
         
        $status = false;
 
        $id = $this->input->post('id');
 
        if($id){
           $update = $this->Admin_model->update($data);
           $status = true;
        }else{
           $id = $this->Admin_model->addAdmin($data);
           $status = true;
        }
 
        $data = $this->Admin_model->getAdminById($id);
 
        echo json_encode(array("status" => $status , 'data' => $data));
    }


}