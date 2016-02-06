<?php

$network = 'network_' . $displayInformations['network'];
$code = 'code_' . $displayInformations['code'];
$label = $displayInformations['physicalMode'] . ' ' . $displayInformations['label'];
$color = $displayInformations['color'];

$html = '';

$html .= '<div class="section public_transport ' . $network . ' ' . $code . '" data-color="' . $color . '" data-label="' . $label . '">';
	$html .= '<div class="time">';
		$html .= '<span class="departure_date_time">' . date_time($departure_date_time) . '</span>';
		$html .= '<span class="icon" style="color:#' . $color . ';"></span>';
		$html .= '<span class="arrival_date_time">' . date_time($arrival_date_time) . '</span>';
	$html .= '</div>';
	$html .= '<div class="road">';
		$html .= '<span class="circle" style="border-color:#' . $color . '; background-color:#' . $color . ';"></span>';
		$html .= '<span class="line" style="border-color:#' . $color . '; background-color:#' . $color . ';"></span>';
		$html .= '<span class="circle" style="border-color:#' . $color . '; background-color:#' . $color . ';"></span>';
	$html .= '</div>';
	$html .= '<div class="info">';
		$html .= '<span class="from">' . $from['name'] . '</span>';
		$html .= '<span class="direction">' . $displayInformations['direction'] . '</span>';
		$html .= '<span class="stop_duration">' . count($stop_date_times) . ' arrêts : ' . duration($duration) . '</span>';
		$html .= '<span class="to">' . $to['name'] . '</span>';
	$html .= '</div>';
$html .= '</div>';

echo $html;

?>