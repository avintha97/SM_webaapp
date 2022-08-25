
       var  url = "http://localhost:8090/iserver/services/map-SUSL_WS/rest/maps/tower_location%40signal_issues";
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
   
       var layer1 = new ol.layer.Tile({
           source: new ol.source.TileSuperMapRest({
               url: url,
               wrapX:true
           }),
           projection: 'EPSG:4326'
       });
       map.addLayer(basemap);
       map.addLayer(layer1);
       map.addControl(new ol.supermap.control.ScaleLine());
   
      