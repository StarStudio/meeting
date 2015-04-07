
// 触发点击图标的事件
function click () {
	var needButton=document.getElementById('need');
	var contactButton=document.getElementById('contact');
	var needDiv=document.getElementById('ne');
	var contactDiv=document.getElementById('co');
	var appButton=document.getElementById('app');
	var appDiv=document.getElementById('ap');
	needButton.onclick =function () {
		viewDiv(needDiv); 
	};
	contactButton.onclick =function () {
		viewDiv (contactDiv); 
	};
	app.onclick =function () {
		viewDiv (appDiv); 
	};
}

//弹出弹框的事件
function viewDiv (div) {
	div.style.display="block";
	var over=document.createElement('div');
	over.style.cssText = 'width:100%;height:100%;background:#333;opacity:0.6;z-index:2;position:fixed;top:0;left:0;';
	document.getElementsByTagName('body')[0].appendChild(over);

	over.onclick=function () {
		div.style.display="none";
		document.getElementsByTagName('body')[0].removeChild(over);
	}
}

//点击查看大图事件
function viewImg () {
	var smallImg= document.getElementById('ne').getElementsByTagName('img')[0];
	var bigImg=document.createElement('img');
	bigImg.setAttribute('src',smallImg.src);
	bigImg.style.cssText='width:90%;position:fixed;top:50px;';
	bigImg.style.marginLeft="5%";
	bigImg.style.zIndex="1000"
	var over=document.createElement('div');
	over.style.cssText = 'width:100%;height:100%;background:#333;opacity:0.6;z-index:5;position:fixed;top:0;left:0;';
	smallImg.onclick=function () {
		document.getElementsByTagName('body')[0].appendChild(over);
		document.getElementsByTagName('body')[0].appendChild(bigImg);
	}
	over.onclick=function () {
		document.getElementsByTagName('body')[0].removeChild(bigImg);
		document.getElementsByTagName('body')[0].removeChild(over);
	}
}

//下面是轮播代码
//对轮播器的布局
function scroll () {
	var main=document.getElementsByClassName('scrollcover')[0];
	var scrollDivs=document.getElementsByClassName('scroll');
	var sumLen=0;
	for (var i = 0; i < scrollDivs.length; i++) {
		scrollDivs[i].style.width=screen.width+'px';
		var len=screen.width;
		sumLen=sumLen+len;
	};
	document.getElementsByClassName('main')[0].style.width=screen.width+'px';
	main.style.width=sumLen+'px';
	if (scrollDivs.length>1) {
		scrollMove(scrollDivs)
	};
}
//实现轮播的函数
function scrollMove (scrollDivs) {
	var width=screen.width;
	
}
function moveElement (elem,end) {
	var timer=null;
	clearInterval(timer);
	timer=setInterval(function () {
		var speed=(end-elem.offsetLeft)/10;
		speed=speed>0?Math.ceil(speed):Math.floor(speed);

		if (elem.offsetLeft===end) {
			clearInterval(timer)
		}else{
			elem.style.left=elem.offsetLeft+speed+'px';
		};

	},30)
}

addLoadEvent(click)
addLoadEvent(viewImg)
addLoadEvent(scroll)