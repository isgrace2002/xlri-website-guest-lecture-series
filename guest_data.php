<?php

$url = 'http://localhost/rest-api-crud-using-php/json.php'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$characters = json_decode($data); // decode the JSON feed


foreach ($characters as $character) {
	echo $character->batch . '<br>';
}
?>