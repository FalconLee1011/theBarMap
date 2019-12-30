<?php
  $m = new MongoClient();
  $db = $m->test;
  $collection = $db->createCollection("bar");
  echo "success";
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>

</body>
</html>