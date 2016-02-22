<?php

$network = 'network_' . $displayInformations['network'];
$code = 'code_' . $displayInformations['code'];
$label = $displayInformations['physicalMode'] . ' ' . $displayInformations['label'];
$color = $displayInformations['color'];

$html = '';

$html .= '<div class="section public_transport ' . $network . ' ' . $code . '" data-color="' . $color . '" data-label="' . $label . '" data-nb="' . $nb_section . '">';

	$html .= '<div class="row begin">';
		$html .= '<div class="cell">';
			$html .= '<span class="departure_date_time">' . date_time($departure_date_time) . '</span>';
		$html .= '</div>';
		$html .= '<div class="cell road">';
			$html .= '<div class="circle" style="border-color:#' . $color . '; background-color:#' . $color . ';"></div>';
		$html .= '</div>';
		$html .= '<div class="cell">';
			$html .= '<span class="from">' . $from['name'] . '</span>';
		$html .= '</div>';
	$html .= '</div>';

	$html .= '<div class="row middle">';
		$html .= '<div class="cell">';
			$html .= '<span class="icon" style="color:#' . $color . ';"></span>';
		$html .= '</div>';
		$html .= '<div class="cell road">';
			$html .= '<div class="line" style="border-color:#' . $color . '; background-color:#' . $color . ';"></div>';
		$html .= '</div>';
		$html .= '<div class="cell">';
			$html .= '<span class="direction">' . $displayInformations['direction'] . '</span>';
			$html .= '<span class="stop_duration">' . count($stop_date_times) . ' arrêts : ' . duration($duration) . '</span>';
		$html .= '</div>';
	$html .= '</div>';

	$html .= '<div class="row end">';
		$html .= '<div class="cell">';
			$html .= '<span class="arrival_date_time">' . date_time($arrival_date_time) . '</span>';
		$html .= '</div>';
		$html .= '<div class="cell road">';
			$html .= '<div class="circle" style="border-color:#' . $color . '; background-color:#' . $color . ';"></div>';
		$html .= '</div>';
		$html .= '<div class="cell">';
			$html .= '<span class="to">' . $to['name'] . '</span>';
		$html .= '</div>';
	$html .= '</div>';

$html .= '</div>';

echo $html;

?>