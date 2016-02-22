var Position = function(api) {
	//console.log(api);
	this.name = api.name;
	this.id = api.id;
	this.regions = api.regions;
	this.administration = api.administration;
	this.coord = new Coord(api.coord);
};