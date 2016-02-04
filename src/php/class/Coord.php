<?php

/**
* 
*/
class Coord extends Hydrate {
	protected $lat = 0;
	protected $lng = 0;

	/**
		CONSTRUCTORS
	**/
	public function __construct($lat, $lng) {
		$this->lat = $lat;
		$this->lng = $lng;
	}

	public function __construct($coor) {
		$this->lat = $coor['lat'];
		$this->lng = $coor['lng'];
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