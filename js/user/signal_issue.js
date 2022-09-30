var district = document.getElementById("district_value").innerText;
console.log(district);

var resultLayer;
var url =
  "http://localhost:8090/iserver/services/map-SUSL_WS/rest/maps/powercut_region%40power_cut_data";
var map = new ol.Map({
  target: "map",
  controls: ol.control
    .defaults({ attributionOptions: { collapsed: false } })
    .extend([new ol.supermap.control.Logo()]),
  view: new ol.View({
    center: [80.15, 7.95],
    zoom: 7,
    projection: "EPSG:4326",
    multiWorld: true,
  }),
});
var basemap = new ol.layer.Tile({
  title:'Basemap',
  visible: true,
  source: new ol.source.OSM(),
});
var satelite_Layer = new ol.layer.Tile({
  title:'Satelite Map',
  source: new ol.source.XYZ({
    attributions: ['Powered by Esri',
                   'Source: Esri, DigitalGlobe, GeoEye, Earthstar Geographics, CNES/Airbus DS, USDA, USGS, AeroGRID, IGN, and the GIS User Community'],
    attributionsCollapsible: false,
    url: 'https://services.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',
    maxZoom: 23
  })
});


map.addLayer(basemap);
map.addLayer(satelite_Layer);

map.addControl(new ol.supermap.control.ScaleLine());

///////////////styles/////////////////
var Style1 = new ol.style.Style({
  stroke: new ol.style.Stroke({
    color: "green",
    width: 3,
  }),
  fill: new ol.style.Fill({
    color: "rgba(0, 0, 255, 0.1)",
  }),
});
var Style2 = new ol.style.Style({
  stroke: new ol.style.Stroke({
    color: "red",
    width: 3,
  }),
  fill: new ol.style.Fill({
    color: "rgba(0, 0, 255, 0.1)",
  }),
});

var Style3 = new ol.style.Style({
  stroke: new ol.style.Stroke({
    color: "yellow",
    width: 3,
  }),
  fill: new ol.style.Fill({
    color: "rgba(0, 0, 255, 0.1)",
  }),
});

/////////////////////////////////////
//get weather

let weather = {
  apikey: "2d25e0adccacbedbb6df358d16284d8b",
  getWeather: function (citiy) {
    fetch(
      "https://api.openweathermap.org/data/2.5/weather?q=" +
        citiy +
        "&appid=" +
        this.apikey
    )
      .then((response) => response.json())
      .then((data) => this.displayWeather(data));
  },

  displayWeather: function (data) {
    
    var s_speed = data.wind.speed;

    console.log(s_speed);
    
    if (s_speed < 2) {
      console.log("hi");

      query_signal_strength(district, Style1);
    } else if (s_speed >= 2 && s_speed < 3) {
      query_signal_strength(district, Style3);
    } else {
      query_signal_strength(district, Style2);
    }
  },
};


//query function


function query_signal_strength(e, style) {
  map.removeLayer(resultLayer);
  var param = new ol.supermap.QueryBySQLParameters({
    queryParams: {
      name: "powercut_region@power_cut_data#1",
      attributeFilter: "NAME_1 = '" + e + "'",
    },
  });

  new ol.supermap.QueryService(url).queryBySQL(param, function (serviceResult) {
    var vectorSource = new ol.source.Vector({
      features: new ol.format.GeoJSON().readFeatures(
        serviceResult.result.recordsets[0].features
      ),
      wrapX: false,
    });

    resultLayer = new ol.layer.Vector({
      title:'Powercut Area',
      source: vectorSource,
      style: style,
    });

    map.addLayer(resultLayer);
  });
}

weather.getWeather(district);
var layerSwitcher = new ol.control.LayerSwitcher({
  tipLabel: "Legend",
  activationMode: "click",
  startActive: false,
  groupSelectStyle: "children",
});
map.addControl(layerSwitcher);
