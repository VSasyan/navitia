<?php

// Dependances :
include('../key.php');
function __autoload($class_name) {
	include 'class/' . $class_name . '.php';
}

ob_start();

$class = ucwords($_GET['c']);
$request = $_GET['r'];
//print_r($class);
//print_r($request);
$element = new $class();
$element->load_uri($request);

$debug = ob_get_clean();

echo json_encode(array(
	'debug' => $debug,
	'api' => json_encode($element->getJSON())
));

?>