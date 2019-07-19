let ax, ay;
let bx, by;
let cx, cy;

let x, y;

function setup() {
  createCanvas(window.innerWidth - 4, window.innerHeight - 4);
  ax = random(width);
  ay = random(height);

  bx = random(width);
  by = random(height);

  cx = random(width);
  cy = random(height);

  x = random(width);
  y = random(height);

  background(100);

  stroke(255);
  strokeWeight(8);

  point(ax, ay);
  point(bx, by);
  point(cx, cy);
}

function draw() {
  for (let i = 0; i < 100; i++) {
    strokeWeight(2);

    point(x, y);

    let r = floor(random(3));

    if (r == 0) {
      stroke(0, 255, 255);
      x = lerp(x, ax, 0.5);
      y = lerp(y, ay, 0.5);
    } else if (r == 1) {
      stroke(255, 255, 0);
      x = lerp(x, bx, 0.5);
      y = lerp(y, by, 0.5);
    } else if (r == 2) {
      stroke(255, 0, 255);
      x = lerp(x, cx, 0.5);
      y = lerp(y, cy, 0.5);
    }
  }
}