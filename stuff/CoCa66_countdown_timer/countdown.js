var counter = 0;
var timeleft = 10;

var ding;

function preload(){
	ding = loadSound("assets/ding.wav");
}



function setup() {
	noCanvas();

	var params = getURLParams();



	if (params.minute){


	var min = params.minute;
	timeleft = min * 60;

	}
	var timer = select('#timer');
	timer.html(convertSeconds(timeleft - counter));

	var interval = setInterval(timeIt, 1000);

	function timeIt() {
		counter++;
		timer.html(convertSeconds(timeleft - counter));
		if (counter === timeleft){
			ding.play();
			clearInterval(interval);
			// counter = 0;
		}
	}


}

function convertSeconds(s){
	var min = floor(s / 60);
	var sec = s % 60;
	return nf(min,2) + ':' + nf(sec,2);
}
