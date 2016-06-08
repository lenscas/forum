<?php 
class Category_model extends My_model {
	public function __construct(){
		parent::__construct();
	}
	public function getRules(){
		return $this->db->select("name,id")
				->from("CategoryRules")
				->get()
				->result();
	}
	public function create($data){
		//check if the rule exists
		$rule	=	$this->db->select("id")
					->from("CategoryRules")
					->where("id",$data['rulesId'])
					->get()
					->row();
		if(!$rule){
			return array("success"=>false,"error"=>"Rule does not exist.");
		}
		$data['code']=parent::createCode("Categories");
		$this->db->insert("Categories",$data);
		return array("success"=>true);
	}
}
?>
