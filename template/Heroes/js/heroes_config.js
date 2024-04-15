var server = {
    action: function(objScroll, intLength, strMotion) {
        this.action[objScroll] = objScroll;
        this.action[objScroll + "_ypos"] = 0;
        this.action[objScroll + "_motion"] = strMotion;
        if (document.getElementById(objScroll).getElementsByTagName("li").length > intLength) {
            this.scroll[objScroll + "_tid"] = setTimeout("server.scroll('" + this.action[objScroll] + "')", 2000);
        }
    },
    scroll: function(objScroll) {
        if(document.getElementById(objScroll).getElementsByTagName("li").length <= 0) return false;
        this.scroll[objScroll] = document.getElementById(objScroll).getElementsByTagName("ul")[0];
        if (this.action[objScroll + "_motion"] == "scroll") {
            this.action[objScroll + "_ypos"] = this.action[objScroll + "_ypos"] + 1;
            this.scroll[objScroll].style.top = eval("-" + this.action[objScroll + "_ypos"]);
        }
        if (this.action[objScroll + "_motion"] == "scroll" && this.action[objScroll + "_ypos"] < 17) {
            this.scroll[objScroll + "_tid"] = setTimeout("server.scroll('" + objScroll + "')", 10);
        } else {
            var li = this.scroll[objScroll].getElementsByTagName("li")[0];
            this.banner = li.innerHTML;
            li.innerHTML = "";
            this.scroll[objScroll].removeChild(li);
            this.scroll[objScroll].innerHTML = this.scroll[objScroll].innerHTML + "<li>" + this.banner + "</li>";
            if (this.action[objScroll + "_motion"] == "scroll") {
                this.action[objScroll + "_ypos"] = 0;
                this.scroll[objScroll].style.top = this.action[objScroll + "_ypos"];
            }
            this.scroll[objScroll + "_tid"] = setTimeout("server.scroll('" + objScroll + "')", 2000);
        }
    },
    stop: function(objScroll) {
        clearTimeout(this.scroll[objScroll + "_tid"]);
    },
    layer: function(objScroll, objList, objButton) {
        if(document.getElementById(objScroll).getElementsByTagName("li").length <= 0) return false;
        var scrollEle = document.getElementById(objScroll);
        var listEle = document.getElementById(objList);
        var buttonEle = document.getElementById(objButton);
        buttonEle.src = (buttonEle.src.indexOf("open") > -1) ? buttonEle.src.replace("open", "close") : buttonEle.src.replace("close", "open");
        if (buttonEle.src.indexOf("close") > -1) {
            scrollEle.style.overflow = "visible";
            listEle.className = "open";
            server.stop(objScroll);

            if (navigator.userAgent.indexOf("MSIE 6") > -1 && navigator.userAgent.indexOf("MSIE 7") < 0) {
                if (!document.getElementById(objList + "IE6Iframe")) {
                    var ie6_ifm = document.createElement("iframe");
                    ie6_ifm.setAttribute("id", objList + "IE6Iframe");
                    ie6_ifm.style.position = "absolute";
                    ie6_ifm.style.opacity = "0";
                    ie6_ifm.style.filter = "alpha(opacity=0)";
                    ie6_ifm.style.zindex = "-1";
                    ie6_ifm.style.left = "0";
                    ie6_ifm.style.top = "0";
                    ie6_ifm.style.width = listEle.offsetWidth;
                    ie6_ifm.style.height = listEle.offsetHeight;
                    scrollEle.appendChild(ie6_ifm);
                }
            }
        } else {
            scrollEle.style.overflow = "hidden";
            listEle.className = "";
            server.scroll(objScroll);

            if (navigator.userAgent.indexOf("MSIE 6") > -1 && navigator.userAgent.indexOf("MSIE 7") < 0) {
                if (document.getElementById(objList + "IE6Iframe")) {
                    scrollEle.removeChild(document.getElementById(objList + "IE6Iframe"));
                }
            }
        }
    },
    initialize: function(objScroll, objList, objButton) {
        var scrollEle = document.getElementById(objScroll);
        var listEle = document.getElementById(objList);
        var buttonEle = document.getElementById(objButton);
        if (buttonEle.src.indexOf("open") < 0) {
            buttonEle.src = buttonEle.src.replace("close", "open");
            scrollEle.style.overflow = "hidden";
            listEle.className = "";
            server.scroll(objScroll);
        }
    },
    tabchange: function(objOpen, objClose) {
        document.getElementById(objOpen).style.display = "block";
        document.getElementById(objClose).style.display = "none";
    }
}

