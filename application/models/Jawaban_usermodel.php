<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jawaban_usermodel extends Ci_Model {

	public function save(){
		$nilai = 0;
		$urutan = $this->db->get_where('tb_jawaban', ['mapel' => $this->session->userdata('mapel')])->result_array();

        //mengambil hasil yang benar
        $hasil = $this->db->get_where('tb_soal',['mapel' => $this->session->userdata('mapel')])->result_array();

        $this->db->like('mapel', $this->session->userdata('mapel'));
        $this->db->from('tb_soal');
        $jumlah =  $this->db->count_all_results();

           	for ($i = 1; $i <= $jumlah; $i++) {
           		if ($this->input->post($urutan['id']) == $hasil['hasil']) {
           			$nilai = $nilai+10;
           		}
                
            }
              
            

		$nilaiakhir = '30';

		$data = [
		'nama' => $this->input->post('nama'),
		'nis' => $this->input->post('nis'),
		'nilai' => $nilaiakhir,
		'mapel' => $this->input->post('mapel'),
		'date' => date("Y-m-d H:i:s"),
		];
		
		return $this->db->insert('tb_hasil',$data);
	}

}