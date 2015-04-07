<?php

//用户控制、我觉得你看看就懂了

class UserAction extends CommonAction{

	public function index(){
		$user = M('user')->select($_SESSION['uid']);
		if(($user[0]['lock'])!="0") $this->error('对不起，您没有执行权限');
		$this->display();
	}

	//新增发布人员 我太渣了 管理员就admin

	public function add(){
		if(!IS_POST) halt('页面不存在！');

		$pwd = I('password', '', 'md5');
		$repwd = I('repwd', '', 'md5');
		if($pwd == "") $this->error('请输入密码');
		if($pwd != $repwd) $this->error('两次输入密码不一致！');

		$username = I('username');

		$new = array(
			'username' => $username,
			'password' => $pwd,
			'lock' => 1,
			);

		$flag = M('user')->data($new)->add();

		if($flag){
			$this->success('添加发布人员成功');
		}else{
			$this->error('添加发布人员失败');
		}
	}

	//管理发布人员

	public function manage(){
		$user = M('user')->select($_SESSION['uid']);
		if(($user[0]['lock'])!="0") $this->error('对不起，您没有执行权限');

		import('ORG.Util.Page');

		$count = M('user')->count();
		$page = new Page($count, 5);
		$limit = $page->firstRow . ',' . $page->listRows;

		$user = M('user')->order('id DESC')->limit($limit)->select();
		$this->page = $page->show();
		$this->user = $user;
		$this->display();
	}

	//发布人员的删除方法

	public function delete(){
		$id = I('id', '', 'intval');
		$user = M('user')->select($id);

		if(($user[0]['username'])=="admin") $this->error('管理员不可删除');

		if(M('user')->delete($id)){
			$this->success('删除成功', U('Admin/User/manage'));
		}else{
			$this->error('删除失败');
		}
	}

	//修改密码页面

	public function change(){
		$this->display();
	}

	//修改密码的方法

	public function save(){
		if(!IS_POST) halt('页面不存在！');

		$uid = M('user')->select($_SESSION['uid']);

		$oldpwd = I('oldpwd', '', 'md5');
		if($oldpwd!=$uid[0]['password']) $this->error('旧密码错误');

		$pwd = I('password', '', 'md5');
		$repwd = I('repwd', '', 'md5');
		if($pwd!=$repwd) $this->error('新密码两次输入不一致！');

		$data = array(
			'id' => $uid[0]['id'],
			'password' => $pwd,
			);
		$flag = M('user')->save($data);

		if($flag){
			$this->success('修改成功');
		}else{
			$this->error('修改失败');
		}
	}
}


?>