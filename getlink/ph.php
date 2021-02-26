<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Packagingo Designer</title>
		<style>



	body { 
			margin: 0;
		}
		canvas {
		 display: block;
		}
  body{
    font-family:  'Montserrat', sans-serif;
    font-weight: 300;
    color: #668;

  }
  .UILeft{
    width: 50%;
    float: left;
    display: inline-block;
    border-top: 1px dotted white;
  }
  .UIRight{
    width: 50%;
	float: left;
    display: inline-block;
    border-top: 1px dotted white;
  }

  /*
  COLORS
  PINK
  rgba(239, 75, 129, 1)
  #EF4B81

  YELLOW
  f7c003

  BLUE
  2196f3

  LIGHT BLUE
	8ec4ef
  */


  #editorCanvasOutsideDiv{
    width: 50%;
    height: 100%;
    overflow: hidden;
    position: absolute;
    background: linear-gradient(0deg,#c3e2fb 0%,#FFF 100%);
    box-shadow: 1px 1px 2px rgba(0,0,0,.2);
    z-index: 2000;
    transition: 220ms all ease-in-out;
    opacity: 1;
    top: 35px;
  }
  #editorCanvasOutsideScale{
    position: absolute;
    transform-origin: 0% 0%;
    transform: scale(.6, .6);

  }
  html{
scroll-behavior: smooth;

  }
  #editorCanvasInsideDiv{
    background: linear-gradient(0deg,#c3e2fb 0%,#FFF 100%);
    width: 50%;
    height: 100%;
    overflow: scroll;
    position: absolute;
    box-shadow: 1px 1px 2px rgba(0,0,0,.2);
    z-index: 2000;
    transition: 220ms all ease-in-out;
    display: none;
    opacity: 1;
    top: 0px;
  }
  #editorCanvasInsideScale{
    position: absolute;
    /*left: -25%;*/
	transform-origin: 0% 0%;
    transform: scale(.6, .6);

  }

  #displayCanvas{
    position:absolute;
    width: 50%;
    height: 2200px;
    outline: none; 
    border: none;
    position: absolute;
    right: 0px;
    background: linear-gradient(0deg,#CCD 0%,#FFFCFC 100%);
  
   
  }
  .column {
/*        float: left;
*/      }
  #logo{
  	width: 100%;
  	background-color: #FFF;
  	position: absolute;

  }
  #logo img{
  	padding-left: 10px;
  	float: left;
    display: none;
  }
  #fontselect{
  }
  #editorControls{
  	position: absolute;
    bottom : 0;
    right: 0;
    width: 50%;
    z-index: 500;
  }
	#editorOffset{
		top:36px;
	}

  #viewerSwitch{
    text-align: center;
    position: absolute;
    left: 50%;
    width: 50%;
    background-color: #f0efef;
  }
  #editorSwitch{
    text-align: center;
    position: absolute;
    width: 50%;
    z-index: 500;
    background-color: #f0efef;
    z-index: 3000;

  }
  #designControls{
    z-index: 1000;
  }

  #boxStateDiv{
    padding: 8px;
    margin: 0px;
    position: relative;

  }

  #editorStateDiv{
    padding: 8px;
    margin: 0px;
    position: relative;
  }
  .switch {
    position: relative;
    display: inline-block;
    width: 32px;
    height: 16px;
  }

  /* Hide default HTML checkbox */
  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  /* The slider_toggle */
  .toggleLabel{
  	position: relative;
  	top:-2px;
  }

  .slider_toggle {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #FFF;
    -webkit-transition: .4s;
    transition: .4s;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.18);
  }

  .slider_toggle:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 0px;
    bottom: 0px;
    background-color: #5b4bef;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider_toggle {
    background-color: #cee3f5;
  }

  input:focus + .slider_toggle {
    box-shadow: 0 0 1px #d8ecfc;
  }

  input:checked + .slider_toggle:before {
    -webkit-transform: translateX(16px);
    -ms-transform: translateX(16px);
    transform: translateX(16px);
  }

  /* Rounded slider_toggles */
  .slider_toggle.round {
    border-radius: 32px;
  }

  .slider_toggle.round:before {
    border-radius: 50%;
  }
  .slidecontainer {
    padding: 2px;
    margin: 2px;
  }
  .groupcontainer{
    padding: 4px;
    margin: 8px;        
    border-radius: 4px;
  }
  .slider:hover {
    opacity: 0.7; /* Fully shown on mouse-over */
  }

  .slider {
    -webkit-appearance: none;
    width: 100%;
    height:16px;
    border-radius: 16px;  
    background: #FFF;
    outline: none;
    opacity: 1;
    -webkit-transition: .2s;
    transition: opacity .2s;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.18);

  }

  .slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 16px;
    height: 16px;
    border-radius: 50%; 
    background: #EF4B81;
    cursor: pointer;
  }

  .slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #EF4B81;
    cursor: pointer;
  }

  .SliderValue{
  	font-weight: 600;
  }
  
  button {
    text-transform: uppercase;
    text-decoration: none;
    border: none;
    font-family: inherit;
    padding: 0;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    align-self: start; 

	background-color: rgba(86 ,71 ,76 , .3);
    color: #fff;
    border-radius: 8px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.18);

    padding: 0.25em 0.75em;
    min-width: 8px;
    min-height: 32px;

    text-align: center;
    line-height: 1.1;

    transition: 220ms all ease-in-out;

  }
  
