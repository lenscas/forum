<?php
class Threads extends User_parent{
	public function __construct(){
		parent::__construct();
		$this->load->model("users/Thread_model");
	}
	public function getThreadsBy($what,$code){
		$data=array();
		if($what=="category"){
			$data=$this->Thread_model->getThreadsByCategoryCode($code);
		}
		echo json_encode($data);
	}
	public function delete($code,$check){
		$userId=$this->session->userId;
		if($userId){
			parent::checkLegit($check,"die");
			echo json_encode($this->Thread_model->delete($code,$userId));
		} else {
			echo json_encode(array("success"=>false));
		}
	}

	public function create(){
		$userId=$this->session->userId;
		if($userId){
			//echo json_encode($this->input->post("title"));
			$data = parent::getPostSafe();
			echo json_encode($this->Thread_model->create($data,$userId));
			//echo json_encode(array("success"=>true));
		} else {
			echo json_encode(array("success"=>false));
		}
	}
}
?>
