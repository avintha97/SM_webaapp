
       const district = document.getElementById("si_district").value;
       const hum_value =document.getElementById("humidity").value;
       
       
       var resultLayer;
       var  url = "http://localhost:8090/iserver/services/map-SUSL_WS/rest/maps/powercut_region%40power_cut_data";
       var map = new ol.Map({
           target: 'map',
           controls: ol.control.defaults({attributionOptions: {collapsed: false}})
           .extend([new ol.supermap.control.Logo()]),
           view: new ol.View({
               center: [ 80.15,7.95 ],
               zoom: 7,
               projection: 'EPSG:4326',
               multiWorld: true
           })
           
       });
      var basemap = new ol.layer.Tile({
       visible:true,
       source : new ol.source.OSM()
      })
   
    //    var layer1 = new ol.layer.Tile({
    //        source: new ol.source.TileSuperMapRest({
    //            url: url,
    //            wrapX:true
    //        }),
    //        projection: 'EPSG:4326'
    //    });
       map.addLayer(basemap);
       //map.addLayer(layer1);
       map.addControl(new ol.supermap.control.ScaleLine());

       ///////////////styles/////////////////
       var Style1 = new ol.style.Style({

        image : new ol.style.Circle({
            fill : new ol.style.Fill({
            color:'red'
            
        }),
        
        radius : 5
        }),
          });
          var Style2 = new ol.style.Style({
    
            stroke: new Stroke({
                color: 'blue',
                width: 3,
              }),
              fill: new Fill({
                color: 'rgba(0, 0, 255, 0.6)',
              }),
              });

              var Style3 = new ol.style.Style({
    
                stroke: new Stroke({
                    color: 'red',
                    width: 3,
                  }),
                  fill: new Fill({
                    color: 'rgba(255, 0, 255, 0.6)',
                  }),
                  });

       /////////////////////////////////////
        //get weather

      let weather = {
        apikey : "2d25e0adccacbedbb6df358d16284d8b",
        getWeather : function(citiy){
          fetch("https://api.openweathermap.org/data/2.5/weather?q="+citiy+"&appid="+ this.apikey)
          .then(response => response.json())
          .then(data => this.displayWeather(data));
        },
      
        displayWeather : function(data){
      let {name} = data;
      let {icon,description} = data.weather[0];
      let {temp,humidity} = data.main;
      let {speed} = data.wind;
      console.log(name,icon,description,temp,humidity,speed);
      document.getElementById("town").innerText = name;
      //document.getElementById("icon").src = " http://openweathermap.org/img/wn/"+icon+"2x.png";
      //document.getElementById("temp").innerText = temp;
      document.getElementById("humidity").value = humidity;
      //document.getElementById("speed").innerText = speed;
      
        }
      }
      /////////////////////////
   
      //query function

      function query(e) {
        map.removeLayer(resultLayer);
        var param = new ol.supermap.QueryBySQLParameters({
          queryParams: {
            name: "powercut_region@power_cut_data#1",
            attributeFilter: `ID_1 == ${e}`,
          },
        });
      
        new ol.supermap.QueryService(url).queryBySQL(param, function (serviceResult) {
          var vectorSource = new ol.source.Vector({
            features: new ol.format.GeoJSON().readFeatures(
              serviceResult.result.recordsets[0].features
            ),
            wrapX: false,
          });

          if(hum_value>50){
            resultLayer = new ol.layer.Vector({
              source: vectorSource,
              style:Style3
            });
          }else{
            resultLayer = new ol.layer.Vector({
              source: vectorSource,
              style:Style2
            });
          }
          
        
          map.addLayer(resultLayer);
        });
      }

      

     