select {
  width: 100%;
  height: 32px;
  font-size: 100%;
  font-weight: bold;
  cursor: pointer;
  border-radius: 0;
  background-color: #EF4B81;
  border: none;
  border-bottom: 2px solid #EF4B81;
  color: white;
  appearance: none;
  padding: 8px;
  padding-right: 32px;
  -webkit-appearance: none;
  -moz-appearance: none;
  transition: color 0.3s ease, background-color 0.3s ease, border-bottom-color 0.3s ease;
}

/* For IE <= 11 */
select::-ms-expand {
  display: none; 
}

.select-icon {
  position: absolute;
  top: 4px;
  right: 4px;
  width: 30px;
  height: 36px;
  pointer-events: none;
  border: 2px solid #EF4B81;
  padding-left: 5px;
  transition: background-color 0.3s ease, border-color 0.3s ease;
}
.select-icon svg.icon {
  transition: fill 0.3s ease;
  fill: white;
}

select:hover,
select:focus {
  color: #63b5f6;
  background-color: white;
  border-bottom-color: #fff;
}
select:hover ~ .select-icon,
select:focus ~ .select-icon {
  background-color: white;
  border-color: #63b5f6;
}
select:hover ~ .select-icon svg.icon,
select:focus ~ .select-icon svg.icon {
  fill: #63b5f6;
}


/*EDITOR*/
#editorDrawerHandle{
  background: #CCD;
  position: absolute;
  left: 0px;
  top:0px;
  width: 100%;
  height: 24px;
 transition: all 1s ease;
 z-index: 2000;
 cursor: pointer;
}
#editorDrawer{
  background: rgba(255,255,255.4);
  position: absolute;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 510px;
 transition: all 1s ease;
 z-index: 2000;
}
#drawerContainer{
 transition: all 1s ease;
  width: 0px;
  height:0px;
 z-index: 1000;
 overflow: hidden;
 position: absolute;
 bottom: -416px;
 z-index: 6000;
}
#drawerContents{
	width: 100%;
	overflow: visible;
    position: relative;
    top: 20px;
    padding-top: 12px;
}
#drawerArrow{
    font-size: 14px;
    margin: 4px;
    color: rgba(255,255,255 , .5);
  	transform: rotate(-90deg);
    transition: 2200ms all ease-in-out;
/*    padding-bottom: 12px;
*/}
#BoxConfigOptions{
	text-transform: uppercase;
/*    border-top: 1px dotted white;
*/}
#BoxDesignOptions{
	padding: 4px;
    position: fixed;
    top:24px;
    position: absolute;
    right : 0px;
    z-index: 3500;
}
#windowContainer{
	width: 100%;
	height: 100%;
	overflow: hidden;
	position: fixed;
	background-color: #ccd;
}

#priceAndCheckout{
	padding: 16px 16px 16px 16px;
    border-top: 1px dotted rgba(0,0,0,.7);
    background-color: rgba(0,0,0,.1);
    text-align: right;
    font-weight: 400;
}

#productNameDiv{
    font-weight: 200;
    font-size: 30%;
    width: 100%;
    bottom: 10%;
    position: relative;
}


