function scrollToSmoothly(pos, time){
  /*Time is exact amount of time the scrolling will take (in milliseconds)*/
  /*Pos is the y-position to scroll to (in pixels)*/
  /*Code written by hev1*/
  if(typeof pos!== "number"){
  pos = parseFloat(pos);
  }
  time = time || 500;
  if(typeof time!== "number"){
	  time = parseFloat(time);
  }
  if(isNaN(pos)){
   console.warn("Position must be a number or a numeric String.");
   throw "Position must be a number";
  }
  if(isNaN(time)){
	  console.warn("Time must be a number or a numeric Sting.");
	  throw "Time must be a number";
  }
  if(pos<0||time<0){
  return;
  }
  var currentPos = window.scrollY || window.screenTop;
	var start = null;
  var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
  window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
  requestAnimationFrame(function step(currentTime){
  	start = !start? currentTime: start;
    var progress = currentTime - start;
    if(currentPos<pos){
    window.scrollTo(0, ((pos-currentPos)*progress/time)+currentPos);
    if(progress < time){
    	requestAnimationFrame(step);
    } else {
    	window.scrollTo(0, pos);
    }
    } else {
    window.scrollTo(0, currentPos-((currentPos-pos)*progress/time));
    if(progress < time){
    	requestAnimationFrame(step);
    } else {
    	window.scrollTo(0, pos);
    }
    }
  });
}
var backToTop = document.getElementById("backToTop");
window.addEventListener("scroll", function(e){
	if(window.scrollY==0){
  	backToTop.style.display = "none";
  } else {
  	backToTop.style.display = "block";
  }
});