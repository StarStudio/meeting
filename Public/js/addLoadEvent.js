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
function addClass(element,value) {
  if (!element.className) {
    element.className = value;
  } else {
    element.className+= " ";
    element.className+= value;
  }
}