function check_id2()
{
if ( document.login_account.username.value == "")
{
alert("Por favor, introduzca su nombre de usuario.");
return false;
}
if ( document.login_account.pass.value == "")
{
alert("Por favor, introduzca su contraseña.");
return false;
}
if ( document.login_account.verifyinput3.value == "")
{
alert("Por favor, introduzca el código de verificación.");
return false;
}						
//return false;
document.login_account.submit();
}

<!--
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}

document.oncontextmenu=new Function("return false")
// --> 

var input = {
	login : function(el){
		el.className = "";
		el.onblur = function(){
			if(el.value=="") el.className = "on";
		}
	}
};
var clock = {
	weekDays : ["DOMINGO","LUNES","MARTES","MIERCOLES","JUEVES","VIERNES","SABADO"],
	monthNames : ["ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC"],
	serverDate : {}, // server date obj
	localDate : {}, // local date obj
	dateOffset: {}, // offset ammount
	nowDate : {}, // adjusted date
	dateString : {}, // formated
	el : {}, // element to update
	timeout : {}, // timeout handle
	init : function (date,id,interval) {
		this.calculateOffset(date);
		this.el = document.getElementById(id);
		this.updateClock(interval);
	},
	calculateOffset : function (serverDate) {
		this.serverDate = new Date(serverDate);
		this.localDate = new Date();
		this.dateOffset = this.serverDate - this.localDate;
	},
	updateClock : function (interval) {
		this.nowDate = new Date();
		this.nowDate.setTime(this.nowDate.getTime() + this.dateOffset);
		this.dateFormat(this.nowDate);
		this.el.innerHTML = this.dateString;
		var me = this; this.timeout = setTimeout(function(){me.updateClock(interval)},interval);
	},
	stopClock : function () {
		clearTimeout(this.timeout);
	},
	dateFormat : function (dateObj) {
		this.dateString = '<span>' + this.digit(dateObj.getHours()) + ':' + this.digit(dateObj.getMinutes()) + ':' + this.digit(dateObj.getSeconds()) + '</span>';
		this.dateString += ' ';
		this.dateString += this.monthNames[dateObj.getMonth()] + ' ';
		this.dateString += this.digit(dateObj.getDate()) + ', ';
		this.dateString += dateObj.getFullYear();
	},
	digit : function (str) {
		str = String(str);
		str = str.length == 1 ? "0" + str : str;
		return str;
	}
};		

