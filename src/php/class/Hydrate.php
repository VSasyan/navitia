<?php

class Hydrate() {
	public function hydrate($donnees) {
		foreach ($donnees as $attribut => $valeur) {
			$methode = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut)));

			if (is_callable(array($this, $methode))) {
				$this->$methode($valeur);
			}
		}
	}
}

?>