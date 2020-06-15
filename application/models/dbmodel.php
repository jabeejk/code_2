<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbmodel extends CI_Model {

	public function db($value)
	{
		$this->db->insert('sample_reg',$value);
		return true;
	}

	public function file_data_check($name)
	{
		$this->db->where('name',$name);
		$result = $this->db->get('details');
		$data = $result->num_rows();
		return $data;
	}

	public function insert_excel_value($name)
	{	
		
		$val =  $this->db->insert('details',$name);
		return $val;
	}
}