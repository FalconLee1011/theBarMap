<?php
require 'vendor/autoload.php';
$collection = (new MongoDB\Client("mongodb://localhost:27017"))->test->www;
$insertOneResult = $collection->insertOne(["k"=>3]);
echo "集合创建成功";
?>

