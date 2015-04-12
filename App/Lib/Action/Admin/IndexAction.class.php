<?php

class IndexAction extends CommonAction{

	public function index(){
		$user = M('user')->find($_SESSION['uid']);
		$this->lock = $user['lock'];
		$this->display();
	}

	public function logout(){
		session_unset();
		session_destroy();
		$this->redirect('Admin/Login/index');
	}
}

?>