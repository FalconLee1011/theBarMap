<?php 
  require "/var/www/html/wp/vendor/autoload.php";

  $a = $_SERVER['QUERY_STRING'];
  $bar_name_raw = explode("=",$a);
  $bar_name = str_replace("%", "", unicode2html(rawurldecode($bar_name_raw[1])));
  $bar_name = html_entity_decode($bar_name, ENT_NOQUOTES, 'UTF-8');
  // echo $bar_name;

  $collection = (new MongoDB\Client)->barMapBeta->tpe;
  $result = $collection->findOne(['name'=>$bar_name]);

  $star_active = "<img src='./res/star.png'>";
  $star_gray = "<img style=\"filter: grayscale(1);\" src='./res/star.png'>";

  $name=$result['name'];
  $add=$result['address'];
  $phone=$result['phone'];
  $bar_eval_avg = $result["rankAvg"];
  $bar_openHour = "";

  foreach($result["weekday_text"] as $wt){
    $bar_openHour = $bar_openHour . $wt . "<br>";
  }

  function unicode2html($str){
    // Set the locale to something that's UTF-8 capable
    setlocale(LC_ALL, 'en_US.UTF-8');
    // Convert the codepoints to entities
    $str = preg_replace("/u([0-9a-fA-F]{4})/", "&#x\\1;", $str);
    // Convert the entities to a UTF-8 string
    return iconv("UTF-8", "ISO-8859-1//TRANSLIT", $str);
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <?php
    if ($bar_eval_avg == -1) {
      echo "<b style='font-size: 120%;'>目前沒有評價。歡迎新增！</b>";
    }else{
      $i = 0;
      for ($i; $i < $bar_eval_avg; $i++) { echo $star_active; }
      for ($i; $i < 5; $i++) { echo $star_gray; }
    }
    // echo $name . "<br>";
    echo "<div class='bar_dtl'>地址: " . $add . "<br></div>";
    echo "<div class='bar_dtl'>電話: " . $phone . "<br></div>";
    echo "<div class='bar_dtl'>營業時間:<br>" . $bar_openHour . "</div>";
    echo "<div class='bar_dtl'>評價:</div>";
  ?>

  <div class="evals">

    <!-- TODO LOAD EVAL -->
    <div class="eval">

    </div>
  </div>

</body>
</html>
