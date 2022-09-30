var resultLayer, layer1;

var url =
  "http://localhost:8090/iserver/services/map-SUSL_WS/rest/maps/powercut_region%40power_cut_data";
var student_loc =
  "http://localhost:8090/iserver/services/map-SUSL_WS/rest/maps/T18ges_student_location%40st_location";

//var url2 ="http://localhost:8090/iserver/services/map-SUSL_WS/rest/maps/signal_region%40signal_isses_regions";
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

map.addLayer(satelite_Layer);
// var layer1 = new ol.layer.Tile({
//   source: new ol.source.TileSuperMapRest({
//     url: url1,
//     wrapX: true,
//   }),
//   projection: "EPSG:4326",
// });

// var overlays = new ol.layer.Group({
//   title: 'Overlays',
//   layers: [basemap]
// });

///////////////////////////////////////////////////////////////////
var Style1 = new ol.style.Style({
  image: new ol.style.Circle({
    fill: new ol.style.Fill({
      color: "red",
    }),

    radius: 5,
  }),
});
var Style2 = new ol.style.Style({
  fill: new ol.style.Fill({
    color: "rgba(255, 255, 255, 0.5)", //'#ffffff'
  }),
  stroke: new ol.style.Stroke({
    color: "#ffcc33",
    width: 4,
  }),
});

map.addLayer(basemap);
//map.addLayer(layer1);
map.addControl(new ol.supermap.control.ScaleLine());

var hour = new Date().getHours();
// if(hour>12){
//     hour = hour-12;
// }
// console.log(hour);

//query functions

function query(e) {
  map.removeLayer(resultLayer);
  var param = new ol.supermap.QueryBySQLParameters({
    queryParams: {
      name: "powercut_region@power_cut_data#1",
      attributeFilter: `region == ${e}`,
    },
  });

  new ol.supermap.QueryService(url).queryBySQL(param, function (serviceResult) {
    var vectorSource = new ol.source.Vector({
      features: new ol.format.GeoJSON().readFeatures(
        serviceResult.result.recordsets[0].features
      ),
      wrapX: false,
    });

    console.log(serviceResult.result.recordsets[0].features);

    resultLayer = new ol.layer.Vector({
      title:'powercut Area',
      source: vectorSource,
      style: Style2,
    });
    map.addLayer(resultLayer);
  });
}

if (hour >= 6 && hour <= 8) {
  query(1);
} else if (hour >= 8 && hour <= 10) {
  query(2);
} else if (hour >= 10 && hour <= 12) {
  query(3);
} else if (hour >= 12 && hour <= 15) {
  query(4);
} else if (hour >= 15 && hour <= 24) {
  query(5);
} else {
  //alert("this time no power cut!");
  //query(1);
}


  var param = new ol.supermap.QueryBySQLParameters({
    queryParams: {
      name: "T18ges_student_location@st_location",
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
      console.log(serviceResult.result);
      layer1 = new ol.layer.Vector({
        title:'view all students',
        source: vectorSource,
        style: Style1,
      });
      map.addLayer(layer1);
    }
  );



 
 

var layerSwitcher = new ol.control.LayerSwitcher({
  tipLabel: 'Legend',
  activationMode : 'click',
  startActive : false,
  groupSelectStyle :'children'
});
map.addControl(layerSwitcher);
function remove_lyr() {
  layer1.getSource().clear();
}
//get_allst();

// var source = new ol.source.Vector({wrapX: false});
// var Lyr = new ol.layer.Vector({
//    source: source
// });

function show_all_std(value) {
  if (value == 1) {
    get_allst();
  } else if (value == 0) {
    remove_allst();
  }
}

// function showAll_std(value){
//   if(value==1){
//     showAll()
//   }else{
//     map.removeLayer(layer1);
//   }
// }

//st_loc(username)

// var resultLayer;

// var url =
//   "http://localhost:8090/iserver/services/map-SUSL_WS/rest/maps/powercut_region%40power_cut_data";
//   var url1 ="http://localhost:8090/iserver/services/map-SUSL_WS/rest/maps/powercut_region%40power_cut_data1";
// var map = new ol.Map({
//   target: "map",
//   controls: ol.control
//     .defaults({ attributionOptions: { collapsed: false } })
//     .extend([new ol.supermap.control.Logo()]),
//   view: new ol.View({
//     center: [80.15, 7.95],
//     zoom: 7,
//     projection: "EPSG:4326",
//     multiWorld: true,
//   }),
// });
// var basemap = new ol.layer.Tile({
//   visible: true,
//   source: new ol.source.OSM(),
// });

// // var layer1 = new ol.layer.Tile({
// //   source: new ol.source.TileSuperMapRest({
// //     url: url1,
// //     wrapX: true,
// //   }),
// //   projection: "EPSG:4326",
// // });

// ///////////////////////////////////////////////////////////////////
// var Style1 = new ol.style.Style({

//     image : new ol.style.Circle({
//         fill : new ol.style.Fill({
//         color:'red'

//     }),

//     radius : 5
//     }),
//       });
//       var Style2 = new ol.style.Style({

//         fill : new ol.style.Fill({
//             color:'green'

//         }),
//           });

// map.addLayer(basemap);
// //map.addLayer(layer1);
// map.addControl(new ol.supermap.control.ScaleLine());

// var hour = new Date().getHours();
// // if(hour>12){
// //     hour = hour-12;
// // }
// // console.log(hour);

// //query functions

// function query(e) {
//   map.removeLayer(resultLayer);
//   var param = new ol.supermap.QueryBySQLParameters({
//     queryParams: {
//       name: "powercut_region@power_cut_data#1",
//       attributeFilter: `region == ${e}`,
//     },
//   });

//   new ol.supermap.QueryService(url).queryBySQL(param, function (serviceResult) {
//     var vectorSource = new ol.source.Vector({
//       features: new ol.format.GeoJSON().readFeatures(
//         serviceResult.result.recordsets[0].features
//       ),
//       wrapX: false,
//     });

//     resultLayer = new ol.layer.Vector({
//       source: vectorSource,
//       style:Style2
//     });
//     map.addLayer(resultLayer);
//   });
// }

// if (hour >= 6 && hour <= 8) {
//     query(1);
//   } else if (hour >= 8 && hour <= 10) {
//     query(2);
//   } else if (hour >= 10 && hour <= 12) {
//     query(3);
//   } else if (hour >= 12 && hour <= 15) {
//     query(4);
//   } else if (hour>= 15 && hour <= 24) {
//     query(5);
//   }else{
//     //alert("this time no power cut!");
//     //query(1);
//   }

// var param = new ol.supermap.QueryBySQLParameters({
//     queryParams: {
//       name: "student_locations@power_cut_data"

//     },
//   });

//   new ol.supermap.QueryService(url1).queryBySQL(param, function (serviceResult) {
//     var vectorSource = new ol.source.Vector({
//       features: new ol.format.GeoJSON().readFeatures(
//         serviceResult.result.recordsets[0].features
//       ),
//       wrapX: false,
//     });
//     //console.log(serviceResult.result.recordsets[0].features);
//     layer1 = new ol.layer.Vector({
//       source: vectorSource,
//       style:Style1
//     });
//     map.addLayer(layer1);
//   });

// const username = document.getElementById("uname").innerText;
// console.log(username);
