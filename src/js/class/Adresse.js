var Adresse = function(navitia, name, label, icon) {
	this.navitia = navitia;
	this.name = name; // to / from
	this.label = label; // Départ / Arrivée
	this.icon = icon; // marker-icon-red / marker-icon-green

	this.$input = $('.'+name+' input');
	this.latlng = false;
	this.id = false;
};

Adresse.prototype.getLatlng = function() {
	return this.latlng;
};

Adresse.prototype.getId = function() {
	return this.id;
};

Adresse.prototype.setLatlng = function(latlng) {
	var that = this;
	that.latlng = latlng;
	that.marker = L.marker(latlng, {icon: that.icon});
	that.marker.addTo(map).bindPopup(that.label);
	that.navitia.coord(latlng, function(retour) {
		var r = JSON.parse(retour);
		that.setId(r.api.address.id);
		that.$input.val(r.api.address.label);
	});
};

Adresse.prototype.setId = function(id) {
	this.id = id;
};