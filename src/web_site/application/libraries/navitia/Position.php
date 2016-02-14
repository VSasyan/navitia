<?php

/**
* Class to manage the coord request and get position
* URL : https://api.navitia.io/v1/coord/2.37691590563854;48.8467597481174
*/
class Position extends Hydrate {
	protected $name = "";
	protected $coord;
	protected $id;
	protected $regions = array();
	protected $administration = "";

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
		$req = 'https://' . NAVITIA_KEY . '@api.navitia.io/v1/coord/' . $uri;
		$data = file_get_contents($req, false);
		$api = json_decode($data, true);
		$this->load_api($api);
	}

	public function load_api($api) {

		if (array_key_exists('embedded_type', $api)) {
			$type = $api['embedded_type'];
		} elseif (array_key_exists('address', $api)) {
			$type = 'address';
			$api['id'] = $api['address']['id'];
		} else {
			echo 'ERROR_Position_load_api: |' . json_encode($api) . '|';
			return false;
		}
		if ($type == 'address') {
			$hn = $api['address']['house_number'];
			$params = array(
				'name' => ($hn != 0 ? $hn . ', ' : '') . $api['address']['name'],
				'coord' => new Coord($api['address']['coord']),
				'administration' => $api['address']['administrative_regions'][0]['name'],
				'id' => $api['id']
			);
		} elseif ($type == 'stop_point') {
			$params = array(
				'name' => $api['stop_point']['name'],
				'coord' => new Coord($api['stop_point']['coord']),
				'administration' => $api['stop_point']['administrative_regions'][0]['name'],
				'id' => $api['id']
			);
		} else {return false;}

		$this->hydrate($params);

		if (array_key_exists('regions', $api)) {$this->setRegions($api['regions']);}
	}

	/**
		SETTERS
	**/
	public function setName($name) {
		$this->name = $name;
	}

	public function setCoord($coord) {
		$this->coord = $coord;
	}

	public function setAdministration($administration) {
		$this->administration = $administration;
	}

	public function setRegions($regions) {
		$this->regions = $regions;
	}

	public function setId($id) {
		$this->id = $id;
	}

	/**
		GETTERS
	**/
	public function getName() {
		return $this->name;
	}

	public function getCoord() {
		return $this->coord;
	}

	public function getAdministration() {
		return $this->administration;
	}

	public function getRegions() {
		return $this->regions;
	}

	public function getId() {
		return $this->id;
	}

	/**
		JSON
	**/
	public function getJSON() {
		return array(
			'name' => $this->name,
			'coord' => $this->coord,
			'administration' => $this->administration,
			'regions' => $this->regions,
			'id' => $this->id
		);
	}

	public function toJSON() {
		return json_encode($this->getJSON());
	}
}

?>