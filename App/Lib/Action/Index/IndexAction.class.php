<?php

class IndexAction extends Action{

	public function index(){
		if(isset($_COOKIE['school'])||isset($_COOKIE['joiner'])){
			$this->redirect('Index/Index/other');
		}

		$school = M('school')->order("convert(school using gb2312) ASC")->select();
		$this->school = $school;
		$this->display();
	}

	public function other(){
		$school = I('school');
		$joiner = I('joiner');
		if(!isset($_COOKIE['school'])||!isset($_COOKIE['joiner'])){
			cookie('school', $school);
			cookie('joiner', $joiner);
		}else{
			$school = cookie('school');
			$joiner = cookie('joiner');
		}
		if($joiner == ''){
			echo "<script>alert('\u8BF7\u586B\u5199\u5B8C\u6574\u4FE1\u606F\uFF01')</script>";
			$this->redirect('Index/Index/index');
		}

		$school_data = M('school')->where(array('school' => $school))->find();

		M('joiner')->where(array('joiner' => $joiner,'school_id' => $school_data['id']))->setInc('time');
		M('joiner')->where(array('joiner' => $joiner,'school_id' => $school_data['id']))->save(array( 'login_time' => time()));

		$joiner = M('joiner')->where(array('joiner' => $joiner,'school_id' => $school_data['id']))->find();

		if(!isset($_COOKIE['school'])&&!isset($_COOKIE['joiner'])&&$joiner['time'] > 1){
			echo "<script>alert('\u8BE5\u7528\u6237\u5DF2\u7B7E\u5230\uFF01')</script>";
		}

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
			$var = M('joiner')->where(array('joiner' => $name, 'school_id' => $school_data['id']))->select();
		}else{
			$var =array();
		}

		$this->ajaxReturn($var, 'json');
	}
}

?>