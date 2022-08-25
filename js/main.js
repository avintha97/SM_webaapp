const hourEl = document.getElementById("hour");
const minuteEl = document.getElementById("minutes");
const secondEl = document.getElementById("seconds");
const amPm = document.getElementById("ampm");
const yearEl = document.getElementById("year");
const monthEl = document.getElementById("month");
const dayEl = document.getElementById("day");

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


