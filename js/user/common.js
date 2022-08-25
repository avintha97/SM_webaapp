var Lyr;
var areaLyr;
var line,polygon;
//Distance Measure Function
function mesuredistance(){
    var source = new ol.source.Vector({wrapX: false});
     Lyr = new ol.layer.Vector({
        source: source
    });
    map.addLayer(Lyr);
    line = new ol.interaction.Draw({
        source: source,
        type: "LineString"
    });
    line.on('drawstart', function (evt) {
        feature = evt.feature;
    });
    line.on('drawend', function () {
        var distanceMeasureParam = new ol.supermap.MeasureParameters(feature.getGeometry());
        new ol.supermap.MeasureService(url, {measureMode: ""}).measureDistance(distanceMeasureParam, function (serviceResult) {
            alert(serviceResult.result.distance );
        });
    });

    map.addInteraction(line);
};

//Area Measure Function

function mesurearea(){
    var source = new ol.source.Vector({wrapX: false});
   var Lyr = new ol.layer.Vector({
        source: source
    });
    map.addLayer(Lyr);
    polygon = new ol.interaction.Draw({
        source: source,
        type: "Polygon",
    });
    polygon.on('drawstart', function (evt) {
        feature = evt.feature;
    });
    polygon.on('drawend', function () {
        var areaMeasureParam = new ol.supermap.MeasureParameters(feature.getGeometry());
        new ol.supermap.MeasureService(url).measureArea(areaMeasureParam, function (serviceResult) {
            alert(serviceResult.result.area );
        });
    });

    map.addInteraction(polygon);
   
};

//clear function

function cleardraw(){
map.removeInteraction(line);
map.removeInteraction(polygon);
Lyr.getSource().clear();

};