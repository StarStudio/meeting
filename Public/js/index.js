
//点击选择学校按钮的事件
function clickSchool () {
	var schoolButton=document.getElementById('school');
	var schoolDiv=document.getElementById('sc');

	schoolButton.onclick =function () {
		this.getElementsByTagName('input')[0].disabled="disabled"
		if (!this.class){
			addClass(this,"active");
		};
		if (!this.getElementsByTagName('i')[0].class){addClass(this.getElementsByTagName('i')[0],"active")};
		view (schoolDiv,schoolButton);
	};
}
//点击选择姓名按钮的函数
function clickName (schoolChoosen) {
	var nameButton=document.getElementById('name');
	var nameDiv=document.getElementById('na');
	var schoolDiv=document.getElementById('sc');
	
	nameButton.onclick =function () {

		if (schoolChoosen) {
			this.getElementsByTagName('input')[0].disabled="disabled;"
			if (!this.class){addClass(this,"active")};
			if (!this.getElementsByTagName('i')[0].class){addClass(this.getElementsByTagName('i')[0],"active")};
			view (nameDiv,nameButton)
		}else{
			alert('请选择学校')
		};
}
	};
//弹出选框的函数
function view (div,button) {
	div.style.display="block";
	var over=document.createElement('div')
	document.getElementsByTagName('body')[0].appendChild(over);	
	over.style.cssText = 'width:100%;height:100%;background:#333;opacity:0.6;z-index:2;position:fixed;top:0;left:0;';
	over.id="over";
	chooseLi (div,button);
}

//选择学校或姓名，如果选择学校则发送请求
function chooseLi (div,button) {
	var oLi=div.getElementsByTagName('li');
	var over=document.getElementById('over');
	var backS=document.getElementById('sc').getElementsByTagName('span')[0];
	var backN=document.getElementById('na').getElementsByTagName('span')[0]
	for (var i = 0; i < oLi.length; i++) {
		oLi[i].onclick=function () {

			this.parentNode.parentNode.style.display="none";
			button.getElementsByTagName('input')[0].value=this.firstChild.nodeValue;
			button.getElementsByTagName('input')[0].removeAttribute('disabled');
			document.getElementsByTagName('body')[0].removeChild(over);
			//判断如果选择了学校，则清空姓名输入并发送请求加载列表
			if (div.id==="sc") {
				document.getElementById('name').getElementsByTagName('input')[0].value="请选择姓名";
				document.getElementById('name').className="";
				document.getElementById('name').getElementsByTagName('i')[0].className="";
				var schoolChoosen=true;

				ajax("http://meeting.stuhome.net/Index/Index/match","school="+this.innerHTML,loadName,schoolChoosen);
			}
			//判断如果选择了姓名，提交按钮可点击。
			if (div.id==="na") {
				var subButton =document.getElementById('sub');
				subButton.removeAttribute('disabled');
				subButton.style.backgroundColor="#42a5f5";
				//如果用户已签到，则添加SPAN提示，更改提交按钮的innerHTML
				//重发ajax请求方法
					ajax("http://meeting.stuhome.net/Index/Index/name","name="+this.firstChild.nodeValue,function (data) {
						var data=JSON.parse(data);
						if (data[0].time>0) {
							document.getElementById('name').getElementsByTagName('span')[0].style.display="inline";
							document.getElementById('sub').innerHTML="查看会务信息";
						} 
						else{
							document.getElementById('name').getElementsByTagName('span')[0].style.display="none";
							document.getElementById('sub').innerHTML="确认签到";
						}
						
					})
				//从之前的请求传参数过来

			};
		}
	};

	backN.onclick=function () {
		goBack (div,button)
	}
	backS.onclick=function () {
		goBack (div,button)
	}
	over.onclick=function () {
		goBack (div,button)
	}
}
//出弹框后返回的函数
function goBack (div,button) {
	div.style.display="none";
	var over=document.getElementById('over')
	document.getElementsByTagName('body')[0].removeChild(over);
	button.className="";
	button.getElementsByTagName('i')[0].className="";
}
//选择学校之后加载出姓名
function loadName (data,schoolChoosen) {
	var data=JSON.parse(data);
	var nameUl=document.getElementById('na').getElementsByTagName('ul')[0];
	nameUl.innerHTML=" ";
	if (data) {
		for (var i = 0; i < data.length; i++) {
		var lis=document.createElement('li');

		var time=data[i].time;
		
		var sign=document.createElement('span');
		sign.style.color="#d5d5d5";
		sign.style.fontSize="0.9em";
		sign.style.position="relative";
		sign.style.left="43%";
			if (time>0) {
			sign.innerHTML="已签到";
			};
		lis.innerHTML=data[i].joiner;
		lis.appendChild(sign);
		nameUl.appendChild(lis);
		};
	};
	//加载以后执行点击事件
	clickName(schoolChoosen);
}
//搜索学校功能
function search (){
	var searchButton=document.getElementById('search');
	searchButton.oninput=function (event) {
		
		ajax("http://meeting.stuhome.net/Index/Index/search","word="+this.value,loadResult);
	}
}
//输入搜索关键词后加载出相关的学校
function loadResult (data) {
	var data=JSON.parse(data);
	var schoolUl=document.getElementById('sc').getElementsByTagName('ul')[0];
	schoolUl.innerHTML="";
	if (data) {
		
		for (var i = 0; i < data.length; i++) {
			var lis=document.createElement('li');
			lis.innerHTML=data[i].school;
			schoolUl.appendChild(lis)
			}
		}
		//未找到的话显示字符
	else{
		var erro=document.createElement('li');
		erro.innerHTML="未找到相关内容，请重新输入";
		erro.style.fontSize="0.8em";
		erro.style.color="#df2428";
		schoolUl.appendChild(erro);
	};
	chooseLi (document.getElementById('sc'),document.getElementById('school'))
}
//发送接收请求的AJAX函数，格式ajax(URL,"word="+发送的信息,执行的函数);
function ajax (url,message,fun,argument) {
	var xhr=new XMLHttpRequest();
	xhr.open("post",url,true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhr.send(message);
	xhr.onreadystatechange=function () {
		if (xhr.readyState==4) {
			if((xhr.status>=200&&xhr.status<300)||xhr.status==304){
				fun(xhr.responseText,argument);
			}else{
				alert(xhr.status+"错误")
			}
		};
	}
}

// function formAction () {
// 	var form=document.getElementsByTagName('form')[0];
// 	var 
// }
//页面加载后执行函数
addLoadEvent(clickSchool);
addLoadEvent(search);