<?php

/**
* Class to manage sections
*/
class Section extends Hydrate {
	protected $type = 'public_transport';
	protected $mode = 'none';
	protected $duration = 0;
	protected $departure_date_time = 0;
	protected $arrival_date_time = 0;
	protected $from;
	protected $to;
	protected $links = array();
	protected $geojson = '';
	protected $transferType = 'none';
	protected $stop_date_times = array();
	protected $displayInformations;
	protected $additionnalInformations = array();

	protected static $SectionType = array('public_transport', 'street_network', 'waiting', 'stay_in', 'transfer', 'crow_fly', 'on_demand_transport', 'bss_rent', 'bss_put_back', 'boarding', 'landing');
	protected static $SectionMode = array('none', 'Walking', 'Bike', 'Car');
	protected static $SectionTransferType = array('none', 'walking', 'guaranteed', 'extension');

	/**
		CONSTRUCTOR
	**/
	public function __construct($params = false) {
		$this->from = new Position();
		$this->to = new Position();
		$this->displayInformations = new DisplayInformations();
		if ($params != false) {
			$this->hydrate($params);
		}
	}

	/**
		LOADERS
	**/
	public function load_api($api) {
		$this->setType($api['type']);
		if (array_key_exists('mode', $api)) {$this->setMode($api['mode']);}
		$this->setDuration($api['duration']);
		$this->setDeparture_date_time($api['departure_date_time']);
		$this->setArrival_date_time($api['arrival_date_time']);
		$this->setFrom($api['from'], 'api');
		$this->setTo($api['to'], 'api');
		foreach ($api['links'] as $link) {
			$this->links[] = $link;
		}
		$this->setGeojson($api['geojson']);
		if (array_key_exists('transfer_type', $api)) {$this->setTransferType($api['transfer_type']);}
		if (array_key_exists('stop_date_times', $api)) {$this->setStop_date_times($api['stop_date_times']);}
		if (array_key_exists('display_informations', $api)) {$this->setDisplayInformations($api['display_informations'], 'api');}
		if (array_key_exists('additionnal_informations', $api)) {$this->setAdditionnalInformations($api['additionnal_informations']);}
	}

	/**
		SETTERS
	**/
	public function setType($type) {
		$this->type = $type;
	}

	public function setMode($mode) {
		$this->mode = $mode;
	}

	public function setDuration($duration) {
		$this->duration = $duration;
	}

	public function setDeparture_date_time($departure_date_time) {
		$this->departure_date_time = $departure_date_time;
	}

	public function setArrival_date_time($arrival_date_time) {
		$this->arrival_date_time = $arrival_date_time;
	}

	public function setFrom($f, $type = true) {
		if ($type === true) {
			$this->from = $f;
		} elseif ($type == 'api') {
			$from = new Position();
			$from->load_api($f);
			$this->from = $from;
		}
	}

	public function setTo($t, $type = true) {
		if ($type === true) {
			$this->to = $t;
		} elseif ($type == 'api') {
			$to = new Position();
			$to->load_api($t);
			$this->to = $to;
		}
	}

	public function setLinks($links) {
		$this->links = $links;
	}

	public function setGeojson($geojson) {
		$this->geojson = $geojson;
	}

	public function setTransferType($transferType) {
		$this->transferType = $transferType;
	}

	public function setStop_date_times($stop_date_times) {
		$this->stop_date_times = $stop_date_times;
	}

	public function setDisplayInformations($di, $type = true) {
		if ($type === true) {
			$this->displayInformations = $di;
		} elseif ($type == 'api') {
			$displayInformations = new DisplayInformations();
			$displayInformations->load_api($di);
			$this->displayInformations = $displayInformations;
		}
	}

	public function setAdditionnalInformations($additionnalInformations) {
		$this->additionnalInformations = $additionnalInformations;
	}

	/**
		GETTERS
	**/
	public function getType() {
		return $this->type;
	}

	public function getMode() {
		return $this->mode;
	}

	public function getDuration() {
		return $this->duration;
	}

	public function getDeparture_date_time() {
		return $this->departure_date_time;
	}

	public function getArrival_date_time() {
		return $this->arrival_date_time;
	}

	public function getFrom() {
		return $this->from;
	}

	public function getTo() {
		return $this->to;
	}

	public function getLinks() {
		return $this->links;
	}

	public function getGeojson() {
		return $this->geojson;
	}

	public function getTransferType() {
		return $this->transferType;
	}

	public function getStop_date_times() {
		return $this->stop_date_times;
	}

	public function getDisplayInformations() {
		return $this->displayInformations;
	}

	public function getAdditionnalInformations() {
		return $this->additionnalInformations;
	}

	/**
		JSON
	**/
	public function getJSON() {
		return array(
			'type' => $this->type,
			'mode' => $this->mode,
			'duration' => $this->duration,
			'departure_date_time' => $this->departure_date_time,
			'arrival_date_time' => $this->arrival_date_time,
			'from' => $this->from,
			'to' => $this->to,
			'links' => $this->links,
			'geojson' => $this->geojson,
			'transferType' => $this->transferType,
			'stop_date_times' => $this->stop_date_times,
			'displayInformations' => $this->displayInformations->getJSON(),
			'additionnalInformations' => $this->additionnalInformations
		);
	}
}

?>

?>