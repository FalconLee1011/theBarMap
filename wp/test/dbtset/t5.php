<?php
echo "hi";
$m = new MongoDB\Driver\Manager("mongodb://localhost:27017");
var_dump($m);
$ha = new MongoDB\Driver\BulkWrite;
$ha -> insert(["x"=>2]);
$m -> executeBulkWrite('tesUWU.www', $ha);
echo "Done.";
//echo "集合創建成功";
?>
