<?php
class Basic extends Admin_Parent {
	public function __construct(){
		parent::__construct();
	}
	public function dashboard(){
		parent::loadAll("dashboard");
	}
}

?>
