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
	protected $from = new Position();
	protected $to = new Position();
	protected $links = array();
	protected $geojson = '';
	protected $transferType = 'none';
	protected $stop_date_times = array();
	protected $displayInformations = new DisplayInformations();
	protected $additionnalInformations = array();

	const protected $SectionType = array('public_transport', 'street_network', 'waiting', 'stay_in', 'transfer', 'crow_fly', 'on_demand_transport', 'bss_rent', 'bss_put_back', 'boarding', 'landing');
	const protected $SectionMode = array('none', 'Walking', 'Bike', 'Car');
	const protected $SectionTransferType = array('none', 'walking', 'guaranteed', 'extension');

	/**
		CONSTRUCTORS
	**/
	public function __construct($lat, $lng) {
		$this->lat = $lat;
		$this->lng = $lng;
	}

	/**
		SETTERS
	**/
	public setLat($type) {
		$this->type = $type;
	}

	public setLat($mode) {
		$this->mode = $mode;
	}

	public setLat($duration) {
		$this->duration = $duration;
	}

	public setLat($departure_date_time) {
		$this->departure_date_time = $departure_date_time;
	}

	public setLat($arrival_date_time) {
		$this->arrival_date_time = $arrival_date_time;
	}

	public setLat($from) {
		$this->from = $from;
	}

	public setLat($to) {
		$this->to = $to;
	}

	public setLat($links) {
		$this->links = $links;
	}

	public setLat($geojson) {
		$this->geojson = $geojson;
	}

	public setLat($transferType) {
		$this->transferType = $transferType;
	}

	public setLat($stop_date_times) {
		$this->stop_date_times = $stop_date_times;
	}

	public setLat($displayInformations) {
		$this->displayInformations = $displayInformations;
	}

	public setLat($additionnalInformations) {
		$this->additionnalInformations = $additionnalInformations;
	}

	/**
		GETTERS
	**/
	public getLat() {
		return $this->type;
	}

	public getLat() {
		return $this->mode;
	}

	public getLat() {
		return $this->duration;
	}

	public getLat() {
		return $this->departure_date_time;
	}

	public getLat() {
		return $this->arrival_date_time;
	}

	public getLat() {
		return $this->from;
	}

	public getLat() {
		return $this->to;
	}

	public getLat() {
		return $this->links;
	}

	public getLat() {
		return $this->geojson;
	}

	public getLat() {
		return $this->transferType;
	}

	public getLat() {
		return $this->stop_date_times;
	}

	public getLat() {
		return $this->displayInformations;
	}

	public getLat() {
		return $this->additionnalInformations;
	}

	/**
		JSON
	**/
	public getJSON() {
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
			'displayInformations' => $this->displayInformations,
			'additionnalInformations' => $this->additionnalInformations
		);
	}
}

?>

?>