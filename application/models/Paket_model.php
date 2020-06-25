<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_model extends Ci_Model {

	public function get_paket(){
	$data = $this->db->query('SELECT * FROM tb_paket');
    return $data->result_array();
	}
}