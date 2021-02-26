<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Packagengo Designer</title>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Dancing+Script&family=Roboto&family=Open+Sans:wght@300&family=Open+Sans:wght@600&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Montez&family=Dancing+Script&family=Lobster&family=Josefin+Sans:wght@300&family=Josefin+Sans:wght@600&family=Shadows+Into+Light:wght@300;400;600&display=swap" rel="stylesheet"> -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Montez|Lobster|Josefin+Sans|Shadows+Into+Light|Pacifico|Amatic+SC:700|Orbitron:400,900|Rokkitt|Righteous|Dancing+Script:700|Bangers|Chewy|Sigmar+One|Architects+Daughter|Abril+Fatface|Covered+By+Your+Grace|Kaushan+Script|Gloria+Hallelujah|Satisfy|Lobster+Two:700|Comfortaa:700|Cinzel|Courgette' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montez|Lobster|Josefin+Sans|Shadows+Into+Light|Pacifico|Amatic+SC:700|Orbitron:400,900|Rokkitt|Righteous|Dancing+Script:700|Bangers|Chewy|Sigmar+One|Architects+Daughter|Abril+Fatface|Covered+By+Your+Grace|Kaushan+Script|Gloria+Hallelujah|Satisfy|Lobster+Two:700|Comfortaa:700|Cinzel|Courgette' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="js/fileSaver.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/javascript-canvas-to-blob/3.28.0/js/canvas-to-blob.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>

$(document).ready(function(){
  var email="jjj";
  $('#mydiv').draggable();
  $('#mydivv').draggable();
  $("#mydiv").mouseenter(function(){
    $('#mydiv').draggable(); 
  });
  $("#rng").mouseenter(function(){
    $('#mydiv').draggable( { disabled: false } );  
  });
  $("#rng").mouseleave(function(){
    $('#mydiv').draggable();  
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
    $('#givimg').click();
  });

  $("#trhh").click(function(){
    $("#mydivv").animate({
      height: '100px',
      width: '80px'
    });
    $("#settingDesign_box").css("top","10px");
    $("#settingDesign_box").css("padding","5px");
    $(".hdshh").animate({
      opacity:'0'
    });
    $("#gmaa").css("display","block");
    $("#trhh").css("display","none");
  });
  $("#gmaa").click(function(){
    $("#mydivv").animate({
      height: '400px',
      width: '200px'
    });
    $("#settingDesign_box").css("top","-30px");
    $("#settingDesign_box").css("padding","10px");
    $(".hdshh").animate({
      opacity:'1'
    });
    $("#gmaa").css("display","none");
    $("#trhh").css("display","block");
  });

  const myform = document.getElementById("myform");
  const inputfile =  document.getElementById("inpFile");
  myform.addEventListener("submit" , e =>{
  e.preventDefault();
  const endpoint = "pagg.php";
  const formdata = new FormData();

  formdata.append("inpFile", inpFile.files[0]);
    fetch(endpoint, {
      method:"post",
      body :formdata
    }).catch(console.error);
  });
  $('#removimg').click(function(){ // here when we click on image to showen on box
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
  $("#trh").click(function(){
    $("#mydiv").animate({
      height: '100px',
      width: '80px'
    });
    $("#setting").css("top","10px");
    $("#setting").css("padding","5px");
    $(".hdsh").animate({
      opacity:'0'
    });
    $("#gma").css("display","block");
    $("#trh").css("display","none");
  });
  $("#gma").click(function(){
    $("#mydiv").animate({
      height: '400px',
      width: '200px'
    });
    $("#setting").css("top","-30px");
    $("#setting").css("padding","10px");
    $(".hdsh").animate({
      opacity:'1'
    });
    $("#gma").css("display","none");
    $("#trh").css("display","block");
  });
  $('#dvhd').click(function(){
    $('#sidshape').toggle();
  });

  $('#selectFontBtn').click(function(){
    $('#toggleSelectFont').toggle();
  });

  $('#yyess').click(function(){
    $('#shoebox').css('display','none');
  });
  $('#nno').click(function(){
    $('#shoebox').css('display','none');
  });
  $('#resttt').click(function(){
    $('#shoebox').css('display','block');
    function moveFile(){
      var object = new ActiveXObject("Scripting.FileSystemObject");
      var file = object.GetFile("C:\\Users\\maad\\Downloads\\outside (80).png");
      file.Move("C:\\wamp64\\www\\gltf\\New folder\\");
      document.write("File is moved successfully");
    }
    moveFile();
  });
  $('#restt').click(function(){ // this take image for outside of canvas
  });
  $('#resttreg').click(function(){ // this take image for outside of canvas
    $("#showreg").css("display","block");
  });
  $('#myRange').change(function(){
    $('#quilt').val($('#myRange').val());
  });
  $('#show3dcolr').click(function(){ // this take image for outside of canvas
    $('#dcolr').toggle();
  });
});

// caught pic ---------------------------
</script>
  </head>
	<body>
  <?php

include 'con1.php';

//session_start();
if(isset($_GET['username'])==false){
 

  echo "
  
  <style>


#restt{

display:none;

}

#resttreg{

  display:block;
  
  }

  </style>
  
  ";

}else{

  $user=$_GET['username'];
 
  


  echo "
  
  <style>


#restt{

display:block;

}

