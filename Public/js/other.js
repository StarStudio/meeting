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
addLoadEvent(click)
addLoadEvent(viewImg)