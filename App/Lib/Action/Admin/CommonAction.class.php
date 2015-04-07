<?php

class CommonAction extends Action{

	//不登陆不能进后台

	public function _initialize(){
		if(!isset($_SESSION['uid'])||!isset($_SESSION['username'])){
			$this->redirect('Admin/Login/index');
		}
	}
}


?>