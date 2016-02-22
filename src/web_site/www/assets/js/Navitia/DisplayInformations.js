var DisplayInformations = function(api) {
	//console.log(api);
	this.network = api.network;
	this.direction = api.direction;
	this.commercialMode = api.commercialMode;
	this.physicalMode = api.physicalMode;
	this.label = api.label;
	this.color = api.color;
	this.code = api.code;
	this.description = api.description;
	this.equipments = api.equipments;
};

DisplayInformations.prototype.getColor = function() {
	if (this.color != '') {return '#' + this.color} else {return '#000000';}
}