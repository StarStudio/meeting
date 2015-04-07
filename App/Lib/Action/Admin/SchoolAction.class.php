<?php

class SchoolAction extends CommonAction{

	public function index(){
		$this->type = 'index';
		$user = M('user')->find($_SESSION['uid']);
		$this->lock = $user['lock'];
		$this->display();
	}

	public function add(){
		if(!IS_POST) halt('页面不存在！');

		if(I('school') == '') $this->error('请输入完整信息！');
		
		$data = array(
			'school' => I('school')
			);

		$flag = M('school')->data($data)->add();

		if($flag){
			$this->success('添加与会单位成功！');
		}else{
			$this->error('添加失败！');
		}
	}

	public function joiner(){
		$school = M('school')->order("convert(school using gb2312) ASC")->select();
		$this->school = $school;
		$user = M('user')->find($_SESSION['uid']);
		$this->lock = $user['lock'];
		$this->type = 'joiner';
		$this->display('index');
	}

	public function join(){
		if(!IS_POST) halt('页面不存在！');

		if(I('joiner') == '') $this->error('请输入完整信息！');

		$find = M('school')->where(array('school' => I('school')))->find();

		$data = array(
			'school_id' => $find['id'],
			'username' => I('joiner'),
			);
		
		$flag = M('joiner')->data($data)->add();

		if($flag){
			$this->success('添加参与人员成功！');
		}else{
			$this->error('添加失败！');
		}
	}

	private function trans_array($name){
		$length = count($name);

		for($i = 0; $i< $length; $i++){
			$temp = M('school')->where(array('id' => $name[$i]['school_id']))->find();
			$name[$i]['school_id'] = $temp['school'];
			if($name[$i]['time']==0){
				$name[$i]['time']='<span style="color:red">尚未签到</span>';
			}else if($name[$i]['login_time'] > C('JOIN_MEETING_TIME')){
				$name[$i]['time']='<span style="color:blue">迟到</span>';
			}else{
				$name[$i]['time']='<span style="color:green">正常与会</span>';
			}
		}

		return $name;
	}

	public function manage(){
		import('ORG.Util.Page');
		$user = M('user')->find($_SESSION['uid']);
		$this->lock = $user['lock'];
		$count = M('joiner')->count();
		$page = new Page($count, 10);
		$limit = $page->firstRow . ',' . $page->listRows;

		$name = M('joiner')->order('school_id')->limit($limit)->select();
		$this->page = $page->show();

		$name = $this->trans_array($name);
		$this->name = $name;
		$this->display();
	}

	public function done(){
		import('ORG.Util.Page');
		$user = M('user')->find($_SESSION['uid']);
		$this->lock = $user['lock'];
		$count = M('joiner')->where('time > 0')->count();
		$page = new Page($count, 10);
		$limit = $page->firstRow . ',' . $page->listRows;

		$name = M('joiner')->where('time > 0')->order('login_time DESC')->limit($limit)->select();
		$this->page = $page->show();

		$name = $this->trans_array($name);
		$this->name = $name;
		$this->display('manage');
	}

	public function undone(){
		import('ORG.Util.Page');
		$count = M('joiner')->where(array('time' => 0))->count();
		$page = new Page($count, 10);
		$user = M('user')->find($_SESSION['uid']);
		$this->lock = $user['lock'];
		$limit = $page->firstRow . ',' . $page->listRows;

		$name = M('joiner')->where(array('time' => 0))->order('school_id')->limit($limit)->select();
		$this->page = $page->show();

		$name = $this->trans_array($name);
		$this->name = $name;
		$this->display('manage');
	}

	public function delete(){
		$id = I('id', '', 'intval');
		$joiner = M('joiner')->select($id);

		if(M('joiner')->delete($id)){
			$this->success('删除成功', U('Admin/School/manage'));
		}else{
			$this->error('删除失败');
		}
	}

	public function save(){

		if(M('joiner')->execute('update star_joiner set time = 0, login_time = "", other = 1')){
			M('joiner')->execute('update star_joiner set time = 1, login_time = 1427848200 where `lock` = 1 ');
			$this->success('清空签到数据成功', U('Admin/School/manage'));
		}else{
			$this->error('清空签到数据失败');
		}
	}

	public function edit(){
		$this->type = 'edit';
		$id = I('id', '', 'intval');
		$joiner = M('joiner')->find($id);

		$temp = M('school')->where(array('id' => $joiner['school_id']))->find();
		$joiner['school_id'] = $temp['school'];
		$this->joiner = $joiner;

		$school = M('school')->order("convert(school using gb2312) ASC")->select();
		$this->school = $school;
		$this->display('index');
	}

	public function edit_save(){

		$find = M('school')->where(array('school' => I('school')))->find();

		$data = array(
			'id' => I('id', '', 'intval'),
			'school_id' => $find['id'],
			'username' => I('joiner'),
			);

		if(M('joiner')->save($data)){
			$this->success('编辑已保存', U('Admin/School/manage'));
		}else{
			$this->error('编辑保存失败');
		}

	}

	public function search(){
		$user = M('user')->find($_SESSION['uid']);
		$this->lock = $user['lock'];
		$joiner = M('joiner')->where(array('username' => I('key')))->select();
		$joiner = $this->trans_array($joiner);
		$this->name = $joiner;
		$this->display('manage');
	}
}

?>