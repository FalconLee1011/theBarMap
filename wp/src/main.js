function activeSideBar() {
  $(".bar:eq(0)").toggleClass("top_ani");
  $(".bar:eq(1)").toggleClass("center_ani");
  $(".bar:eq(2)").toggleClass("bottom_ani");
  $(".sb").toggleClass("sb_ani");
  $(".sideBarItself").toggleClass("sideBarItself_ani");
}


function teleport(link) {
  // var url;
  // var t = e.target.className.split(" ")[1];

  // if (t == "R") {
  //   url = "./theAlcohol/";
  // } else if(t == "L"){
  //   url = "./theMap/";
  // }

  $("*:not(.sb, .bar, body, html, head)").toggleClass("out")
  // .btmWm, .t, .y

  setTimeout(() => {
    window.location.href = link;
  }, 1000);
}


function loadJSON(path) {
  var rqu = new XMLHttpRequest();
  rqu.open("GET", path, false);
  rqu.send(null);
  return JSON.parse(rqu.responseText);
}