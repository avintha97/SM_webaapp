// const hourEl = document.getElementById("hour");
// const minuteEl = document.getElementById("minutes");
// const secondEl = document.getElementById("seconds");
// const amPm = document.getElementById("ampm");
// const yearEl = document.getElementById("year");
// const monthEl = document.getElementById("month");
// const dayEl = document.getElementById("day");
// //const weatherinput = document.getElementById("weather").value;
// const admin_weatherinput = document.getElementById("weather_query").value;
// //console.log(weatherinput);

// function updateClock() {
//   let h = new Date().getHours();
//   let m = new Date().getMinutes();
//   let s = new Date().getSeconds();

//   let ampm = "AM";

//   if (h > 12) {
//     h = h - 12;
//     ampm = "PM";
//   }

//   h = h < 10 ? "0" + h : h;
//   m = m < 10 ? "0" + m : m;
//   s = s < 10 ? "0" + s : s;

//   hourEl.innerText = h;
//   minuteEl.innerText = m;
//   secondEl.innerText = s;
//   amPm.innerHTML = ampm;
//   yearEl.innerHTML = new Date().getFullYear();
//   monthEl.innerHTML = new Date().getMonth();
//   dayEl.innerHTML = new Date().getDate();

//   setTimeout(() => {
//     updateClock();
//   }, 1000);
// }

// updateClock();

// //weather api

// let weather = {
//   apikey : "2d25e0adccacbedbb6df358d16284d8b",
//   getWeather : function(citiy){
//     fetch("https://api.openweathermap.org/data/2.5/weather?q="+citiy+"&appid="+ this.apikey)
//     .then(response => response.json())
//     .then(data => this.displayWeather(data));
//   },

//   displayWeather : function(data){
// let {name} = data;
// let {icon,description} = data.weather[0];
// let {temp,humidity} = data.main;
// let {speed} = data.wind;
// console.log(name,icon,description,temp,humidity,speed);
// document.getElementById("town").innerText ="Location :     " + name;
// //document.getElementById("icon").src = " http://openweathermap.org/img/wn/"+icon+"2x.png";
// document.getElementById("temp").innerText = "Temperature : " +temp;
// document.getElementById("humidity").innerText ="Humidity :  "+ humidity;
// document.getElementById("speed").innerText ="Wind Speed :" + speed;

//   }
// }
//var url ="http://localhost:8090/iserver/services/map-SUSL_WS/rest/maps/powercut_region%40power_cut_data";
var url2 =
  "http://localhost:8090/iserver/services/map-SUSL_WS/rest/maps/tower_location%40signal_issues";
//var url1 ="http://localhost:8090/iserver/services/map-SUSL_WS/rest/maps/powercut_region%40power_cut_data1";

var resultLayer;
let s_name, s_humidity, s_speed;
var Style1 = new ol.style.Style({
  image: new ol.style.Circle({
    fill: new ol.style.Fill({
      color: "green",
    }),

    radius: 5,
  }),
});
var Style2 = new ol.style.Style({
    image: new ol.style.Circle({
        fill: new ol.style.Fill({
          color: "red",
        }),
    
        radius: 5,
      }),
});

var Style3 = new ol.style.Style({
    image: new ol.style.Circle({
        fill: new ol.style.Fill({
          color: "yellow",
        }),
    
        radius: 5,
      }),
});

function query(e,style) {
  console.log(e);

  map.removeLayer(resultLayer);
  var param = new ol.supermap.QueryBySQLParameters({
    queryParams: {
      name: "tower_location@signal_issues",
      attributeFilter: "Department = '" + e + "'",
    },
  });

  new ol.supermap.QueryService(url2).queryBySQL(
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
    //   s_speed = 4;
    //   if (s_speed < 3) {
    //     resultLayer = new ol.layer.Vector({
    //       source: vectorSource,
    //       style: Style2,
    //     });
    //   } else if (s_speed > 3 && s_speed < 5) {
    //     resultLayer = new ol.layer.Vector({
    //       source: vectorSource,
    //       style: Style1,
    //     });
    //   }

      resultLayer = new ol.layer.Vector({
          source: vectorSource,
          style: style,});

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
    //let {icon,description} = data.weather[0];
    s_humidity = data.main;
    s_speed = data.wind.speed;
    console.log(s_name);
    console.log(s_speed);
    // document.getElementById("town").innerText ="Location :     " + name;
    // //document.getElementById("icon").src = " http://openweathermap.org/img/wn/"+icon+"2x.png";
    // document.getElementById("temp").innerText = "Temperature : " +temp;
    // document.getElementById("humidity").innerText ="Humidity :  "+ humidity;
    // document.getElementById("speed").innerText ="Wind Speed :" + speed;
  },
};

// function weathervalue(value){
//     weather.getWeather(`${value}`);
// }

function signalval(value) {
  signal.getsignal(`${value}`);
  if(s_speed < 2){
    query(value,Style1);
  }else if(s_speed >= 2 && s_speed < 3 ){
    query(value,Style3);
  }else{
    query(value,Style2);
  }
  
}
