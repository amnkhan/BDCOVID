(function(){
  var geojson_data;
$.ajax({
  url: "https://raw.githubusercontent.com/wolf-dev/US-json/master/sure.json",
  method: "GET",
  async: false,
  success : function(data){
    geojson_data = JSON.parse(data);
  }
});
var mapboxAccessToken = "pk.eyJ1IjoiYW1ua2hhbiIsImEiOiJjazg3ZzJpdmswNXp4M2dxdnR5NnM2b3V5In0.sDPqIb4yM4CSY8mzsDaX8w";
var map = L.map('map').setView([23.8103, 90.4125], 6);

//https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'
//c

//https://cartodb-basemaps-{s}.global.ssl.fastly.net/dark_all/{z}/{x}/{y}.png
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=' + mapboxAccessToken, {
  attribution: '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors data ©️ IEDCR and built with ❤️ and maintained by Al-Iqram Elahee Hridoy & Al Amin Khan',
  id: 'mapbox/light-v9',
   maxZoom: 18,
  minZoom:7
}).addTo(map);

// control that shows state info on hover
var info = L.control();

info.onAdd = function (map) {
  this._div = L.DomUtil.create('div', 'info');
  this.update();
  return this._div;
};

info.update = function (props) {
  this._div.innerHTML = '<h4>সর্বোমোট আক্রান্ত রোগীর সংখ্যা</h4>' +  
    (props ? '<b>' + props.name + '</b><br />' + props.p + ' people ' : 'জেলার উপর হোভার করুন');
};

info.addTo(map);

function getColor(d) {
  return  d > 50 ? '#800026' :
  // d > 40  ? '#BD0026' :
  // d > 30  ? '#E31A1C' :
  d > 20  ? '#FC4E2A' :
  d > 10   ? '#FD8D3C' :
  d > 5   ? '#FEB24C' :
  d > 0   ? '#FED976' :
  '#FFEDA0';
}

function style(feature) {
  return {
    fillColor: getColor(feature.properties.p),
    weight: 1,
    opacity: 1,
    color: 'white',
    dashArray: '3',
    fillOpacity: 0.7
  };
}

function highlightFeature(e) {
  var layer = e.target;
  layer.setStyle({
    weight: 5,
    color: '#666',
    dashArray: '',
    fillOpacity: 0.7
  });
  if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
    layer.bringToFront();
  }
  info.update(layer.feature.properties);
}

var geojson;

function resetHighlight(e) {
  geojson.resetStyle(e.target);
  info.update();
}

function zoomToFeature(e) {
  map.fitBounds(e.target.getBounds());
}

function onEachFeature(feature, layer) {
  layer.on({
    mouseover: highlightFeature,
    mouseout: resetHighlight,
    click: zoomToFeature
  });
}

geojson = L.geoJson(geojson_data, {
  style: style,
  onEachFeature: onEachFeature
}).addTo(map);

var legend = L.control({position: 'bottomright'});

legend.onAdd = function (map) {
  var div = L.DomUtil.create('div', 'info legend'),
      grades = [0, 5, 10, 20, 50],
      labels = [],
      from, to;
  for (var i = 0; i < grades.length; i++) {
    from = grades[i];
    to = grades[i + 1];
    labels.push(
      '<i style="background:' + getColor(from + 1) + '"></i> ' +
      from + (to ? '&ndash;' + to : '+'));
  }
  div.innerHTML = labels.join('<br>');
  return div;
};

legend.addTo(map);
})();





// Dhaka Map

//https://maps.wikimedia.org/osm-intl/${z}/${x}/${y}.png
////{s}.tile.openstreetmap.org/{z}/{x}/{y}.png
//	https://cartodb-basemaps-{s}.global.ssl.fastly.net/dark_all/{z}/{x}/{y}.pn
//https://cartodb-basemaps-{s}.global.ssl.fastly.net/dark_all/{z}/{x}/{y}.png
var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: '&copy; <a href="//openstreetmap.org/copyright">OpenStreetMap</a> contributors, Points &copy 2012 LINZ'
});

