// window.addEventListener('DOMContentLoaded', function(event){
//     ajax (rootURL+"/index.php/Index/Index/done",'',changeClass);
// }, false);
// function changeClass(data) {
// 	var data=JSON.parse(data);
// 	var done=data.done;
// 	var undone=data.undone;
// 	console.log(data);
// 	var all=done+undone;
// 	console.log(all);
// 	var part= done/undone;
// 	var doc=document.getElementById('control');
// 	if (part<0.5) {
// 		control.className='little';
// 	}else if (part<1) {
// 		control.className='lot';
// 	}else{
// 		control.className='all';
// 	};
// 	changeData(done,undone,all);
// }
// function changeData (done,undone,all) {
// 	document.getElementsByClassName('num')[0].getElementsByTagName('span')[0].innerHTML=parseInt(done/undone);
// 	document.getElementsByClassName('people')[0].getElementsByTagName('span')[0].innerHTML=done+'/'+undone;
// 	for (var i = 0; i < document.getElementsByClassName('alreadyI').length; i++) {
// 		document.getElementsByClassName('alreadyI')[i].innerHTML=done;
// 	};
// 	for (var i = 0; i < document.getElementsByClassName('donotI').length; i++) {
// 		document.getElementsByClassName('donotI')[i].innerHTML=undone;
// 	};
	
// }

function click () {
	var viewAlr=document.getElementsByClassName('viewAlr')[0];
	var viewDon=document.getElementsByClassName('viewDon')[0];
	var viewOther=document.getElementsByClassName('viewOther')[0];
	var viewLate=document.getElementsByClassName('viewLate')[0];
	var alreadyDiv=document.getElementById('alreadyDiv');
	var donotDiv=document.getElementById('donotDiv');
	var otherDiv=document.getElementById('otherDiv');
	var lateDiv=document.getElementById('lateDiv');
	viewAlr.onclick =function () {
		viewDiv(alreadyDiv); 
	};
	viewDon.onclick =function () {
		viewDiv (donotDiv); 
	};
	viewOther.onclick =function () {
		viewDiv (otherDiv); 
	};
	viewLate.onclick =function () {
		viewDiv (lateDiv); 
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
addLoadEvent(click)