#productQuantity{
	padding: 0;
    text-decoration: none;
    border: 1px dotted rgb(0 0 0 / 34%);
    height: 32px;
    background: rgba(255,255,255,.54);
    border-radius: 8px;
	vertical-align: text-bottom;
	margin: 0 15px 0 15px;
	color: white;
    font-size: 20px;
    font-family: "Montserrat";
    width: 100px;
    text-align: center;
}
#boxOutputCost{
	font-size: 32px;
}
#priceTag{
	margin: 0 15px 0 15px;	
    margin: 0 15px 0 15px;
    font-weight: 600;
}
#checkoutBtn{
	width: 100%;
	text-transform: uppercase;
    text-decoration: none;
    border: none;
    font-family: inherit;
    padding: 0;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    align-self: start;
    background-color: #EF4B81;
    color: #fff;
    border-radius: 8px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.18);
    padding: 16px 0;
    min-width: 8px;
    min-height: 32px;
    text-align: center;
    line-height: 1.1;
    transition: 220ms all ease-in-out;
}
#productName{
    width: 100%;
    text-align: center;
    position: absolute;
    font-size: large;
}
.arrowBtnR{
    cursor: pointer;
    font-size: 700%;
	position: absolute;
	
  top:-10px;
  right:0px;
	z-index: 5000;
}
.arrowBtnL {
    cursor: pointer;
    font-size: 700%;
	position: absolute;
  top:-10px;
 
	left: 0px;
	z-index: 5000;
}
.left50{
	width: 50%;
	float: left;
}
.right50{
	width: 50%;
	float: right;
}
.editorRow{
	display: inline-block;
	width: 100%;
	background-color: #e9e7ee;
}
.floatEmRight >* {
	float: right;
}
.editorHeader{
    height: 20px;
    background: #f3f1f5;
    color: #666688;
    padding: 0px 4px;
    font-weight: 600;
    font-size: 14px;
    text-transform: uppercase;
}
.small{
	font-size: .9em;
}
form{

position:absolute;

}

	</style>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Dancing+Script&family=Roboto&family=Open+Sans:wght@300&family=Open+Sans:wght@600&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
  
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>

$(document).ready(function(){
  
  
$('#mydiv').draggable();
$('#mydivv').draggable();

$("#mydiv").mouseenter(function(){

$('#mydiv').draggable(); 

});

$("#resttt").mouseenter(function(){

$('#resttt').css('background','#979697'); 
$('#resttt').css('cursor','pointer');
});
$("#resttt").mouseleave(function(){

$('#resttt').css('background','#eee6e9'); 

});
$("#save").mouseenter(function(){

$('#save').css('background','#979697'); 
$('#save').css('cursor','pointer');
});
$("#save").mouseleave(function(){

$('#save').css('background','#eee6e9'); 

});

$("#restt").mouseenter(function(){

$('#restt').css('background','#979697'); 
$('#restt').css('cursor','pointer');

});

$("#restt").mouseleave(function(){

$('#restt').css('background','#eee6e9'); 


});

//

$("#chek").mouseenter(function(){

$('#chek').css('background','#736cce'); 
$('#chek').css('cursor','pointer');

});

$("#chek").mouseleave(function(){

$('#chek').css('background','#346ce7'); 


});




$("#rng").mouseenter(function(){

  $('#mydiv').draggable( { disabled: false } );  
 // $(this).css("background-color", "yellow");
  //}
  //, function(){
  //$(this).css("background-color", "pink");
});
$("#rng").mouseleave(function(){

$('#mydiv').draggable();  
// $(this).css("background-color", "yellow");
//}
//, function(){
//$(this).css("background-color", "pink");
});



$("#hidd").click(function(){
  $("#sid5").toggle();
});


$('.myfile').change(function(event){ // here when we choose image from input file
        var filpth=URL.createObjectURL(event.target.files[0]);
        $("#addimg").fadeIn("fast").attr('src',filpth);

      });



      $('.imgtexture').click(function(){ // here when we click on image to showen on box
  var po=$(this).attr('src');
  $("#addimg").fadeIn("fast").attr('src',po);
 
      });



    
      $('#removimg').click(function(){ // here when we click on image to showen on box
  //var po=$(this).attr('src');
  $("#addimg").fadeIn("fast").attr('src','bg.png');
 
      });


      
// resizs div  left


$("#trh").click(function(){
    $("#mydiv").animate({
      
     
      height: '100px',
      width: '80px'
    });
    $(".hdsh").animate({
      opacity:'0'
     
    });
    $("#gma").css("display","block");
    $("#trh").css("display","none");
    
  });


  $("#gma").click(function(){
    $("#mydiv").animate({
      
     
      height: '400px',
      width: '250px'
    });
    $(".hdsh").animate({
      opacity:'1'
     
    });
    $("#gma").css("display","none");
    $("#trh").css("display","block");
    
  });

// resize left ----



$("#trhh").click(function(){
    $("#mydivv").animate({
      
     
      height: '100px',
      width: '80px'
    });
    $(".hdshh").animate({
      opacity:'0'
     
    });
    $("#gmaa").css("display","block");
    $("#trhh").css("display","none");
    
  });


  $("#gmaa").click(function(){
    $("#mydivv").animate({
      
     
      height: '400px',
      width: '250px'
    });
    $(".hdshh").animate({
      opacity:'1'
     
    });
    $("#gmaa").css("display","none");
    $("#trhh").css("display","block");
    
  });


  $('#dvhd').click(function(){
 

 $('#sidshape').toggle();
 

});









  
$('#yyes').click(function(){
 

  $('#shoebox').css('display','none');
  

});
$('#nno').click(function(){
 

 $('#shoebox').css('display','none');
 

});


$('#resttt').click(function(){
 

 $('#shoebox').css('display','block');
 

});







/*


  $('#capcolr').on ('change input', function ee(){
    
    var col =this.value;
    var rpcol = col.replace('#','0x');
    //var matr = new THREE.MeshBasicMaterial({color:col});
    
 // $('#editorCanvasOutsideDiv').css('background',col);
    //o.material.color.setHex(  rpcol );
    
    });

*/
  
    $('#restt').click(function(){ // this take image for outside of canvas

  



// $('#editorCanvasOutside')

$('#editorCanvasOutside').get(0).toBlob(function(blob){
  $("#myjson").click();

saveAs(blob,'outside.png');
});


});
$('#save').click(function(){ // this take image for outside of canvas


  

});








});



