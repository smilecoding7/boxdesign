////////////
// / UI / //
////////////

var responsive_scale=1;
var responsive_baseScale=1024;		// / THIS IS THE MAX SIZE, ABOVE OR BELOW THIS EVERYTHING GETS SCALED PROPORTIONALLY

var responsive_orientation;
var responsive_centerV;
var responsive_centerH;

var responsive_width;
var responsive_height;
var responsive_top;
var responsive_left;

var responsive_top_c;
var responsive_left_c;


////////////////////////////////
// HANDLE RESPONSIVE////////////
////////////////////////////////


function responsive_fitFrame(){
 setTimeout(function() {
 // / CALCULATE
 
 // / REMOVE NAV
 var responsive_window_height=$(window).height()-responsive_navbarHeight;
 var responsive_window_top=responsive_navbarHeight;
 
 responsive_centerV=responsive_window_height/2;
 responsive_centerH=$(window).width()/2;

 if($(window).width()/responsive_window_height<1){
  responsive_width=$(window).width();
  responsive_height=responsive_width;
  responsive_top=(responsive_window_height/2)-(responsive_width/2)+responsive_window_top;
  responsive_left=0;
  responsive_scale=($(window).width())/responsive_baseScale;
  responsive_orientation='vertical';
  responsive_left_c=($(window).width()/2)-(responsive_width);
  responsive_right_c=$(window).width()-responsive_left_c;
 } else if($(window).width()/responsive_window_height>1){
  responsive_height=responsive_window_height;
  responsive_width=responsive_height;
  responsive_top=responsive_window_top;
  responsive_left=($(window).width()/2)-(responsive_width/2);
  responsive_scale=(responsive_window_height)/responsive_baseScale;
  responsive_orientation='horizontal';
  responsive_left_c=($(window).width()/2)-(responsive_width);
  responsive_right_c=$(window).width()-responsive_left_c;
 } else {
  responsive_scale=($(window).width())/responsive_baseScale;
  responsive_width=responsive_height=responsive_window_height;
  responsive_top=responsive_window_top;
  responsive_left=0;
  responsive_orientation='square';
  responsive_left_c=($(window).width()/2)-(responsive_width);
  responsive_right_c=$(window).width()-responsive_left_c;
 }

 // / SET
 $('#responsive_slide').css({
   'top':responsive_top,
   'left':responsive_left,
   'msTransform':'scale('+responsive_scale+')',
   'OTransform':'scale('+responsive_scale+')',
   'MozTransform':'scale('+responsive_scale+')',
   'WebkitTransform':'scale('+responsive_scale+')'
 });
 $('#responsive_slideText').css({
   'top':responsive_layout+'px'
 });
 $('#responsive_sprite').css({
  'height':responsive_height,
  'width':responsive_width,
  'top':responsive_top,
  'left':responsive_left,
 });
 $('#responsive_login_container').css({
   'top':responsive_top,
   'left':responsive_left,
   'msTransform':'scale('+responsive_scale+')',
   'OTransform':'scale('+responsive_scale+')',
   'MozTransform':'scale('+responsive_scale+')',
   'WebkitTransform':'scale('+responsive_scale+')'
 }); 
 $('#responsive_sprite>img').css({
  'width':'100%',
 });
 $('#responsive_rulers').css({
  'height':responsive_height,
  'width':responsive_width,
  'top':responsive_top,
  'left':responsive_left,
 });
 $('#responsive_rulers>img').css({
  'width':'100%',
 });
 $('#responsive_canvas').css({
  'height':responsive_height,
  'width':responsive_width*2,
  'top':responsive_top,
  'left':responsive_left_c
 });
 $('#responsive_cFadel').css({
   'left':responsive_left_c
 });
 $('#responsive_cFader').css({
   'right':responsive_left_c
 });
 $("#responsive_guillo").css({
  'msTransform':'scale('+responsive_scale/.9+')',
  'OTransform':'scale('+responsive_scale/.9+')',
  'MozTransform':'scale('+responsive_scale/.9+')',
  'WebkitTransform':'scale('+responsive_scale/.9+')'
 });
//  $("#responsive_unitProgress").css({
//   'msTransform':'scale('+responsive_scale/1+')',
//   'OTransform':'scale('+responsive_scale/1+')',
//   'MozTransform':'scale('+responsive_scale/1+')',
//   'WebkitTransform':'scale('+responsive_scale/1+')'
//  });
 $("video").css({
  'width':responsive_width,
  'height':responsive_height-(256*responsive_scale),
  'top':responsive_top+(responsive_scale*128),
  'left':responsive_left,
 });
 }, 200);
}
