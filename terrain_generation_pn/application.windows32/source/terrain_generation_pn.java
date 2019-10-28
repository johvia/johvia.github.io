import processing.core.*; 
import processing.data.*; 
import processing.event.*; 
import processing.opengl.*; 

import java.util.HashMap; 
import java.util.ArrayList; 
import java.io.File; 
import java.io.BufferedReader; 
import java.io.PrintWriter; 
import java.io.InputStream; 
import java.io.OutputStream; 
import java.io.IOException; 

public class terrain_generation_pn extends PApplet {

int cols, rows;
int scl = 20;
int w = 3400;
int h = 2000;
float[][] terrain;
float flying = 0;
float rot = 0.2f;
public void setup() {
  //size(1200, 600, P3D); 
  colorMode(HSB);
  cols = w/scl;
  rows = h/scl;
  terrain = new float[cols][rows];
  
}

public void draw() {
  flying -= 0.07f;
  float yoff = flying;
  for (int y = 0; y < rows; y++) {
    float xoff = 0;
    for (int x = 0; x < cols; x++) {
      terrain[x][y] = map(noise(xoff, yoff), 0, 1, -90, 90);
      xoff += 0.1f;
    }
    yoff+=0.1f;
  }
  
  if(keyPressed) {
     rot = -1*rot; 
  }
  
  background(0);
  //stroke(255);
  strokeWeight(0.6f);
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
  public void settings() {  fullScreen(P3D); }
  static public void main(String[] passedArgs) {
    String[] appletArgs = new String[] { "--present", "--window-color=#666666", "--stop-color=#cccccc", "terrain_generation_pn" };
    if (passedArgs != null) {
      PApplet.main(concat(appletArgs, passedArgs));
    } else {
      PApplet.main(appletArgs);
    }
  }
}
