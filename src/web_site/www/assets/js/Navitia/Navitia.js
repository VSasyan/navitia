var Navitia = function(options) {
	this.proxy = options.proxy;
	this.navitia_ = options.navitia_;
	this.map = options.map;
	this.$datetime_represents = $(options.datetime_represents);
	this.$date = $(options.date);
	this.$time = $(options.time);
	this.$order_by = $(options.order_by);
	this.$go = $(options.go);
	this.$results = $(options.results);
	this.journeys = false;

	// Position object :
	var params = {
		map : this.map,
		navitia : this.navitia_,
		name : 'to',
		label : 'Arrivée',
		div : options.to,
		icon : L.icon({
			iconUrl: 'http://localhost/navitia/assets/js/images/marker-icon-red.png',
			iconRetinaUrl: 'http://localhost/navitia/assets/js/images/marker-icon-red-x2.png'
		})
	};
	this.to = new Position_(params);

	var params = {
		map : this.map,
		navitia : this.navitia_,
		name : 'from',
		label : 'Départ',
		div : options.from,
		icon : L.icon({
			iconUrl: 'http://localhost/navitia/assets/js/images/marker-icon-green.png',
			iconRetinaUrl: 'http://localhost/navitia/assets/js/images/marker-icon-green-x2.png'
		})
	};
	this.from = new Position_(params);

	// DOM Functions :
	var that = this;
	this.$go.click(function() {that.go();});
};

Navitia.prototype.go = function() {
	if (this.from.getId() === false || this.to.getId() === false) {return;}
	var that = this;
	that.$results.html('<div class="loader"/>').addClass('load');

	var date = that.$date.val().split('/');
	var time = that.$time.val().split(':');

	var params = {
		from : that.from.getId(),
		to : that.to.getId(),
		datetime : date[2] + date[1] + date[0] + 'T' + time[0] + time[1],
		datetime_represents : that.$datetime_represents.val()
	};

	that.navitia_.journeys(params, that.$order_by.val(), function(retour) {
		that.clearMap();
		var r = JSON.parse(retour);
		that.journeys = new Journeys(r.api);
		that.$results.html(r.html).removeClass('load');
		that.map.invalidateSize();
		$('html, body').animate({
			scrollTop: that.$results.offset().top
		}, 1000);
		that.$results.find('.journey .sumup').click(function() {
			that.$results.find('.journey').removeClass('showed');
			that.setJourney($(this).parent().data('nb'));
		});
		that.setJourney(0);
	});
};

Navitia.prototype.LatLngMap = function(e) {
	if (this.from.getLatLng() === false) {this.from.loadLatlng(e.latlng);} else {this.to.loadLatlng(e.latlng);}
}

Navitia.prototype.getCurrentPosition = function(pos) {
	var latlng = new L.LatLng(pos.coords.latitude, pos.coords.longitude);
	this.from.loadLatlng(latlng);
	this.regions = this.from.getRegions();
	this.map.panTo(latlng);
}

Navitia.prototype.coord = function(latlng, callback) {
	// https://api.navitia.io/v1/coord/{lat};{lng}
	//var url = this.proxy + encodeURIComponent('coord/' + latlng.lng + ';' + latlng.lat);
	var url = this.proxy + 'position/' + latlng.lng + ';' + latlng.lat;
	$.get({
		url : url,
		type : 'GET',
		success : callback
	});
};

Navitia.prototype.journeys = function(params, order_by, callback) {
	//	https://api.navitia.io/v1/journeys?from={resource_id_1}&to={resource_id_2}&datetime={date_time_to_leave}
	var url = this.proxy + 'journeys/' + btoa(JSON.stringify(params)) + '/' + order_by;
	console.log(url);
	$.get({
		url : url,
		type : 'GET',
		success : callback
	});
};

Navitia.prototype.setJourney = function(n) {
	this.$results.find('.journey').removeClass('showed');
	this.$results.find('.journey:eq(' + n + ')').addClass('showed');
	this.map.invalidateSize();
	this.showJourney(n);
}

Navitia.prototype.showJourney = function(n) {
	var that = this;
	$.each(this.journeys.journeys, function(i,j) {
		j.hide(that.map);
	});
	this.journeys.journeys[n].show(that.map);	
}

Navitia.prototype.clearMap = function() {
	var that = this;
	$.each(this.journeys.journeys, function(i,j) {
		j.hide(that.map);
	});
}