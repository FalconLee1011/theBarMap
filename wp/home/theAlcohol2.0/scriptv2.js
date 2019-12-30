function showHelp(e) {
  $(".teachHowToReadThisWeirdElementInner").toggleClass("ani");
  $(".teachHowToReadThisWeirdElementInnerContent").toggleClass("ani");
}

var isFloating = true;

function showProfile(id) {
  // console.log(e.target.id);
  getDetial(id);
  if (isFloating) {
    lineToBtm();
    isFloating = false;
  }
}

function closeItr(){
  lineup();
  isFloating = true;
  $(".introWindow").toggleClass("ani");
}

function getDetial(id) {
  var title = "Whisky";
  var title_zh = "威士忌";
  var strm = "Wh";
  var hp = "40";
  var lp = "40";
  var intro = "Intro";
  var picPath = "res";


  var data = loadJSON("alcoholInfo.json").data;
  var cDat;

  console.log(data[0]);

  for (var idx in data) {
    console.log();
    if (id == data[idx]["st"].toLocaleLowerCase()){
      cDat = data[idx];
      break;
    }
  }


  title = cDat["fullname"];
  title_zh = cDat["fullname_zh"];
  strm = cDat["st"];
  hp = cDat["pcH"];
  lp = cDat["pcL"];
  intro = cDat["intro"];
  picPath = "./res/" + cDat["pic"][0];

  var ca = [title, title_zh, strm, hp, lp, intro, picPath];

  if (title_zh == "" || title_zh == undefined) { title_zh = "No Data."; }

  if (intro == "" || intro == undefined) { intro = "No Data."; }

  $("#alcItTitle").html(title);
  $("#alcItTitle_zh").html(title_zh);
  $("#st").html(strm);
  $("#u").html(hp);
  $("#l").html(lp);
  $("#inrto").html(intro);
  $("#imgRpAl").attr("src", picPath);
  $("#alcoholement").attr("class", "alcoholement " + id.toLocaleLowerCase())
  $(".introWindow").attr("class", "introWindow " + "ani " + id.toLocaleLowerCase());
  // $(".introWindow").removeClass();
  // $(".introWindow").addClass("introWindow");
  // $(".introWindow").addClass("ani");
  // $(".introWindow").addClass("");
  
  $("#alcItTitle_am").html(title);
  $("#alcItTitle_s").html(title);
}