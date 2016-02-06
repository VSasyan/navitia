<?php

$class_publishers = '';
foreach ($publishers as $id) {$class_publishers .= ' ' . $id;}

$html = '';

$html .= '<div class="journeys ' . $class_publishers . '">';

	$html .= $html_journeys;

	$html .= '<div class="links_journeys">';
		foreach ($links as $key => $href) {$html .= '<p><a href="' . $href . '" class="' . $key . '">' . $key . '</a></p>';}
	$html .= '</div>';

$html .= '</div>';

echo $html;

?>