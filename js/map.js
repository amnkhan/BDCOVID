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