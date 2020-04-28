function zelaMap() {
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
      L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png', {
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

}


// Dhaka Map

function dhakaMap() {
  
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
    'abdullahpur': 1,
    'adabor': 7,
    'agargaon': 11,
    'aminbazar': 2,
    'amlapara': 2,
    'armanitola': 2,
    'ashkona': 1,
    'azimpur': 18,
    'babubazar': 11,
    'badda': 22,
    'bailyroad': 4,
    'baridhara': 7,
    'banasree': 1,
    'banani': 9,
    'banglamotor': 2,
    'bangshal': 49,
    'banianagar': 1,
    'basabo': 28,
    'bijoynagar': 1,
    'bashundhora': 8,
    'begunbari': 1,
    'begumbazar': 1,
    'beribadh': 1,
    'bokshibazar': 5,
    'bosila': 1,
    'buetarea': 1,
    'cantonment': 7,
    'centralroad': 2,
    'chankharpool': 27,
    'chawkbazar': 32,
    'dania': 1,
    'dakshinkhan': 1,
    'dhakkeshori': 1,
    'demra': 9,
    'dhanmondi': 37,
    'dholaikhal': 2,
    'doyaganj': 2,
    'elephantroad ': 5,
    'eskaton': 9,
    'faridabagh': 1,
    'fakirapool': 2,
    'farmgate': 5,
    'gendaria': 32,
    'golartek': 1,
    'goran': 3,
    'gonoktuli': 3,
    'gopibag': 11,
    'greenroad': 12,
    'gulistan': 7,
    'gulshan': 24,
    'hatirjhil': 3,
    'hatirpool': 3,
    'hazaribagh': 27,
    'ibrahimpur': 2,
    'islampur': 2,
    'jailgate': 2,
    'jatrabari': 70,
    'jigatala': 6,
    'jurain': 22,
    'kallyanpur': 6,
    'kalabagan': 6,
    'kakrail': 47,
    'kathalbagan': 1,
    'kamalapur': 2,
    'kamrangirchar': 16,
    'kazipara': 8,
    'kawranbazar': 5,
    'koratitola': 1,
    'kochukhet': 1,
    'khilgaon': 26,
    'khilkhet': 3,
    'koltabazar': 1,
    'kodomtoli': 5,
    'kotowali': 9,
    'kuril': 2,
    'lalbagh': 67,
    'laxmibazar': 10,
    'madartek': 2,
    'malitola': 4,
    'malibagh': 30,
    'maniknagar': 2,
    'manikdi': 1,
    'matuail': 4,
    'meradia': 2,
    'mirhajaribagh': 3,
    'mirpur1': 29,
    'mirpur2': 2,
    'mirpur6': 6,
    'mirpur10': 14,
    'mirpur11': 28,
    'mirpur12': 16,
    'mirpur13': 3,
    'mirpur14': 37,
    'mitford': 38,
    'mogbazar': 35,
    'mohakhali': 54,
    'mohonpur': 1,
    'mohammadpur': 61,
    'motijeel': 2,
    'mugda': 43,
    'nawabpur': 1,
    'nazirabazar': 9,
    'nawabganj': 4,
    'narinda': 11,
    'nilkhet': 3,
    'nakhalpara': 9,
    'nayabazar': 7,
    'neemtoli': 4,
    'nikunja': 1,
    'pallabi': 2,
    'pirerbagh': 3,
    'postogola': 5,
    'puranapaltan': 27,
    'rajarbagh': 119,
    'rampura': 16,
    'ramna': 9,
    'rayerbagh': 2,
    'rajabazar': 2,
    'rosulpur': 1,
    'rupganj': 1,
    'rayerbazar': 4,
    'sabujbagh': 7,
    'sadarghat': 3,
    'sahjanpur': 10,
    'sayedabad': 4,
    'segunbagicha': 4,
    'sciencelab': 1,
    'shahalibagh': 2,
    'shahbag': 36,
    'shakharibazar ': 28,
    'shantibagh': 5,
    'shampur': 1,
    'shantinagar': 14,
    'shaymoli': 12,
    'shewrapara': 4,
    'shekhertek': 1,
    'showarighat': 3,
    'siddheshwari': 4,
    'sonirakhra': 6,
    'swamibagh': 31,
    'sherebanglanagar': 6,
    'sutrapur': 16,
    'tatiBazar': 3,
    'tikatoli': 14,
    'tejkunipara': 2,
    'tejgaon': 44,
    'turag': 1,
    'tezturibazar': 4,
    'tongi': 9,
    'tolarbag': 19,
    'urduroad': 1,
    'uttara': 46,
    'vatara': 2,
    'wari': 37,
  }
  var city = dhakaCity = {
    'abdullahpur': [23.879976, 90.401111],
    'adabor': [23.773539, 90.354871],
    'agargaon': [23.779344, 90.373559],
    'aminbazar': [23.786355, 90.329826],
    'amlapara': [23.622041, 90.502594],
    'armanitola': [23.716823, 90.401512],
    'ashkona': [23.853672, 90.418204],
    'azimpur': [23.726896, 90.386354],
    'babubazar': [23.711039, 90.403224],
    'badda': [23.780856, 90.426083],
    'bailyroad': [23.741409, 90.406352],
    'baridhara': [23.799862, 90.420619],
    'banasree': [23.761875, 90.433211],
    'banani': [23.793272, 90.404535],
    'banglamotor': [23.746830, 90.393384],
    'bangshal': [23.718337, 90.400656],
    'banianagar': [23.708767, 90.418856],
    'basabo': [23.742694, 90.430774],
    'bijoynagar': [23.734728, 90.410719],
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
    'dania': [23.701685, 90.444364],
    'dakshinkhan': [23.852791, 90.426493],
    'dhakkeshori': [23.724669, 90.389934],
    'demra': [23.720844, 90.483344],
    'dhanmondi': [23.747702, 90.374453],
    'dholaikhal': [23.715012, 90.414091],
    'doyaganj': [23.708340, 90.428770],
    'elephantroad ': [23.739072, 90.387017],
    'eskaton': [23.748978, 90.398961],
    'faridabagh': [23.695190, 90.423532],
    'fakirapool': [23.732528, 90.416939],
    'farmgate': [23.757565, 90.387173],
    'gendaria': [23.701539, 90.428961],
    'golartek': [23.793908, 90.341097],
    'goran': [23.752011, 90.434023],
    'gonoktuli': [23.732057, 90.370578],
    'gopibag': [23.721775, 90.426001],
    'greenroad': [23.749633, 90.386552],
    'gulistan': [23.722778, 90.413594],
    'gulshan': [23.792312, 90.407525],
    'hatirjhil': [23.770476, 90.414254],
    'hatirpool': [23.742991, 90.388278],
    'hazaribagh': [23.736192, 90.362894],
    'ibrahimpur': [23.794173, 90.382888],
    'islampur': [23.710128, 90.407251],
    'jailgate': [23.718362, 90.398133],
    'jatrabari': [23.711412, 90.434684],
    'jigatala': [23.741270, 90.373059],
    'jurain': [23.688315, 90.443206],
    'kallyanpur': [23.782521, 90.359275],
    'kalabagan': [23.749552, 90.383125],
    'kakrail': [23.738971, 90.407482],
    'kathalbagan': [23.747954, 90.388212],
    'kamalapur': [23.733616, 90.426127],
    'kamrangirchar': [23.724964, 90.367030],
    'kazipara': [23.805015, 90.375302],
    'kawranbazar': [23.752460, 90.393785],
    'koratitola': [23.714352, 90.425412],
    'kochukhet': [23.794248, 90.390010],
    'khilgaon': [23.756797, 90.464172],
    'khilkhet': [23.831133, 90.424412],
    'koltabazar': [23.710330, 90.414051],
    'kodomtoli': [23.701179, 90.397577],
    'kotowali': [23.718123, 90.408971],
    'kuril': [23.820911, 90.422871],
    'lalbagh': [23.718297, 90.386528],
    'laxmibazar': [23.712774, 90.416525],
    'madartek': [23.743824, 90.439122],
    'malitola': [23.715899, 90.409957],
    'malibagh': [23.754010, 90.412712],
    'maniknagar': [23.754010, 90.412712],
    'manikdi': [23.826032, 90.391651],
    'matuail': [23.689752, 90.470162],
    'meradia': [23.762028, 90.444236],
    'mirhajaribagh': [23.715046, 90.430468],
    'mirpur1': [23.795560, 90.353553],
    'mirpur2': [23.805629, 90.357560],
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
    'nazirabazar': [23.718632, 90.406695],
    'nawabganj': [23.660404, 90.149969],
    'narinda': [23.710624, 90.420724],
    'nilkhet': [23.732162, 90.385249],
    'nakhalpara': [23.769480, 90.394086],
    'nayabazar': [23.714551, 90.404052],
    'neemtoli': [23.771203, 90.426618],
    'nikunja': [23.832077, 90.417861],
    'pallabi': [23.828436, 90.360725],
    'postogola': [23.690161, 90.427762],
    'pirerbagh': [23.791350, 90.366254],
    'puranapaltan': [23.732331, 90.411187],
    'rajarbagh': [23.741248, 90.415350],
    'rampura': [23.771374, 90.420645],
    'ramna': [23.733832, 90.398393],
    'rayerbagh': [23.694568, 90.457243],
    'rajabazar': [23.753457, 90.386459],
    'rosulpur': [23.704484, 90.441932],
    'rupganj': [23.815968, 90.539545],
    'rayerbazar': [23.743530, 90.361716],
    'sabujbagh': [23.738841, 90.429236],
    'sadarghat': [23.704868, 90.415879],
    'sahjanpur': [23.745290, 90.423433],
    'sayedabad': [23.720588, 90.427075],
    'segunbagicha': [23.732126, 90.407283],
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
    'swamibagh': [23.715586, 90.425205],
    'sherebanglanagar': [23.772615, 90.377102],
    'sutrapur': [23.711525, 90.420535],
    'tatiBazar': [23.712238, 90.407623],
    'tikatoli': [23.720132, 90.422376],
    'tejkunipara': [23.761444, 90.392414],
    'tejgaon': [23.759809, 90.391548],
    'turag': [23.802133, 90.345670],
    'tezturibazar': [23.756232, 90.392004],
    'tongi': [23.901748, 90.409285],
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

}


