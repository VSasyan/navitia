<?php

/**
* Class to manage coordinates
*/
class Coord extends Hydrate {
	public $lat = 0;
	public $lon = 0;

	/**
		CONSTRUCTOR
	**/
	public function __construct($params = false) {
		if ($params != false) {
			$this->hydrate($params);
		}
	}

	/**
		SETTERS
	**/
	public function setLat($lat) {
		$this->lat = $lat;
	}

	public function setLon($lon) {
		$this->lon = $lon;
	}

	/**
		GETTERS
	**/
	public function getLat() {
		return $this->lat;
	}

	public function getLon() {
		return $this->lon;
	}

	/**
		JSON
	**/
	public function getJSON() {
		return array(
			'lat' => $this->lat,
			'lon' => $this->lon
		);
	}
}

?>