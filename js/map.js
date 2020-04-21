(function(){
  var geojson_data;
// $.ajax({
//   url: "district.json",
//   method: "GET",
//   async: false,
//   success : function(data){
//     geojson_data = JSON.parse(data);
//   }
// });
  $.ajax({
    url: "district.json",
    method: "GET",
    async: false,
    success : function(data){
        geojson_data = data
    }
  });
var mapboxAccessToken = "pk.eyJ1IjoiYW1ua2hhbiIsImEiOiJjazg3ZzJpdmswNXp4M2dxdnR5NnM2b3V5In0.sDPqIb4yM4CSY8mzsDaX8w";
var map = L.map('map').setView([23.6850, 90.3563], 6);

//https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'
//c
function responsiveMap(x) {
  if (x.matches) { // If media query matches
      //https://cartodb-basemaps-{s}.global.ssl.fastly.net/dark_all/{z}/{x}/{y}.png
    L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors data ©️ IEDCR and built with ❤️ and maintained by Al-Iqram Elahee Hridoy & Al Amin Khan',
      id: 'mapbox/light-v9',
      maxZoom: 18,
      minZoom: 7
    }).addTo(map);
  } else {
    //https://cartodb-basemaps-{s}.global.ssl.fastly.net/dark_all/{z}/{x}/{y}.png
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors data ©️ IEDCR and built with ❤️ and maintained by Al-Iqram Elahee Hridoy & Al Amin Khan',
      id: 'mapbox/light-v9',
      maxZoom: 18,
      minZoom: 6
    }).addTo(map);
  }
}

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
  return  d > 300 ? '#800026' :
  d > 200  ? '#BD0026' :
   d > 100  ? '#E31A1C' :
  d > 50  ? '#FC4E2A' :
  d > 30   ? '#FD8D3C' :
  d > 10   ? '#FEB24C' :
  d > 0   ? '#FED976' :
  '#FFEDA0';
}

function style(feature) {
  return {
    fillColor: getColor(feature.properties.p),
    weight: 2,
    opacity: 1,
    color: 'white',
    dashArray: '3',
    fillOpacity: 0.7
  };
}