#resttreg{

  display:none;
  
  }

  </style>
  
  ";


}




//$con=mysqli_connect("localhost:3308","root","","box");
//$sql="INSERT INTO `user` (`username`,`password`,`email`) VALUES ('peter','123','')";

//$result=mysqli_query($con,$sql);

if(isset($_POST['subreg'])){
$ary=array();
$usercount=$_POST['username'];
$slc="SELECT `username` FROM `user` ";

$qry=mysqli_query($con,$slc);
while($row=mysqli_fetch_array($qry)){
$use=$row['username'];
if($use==$usercount){
$ary[]=$use;




  if (!in_array($usercount,$ary)){
	
    echo "
    
    <style>
#showreg{
display:block


}

    
    </style>
    " 
  
    ;
  
  }

}
 


}

}

// heer sub clicked by another to upload image


/*

if(isset($_POST['subimg'])){
$dir="getlink/" . basename($_FILES["image"]["name"]);
$img=$_FILES["image"]["name"];
$imgdir=$_FILES["image"]["tmp_name"];


move_uploaded_file($imgdir,$dir);

}
*/


  

   if(isset($_POST['subend'])){

    $jjson=$_POST['myyjson'];
  


   
   

    $myfile = fopen("jsonfile.json", "w");
    $myfiler = fopen("jsonfile.json", "r");
    fwrite($myfile, $jjson);
 
 
 
    $jjsonin=$_POST['myyjsonin'];
 
    $myfilein = fopen("jsonfilein.json", "w");
    $myfilerin = fopen("jsonfilein.json", "r");
 
    fwrite($myfilein, $jjsonin);

// end with json


    $namebox=$_POST['namebox'];
    $namew=$_POST['widthbox'];
    $namel=$_POST['lengthbox'];
    $nameh=$_POST['heightbox'];
    $nameq=$_POST['quilty'];
    $namep=$_POST['price'];
    $json1=$_POST['myyjson'];
    $json2=$_POST['myyjsonin'];

   



   
    $sql="INSERT INTO `databox` (`username`,`outjsn`,`injsn`,`namebox`,`widthbox`,`lengthbox`,`heightbox`,`quiltybox`,`price`) 
    VALUES
    ('$user','$json1','$json2','$namebox','$namew','$namel','$nameh','$nameq','$namep')";

$result=mysqli_query($con,$sql);

   }
   

   ?>


<input type="text" id="repeat" value="1" style="display:none;"/>
<input type="text" id="patterns" value="1" style="display:none;"/>

  <!--  this end of form have all information-->