var map = L.map('dhakaMap', {
    center: L.latLng(23.8223, 90.3654),
    zoom: 13,
    layers: [tiles]
});

var mcg = L.markerClusterGroup({
    chunkedLoading: true,
    singleMarkerMode: true,
    spiderfyOnMaxZoom: true
});
var adressPoints = [
    [23.7733, 90.3548, "1"],// adabor
    [23.7660, 90.3586, "6"],//mohammedpur
    [23.7660, 90.3586, "6"],
    [23.7660, 90.3586, "6"],
    [23.7660, 90.3586, "6"],
    [23.7660, 90.3586, "6"],
    [23.7660, 90.3586, "6"],
    [23.7547, 90.3589, "1"], //bosila
    [23.7461, 90.3742, "9"],//dhanmondi
    [23.7461, 90.3742, "9"],//dhanmondi
    [23.7461, 90.3742, "9"],//dhanmondi
    [23.7461, 90.3742, "9"],//dhanmondi

    [23.7461, 90.3742, "9"],//dhanmondi
    [23.7461, 90.3742, "9"],//dhanmondi
    [23.7461, 90.3742, "9"],//dhanmondi
    [23.7461, 90.3742, "9"],//dhanmondi
    [23.7461, 90.3742, "9"],//dhanmondi
    [23.7393, 90.3754, "3"], //jigatoli
    [23.7393, 90.3754, "3"], //jigatoli
    [23.7393, 90.3754, "3"], //jigatoli
    [23.742019, 90.387744, "1"],//cenntreal road
    [23.7174, 90.4178, "9"], //wari
    [23.7174, 90.4178, "9"], //wari
    [23.7174, 90.4178, "9"], //wari
    [23.7174, 90.4178, "9"], //wari
    [23.7174, 90.4178, "9"], //wari
    [23.7174, 90.4178, "9"], //wari
    [23.7174, 90.4178, "9"], //wari
    [23.7174, 90.4178, "9"], //wari
    [23.7174, 90.4178, "9"], //wari

    [23.7106, 90.4208, "1"],//narinda
    [23.7397, 90.3943,"1"],//shahbag
    [23.7182, 90.3866,"5"],//Lalbag
    [23.7182, 90.3866, "5"],//Lalbag
    [23.7182, 90.3866, "5"],//Lalbag
    [23.7182, 90.3866, "5"],//Lalbag
    [23.7182, 90.3866, "5"],//Lalbag
    [23.710009, 90.402339,"2"],//babubazar
    [23.710009, 90.402339, "2"],//babubazar
    [23.7112,90.4052,"2"],//islampur
    [23.7112, 90.4052, "2"],//islampur
    [23.7494,90.3865,"1"],//green road
    [23.717532, 90.395615,"1"],//urdu road
    [23.725930, 90.394681,"1"],//buet area
    [23.716128, 90.395767,"2"],//chawbazar
    [23.716128, 90.395767, "2"],//chawbazar,
    [23.728128, 90.370288,"1"],//hazaribag
    [23.711648, 90.394387,"3"],//showari ghat
    [23.711648, 90.394387, "3"],//showari ghat
    [23.711648, 90.394387, "3"],//showari ghat
    [23.711130, 90.407958,"1"],//kotowali
    [23.719196, 90.403694,"1"],//bongshal
    [23.711142, 90.434931,"5"],//jatrabari
    [23.711142, 90.434931, "5"],//jatrabari
    [23.711142, 90.434931, "5"],//jatrabari
    [23.711142, 90.434931, "5"],//jatrabari
    [23.711142, 90.434931, "5"],//jatrabari,
    [23.731783, 90.411892,"2"],//purana paltan
    [23.731783, 90.411892, "2"],//purana paltan

    [23.746008, 90.400605,"1"],//eskkaton

    [23.742217, 90.406012,"1"],//Baily Road
    [23.751018, 90.408494,"1"],//Mogbazar
    [23.741755, 90.431711,"9"],//Basabo
    [23.741755, 90.431711, "9"],//Basabo
    [23.741755, 90.431711, "9"],//Basabo
     [23.741755, 90.431711,"9"],//Basabo
      [23.741755, 90.431711,"9"],//Basabo
    [23.741755, 90.431711, "9"],//Basabo
    [23.741755, 90.431711, "9"],//Basabo
    [23.741755, 90.431711, "9"],//Basabo
    [23.741755, 90.431711, "9"],//Basabo
    [23.762680, 90.422542,"1"],//Rampura
    [23.743461, 90.424371,"1"],//shahjanpur
    [23.781258, 90.426251,"1"],//Badda
    [23.819072, 90.432983,"3"],//Basundhara
    [23.819072, 90.432983, "3"],//Basundhara
    [23.819072, 90.432983, "3"],//Basundhara
    [23.833819, 90.416484,"1"],//Nikunjo
    [23.851169, 90.417008,"1"],//Ashkona
    [23.873336, 90.381292,"5"],//Uttara
    [23.873336, 90.381292, "5"],//Uttara
    [23.873336, 90.381292, "5"],//Uttara
    [23.873336, 90.381292, "5"],//Uttara
    [23.873336, 90.381292, "5"],//Uttara
    [23.795014, 90.414391,"6"],//Gulshan
    [23.795014, 90.414391, "6"],//Gulshan
    [23.795014, 90.414391, "6"],//Gulshan
    [23.795014, 90.414391, "6"],//Gulshan
    [23.795014, 90.414391, "6"],//Gulshan
    [23.795014, 90.414391, "6"],//Gulshan
    [23.779308, 90.405533,"1"],//Mohahali
    [23.760309, 90.394069,"2"],//Tejgaon
    [23.760309, 90.394069, "2"],//Tejgaon
    [23.797462, 90.372407,"1"],//kazipara
    [23.798138, 90.354927,"13"],//Mirpur
    [23.798138, 90.354927, "13"],//Mirpur
    [23.798138, 90.354927, "13"],//Mirpur
    [23.798138, 90.354927, "13"],//Mirpur
    [23.798138, 90.354927, "13"],//Mirpur
    [23.798138, 90.354927, "13"],//Mirpur
    [23.798138, 90.354927, "13"],//Mirpur
    [23.798138, 90.354927, "13"],//Mirpur
    [23.798138, 90.354927, "13"],//Mirpur
    [23.798138, 90.354927, "13"],//Mirpur
    [23.798138, 90.354927, "13"],//Mirpur
    [23.798138, 90.354927, "13"],//Mirpur
    [23.798138, 90.354927, "13"],//Mirpur

    [23.797291, 90.357325,"2"],//Shah ali bag
    [23.797291, 90.357325, "2"],//Shah ali bag
    [23.789041, 90.367079,"2"],//Pirerbag
    [23.789041, 90.367079, "2"],//Pirerbag
    [23.789285, 90.351177,"4"],//Tolarbag
    [23.789285, 90.351177, "4"],//Tolarbag
    [23.789285, 90.351177, "4"],//Tolarbag
    [23.789285, 90.351177, "4"],//Tolarbag,
    [23.788545, 90.352066,"6"],//Uttar tolarbag
    [23.788545, 90.352066, "6"],//Uttar tolarbag
    [23.788545, 90.352066, "6"],//Uttar tolarbag
    [23.788545, 90.352066, "6"],//Uttar tolarbag
    [23.788545, 90.352066, "6"],//Uttar tolarbag
    [23.788545, 90.352066, "6"]//Uttar tolarbag

]



for (var i = 0; i < adressPoints.length; i++) {
    var a = adressPoints[i];
    var title = a[2];
    var marker = L.marker(new L.LatLng(a[0], a[1]), { title: title });
    marker.bindPopup(title);
    mcg.addLayer(marker);
}

map.addLayer(mcg);

