<head>
<meta charset="UTF-8">
</head>
<?php
echo "hi";
$m = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$ha = new MongoDB\Driver\BulkWrite;
$ha -> insert(["y"=>1]);
$m -> executeBulkWrite('test.www', $ha);
echo "集合創建成功";
?>
