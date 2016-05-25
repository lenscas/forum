<?php
class Game_Parent extends User_Parent {
	public $userId;
	public function __construct() {
		parent::__construct();
		$this->userId=parent::getIdForced();
		$this->load->model("Game_model");
	}

	function getCharIdForced(){
		$charId=$this->session->characterId;
		if(! $charId){
			$char=$this->Game_model->getActiveChar($this->userId);
			if($char){
				$this->session->set_userdata("characterId",$char['id']);
				return $char['id'];
			}
			redirect("profile");
		}
		if($this->session->has_userdata("checkAlive")){
			$character=$this->Game_model->getActiveChar($this->userId);
			if($character['id']==$charId){
				return $charId;
			}
			redirect("profile");
		}
		return $charId;
	}
}

class User_Parent extends CI_Controller {
	//used to make sure the construct of the parent always gets executed
	public function __construct() {
		parent::__construct();
	}
	//used to force a login
	public function forceLogIn(){
		if(!$this->session->has_userdata("userId")){
			redirect("login");
		}
	}
	//used to force a log in and get the user id as well
	public function getIdForced(){
		
		$this->forceLogIn();
		return $this->session->userId;
	}
	public function redirectLoggedIn(){
		$this->load->library('session');
		if($this->session->has_userdata("userId")){
			redirect("profile");
		}
	}
	//only loads the header
	public function loadHeader($dataOverWrite=false){
		//$this->load->model("defaults_model.php");
		$headerData=array();
		if($dataOverWrite){
			$headerData=$dataOverWrite;
			
		} else {
			if($this->session->has_userdata("userId")){
				$headerData['loggedIn']=true;
			}else{
				$headerData['loggedIn']=false;
			}
		}
		$this->load->view("users/partials/header.php",$headerData);
	}
	//loads the header, the sidebars, the specified view and the footer
	public function loadAll($view,$data=array(),$overWriteHeader=false){
		$this->loadHeader($overWriteHeader);
		$this->load->view("users/partials/firstSideBar");
		$this->load->view("users/".$view,$data);
		$this->load->view("users/partials/secondSideBar");
		$this->load->view("users/partials/footer.php");
	}
	//used to load the default header+a normal view+footer
	public function loadbasics($view,$data=array()){
		$this->loadHeader();
		$this->load->view("front/".$view,$data);
		$this->load->view("front/defaults/footer.php");
		
	}

}
