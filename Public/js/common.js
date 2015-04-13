function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      oldonload();
      func();
    }
  }
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
        alert(xhr.status)
      }
    };
  }
} 
function addEvent(element,type,fun) {
	if (element.addEventListener){
		element.addEventListener(type,fun,false);
	}else if(element.attachEvent){
		element.attachEvent("on"+type,fun);
	}else{
		element["on"+type]=fun;
	}
}
function removeEvent(element,type,fun) {
	if (element.removeEventListener){
		element.removeeventListener(type,fun,false);
	}else if(element.detachEvent){
		element.detachEvent("on"+type,fun);
	}else{
		element["on"+type]=null;
	}
}