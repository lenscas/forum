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
	public function delete($code){
		$userId=$this->session->userId;
		if($userId){
			echo json_encode($this->Thread_model->delete($code,$userId));
		} else {
			echo json_encode(array("success"=>false));
		}
	}
}
?>
