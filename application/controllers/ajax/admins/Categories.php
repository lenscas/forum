<?php 
class Categories extends Admin_parent{
	public function __construct(){
		parent::__construct();
		$this->load->model("admins/Category_model");
	}
	public function getAllRules(){
		echo json_encode($this->Category_model->getRules());
	}
	public function create(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules("name","Categorie name","required");
		$this->form_validation->set_rules("rulesId","Rule","required|integer");
		if($this->form_validation->run()){
			echo json_encode($this->Category_model->create($this->input->post()));
		} else {
			$data=array("success"=>false,"error"=>validation_errors());
			echo json_encode($data);
		}
	}
}
?>
