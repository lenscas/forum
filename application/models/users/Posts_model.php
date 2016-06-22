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

		$user	=	$this->db->select("totalPosts")
					->from("users")
					->where("id",$userId)
					->get()
					->row_array();

					$totalPosts = $user['totalPosts'];

					$urlinstring = strpos($data['content'], '<a');

					if ($urlinstring == FALSE) {
						$visible  = "1";
					}else{
						if ($user['totalPosts'] > '5') {
							$visible = "1";
						}else{
							$visible = "0";
						}
					}


		$data = array(
	        'code' => $code,
	        'content' => $data['content'],
	        'creatorId' => $userId,
	        'threadId' => $threadId['id'],
	        'visible' => $visible
		);



		$this->db->insert('posts', $data);

		$totalPosts++;

		$data2 = array(
	        'totalPosts' => $totalPosts
		);

		$this->db->where('id', $userId);
		$this->db->update('users', $data2);
		return array("success"=>true);
	}

	public function getPosts($code){
		//first, get the thread id
		$thread=$this->db->select("id")
			->from("threads")
			->where("code",$code)
			->get()
			->row_Array();

		return $this->db->select("posts.content,posts.code,posts.creatorId,users.username,users.totalPosts,users.code as userCode")
				->from("posts")
				->where("posts.visible",1)
				->where("posts.threadId",$thread['id'])
				->join("users","users.id=posts.creatorId")
				->get()
				->result_array();



		
	}
	

}
?>
