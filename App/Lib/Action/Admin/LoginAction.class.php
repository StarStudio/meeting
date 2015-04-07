<?php

//登录模块

class LoginAction extends Action{

	public function index(){
		$this->display();
	}

	public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify(4, 1, 'png', 80, 25);
	}

	public function login(){
		if(!IS_POST) halt('页面不存在');

		if(I('code', '', 'md5')!=session('verify')){
			$this->error('验证码错误');
		}

		$username = I('username');
		$pwd = I('password', '', 'md5');

		$user = M('user')->where(array('username' => $username))->find();

		if(!$user || $user['password'] != $pwd){
			$this->error('账号或密码错误');
		}

		$data = array(
			'id' => $user['id'],
			'login_time' => time(),
			'login_ip' => get_client_ip(),
			);
		M('user')->save($data);

		session('uid', $user['id']);
		session('username', $user['username']);
		session('login_time', date('Y-m-d H:i:s', $user['login_time']));
		session('login_ip', $user['login_ip']);

		$this->redirect('Admin/Index/index');
	}

}


?>