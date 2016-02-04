<?php

/**
* 
*/
class Journey extends Hydrate {
	public function __construct($valeurs = array()) {
		if (!empty($valeurs)) {
			$this->hydrate($valeurs);
		}
	}
}

?>