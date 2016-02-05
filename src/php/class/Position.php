<?php

/**
* Class to manage the coord request and get position
* URL : https://api.navitia.io/v1/coord/2.37691590563854;48.8467597481174
*/
class Position extends Hydrate {
	protected $house_number = "";
	protected $name = "";
	protected $coord;
	protected $region = "";

	/**
		CONSTRUCTOR
	**/
	public function __construct($params = false) {
		if ($params != false) {
			$this->hydrate($params);
		} else {
			$this->coord = new Coord();
		}
	}

	/**
		LOADERS
	**/
	public function load_uri($uri) {
		$req = 'https://' . KEY . '@api.navitia.io/v1/coord/' . $uri;
		$data = file_get_contents($req, false);
		$api = json_decode($data, true);
		$this->load_api($api);
	}

	public function load_api($api) {
		if (array_key_exists('embedded_type', $api)) {
			if ($api['embedded_type'] == 'address') {
				$params = array(
					'name' => $api['address']['house_number'] . ', ' . $api['address']['name'],
					'coord' => new Coord($api['address']['coord']),
					'region' => $api['address']['administrative_regions'][0]['name'],
					'id' => $api['id']
				);
			} elseif ($api['embedded_type'] == 'stop_point') {
				$params = array(
					'house_number' => '',
					'name' => $api['stop_point']['name'],
					'coord' => new Coord($api['stop_point']['coord']),
					'region' => $api['stop_point']['administrative_regions'][0]['name'],
					'id' => $api['id']
				);
			}

			$this->hydrate($params);
		} else {
			echo 'ERROR_Position_load_api: |' . json_encode($api) . '|';
		}
	}

	/**
		SETTERS
	**/
	public function setHouse_number($house_number) {
		$this->house_number = $house_number;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function setCoord($coord) {
		$this->coord = $coord;
	}

	public function setRegion($region) {
		$this->region = $region;
	}

	/**
		GETTERS
	**/
	public function getHouse_number() {
		return $this->house_number;
	}

	public function getName() {
		return $this->name;
	}

	public function getCoord() {
		return $this->coord;
	}

	public function getRegion() {
		return $this->region;
	}

	/**
		JSON
	**/
	public function getJSON() {
		return array(
			'house_number' => $this->house_number,
			'name' => $this->name,
			'coord' => $this->coord,
			'region' => $this->region
		);
	}
}

?>