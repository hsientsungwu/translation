<?php

// if the 'term' variable is not sent with the request, exit
if ( !isset($_REQUEST['term']) ) exit;

require $_SERVER['DOCUMENT_ROOT'] . "/config.php";

$key = mysql_escape_string($_REQUEST['term']);

$results = searchForEnglishAutocomplete($key);
sort($results);
// loop through each zipcode returned and format the response for jQuery
$data = array();

foreach ($results as $result) {
	$data[] = array(
		'label' => $result['tch'],
		'value' => $result['tch']
	);
}

// jQuery wants JSON data
echo json_encode($data);
flush();