<div id="endform" style="position:absolute;display:none; top:100px;left:60%;width:200px;height:500px;background-color:blue;z-index:30000">
  <form action="" method="post">
    <span>name box :</span><input type="text" name="namebox" id="namebox" /><br>
    <span>widthbox :</span><input type="text" name="widthbox" id="widthbox" /><br>
    <span>lengthbox :</span><input type="text" name="lengthbox" id="lengthbox" /><br>
    <span>heightbox :</span><input type="text" name="heightbox"  id="heightbox" /><br>
    <span>quilty :</span><input type="text" name="quilty" id="quilty" /><br>
    <span>price :</span><input type="text" name="price" id="price" /><br>
    <span>jsondata1 :</span><input type="text" id="myTextArea" name="myyjson" style="z-idex:20000" value="json data"/>
    <span>jsondata2 :</span><input type="text" id="myTextAreain" name="myyjsonin" style="z-idex:20000"/>
    <input type="submit" name="subend" />
  </form>
</div>

<div id="showreg" style="position:absolute;top:500px;left:400px;z-index:33333;display:none" >
  <form action="" method="post" >
    <span>username:</span><input type="text" name="username" />
    <br>
    <span>password:</span><input type="text" name="pass" />
    <input type="submit" name="subreg"  id="subrg"/>
   </form>
</div>
<div id="shoebox" style="position:absolute;display: none; width: 300px;height: 150px;background-color: #eef1f1fd;z-index: 210000;top:400px;left:550px;box-shadow: #5e5c63;border-radius: 10px;">
  <span style="position:absolute;width:80%;height:20%;top:30px;left:40px;">Are you shure need Reset?</span>
  
  <button id="yyess" style="position: relative;padding: 15px;left:20px;top:100px;width: 100px;">yes</button>
  <button id="nno" style="position: relative;padding:15px;right:-80px;top:100px;width: 100px;">No</button>
</div>

