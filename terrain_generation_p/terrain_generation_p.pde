int cols, rows;
int scl = 20;
int w = 3400;
int h = 2000;
float[][] terrain;
float flying = 0;
float rot = 0.2;
void setup() {
     size(1200, 600, P3D); 
  colorMode(HSB);
  cols = w/scl;
  rows = h/scl;
  terrain = new float[cols][rows];
  //fullScreen(P3D);
}

void draw() {
  flying -= 0.07;
  float yoff = flying;
  for (int y = 0; y < rows; y++) {
    float xoff = 0;
    for (int x = 0; x < cols; x++) {
      terrain[x][y] = map(noise(xoff, yoff), 0, 1, -90, 90);
      xoff += 0.1;
    }
    yoff+=0.1;
  }
  
  if(keyPressed) {
     rot = -1*rot; 
  }
  
  background(0);
  //stroke(255);
  strokeWeight(0.6);
  noFill();  
  translate(width/2, height/2);
  rotateX(PI/3);
  //rotateY(PI/3 + rot*flying);
  translate(-w/2, -h/2);
  for (int y = 0; y < rows-1; y++) {
    beginShape(TRIANGLE_STRIP);
    for (int x = 0; x < cols; x++) {
      stroke(2*y, 400*y, 200);
      vertex(x*scl, y*scl, terrain[x][y]);
      vertex(x*scl, (y+1)*scl, terrain[x][y+1]);
    }
    endShape();
  }
}
