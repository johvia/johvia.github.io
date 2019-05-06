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

public class gif_loop extends PApplet {

int totalFrames = 120;
int counter = 0;

boolean record = false;


public void setup() {
  
}

public void draw() {
  float percent = 0;
  if (record) {
    percent = PApplet.parseFloat(counter) / totalFrames;
  } else {
    percent = PApplet.parseFloat(frameCount % totalFrames)/totalFrames;
  }
  render(percent);
  if (record) {
    saveFrame("output/gif"+nf(counter, 3)+".png");
    counter++;
    if (counter == totalFrames) {
      exit();
    }
  }
}
public void render(float percent) {
  background(0);
  ellipse(percent*width, height /2, 20, 20);


  float angle = percent * TWO_PI;
  translate(width/2, height/2);
  rectMode(CENTER);
  noFill();
  stroke(255);
  strokeWeight(2);
  rotate(angle);
  square(0, 0, 100);
}
  public void settings() {  size(400, 400); }
  static public void main(String[] passedArgs) {
    String[] appletArgs = new String[] { "gif_loop" };
    if (passedArgs != null) {
      PApplet.main(concat(appletArgs, passedArgs));
    } else {
      PApplet.main(appletArgs);
    }
  }
}
