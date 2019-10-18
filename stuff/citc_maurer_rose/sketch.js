var n = 6;
var d = 71;

let n_slider;
let d_slider;

function setup() {
	createCanvas(400,400);
	n_slider = createSlider(0, 7, 6);
	d_slider = createSlider(0, 100, 71);



	angleMode(DEGREES);
}

function draw() {
	background(100);

	translate(width/2,height/2);
	stroke(255);
	strokeWeight(1);
	n = n_slider.value();
	d = d_slider.value();
	text("n = "+n, -180,-180);
	text("d = "+d, -180,-160);
	noFill();
	beginShape();
	for(let i = 0;i < 361; i++ ) {

		let k = (i*d);
		let r = 150*sin(n*k);
		let x = r * cos(k);
		let y = r * sin(k);
		vertex(x,y);

	}
	endShape(CLOSE);
	noFill();
	stroke(0,255,0, 100);
	strokeWeight(4);
	beginShape();
	for(let i = 0;i < 361; i++ ) {

		let k = i;
		let r = 150*sin(n*k);
		let x = r * cos(k);
		let y = r * sin(k);
		vertex(x,y);

	}
	endShape(CLOSE);


}
