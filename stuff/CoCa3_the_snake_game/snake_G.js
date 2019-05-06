let snake;
let rez = 1;
let food;
let w;
let h;



var indi = 0;



function setup(){
	createCanvas(window.innerWidth,window.innerHeight);
	w = floor(width / rez);
	h = floor(height / rez);
	frameRate(10);



	snake = new Snake();

	foodLocation();

}


function foodLocation() {
	// x = floor(random(w));
	let a = random(600);
	let b = random(600);

	x = lerp(0,round(random(0,29)),20);
	y = lerp(0,round(random(0,29)),20);

	// y = floor(random(h));
	food = createVector(x, y)
}

function keyPressed() {
	if(keyCode === 65){
		snake.setDir(-20,0);

	}else if (keyCode === 68) {
		snake.setDir(20,0);
	}else if (keyCode === 83) {
		snake.setDir(0,20);
	}else if (keyCode === 87) {
		snake.setDir(0,-20);
	}else if (key === '1'){
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
		indi++;
		fill(255);
		print("END GAME");
		background(255,0,50);







		// noStroke();
		// textSize(24);
		// fill(0);
		// text('Press space to restart', width/2,height/2);

		noLoop();
	}



	fill(255,0,100);
	rect(food.x,food.y,20,20);

	// console.log('X: '+food.x+'Y: '+food.y);



}
