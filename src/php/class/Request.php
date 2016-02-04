<?php

/**
* 
*/
class Request extends Hydrate {
	protected $base = 'https://' . KEY . '@api.navitia.io/v1/';

	/**
		CONSTRUCTORS
	**/
	public function __construct($type) {
		$this->base .= $type + '/';
	}

	/**
		FUNCTIONS
	**/
	public doRequest($param) {
		$req = $this->base . $param;
		$data = file_get_contents($req, false);
		return json_decode($data);
	}

}

?>