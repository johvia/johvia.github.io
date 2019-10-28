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

public class bouncing_dna extends PApplet {

float o = 0;
ArrayList pointsx = new ArrayList();
ArrayList pointsy = new ArrayList();
float h;
public void setup() {
   //size(1200,600);
   
   colorMode(HSB);
   h = height/32;
   //endShape();
   
}
float i = 0;
boolean right = true;
public void draw() {
   scale(16);
   background(0);
   //stroke(255);
   noFill();
   strokeWeight(0.1f);
   stroke(255);
   line(0,h,600,h);
   //beginShape();
   for(int x = 0; x < 10000; x++) {
       
       float y = sin(o);
       if((x % 20) == 0) {
         strokeWeight(0.05f);
         line(i*o, y+h, i*o, h);
       }
       strokeWeight(0.1f);
       stroke(6*o,300,200);
       point(i*o, y+h);
       o+=0.01f;
   }
   if(o > 10) {
      o = 0; 
   }
   strokeWeight(0.05f);
   if(right) {
     i+=0.05f;
     if(i > 6) {
       right = false; 
     }
   }else {
     i-=0.05f;
     if(i < 0.1f) {
       right = true; 
     }
   }
   print(floor(i));
         
   
}
  public void settings() {  fullScreen(); }
  static public void main(String[] passedArgs) {
    String[] appletArgs = new String[] { "--present", "--window-color=#666666", "--stop-color=#cccccc", "bouncing_dna" };
    if (passedArgs != null) {
      PApplet.main(concat(appletArgs, passedArgs));
    } else {
      PApplet.main(appletArgs);
    }
  }
}
