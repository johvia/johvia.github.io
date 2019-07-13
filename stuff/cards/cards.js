class Card {
	constructor() {
		this.r = random(0,255);
		this.g = random(0,255);
		this.b = random(0,255);

		this.x = windowWidth/2;
		this.y = windowHeight/2;

		this.dirx = 0;
		this.diry = 0;


	}
	show(){
		stroke(255);
		strokeWeight(2);
		fill(this.r, this.g, this.b);
		rect(this.x, this.y, 120, 200, 15);
		
	}
	update(){
		this.x += this.dirx;
		this.y+= this.diry;
	}




}
