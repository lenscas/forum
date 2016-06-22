<?php
class Posts extends User_parent{
	public function __construct(){
		parent::__construct();
		$this->load->model("users/Posts_model");
	}

public function create(){
		$userId=$this->session->userId;
		if($userId){
			$data = $this->input->post();
			echo json_encode($this->Posts_model->create($data,$userId));
			//echo json_encode(array("success"=>true));
		} else {
			echo json_encode(array("success"=>false));
		}
	}

public function getPostsByThreadCode($code){
		$data=array();

			$data=$this->Posts_model->getPosts($code);
		
		echo json_encode($data);
	}	



}
?>
