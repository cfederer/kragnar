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
	"tit",
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
	var input = document.querySelector("textarea");
	var lyrics = input.value.toLowerCase();
	lyrics = lyrics.split("\n");
	var area = document.getElementById("checked");
	for(var i = 0; i < lyrics.length; i++ ) {
		var newp = document.createElement("p");
		newp.innerHTML = lyrics[i];
		for(var k = 0; k < BANNED_WORDS.length; k++) {
			if(lyrics[i].indexOf(BANNED_WORDS[k]) != -1) {
				newp.classList.add("alert"); 
			}
		}
		area.appendChild(newp); 
	}
	input.classList.add("hidden"); 
	document.getElementById('submit').classList.add("hidden");
	document.getElementById('enterhere').classList.add("hidden");
	document.getElementById('refresh').classList.remove("hidden");
}

function refresh(){
	location.reload();
}