<!-- part 1 box               -->
<div id="mydiv" style="position: absolute;box-shadow: #668;left:32.5%;top:35px; width:200px;height: 400px;background-color: #F9B9CE;z-index: 11000; box-shadow: 1px 1px 10px grey;">
  <div style="background-color: #F9B9CE;width:100%;height:25px;">
    <i id="trh" class="fa fa-minus-circle" aria-hidden="true" style="position: absolute;cursor: pointer; width: 10px; height:10px; left: 3px; top:4px; color:white;"></i>
    <i id="gma" class="fa fa-plus-circle" aria-hidden="true" style="position: absolute;cursor: pointer; width: 10px; height: 10px;left: 3px; top:4px; color:white; display: none; z-index:1;"></i>
    <!-- <img src="trh.png" id="trh" style="position: absolute;cursor: pointer; width: 10px; height:10px">
    <img src="bg.png" id="gma" style="position: absolute;cursor: pointer; width: 10px; height: 10px;display: none;"> -->
  </div>
  <div style="background-color: #F9B9CE;width:100%;height:6%;text-align: center;border-top: white solid 1px;"> 
    <span id="setting" style="position: relative;background-color: #EF4B81; font-size: 10px;color: white;border-radius:10px  0px;font-family: fantasy;font-size: 20px;padding: 10px;top:-30px; cursor: grab;">Box Setting</span>
  </div>
  <div class="hdsh" style="background-color: #F9B9CE;width:100%;height:10%;cursor: pointer;">
    <div id="BoxConfigOptions">
      <div id="productNameDiv">
          <span class="arrowBtnL" id="arrowBtnL" ><i id="" class="fas fa-arrow-circle-left"></i></span>
          <span id="productName" style="font-size:20px; font-weight:bold;bottom: -18px;">Mailer Box</span>
          <span class="arrowBtnR"id="arrowBtnR"><i id="" class="fas fa-arrow-circle-right"></i></span>
      </div>
    </div>
    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ff5500" fill-opacity="1" d="M0,288L48,277.3C96,267,192,245,288,250.7C384,256,480,288,576,266.7C672,245,768,171,864,138.7C960,107,1056,117,1152,138.7C1248,160,1344,192,1392,208L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
    </path></svg> -->
  </div>

  <div id="rng" class="hdsh" style="background-color: #F9B9CE;width:100%;height:15%;z-index: 11000;border-top: 1px solid white;cursor:pointer;"><span style="position: relative;left:5px;top:20px;color:#EF4B81;font-size:15px; " ><strong>5 * 5 * 5</strong></span>
  <div id="hidd" class="hdsh" style="position: absolute;width: 100%;height:60px;background-color: #ef4b8202;top:29%;left:0px;"></div>

  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,0L60,21.3C120,43,240,85,360,117.3C480,149,600,171,720,165.3C840,160,960,128,1080,138.7C1200,149,1320,203,1380,229.3L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
  </path></svg>
  
  <div id="sid5" class="hdsh animate__animated animate__fadeInLeft" style="position: absolute;margin-left: 205px;display: none; background-color: #F9B9CE; z-index: 12000; box-shadow:1px 1px 10px gray; top:90px;" >
    <div class="left50" >
      <div class="groupcontainer">
        <div class="slidecontainer pink-input sm-height" style="margin-right: 8px;">
          <span>WIDTH(mm) </span>
          <input type="text" min="60" max="600" value="400" class="slider" id="boxWidth">
        </div>
        <div class="slidecontainer pink-input sm-height" style="margin-right: 8px;">
          <span>LENGTH(mm) </span>
          <input type="text" min="60" max="600" value="300" class="slider" id="boxLength">
        </div>
        <div class="slidecontainer pink-input sm-height">
          <span>HEIGHT(mm) </span>
          <input type="text" min="60" max="400" value="100" class="slider" id="boxHeight">
        </div>
      </div>
    </div>
  </div>
    
    </div>
  <div class="hdsh" style="background-color: #F9B9CE;width:100%;height:15%;border-bottom:1px solid white;">
  <span style="position: relative;left:5px;top:20px;color: #EF4B81;font-size: 15px;" > <strong>Box Kinds</strong> </span>
  
  <div class="default-bg-con">
    <img class="patreenimg default-bg-item selected"  src="pattern/brown.jpg"/>
    <img class="patreenimg default-bg-item"  src="pattern/white.jpg"/>
  </div>
</div>
  <div class="hdsh" style="background-color: #F9B9CE;width:100%;height:23%;">
    <div class="pink-input" style="padding-top:10px;">
      <span style="padding-left:5px; color:#EF4B81; font-size:15px;"> <strong>Quilty: </strong> </span> 
      <input type="text" id="quilt" value="1000" style="width: 87%;border-radius:30px;margin-top:10px; padding-left:10px; margin-left:6px;"/> 
    </div> 
    <!-- <div style="position: relative; z-index: 20000;">
      <input style="position: relative; z-index: 20000;width:70%;float:left" type="range" min="1" max="100" value="50" class="slider" id="myRange">
    </div>   -->
  </div>
  <div class="hdsh pink-input" style="position: relative; background-color: #F9B9CE;width:100%;height:24%;border-top:1px solid white">
    <span style="position: relative; left:5px;top:11px;float: left;color :#EF4B81;font-size:15px; " > <strong>Price:</strong> </span>
    <input type="text" id="txtprice" style="width: 87%;border-radius:30px;margin-top:17px; padding-left:10px; margin-left:6px;"/> 
    <!-- <input type="text" id="txtprice" style="position:relative;color: #F9B9CE; top:10px;width:70px;left:5px;height:60%;float: right;" /> -->
  </div>
</div>





