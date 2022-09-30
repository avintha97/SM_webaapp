
       var  url = "http://localhost:8090/iserver/services/map-SUSL_WS/rest/maps/susl_points%40susl_data";
       var map = new ol.Map({
           target: 'map',
           controls: ol.control.defaults({attributionOptions: {collapsed: false}})
           .extend([new ol.supermap.control.Logo()]),
           view: new ol.View({
               center: [80.7878 ,6.710],
               zoom: 15,
               projection: 'EPSG:4326',
               multiWorld: true
           })
           
       });
      var basemap = new ol.layer.Tile({
        title:'Basemap',
       visible:true,
       source : new ol.source.OSM()
      })
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
   
       var layer1 = new ol.layer.Tile({
        title:'Uinversity Area',
           source: new ol.source.TileSuperMapRest({
               url: url,
               wrapX:true
           }),
           projection: 'EPSG:4326'
       });
       map.addLayer(basemap);
       map.addLayer(satelite_Layer);
       map.addLayer(layer1);
       map.addControl(new ol.supermap.control.ScaleLine());
       
var layerSwitcher = new ol.control.LayerSwitcher({
    tipLabel: 'Legend',
    activationMode : 'click',
    startActive : false,
    groupSelectStyle :'children'
  });
  map.addControl(layerSwitcher);
   