function highlightFeature(e) {
  var layer = e.target;
  layer.setStyle({
    weight: 2,
    color: '#666',
    dashArray: '',
    fillOpacity: 0.5
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
      grades = [0, 30, 70, 120, 150],
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




var x = window.matchMedia("(min-width: 992px)")
responsiveMap(x) // Call listener function at run time
x.addListener(responsiveMap) // Attach listener function on state changes

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
    center: L.latLng(23.8103, 90.4125),
    zoom: 12,
    layers: [tiles]
});

var mcg = L.markerClusterGroup({
    chunkedLoading: true,
    singleMarkerMode: true,
    spiderfyOnMaxZoom: true
});

var points = [];
var todays_data = {
    'adabor': 5,
    'agargaon': 5,
    'armanitola': 1,
    'ashkona': 1,
    'azimpur': 14,
    'babubazar': 11,
    'badda': 9,
    'bailyroad': 3,
    'banani': 8,
    'banglamotor': 1,
    'bangshal': 27,
    'banianagar': 1,
    'basabo': 18,
    'bashundhora': 6,
    'begunbari': 1,
    'begumbazar': 1,
    'beribadh': 1,
    'bokshibazar': 1,
    'bosila': 1,
    'buetarea': 1,
    'cantonment': 2,
    'centralroad': 1,
    'chankharpool': 8,
    'chawkbazar': 15,
    'dhakkeshori': 1,
    'demra': 5,
    'dhanmondi': 21,
    'dholaikhal': 2,
    'doyaganj': 2,
    'elephantroad ': 1,
    'eskaton': 8,
    'faridabagh': 1,
    'farmgate': 1,
    'gendaria': 19,
    'golartek': 1,
    'goran': 2,
    'gopibag': 6,
    'greenroad': 10,
    'gulistan': 4,
    'gulshan': 14,
    'hatirjhil': 1,
    'hatirpool': 3,
    'hazaribagh': 17,
    'islampur': 2,
    'jailgate': 2,
    'jatrabari': 30,
    'jigatala': 5,
    'jurain': 4,
    'kallyanpur': 2,
    'kalabagan': 4,
    'kathalbagan': 1,
    'kamrangirchar': 4,
    'kazipara': 3,
    'kawranbazar': 2,
    'kochukhet': 1,
    'khilgaon': 2,
    'khilkhet': 1,
    'koltabazar': 1,
    'kodomtoli': 2,
    'kotowali': 4,
    'kuril': 1,
    'lalbagh': 31,
    'laxmibazar': 5,
    'malitola': 1,
    'malibagh': 4,
    'maniknagar': 2,
    'manikdi': 1,
    'matuail': 3,
    'mirhajaribagh': 2,
    'mirpur1': 11,
    'mirpur6': 3,
    'mirpur10': 7,
    'mirpur11': 13,
    'mirpur12': 11,
    'mirpur13': 2,
    'mirpur14': 8,
    'mitford': 28,
    'mogbazar': 12,
    'mohakhali': 14,
    'mohonpur': 1,
    'mohammadpur': 36,
    'motijeel': 1,
    'mugda': 4,
    'nawabpur': 1,
    'nawabganj': 2,
    'narinda': 5,
    'nakhalpara': 6,
    'nayabazar': 7,
    'neemtoli': 4,
    'nikunja': 1,
    'pirerbagh': 2,
    'puranapaltan': 2,
    'rajarbagh': 13,
    'rampura': 4,
    'ramna': 5,
    'rayerbagh': 1,
    'rajabazar': 1,
    'rayerbazar': 2,
    'sabujbagh': 3,
    'sadarghat': 2,
    'sahjanpur': 3,
    'sayedabad': 1,
    'sciencelab': 1,
    'shahalibagh': 2,
    'shahbag': 10,
    'shakharibazar ': 13,
    'shantibagh': 1,
    'shampur': 1,
    'shantinagar': 10,
    'shaymoli': 7,
    'shewrapara': 4,
    'shekhertek': 1,
    'showarighat': 3,
    'siddheshwari': 4,
    'sonirakhra': 2,
    'sutrapur': 12,
    'tatiBazar': 12,
    'tejgaon': 19,
    'tezturibazar': 1,
    'tolarbag': 19,
    'urduroad': 1,
    'uttara': 23,
    'vatara': 1,
    'wari': 29,
}
var city = dhakaCity = {
    'adabor': [23.773539, 90.354871],
    'agargaon': [23.779344, 90.373559],
    'armanitola': [23.716823, 90.401512],
    'ashkona': [23.853672, 90.418204],
    'azimpur': [23.726896, 90.386354],
    'babubazar': [23.711039, 90.403224],
    'badda': [23.780856, 90.426083],
    'bailyroad': [23.741409, 90.406352],
    'banani': [23.793272, 90.404535],
    'banglamotor': [23.746830, 90.393384],
    'bangshal': [23.718337, 90.400656],
    'banianagar': [23.708767, 90.418856],
    'basabo': [23.742694, 90.430774],
    'bashundhora': [23.819544, 90.452467],
    'begunbari': [23.763656, 90.403404],
    'begumbazar': [23.718082, 90.398643],
    'beribadh': [23.831556, 90.414683],
    'bokshibazar': [23.724150, 90.395212],
    'bosila': [23.754772, 90.358890],
    'buetarea': [23.726805, 90.392663],
    'cantonment': [23.821345, 90.411316],
    'centralroad': [23.742082, 90.387711],
    'chankharpool': [23.724532, 90.395847],
    'chawkbazar': [23.717264, 90.396289],
    'dhakkeshori': [23.724669, 90.389934],
    'demra': [23.720844, 90.483344],
    'dhanmondi': [23.747702, 90.374453],
    'dholaikhal': [23.715012, 90.414091],
    'doyaganj': [23.708340, 90.428770],
    'elephantroad ': [23.739072, 90.387017],
    'eskaton': [23.748978, 90.398961],
    'faridabagh': [23.695190, 90.423532],
    'farmgate': [23.757565, 90.387173],
    'gendaria': [23.701539, 90.428961],
    'golartek': [23.793908, 90.341097],
    'goran': [23.752011, 90.434023],
    'gopibag': [23.721775, 90.426001],
    'greenroad': [23.749633, 90.386552],
    'gulistan': [23.722778, 90.413594],
    'gulshan': [23.792312, 90.407525],
    'hatirjhil': [23.770476, 90.414254],
    'hatirpool': [23.742991, 90.388278],
    'hazaribagh': [23.736192, 90.362894],
    'islampur': [23.710128, 90.407251],
    'jailgate': [23.718362, 90.398133],
    'jatrabari': [23.711412, 90.434684],
    'jigatala': [23.741270, 90.373059],
    'jurain': [23.688315, 90.443206],
    'kallyanpur': [23.782521, 90.359275],
    'kalabagan': [23.749552, 90.383125],
    'kathalbagan': [23.747954, 90.388212],
    'kamrangirchar': [23.724964, 90.367030],
    'kazipara': [23.805015, 90.375302],
    'kawranbazar': [23.752460, 90.393785],
    'kochukhet': [23.794248, 90.390010],
    'khilgaon': [23.756797, 90.464172],
    'khilkhet': [23.831133, 90.424412],
    'koltabazar': [23.710330, 90.414051],
    'kodomtoli': [23.701179, 90.397577],
    'kotowali': [23.718123, 90.408971],
    'kuril': [23.820911, 90.422871],
    'lalbagh': [23.718297, 90.386528],
    'laxmibazar': [23.712774, 90.416525],
    'malitola': [23.715899, 90.409957],
    'malibagh': [23.754010, 90.412712],
    'maniknagar': [23.754010, 90.412712],
    'manikdi': [23.826032, 90.391651],
    'matuail': [23.689752, 90.470162],
    'mirhajaribagh': [23.715046, 90.430468],
    'mirpur1': [23.795560, 90.353553],
    'mirpur6': [23.751699, 90.380057],
    'mirpur10': [23.806963, 90.368694],
    'mirpur11': [23.816282, 90.366200],
    'mirpur12': [23.828341, 90.363946],
    'mirpur13': [23.806122, 90.376176],
    'mirpur14': [23.806122, 90.376176],
    'mitford': [23.711584, 90.399728],
    'mogbazar': [23.749621, 90.408973],
    'mohakhali': [23.777818, 90.405361],
    'mohonpur': [23.773660, 90.360726],
    'mohammadpur': [23.766534, 90.357045],
    'motijeel': [23.732940, 90.416869],
    'mugda': [23.731740, 90.434710],
    'nawabpur': [23.718502, 90.411523],
    'nawabganj': [23.660404, 90.149969],
    'narinda': [23.710624, 90.420724],
    'nakhalpara': [23.769480, 90.394086],
    'nayabazar': [23.714551, 90.404052],
    'neemtoli': [23.771203, 90.426618],
    'nikunja': [23.832077, 90.417861],
    'pirerbagh': [23.791350, 90.366254],
    'puranapaltan': [23.732331, 90.411187],
    'rajarbagh': [23.741248, 90.415350],
    'rampura': [23.771374, 90.420645],
    'ramna': [23.733832, 90.398393],
    'rayerbagh': [23.694568, 90.457243],
    'rajabazar': [23.753457, 90.386459],
    'rayerbazar': [23.743530, 90.361716],
    'sabujbagh': [23.738841, 90.429236],
    'sadarghat': [23.704868, 90.415879],
    'sahjanpur': [23.745290, 90.423433],
    'sayedabad': [23.720588, 90.427075],
    'sciencelab': [23.736858, 90.383710],
    'shahalibagh': [23.797594, 90.357187],
    'shahbag': [23.740044, 90.394389],
    'shakharibazar ': [23.710306, 90.409657],
    'shantibagh': [23.745642, 90.417703],
    'shampur': [23.685385, 90.444839],
    'shantinagar': [23.738409, 90.414125],
    'shaymoli': [23.771259, 90.363762],
    'shewrapara': [23.793402, 90.376623],
    'shekhertek': [23.768110, 90.352784],
    'showarighat': [23.711530, 90.394387],
    'siddheshwari': [23.743582, 90.408877],
    'sonirakhra': [23.707488, 90.453712],
    'sutrapur': [23.711525, 90.420535],
    'tatiBazar': [23.712238, 90.407623],
    'tejgaon': [23.759809, 90.391548],
    'tezturibazar': [23.756232, 90.392004],
    'tolarbag': [23.789089, 90.351450],
    'urduroad': [23.717440, 90.395512],
    'uttara': [23.876136, 90.378956],
    'vatara': [23.805200, 90.425983],
    'wari': [23.717422, 90.417380],
}

for(var key in city){
    var value = city[key];
    var loop  = todays_data[key];
    var currentArray = [];
    currentArray.push(value[0],value[1],loop)
    for (var i = 0; i < loop; i++) {
        points.push(currentArray)
    }
}



for (var i = 0; i < points.length; i++) {
    var a = points[i];
    var title = a[2];
    var marker = L.marker(new L.LatLng(a[0], a[1]), { title: title });
    marker.bindPopup(title);
    mcg.addLayer(marker);
}

map.addLayer(mcg);
