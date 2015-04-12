<?php

class CommonAction extends Action{

	public function _initialize(){
		if(!isset($_SESSION['uid'])||!isset($_SESSION['username'])){
			$this->redirect('Admin/Login/index');
		}
	}
}


?>