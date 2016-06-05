<?php
class Admin_Parent extends User_Parent	{
	public function __construct(){
		parent::__construct();
		
	}
	public function loadAll($load,$data=array(),$overWriteHeader = false){
		$this->loadHeader();
		$this->load->view("admin/partials/menu.php");
		$this->load->view("admin/".$load,$data);
		$this->load->view("admin/partials/footer.php");
	}
	public function loadHeader($dataOverWrite = false){
		$this->load->view("admin/partials/header.php");
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
