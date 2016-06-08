<?php 
class Categories extends Admin_parent{
	public function __construct(){
		parent::__construct();
	}
	public function showCategories(){
		parent::loadAll("categories/showAll");
	}
	public function createCategorie(){
		parent::loadAll("categories/createCategories");
	}


}

?>
