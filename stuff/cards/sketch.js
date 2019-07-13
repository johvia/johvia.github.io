function setup() {
	createCanvas(windowWidth,windowHeight-50);
	card = new Card();
}

function draw() {
	background(100);
	card.show();
	card.update();
}

function windowResized() {
  resizeCanvas(windowWidth, windowHeight-50);
}
