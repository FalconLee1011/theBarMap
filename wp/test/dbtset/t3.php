<?php
  require "./vendor/autoload.php";
  $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
  var_dump($manager);
  echo "--------\n";
  var_dump($manager->testdb);
  // $manager = new MongoDB\Driver\Manager("mongodb://pi:umeshupi@localhost:27017");
  // $manager = (new MongoDB\Client)->test2;
  // $stats = new MongoDB\Driver\Command(["dbstats"=>1]);
  // $res = $manager->executeCommand("db_name",$stats);
  // var_dump($res->toArray());
  // var_dump($manager);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>

</body>
</html>
