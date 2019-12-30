import * as THREE from '../theAlcohol/build/three.module.js';
import { TrackballControls } from '../theAlcohol/jsm/controls/TrackballControls.js';
import { OrbitControls } from '../theAlcohol/jsm/controls/OrbitControls.js';
import { TWEEN } from '../theAlcohol/jsm/libs/tween.module.min.js';
import { CSS3DRenderer, CSS3DObject } from '../theAlcohol/jsm/renderers/CSS3DRenderer.js';


var camera, scene, renderer;
var sceneForCSS3D, rendererForCSS3D;
var controls;


// var cPos = window.innerWidth * -82 + 167454;
// console.log(cPos);
// camera.position.set(0, 0, cPos);

camera = new THREE.PerspectiveCamera(40, window.innerWidth / window.innerHeight, 1, 10000);
camera.position.z = 1300;

scene = new THREE.Scene();
sceneForCSS3D = new THREE.Scene();

//////// START GENERATE ELEMENT ////////

var ary = [{ st: "Wh", pcH: "68", pcL: "40", fullname: "Whisky", row: 0 },
{ st: "Wi", pcH: "16", pcL: "5.5", fullname: "Wine", row: 0 },
{ st: "Gi", pcH: "50", pcL: "37.5", fullname: "Gin", row: 0 },
{ st: "Vo", pcH: "50", pcL: "35", fullname: "Vodka", row: 0 },
{ st: "Sk", pcH: "15", pcL: "15", fullname: "Sake", row: 0 },
{ st: "Br", pcH: "60", pcL: "35", fullname: "Brandy", row: 0 },
{ st: "Rm", pcH: "40", pcL: "40", fullname: "Rum", row: 0 },
{ st: "Lq", pcH: "30", pcL: "15", fullname: "Liqueur", row: 0 },
{ st: "Tq", pcH: "40", pcL: "38", fullname: "Tequila", row: 0 },
];

var objs = [];
var btm = [];
var linedup = [];
var aCount = 0;
var rIdex = 0;

init();

function init() {
  for (var idx in ary) {
    let alcment = ary[idx];

    var ele = document.createElement("div");
    ele.setAttribute("id", (alcment.st).toLocaleLowerCase());
    ele.setAttribute("class", "alcoholement " + (alcment.st).toLocaleLowerCase());
    ele.setAttribute("onclick", "showProfile(\"" + (alcment.st).toLocaleLowerCase() + "\")");
    // ele.setAttribute("onclick", "showProfile(\"" + (alcment.st).toLocaleLowerCase() + "\")");
    // ele.on('click touchstart', "showProfile(\"" + (alcment.st).toLocaleLowerCase() + "\")");


    var t = document.createElement("div");
    t.setAttribute("id", (alcment.st).toLocaleLowerCase());
    t.setAttribute("class", "top");

    var st = document.createElement("div");
    st .setAttribute("id", (alcment.st).toLocaleLowerCase());
    st.setAttribute("class", "st");
    st.innerHTML = alcment.st;
    t.appendChild(st);

    var lim = document.createElement("div");
    lim.setAttribute("id", (alcment.st).toLocaleLowerCase());
    lim.setAttribute("class", "lim");

    var u = document.createElement("div");
    u.setAttribute("id", (alcment.st).toLocaleLowerCase());
    u.setAttribute("class", "u");
    u.innerHTML = alcment.pcH;
    lim.appendChild(u);

    var l = document.createElement("div");
    l.setAttribute("id", (alcment.st).toLocaleLowerCase());
    l.setAttribute("class", "l");
    l.innerHTML = alcment.pcL;
    lim.appendChild(l);

    t.appendChild(lim);
    ele.appendChild(t);

    var n = document.createElement("div");
    n.setAttribute("id", (alcment.st).toLocaleLowerCase());
    n.setAttribute("class", "name");
    n.innerHTML = alcment.fullname;
    ele.appendChild(n);

    var obj = new CSS3DObject(ele);

    // -600 ~ 600
    obj.position.x = (Math.random() * (window.innerWidth - 300)) - ((window.innerWidth - 300) / 2);
    // -300 ~ 300
    obj.position.y = (Math.random() * (window.innerHeight - 300)) - ((window.innerHeight - 300) / 2);

    obj.position.z = Math.random() * 1500;
    sceneForCSS3D.add(obj);

    objs.push(obj);

    var obj = new THREE.Object3D();
    if (window.innerWidth > 600) {
      obj.position.x = (idx * 140) - 140 * 4;
      obj.position.y = window.innerHeight - window.innerHeight;
    }
    else if (window.innerWidth <= 600) {
      console.log(aCount);
      if(aCount > 3){
        obj.position.x = (rIdex % 3 * 140) - 140 * 2;
        obj.position.y = window.innerHeight - window.innerHeight + 200;
      }else{
        obj.position.x = (rIdex * 140) - 140 * 2;
        obj.position.y = window.innerHeight - window.innerHeight;
      }
    }
    linedup.push(obj);

    var obj = new THREE.Object3D();
    // if (window.innerWidth > 600) {
    obj.position.x = (idx * 150) - 150 * 4;
    obj.position.y = 0 - (window.innerHeight / 3);
    obj.position.z = 0;

    btm.push(obj)

    aCount += 1;
    rIdex += 1;
  }
  window.addEventListener('resize', onWindowResize, false);
}

//////// END GENERATE ELEMENT ////////
// alpha: true
renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
// make transparent by setClearColor's second pram.
renderer.setClearColor(0xffffff, 0);
renderer.setPixelRatio(window.devicePixelRatio);
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);


rendererForCSS3D = new CSS3DRenderer();
rendererForCSS3D.setSize(window.innerWidth, window.innerHeight);
rendererForCSS3D.domElement.style.position = 'absolute';
rendererForCSS3D.domElement.style.top = 0;
document.body.appendChild(rendererForCSS3D.domElement);


// controls = new OrbitControls(camera, rendererForCSS3D.domElement);
controls = new TrackballControls(camera, rendererForCSS3D.domElement);

// var controls = new THREE.OrbitControls( camera, renderer.domElement );

lineup();
function lineup() {
  TWEEN.removeAll();
  for (var idx in objs) {
    new TWEEN.Tween(objs[idx].position)
      .to(linedup[idx].position, (Math.random() * 500 + 500))
      // Math.random() * duration + duration
      .easing(TWEEN.Easing.Exponential.InOut)
      .onUpdate(render)
      .start();
  }

  // TWEEN.update();
  new TWEEN.Tween(this)
    .to({}, 3000)
    .onUpdate(render)
    .start();
}

// lineToBtm();

function lineToBtm() {
  TWEEN.removeAll();
  for (var idx in objs) {
    new TWEEN.Tween(objs[idx].position)
      .to(btm[idx].position, (Math.random() * 500 + 500))
      // Math.random() * duration + duration
      .easing(TWEEN.Easing.Exponential.InOut)
      .onUpdate(render)
      .start();
  }

  // TWEEN.update();
  new TWEEN.Tween(this)
    .to({}, 3000)
    .onUpdate(render)
    .start();

}

controls.update();
animate();

function animate() {
  requestAnimationFrame(animate);
  controls.update();
  TWEEN.update();
  render();
}

function render() {
  renderer.render(scene, camera);
  rendererForCSS3D.render(sceneForCSS3D, camera);
}

function onWindowResize() {

  console.log("Resizing");
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();

  renderer.setSize(window.innerWidth, window.innerHeight);
  rendererForCSS3D.setSize(window.innerWidth, window.innerHeight);

  render();

}

window.lineToBtm = lineToBtm;
window.lineup = lineup;