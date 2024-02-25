function timeConversion(s) {
  let time = s.split(":");

  if (time[0] == "12" && time[2].includes("AM")) {
    time[0] = "00";
  } else if (time[0] == "12" && time[2].includes("PM")) {
    return s.slice(0, 8);
  } else if (time[2].includes("PM")) {
    time[0] = Number(time[0]) + 12;
  }
  time[2] = time[2].slice(0, 2);

  return time.join(":");
}

const input = "12:00:00AM";
console.log(timeConversion(input));
