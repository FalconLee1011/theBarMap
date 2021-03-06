<!DOCTYPE html>
<html>

<head>
  <title>酒吧・走吧 @ 地圖[BETA]</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./map.css">
  <!-- ** HAS API KEY ** FOR DEPOLY -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOccSygfbPGl1qNqPTDkrcK58jnU4vrYA"></script>
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

<body bgcolor=#222>
  <div id="map" class="fadeIn"></div>


  <div class="detail">
    <input id="x" class="x" type="button" value="◀" onclick="det()">
    <br><br>
    <div class="detail_head">
      <img src="al.png" width="15%"><img src="rbar.png" width="81%">
      <div class="headtxt">
      </div>
    </div>
    <div class="detailpic">
      <img src="p1.png" width="90%" left="10px">
    </div>
    <div class="detaillevel">
      <img src="star.png"><img src="star.png"><img src="star.png"><img src="star.png"><img src="star.png">
      <span class="level">4</span>
    </div>
    <div class="detailmess">
      WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>WuJi<br>
    </div>
  </div>


  <div class="findMe">    
    <u class="metxt" id="find">Find>></u>
    <img class="me" id="me" src="me.png">
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