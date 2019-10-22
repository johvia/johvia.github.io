int cols, rows;

int scl = 20;

int w = 600;
int h = 600;

float[][] terrain;

void setup() {
  size(600, 600, P3D); 

  terrain = new float[cols][rows];

  cols = w/scl;
  rows = h/scl;
  
}

void draw() {
  background(0);
  stroke(255);
  noFill();  
  translate(width/2,height/2);
  rotateX(PI/3);
  translate(-w/2,-h/2);
  for (int y = 0; y < cols; y++) {
    beginShape(TRIANGLE_STRIP);
    for (int x = 0; x < rows; x++) {
      vertex(x*scl,y*scl,random(-1,1)); 
      vertex(x*scl,(y+1)*scl,random(-1,1)); 
    }
    endShape();
  }
}