// caught pic ---------------------------








</script>
  
  </head>
	<body>

<?php

 
include 'con1.php';



$uss=$_GET['username'];
$slc="SELECT * FROM `databox` WHERE `username`='$uss' ";

$qry=mysqli_query($con,$slc);
while($row=mysqli_fetch_array($qry)){
$jsn1=$row['outjsn'];
$jsn2=$row['injsn'];

	?>

<input type="text" id="myTextArea" name="myyjson" style="z-idex:20000" value="<?php echo $jsn1 ?>"/>
    <input type="text" id="myTextAreain" name="myyjson" style="z-idex:20000" value="<?php echo $jsn2 ?>"/>

  <?php


}

if(isset($_POST['subreg'])){



}

    ?>


    


<!--
<button style="z-idex:20000" id="myjson" style="position relative;float:left" >save json</button>
  -->


  <form action=""  method="post"  style="position:absolute;z-index:23000;width:90%; bottom:40px">
    

    

    
    <input type="submit" name="sub" style="z-idex:20000"  id="myjson" >
</form>

<input type="text" id="nmbx" name="nambox" style="position:absolute;z-index:23000;width:20%; bottom:60px;" value="nambx"/>











    <div id="shoebox" style="position:absolute;display: none; width: 300px;height: 150px;background-color: #eef1f1fd;z-index: 210000;top:400px;left:550px;box-shadow: #5e5c63;border-radius: 10px;">
     <span style="position:absolute;width:80%;height:20%;top:30px;left:40px;">Are you shure need Reset?</span>
     
      <button id="yyes" style="position: relative;padding: 15px;left:20px;top:100px;width: 100px;">yes</button>
      <button id="nno" style="position: relative;padding:15px;right:-80px;top:100px;width: 100px;">No</button>
    </div>


    






    




    <div id="mydiv" style="position: absolute;box-shadow: #668;left:32.5%;top:35px; width:250px;height: 400px;background-color: rgb(214, 214, 212);z-index: 11000;border:solid 1px #b4b3b3;">
    
    <div style="background-color: #f7f7f4;width:100%;height:4%;">
      <img src="trh.png" id="trh" style="position: absolute;cursor: pointer; width: 10px; height:10px">
      <img src="gma.png" id="gma" style="position: absolute;cursor: pointer; width: 10px; height: 10px;display: none;">

    </div>
    <div style="background-color: #f8f8f4;width:100%;height:6%;text-align: center;border-top: #5e5c63 solid 1px;"> 
      <span style="position: relative;color: #ccd;font-size: 10px;color: #3033f7;font-family: fantasy;font-size: 20px;">Box Setting</span>

    </div>

    <div class="hdsh" style="background-color: #f7f7f4;width:90%;height:15%;margin: 4%;border-radius: 5px;cursor: pointer;">
      
      
      <cpan style="position: relative;left:2px;top:20px;" >
      
        <div id="BoxConfigOptions">
          <div id="productNameDiv">
             <span class="arrowBtnL" id="arrowBtnL" ><i id="" class="fas fa-arrow-circle-left"></i></span>
             <span id="productName">Mailer Box</span>
             <span class="arrowBtnR"id="arrowBtnR"><i id="" class="fas fa-arrow-circle-right"></i></span>
          </div>
        </div>
      
      </cpan>
    
    
    
    
    </div>

    <div id="rng" class="hdsh" style="background-color: #f7f7f4;width:90%;height:15%;margin: 4%;border-radius: 5px;z-index: 11000;"><cpan style="position: relative;left:2px;top:20px;" >5*5*5</cpan>
    <div id="hidd" class="hdsh" style="position: absolute;width: 100%;height:20%;background-color: #ef4b8200;top:20%;left:0px;"></div>
    
      <div id="sid5" class="hdsh" style="position: absolute;margin-left: 250px;display: none; background-color: rgb(235, 227, 229);width: 130px;height: 400px;z-index: 12000;" >
    
      <div class="left50" >
        <div class="groupcontainer">
          <div class="slidecontainer">
             <span>WIDTH: </span><span id="boxWidthValue" >300</span><span> mm</span>
            <input type="text" min="60" max="600" value="400" class="slider" id="boxWidth">
          </div>

          <div class="slidecontainer">
            <span>LENGTH: </span><span id="boxLengthValue" >200</span><span> mm</span>
            <input type="text" min="60" max="600" value="300" class="slider" id="boxLength">
          </div>
          <div class="slidecontainer">
            <span>HEIGHT: </span><span id="boxHeightValue" >100</span><span> mm</span>
            <input type="text" min="60" max="400" value="100" class="slider" id="boxHeight">
          </div>
        </div>
      </div>
    
    
    
    </div>
    
    </div>
    <div class="hdsh" style="background-color: #f7f7f4;width:90%;height:15%;margin: 4%;border-radius: 5px;"><cpan style="position: relative;left:2px;top:20px;" >White Board</cpan></div>
    <div class="hdsh" style="background-color: #f7f7f4;width:90%;height:15%;margin: 4%;border-radius: 5px;"><div>Quilty</div> <div style="position: relative; z-index: 20000;"><input style="position: relative; z-index: 20000;" type="range" min="1" max="100" value="50" class="slider" id="myRange"></div>  </div>
    <div class="hdsh" style="background-color: #f7f7f4;width:90%;height:15%;margin: 4%;border-radius: 5px;"><cpan style="position: relative;left:2px;top:20px;" >Price</cpan></div>

    </div>




