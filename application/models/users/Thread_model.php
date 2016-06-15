<?php
class Thread_model extends My_model{
	public function __construct(){
		parent::__construct();
	}
	public function getThreadsByCategoryCode($code){
		//first, get the category id
		$cat=$this->db->select("id")
			->from("Categories")
			->where("code",$code)
			->get()
			->row();
		if($cat){
			$id=$cat->id;
		}else {
			return array();
		}
		return	$this->db->select("threads.title,threads.code,threads.creatorId,users.username,users.code as userCode")
				->from("threads")
				->where("threads.visible",1)
				->where("threads.categoryId",$id)
				->join("users","users.id=threads.creatorId")
				->get()
				->result();
	}
	public function getThreadByCode($code){
		return	$this->db->select("*")
				->from("threads")
				->where("code",$code)
				->get()
				->row();
	}
	public function delete($code,$userId){
		$thread=$this->getThreadByCode($code);
		if($thread->creatorId==$userId){
			$this->db->where("id",$thread->id)
			->set("visible",0)
			->update("threads");
			return array("success"=>true);
		}else {
			return array("success"=>false);
		}
	}

}
?>
