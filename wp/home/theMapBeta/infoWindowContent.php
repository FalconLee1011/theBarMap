<?php

  // require "/wp/vendor/autoload.php";
  $a = $_SERVER['HTTP_REFERER'];
  // foreach(parse_url($a) as $pd){
  //   echo $pd . "<br>";
  // }
  $bar_name_raw = end(parse_url($a));

  $bar_name = str_replace("bar=", "", str_replace("%", "", unicode2html(rawurldecode($bar_name_raw))));
  
  require "/var/www/html/wp/vendor/autoload.php";

  $client = new MongoDB\Client("mongodb://localhost:27017");

  $collection = (new MongoDB\Client)->barMapBeta->tpe;
  
  // $bar_name = html_entity_decode($bar_name, ENT_NOQUOTES, 'UTF-8');

  // echo $bar_name . "<br>";

  // echo base64_encode($bar_name) . " | " . base64_encode("橘子酒吧") . "<br>";

  // echo base64_encode("橘子酒吧") . "<br>";
  // echo base64_encode(html_entity_decode($bar_name, ENT_NOQUOTES, 'UTF-8')) . "<br>";

  // echo "橘子酒吧" . "<br>";
  // echo html_entity_decode($bar_name, ENT_NOQUOTES, 'UTF-8') . "<br>";
  // echo $bar_name . "<br>";

  $bar_name = html_entity_decode($bar_name, ENT_NOQUOTES, 'UTF-8');

  $result = $collection->findOne(["name" => $bar_name]);

  // echo $result["name"] . "<br>" . $result["address"] . "<br>" . $result["phone"] . "<br>";


  $star_active = "<img src='./res/star.png' width='15px'>";
  $star_gray = "<img style=\"filter: grayscale(1);\" src='./res/star.png' width='15px'>";
  $bar_name = $result["name"];
  $bar_eval_avg = $result["rankAvg"];
  $bar_addr = $result["address"];
  $bar_phone = $result["phone"];
  $bar_openHour = "";

  foreach($result["weekday_text"] as $wt){
    $bar_openHour = $bar_openHour . $wt . "<br>";
  }

  // Convert unicode to UTF-8. Big thanks to stackoverflow guy.
  function unicode2html($str){
    $str = preg_replace("/u([0-9a-fA-F]{4})/", "&#x\\1;", $str);
    return iconv("UTF-8", "ISO-8859-1//TRANSLIT", $str);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
</head>

<style>
  *{
    color: #d7d7d7;
  }
</style>

<body>
  <div id="bar_eval">
    <?php
      if ($bar_eval_avg == -1) {
        echo "目前沒有評價。";
      }else{
        $i = 0;
        for ($i; $i < $bar_eval_avg; $i++) { echo $star_active; }
        for ($i; $i < 5; $i++) { echo $star_gray; }
      }
    ?>
  </div>
  <div class"m_info">
    <div class="m_info_addr">
      <?php
        echo $bar_addr;
      ?>
    </div>
    <div class="m_info_phone">
      <?php
        echo $bar_phone;
      ?>
    </div>
  </div>
  <div>
    <!-- TODO BAR IMAGE QUERY -->
    <img id="bar_img" src='./res/p1.png' width='200px'>
  </div>
  <div id="bar_intro">
    <p>
      <!-- <?php echo $bar_name; ?>
      's intro goes here. -->
      營業時間：<br>
      <?php
        echo $bar_openHour;
      ?>
    </p>
  </div>
</body>

</html>