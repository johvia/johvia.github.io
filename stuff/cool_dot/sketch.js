let x,y;


function setup() {
  createCanvas(600,500);
  x = width/2;
  y = height/2;
  background(221);
}

function draw() {
	background(221,0.5);
	beginShape();
  for(var i = 0; i<100; i++) {
    stroke(0);
    strokeWeight(1);
    fill(0,221,221);
    vertex(x,y);
    x-=sin((pow(y,2)*PI)/180);
    y-=sin((pow(x,2)*PI)/180);
    if(x > width) {
      x = 0;
    }
    if(x < 0) {
      x = width;
    }
    if(y > height) {
      y = 0;
    }
    if(y < 0) {
      x = height;
    }
  }
	endShape();
}
