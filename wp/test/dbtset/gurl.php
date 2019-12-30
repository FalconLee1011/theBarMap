<?php
  // $a = $_SERVER['HTTP_REFERER'];
  // // foreach(parse_url($a) as $pd){
  // //   echo $pd . "<br>";
  // // }
  // $bar_name_raw = end(parse_url($a));

  // $bar_name = str_replace("%", "", unicode2html(rawurldecode($bar_name_raw)));

  // echo $bar_name;

  $a = $_SERVER["REQUEST_URI"];

  $bar_name_raw = end(parse_url($a));

  $bar_name = str_replace("bar=", "", str_replace("%", "", unicode2html(rawurldecode($bar_name_raw))));

  echo $bar_name;

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
</body>
</html>