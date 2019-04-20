let snake;
let rez = 20;
let food;
let w;
let h;

function setup(){
	createCanvas(600,600);
	w = floor(width / rez);
	h = floor(height / rez);
	frameRate(20);
	snake = new Snake();

	foodLocation();
}


function foodLocation() {
	x = floor(random(w));
	y = floor(random(h));
	food = createVector(x, y)
}

function keyPressed() {
	if(keyCode === LEFT_ARROW){
		snake.setDir(-1,0);

	}else if (keyCode === RIGHT_ARROW) {
		snake.setDir(1,0);
	}else if (keyCode === DOWN_ARROW) {
		snake.setDir(0,1);
	}else if (keyCode === UP_ARROW) {
		snake.setDir(0,-1);
	}else if (key === ' '){
		document.location.reload(true);
	}

}



// function mousePressed(){
// 	snake.grow();
// }

function draw() {
	scale(rez);
	background(73);

	if(snake.eat(food)){
		foodLocation();
	}
	snake.update();
	snake.show();

	if(snake.endGame()) {
		fill(255);
		print("END GAME");
		background(255,0,50);
		alert('Press space to restart');




		// noStroke();
		// textSize(24);
		// fill(0);
		// text('Press space to restart', width/2,height/2);

		noLoop();
	}

	fill(255,0,100);
	rect(food.x,food.y,1,1);
}
