<?php 
class Threads extends User_parent {
	public function __construct(){
		parent::__construct();
	}
	public function showThreadsInCategory($catCode){
		parent::loadAll("threads/threadList",array("from"=>"category","code"=>$catCode));
	}
	public function showThread($threadCode){
		$data=array("owned"=>false,"code"=>$threadCode);
		$userId=$this->session->userId;
		if($userId){
			$this->load->model("users/Thread_model");
			$thread=$this->Thread_model->getThreadByCode($threadCode);
			if($thread){
				if($thread->creatorId==$userId){
					$data['owned']=true;
				}
			}
		}
		parent::loadAll("threads/thread",$data);
		
		
	}

}
?>
