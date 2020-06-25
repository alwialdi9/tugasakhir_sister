<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cekjawaban extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jawaban_usermodel');
	}

	public function index()
	{
		$nilai = 0;
		$soal = $this->db->get_where('tb_soal', ['mapel' => $this->session->userdata('mapel')]);

		foreach ($soal->result_array() as $s) {
			$urutan = $s['pertanyaan_id'];
			$jawaban = $this->db->get_where('tb_jawaban', ['pertanyaan_id' => $urutan]);
			foreach ($jawaban->result_array() as $j) {
				if ($this->input->post($j['id']) == $s['hasil'] ) {
					$nilai = $nilai+10;
				}
			}
		}
              
        $this->db->like('mapel', $this->session->userdata('mapel'));
        $this->db->from('tb_soal');
        $jumlah =  $this->db->count_all_results();

		$nilaiakhir = ($nilai/$jumlah)*10;

		$data = array(
		'nama' => $this->input->post('nama'),
		'nis' => $this->input->post('nis'),
		'nilai' => $nilaiakhir,
		'mapel' => $this->input->post('mapel'),
		'date' => date("Y-m-d H:i:s"),
		);

		var_dump($data);
		
		$this->db->insert('tb_hasil',$data);
		$this->session->set_userdata('selesai', true);
		$this->session->unset_userdata('waktu_start');
	}
}
