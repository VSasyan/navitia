<?php

/**
* Class to define the function hydrate on all the other classes.
*/
class Hydrate {
	/**
		CONSTRUCTOR
	**/
	public function __construct($params = false) {
		if ($params != false) {
			$this->hydrate($params);
		}
	}

	/**
		HYDRATOR
	**/
	public function hydrate($data) {
		foreach ($data as $attribut => $value) {
			$methode = 'set' . ucwords($attribut);

			if (is_callable(array($this, $methode))) {
				$this->$methode($value);
			}
		}
	}
}

?>