// Drag Technique
var Drag={keeponscreen:true,init:function(o,oRoot,minX,maxX,minY,maxY,bSwapHorzRef,bSwapVertRef,fXMapper,fYMapper){o.onmousedown=Drag.start;o.onmouseover=Drag.cursorchange;o.hmode=bSwapHorzRef?false:true;o.vmode=bSwapVertRef?false:true;o.root=oRoot&&oRoot!=null?oRoot:o;if(o.hmode&&isNaN(parseInt(o.root.style.left)))o.root.style.left="0px";if(o.vmode&&isNaN(parseInt(o.root.style.top)))o.root.style.top="0px";if(!o.hmode&&isNaN(parseInt(o.root.style.right)))o.root.style.right="0px";if(!o.vmode&&isNaN(parseInt(o.root.style.bottom)))o.root.style.bottom="0px";o.minX=typeof minX!='undefined'?minX:null;o.minY=typeof minY!='undefined'?minY:null;o.maxX=typeof maxX!='undefined'?maxX:null;o.maxY=typeof maxY!='undefined'?maxY:null;o.xMapper=fXMapper?fXMapper:null;o.yMapper=fYMapper?fYMapper:null;if(Drag.keeponscreen){Drag.my_width=0;Drag.my_height=0;if(typeof(window.innerWidth)=='number'){Drag.my_width=window.innerWidth;Drag.my_height=window.innerHeight;}else if(document.documentElement&&(document.documentElement.clientWidth||document.documentElement.clientHeight)){Drag.my_width=document.documentElement.clientWidth;Drag.my_height=document.documentElement.clientHeight;}else if(document.body&&(document.body.clientWidth||document.body.clientHeight)){Drag.my_width=document.body.clientWidth;Drag.my_height=document.body.clientHeight;}}o.root.onDragStart=new Function();o.root.onDragEnd=new Function();o.root.onDrag=new Function();},cursorchange:function(e){var o=Drag.obj=this;/*o.style.cursor='move';*/},start:function(e){var o=Drag.obj=this;e=Drag.fixE(e);var y=parseInt(o.vmode?o.root.style.top:o.root.style.bottom);var x=parseInt(o.hmode?o.root.style.left:o.root.style.right);o.root.onDragStart(x,y);o.lastMouseX=e.clientX;o.lastMouseY=e.clientY;if(o.hmode){if(o.minX!=null)o.minMouseX=e.clientX-x+o.minX;if(o.maxX!=null)o.maxMouseX=o.minMouseX+o.maxX-o.minX;}else{if(o.minX!=null)o.maxMouseX=-o.minX+e.clientX+x;if(o.maxX!=null)o.minMouseX=-o.maxX+e.clientX+x;}if(o.vmode){if(o.minY!=null)o.minMouseY=e.clientY-y+o.minY;if(o.maxY!=null)o.maxMouseY=o.minMouseY+o.maxY-o.minY;}else{if(o.minY!=null)o.maxMouseY=-o.minY+e.clientY+y;if(o.maxY!=null)o.minMouseY=-o.maxY+e.clientY+y;}document.onmousemove=Drag.drag;document.onmouseup=Drag.end;return false;},drag:function(e){e=Drag.fixE(e);var o=Drag.obj;var ey=e.clientY;var ex=e.clientX;var y=parseInt(o.vmode?o.root.style.top:o.root.style.bottom);var x=parseInt(o.hmode?o.root.style.left:o.root.style.right);var nx,ny;if(o.minX!=null)ex=o.hmode?Math.max(ex,o.minMouseX):Math.min(ex,o.maxMouseX);if(o.maxX!=null)ex=o.hmode?Math.min(ex,o.maxMouseX):Math.max(ex,o.minMouseX);if(o.minY!=null)ey=o.vmode?Math.max(ey,o.minMouseY):Math.min(ey,o.maxMouseY);if(o.maxY!=null)ey=o.vmode?Math.min(ey,o.maxMouseY):Math.max(ey,o.minMouseY);nx=x+((ex-o.lastMouseX)*(o.hmode?1:-1));ny=y+((ey-o.lastMouseY)*(o.vmode?1:-1));if(o.xMapper)nx=o.xMapper(y);else if(o.yMapper)ny=o.yMapper(x);if(Drag.keeponscreen){ny=ny<0?0:ny;nx=nx<0?0:nx;if(Drag.my_width){nx=nx>Drag.my_width-parseInt(o.root.style.width)?Drag.my_width-parseInt(o.root.style.width):nx;}}Drag.obj.root.style[o.hmode?"left":"right"]=nx+"px";Drag.obj.root.style[o.vmode?"top":"bottom"]=ny+"px";Drag.obj.lastMouseX=ex;Drag.obj.lastMouseY=ey;Drag.obj.root.onDrag(nx,ny);return false;},end:function(){document.onmousemove=null;document.onmouseup=null;Drag.obj.root.onDragEnd(parseInt(Drag.obj.root.style[Drag.obj.hmode?"left":"right"]),parseInt(Drag.obj.root.style[Drag.obj.vmode?"top":"bottom"]));var o=Drag.obj;fy=parseInt(o.root.style.top);fx=parseInt(o.root.style.left);if(Drag.cookiename){try{ipsclass.my_setcookie(Drag.cookiename,fx+','+fy,1);}catch(e){}}Drag.obj=null;},addEvent:function(elm,evType,fn,useCapture){if(elm.addEventListener){elm.addEventListener(evType,fn,useCapture);return true;}else if(elm.attachEvent){var r=elm.attachEvent('on'+evType,fn);return r;}else{elm['on'+evType]=fn;}},fixE:function(e){if(typeof e=='undefined')e=window.event;if(typeof e.layerX=='undefined')e.layerX=e.offsetX;if(typeof e.layerY=='undefined')e.layerY=e.offsetY;return e;}};

// Fade Anything Technique
function window_fade(id, opacStart, opacEnd, millisec) {
	var speed = Math.round(millisec / 100);
	var timer = 0;

	if(opacStart > opacEnd) {
		for(i = opacStart; i >= opacEnd; i--) {
			setTimeout("changeOpac(" + i + ",'" + id + "')",(timer * speed));
			timer++;
		}
	} else if(opacStart < opacEnd) {
		for(i = opacStart; i <= opacEnd; i++)
			{
			setTimeout("changeOpac(" + i + ",'" + id + "')",(timer * speed));
			timer++;
		}
	}
}
function changeOpac(opacity, id) {
	var object = document.getElementById(id).style;
	if(opacity == 0)
	{ object.display = 'none'; }
	else
	{ object.display = 'block'; }
	object.opacity = (opacity / 100);
	object.MozOpacity = (opacity / 100);
	object.KhtmlOpacity = (opacity / 100);
	object.filter = "alpha(opacity=" + opacity + ")";
} 

function layer_open(idname) {
	document.getElementById(idname).style.display="block";
}
function layer_close(idname) {
	document.getElementById(idname).style.display="none";
}
