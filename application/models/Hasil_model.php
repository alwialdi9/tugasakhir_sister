<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_model extends Ci_Model
{

   function Ambil()
  {
    $data = $this->db->query('SELECT * FROM tb_hasil');
    return $data->result_array();
  }

  public function Simpan($tabel, $data)
  {
    $res = $this->db->insert($tabel, $data);
    return $res;
  }

  public function detailId($nis)
  {
    $data = $this->db->get_where('tb_hasil', ['nis' => $nis])->row_array();
    return $data;
    
  }
  

  // public function detailJawaban($jawaban)
  // {
  //   $data = $this->db->get_where('tb_hasil', ['jawaban_1' => $jawaban])->row_array();
  //   return $data;
  // }

  // public function Detail($id)
  // {
  //   $data = $this->db->get_where('tb_hasil', array('nama', 'nilai' => $id))->row();
  // 	return $data;

  // }

  public function Hapus($table, $where)
  {
    return $this->db->delete($table, $where);
  }
}
