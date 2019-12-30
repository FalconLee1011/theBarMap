<?php

  // require "/wp/vendor/autoload.php";
  // $a = $_SERVER['HTTP_REFERER'];
  // foreach(parse_url($a) as $pd){
  //   echo $pd . "<br>";
  // }
  // $bar_name_raw = end(parse_url($a));

  // $bar_name = str_replace("bar=", "", str_replace("%", "", unicode2html(rawurldecode($bar_name_raw))));

  // echo $bar_name;

  $bar_name = "橘子酒吧";

  
  require "/var/www/html/wp/vendor/autoload.php";

  $client = new MongoDB\Client("mongodb://localhost:27017");

  $collection = (new MongoDB\Client)->barMapBeta->tpe;

  echo "|" . $bar_name . "|<br>"; 

  echo base64_encode($bar_name) . "<br>";

  $result = $collection->findOne(["name" => $bar_name]);

  // echo $result["name"] . "<br>" . $result["address"] . "<br>" . $result["phone"] . "<br>";

  $star_active = "<img src='./res/star.png' width='15px'>";
  echo $star_active;
  $star_gray = "<img style=\"filter: grayscale(1);\" src='./res/star.png' width='15px'>";
  echo $star_gray;
  $bar_name = $result["name"];
  echo $bar_name;
  $bar_eval_avg = $result["rankAvg"];
  echo $bar_eval_avg;
  $bar_addr = $result["address"];
  echo $bar_addr;
  $bar_phone = $result["phone"];
  echo $bar_phone;

?>
