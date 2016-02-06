<?php

/**
* Class to manage sections
*/
class DisplayInformations extends Hydrate {
	protected $network = '';
	protected $direction = '';
	protected $commercialMode = '';
	protected $physicalMode = '';
	protected $label = '';
	protected $color = '';
	protected $code = '';
	protected $description = '';
	protected $equipments = array();

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
		if (array_key_exists('network', $api)) {$this->setNetwork($api['network']);}
		if (array_key_exists('direction', $api)) {$this->setDirection($api['direction']);}
		if (array_key_exists('commercial_mode', $api)) {$this->setCommercialMode($api['commercial_mode']);}
		if (array_key_exists('physical_mode', $api)) {$this->setPhysicalMode($api['physical_mode']);}
		if (array_key_exists('label', $api)) {$this->setLabel($api['label']);}
		if (array_key_exists('color', $api)) {$this->setColor($api['color']);}
		if (array_key_exists('code', $api)) {$this->setCode($api['code']);}
		if (array_key_exists('description', $api)) {$this->setDescription($api['description']);}
		if (array_key_exists('equipments', $api)) {$this->setEquipments($api['equipments']);}
		foreach ($api['equipments'] as $equipment) {
			$this->equipments[] = $equipment;
		}
	}

	/**
		SETTERS
	**/
	public function setNetwork($network) {
		$this->network = $network;
	}

	public function setDirection($direction) {
		$this->direction = $direction;
	}

	public function setCommercialMode($commercialMode) {
		$this->commercialMode = $commercialMode;
	}

	public function setPhysicalMode($physicalMode) {
		$this->physicalMode = $physicalMode;
	}

	public function setLabel($label) {
		$this->label = $label;
	}

	public function setColor($color) {
		$this->color = $color;
	}

	public function setCode($code) {
		$this->code = $code;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function setEquipments($equipments) {
		$this->equipments = $equipments;
	}

	/**
		GETTERS
	**/
	public function getNetwork() {
		return $this->network;
	}

	public function getDirection() {
		return $this->direction;
	}

	public function getCommercialMode() {
		return $this->commercialMode;
	}

	public function getPhysicalMode() {
		return $this->physicalMode;
	}

	public function getLabel() {
		return $this->label;
	}

	public function getColor() {
		return $this->color;
	}

	public function getCode() {
		return $this->code;
	}

	public function getDescription() {
		return $this->description;
	}

	public function getEquipments() {
		return $this->equipments;
	}

	/**
		JSON
	**/
	public function getJSON() {
		return array(
			'network' => $this->network,
			'direction' => $this->direction,
			'commercialMode' => $this->commercialMode,
			'physicalMode' => $this->physicalMode,
			'label' => $this->label,
			'color' => $this->color,
			'code' => $this->code,
			'description' => $this->description,
			'equipments' => $this->equipments
		);
	}
}

?>