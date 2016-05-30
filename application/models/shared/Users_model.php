<?php
class Users_model extends MY_Model {
	//this is used to get the user data by its id,username or email. 
	//Technically other ways can also be done but as it will only return one row it may have unexpected results that way.
	private function getUserByTable($name,$table){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where($table,$name);
		$query=$this->db->get();
		return $query->row_array();
	}
	public function getUserIdByName($userName){
		$user=$this->db->get_where("users",array("username"=>$userName),1)->row();
		if($user){
			return $user->id;
		}
		
	}
	public function logIn($data){
		//need to check later why I didn't use the post check libary or whatever it is called
		if($data["username"]!="" && $data['password']!=""){
			$this->db->select("*");
			$this->db->from("users");
			$this->db->where("username",$data["username"]);
			$this->db->where("activated",1);
			$this->db->where("removed",0);
			
			$query=$this->db->get();
			$result= $query->row_array();
			
			if($result){
				$this->load->library("encrypt");
				if($data['password']==$this->encrypt->decode($result["password"])){
					$this->session->set_userdata("userId",$result['id']);
					$this->session->set_userdata("status",$result['status']);
					return false;
				} else {
					return "The name or password did not match";
				}
			} else {
				return "The name or password did not match";
			}
		} else {
			return "One or more of the required fields where empty";
		}
	}
	public function register($data){
		if(count($data)<4){
			return "Some fields did not have a value. !";
		}
		if($data['password']!=$data["passwordCheck"]){
			return "The passwords don't match.'";
		}
		foreach($data as $key=>$value){
			if(!$value){
				return "Some fields did not have a value.";
			}
		}
		if($this->getUserByTable($data['username'],"username")){
			return "This username is already taken";
		}
		if($this->getUserByTable($data['mail'],"email")){
			return "This email is already in use, please choose a different one";
		}
		$code=parent::createCode("users");
		$this->load->helper("string");
		$randomActivationString=random_string("alnum", 10);
		$this->load->library('encrypt');
		$insertData=array("username"=>$data['username'],
			"password"=>$this->encrypt->encode($data["password"]),
			"email"=>$data['mail'],
			"code"=>$code,
			"removed"=>0,
			"status"=>0,
			"activation_code"=>$randomActivationString,
			"activated"=>0
		);
		$this->load->library('email');
		$this->db->insert("users",$insertData);
		$this->email->from('no_reply@mud.com', 'My MUD');
		$this->email->to($data['mail']);
		$this->email->subject('Activate account');
		$this->email->message('<!doctype html><html></h
		tml><body><h1>Uw account at My MUD is ready to be activated</h1><p>You can activate it <a href="'.base_url("index.php/activation/".$randomActivationString).'">here</a></p></body></html>');

		$this->email->send();
	}
	//activates the user so he can play. As that is what everyone wants to do today.
	public function activate($activateString){
		//get the user by its activation code
		$user=$this->getUserByTable($activateString,"activation_code");
		//check if there is one, return the error string if it was not found
		if(!$user){
			return "The given activation string doesn't exist'";
		}
		//user was found, so lets be nice and activate him/her :)
		$this->db->where($user);
		$this->db->update("users",array("activation_code"=>"","activated"=>1));
	}
	//just a way to nicely wrap arround the getByTable function to make controllers look better that need userData
	
	public function getUserData($userId){
		$data	=	$this->db->select("username, status")
					->from("users")
					->where("id",$userId)
					->get()
					->row_array();
		return $data;
	}

}
