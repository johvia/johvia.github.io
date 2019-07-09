var font;

var vehicles = [];

var points;

var txt;

var oldtxt;

var pt = [];

var vehicle;

function preload() {
	font = loadFont('assets/NixieOne.ttf');
}

function windowResized() {
	resizeCanvas(windowWidth-200,windowHeight-200);
}

function setup() {
	createCanvas(windowWidth-200,windowHeight-200);
	txt = document.getElementById('text').value;
	oldtxt = document.getElementById('text').value;
	background(51);
	// textFont(font);
	// textSize(148);
	// fill(255);
	// noStroke();
	// text('Johvia', 100, 200);

	// points = font.textToPoints(txt, 100, 200, 148);
	updatePoints();
	makeTxt();

}



function draw() {


	background(51);
	for (var i = 0; i < vehicles.length; i++){
		var v = vehicles[i];
		v.behaviors();
		v.update();
		v.show();
	}
	// console.log(txt);

	txt = document.getElementById('text').value;

	if (txt === oldtxt){
		// console.log("no update");
	}else {
		clear();

		cleanArray();

		updatePoints();

		makeTxt();
	}

}



function makeTxt() {

	for (var i = 0; i < points.length ;i++) {
		pt = points[i];
		vehicle = new Vehicle(pt.x,pt.y);
		vehicles.push(vehicle);

	}
}

function updatePoints(){
	txt = document.getElementById('text').value;
	oldtxt = document.getElementById('text').value;
	points = font.textToPoints(txt, 100, 200, 168);
}

function cleanArray(){
	for (var i = 0; i < points.length ;i++) {
		pt = points[i];
		vehicle = new Vehicle(pt.x,pt.y);
		vehicles.splice(vehicle,1);
		pt = [];
	}
}
