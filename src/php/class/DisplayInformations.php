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
		CONSTRUCTORS
	**/
	public function __construct() {}

	/**
		SETTERS
	**/
	public setNetwork($network) {
		$this->network = $network;
	}

	public setDirection($direction) {
		$this->direction = $direction;
	}

	public setCommercialMode($commercialMode) {
		$this->commercialMode = $commercialMode;
	}

	public setPhysicalMode($physicalMode) {
		$this->physicalMode = $physicalMode;
	}

	public setLabel($label) {
		$this->label = $label;
	}

	public setColor($color) {
		$this->color = $color;
	}

	public setCode($code) {
		$this->code = $code;
	}

	public setDescription($description) {
		$this->description = $description;
	}

	public setEquipments($equipments) {
		$this->equipments = $equipments;
	}

	/**
		GETTERS
	**/
	public getNetwork() {
		return $this->network;
	}

	public getDirection() {
		return $this->direction;
	}

	public getCommercialMode() {
		return $this->commercialMode;
	}

	public getPhysicalMode() {
		return $this->physicalMode;
	}

	public getLabel() {
		return $this->label;
	}

	public getColor() {
		return $this->color;
	}

	public getCode() {
		return $this->code;
	}

	public getDescription() {
		return $this->description;
	}

	public getEquipments() {
		return $this->equipments;
	}

	/**
		JSON
	**/
	public getJSON() {
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

?>