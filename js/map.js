L.mapbox.accessToken = 'pk.eyJ1IjoiYW1ua2hhbiIsImEiOiJjazg3ZzJpdmswNXp4M2dxdnR5NnM2b3V5In0.sDPqIb4yM4CSY8mzsDaX8w';
var geojson = {
  "type": "FeatureCollection",
  "features": [
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
          90.4057,   
          23.7778
        ]
      },
    },
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
          91.7832,
          22.3569
        ]
      }
    },
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
          91.8687,
          24.8949
        ]
      }
    },
  ]
};
var map = L.mapbox.map('map')
    .setView([23.6850, 90.3563], 6)
    .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/light-v10'))
    .featureLayer.setGeoJSON(geojson);
 
 


