"use strict";
window.onload = attachEventHandlers;

function attachEventHandlers() {
	document.getElementById('submit').onclick = checkLyrics;
	document.getElementById('refresh').onclick = refresh;
}

var BANNED_WORDS = [
	"fuck",
	"shit",
	"piss",
	"cunt",
	"cock",
	"tit ",
	" tit", 
	"titties",
	"tits",
	"titty",
	"nigga",
	"asshole",
	"clit",
	"dick",
	"dyke",
	"fag",
	"goddamn",
	"god damn",
	"jizz",
	"gizz",
    "poon",
    "pussy",
	"nigger" ];


function checkLyrics() {
  var count = 0; 
	var input = document.querySelector("textarea");
	var lyrics = input.value.toLowerCase();
	lyrics = escapeHTML(lyrics);
	lyrics = lyrics.split("\n");
	var area = document.getElementById("checked");
	for(var i = 0; i < lyrics.length; i++ ) {
		var newp = document.createElement("p");
		newp.innerHTML = lyrics[i];
		for(var k = 0; k < BANNED_WORDS.length; k++) {
			if(lyrics[i].indexOf(BANNED_WORDS[k]) != -1) {
				newp.classList.add("alert"); 
				count = count + 1; 
			}
		}
		area.appendChild(newp); 
	}
	input.classList.add("hidden"); 
	document.getElementById('submit').classList.add("hidden");
	document.getElementById('enterhere').classList.add("hidden");
	document.getElementById('refresh').classList.remove("hidden");
	notify(count); 
}

function notify(count){
  var text = document.getElementById("note"); 
  var header = document.createElement("h3");
  if(count==0){
    
    header.innerHTML = "Song looks clean!";
    header.classList.add("okay"); 
  } else {
    header.innerHTML = "Better not play this $hit";
    header.classList.add("warning"); 
  }
  text.appendChild(header); 
}

function refresh(){
	location.reload();
}

function escapeHTML(text) {
  var map = {
    '&': '&amp;',
    '<': '&lt;',
    '>': '&gt;',
    '"': '&quot;',
    "'": '&#039;'
  };
  return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}
