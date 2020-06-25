<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('nis', 'nis', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->session->userdata('role_id') == 1){
            redirect('admin');
        }

        if ($this->session->userdata('role_id') == 2) {
            redirect('user');
        }

        if($this->form_validation->run() == false) {
        $db = mysqli_connect("localhost",'root','');
        mysqli_select_db($db, "db_lkpd");
        $lama = 1;

        $hapustgl = "DELETE FROM tb_login WHERE DATEDIFF(CURDATE(),tanggal) > $lama";
        $hasil = mysqli_query($db, $hapustgl);

        $data = array(
            'title' => "Login &mdash; LKPD"
        );
        $this->load->view('dist/auth-login', $data);

        }else{
            $this->_login();
        }
    }

    private function _login() 
    {
        $nis = $this->input->post('nis');
        $password = $this->input->post('password');

        $tb_user = $this->db->get_where('tb_siswa', ['nis' => $nis])->row_array();
        $tb_admin = $this->db->get_where('tb_user', ['email' => $nis])->row_array();
    
       
        if($tb_user) {
            $login = $this->db->get_where('tb_login',['nama' => $nis]);
            if($login->num_rows() >0 ){
                $this->session->set_flashdata('messagelogin', '<div class="alert alert-danger" role="alert">Akun anda sedang login di perangkat lain</div>');
                redirect('auth');
            }
                if(password_verify($password, $tb_user['password'])) {
                    $data = [
                        'nis' => $tb_user['nis'],
                        'mapel' => $tb_user['mapel'],
                        'role_id' => '2',
                        'nama' => $tb_user['nama'], //set session nama
                    ];
                    $this->session->set_userdata($data);
                    $info = array(
                        'nama' => $tb_user['nama'],
                        'nis' => $tb_user['nis'],
                        'status' => '1',
                        'tanggal' => date("Y-m-d"), 
                    );

                    $this->db->insert('tb_login',$info);
                    if($tb_user['role_id'] == 1) {
                        redirect('admin');
                    } else{
                        redirect('user');
                    }

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata Sandi Salah!</div>');
                    redirect('auth');
                }
        } elseif ($tb_admin) {
            $login = $this->db->get_where('tb_login',['nama' => $nis]);
            if($login->num_rows() >0 ){
                $this->session->set_flashdata('messagelogin', '<div class="alert alert-danger" role="alert">Akun anda sedang login di perangkat lain</div>');
                redirect('auth');
            }
            if(password_verify($password, $tb_admin['password'])) {
                    $data = [
                        'email' => $tb_admin['email'],
                        'nis' => $tb_admin['nis'],
                        'role_id' => $tb_admin['role_id'],
                        'name' => $tb_admin['name'], //set session nama
                    ];
                    $this->session->set_userdata($data);
                    $info = array(
                        'nama' => $tb_admin['name'],
                        'nis' => $tb_admin['nis'],
                        'status' => '1',
                        'tanggal' => date("Y-m-d"), 
                    );

                    $this->db->insert('tb_login',$info);
                    redirect('admin');
                    

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIS belum terdaftar!</div>');
            redirect('auth');
            
        }
    }

    
    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim',[
            'required' => 'Harap isikan nama anda!',
            'trim' => 'Harap isikan nama anda!'
        ]);
        $this->form_validation->set_rules('nis', 'Nis', 'required|trim|numeric|is_unique[tb_user.nis]',[
            'required' => 'Harap isikan NIS anda!',
            'trim' => 'Harap isikan NIS anda!',
            'numeric' => 'Harap diisi hanya dengan angka',
            'is_unique' => 'NIS sudah terdaftar',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'Email sudah diregistrasi',
            'valid_email' => 'Email tidak valid'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Kata sandi salah!',
            'min_length' => 'Kata sandi tidak aman'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[5]|matches[password1]');

        if ($this->form_validation->run() == false) {
        $data['title'] = 'Registration Page';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/registration');
        $this->load->view('templates/auth_footer');

    } else {
        $data = [
            
            'name' => htmlspecialchars($this->input->post('name')),
            'nis' => htmlspecialchars($this->input->post('nis')),
            'email' => htmlspecialchars($this->input->post('email')),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'date_created' => time(),
            'image' => 'default.jpg',
        ];

        $this->db->insert('tb_user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');
        redirect('auth');
    }
}
    public function logout() 
    {
        $this->db->delete('tb_login',['nis' => $this->session->userdata('nis')]);

        $this->session->unset_userdata('nis');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('waktu_start');
        $this->session->unset_userdata('selesai');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }
  
}