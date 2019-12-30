google.maps.event.addDomListener(window, 'load', init);
var now;
var marker, marks;
var map;
var here;
var infowindow;
function init() {
  where();
  var mapOptions = {
    // How zoomed in you want the map to start at (always required)
    zoom: 11,

    // The latitude and longitude to center the map (always required)
    center: new google.maps.LatLng(25.1, 121.7),

    // How you would like to style the map. 
    styles: [{ "featureType": "all", "elementType": "all", "stylers": [{ "lightness": "29" }, { "invert_lightness": true }, { "hue": "#008fff" }, { "saturation": "-73" }] }, { "featureType": "all", "elementType": "labels", "stylers": [{ "saturation": "-72" }] }, { "featureType": "all", "elementType": "labels.text.fill", "stylers": [{ "color": "#cebd8e" }] }, { "featureType": "all", "elementType": "labels.text.stroke", "stylers": [{ "color": "#827133" }] }, { "featureType": "administrative", "elementType": "all", "stylers": [{ "lightness": "32" }, { "weight": "0.42" }] }, { "featureType": "administrative", "elementType": "labels", "stylers": [{ "visibility": "on" }, { "lightness": "-53" }, { "saturation": "-66" }, { "gamma": "1.65" }, { "weight": "1.00" }] }, { "featureType": "landscape", "elementType": "all", "stylers": [{ "lightness": "-86" }, { "gamma": "1.85" }, { "visibility": "on" }] }, { "featureType": "landscape", "elementType": "geometry.fill", "stylers": [{ "hue": "#006dff" }, { "lightness": "4" }, { "gamma": "1.30" }, { "saturation": "-67" }] }, { "featureType": "landscape", "elementType": "geometry.stroke", "stylers": [{ "lightness": "5" }] }, { "featureType": "landscape", "elementType": "labels.text.fill", "stylers": [{ "visibility": "off" }, { "gamma": "3.50" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [{ "weight": "0.84" }, { "gamma": "1.00" }, { "visibility": "on" }] }, { "featureType": "poi", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }, { "weight": "0.79" }, { "gamma": "3.50" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "visibility": "simplified" }, { "lightness": "-78" }, { "saturation": "-100" }, { "color": "#2f090b" }] }, { "featureType": "road", "elementType": "labels.text", "stylers": [{ "color": "#ffffff" }, { "lightness": "-69" }] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [{ "gamma": "3.50" }] }, { "featureType": "road", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "on" }, { "gamma": "3.50" }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "lightness": "5" }] }, { "featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [{ "lightness": "10" }, { "gamma": "1" }] }, { "featureType": "road.local", "elementType": "geometry.fill", "stylers": [{ "lightness": "10" }, { "saturation": "-100" }] }, { "featureType": "transit", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "labels.icon", "stylers": [{ "gamma": "4.02" }] }, { "featureType": "transit.line", "elementType": "all", "stylers": [{ "color": "#696969" }] }, { "featureType": "water", "elementType": "all", "stylers": [{ "saturation": "-97" }, { "lightness": "-14" }] }],

    fullscreenControl: false,
    mapTypeControl: false,
    streetViewControl: false,
    zoomControl: false
  };

  var mapElement = document.getElementById('map');

  // Create the Google Map using our element and options defined above
  map = new google.maps.Map(mapElement, mapOptions);

  map.data.loadGeoJson('./data_tp.json', null,
    function (fs) {
      marks = fs.map(
        function name(f) {
          var geo = f.getGeometry().g;
          marker = new google.maps.Marker({ "position": geo });
          marker.setIcon("./marks.png");
          marker.addListener('click',
            function () {
              try { infowindow.close(); }
              catch { /* TEE-HEE-HEE */ }
              var info = `
                <div class='b' onclick='det()'>
                  <h2 id="bar_name"> `+ f.h.name + `</h2>
                  <div id="bar_eval">
                    <img id="" src='star.png' width='15px'>
                    <img id="" src='star.png' width='15px'>
                    <img id="" src='star.png' width='15px'>
                    <img id="" src='star.png' width='15px'>
                    <img id="" style="filter: grayscale(1);" src='star.png' width='15px'>
                  </div>
                  <div>
                    <img id="bar_img" src='p1.png' width='200px'>
                  </div>
                  <div id="bar_intro">
                    <p>
                      Intro goes here.
                      <?php echo "Hello"; ?>
                    </p>
                  </div>
                </div>
                `;
              window.history.replaceState(null, null, "?bar=" + f.h.name);
              infowindow = new google.maps.InfoWindow({ content: info });
              infowindow.setPosition(geo);
              map.setCenter(geo);
              infowindow.open(map);
              // marker.setAnimation(google.maps.Animation.BOUNCE);
            }
          );
          return marker;
        }
      );
      console.log(marks);
      // var markerCluster = new MarkerClusterer(map, marks, {"icon": ""});
      var markerCluster = new MarkerClusterer(map, marks, { gridSize: 100 });
    }
  );

  map.data.setStyle({ icon: "marks.png", visible: false });
  // map.data.setStyle({ icon: "marks.png" });
}

function det() {
  $(".detail").toggleClass("detail_ani");
  infowindow.close();
}
function where() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      here = new google.maps.Marker({
        position: pos,
        icon: 'me.png',
        map: map
      });
      map.setCenter(pos);
    });
  } else {
    console.log("未允許或遭遇錯誤！");
  }
}

function getCord() {
  navigator.geolocation.getCurrentPosition(function (pos) {
    return { "lat": pos.coords.latitude, "lng": pos.coords.longitude };
  }, function () {
    console.log("Something went wrong!");
  });
}

function Click(e) {
  if (e.target.id == "me" || e.target.id == "find") {
    where();
    map.setCenter(here.position);
  }
}
document.addEventListener("click", Click, false);