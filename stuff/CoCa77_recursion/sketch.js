function setup() {
  createCanvas(windowWidth, windowHeight);
}

function draw() {
  background(100);
  stroke(255);
  noFill();
  drawCircle(300, height/2, 300);
	noLoop();
}

function drawCircle(x, y, d) {

  ellipse(x, y, d);
	if (d > 2) {
		
		drawCircle(x + d * 0.5, y, d * 0.5);
		drawCircle(x - d * 0.5, y, d * 0.5);

		//drawCircle(x, y + d * 0.5, d * 0.5);

	}


}