<!--     part 2 -----------------------------------------                            -->
  <div id="mydivv" style="position: absolute;right:20px;top: 35px; width:200px;height: 400px;background-color:#F7B8CC;z-index: 11000; box-shadow: 1px 1px 10px grey;">
    <div style="background-color: #F9B9CE;width:100%;height:25px;border-bottom: white solid 1px;"> 
      <!-- <img src="trh.png" id="trhh" style="position: absolute; width: 10px; height:10px;right:0px">
      <img src="bg.png" id="gmaa" style="position: absolute; width: 10px; height: 10px;display: none;right:0px">  -->
      <i id="trhh" class="fa fa-minus-circle" aria-hidden="true" style="position: absolute;cursor: pointer; width: 10px; height:10px; right: 10px; top:4px; color:white;"></i>
      <i id="gmaa" class="fa fa-plus-circle" aria-hidden="true" style="position: absolute;cursor: pointer; width: 10px; height: 10px;right: 10px; top:4px; color:white; display: none;"></i>
    </div>
    <div style="background-color: #F9B9CE;width:100%;height:6%;text-align: center;"> 
      <span id="settingDesign_box" style="position: relative;background-color: #EF4B81; font-size: 10px;color: white;border-radius:10px  0px;font-family: fantasy;font-size: 20px;padding: 10px;top:-30px; cursor: grab;">Box Design</span>
    </div>
    <div class="hdshh" id="clicktoclick" style="background-color: #F9B9CE;cursor: pointer; width:100%;height:15%;">
      <div class="d-flex align-items-center justify-content-center text-white upload-bg-btn">
        <i class="fas fa-upload mr-3" ></i>
        <strong style="padding: 15px;">Add Art</strong>
      </div>
      <form class="form myUploadCustom" id="myform">
        <input id="inpFile" type="file" class="myfile" style="position: relative;height:61px;cursor: pointer;top:-58px;opacity: 0; width:100%" />
        <!-- <button type="submit" id="givimg" style="visibility:hidden;">upload</button> -->
      </form>
    </div>

    <div class="hdshh" style="position:relative; background-color: #F9B9CE;cursor: pointer; width:100%;height:15%;">
      <div id="selectFontBtn" class="d-flex align-items-center justify-content-center text-white upload-bg-btn">
        <i class="fas fa-pencil-alt mr-3" ></i>
        <strong style="padding: 15px;">Add Text</strong>
      </div>
    
    
    <div  id="toggleSelectFont" class="textSetting hdshh animate__animated animate__fadeInRight" style="display:none;">
      <label for="fontcolor" style="font-size:15px; font-weight:bold; color: black;">Choose Font Color</label>
      <input type="color" id="fontcolor">
      <div id="fontselect" class="custom-select" style="padding-top:20px;">
        <label for="font-family" style="font-size:15px; font-weight:bold; color: black;">Choose Font Family</label>
        <select id="font-family">         
        </select>
      </div>
      <div  id="adtxts" class="font-select-btn-con">
        <div class="font-select-btn">Add Text</div>
      </div>		
    </div>
  </div>

    
    <!-- <div id="adtxtss" class="hdshh" style="background-color: #fffffffd;width:90%;cursor: pointer;text-align: center; height:15%;margin: 4%;border-radius: 5px;">
      <p style="position: absolute;left:80px;top:110px; " >ADD Text</p>
    </div> -->
    <!-- <div id="adtxtss" class="hdshh" style="background-color: #fafafa;cursor: pointer;text-align: center; width:90%;height:15%;margin: 4%;border-radius: 5px;">
      <span style="position: relative;left:2px;top:20px;" >Shapes</span>
      <div id="dvhd" style="position: absolute;width:90%;height:60px;background-color: #5a3e3e00;"></div>
    </div> -->

    <div id="shhdshap" class="hdshh" style="background-color: #F9B9CE;cursor: pointer;text-align: center; width:100%;height:15%;">
      <div id="dvhd" class=" hdshh d-flex align-items-center justify-content-center text-white upload-bg-btn">
        <i class="fas fa-palette mr-3"></i>
        <p><strong>Add Pattern</strong></p>
      </div>
      <!-- <span style="position: relative;left:2px;top:20px;" >Shapes</span> -->
      <!-- <div id="dvhd" style="position: absolute;width:90%;height:60px;background-color: #5a3e3e00;"></div> -->
      <!-- <input type="color" id='boxbg' style="position:absolute;width: 40px;height: 40px; border-radius: 50%;left:-3px;top:180px;" /> -->
      <input type="color" id='boxbgin' style="position:absolute;width: 40px;height: 40px; border-radius: 50%;left:-3px;top:180px;display:none" />
      <div id="sidshape" class="pattern-item-container animate__animated animate__fadeInRight">
        <div class="text-center"><p class="p-0">Select Pattern</p></div>
        <div class="pattern-img-con">
          <div class="sel-color-con">
            <div class="text-center">
              <p>Select color</p>
            </div>
            <div>
              <input type="color" id='boxbg' style="width: 52px;height: 52px; border-radius: 50%;cursor: pointer;border: #EF4B81 solid 3px; " />
              <img class="pattern-img-item patreenimg"  src="pattern/pattern12.jpg"/>
            </div>
          </div>
          <div class="sel-pattern">
            <div class="text-center">
              <p>Textures</p>
            </div>
              <img class="pattern-img-item patreenimg"  src="pattern/texture/texture_1.svg"/>  
              <img class="pattern-img-item patreenimg"  src="pattern/texture/texture_2.svg"/>  
              <img class="pattern-img-item patreenimg"  src="pattern/texture/texture_3.svg"/> 
            <div class="text-center">
              <p>Abstract</p>
            </div>
            <div>
              <img class="pattern-img-item patreenimg"  src="pattern/abstract/abstract_1.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/abstract/abstract_2.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/abstract/abstract_3.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/abstract/abstract_4.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/abstract/abstract_5.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/abstract/abstract_6.svg"/>
            <div class="text-center">
              <p>Artboard</p>
            </div>
              <img class="pattern-img-item patreenimg"  src="pattern/artboard/Artboard_1.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/artboard/Artboard_2.svg"/>
            <div class="text-center">
              <p>Christmas</p>
            </div>
              <img class="pattern-img-item patreenimg"  src="pattern/christmas/Christmas1.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/christmas/Christmas2.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/christmas/Christmas3.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/christmas/Christmas4.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/christmas/Christmas5.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/christmas/Christmas6.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/christmas/Christmas7.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/christmas/Christmas8.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/christmas/Christmas9.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/christmas/Christmas10.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/christmas/Christmas11.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/dots/dots_10.svg"/>
            <div class="text-center">
              <p>Dots & Circles</p>
            </div>
              <img class="pattern-img-item patreenimg"  src="pattern/dots/dots_1.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/dots/dots_2.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/dots/dots_3.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/dots/dots_4.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/dots/dots_5.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/dots/dots_6.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/dots/dots_7.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/dots/dots_8.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/dots/dots_9.svg"/>
              
            <div class="text-center">
              <p>Flower</p>
            </div>
              <img class="pattern-img-item patreenimg"  src="pattern/flower/flowers_1.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/flower/flowers_2.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/flower/flowers_3.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/flower/flowers_4.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/flower/flowers_5.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/flower/flowers_6.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/flower/flowers_7.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/flower/flowers_8.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/flower/flowers_9.svg"/>             
            <div class="text-center">
              <p>Stripes</p>
            </div>
              <img class="pattern-img-item patreenimg"  src="pattern/stripes/stripes_1.svg"/>              
              <img class="pattern-img-item patreenimg"  src="pattern/stripes/stripes_2.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/stripes/stripes_3.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/stripes/stripes_4.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/stripes/stripes_5.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/stripes/stripes_6.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/stripes/stripes_7.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/stripes/stripes_8.svg"/>              
              <img class="pattern-img-item patreenimg"  src="pattern/stripes/stripes_10.svg"/>
              <img class="pattern-img-item patreenimg"  src="pattern/stripes/stripes_11.svg"/>            
            <div class="text-center">
              <p>Thanksgiving</p>
            </div>             
              <img class="pattern-img-item patreenimg"  src="pattern/thanksgiving/Thanksgiving2.svg"/>                 
              <img class="pattern-img-item patreenimg"  src="pattern/thanksgiving/Thanksgiving4.svg"/>   
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="hdshh" style="background-color: #fafafa;cursor: pointer; width:90%;height:15%;margin: 1%;border-radius: 5px;width: 93%;height:30%;border: #f7f7f8 solid 2px; ">   
      <div style="position: absolute;width: 90%;height:30%;background-color: #ffffff;"></div>
        <img  id="addimg" class="imgtexture" name="imgtexture" style="position: relative;cursor: pointer; width:100%;z-index: 8000;height:100%;" />
        <button id="removimg" class="UIBtnd" onclick="remove()" alt="Start Over"><i class="fas fa-trash"></i></button>
      </div>
    </div>

