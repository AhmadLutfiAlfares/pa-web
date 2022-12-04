int d;
int xMobil = 0;
float yUbur = 0;
float yGelembung = 0;
boolean gelembungTurun = true;
boolean uburTurun = true;
int radius = 120;

void setup() {
    size(1280, 720, P3D);
}

void draw() {
    background(#F5E7C1);
    // langit berada di layer paling belakang
    pushMatrix();
    translate(0, 0, -radius*2 - 1);
    langit(-249, -140, 2000, 400);
    tanah(-249, 250, 2000, 2000);
    popMatrix();

    // setelah langit, rumah-rumah 3d sejauh radius
    pushMatrix();
    translate(0, 0, -radius - 1);
    rumah3d(radius);
    popMatrix();

    // lalu layer paling depan
    translate(0, 0, 1);
    penutup3d();
    jalan();
    batu();
    // rumah();
    // rumahsquid();
    ubur();
    // gelembung();
    gerakkan();
    patrick();
    ruler();
    mobil();
}


void jalan() {
    //jalan raya
    pushMatrix();
    fill(#838282);
    noStroke();
    rect(0, 500, 1800, 100);
    int a = 20; //inisialisasi x1 adalah 20
    int b = 40; //inisialisasi x2 adalah 40
    for (int i = 0; i < 1000; i++) { //perulangan untuk membuat garis jalanan
        strokeWeight(3);//ketebalan garis
        stroke(250);//warna garis
        line(a, 550, b, 550);
        a += 40;
        b += 40;
    }
    //jalanan rumah
    pushMatrix();
    noStroke();
    fill(#838282);
    quad(130, 500, 160, 400, 220, 400, 250, 500);
    quad(496, 500, 526, 400, 586, 400, 616, 500);
    quad(912, 500, 942, 400, 1002, 400, 1032, 500);
    popMatrix();
    
    popMatrix();
}
void mobil() {
  //badan kapal
  pushMatrix();
  translate(xMobil, 0);
  noStroke();
  fill(255, 0, 0);
  quad(75, 415, 89, 465, 325, 465, 326, 415); //atas mobil
  //bezier(321, 471, 296, 506, 291, 477, 250, 650);
  fill(0);
  quad(86, 454, 89, 472, 323, 472, 325, 454); //garis mobil
  fill(255);
  quad(88, 462, 103, 516, 290, 516, 325, 462);//bawah mobil
  fill(0);
  quad(59, 398, 59, 435, 100, 435, 120, 398);
  fill(#E3B237);
  rect(70, 434, 5, 60);
  fill(0);
  ellipse(64, 484, 20, 10);
  fill(255);
  rect(184, 415, 90, 30);
  fill(0);
  rect(250, 424, 20, 10);
  // ban kapal
  fill(255);
  circle(133, 533, 20);
  fill(0);
  circle(133, 533, 10);

  fill(255);
  circle(261, 533, 20);
  fill(0);
  circle(261, 533, 10);
  popMatrix();
}

void gerakkan() {
    if (keyPressed) {
        if (keyCode == RIGHT) {
            if (xMobil <=  width - 500)
                xMobil += 10;
            } else if (keyCode == LEFT) {
            if (xMobil >= -  59)
                xMobil -= 10;
            }
        }
    }

void rumah() {
    pushMatrix();
    fill(#964B00);
    arc(190, 420, 300, 300, PI, TWO_PI);
    popMatrix();
    }

void rumahsquid() {
    noStroke();
    //Telinga Kiri
    fill(48, 64, 145);
    beginShape();
    vertex(450, 270);
    vertex(415, 270);
    vertex(425, 160);
    vertex(460, 165);
    endShape();
    //Telinga Kanan
    fill(48, 64, 145);
    beginShape();
    vertex(662, 270);
    vertex(697, 270);
    vertex(687, 160);
    vertex(612, 165);
    endShape();
    //Bentuk Dasar
    fill(30, 42, 102);
    beginShape();
    vertex(430, 420);
    vertex(470, 80);
    vertex(642, 80);
    vertex(682, 420);
    endShape();
    //Alis
    fill(48, 64, 145);
    rect(482, 130, 152, 40);
    //Mata
    fill(43, 126, 189);
    circle(522, 200, 50);
    circle(592, 200, 50);
    fill(103, 168, 212);
    circle(522, 200, 30);
    circle(592, 200, 30);
    //Hidung
    beginShape();
    fill(48, 64, 145);
    vertex(543, 247);
    vertex(573, 247);
    vertex(583, 317);
    vertex(533, 317);
    endShape();
    //Pintu
    fill(161,132,39);
    arc(556, 420, 80, 150, PI, TWO_PI);
    fill(255,255,0);  
    circle(576,395,10);
    }

void tanah(int x, int y, int w, int h) {
    pushMatrix();
    translate(0, 0, 1); // majukan sedikit
    noStroke();
    fill(#F5E7C1);
    rect(x, y, w, h);
    popMatrix(); 
}

void langit(int x, int y, int w, int h) {
    //gradasi langit
    color c1 = color(#62FFB4);
    color c2 = color(#3E73FF);
    for (int i = y; i <= y + h; i++) {
        float inter = map(i, y, y + h, 0, 1);
        color c = lerpColor(c1, c2, inter);
        stroke(c);
        line(x, i, x + w, i);
        }
    
    
    pushMatrix();
    translate(0, -90);
    bunga(#d0f36d, 1.0);
    popMatrix();
    
    pushMatrix();
    translate(0, -130);
    bunga(#C14D2D, 0.4);
    popMatrix();
    
    pushMatrix();
    translate(1100, -115);
    bunga(#204562, 1.0);
    popMatrix();
    
    pushMatrix();
    translate(70, -960);
    bunga(#2a88ca, 3.0);
    popMatrix();
    
    pushMatrix();
    translate(490, -880);
    bunga(#F2474A, 3.0);
    popMatrix();
    
    pushMatrix();
    translate(900, -860);
    bunga(#F273B3, 2.5);
    popMatrix();
    }

void bunga(int warna, float skala) {
    scale(skala);
    noFill();
    stroke(warna);
    circle(100, 338, 5);
    beginShape();
    vertex(73, 301);
    bezierVertex(100, 296, 92, 325, 97, 326);
    bezierVertex(102, 327, 105, 326, 108, 309);
    bezierVertex(112, 292, 131, 301, 132, 306);
    bezierVertex(134, 310, 141, 313, 121, 324);
    bezierVertex(99, 335, 112, 339, 116,340);
    bezierVertex(122, 339, 140, 333, 145, 334);
    bezierVertex(150, 354, 146, 364, 138, 363);
    bezierVertex(130, 363, 121, 357, 117, 352);
    bezierVertex(113, 347, 102, 351, 102, 360);
    bezierVertex(102, 369, 116, 381, 107, 386);
    bezierVertex(98, 392, 85, 390, 82, 379);
    bezierVertex(80, 368, 95, 363, 97, 357);
    bezierVertex(97, 351, 98, 345, 92, 345);
    bezierVertex(87, 345, 78, 365, 67, 365);
    bezierVertex(57, 365, 47, 360, 51, 349);
    bezierVertex(55, 340, 63, 337, 75, 339);
    bezierVertex(87, 339, 92, 339, 92, 336);
    bezierVertex(93, 331, 92, 328, 73, 323);
    bezierVertex(55, 316, 67, 301, 73, 301);
    endShape();
    }

void ubur() {
    pushMatrix();
    noStroke();
    translate(0, yUbur);
    //ubur ubur 1
    fill(#F5A1EF);
    ellipse(1032, 169, 60, 30);
    rect(1012, 179, 5, 20);
    rect(1031, 183, 5, 25);
    rect(1049, 179, 5, 20);
    fill(255);
    circle(1013, 168, 10);
    circle(1032, 168, 10);
    circle(1049, 168, 10);
    //ubur ubur 2
    fill(#F5A1EF);
    ellipse(143, 83, 60, 30);
    rect(123, 93, 5, 20);
    rect(139, 97, 5, 25);
    rect(160, 93, 5, 20);
    fill(255);
    circle(124, 81, 10);
    circle(142, 81, 10);
    circle(160, 81, 10);
    //ubur ubur 3
    fill(#F5A1EF);
    ellipse(440, 196, 60, 30);
    rect(419, 206, 5, 20);
    rect(438, 210, 5, 25);
    rect(459, 206, 5, 20);
    fill(255);
    circle(419, 195, 10);
    circle(438, 195, 10);
    circle(459, 195, 10);
    popMatrix();
    
    
    if (uburTurun) {
        yUbur += 0.5;
        } else {
        yUbur -= 0.5;
        }
    
    if (yUbur > 20) {
        uburTurun = false;
        } else if (yUbur < - 20) {
        uburTurun = true;
        }
    }

void batu() {
  //bayangan batu
  pushMatrix();
  
  noStroke();
  fill(#434343);
  ellipse(80, 669, 85, 65);
  ellipse(416, 342,  60, 40);
  ellipse(803, 453, 58, 40);
  ellipse(1250, 688, 33, 22);
  
  //batu
  fill(#A09B9B);
  ellipse(76, 666, 80, 60);
  ellipse(412, 340, 55, 38);
  ellipse(800, 450, 55, 38);
  ellipse(1247, 685, 30, 20);
  
  //rumput laut hijau1
  //stroke(50, 80, 30);
  //strokeWeight(13);
  //line(420, 450, 435, 390);
  //line(400, 440, 370, 350);
  //line(400, 440, 410, 320);
  
  popMatrix();

}

void gelembung() {
  pushMatrix();
  translate(300,yGelembung);
  noStroke();
  lights();
  fill(#00FFFF);
  sphere(10);
  popMatrix();
  
  pushMatrix();
  translate(300,403 + yGelembung);
  noStroke();
  lights();
  fill(#00FFFF);
  sphere(10);
  popMatrix();
  
  pushMatrix();
  translate(600,399 + yGelembung);
  noStroke();
  lights();
  fill(#00FFFF);
  sphere(10);
  popMatrix();
  
  pushMatrix();
  translate(1200,239 + yGelembung);
  noStroke();
  lights();
  fill(#00FFFF);
  sphere(10);
  popMatrix();
  
  if (gelembungTurun) {
    yGelembung += 0.5;
  } else {
    yGelembung -= 0.5;
  }
  
  if (yGelembung > 200) {
    gelembungTurun = false;
  } else if (yGelembung < 180) {
    gelembungTurun = true;
  }
}

void patrick() {
    //mata
    fill(255);
    ellipse(434, 371, 15, 23);
    pushMatrix();
    translate(434, 371);
    rotate(radians(349));
    popMatrix();
    fill(#f6a3a5);
    
    //badan utama
    beginShape();
    vertex(467, 363);
    bezierVertex(458, 325, 447, 336, 443, 344);
    bezierVertex(439, 352, 422, 386, 421, 394);
    bezierVertex(420, 402, 404, 418, 402, 424);
    bezierVertex(400, 430, 401, 449, 401, 449);
    vertex(453, 461);
    bezierVertex(454, 461, 483, 444, 484, 438);
    bezierVertex(485, 432, 481, 418, 481, 418);
    bezierVertex(481, 418, 511, 382, 511, 374);
    bezierVertex(511, 366, 496, 373, 493, 375);
    bezierVertex(490, 377, 469, 393, 468, 394);
    bezierVertex(468, 393, 465, 375, 465, 369);
    bezierVertex(465, 363, 462, 343, 464, 341);
    //bezierVertex(466, 339, 472, 334, 471, 328);
    //bezierVertex(470, 322, 468, 323, 467, 363);
    endShape();
    
    //tangan kanan
    beginShape();
    vertex(425, 395);
    bezierVertex(419, 387, 395, 372, 393, 368);
    bezierVertex(391, 364, 384, 363, 384, 369);
    bezierVertex(384, 375, 387, 385, 391, 392);
    bezierVertex(395, 399, 404, 415, 409, 417);
    endShape();
    
    //kaki kanan
    beginShape();
    vertex(408, 469);
    bezierVertex(408, 476, 411, 490, 417, 490);
    bezierVertex(423, 490, 427, 482, 427, 476);
    endShape();
    
    //kaki kiri
    beginShape();
    vertex(445, 473);
    bezierVertex(448, 485, 456, 496, 459, 496);
    bezierVertex(463, 496, 469, 487, 469, 478);
    endShape();
    
    //celana
    fill(#d2dc22);
    beginShape();
    vertex(401, 434);
    bezierVertex(406, 442, 424, 453, 443, 452);
    bezierVertex(462, 451, 480, 441, 484, 436);
    bezierVertex(484, 447, 478, 465, 472, 467);
    bezierVertex(472, 473, 472, 476, 473, 478);
    bezierVertex(474, 480, 450, 485, 447, 481);
    bezierVertex(444, 477, 444, 473, 444, 472);
    bezierVertex(443, 472, 437, 475, 431, 473);
    bezierVertex(428, 473, 427, 477, 427, 478);
    bezierVertex(426, 478, 409, 479, 406, 471);
    bezierVertex(403, 463, 411, 464, 408, 461);
    bezierVertex(405, 458, 398, 447, 401, 434);
    endShape();
    }

void ruler() {
    pushMatrix();
    fill(255, 0, 0);
    stroke(255, 0, 0);
    strokeWeight(2.5);
    line(mouseX, mouseY, mouseX + 10, mouseY);
    line(mouseX, mouseY, mouseX - 10, mouseY);
    line(mouseX, mouseY, mouseX, mouseY + 10);
    line(mouseX, mouseY, mouseX, mouseY - 10);
    text("mouse at : (" + mouseX + "," + mouseY + ")", mouseX - 100, mouseY - 25);
    popMatrix();
    }

void rumah3d(int radius) {
    lights();
    
    rumahPatrick(radius);

    pushMatrix();
    translate(width/2 - 100, height/2, 0);
    rotateX(radians(90));
    // rotateY(radians(mouseX));
    rumahSquidward(45, radius, radius - 10, 400);
    popMatrix();
}

void rumahPatrick(int radius) {
    pushMatrix();
    translate(110, 399, 0);
    fill(255);
    sphere(radius);
    popMatrix();
}

void rumahSquidward( int sides, float r1, float r2, float h)
{
    float angle = 360 / sides;
    float halfHeight = h / 2;
    // top
    beginShape();
    for (int i = 0; i < sides; i++) {
        float x = cos( radians( i * angle ) ) * r1;
        float y = sin( radians( i * angle ) ) * r1;
        vertex( x, y, -halfHeight);
    }
    endShape(CLOSE);
    // bottom
    beginShape();
    for (int i = 0; i < sides; i++) {
        float x = cos( radians( i * angle ) ) * r2;
        float y = sin( radians( i * angle ) ) * r2;
        vertex( x, y, halfHeight);
    }
    endShape(CLOSE);
    // draw body
    beginShape(TRIANGLE_STRIP);
    for (int i = 0; i < sides + 1; i++) {
        float x1 = cos( radians( i * angle ) ) * r1;
        float y1 = sin( radians( i * angle ) ) * r1;
        float x2 = cos( radians( i * angle ) ) * r2;
        float y2 = sin( radians( i * angle ) ) * r2;
        vertex( x1, y1, -halfHeight);
        vertex( x2, y2, halfHeight);
    }
    endShape(CLOSE);
}

void penutup3d() {
    // penutup supaya rumah patrick terlihat setengah lingkaran
    pushMatrix();
    noStroke();
    fill(#F5E7C1);
    rect(0, 399, width, 1000); 
    popMatrix();
}