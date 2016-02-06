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

		// view
		//$html = '';

		$json = array('json' => array(
			'api' => $position->toJSON(),
			'html' => ''
		));

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
		$this->load->helper('journeys');

		$journeys = new Journeys();
		$journeys->load_uri($uri);

		$journeys_json = $journeys->getJSON();

		$data = array(
			'api' => json_encode($journeys_json),
			'html' => view_journeys($journeys_json)
		);

		$this->load->view('json', array('json' => json_encode($data)));
	}
}

?>