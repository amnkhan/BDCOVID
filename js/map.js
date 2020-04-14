(function(){
  var geojson_data;
$.ajax({
  url: "https://raw.githubusercontent.com/amnkhan/BDCOVID19/backend/district.json?token=AGEC3QTGI75FDKN4WVLZ7U26T3BUS",
  method: "GET",
  async: false,
  success : function(data){
    geojson_data = JSON.parse(data);
  }
});
var mapboxAccessToken = "pk.eyJ1IjoiYW1ua2hhbiIsImEiOiJjazg3ZzJpdmswNXp4M2dxdnR5NnM2b3V5In0.sDPqIb4yM4CSY8mzsDaX8w";
var map = L.map('map').setView([23.6850, 90.3563], 6);

//https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'
//c
function responsiveMap(x) {
  if (x.matches) { // If media query matches
      //https://cartodb-basemaps-{s}.global.ssl.fastly.net/dark_all/{z}/{x}/{y}.png
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
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
  return  d > 150 ? '#9E0000' :
  d > 120  ? '#FF0000' :
  d > 70   ? '#F64747' :
  d > 30   ? '#FF6464' :
  d > 0   ? '#F98F8F' :
  '#F3CECE';
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


var adressPoints = [
  // Last Update Data (14/04/2020)
  [23.773539, 90.354871, "2"], // adabor
  [23.773539, 90.354871, "2"], // adabor
  [23.779344, 90.373559, "2"], // Agargaon
  [23.779344, 90.373559, "2"], // Agargaon
  [23.716823, 90.401512, "1"], // Armanitola
  [23.853672, 90.418204, "1"], // Ashkona
  [23.726896, 90.386354, "4"], // Azimpur
  [23.726896, 90.386354, "4"], // Azimpur
  [23.726896, 90.386354, "4"], // Azimpur
  [23.726896, 90.386354, "4"], // Azimpur
  [23.711039, 90.403224, "11"], // Babu Bazar
  [23.711039, 90.403224, "11"], // Babu Bazar
  [23.711039, 90.403224, "11"], // Babu Bazar
  [23.711039, 90.403224, "11"], // Babu Bazar
  [23.711039, 90.403224, "11"], // Babu Bazar
  [23.711039, 90.403224, "11"], // Babu Bazar
  [23.711039, 90.403224, "11"], // Babu Bazar
  [23.711039, 90.403224, "11"], // Babu Bazar
  [23.711039, 90.403224, "11"], // Babu Bazar
  [23.711039, 90.403224, "11"], // Babu Bazar
  [23.711039, 90.403224, "11"], // Babu Bazar
  [23.780856, 90.426083, "4"], // Badda
  [23.780856, 90.426083, "4"], // Badda
  [23.780856, 90.426083, "4"], // Badda
  [23.780856, 90.426083, "4"], // Badda
  [23.741409, 90.406352, "3"], // Baily Road
  [23.741409, 90.406352, "3"], // Baily Road
  [23.741409, 90.406352, "3"], // Baily Road
  [23.793272, 90.404535, "7"], // Banani
  [23.793272, 90.404535, "7"], // Banani
  [23.793272, 90.404535, "7"], // Banani
  [23.793272, 90.404535, "7"], // Banani
  [23.793272, 90.404535, "7"], // Banani
  [23.793272, 90.404535, "7"], // Banani
  [23.793272, 90.404535, "7"], // Banani
  [23.718337, 90.400656, "7"], // Bangshal
  [23.718337, 90.400656, "7"], // Bangshal
  [23.718337, 90.400656, "7"], // Bangshal
  [23.718337, 90.400656, "7"], // Bangshal
  [23.718337, 90.400656, "7"], // Bangshal
  [23.718337, 90.400656, "7"], // Bangshal
  [23.718337, 90.400656, "7"], // Bangshal
  [23.708767, 90.418856, "1"], // Banianagar
  [23.742694, 90.430774, "14"], // Basabo
  [23.742694, 90.430774, "14"], // Basabo
  [23.742694, 90.430774, "14"], // Basabo
  [23.742694, 90.430774, "14"], // Basabo
  [23.742694, 90.430774, "14"], // Basabo
  [23.742694, 90.430774, "14"], // Basabo
  [23.742694, 90.430774, "14"], // Basabo
  [23.742694, 90.430774, "14"], // Basabo
  [23.742694, 90.430774, "14"], // Basabo
  [23.742694, 90.430774, "14"], // Basabo
  [23.742694, 90.430774, "14"], // Basabo
  [23.742694, 90.430774, "14"], // Basabo
  [23.742694, 90.430774, "14"], // Basabo
  [23.742694, 90.430774, "14"], // Basabo
  [23.819544, 90.452467, "4"], // Bashundhora
  [23.819544, 90.452467, "4"], // Bashundhora
  [23.819544, 90.452467, "4"], // Bashundhora
  [23.819544, 90.452467, "4"], // Bashundhora
  [23.763656, 90.403404, "1"], // Begunbari
  [23.831556, 90.414683, "1"], // Beribadh
  [23.754772, 90.358890, "1"], // Bosila
  [23.726805, 90.392663, "1"], // Buet Area
  [23.742082, 90.387711, "1"], // Central Road
  [23.717264, 90.396289, "5"], // Chawk Bazar
  [23.717264, 90.396289, "5"], // Chawk Bazar
  [23.717264, 90.396289, "5"], // Chawk Bazar
  [23.717264, 90.396289, "5"], // Chawk Bazar
  [23.717264, 90.396289, "5"], // Chawk Bazar
  [23.724669, 90.389934, "1"], // Dhakkeshori 
  [23.747702, 90.374453, "15"], // Dhanmondi
  [23.747702, 90.374453, "15"], // Dhanmondi
  [23.747702, 90.374453, "15"], // Dhanmondi
  [23.747702, 90.374453, "15"], // Dhanmondi
  [23.747702, 90.374453, "15"], // Dhanmondi
  [23.747702, 90.374453, "15"], // Dhanmondi
  [23.747702, 90.374453, "15"], // Dhanmondi
  [23.747702, 90.374453, "15"], // Dhanmondi
  [23.747702, 90.374453, "15"], // Dhanmondi
  [23.747702, 90.374453, "15"], // Dhanmondi
  [23.747702, 90.374453, "15"], // Dhanmondi
  [23.747702, 90.374453, "15"], // Dhanmondi
  [23.747702, 90.374453, "15"], // Dhanmondi
  [23.747702, 90.374453, "15"], // Dhanmondi
  [23.747702, 90.374453, "15"], // Dhanmondi
  [23.715012, 90.414091, "1"], // Dholaikhal
  [23.708340, 90.428770, "1"], // Doyaganj
  [23.748978, 90.398961, "1"], // Eskaton
  [23.757565, 90.387173, "1"], // Farmgate
  [23.701539, 90.428961, "6"], // Gendaria
  [23.701539, 90.428961, "6"], // Gendaria
  [23.701539, 90.428961, "6"], // Gendaria
  [23.701539, 90.428961, "6"], // Gendaria
  [23.701539, 90.428961, "6"], // Gendaria
  [23.701539, 90.428961, "6"], // Gendaria
  [23.749633, 90.386552, "9"], // Green Road
  [23.749633, 90.386552, "9"], // Green Road
  [23.749633, 90.386552, "9"], // Green Road
  [23.749633, 90.386552, "9"], // Green Road
  [23.749633, 90.386552, "9"], // Green Road
  [23.749633, 90.386552, "9"], // Green Road
  [23.749633, 90.386552, "9"], // Green Road
  [23.749633, 90.386552, "9"], // Green Road
  [23.749633, 90.386552, "9"], // Green Road
  [23.722778, 90.413594, "2"], // Gulistan
  [23.722778, 90.413594, "2"], // Gulistan
  [23.792312, 90.407525, "4"], // Gulshan
  [23.792312, 90.407525, "4"], // Gulshan
  [23.792312, 90.407525, "4"], // Gulshan
  [23.792312, 90.407525, "4"], // Gulshan
  [23.770476, 90.414254, "1"], // Hatir jhil
  [23.742991, 90.388278, "2"], // Hatirpool 
  [23.742991, 90.388278, "2"], // Hatirpool 
  [23.736192, 90.362894, "8"], // Hazaribagh 
  [23.736192, 90.362894, "8"], // Hazaribagh 
  [23.736192, 90.362894, "8"], // Hazaribagh 
  [23.736192, 90.362894, "8"], // Hazaribagh 
  [23.736192, 90.362894, "8"], // Hazaribagh 
  [23.736192, 90.362894, "8"], // Hazaribagh 
  [23.736192, 90.362894, "8"], // Hazaribagh 
  [23.736192, 90.362894, "8"], // Hazaribagh 
  [23.710128, 90.407251, "2"], // Islampur 
  [23.710128, 90.407251, "2"], // Islampur 
  [23.718362, 90.398133, "2"], // Jailgate 
  [23.718362, 90.398133, "2"], // Jailgate 
  [23.711412, 90.434684, "16"], // Jatrabari  
  [23.711412, 90.434684, "16"], // Jatrabari  
  [23.711412, 90.434684, "16"], // Jatrabari  
  [23.711412, 90.434684, "16"], // Jatrabari  
  [23.711412, 90.434684, "16"], // Jatrabari  
  [23.711412, 90.434684, "16"], // Jatrabari  
  [23.711412, 90.434684, "16"], // Jatrabari  
  [23.711412, 90.434684, "16"], // Jatrabari  
  [23.711412, 90.434684, "16"], // Jatrabari  
  [23.711412, 90.434684, "16"], // Jatrabari  
  [23.711412, 90.434684, "16"], // Jatrabari  
  [23.711412, 90.434684, "16"], // Jatrabari  
  [23.711412, 90.434684, "16"], // Jatrabari  
  [23.711412, 90.434684, "16"], // Jatrabari  
  [23.711412, 90.434684, "16"], // Jatrabari  
  [23.711412, 90.434684, "16"], // Jatrabari  
  [23.741270, 90.373059, "3"], // Jigatala   
  [23.741270, 90.373059, "3"], // Jigatala   
  [23.741270, 90.373059, "3"], // Jigatala   
  [23.724964, 90.367030, "1"], // Kamrangir Char   
  [23.805015, 90.375302, "1"], // Kazi para   
  [23.701179, 90.397577, "1"], // Kodomtoli   
  [23.718123, 90.408971, "2"], // Kotowali  
  [23.718123, 90.408971, "2"], // Kotowali  
  [23.718297, 90.386528, "15"], // Lalbagh   
  [23.718297, 90.386528, "15"], // Lalbagh   
  [23.718297, 90.386528, "15"], // Lalbagh   
  [23.718297, 90.386528, "15"], // Lalbagh   
  [23.718297, 90.386528, "15"], // Lalbagh   
  [23.718297, 90.386528, "15"], // Lalbagh   
  [23.718297, 90.386528, "15"], // Lalbagh   
  [23.718297, 90.386528, "15"], // Lalbagh   
  [23.718297, 90.386528, "15"], // Lalbagh   
  [23.718297, 90.386528, "15"], // Lalbagh   
  [23.718297, 90.386528, "15"], // Lalbagh   
  [23.718297, 90.386528, "15"], // Lalbagh   
  [23.718297, 90.386528, "15"], // Lalbagh   
  [23.718297, 90.386528, "15"], // Lalbagh   
  [23.718297, 90.386528, "15"], // Lalbagh   
  [23.712774, 90.416525, "2"], // Laxmibazar    
  [23.712774, 90.416525, "2"], // Laxmibazar    
  [23.754010, 90.412712, "2"], // Malibagh    
  [23.754010, 90.412712, "2"], // Malibagh    
  [23.826032, 90.391651, "1"], // Manikdi    
  [23.715046, 90.430468, "2"], // Mirhajaribagh    
  [23.715046, 90.430468, "2"], // Mirhajaribagh    
  [23.795560, 90.353553, "5"], // Mirpur-1    
  [23.795560, 90.353553, "5"], // Mirpur-1    
  [23.795560, 90.353553, "5"], // Mirpur-1    
  [23.795560, 90.353553, "5"], // Mirpur-1    
  [23.795560, 90.353553, "5"], // Mirpur-1    
  [23.751699, 90.380057, "2"], // Mirpur-6    
  [23.751699, 90.380057, "2"], // Mirpur-6    
  [23.806963, 90.368694, "5"], // Mirpur-10    
  [23.806963, 90.368694, "5"], // Mirpur-10    
  [23.806963, 90.368694, "5"], // Mirpur-10    
  [23.806963, 90.368694, "5"], // Mirpur-10    
  [23.806963, 90.368694, "5"], // Mirpur-10    
  [23.816282, 90.366200, "11"], // Mirpur-11   
  [23.816282, 90.366200, "11"], // Mirpur-11   
  [23.816282, 90.366200, "11"], // Mirpur-11   
  [23.816282, 90.366200, "11"], // Mirpur-11   
  [23.816282, 90.366200, "11"], // Mirpur-11   
  [23.816282, 90.366200, "11"], // Mirpur-11   
  [23.816282, 90.366200, "11"], // Mirpur-11   
  [23.816282, 90.366200, "11"], // Mirpur-11   
  [23.816282, 90.366200, "11"], // Mirpur-11   
  [23.816282, 90.366200, "11"], // Mirpur-11   
  [23.816282, 90.366200, "11"], // Mirpur-11   
  [23.828341, 90.363946, "10"], // Mirpur-12   
  [23.828341, 90.363946, "10"], // Mirpur-12   
  [23.828341, 90.363946, "10"], // Mirpur-12   
  [23.828341, 90.363946, "10"], // Mirpur-12   
  [23.828341, 90.363946, "10"], // Mirpur-12   
  [23.828341, 90.363946, "10"], // Mirpur-12   
  [23.828341, 90.363946, "10"], // Mirpur-12   
  [23.828341, 90.363946, "10"], // Mirpur-12   
  [23.828341, 90.363946, "10"], // Mirpur-12   
  [23.828341, 90.363946, "10"], // Mirpur-12   
  [23.806122, 90.376176, "2"], // Mirpur-13    
  [23.806122, 90.376176, "2"], // Mirpur-13    
  [23.711584, 90.399728, "1"], // Mitford    
  [23.749621, 90.408973, "4"], // Mogbazar     
  [23.749621, 90.408973, "4"], // Mogbazar     
  [23.749621, 90.408973, "4"], // Mogbazar     
  [23.749621, 90.408973, "4"], // Mogbazar     
  [23.777818, 90.405361, "8"], // Mohakhali     
  [23.777818, 90.405361, "8"], // Mohakhali     
  [23.777818, 90.405361, "8"], // Mohakhali     
  [23.777818, 90.405361, "8"], // Mohakhali     
  [23.777818, 90.405361, "8"], // Mohakhali     
  [23.777818, 90.405361, "8"], // Mohakhali     
  [23.777818, 90.405361, "8"], // Mohakhali     
  [23.777818, 90.405361, "8"], // Mohakhali     
  [23.766534, 90.357045, "13"], // Mohammadpur     
  [23.766534, 90.357045, "13"], // Mohammadpur     
  [23.766534, 90.357045, "13"], // Mohammadpur     
  [23.766534, 90.357045, "13"], // Mohammadpur     
  [23.766534, 90.357045, "13"], // Mohammadpur     
  [23.766534, 90.357045, "13"], // Mohammadpur     
  [23.766534, 90.357045, "13"], // Mohammadpur     
  [23.766534, 90.357045, "13"], // Mohammadpur     
  [23.766534, 90.357045, "13"], // Mohammadpur     
  [23.766534, 90.357045, "13"], // Mohammadpur     
  [23.766534, 90.357045, "13"], // Mohammadpur     
  [23.766534, 90.357045, "13"], // Mohammadpur     
  [23.766534, 90.357045, "13"], // Mohammadpur     
  [23.732940, 90.416869, "1"], // Motijeel     
  [23.731740, 90.434710, "1"], // Mugda     
  [23.718502, 90.411523, "1"], // Nawabpur     
  [23.710624, 90.420724, "2"], // Narinda     
  [23.710624, 90.420724, "2"], // Narinda     
  [23.832077, 90.417861, "1"], // Nikunja      
  [23.791350, 90.366254, "2"], // Pirerbagh     
  [23.791350, 90.366254, "2"], // Pirerbagh     
  [23.732331, 90.411187, "2"], // Purana Paltan     
  [23.732331, 90.411187, "2"], // Purana Paltan     
  [23.741248, 90.415350, "5"], // Rajarbagh     
  [23.741248, 90.415350, "5"], // Rajarbagh     
  [23.741248, 90.415350, "5"], // Rajarbagh     
  [23.741248, 90.415350, "5"], // Rajarbagh     
  [23.741248, 90.415350, "5"], // Rajarbagh   
  [23.771374, 90.420645, "2"], // Rampura     
  [23.771374, 90.420645, "2"], // Rampura     
  [23.743530, 90.361716, "1"], // Rayerbazar     
  [23.720588, 90.427075, "1"], // Sayedabad      
  [23.797594, 90.357187, "2"], // Shah Ali Bagh       
  [23.797594, 90.357187, "2"], // Shah Ali Bagh       
  [23.740044, 90.394389, "2"], // Shahbag       
  [23.740044, 90.394389, "2"], // Shahbag       
  [23.710306, 90.409657, "1"], // Shakharibazar       
  [23.745642, 90.417703, "1"], // Shantibagh       
  [23.685385, 90.444839, "1"], // Shampur       
  [23.738409, 90.414125, "6"], // Shantinagar        
  [23.738409, 90.414125, "6"], // Shantinagar        
  [23.738409, 90.414125, "6"], // Shantinagar        
  [23.738409, 90.414125, "6"], // Shantinagar        
  [23.738409, 90.414125, "6"], // Shantinagar        
  [23.738409, 90.414125, "6"], // Shantinagar        
  [23.711530, 90.394387, "3"], // Showari Ghat        
  [23.711530, 90.394387, "3"], // Showari Ghat        
  [23.711530, 90.394387, "3"], // Showari Ghat        
  [23.743582, 90.408877, "1"], // Siddheshwari        
  [23.707488, 90.453712, "1"], // Sonir akhra         
  [23.711525, 90.420535, "6"], // Sutrapur           
  [23.711525, 90.420535, "6"], // Sutrapur           
  [23.711525, 90.420535, "6"], // Sutrapur           
  [23.711525, 90.420535, "6"], // Sutrapur           
  [23.711525, 90.420535, "6"], // Sutrapur           
  [23.711525, 90.420535, "6"], // Sutrapur           
  [23.759809, 90.391548, "5"], // Tejgaon            
  [23.759809, 90.391548, "5"], // Tejgaon            
  [23.759809, 90.391548, "5"], // Tejgaon            
  [23.759809, 90.391548, "5"], // Tejgaon            
  [23.759809, 90.391548, "5"], // Tejgaon            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.789089, 90.351450, "19"], // Tolarbag            
  [23.717440, 90.395512, "1"], // Urdu Road             
  [23.876136, 90.378956, "17"], // Uttara            
  [23.876136, 90.378956, "17"], // Uttara            
  [23.876136, 90.378956, "17"], // Uttara            
  [23.876136, 90.378956, "17"], // Uttara            
  [23.876136, 90.378956, "17"], // Uttara            
  [23.876136, 90.378956, "17"], // Uttara            
  [23.876136, 90.378956, "17"], // Uttara            
  [23.876136, 90.378956, "17"], // Uttara            
  [23.876136, 90.378956, "17"], // Uttara            
  [23.876136, 90.378956, "17"], // Uttara            
  [23.876136, 90.378956, "17"], // Uttara            
  [23.876136, 90.378956, "17"], // Uttara            
  [23.876136, 90.378956, "17"], // Uttara            
  [23.876136, 90.378956, "17"], // Uttara            
  [23.876136, 90.378956, "17"], // Uttara            
  [23.876136, 90.378956, "17"], // Uttara            
  [23.876136, 90.378956, "17"], // Uttara            
  [23.805200, 90.425983, "1"], // Vatara            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
  [23.717422, 90.417380, "22"], // Wari            
]




for (var i = 0; i < adressPoints.length; i++) {
    var a = adressPoints[i];
    var title = a[2];
    var marker = L.marker(new L.LatLng(a[0], a[1]), { title: title });
    marker.bindPopup(title);
    mcg.addLayer(marker);
}

map.addLayer(mcg);
