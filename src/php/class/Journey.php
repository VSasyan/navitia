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
	protected $from;
	protected $to;
	protected $links = array();

	/**
		CONSTRUCTOR
	**/
	public function __construct($params = false) {
		if ($params != false) {
			$this->hydrate($params);
		} else {
			$this->from = new Position();
			$this->to = new Position();
		}
	}

	/**
		LOADERS
	**/
	public function load($uri) {
		$req = 'https://' . KEY . '@api.navitia.io/v1/coord/' . $uri;
		$data = file_get_contents($req, false);
		$api = json_decode($data, true);

		foreach ($api['links'] as $link) {
			$this->links[$link['type']] = $link['href'];
		}
		$this->setDeparture_date_time($api[]);
		$this->setArrival_date_time($api[]);
	}

	/**
		SETTERS
	**/
	public setDuration($duration) {
		$this->duration = $duration;
	}

	public setNb_transfers($nb_transfers) {
		$this->nb_transfers = $nb_transfers;
	}

	public setDeparture_date_time($departure_date_time) {
		$this->departure_date_time = $departure_date_time;
	}

	public setArrival_date_time($arrival_date_time) {
		$this->arrival_date_time = $arrival_date_time;
	}

	public setSections($sections) {
		$this->sections = $sections;
	}

	public setFrom($from) {
		$this->from = $from;
	}

	public setTo($to) {
		$this->to = $to;
	}

	public setLinks($links) {
		$this->links = $links;
	}

	/**
		ADDERS
	**/
	public addSection($section) {
		$this->sections[] = $section;
	}

	/**
		GETTERS
	**/
	public getDuration() {
		return $this->duration;
	}

	public getNb_transfers() {
		return $this->nb_transfers;
	}

	public getDeparture_date_time() {
		return $this->departure_date_time;
	}

	public getArrival_date_time() {
		return $this->arrival_date_time;
	}

	public getSections() {
		return $this->sections;
	}

	public getFrom() {
		return $this->from;
	}

	public getTo() {
		return $this->to;
	}

	public getLinks() {
		return $this->links;
	}

	/**
		JSON
	**/
	public getJSON() {
		return array(
			'duration' => $this->duration,
			'nb_transfers' => $this->nb_transfers,
			'departure_date_time' => $this->departure_date_time,
			'arrival_date_time' => $this->arrival_date_time,
			'sections' => $this->sections,
			'from' => $this->from,
			'to' => $this->to,
			'links' => $this->links
		);
	}
}

?>

?>