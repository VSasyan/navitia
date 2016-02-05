<?php

/**
* Class to manage journeys
* URL : https://api.navitia.io/v1/journeys?from=2.31021881104%3B48.8662580532&to=2.37064361572%3B48.8669355812&datetime=20160209T0830
*/
class Journey extends Hydrate {
	protected $duration = 0;
	protected $nb_transfers = 0;
	protected $departure_date_time = 0;
	protected $arrival_date_time = 0;
	protected $sections = array();

	/**
		CONSTRUCTOR
	**/
	public function __construct($params = false) {
		if ($params != false) {
			$this->hydrate($params);
		}
	}

	/**
		LOADERS
	**/
	public function load_api($api) {
		$this->setDuration($api['duration']);
		$this->setNb_transfers($api['nb_transfers']);
		$this->setDeparture_date_time($api['departure_date_time']);
		$this->setArrival_date_time($api['arrival_date_time']);
		foreach ($api['sections'] as $s) {
			$this->addSection($s, 'api');
		}
	}

	/**
		SETTERS
	**/
	public function setDuration($duration) {
		$this->duration = $duration;
	}

	public function setNb_transfers($nb_transfers) {
		$this->nb_transfers = $nb_transfers;
	}

	public function setDeparture_date_time($departure_date_time) {
		$this->departure_date_time = $departure_date_time;
	}

	public function setArrival_date_time($arrival_date_time) {
		$this->arrival_date_time = $arrival_date_time;
	}

	public function setSections($sections) {
		$this->sections = $sections;
	}

	/**
		ADDERS
	**/
	public function addSection($s, $type = true) {
		if ($type === true) {
			$this->sections[] = $s;
		} elseif ($type == 'api') {
			$section = new Section();
			$section->load_api($s);
			$this->sections[] = $section;
		}
	}

	/**
		GETTERS
	**/
	public function getDuration() {
		return $this->duration;
	}

	public function getNb_transfers() {
		return $this->nb_transfers;
	}

	public function getDeparture_date_time() {
		return $this->departure_date_time;
	}

	public function getArrival_date_time() {
		return $this->arrival_date_time;
	}

	public function getSections() {
		return $this->sections;
	}

	/**
		JSON
	**/
	public function getSectionsJSON() {
		$sections = array();
		foreach ($this->sections as $section) {$sections[] = $section->getJSON();}
		return $sections;
	}
	public function getJSON() {
		return array(
			'duration' => $this->duration,
			'nb_transfers' => $this->nb_transfers,
			'departure_date_time' => $this->departure_date_time,
			'arrival_date_time' => $this->arrival_date_time,
			'sections' => $this->getSectionsJSON()
		);
	}
}

?>

?>