<!--     part 2 -----------------------------------------                            -->


    <div id="mydivv" style="position: absolute;right:20px;top: 35px; width:250px;height: 400px;background-color:rgb(214, 214, 212);z-index: 11000;border:solid 1px #b4b3b3;">
    
      <div style="background-color: #dad7d4;width:100%;height:4%;border-bottom: #5e5c63 solid 1px;"> 
        <img src="trh.png" id="trhh" style="position: absolute; width: 10px; height:10px;right:0px">
        <img src="gma.png" id="gmaa" style="position: absolute; width: 10px; height: 10px;display: none;right:0px"> 
      </div>

      

      <div class="hdshh" id="clicktoclick" style="background-color: #fafafa;cursor: pointer; width:90%;height:15%;margin: 4%;border-radius: 5px;">
        <cpan style="position: relative;left:80px;top:20px;cursor: pointer;" >Add Art</cpan>
        <input id="clk" type="file" value="img" class="myfile" style="position: relative;height:50px;cursor: pointer;top:-20px;opacity: 0;" />

      </div>
  
      <div id="adtxts" class="hdshh" style="background-color: #fffffffd;width:90%;cursor: pointer;text-align: center; height:15%;margin: 4%;border-radius: 5px;"><span style="position: absolute;left:80px;top:110px; " >ADD Text</span>

      </div>
      <div id="shhdshap" class="hdshh" style="background-color: #fafafa;cursor: pointer;text-align: center; width:90%;height:15%;margin: 4%;border-radius: 5px;">
        <cpan style="position: relative;left:2px;top:20px;" >Shapes</cpan>
        <div id="dvhd" style="position: absolute;width:90%;height:60px;background-color: #5a3e3e00;"></div>
       <input type="color" id='boxbg' style="position:absolute;width: 40px;height: 40px; border-radius: 50%;left:-3px;top:180px;" />

       <input type="color" id='boxbgin' style="position:absolute;width: 40px;height: 40px; border-radius: 50%;left:-3px;top:180px;display:none" />

      <div id="sidshape" style="position: absolute;display: none; width: 100%;height: 80%;background-color: #e5e3e9;left:-100%;margin-bottom: 5px;;">
