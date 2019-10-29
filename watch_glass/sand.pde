class Sand {
  PVector pos;
  float radius;
  PVector vel;
  PVector acc;
  float topspeed;
  int r, g, b;
  Sand(float x, float y, float z, float r) {
    pos = new PVector(x, y, z);
    radius = r;
    vel = new PVector(0,0);
    topspeed = 9.8;
    r = floor(random(0,255));
    g = floor(random(0,255));
    b = floor(random(0,255));
  }
  void show() {
    //stroke(0);
    //strokeWeight(1);
    noStroke();
    fill(r,g,b);
    circle(pos.x, pos.y, radius);
  }
  void update() {
     PVector floor = new PVector(mouseX, mouseY);
     PVector acc = PVector.sub(floor,pos);
     //float n = (norm(dist(pos.x,pos.y,floor.x,floor.y),0,600));
     acc.setMag(0.6);
     //println(n);
     vel.add(acc);
     vel.limit(topspeed);
     pos.add(vel);
     if(pos.y > height) {
       pos.y = 0;
     }
     if(pos.y < 0) {
       pos.y = height;
     }
     if(pos.x > width) {
       pos.x = 0;
     }
     if(pos.x < 0) {
       pos.x = width;
     }
     
     
  }
  
}
