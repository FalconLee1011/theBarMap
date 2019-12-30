<!DOCTYPE html>
<html>

<head>
  <title>酒吧・走吧 @ 地圖[BETA]</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./map.css">
  <!-- ** HAS API KEY ** FOR DEPOLY -->
  <script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOccSygfbPGl1qNqPTDkrcK58jnU4vrYA"></script>
  <!-- ** NO API KEY ** FOR TESTING -->
  <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key="></script> -->

  <!-- DEFAULT EXAMPLE CLUSTER JS -->
  <!-- <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script> -->
  <!-- CUSTOMIZED CLUSTER JS -->
  <script src="markerclusterer.js"></script>

  <link rel="stylesheet" href="/src/main.css">
  <script src="/src/main.js"></script>
  <script src="/src/jquery-3.4.1.min.js"></script>
  <script src="./map_cluster.js"></script>
</head>

<body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="callTheDamnPHP">
    <input type="hidden" name="barName" id="barName" value="">
  </form>
  <div id="map" class="fadeIn"></div>
  <!-- flip area -->
  <div class="detail">
    <div class="flip-container" id="fl">
      <div class="flipper">
        <div class="front">
          <input class="x" type="button" value="◀" onclick="det();">
          <br><br>

          <div class="detail_head">
            <img src="./res/al.png" width="15%"><img src="./res/rbar.png" width="81%">
            <div class="headtxt" id="headtxt"></div>
          </div>
          <div class="detailpic" id="detailpic">
            <!-- TODO: QUERY IMAGE -->
            <img src="./res/p1.png" width="90%" left="10px">
          </div>

          <div class="detaillevel">
            <!-- TODO: QUERY EVAL -->
            <img src="./res/star.png" id="star1" class="star">
            <img src="./res/star.png" id="star2" class="star">
            <img src="./res/star.png" id="star3" class="star">
            <img src="./res/star.png" id="star4" class="star">
            <img src="./res/star.png" id="star5" class="star">
            <span class="level" id="level">4</span>
            <button onclick="document.getElementById('fl').classList.toggle('hover');$('body').toggleClass('body');" id="opinion">
              <span>新增評價</span>
            </button>
          </div>

          <div class="detailmess" id="detailmess">
            <!-- TODO: QUERY EVAL DATA-->

              <?php if (!empty($_POST)): ?>
                <?php
                  require "/var/www/html/wp/vendor/autoload.php";

                  $barName = $_POST["barName"];

                  echo $barName . "<br>";

                  $collection = (new MongoDB\Client("mongodb://localhost:27017"))->barMapBeta->tpe;
                  $result = $collection->find(['name'=>$bar_name]);

                  $address = $result["address"];

                  echo $address;
                ?>

              <?php else: ?>
                No data.
              <?php endif; ?>

            WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>
          </div>
        </div>

        <div class="back">
          <div class="form">
            <img src="./res/al.png" class="al" width="15%">
            <div class="rtn" onclick="document.getElementById('fl').classList.toggle('hover');$('body').toggleClass('body');">×</div>
            <div id="fortxt" class="fortxt"></div>
            <br>
            <div class="forstar">
              <img src="./res/nstar.png" id="s1" class="star"><img src="./res/nstar.png" id="s2" class="star"><img
                src="./res/nstar.png" id="s3" class="star"><img src="./res/nstar.png" id="s4" class="star"><img
                src="./res/nstar.png" id="s5" class="star">
            </div>
            <form method="post" action="http://">
              <label>餐點：<input name="food" type="text" required="required"></label><br>
              <label>金額：<input name="amount" type="number"></label><br>
              <label>特色：<br>
                <div class="feature">
                  <input class="fea" name="feature" type="checkbox" value="1">氣氛溫馨
                  <input class="fea" name="feature" type="checkbox" value="2">好友聚會
                  <input class="fea" name="feature" type="checkbox" value="3">派對
                  <input class="fea" name="feature" type="checkbox" value="4">餐點可口<br>
                  <input class="fea" name="feature" type="checkbox" value="5">禁菸
                  <input class="fea" name="feature" type="checkbox" value="6">商業合作
                  <input class="fea" name="feature" type="checkbox" value="7">適合交友
                </div>
              </label><br>
              <label><textarea class="optxt" name="text" required="required"></textarea></label><br>
              <span id="output"></span>
              <label>
                <div class="upbtn">+</div>
                <input name="img" id="img" type="file" accept="image/*" multiple="multiple" style="display:none;"onchange="openFile(event)">
              </label><br>
              <input type="hidden" name="level" value="5">
              <input id="submit" type="submit" value="提交">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="findMe">
    <u class="metxt" id="find">Find>></u>
    <img class="me" id="me" src="./res/me.png">
  </div>


  <!-- #### COMMON CONTENT BBELOW #### -->

  <div class="sideBarItself">
    <div class="sideItem_head"></div>
    <a onclick="teleport('../')">
      <div class="sideItem">Portal</div>
    </a>
    <a>
      <div class="sideItem active">找酒吧</div>
    </a>
    <a onclick="teleport('../theAlcohol')">
      <div class="sideItem">關於酒</div>
    </a>
    <a href="#">
      <div class="sideItem">關於我們</div>
    </a>
  </div>

  <div class="sb" onclick="activeSideBar()">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
  </div>

  <div class="btmWm">
    <div class="t">酒吧・走吧</div>
    <div class="y">2019</div>
  </div>

</body>

</html>