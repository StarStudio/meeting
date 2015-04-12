<?php

class LoginAction extends Action{

	public function index(){
		//渲染登录模板
		$this->display();
	}

	public function verify(){
		//导入验证码类
		import('ORG.Util.Image');
		//对验证码的输出格式进行设置，生成的验证码会被进行md5加密，并存储在session中
		Image::buildImageVerify(4, 1, 'png', 80, 25);
	}

	public function login(){
		//排除非POST访问页面的问题
		if(!IS_POST) halt('页面不存在');

		//将前端输入的验证码加密后与session中的验证码进行对比
		if(I('code', '', 'md5')!=session('verify')){
			$this->error('验证码错误');
		}

		//获取用户名与加密后的pwd
		$username = I('username');
		$pwd = I('password', '', 'md5');

		//查询用户名所对应的后台用户
		$user = M('user')->where(array('username' => $username))->find();

		//将密码进行比对
		if(!$user || $user['password'] != $pwd){
			$this->error('账号或密码错误');
		}

		//更新后台存储的登录数据
		$data = array(
			'id' => $user['id'],
			'login_time' => time(),
			'login_ip' => get_client_ip(),
			);
		M('user')->save($data);

		//设置登录会话信息
		session('uid', $user['id']);
		session('username', $user['username']);
		session('login_time', date('Y-m-d H:i:s', $user['login_time']));
		session('login_ip', $user['login_ip']);

		//重定向至后台管理系统
		$this->redirect('Admin/Index/index');
	}

	public function test(){
		echo __CLASS__;
		echo "<br />";
		echo __FUNCTION__;
		echo "<br />";
		echo __METHOD__;
	}

}


?>