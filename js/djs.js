"use strict";

window.onload = attachEventHandlers;

function attachEventHandlers() {
  document.getElementById("first").onclick = sortdjs;
  document.getElementById("last").onclick  = sortdjs;
  document.getElementById("email").onclick = sortdjs;
}

function sortdjs() {
  var option = this.innerHTML;
  if(option != "") {
    if(option.match(/First/) == "First")
      option = "first_name";
    if(option.match(/Last/) == "Last")
      option = "last_name";
    if(option.match(/Email/) == "Email")
      option = "email";

    var request = new XMLHttpRequest();
    
    request.onreadystatechange = function() {
          if(request.readyState == 4 && request.status == 200) {
            document.getElementById("djs").innerHTML = request.responseText;
          }
        };
          request.open( "GET", 
                        "../php/djsort.php?option=" + option,
                        true );
          request.send( null );
      }
}



