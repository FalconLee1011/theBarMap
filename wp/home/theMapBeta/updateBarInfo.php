<?php

  header("Content-type:text/html;charset=utf-8");
  $log = "";
  foreach ($_POST as $key => $value) {
    $log = $log . $key . " -> " . $value . "<br>";
  }

  $logFile = fopen("updateBarinfo.log", "a");
  fwrite($logFile, $log);
  fclose($logFile);
  $log = "";

  require "/var/www/html/wp/vendor/autoload.php";

  $client = new MongoDB\Client("mongodb://localhost:27017");
  $collection = (new MongoDB\Client)->barMapBeta->tpe;

  $toBeUpdate = $_POST["barName"];

  $fa = [];

  for ($i = 1; $i < 8; $i++) { 
    try {
      if ($_POST["feature_" . $i] == "1") {
        array_push($fa, $i);
      }
    } catch (\Throwable $th) {
      //throw $th;
    }
  }

  //upload pictures
  $pic=[];
  $uploadPath = 'uploads/';
  // 獲取提交的圖片資料
  $file = $_FILES['img'];
  $fileCount = count($_FILES['img']['name']);

  for ($i = 0; $i < $fileCount; $i++) {
      if($file['error'][$i] > 0){
          $msg = '傳入引數錯誤' . $file['error'][$i] . "  ";
          exit($msg);
      }
      else{
      // chmod($uploadPath, 0666);
          $file['name'][$i];
          if(move_uploaded_file($file['tmp_name'][$i], $uploadPath.date("Y-m-d-H-i-s_").$file['name'][$i])){
            array_push($pic, date("Y-m-d-H-i-s_").$_FILES['img']['name'][$i]);
          }
          else{
              exit("上傳失敗！");
          }
      }
  }


  // $collection->updateOne( [ "name" => $toBeUpdate ], ['$set' => ['evaluation' => []]] );
  $collection->updateOne( [ "name" => $toBeUpdate ], ['$push' => [ 'evaluation' => ["meal" => $_POST["food"], "price" => $_POST["amount"], "feature" => $fa, "comment" => $_POST["text"], "rank" => $_POST["level"], "image"=>$pic ] ]] );

  // $collection->updateOne( [ "name" => $toBeUpdate ], ['$push' => [ 'evaluation' => {"meal": $_POST["food"], "price": $_POST["amount"], "feature": $_POST["feature"], "comment": $_POST["text"], "rank" => $_POST["level"]} ]] );
  // $collect = {"meal": $_POST["food"] "price": $_POST["amount"] "feature": $_POST["feature"] "comment": $_POST["text"] "rank": $_POST["level"]}


  // $logFile = fopen("updateBarinfo.log", "a");
  // fwrite($logFile, $log);
  // fclose($logFile);

  // {
  // "name": "",
  // "name_b64": "",
  // "gm_name": "",
  // "address": "",
  // "phone": "",
  // "weekday_text": [],
  // "priceRange": (0, 0),
  // "rankAvg": -1,
  // "featureTop3": [],
  // "evaluation": [
  //     {
  //       "rank": int,
  //       "meal": str,
  //       "price": int,
  //       "feature": [str],
  //       "comment": str,
  //       "image": [str]
  //     }
  //   ]
  // }

  // food      ->  meal
  // amount    ->  price
  // feature   ->  feature
  // text      ->  comment
  // level     ->  rank
  // barName   ->  $barName




  // TODO: UPDATE BARINFO

?>