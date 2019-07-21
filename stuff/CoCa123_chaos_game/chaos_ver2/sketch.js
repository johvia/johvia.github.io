let points;

let percent = 0.9;

let current;

let previous;

function setup() {

  createCanvas(window.innerWidth - 4, window.innerHeight - 4);
  translate(width / 2, height / 2);
  points = [];
  const n = 16;
  for (let i = 0; i < n; i++) {
    let angle = i * TWO_PI / n;
    let v = p5.Vector.fromAngle(angle);
    v.mult(width / 2);
    points.push(v);
  }
  reset();
}

function reset() {



  current = createVector(random(width), random(height));

  background(100);

  stroke(255);
  strokeWeight(8);



  for (let p of points) {
    point(p.x, p.y);
  }
}

function draw() {
  translate(width / 2, height / 2);


  for (let i = 0; i < 1000; i++) {
    strokeWeight(2);
    stroke(0, 255, 255, 50);

    let next = random(points);
    if (next != previous) {
      current.x = lerp(current.x, next.x, percent)
      current.y = lerp(current.y, next.y, percent)
      point(current.x, current.y);
    }
    previous = next;
  }
}