<div style="position: relative;width: 100%;height: 20px;background-color: #63b5f6;margin: 2px 0px;"></div>
<img class="imgtexture"   style="position:relative;width:30%;height:30%" src="gma.png"/>
<img class="imgtexture" style="position:relative;width:30%;height:30%" src="hlal.jpg"/>
<img class="imgtexture" style="position:relative;width:30%;height:30%" src="lov.jpg"/>
<img style="position:relative;width:30%;height:30%" src=" "/>
<img style="position:relative;width:30%;height:30%" src=" "/>
<img style="position:relative;width:30%;height:30%" src=" "/>
<img style="position:relative;width:30%;height:30%" src=" "/>



      </div>
      
      
      
      
      
      
      
      
      
      </div>
      <div class="hdshh" style="background-color: #fafafa;cursor: pointer; width:90%;height:15%;margin: 1%;border-radius: 5px;width: 93%;height:30%;border: #f7f7f8 solid 2px; ">   
         
        <div style="position: absolute;width: 90%;height:30%;background-color: #EF4B81;"></div>
        <img  id="addimg" class="imgtexture"  style="position: relative;cursor: pointer; width:100%;z-index: 8000;height:100%;" src="gma.png"/>

         <button id="removimg" class="UIBtnd" onclick="remove()" alt="Start Over"><i class="fas fa-trash"></i></button>
      </div>
  
      </div>

<!--    this save with rest-->
<div style="position: absolute;border-radius: 50%; width:40px;height:40px; z-index: 11000;left:5%;top:80%;">
  <i style="position: relative;color: #ccd; color: #EF4B81;" class="fas fa-fill-drip fa-2x"></i><input type="color" id="capcolr" style="position: absolute;border-radius: 50%; width:40px;height:40px; border: rgb(10, 10, 10) solid 5px;z-index: 11000;left:5%;top:80%;background-color: rgb(17, 17, 17);" />
