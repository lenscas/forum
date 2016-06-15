<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends User_Parent {
	public function __construct(){
		parent::__construct();
		$this->load->model("shared/Users_model");
	}
	public function login(){
		parent::redirectLoggedIn();
		$error;
		if($this->input->post()){
			$error=$this->Users_model->login(parent::getPostSafe());
		}
		if(!$error){
			echo json_encode(array("loggedIn"=>true));
		} else {
			echo json_encode(array("loggedIn"=>false,"error"=>$error));
		}
	}
	public function register(){
		$error;
		$success=false;
		parent::redirectLoggedIn();
		$post=parent::getPostSafe();
		if($post){
			$data=parent::checkLegit($post['noForge']);
			if($data['success']){
				unset($post['noForge']);
				$error=$this->Users_model->register(parent::getPostSafe());
			} else {
				$error=$data['error'];
			}
		} else {
			$error="No post data found";
		}
		if(!$error){
			$success=true;
		}
		echo json_encode(array("error"=>$error,"success"=>$success));
	}
	public function profile($userId){
		$data=$this->Users_model->getUserData($userId);
		//print_r($data);
		echo json_encode($data);
	}

}
