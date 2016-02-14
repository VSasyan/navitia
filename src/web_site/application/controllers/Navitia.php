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

		$data = array(
			'api' => $position->getJSON(),
			'html' => ''
		);

		$this->load->view('json', array('json' => json_encode($data)));
	}

	/**
	 * Journeys request
	 */
	public function journeys($b64, $order_by = 'duration') {
		$this->load->library('navitia/Hydrate');
		$this->load->library('navitia/Coord');
		$this->load->library('navitia/Position');
		$this->load->library('navitia/Journeys');
		$this->load->library('navitia/Journey');
		$this->load->library('navitia/DisplayInformations');
		$this->load->library('navitia/Section');
		$this->load->helper('view_journeys');

		$uri = array_uri(json_decode(base64_decode($b64, true)));

		$journeys = new Journeys();
		$journeys->load_uri($uri, $order_by);

		$journeys_json = $journeys->getJSON();

		$data = array(
			'api' => $journeys_json,
			'html' => view_journeys($journeys_json)
		);

		$this->load->view('json', array('json' => json_encode($data)));
	}
}

?>