<!--    this save with rest-->
<div style="position: absolute;border-radius: 50%; width:40px;height:40px; z-index: 11000;left:5%;top:80%;">
  <i style="position: relative;color: #ccd; color: #EF4B81;" class="fas fa-fill-drip fa-2x"></i>
  <input type="color" id="capcolr" style="position: absolute;border-radius: 50%; width:40px;height:40px; border: #EF4B81  solid 5px;z-index: 11000;left:5%;top:80%;background-color: #EF4B81; cursor:pointer;" />
</div>

<div id="show3dcolr" style="position: absolute;border-radius: 50%; width:40px;height:40px; z-index: 11000;left:10%;top:80%;">
  <!-- <i class="fa fa-cube" aria-hidden="true"></i> -->
  <i style="position: relative;color: #ccd; color: #EF4B81;" class="fa fa-cube fa-2x"></i>
  <div  id="3dcolr" style="position: absolute;border-radius: 50%; width:40px;height:40px; border: rgb(10, 10, 10) solid 5px;z-index: 11000;left:5%;top:80%;background-color: rgb(17, 17, 17);cursor:pointer;">
  </div>
</div>

<div id="dcolr" class="d3-back-sel-con">
  <div id="green" class="d3-back-sel-item green"></div>
  <div id="blue" class="d3-back-sel-item blue"></div>
  <div id="pink" class="d3-back-sel-item pink"></div>
  <div id="brown" class="d3-back-sel-item yellow"></div>
  <div id="hdri" class="d3-back-sel-item black" ><span style="color:white">HDRI</span></div>
