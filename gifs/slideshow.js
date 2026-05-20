// Set slideShowSpeed (milliseconds)
var slideShowSpeed = 3500;
// Duration of crossfade (seconds)
var crossFadeDuration = 3;
// Specify the image files
var Pic = new Array();
// to add more images, just continue
// the pattern, adding to the array below

Pic[0] = 'gifs/slider/1.jpg';
Pic[1] = 'gifs/slider/2.jpg';
Pic[2] = 'gifs/slider/4.jpg';
Pic[3] = 'gifs/slider/5.jpg';
Pic[4] = 'gifs/slider/6.jpg';
Pic[5] = 'gifs/slider/7.jpg';

<!--Pic[2] = 'gifs/slide1.jpg';-->

// do not edit anything below this line
var t;
var j = 0;
var p = Pic.length;
var preLoad = new Array();
for (i = 0; i < p; i++) {
preLoad[i] = new Image();
preLoad[i].src = Pic[i];
}
function runSlideShow() {
if (document.all) {
document.images.SlideShow.style.filter="revealTrans(duration=2)";
document.images.SlideShow.style.filter="revealTrans(duration=1,transition=25";
document.images.SlideShow.filters.revealTrans.Apply();
}
document.images.SlideShow.src = preLoad[j].src;
if (document.all) {
document.images.SlideShow.filters.revealTrans.Play();
}
j = j + 1;
if (j > (p - 1)) j = 0;
t = setTimeout('runSlideShow()', slideShowSpeed);
}
//  End -->
