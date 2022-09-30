var signal_issue_region =
  "http://localhost:8090/iserver/services/map-SUSL_WS/rest/maps/signal_region%40signal_isses_regions";
  
var student_loc =
"http://localhost:8090/iserver/services/map-SUSL_WS/rest/maps/tower_location%40signal_issues";

var resultLayer;
let s_name, s_humidity, s_speed;
var Style1 =  new ol.style.Style({
  stroke: new ol.style.Stroke({
    color: 'yellow',
    width: 3
  }),
  fill: new ol.style.Fill({
    color: 'rgba(0, 0, 255, 0.1)'
  })
})
var Style2 = new ol.style.Style({
  stroke: new ol.style.Stroke({
    color: 'red',
    width: 3
  }),
  fill: new ol.style.Fill({
    color: 'rgba(0, 0, 255, 0.1)'
  })
})

var Style3 = new ol.style.Style({
  stroke: new ol.style.Stroke({
    color: 'green',
    width: 3
  }),
  fill: new ol.style.Fill({
    color: 'rgba(0, 0, 255, 0.1)'
  })
})

function query(e, style) {
  console.log(e);

  map.removeLayer(resultLayer);
  var param = new ol.supermap.QueryBySQLParameters({
    queryParams: {
      name: "signal_region@signal_isses_regions",
      attributeFilter: "NAME_1 = '" + e + "'",
    },
  });

  new ol.supermap.QueryService(signal_issue_region).queryBySQL(
    param,
    function (serviceResult) {
      console.log(serviceResult);
      var vectorSource = new ol.source.Vector({
        features: new ol.format.GeoJSON().readFeatures(
          serviceResult.result.recordsets[0].features
        ),

        wrapX: false,
      });
      console.log(serviceResult.result.recordsets[0].features);

      resultLayer = new ol.layer.Vector({
        source: vectorSource,
        style: style,
      });

      map.addLayer(resultLayer);
    }
  );
}

let signal = {
  apikey: "2d25e0adccacbedbb6df358d16284d8b",
  getsignal: function (citiy) {
    fetch(
      "https://api.openweathermap.org/data/2.5/weather?q=" +
        citiy +
        "&appid=" +
        this.apikey
    )
      .then((response) => response.json())
      .then((data) => this.displaysignal(data));
  },

  displaysignal: function (data) {
    s_name = data.name;
    
    s_humidity = data.main;
    s_speed = data.wind.speed;
    
    
  },
};


function signalval(value) {
  signal.getsignal(`${value}`);
  if (s_speed < 2) {
    query(value, Style1);
  } else if (s_speed >= 2 && s_speed < 3) {
    query(value, Style3);
  } else {
    query(value, Style2);
  }
}


function get_allst() {
  var param = new ol.supermap.QueryBySQLParameters({
    queryParams: {
      name: "tower_location@signal_issues",
    },
  });

  new ol.supermap.QueryService(student_loc).queryBySQL(
    param,
    function (serviceResult) {
      var vectorSource = new ol.source.Vector({
        features: new ol.format.GeoJSON().readFeatures(
          serviceResult.result.recordsets[0].features
        ),
        wrapX: false,
      });
      console.log(serviceResult.result.recordsets[0].features);
      layer1 = new ol.layer.Vector({
        source: vectorSource,
        style: Style1,
      });
      map.addLayer(layer1);
    }
  );
}

get_allst();