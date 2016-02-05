<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navitia extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
	public function index() {
		$this->load->view('welcome');
	}

	/**
	 * Position request
	 */
	public function position($uri) {
		$this->load->library('navitia/Hydrate');
		$this->load->library('navitia/Coord');
		$this->load->library('navitia/Position');

		$position = new Position();
		$position->load_uri($uri);
		$json = array('json' => $position->toJSON());

		$this->load->view('json', $json);
	}

	/**
	 * Journeys request
	 */
	public function journeys($uri) {
		$this->load->library('navitia/Hydrate');
		$this->load->library('navitia/Coord');
		$this->load->library('navitia/Position');
		$this->load->library('navitia/Journeys');
		$this->load->library('navitia/Journey');
		$this->load->library('navitia/DisplayInformations');
		$this->load->library('navitia/Section');

		$journeys = new Journeys();
		$journeys->load_uri($uri);
		$json = array('json' => $journeys->toJSON());

		$this->load->view('json', $json);
	}
}
