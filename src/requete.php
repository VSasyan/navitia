<?php

ob_start();

include('key.php');

$req = 'https://' . KEY . '@api.navitia.io/v1/' . $_GET['r'];

echo $req;

$data = file_get_contents($req, false);

$debug = ob_get_clean();

echo json_encode(array(
	'debug' => $debug,
	'api' => json_decode($data)
));

?>