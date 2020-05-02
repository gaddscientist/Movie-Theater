function hideMonthly(x) {
    if (x.checked) {
      document.getElementById("month").style.display = "none";
      document.getElementById("day").style.display = "block";

      document.getElementById("daily").checked = true;
    }
  }
 
  function hideDaily(x) {
    if (x.checked) {
      document.getElementById("day").style.display = "none";
      document.getElementById("month").style.display = "block";

      document.getElementById("monthly").checked = true;
    }
  }

