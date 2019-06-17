let particles = [];

function setup() {
  createCanvas(600, 400);

}

function draw() {
  background(100);
  for (let i = 0; i < 5; i++) {
    let p = new Particle();
    particles.push(p);
  }


  for (let i = particles.length - 1; i >= 0; i--) {
    particles[i].show();
    particles[i].update();
    if (particles[i].finished()) {
      particles.splice(i, 1);

    }
  }

}

class Particle {
  constructor() {
    this.x = 300;
    this.y = 380;
    this.vx = random(-1, 1);
    this.vy = random(-5, -1);
    this.alpha = 255;
    this.r = 255;
    this.g = 255;
    this.b = 0;

  }

  finished() {
    return this.aplha < 0;
  }

  update() {
    this.x += this.vx;
    this.y += this.vy;
    this.g -= 7.5;
    this.alpha -= 5;
  }

  show() {
    noStroke();
    fill(this.r, this.g, this.b, this.alpha);
    ellipse(this.x, this.y, 16)
  }

}
