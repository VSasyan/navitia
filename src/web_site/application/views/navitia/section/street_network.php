<?php

$html = '';

if ($mode == 'walking') {
	$network = 'network_' . $displayInformations['network'];
	$code = 'code_' . $displayInformations['code'];
	$label = 'Aller jusqu\'à ' . $to['name'];
	$color = '000000';

	$html .= '<div class="section street_network walking ' . $network . ' ' . $code . '" data-color="' . $color . '" data-label="' . $label . '">';
		$html .= '<div class="time">';
			$html .= '<span class="departure_date_time">' . date_time($departure_date_time) . '</span>';
			$html .= '<span class="arrival_date_time">' . date_time($arrival_date_time) . '</span>';
		$html .= '</div>';
		$html .= '<div class="road">';
			$html .= '<span class="circle"></span>';
			$html .= '<span class="line dashed"></span>';
			$html .= '<span class="circle"></span>';
		$html .= '</div>';
		$html .= '<div class="info">';
			$html .= '<span class="from">' . $from['name'] . '</span>';
			$html .= '<span class="stop_duration">' . $label . ' : ' . duration($duration) . '</span>';
			$html .= '<span class="to">' . $to['name'] . '</span>';
		$html .= '</div>';
	$html .= '</div>';
} elseif ($mode == '') {
} else {
	$html .= '<p>street_network mode unknowed : "' . $mode . '"</p>';
}


echo $html;

?>