<?php
class Posts_model extends My_model{
	public function __construct(){
		parent::__construct();
	}
	
	public function create($data,$userId){
		$code=parent::createCode("threads");

		$threadId	=	$this->db->select("id")
					->from("threads")
					->where("code",$data['code'])
					->get()
					->row_array();


		$data = array(
	        'code' => $code,
	        'content' => $data['content'],
	        'creatorId' => $userId,
	        'threadId' => $threadId['id'],
	        'visible' => "1"
		);

		$this->db->insert('posts', $data);


	}

	public function getPosts($code){
		//first, get the thread id
		$thread=$this->db->select("id")
			->from("threads")
			->where("code",$code)
			->get()
			->row_Array();

		return	$this->db->select("posts.content,posts.code,posts.creatorId,users.username,users.code as userCode")
				->from("posts")
				->where("posts.visible",1)
				->where("posts.threadId",$thread['id'])
				->join("users","users.id=posts.creatorId")
				->get()
				->result();
	}
	

}
?>
