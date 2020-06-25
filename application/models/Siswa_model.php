<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends Ci_Model {

   function getSiswa() {
     $data = $this->db->query('SELECT * FROM tb_siswa');
      return $data->result_array();
  }

  public function getSiswaById($id)
    {
        $this->db->from('tb_siswa');
        $this->db->where('id',$id);
        $query = $this->db->get();
  
        return $query->row();
    }

    public function addSiswa($data){
      $this->db->insert('tb_siswa',$data);
      return $this->db->insert_id();
    }

    public function update($data)
    {
      $where = array('id' => $this->input->post('id'));
      $this->db->update('tb_siswa', $data, $where);
      return $this->db->affected_rows();
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('tb_siswa');
    }
}