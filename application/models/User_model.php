<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class User_model extends CI_Model
{
  public function __construct()
        {
            $this->load->database();
        }

  public function soal(){
    $data = $this->db->query("SELECT * FROM tb_soal");
        return $data->result_array();
  }

  public function jawaban(){
    $data = $this->db->query("SELECT * FROM tb_jawaban");
    return $data->result_array();
  }

  public function tampilSoal(){
        return $this->db->from('tb_soal')
          ->join('tb_jawaban', 'tb_jawaban.pertanyaan_id=tb_soal.pertanyaan_id')
          ->get()
          ->result_array();
  }
}
?>