var resultLayer;

var url =
  "http://localhost:8090/iserver/services/map-SUSL_WS/rest/maps/powercut_region%40power_cut_data";
  var url1 ="http://localhost:8090/iserver/services/map-SUSL_WS/rest/maps/powercut_region%40power_cut_data1";

  var student_loc ="http://localhost:8090/iserver/services/map-SUSL_WS/rest/maps/tower_location%40signal_issues";
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
  visible: true,
  source: new ol.source.OSM(),
});

// var layer1 = new ol.layer.Tile({
//   source: new ol.source.TileSuperMapRest({
//     url: url1,
//     wrapX: true,
//   }),
//   projection: "EPSG:4326",
// });

///////////////////////////////////////////////////////////////////
var Style1 = new ol.style.Style({

    image : new ol.style.Circle({
        fill : new ol.style.Fill({
        color:'red'
        
    }),
    
    radius : 5
    }),
      });
      var Style2 = new ol.style.Style({

        fill : new ol.style.Fill({
            color:'green'
        
        
        }),
          });


map.addLayer(basemap);
//map.addLayer(layer1);
map.addControl(new ol.supermap.control.ScaleLine());

function get_allst(){
  var param = new ol.supermap.QueryBySQLParameters({
    queryParams: {
      name: "tower_location@signal_issues",
    },
  });
  
  new ol.supermap.QueryService(student_loc).queryBySQL(param, function (serviceResult) {
    var vectorSource = new ol.source.Vector({
      features: new ol.format.GeoJSON().readFeatures(
        serviceResult.result.recordsets[0].features
      ),
      wrapX: false,
    });
    console.log(serviceResult.result);
    layer1 = new ol.layer.Vector({
      source: vectorSource,
      style: Style1,
    });
    map.addLayer(layer1);
  });
 }

 get_allst();

//var hour = new Date().getHours();
// if(hour>12){
//     hour = hour-12;
// }
// console.log(hour);


//query functions

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
//     //map.addLayer(resultLayer);
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
//     //map.addLayer(layer1);
//   });

//   //weather api

//   let weather = {
//     apikey : "65efc327e78be43f15cd295b54a1060f",
//     getWeather : function(city){
//         fetch("http://api.weatherstack.com/current?access_key="+ this.apikey +"&query="+city)
//         .then(res => res.json())
//         .then(data=>this.output(data));
//     },
//     output:function(data){
//         let humidity = data.current.humidity;
//         let wind_speed =  data.current.wind_speed;
//         let precip = data.current.precip;
        


        

//     }
//   }





  

  