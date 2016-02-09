<?php

$html = '';

$label = 'Correspondance à ' . $to['name'];
$color = '333333';

$html .= '<div class="section transfert ' . $transferType . ' " data-color="' . $color . '">';

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
			$html .= '<div class="line dashed" style="border-color:#' . $color . '; background-color:#' . $color . ';"></div>';
		$html .= '</div>';
		$html .= '<div class="cell">';
			$html .= '<span class="direction">Correspondance : ' . duration($duration) . '</span>';
			$html .= '<span class="stop_duration">Attente : ' . duration($waitingDuration) . '</span>';
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