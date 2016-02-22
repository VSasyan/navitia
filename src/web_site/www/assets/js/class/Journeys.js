var Journeys = function(options) {
	this.navitia = options.navitia;
	this.map = options.map;
	this.$datetime_represents = $(options.datetime_represents);
	this.$date = $(options.date);
	this.$time = $(options.time);
	this.$order_by = $(options.order_by);
	this.$go = $(options.go);
	this.$results = $(options.results);

	// Position object :
	var params = {
		map : this.map,
		navitia : this.navitia,
		name : 'to',
		label : 'Arrivée',
		div : options.to,
		icon : L.icon({
			iconUrl: uri_server + 'assets/js/images/marker-icon-red.png',
			iconRetinaUrl: uri_server + 'assets/js/images/marker-icon-red-x2.png'
		})
	};
	this.to = new Position(params);

	var params = {
		map : this.map,
		navitia : this.navitia,
		name : 'from',
		label : 'Départ',
		div : options.from,
		icon : L.icon({
			iconUrl: uri_server + 'assets/js/images/marker-icon-green.png',
			iconRetinaUrl: uri_server + 'assets/js/images/marker-icon-green-x2.png'
		})
	};
	this.from = new Position(params);

	// DOM Functions :
	var that = this;
	this.$go.click(function() {that.go();});
};

Journeys.prototype.go = function() {
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

	that.navitia.journeys(params, that.$order_by.val(), function(retour) {
		var r = JSON.parse(retour);
		that.$results.html(r.html).removeClass('load');
		that.$results.find('.journey .sumup').click(function() {
			that.$results.find('.journey').removeClass('showed');
			$(this).parent().addClass('showed');
			that.map.invalidateSize();
		});
		that.$results.find('.journey:eq(0)').addClass('showed');
		that.map.invalidateSize();
		$('html, body').animate({
			scrollTop: that.$results.offset().top
		}, 1000);
	});
};

Journeys.prototype.LatLngMap = function(e) {
	if (this.from.getLatLng() === false) {this.from.loadLatlng(e.latlng);} else {this.to.loadLatlng(e.latlng);}
}

Journeys.prototype.getCurrentPosition = function(pos) {
	var latlng = new L.LatLng(pos.coords.latitude, pos.coords.longitude);
	this.from.loadLatlng(latlng);
	this.regions = this.from.getRegions();
	this.map.panTo(latlng);
}
