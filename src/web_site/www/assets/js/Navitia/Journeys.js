var Journeys = function(api) {
	//console.log(api);
	this.links = api.links;
	this.publishers = api.publishers;
	this.journeys = Array();
	for (var i = 0; i < api.journeys.length; i++) {
		this.journeys.push(new Journey(api.journeys[i]));
	}
};