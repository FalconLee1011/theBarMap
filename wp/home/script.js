function moveBlock(e) {
  var t = e.target.className.split(" ")[1];
  if (t == "L") {
    $(".bl").toggleClass("block_Ani");
    $(".br").toggleClass("block_Ani_s");
    $(".htitle.L").toggleClass("htitle_Ani_0");
    $(".htitle.R").toggleClass("htitle_Ani_1");
    $(".imgl").toggleClass("img_ani");
  }else if (t == "R"){
    $(".br").toggleClass("block_Ani");
    $(".bl").toggleClass("block_Ani_s");
    $(".htitle.R").toggleClass("htitle_Ani_0");
    $(".htitle.L").toggleClass("htitle_Ani_1");
    $(".imgr").toggleClass("img_ani");
  }
}

// function toaa() {
//   var url = "./theAlcohol/index.html"
//   activeSideBar();
//   $("*:not(.sb, .bar, body, html, head, .btmWm)").toggleClass("out");
//   setTimeout(() => {
//     window.location.href = url;
//   }, 1200);
// }

// htitle_Ani_r
// htitle_Ani_l