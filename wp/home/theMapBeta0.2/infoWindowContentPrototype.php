<?php
  $star_active = "<img src='./res/star.png' width='15px'>";
  $star_gray = "<img style=\"filter: grayscale(1);\" src='./res/star.png' width='15px'>";
  $bar_name = "Test Bar";
  $bar_eval_avg = 3;
  $bar_addr = "No. 1號, Lane 293, Renyi Road, Ren’ai District, Keelung City, Taiwan 200";
  $bar_phone = "02 2428 5300";
  $bar_openHour = "Monday: 12:00 – 2:30 PM, 5:30 – 10:00 PM<br>Tuesday: 12:00 – 2:30 PM, 5:30 – 10:00 PM<br>Wednesday: 12:00 – 2:30 PM, 5:30 – 10:00 PM<br>Thursday: 12:00 – 2:30 PM, 5:30 – 10:00 PM<br>Friday: 12:00 – 2:30 PM, 5:30 – 10:00 PM<br>Saturday: 12:00 – 2:30 PM, 5:30 – 10:00 PM<br>Sunday: 12:00 – 2:30 PM, 5:30 – 10:00 PM";
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

<body bgcolor="rgba(11, 11, 11, 0.584)">
  <div id="bar_eval">
    <!-- TODO BAR AVG EVAL QUERY -->
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
      <?
        echo $bar_addr;
      ?>
    </div>
    <div class="m_info_phone">
      <?
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

      <?php
        echo $bar_openHour;
      ?>
    </p>
  </div>
</body>

</html>