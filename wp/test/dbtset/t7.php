<?php


require "/var/www/html/wp/test/dbtset/vendor/autoload.php";
// require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = (new MongoDB\Client)->testdb->all;

// $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

//$result = $collection->findOne(["name" => "Lost in NEMEA"]);

$result = $collection->findOne(["name" => "The Fridge Bar"]);

echo $result["name"] . "<br>" . $result["address"] . "<br>" . $result["phone"] . "<br>";

//var_dump($result);

//foreach($result as $vv){
//	var_dump($vv);
  //echo "----------";	
  //echo $vv["name"];
	//echo $vv["name"] . "<br>" . $vv["address"] . "<br>" . $vv["phone"] . "<br>";
//}


?>
