<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('view_journeys()')) {
	function view_journeys($journeys_json) {
		$html_journeys = ''; $i = 0;
		foreach ($journeys_json['journeys'] as $journey) {
			$html_journeys .= view_journey($journey, $i);
			$i++;
		}
		$journeys_json['html_journeys'] = $html_journeys;
		//echo(json_encode($journeys_json));

		return view_loader('navitia/journeys/journeys', $journeys_json);
	}
}

if ( ! function_exists('view_journey()')) {
	function view_journey($journey_json, $nb_journey) {
		$html_sections = ''; $i = 0;
		foreach ($journey_json['sections'] as $section) {
			$html_sections .= view_section($section, $i);
			$i++;
		}
		$journey_json['html_sections'] = $html_sections;
		$journey_json['nb_journey'] = $nb_journey;

		return view_loader('navitia/journeys/journey', $journey_json);
	}
}

if ( ! function_exists('view_section()')) {
	function view_section($section_json, $nb_section) {
		$section_json['nb_section'] = $nb_section;
		return view_loader('navitia/section/' . $section_json['type'], $section_json);
	}
}

?>