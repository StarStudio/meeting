<?php

class IndexAction extends CommonAction{

	//后台主页面的展示和退出登录

	public function index(){
		$this->display();
	}

	public function logout(){
		session_unset();
		session_destroy();
		$this->redirect('Admin/Login/index');
	}
}

?>