<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends User_Parent {
	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		parent::test();
		$this->load->view('welcome_message');
	}
	public function login(){
		parent::redirectLoggedIn();
		parent::loadAll("users/login");
	}
	public function logout(){
		parent::forceLogin();
		$this->session->sess_destroy();
		parent::loadAll("users/logout",array(),array('loggedIn'=>false));
	}
	public function register(){
		parent::redirectLoggedIn();
		parent::loadAll("users/register");
	}
	public function showMade(){
		parent::redirectLoggedIn();
		parent::loadAll("users/success");
	}
	public function activate($activationString){
		parent::redirectLoggedIn();
		$this->load->model("shared/Users_model");
		$error=$this->Users_model->activate($activationString);
		if(!$error){
			$status="success";
			$message="Your account has been successfully activated.";
		} else {
			$status="an error accord.";
			$message=$status;
		}
		parent::loadAll("users/activated",array("status"=>$status,"message"=>$message));
	}
	public function profile($userName=false){
		$contentData=array();
		$this->load->model("shared/Users_model");
		if(!$userName){
			$contentData['userId']=parent::getIdForced();
		} else {
			$contentData['userId']=$this->users_model->getUserIdByName($userName);
		}
		parent::loadAll("users/profile",$contentData);
	}
	public function character($charId){
		parent::loadAll("users/character",array("charId"=>$charId));
	}
}
