ArrayList<Sand> grains;

int amnt = 100;
int r = 20;
void setup() {
  //size(600,600, P3D);
  fullScreen();
  grains = new ArrayList<Sand>();
  for(int i = 0; i < amnt; i++) {
    grains.add(new Sand(random(0,width),random(0,height), random(0,height),r));
  }
  //frameRate(10);
  //background(221,221,221);
  colorMode(RGB);
}

void draw() {
  
  
  //if((frameCount % 10) == 0) {
     background(221); 
  //}
  //translate(300,300);
  //rotateY(PI/3);
  
  //sphere(40);
  for(Sand s : grains) {
       
     //ortho();
     s.show();
     s.update();
     //println(s.pos.y);
  }
  
  text(frameRate, 20,20);
  text("amount: "+amnt, 20, 30);
  
  
      

}
void mouseClicked() {
  grains = new ArrayList<Sand>();
  for(int i = 0; i < amnt; i++) {
    grains.add(new Sand(random(0,width),random(0,height), random(0,height),r));
  }
}

void mouseWheel(MouseEvent event) {
    amnt -= event.getCount();
    if(amnt < 1) {
      amnt = 1; 
    }
    if(amnt > 1000) {
      amnt = 1000; 
    }
  
}
