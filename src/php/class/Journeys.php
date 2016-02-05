<?php

/**
* Class to manage journeys
* URL : https://api.navitia.io/v1/journeys?from=2.31021881104%3B48.8662580532&to=2.37064361572%3B48.8669355812&datetime=20160209T0830
*/
class Journeys extends Hydrate {
	protected $links = array();
	protected $journeys = array();

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
	public function load_uri($uri) {
		$uri = 'from=2.31021881104%3B48.8662580532&to=2.37064361572%3B48.8669355812&datetime=20160209T0830';
		$req = 'https://' . KEY . '@api.navitia.io/v1/journeys?' . $uri;
		$data = file_get_contents($req, false);
		//echo($data);
		$api = json_decode($data, true);

		foreach ($api['links'] as $link) {
			$this->links[$link['type']] = $link['href'];
		}
		foreach ($api['journeys'] as $j) {
		//print_r($j);
			$journey = new Journey();
			$journey->load_api($j);
			$this->journeys[] = $journey;
		}
	}

	/**
		SETTERS
	**/
	public function setLinks($links) {
		$this->links = $links;
	}

	public function setJourneys($journeys) {
		$this->journeys = $journeys;
	}

	/**
		GETTERS
	**/
	public function getLinks() {
		return $this->links;
	}

	public function getJourneys() {
		return $this->journeys;
	}

	/**
		JSON
	**/
	public function getJourneysJSON() {
		$journeys = array();
		foreach ($this->journeys as $journey) {$journeys[] = $journey->getJSON();}
		return $journeys;
	}

	public function getJSON() {
		return array(
			'links' => $this->links,
			'journeys' => $this->getJourneysJSON()
		);
	}
}

?>

?>