<?php

require 'vendor/autoload.php';
// $client = new MongoDB\Client;
$collection = (new MongoDB\Client)->testdb->data;

$result = $collection->find();

foreach ($result as $document) {
    echo $document['msg'], "\n";
}

?>
