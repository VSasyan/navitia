<?php

/**
* 
* URL : https://api.navitia.io/v1/coord/2.37691590563854;48.8467597481174
*/
class Position extends Hydrate {
	protected $house_number = "";
	protected $name = "";
	protected $coord = new Coord();
	protected $region = "";

	public function __construct() {
		if (!empty($valeurs)) {
			$this->hydrate($valeurs);
		}
	}

	/**
		CONSTRUCTORS
	**/
	public function __construct(Coor $coor) {
		
	}

	public function __construct($lat, $lng) {
		$this->lat = $lat;
		$this->lng = $lng;
	}

	/**
		GETTERS
	**/
	public getLat() {
		return $this->lat;
	}

	public getLat() {
		return $this->lng;
	}

	/**
		JSON
	**/
	public getJSON() {
		return array(
			'lat' => $this->lat
			'lng' => $this->lng
		);
	}
}

?>