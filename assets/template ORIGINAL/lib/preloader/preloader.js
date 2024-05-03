window.onload = function () {
	var p = document.createElement("div");
p.innerHTML = "<div style='z-index:100000' id='owlreporter-preloader'><div id='loader'></div><div class='loader-section section-left'></div><div class='loader-section section-right'></div></div>";
document.body.insertBefore(p, document.body.firstChild);
function pageload(){var e=(new Date).getTime(),t=(e-before)/1e3,n=document.getElementById("loadingtime");n.innerHTML="Page load: "+t+" seconds."}window.onload=function(){pageload()},setTimeout(function(){document.body.className+=" loaded"},1500),document.addEventListener?document.addEventListener("DOMContentLoaded",function(){document.removeEventListener("DOMContentLoaded",arguments.callee,!1),domReady()},!1):document.attachEvent&&document.attachEvent("onreadystatechange",function(){"complete"===document.readyState&&(document.detachEvent("onreadystatechange",arguments.callee),domReady())});	
};
