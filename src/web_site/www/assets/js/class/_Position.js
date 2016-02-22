var Position_ = function(options) {
	console.log(options);
	this.navitia = options.navitia;
	this.map = options.map;
	this.name = options.name;
	this.label = options.label;
	this.icon = options.icon;

	this.$div = $(options.div);
	this.$input = this.$div.find('input');
	this.api = false;

	//console.log(this);
};

Position_.prototype.getLatLng = function() {
	if (this.api) {
		return new L.LatLng(this.api.coord.lat, this.api.coord.lon);
	} else {return false;}
};

Position_.prototype.getCoord = function() {
	if (this.api) {return this.api.coord;} else {return false;}
};

Position_.prototype.getId = function() {
	if (this.api) {return this.api.id;} else {return false;}
};

Position_.prototype.getRegions = function() {
	if (this.api) {return this.api.regions;} else {return false;}
};

Position_.prototype.getApi = function() {
	return this.api;
};

Position_.prototype.loadLatlng = function(latlon) {
	var that = this;
	that.$div.addClass('load');
	latlng = {lat : latlon.lat, lng : latlon.lng};
	that.navitia.coord(latlng, function(retour) {
		var r = JSON.parse(retour);
		that.api = r.api;
		that.$input.val(that.api.name);
		that.marker = L.marker(that.getLatLng(), {icon: that.icon});
		that.marker.addTo(that.map).bindPopup(that.label);
		that.$div.removeClass('load');
	});
};