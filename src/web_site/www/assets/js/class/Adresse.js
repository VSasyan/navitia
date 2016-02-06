var Adresse = function(navitia, name, label, icon) {
	this.navitia = navitia;
	this.name = name; // to / from
	this.label = label; // Départ / Arrivée
	this.icon = icon; // marker-icon-red / marker-icon-green

	this.$input = $('.'+name+' input');
	this.$div = $('div.adresse.'+name);
	this.latlng = false;
	this.id = false;
};

Adresse.prototype.getLatlng = function() {
	return this.latlng;
};

Adresse.prototype.getId = function() {
	return this.id;
};

Adresse.prototype.setLatlng = function(latlon) {
	var that = this;
	that.latlng = {lat : latlon.lat, lng : latlon.lng};
	that.marker = L.marker(that.latlng, {icon: that.icon});
	that.marker.addTo(map).bindPopup(that.label);
	that.navitia.coord(that.latlng, function(retour) {
		var r = JSON.parse(retour);
		that.$input.val(r.api.name);
		that.$div.removeClass('load');
	});
	that.$div.addClass('load');
	that.id = that.latlng.lng + ';' + that.latlng.lat;
};