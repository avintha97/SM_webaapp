const hourEl = document.getElementById("hour");
const minuteEl = document.getElementById("minutes");
const secondEl = document.getElementById("seconds");
const amPm = document.getElementById("ampm");
const yearEl = document.getElementById("year");
const monthEl = document.getElementById("month");
const dayEl = document.getElementById("day");
//const weatherinput = document.getElementById("weather").value;
const admin_weatherinput = document.getElementById("weather_query").value;
//console.log(weatherinput);

function updateClock() {
  let h = new Date().getHours();
  let m = new Date().getMinutes();
  let s = new Date().getSeconds();

  let ampm = "AM";

  if (h > 12) {
    h = h - 12;
    ampm = "PM";
  }

  h = h < 10 ? "0" + h : h;
  m = m < 10 ? "0" + m : m;
  s = s < 10 ? "0" + s : s;

  hourEl.innerText = h;
  minuteEl.innerText = m;
  secondEl.innerText = s;
  amPm.innerHTML = ampm;
  yearEl.innerHTML = new Date().getFullYear();
  monthEl.innerHTML = new Date().getMonth();
  dayEl.innerHTML = new Date().getDate();

  setTimeout(() => {
    updateClock();
  }, 1000);
}

updateClock();


//weather api 

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
document.getElementById("town").innerText ="Location :     " + name;
//document.getElementById("icon").src = " http://openweathermap.org/img/wn/"+icon+"2x.png";
document.getElementById("temp").innerText = "Temperature : " +temp;
document.getElementById("humidity").innerText ="Humidity :  "+ humidity;
document.getElementById("speed").innerText ="Wind Speed :" + speed;

  }
}


let signal = {
  apikey : "2d25e0adccacbedbb6df358d16284d8b",
  getsignal : function(citiy){
    fetch("https://api.openweathermap.org/data/2.5/weather?q="+citiy+"&appid="+ this.apikey)
    .then(response => response.json())
    .then(data => this.displayWeather(data));
  },

  displaysignal : function(data){
let {name} = data;
let {icon,description} = data.weather[0];
let {temp,humidity} = data.main;
let {speed} = data.wind;
console.log(name,icon,description,temp,humidity,speed);
// document.getElementById("town").innerText ="Location :     " + name;
// //document.getElementById("icon").src = " http://openweathermap.org/img/wn/"+icon+"2x.png";
// document.getElementById("temp").innerText = "Temperature : " +temp;
// document.getElementById("humidity").innerText ="Humidity :  "+ humidity;
// document.getElementById("speed").innerText ="Wind Speed :" + speed;

  }
}


    function weathervalue(value){
        weather.getWeather(`${value}`);
    }

    function signalval(value){
      console.log(signal.getsignal(`${value}`));
    }
   

    


