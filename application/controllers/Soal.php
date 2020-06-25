<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Soal extends CI_Controller {

    function __construct()
    {
        parent::__construct();              
        $this->load->model('Soal_model');
        $this->load->model('Jawaban_model');
        $this->load->model('Paket_model');

         if($this->session->userdata('role_id') == 2){
            redirect('user');
    }
    
}

    public function index()
    {
        $data['title'] = 'Soal';
        $data['name'] = $this->session->userdata('name');
        $data['paket'] = $this->Paket_model->get_paket();
                
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('soal/paket_soal', $data);
        $this->load->view('templates/footer', $data);
        
    }

    public function paket_soal($paket)
    {
        $data['title'] = 'Soal';
        $data['ambil'] = $this->Soal_model->ambil($paket);
        $data['paketsoal'] = $paket;
        $datapaket = array(
            'paketsoal' => $paket,
        );
        $this->session->set_userdata($datapaket);
        $data['name'] = $this->session->userdata('name');
    
        // $data['soal'] = $this->soal_model->soal();
        // $data['jawaban'] = $this->soal_model->jawaban();
        // $this->session->userdata('soal')])->row_array();        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('soal/index', $data);
        $this->load->view('templates/footer', $data);
        
    }

    public function create()
    {
        $this->db->order_by('pertanyaan_id','desc');
        $this->db->limit(1);
        $id = $this->db->get('tb_soal');
        if ($id->num_rows() > 0)  //Ensure that there is at least one result 
        {
           foreach ($id->result() as $row)  //Iterate through results
           {
            $pertanyaan_id = ($row->id)+1;
           }
        }else{
            $pertanyaan_id = 1;
        }

        $pilihan1 = $this->input->post('pilihan1');
        $pilihan2 = $this->input->post('pilihan2');
        $pilihan3 = $this->input->post('pilihan3');
        $pilihan4 = $this->input->post('pilihan4');

        $jawaban1 = $this->input->post('jawaban1');
        $jawaban2 = $this->input->post('jawaban2');
        $jawaban3 = $this->input->post('jawaban3');
        $jawaban4 = $this->input->post('jawaban4');

        if ($jawaban1 == 'benar') {
            $hasil = $pilihan1;
        } elseif ($jawaban2 == 'benar') {
            $hasil = $pilihan2;
        } elseif ($jawaban3 == 'benar') {
            $hasil = $pilihan3;
        } else{
            $hasil = $pilihan4;
        }

        $datasoal = array(
            'soal' => htmlspecialchars($this->input->post('soal')),
            'pertanyaan_id' => htmlspecialchars($pertanyaan_id),
            'hasil' => htmlspecialchars($hasil),
            'mapel' => htmlspecialchars($this->input->post('mapel')),
            );
        $this->Soal_model->createsoal($datasoal);

        for ($i=1; $i < 5; $i++) { 
            $datajawaban = array(
                'jawaban' =>htmlspecialchars($this->input->post('pilihan'.$i)),
                'pertanyaan_id' => htmlspecialchars($pertanyaan_id),
            );
            $this->Jawaban_model->createjawaban($datajawaban);
        }

        $this->session->set_flashdata('message', '<script>swal("Success!", "Berhasil Tambah Data Soal!", "success");</script>');

        $data['title'] = 'Soal';
        $data['ambil'] = $this->Soal_model->ambil($this->session->userdata('paketsoal'));
        $data['paketsoal'] = $this->session->userdata('paketsoal');
        $data['name'] = $this->session->userdata('name');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('soal/index');
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $soal = $this->input->post('soal');

        $data = array(
            'soal' => $soal);

        $where = array(
            'id' => $id);

        $this->Soal_model->Update($where,$data,'tb_soal');
        $this->session->set_flashdata('message', '<script>swal("Success!", "Berhasil Ubah Data Soal!", "success");</script>');
        redirect ('soal/index');
    }

    public function edit($id)
    {

        $data['title'] = 'Soal';

        $data['name'] = $this->session->userdata('name');
        // $data['soal'] = $this->soal_model->Edit();
        $data['idsoal'] = $this->Soal_model->getSoalById($id);

        $data['detailsoal'] = $data['idsoal']['soal'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('soal/edit',$data);
        $this->load->view('templates/footer', $data);
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->Soal_model->Hapus($where,'tb_soal');
        $this->session->set_flashdata('message', '<script>swal("Success!", "Berhasil Hapus Data Soal!", "success");</script>');
        redirect('soal/index');
    }

}
//     public function delete($kode = 0){
//         $this->ceklogin();
//         $hasil = $this->soal_model->Hapus('soal',array('id' => $kode));
//         if($hasil == 1){
//             redirect('soal');
//         }else{
//             echo "mohon periksa kembali";
//         }
//     }
// }