</div>

<div class="btn-container-bottom">
  <div class="btn-items-con">
    <div id="resttt" class="bottom-btn-item bg-heavy-pink">
      <div class="bottom-btn-item-con">
        <i class="fas fa-undo" style="margin-right:5px;"></i>
        <p>Reset</p>
      </div>
    </div>
    <a href="http://localhost/gltf/015/ph1.php?username=ali">
      <div id="save" class="bottom-btn-item bg-heavy-pink">
        <div class="bottom-btn-item-con">
          <i class="fas fa-link" style="margin-right:5px;"></i>
          <p>Get Link</p>
        </div>
      </div>
    </a>
    <div id="restt" class="bottom-btn-item bg-heavy-pink">
      <div class="bottom-btn-item-con">
        <i class="fas fa-save" style="margin-right:5px;"></i>
        <p>Save</p>
      </div>
    </div>
    <div id="resttreg" class="bottom-btn-item bg-heavy-pink">
      <div class="bottom-btn-item-con">
        <i class="fas fa-save" style="margin-right:5px;"></i>
        <p>Savereg</p>
      </div>
    </div>
    <div id="chek" class="bottom-btn-item bg-heavy-pink">
      <div class="bottom-btn-item-con">
        <i class="fas fa-shopping-cart" style="margin-right:5px;"></i>
        <p>Checkout</p>
      </div>
    </div>
  </div>
