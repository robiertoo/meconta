window.onload=function(){
	var download=document.getElementsByClassName("glyphicon-download-alt");
	for(var i=0;i<download.length;i++){
		download[i].onclick=function(){
			alert("A história será baixada!");
		}
	}
}
