float o = 0;
ArrayList pointsx = new ArrayList();
ArrayList pointsy = new ArrayList();
float h;
void setup() {
   //size(1200,600);
   fullScreen();
   colorMode(HSB);
   h = height/32;
   //endShape();
   
}
float i = 0;
boolean right = true;
void draw() {
   scale(16);
   background(0);
   //stroke(255);
   noFill();
   strokeWeight(0.1);
   stroke(255);
   line(0,h,600,h);
   //beginShape();
   for(int x = 0; x < 10000; x++) {
       
       float y = sin(o);
       if((x % 20) == 0) {
         strokeWeight(0.05);
         line(i*o, y+h, i*o, h);
       }
       strokeWeight(0.1);
       stroke(6*o,300,200);
       point(i*o, y+h);
       o+=0.01;
   }
   if(o > 10) {
      o = 0; 
   }
   strokeWeight(0.05);
   if(right) {
     i+=0.05;
     if(i > 6) {
       right = false; 
     }
   }else {
     i-=0.05;
     if(i < 0.1) {
       right = true; 
     }
   }
   print(floor(i));
         
   
}
