<?php

class IndexAction extends Action{

	public function index(){
		// if(isset($_COOKIE['school'])||isset($_COOKIE['joiner'])){
		// 	$this->redirect('Index/Index/other');
		// }

		$school = M('school')->order("id")->select();
		$this->school = $school;
		$this->display();
	}

	public function other(){
		$school = I('school');
		$joiner = I('joiner');
		// if(!isset($_COOKIE['school'])||!isset($_COOKIE['joiner'])){
		// 	cookie('school', $school);
		// 	cookie('joiner', $joiner);
		// }else{
		// 	$school = cookie('school');
		// 	$joiner = cookie('joiner');
		// }
		if($joiner == ''){
			// echo "<script>alert('\u8BF7\u586B\u5199\u5B8C\u6574\u4FE1\u606F\uFF01')</script>";
			$this->redirect('Index/Index/index');
		}

		$school_data = M('school')->where(array('school' => $school))->find();
		$find_result = M('joiner')->where(array('joiner' => $joiner,'school_id' => $school_data['id']))->find();

		M('joiner')->where(array('joiner' => $joiner,'school_id' => $school_data['id']))->setInc('time');
		if($find_result['login_time'] == ''){
			M('joiner')->where(array('joiner' => $joiner,'school_id' => $school_data['id']))->save(array( 'login_time' => time()));
		}
		
		$joiner = M('joiner')->where(array('joiner' => $joiner,'school_id' => $school_data['id']))->find();

		// if(!isset($_COOKIE['school'])&&!isset($_COOKIE['joiner'])&&$joiner['time'] > 1){
		// 	echo "<script>alert('\u8BE5\u7528\u6237\u5DF2\u7B7E\u5230\uFF01')</script>";
		// }

		$this->result = $joiner;

		$this->display();
	}

	public function search(){
		
		$arr = array();
		$len = mb_strlen(I('word'));
		$i = 0;
		while(mb_substr(I('word'),$i, 1, 'utf-8')){
			$arr[$i] = mb_substr(I('word'), $i, 1, 'utf-8');
			$i++;
		}

		$word = $arr;

		$temp = '';
		for($i = 0; $i < count($word); $i++){
			$temp = $temp . '%'.$word[$i];
		}
		$temp = $temp . '%';

		if(I('word') != ''){
			$find['school'] = array('like',$temp,);
			$var = M('school')->where($find)->select();
		}else{
			$var =array();
		}

		$this->ajaxReturn($var, 'json');
	}

	public function match(){

		$school = I('school');

		if($school != ''){
			$school_data = M('school')->where(array('school' => $school))->find();
			$var = M('joiner')->where(array('school_id' => $school_data['id']))->select();
			cookie('school_data', $school_data);
		}else{
			$var =array();
		}

		$this->ajaxReturn($var, 'json');
	}

	public function name(){
		$name = I('name');
		$school_data = cookie('school_data');

		if($name != '' && $school_data != ''){
			$var = M('joiner')->where(array('username' => $name, 'school_id' => $school_data['id']))->select();
		}else{
			$var =array();
		}

		$this->ajaxReturn($var, 'json');
	}

	public function done(){
		$all = M('joiner')->count();
		$undone = M('joiner')->where(array('time' => 0))->count();
		$data = array(
			'all' => intval($all),
			'undone' => intval($undone),
			);
		$this->ajaxReturn($data, 'json');
	}

	public function view_post(){
		$school = I('school');
		$joiner = I('joiner');
		$self = I('self', '', 'intval');
		// if($joiner == ''){
		// 	$this->redirect('Index/Index/index');
		// }
		$school_data = M('school')->where(array('school' => $school))->find();
		$find_result = M('joiner')->where(array('username' => $joiner,'school_id' => $school_data['id']))->find();

		M('joiner')->where(array('username' => $joiner,'school_id' => $school_data['id']))->setInc('time');
		if($find_result['login_time'] == ''){
			M('joiner')->where(array('username' => $joiner,'school_id' => $school_data['id']))->save(array( 'login_time' => time(), 'other' => $self));
		}
		
		$joiner = M('joiner')->where(array('username' => $joiner,'school_id' => $school_data['id']))->find();
		$this->ajaxReturn($joiner, 'json');
	}

	private function trans_array($name){
		$length = count($name);

		for($i = 0; $i< $length; $i++){
			$temp = M('school')->where(array('id' => $name[$i]['school_id']))->find();
			$name[$i]['school_id'] = $temp['school'];
		}

		return $name;
	}

	public function view(){

		$done = M('joiner')->where('time > 0')->order('login_time DESC')->select();
		$doneCount = M('joiner')->where('time > 0')->count();
		$this->done = $this->trans_array($done);
		$this->doneCount = $doneCount;

		$undone = M('joiner')->where(array('time' => 0))->order('school_id')->select();
		$undoneCount = M('joiner')->where(array('time' => 0))->count();
		$this->undone = $this->trans_array($undone);
		$this->undoneCount = $undoneCount;

		$lateCount = M('joiner')->where('login_time > ' . C('JOIN_MEETING_TIME'))->count();
		$late = M('joiner')->where('login_time > ' . C('JOIN_MEETING_TIME'))->order('school_id')->select();
		$this->late = $this->trans_array($late);
		$this->lateCount = $lateCount;

		$all = M('joiner')->count();
		$this->all = $all;
		$percent = intval($doneCount / $all * 100);
		$this->percent = $percent;

		$other = M('joiner')->where(array('other' => 0))->order('school_id')->select();
		$otherCount = M('joiner')->where(array('other' => 0))->count();
		$this->other = $this->trans_array($other);
		$this->otherCount = $otherCount;

		$this->display();
	}

}

?>