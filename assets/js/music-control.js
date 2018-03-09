
var audio, playbtn, mutebtn, seekslider, volumeslider, seeking=false, seekto;
function initAudioPlayer(){
	audio = new Audio();
	audio.src = base_url + "/assets/sounds/bgm/01 Space Cruise (Title).mp3";
	audio.loop = true;
	audio.play();
	// Set object references
	playbtn = document.getElementById("playpausebtn");
	volumeslider = document.getElementById("volumeslider");
	// Add Event Handling
	playbtn.addEventListener("click",playPause);
	volumeslider.addEventListener("mousemove", setvolume);
	// Functions
		function playPause(){
			if(audio.paused){
			    audio.play();
		    } else {
			    audio.pause();
		    }
		}
		function setvolume(){
		    audio.volume = volumeslider.value / 100;
	    }
	}
window.addEventListener("load", initAudioPlayer);