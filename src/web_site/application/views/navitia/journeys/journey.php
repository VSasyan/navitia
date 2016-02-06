<?php

$html = '';

$html .= '<div class="journey">';

	$html .= '<div class="sumup">';
		$html .= '<p class="time">';
			$html .= '<span class="main">' . duration($duration) . '</span>';
			$html .= '<span class="second">' . date_time($departure_date_time) . ' - ' . date_time($arrival_date_time) . '</span>';
		$html .= '</p>';
		$html .= '<p class="walking">';
			$html .= '<span class="main">' . duration($duration_walking) . '</span>';
			$html .= '<span class="second">de marche</span>';
		$html .= '</p>';
		$html .= '<p class="transfert">';
			$html .= '<span class="main">' . $nb_transfers . '</span>';
			$html .= '<span class="second">transfert' . ($nb_transfers > 1 ? 's' : '') . '</span>';
		$html .= '</p>';
	$html .= '</div>';

	$html .= '<div class="sections">';
		$html .= $html_sections;
	$html .= '</div>';

$html .= '</div>';

echo $html;

?>