</div>


      <div id="resttt" style="position: absolute; width:120px;font-family:fantasy;height:40px;text-align: center; border: rgb(58, 58, 58) solid 1px;background-color: #eee6e9;z-index: 11000;left:30%;top:80%;border-radius: 20px 20px 20px 20px;">
     <span style="position: relative;top:8px;">Reset</span>
      </div>
      
      <div id="save" style="position: absolute;text-align: center;font-family:fantasy; width:120px;height:40px; border: rgb(58, 58, 58) solid 1px;background-color: #eee6e9;z-index: 11000;left:40%;top:80%;border-radius: 20px 20px 20px 20px;">
        <i style="position: relative;top:8px;margin-right:7px;" class="fas fa-link"></i><span style="position: relative;top:8px;">Get Link</span>
      </div>
      <div  id="restt" style="position: absolute;text-align: center; font-family:fantasy; width:120px;height:40px; border: rgb(58, 58, 58) solid 1px;background-color: #eee6e9;z-index: 11000;left:50%;top:80%;border-radius: 20px 20px 20px 20px;">
        <i style="position: relative;top:8px;margin-right:7px;" class="fas fa-save"></i><span style="position: relative;top:8px;">Save</span>
      </div>
      
      <div id="chek" style="position: absolute;text-align: center; width:170px;height:40px; border: rgb(58, 58, 58) solid 1px;background-color: #346ce7;z-index: 11000;left:60%;top:80%;border-radius: 20px 20px 20px 20px;">
       <span style="position: relative;top:8px;color: #ccd;">Cheackout</span>
      </div>
      <!--  end resr with save                      -->



    
		<div d="windowContainer">
		    <div class="row">

			<div class="column" id="editorCanvasOutsideDiv">
				<div id="editorCanvasOutsideScale">
					<canvas id="editorCanvasOutside" width="1024" height="1024"></canvas>
				</div>
			</div>

			<div class="column" id="editorCanvasInsideDiv">
				<div id="editorCanvasInsideScale">
				  <canvas id="editorCanvasInside" width="1024" height="1024"></canvas>
				</div>
			</div>

		<div class="displayCanvasDiv">
			<canvas id="displayCanvas"></canvas>
		</div>	

		<!-- <div id="logo"><img src="./assets/img/logo.png"></div> -->

	    <div id="viewerSwitch">
	       <div id="boxStateDiv">
	          <span class="toggleLabel">CLOSE </span>
	          <span>
	            <label class="switch">
	              <input type="checkbox" id="boxState" checked>
	              <span class="slider_toggle round"></span>
	            </label>
	          </span>
	          <span class="toggleLabel"> OPEN</span>
	        </div>
	    </div>

	    <div id="drawerContainer" style="visibility: hidden;">
		    <div id="editorDrawer">
		    	<div id="drawerContents">



					<div class="editorRow" style="visibility: hidden;">		    		
						<div class="left50">
							<div class="groupcontainer">
								<button class="UIBtnd" onclick="addText()" alt="Align Left"><i class='fas fa-align-left'></i></button>
								<button class="UIBtnd" onclick="addRect()"><i class='fas fa-square'></i></button>
								<button class="UIBtnd" onclick="addCircle()"><i class='fas fa-circle'></i></button>
								<button class="UIBtnd" onclick="addTriangle()"><i class='fas fa-play' style=" transform: rotate(30deg);"></i></button>
								<button class="UIBtnd" onclick="addImage()"><i class='fas fa-image'></i></button>
							</div>
						</div>
						<div class="right50">
							<div class="groupcontainer">
								<div style="float: right;">
									<button class="UIBtnd" onclick="" alt="Start Over"><i class="fas fa-trash"></i></button>
									<button class="UIBtnd" onclick="" alt="Save and Share"><i class='fas fa-check'></i></button>
									<button class="UIBtnd" onclick="toggleDrawer()" alt="Edit Design"><i class='fas fa-edit'></i></button>
								</div>
							</div>
						</div>
					</div>
	
					<div class="editorRow">
						<div class="editorHeader">Modify Selection</div>
						<div class="left50">
							<div class="groupcontainer">
								<div>COLOR:</div>
								<label for="favcolor"><i class='fas fa-fill-drip'></i></label>
								<input type="color" id="colorPicker" name="fillcolor" value="#2196F3" onchange="setFillColor(this.value)">
								<label for="favcolor"><i class='fas fa-bezier-curve'></i></label>
								<input type="color" id="colorPicker" name="favcolor" value="#2196F3" onchange="setStrokeColor(this.value)">
							</div>
						</div>
						<div class="right50">
							<div class="groupcontainer">
								<button class="UIBtnd btn-sm" onclick="bringForward()">↑</button>
								<button class="UIBtnd btn-sm" onclick="bringToFront()">⇑</button>
								<button class="UIBtnd btn-sm" onclick="sendBackwards()">↓</button>
								<button class="UIBtnd btn-sm" onclick="sendToBack()">⇓</button>
								<button class="UIBtnd md-warn" onclick="remove()"><i class='fas fa-trash'></i></button>
							</div>
						</div>
					</div>
					
					<div class="editorRow">		    		
						<div class="left50">
							<div class="groupcontainer">
								<div class="slidecontainer">
								  <span>OPACITY: </span><span id="editorOpacityValue" class="SliderValue">100</span><span>%</span>
								  <input type="range" min="0" max="100" value="100" class="slider" id="editorOpacity" onchange="setOpacity(this.value)">
								</div>

								<div class="slidecontainer">
								  <span>LINE WIDTH: </span><span id="editorsetLineWidthValue" class="SliderValue">5</span><span></span>
								  <input type="range" min="1" max="10" value="5" class="slider" id="editorLineWidth" onchange="setLineWidth(this.value)">
								</div>
							</div>
						</div>
						<div class="right50">
							<div class="groupcontainer">
	 							<div id="fontselect" class="custom-select" >
							        FONT-FAMILY: <select id="font-family"></select>
								</div>		
							</div>
						</div>
					</div>

					<div class="editorRow">
						<div class="left50">
							<div class="groupcontainer">
							</div>
						</div>
						<div class="right50">
							<div class="groupcontainer">
							</div>
						</div>
					</div>

				


		    	</div>
		    </div>


		    <div id="editorDrawerHandle">
				<i id="drawerArrow" class="fas fa-arrow-circle-right"></i>
		    </div>
	    </div>

		<div id="editorControls">



			<div id="BoxConfigOptions" style="visibility: hidden;">
				<div id="productNameDiv">
					 <span class="arrowBtnL" id="arrowBtnL"><i id="" class="fas fa-arrow-circle-left"></i></span>
					 <span id="productName">Mailer Box</span>
					 <span class="arrowBtnR"id="arrowBtnR"><i id="" class="fas fa-arrow-circle-right"></i></span>
				</div>
			</div>

      
			<div id="priceAndCheckout" style="visibility: hidden;">
				<div class="boxOutputWindow">
					<div id="checkoutBtn">	
						<label for="fname">Quatity:</label>
						<input type="text" id="productQuantity" name="quantity" value="1000">
						<span id="boxOutputCost"><div id="priceTag">$300 </div></span >CHECKOUT <i class='fas fa-arrow-circle-right'></i>
					</div>
				</div>
			</div>


			<div id="BoxConfigOptions">

