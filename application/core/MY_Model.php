<?php
class My_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function generateId($table){
		$this->load->helper('string');
		$this->db->select('count(*) as counter');
		$this->db->from($table);
		$query = $this->db->get();
		$result = $query->row_array();
		return sha1($result['counter']."/".random_string("alpha", 4)."/".time());
	}
	public function generateUniqueId() {
		$this->load->helper('string');
		return sha1(random_string("alpha", 8)."/".time());
	
	}

}
