<?php  
function getCurrentDate(){
      var m = new Date();
      var d = new Date();
      var y = new Date();
      var month = m.getMonth() + 1;
      var day = d.getDate();
      var year = y.getFullYear();
      document.getElementById("date").innerHTML = month + "/" + day + "/" + year;
  }
?>