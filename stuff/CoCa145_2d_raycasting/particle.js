class Particle {
  constructor() {
    this.pos = createVector(width / 2, height /2);

    this.rays =[];
    for (let a = 0; a < 360; a+=1) {
      this.rays.push(new Ray(this.pos, radians(a)));
    }
  }

  look(wall) {
    for (let ray of this.rays){
      let closest = null;
      let record = Infinity;
      for (let wall of walls) {
        const pt = ray.cast(wall);
        if (pt) {
          const d = p5.Vector.dist(this.pos, pt);
          if (d < record) {
            record =d;
            closest = pt;
          }
        // record = min(d, record)


        }
      }
      if (closest) {
        stroke(255, 255, 100, 100);
        line(this.pos.x, this.pos.y, closest.x, closest.y);
      }
    }
  }

  update(x, y) {
    this.pos.set(x, y);
  }

  show() {
    fill(255, 255, 100);
    ellipse(this.pos.x, this.pos.y, 8);
    for (let ray of this.rays){
      ray.show();
    }
  }
}
