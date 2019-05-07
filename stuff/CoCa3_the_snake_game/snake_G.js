let snake;
let rez = 1;
let food;
let w;
let h;

let wdth;
let hght;

var frmcnt = 10;

var indi = 0;



function setup(){
	roundbyTwenty();
	createCanvas(wdth,hght);
	w = floor(width / rez);
	h = floor(height / rez);

	frameRate(frmcnt);



	snake = new Snake();

	foodLocation();

}

function windowResized() {
	roundbyTwenty();
  resizeCanvas(wdth, hght);
}

function roundbyTwenty(){
	wdth = ((floor(floor(windowWidth / 20) / 10)) * 200) + 0;
	hght = ((floor(floor(windowHeight / 20) / 10)) * 200) + 0;
}

function foodLocation() {
	// x = floor(random(w));
	let a = random(wdth);
	let b = random(hght);

	x = lerp(0,round(random(0,wdth/20 - 20)),20);
	y = lerp(0,round(random(0,hght/20 - 20)),20);

	// y = floor(random(h));
	food = createVector(x, y)
}

function keyPressed() {
	if(keyCode === 65 && (snake.xdir === 0)){
		snake.setDir(-20,0);

	}else if (keyCode === 68 && (snake.xdir === 0)) {
		snake.setDir(20,0);
	}else if (keyCode === 83 && (snake.ydir === 0)) {
		snake.setDir(0,20);
	}else if (keyCode === 87 && (snake.ydir === 0)) {
		snake.setDir(0,-20);
	}else if (key === '1'){
		document.location.reload(true);
	}

}



// function mousePressed(){
// 	snake.grow();
// }

function draw() {
	// scale(rez);
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
