// JavaScript Document
$(document).ready(function(){
						   
	$('#login').click(function(){
								
				$("#login_1").fadeOut('1');
				setTimeout(function(){$("#login_2").show();},500);
				
				return false;
			});
	$('#quxiao').click(function(){
								 
				$("#login_2").fadeOut('1');
				
				setTimeout(function(){$("#login_1").show();},500);
				return false;
			});
						   			   
						   
						   
						   
						   
});









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

//²Ëµ¥

function menuhover() {
	var menu = document.getElementById("menu");
	var links = menu.getElementsByTagName("a");
	for(c=0; c<links.length; c++) {
		links[c].onmouseover = function() {
			for(m=0; m<links.length; m++) {
				links[m].className = '';
			}
			this.className = 'here';
		}
		links[c].onmouseout = function() {
			for(m=0; m<links.length; m++) {
				links[m].className = '';
			}
			links[0].className = 'here';
		}
	}
}

addLoadEvent(menuhover);

//µ×²¿¿ØÖÆ

function footposition() {
	if(!document.getElementById("foot")) return false;
	var foot = document.getElementById("foot");
	if(document.all) {
		if(document.body.clientHeight < document.documentElement.offsetHeight) {
			foot.style.position = 'absolute';
			foot.style.bottom = '0';
		}
	}
	if(window.opera&&navigator.userAgent.match(/opera/gi)) {
		foot.style.position = '';
		foot.style.bottom = '';
	}
	if(document.body.clientHeight < window.innerHeight) {
		foot.style.position = 'absolute';
		foot.style.bottom = '0';
	}
}

addLoadEvent(footposition);

//»ÃµÆÆ¬

function slideMouse(imgname,imgpath) {
	var banner_title = document.getElementById("banner_title");
	var imgurl = document.getElementById("imgurl");
	for(var im=0; im<imgname.length; im++) {
		imgname[im] = imgpath + imgname[im];
	}
	var links = banner_title.getElementsByTagName("a");
	for(var i=0; i<links.length; i++) {
		links[i].name = i;
		links[i].onmouseover = function() {
			clearClassName();
			this.className = "slidenow";
			imgurl.href = this.href;
			imgurl.firstChild.src = imgname[this.name];
		}
	}
}

function clearClassName() {
	var banner_title = document.getElementById("banner_title");
	var links = banner_title.getElementsByTagName("a");
	for(var j=0; j<links.length; j++) {
		links[j].className = "";
	}
}

var nowspace = 0;

function slideLoop() {
	var banner_title = document.getElementById("banner_title");
	var imgurl = document.getElementById("imgurl");
	var links = banner_title.getElementsByTagName("a");
	if(nowspace == links.length - 1) {
		nowspace = 0;
	} else {
		nowspace += 1;
	}
	clearClassName();
	imgurl.href = links[nowspace].href;
	links[nowspace].className = "slidenow";
	imgurl.firstChild.src = arguments[0][nowspace];
}
