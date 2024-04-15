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
		this.dateString = '' + this.digit(dateObj.getHours()) + ':' + this.digit(dateObj.getMinutes()) + ':' + this.digit(dateObj.getSeconds()) + '';
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

var clock2 = {
	weekDays : ["Dom","Lun","Mar","Mie","Jue","Vie","Sab"],
	monthNames : ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],
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
		this.dateString = '' + this.digit(dateObj.getHours()) + ':' + this.digit(dateObj.getMinutes()) + ':' + this.digit(dateObj.getSeconds()) + '';
		this.dateString += ' ';
		this.dateString += this.weekDays[dateObj.getDay()] + ' ';
		this.dateString += this.monthNames[dateObj.getMonth()] + ' ';
		this.dateString += this.digit(dateObj.getDate()) + '';

	},
	digit : function (str) {
		str = String(str);
		str = str.length == 1 ? "0" + str : str;
		return str;
	}
};		