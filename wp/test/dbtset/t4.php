<?php

require './vendor/autoload.php';
//$m = new MongoDB\driver\manager();

$m = new MongoDB\Client();
var_dump($m->testdb->d);

?>
