/* Callie Federer and Sean Hellebusch 
   A lyric checker for KTRM DJs to stay FCC appropriate*/ 
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

/* Checks lyrics after user submits for any of the words
   in the offensive array. The function then creates new
   paragraphs from the original array of input and highlights
   them in read if they contain an FCC-banned word  */
function checkLyrics() {
  /* count if any words found */
  var count = 0; 
	var input = document.querySelector("textarea");
	var lyrics = input.value.toLowerCase();
	/* sanitize */
	lyrics = escapeHTML(lyrics);
	lyrics = lyrics.split("\n");
	var area = document.getElementById("checked");
	/* check for bad word, highlight if exists in line, and create p*/
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

/* If no FCC banned words found, print out appropriate message.
   If any words are found, print out inappropriate message */
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

/* refreshes page to allow user to submit new lyrics */ 
function refresh(){
	location.reload();
}

/* Stolen from the interwebs http://www.htmlescape.net/stringescape_tool.html
   sanitizes user input from any HTML special characters */ 
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
