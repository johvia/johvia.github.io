let snake;
let rez = 20;
let food;
let w;
let h;

function setup(){
	createCanvas(600,600);
	w = floor(width / rez);
	h = floor(height / rez);
	frameRate(11);
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
		print("END GAME");
		textAlign(CENTER);
		noStroke();
		fill(0);
		text('Press space to restart',width/2,height/2)
		// background(255,0,50);

		noLoop();
	}

	fill(255,0,100);
	rect(food.x,food.y,1,1);
}