// Chittagong map
function chittagongMap() {
 
  var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: '&copy; <a href="//openstreetmap.org/copyright">OpenStreetMap</a> contributors, Points &copy 2012 LINZ'
  });

  var map = L.map('ctgMap', {
    center: L.latLng(22.3569, 91.7832),
    zoom: 12,
    layers: [tiles]
  });

  var mcg = L.markerClusterGroup({
    chunkedLoading: true,
    singleMarkerMode: true,
    spiderfyOnMaxZoom: true
  });

  var points=[]

var todays_data = {
  
  'sagorika':4,
  'sitakunda':1,
  'halishaor':2,
  'nursary':2,
  'dampara':1,
  'kattoli':2,
  'saraipara':2, 
  'satkaniya':12 ,
  'boyalhali':1, 
  'pahartoli':4,
  'firingibazar':1,
  'akbarshah':1, 
  'patia':2 ,
  'foijdarhat':1 ,
  'katalganj':1,
  'bandar':1, 
  'Anwara':1, 
  'coxbazar':1,
  'teknaf':1,
  'moheskkhali':3 
 
}

var city = chittagongCity = {
  'sagorika':  [22.355911, 91.775850],
  'sitakunda': [22.621275, 91.656586],
  'nursary': [22.354712, 91.823656],
  'dampara': [22.354007, 91.820853],
  'kattoli': [22.370171, 91.767972],
  'saraipara': [22.353352, 91.789981],
  'boyalhali': [22.388600, 91.907544],
  'pahartoli': [22.3667,91.7750],
  'firingibazar': [22.3298,91.8363],
  'akbarshah': [22.374119, 91.780853],
  'patia': [22.3569, 91.7832],
  'foijdarhat': [22.4018,91.7587],

  'katalganj': [22.3618,91.8376],
  'bandar': [22.3104, 91.8014],
  'Anwara': [22.2337, 91.8660], 
  'coxbazar': [21.4272, 92.0058],
  'teknaf': [21.0557, 92.2040],
  'moheskkhali': [21.5834, 91.9295]
  
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
}

// ZelaMap
zelaMap();
// Dhaka Map
dhakaMap();
// Chittagong Map
chittagongMap();
