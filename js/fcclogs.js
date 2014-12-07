"use strict";

window.onload = attachEventHandlers;

function attachEventHandlers() {
  document.getElementById("timestamp").onclick = sortlogs;
  document.getElementById("dj").onclick = sortlogs;
  document.getElementById("showtime").onclick = sortlogs;
  document.getElementById("pavolts").onclick = sortlogs;
  document.getElementById("paamps").onclick = sortlogs;
  document.getElementById("fwrdpwr").onclick = sortlogs;
  document.getElementById("readings").onclick = sortlogs;
  document.getElementById("reading0").onclick = sortlogs;
  document.getElementById("reading1").onclick = sortlogs;
  document.getElementById("reading2").onclick = sortlogs;
  document.getElementById("reading3").onclick = sortlogs;
  document.getElementById("reading4").onclick = sortlogs;
  document.getElementById("signature").onclick = sortlogs;
}

function sortlogs() {
  var option = this.innerHTML;
  console.log(option);
  if(option != "") {
    if(option.match(/Submitted/) == "Submitted")
      option = "timestamp";
    if(option.match(/DJ/) == "DJ")
      option = "dj";
    if(option.match(/Show\sTime/) == "Show Time")
      option = "showtime";
    if(option.match(/PA\sVolts/) == "PA Volts")
      option = "pa_volts";
    if(option.match(/PA\sAmps/) == "PA Amps")
      option = "pa_amps";
    if(option.match(/FWRD\sPWR/) == "FWRD PWR")
      option = "fwrd_pwr";
    if(option.match(/Readings\sOK\?/) == "Readings OK?")
      option = "readings";
    if(option.match(/PA\sVolts/) == "PA Volts")
      option = "pa_volts";
    if(option.match(/\:00/) == ":00")
      option = "r_zero";
    if(option.match(/\:12/) == ":12")
      option = "r_twelve";
    if(option.match(/\:29/) == ":29")
      option = "r_twentynine";
    if(option.match(/\:46/) == ":46")
      option = "r_fortysix";
    if(option.match(/\:55/) == ":55")
      option = "r_fiftyfive";
    if(option.match(/Signature/) == "Signature")
      option = "digital_signature";

    var request = new XMLHttpRequest();
    
    request.onreadystatechange = function() {
          if(request.readyState == 4 && request.status == 200) {
            document.getElementById("logstable").innerHTML = request.responseText;
          }
        };
          request.open( "GET", 
                        "../php/fcclogsort.php?option=" + option,
                        true );
          request.send( null );
      }
}