</div>

  <!-- <div id="resttt" style="position: absolute; width:120px;font-family:fantasy;height:40px;text-align: center; border: rgb(58, 58, 58) solid 1px;background-color: #eee6e9;z-index: 11000;left:30%;top:80%;border-radius: 20px 20px 20px 20px;">
    <i class="fas fa-undo" style="color:red;"></i>
    <span style="position: relative;top:8px;">Reset</span>
  </div>

  <a href="http://localhost/gltf/015/ph1.php?username=ali">
    <div id="save" style="position: absolute;text-align: center;font-family:fantasy; width:120px;height:40px; border: rgb(58, 58, 58) solid 1px;background-color: #eee6e9;z-index: 11000;left:40%;top:80%;border-radius: 20px 20px 20px 20px;">
      <i style="position: relative;top:8px;margin-right:7px;" class="fas fa-link"></i><span style="position: relative;top:8px;">Get Link</span>
    </div>
  </a>
  <div  id="restt" style="position: absolute; text-align: center; font-family:fantasy; width:120px;height:40px; border: rgb(58, 58, 58) solid 1px;background-color: #eee6e9;z-index: 11000;left:50%;top:80%;border-radius: 20px 20px 20px 20px;">
    <i style="position: relative;top:8px;margin-right:7px;" class="fas fa-save"></i><span style="position: relative;top:8px;">Save</span>
  </div>
  <div  id="resttreg" style="position: absolute; text-align: center; font-family:fantasy; width:120px;height:40px; border: rgb(58, 58, 58) solid 1px;background-color: #eee6e9;z-index: 11000;left:50%;top:80%;border-radius: 20px 20px 20px 20px;">
    <i style="position: relative;top:8px;margin-right:7px;" class="fas fa-save"></i><span style="position: relative;top:8px;">Savereg</span>
  </div>

  <div id="chek" style="position: absolute;text-align: center; width:170px;height:40px; border: rgb(58, 58, 58) solid 1px;background-color: #346ce7;z-index: 11000;left:60%;top:80%;border-radius: 20px 20px 20px 20px;">
    <span style="position: relative;top:8px;color: #ccd;">Cheackout</span>
  </div> -->
      <!--  end resr with save                      -->
		<div id="windowContainer">
      <div class="row">
        <div class="column" id="editorCanvasOutsideDiv">
          <div id="editorCanvasOutsideScale">
            <canvas id="editorCanvasOutside" width="1024" height="1024" ></canvas>
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
					 <span id="productName" >Mailer Box</span>
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
  <script src="./assets.dev/js/fabriccode.js" type="text/javascript"></script>

 
    
<input type="text" id ="allwidth"  style="position: absolute;left:500px;top:500;z-index:30000 ;visibility:hidden " />
<input type="text" id ="allheight"  style="position: absolute;left:700px;top:600;z-index:30000;visibility:hidden" />  
<input type="text" id ="faceleft"  style="position: absolute;left:0px;top:300;z-index:30000;visibility:hidden" value="left"/>
<input type="text" id ="facetop" style="position: absolute;left:200px;top:300;z-index:30000;visibility:hidden" value="right"/><br>
<input type="text" id ="bxw"  style="position: absolute;left:10px;top:300;z-index:30000;visibility:hidden "/><br>
<input type="text" id ="bxh"  style="position: absolute;left:30px;top:500;z-index:30000;visibility:hidden "/><br>
<input type="text" id ="bxwin" value="win"  style="position: absolute;left:50px;top:700;z-index:30000;visibility:hidden "/><br>
<input type="text" id ="bxhin" value="wout" style="position: absolute;left:70px;top:900;z-index:30000;visibility:hidden "/><br>
<input type="text" id ="insideleft"  style="position: absolute;left:90px;top:500;z-index:30000;visibility:hidden" value="inleft"/>
<input type="text" id ="insidetop" style="position: absolute;left:110px;top:700;z-index:30000;visibility:hidden" value="right" />
<input type="text" id ="iff" style="position: absolute;left:110px;top:1000;z-index:30000;visibility:hidden" value="1"/>


  </body>
</html>