<!---

				<div class="left50">
					<div class="groupcontainer">
						<div class="slidecontainer">
							 <span>WIDTH: </span><span id="boxWidthValue" class="SliderValue">300</span><span> mm</span>
							<input type="range" min="60" max="600" value="400" class="slider" id="boxWidth">
						</div>

						<div class="slidecontainer">
							<span>LENGTH: </span><span id="boxLengthValue" class="SliderValue">200</span><span> mm</span>
							<input type="range" min="60" max="600" value="300" class="slider" id="boxLength">
						</div>
						<div class="slidecontainer">
							<span>HEIGHT: </span><span id="boxHeightValue" class="SliderValue">100</span><span> mm</span>
							<input type="range" min="60" max="400" value="100" class="slider" id="boxHeight">
						</div>
					</div>
				</div>


      --->

				<div class="right50" style="visibility: hidden;">
					<div class="groupcontainer">
						<div class="left50">
							<div class="slidecontainer">
					            <label class="switch">
					              <input type="checkbox" id="boxState">
					              <span class="slider_toggle round"></span>
					            </label>
								<span class="toggleLabel small">Gloss</span>
							</div>
							<div class="slidecontainer">
					            <label class="switch">
					              <input type="checkbox" id="boxState">
					              <span class="slider_toggle round"></span>
					            </label>
								<span class="toggleLabel small">Matt</span>
							</div>
							<div class="slidecontainer">
					            <label class="switch">
					              <input type="checkbox" id="boxState">
					              <span class="slider_toggle round"></span>
					            </label>
								<span class="toggleLabel small">UV</span>
							</div>
						</div>
						<div class="right50">
							<div class="slidecontainer">
					            <label class="switch">
					              <input type="checkbox" id="boxState">
					              <span class="slider_toggle round"></span>
					            </label>
								<span class="toggleLabel small">Spot UV</span>
							</div>
							<div class="slidecontainer">
					            <label class="switch">
					              <input type="checkbox" id="boxState">
					              <span class="slider_toggle round"></span>
					            </label>
								<span class="toggleLabel small">Emboss</span>
							</div>
							<div class="slidecontainer">
					            <label class="switch">
					              <input type="checkbox" id="boxState">
					              <span class="slider_toggle round"></span>
					            </label>
								<span class="toggleLabel small">Foil</span>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>


		<div id="editorSwitch">
		   <div id="editorStateDiv">


		      <span class="toggleLabel">OUTSIDE </span>
		      <span>
		        <label class="switch">
		          <input type="checkbox" id="editorState">
		          <span class="slider_toggle round"></span>
		        </label>
		      </span>
          <span class="toggleLabel"> INSIDE</span>
          
          
		    </div>
		</div>


		
	</div>

</div>



  <script src="./assets.dev/js/fontfaceobserver.js" ></script>
  <script src="./assets.dev/js/fabric.min.js"></script>
  <script src="./assets.dev/js/tween.min.js"></script>

  <script src="./assets.dev/js/initialization.js" type="text/javascript"></script>
  <script src="./assets.dev/js/threecode.js" type="module"></script>
  <script src="./assets.dev/js/fabriccodeph1.js" type="text/javascript">



		</script>
    
    <input type="text" id ="faceleft"  style="position: absolute;left:0px;top:300;z-index:" value="left; visibility:hidden;bottom:1px"/>
    <input type="text" id ="facetop" style="position: absolute;left:200px;top:300;z-index:" value="right" />
<br>

<input type="text" id ="bxw"  style="position: absolute;left:10px;top:300;z-index: 1; visibility:hidden;bottom:1px"/>
<br>
<input type="text" id ="bxh"  style="position: absolute;left:30px;top:500;z-index: 1; visibility:hidden;bottom:1px"/>
<br>
<input type="text" id ="bxwin" value="win"  style="position: absolute;left:50px;top:700;z-index: 1; visibility:hidden;bottom:1px"/>
<br>
<input type="text" id ="bxhin" value="wout" style="position: absolute;left:70px;top:900;z-index: 1; visibility:hidden;bottom:1px"/>
<br>
    <input type="text" id ="insideleft"  style="position: absolute;left:90px;top:500;z-index: 1;" value="inleft; visibility:hidden;bottom:1px"/>
    <input type="text" id ="insidetop" style="position: absolute;left:110px;top:500;z-index: 1;" value="right; visibility:hidden;bottom:1px" />



  </body>
  

</html>