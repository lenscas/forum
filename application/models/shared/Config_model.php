<?php
class Config_model extends MY_model{
	public function __construct(){
		parent::__construct();
	}
	public function getAllThemes(){
		return	$this->db->select("*")
				->from("themes")
				->get()
				->result_array();
	}
	public function getDefaultTheme(){
		return	$this->db->select("themes.location")
				->from("config")
				->where("config.name","defaultTheme")
				->join("themes","themes.id=config.value")
				->get()
				->row()
				->location;
	}
}
?>
