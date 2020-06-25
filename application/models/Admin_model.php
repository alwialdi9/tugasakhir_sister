<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends Ci_Model {

	public function ubahWaktu()
	{
		$data = [
			'waktu' => $this->input->post('waktu'),
		];
		$this->db->where('id',$this->input->post('id'));
		return $this->db->update('tb_timer',$data);
	}

	function getAdmin() {
     $data = $this->db->query('SELECT * FROM tb_user');
      return $data->result_array();
  }

  public function getAdminById($id)
    {
        $this->db->from('tb_user');
        $this->db->where('id',$id);
        $query = $this->db->get();
  
        return $query->row();
    }

    public function addAdmin($data){
      $this->db->insert('tb_user',$data);
      return $this->db->insert_id();
    }

    public function update($data)
    {
      $where = array('id' => $this->input->post('id'));
      $this->db->update('tb_user', $data, $where);
      return $this->db->affected_rows();
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('tb_user');
    }
}