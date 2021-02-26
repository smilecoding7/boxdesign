<?php
/**
* Template Name: Custom post items template
* @package WordPress
*/
// wp_head();


if(isset($_POST['subend'])){

  
  $strtoar=$_POST['myyjson'];
  $forbac=$_POST['myyjson'];
  
$cutjsn = str_replace(array('{"version":"4.1.0","objects":[',']}]}'),array('','}'),$strtoar);

$forbacc = str_replace( '"version":"4.1.0","objects":', '' , $forbac);
$refist = rtrim($forbacc,"}");
$relast=  ltrim($refist,"{}}");






$toarr = explode('{"',$cutjsn);
$countt =count($toarr);
$arrrimg=array();
$arrrpath=array();
$arrrtx=array();
$arrrbac=array();

$myfile = fopen("jsonfile.json", "w");
$myfiler = fopen("jsonfile.json", "r");


// add path ----------
$myfileipath = fopen("jsonfilepath.json", "w");
$myfilerimg = fopen("jsonfilepath.json", "r");

// add text 
$myfileitx = fopen("jsonfiletx.json", "w");
$myfilertxx = fopen("jsonfiletx.json", "r");

$myfileibac = fopen("jsonfilebac.json", "w");
$myfilerbbac = fopen("jsonfilebac.json", "r");

for($s=1;$s<=count($toarr)-1;$s++){
  


  if($toarr[$s][8] =='m') {
  
    array_push($arrrimg,$toarr[$s]);
     }
     if($toarr[$s][7] =='p') {
  
      array_push($arrrpath,$toarr[$s]);
       }

       if($toarr[$s][11] =='x') {
  
        array_push($arrrtx,$toarr[$s]);
         }

         if($toarr[$s][7] =='r') {
  
          array_push($arrrbac,$toarr[$s]);
           }
  
    

     $tostr = implode('',$arrrimg);
     $adtoarr= str_replace( $tostr ,'{"'.$tostr.'',$tostr);
$addtoarr2=  str_replace(array('[}',',type"')  ,array('[]}',',{"type"'),$adtoarr);
  $adtoarr3= str_replace( $addtoarr2 ,'['.$addtoarr2.']',$addtoarr2);
  $adtoarr3img= str_replace( ',]' ,']',$adtoarr3);


  $tostrpath = implode('',$arrrpath);
  $adtoarrpath= str_replace( $tostrpath ,'{"'.$tostrpath.'',$tostrpath);
$addtoarr2path=  str_replace(array('[}',',type"')  ,array('[]}',',{"type"'),$adtoarrpath);
$adtoarr3path= str_replace( $addtoarr2path ,'['.$addtoarr2path.']',$addtoarr2path);
$adtoarr3path1= str_replace( ',]' ,']',$adtoarr3path);

$tostrtx = implode('',$arrrtx);
$adtoarrtx= str_replace( $tostrtx ,'{"'.$tostrtx.'',$tostrtx);
$addtoarr2tx=  str_replace(array('}]}',',type"')  ,array('}',',{"type"'),$adtoarrtx);
$adtoarr3tx= str_replace( $addtoarr2tx ,'['.$addtoarr2tx.']',$addtoarr2tx);
$adtoarr3txt= str_replace( ',]' ,']',$adtoarr3tx);

$tostrbac = implode('',$arrrbac);
$adtoarrbac= str_replace( $tostrbac ,'{"'.$tostrbac.'',$tostrbac);
$addtoarr2bac=  str_replace(array('}]}',',type"')  ,array('}',',{"type"'),$adtoarrbac);
$adtoarr3bac= str_replace( $addtoarr2bac ,'['.$addtoarr2bac.']',$addtoarr2bac);
$adtoarr3bbac= str_replace( ',]' ,']',$adtoarr3bac);

}







fwrite($myfile, $adtoarr3img);
fwrite($myfileipath, $relast);
fwrite($myfileitx, $adtoarr3txt);
fwrite($myfileibac, $adtoarr3bbac);


  $addkus= str_replace( $strtoar ,'['.$strtoar.']' ,$strtoar);

 



  




  // json in 

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
    <base href="<?php echo home_url(); ?>/wp-content/plugins/packagengo-designer/editor/">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Dancing+Script&family=Roboto&family=Open+Sans:wght@300&family=Open+Sans:wght@600&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Packagengo-Editor</title>
<link rel='stylesheet' id='xoo-el-style-css'  href='<?php echo home_url(); ?>/wp-content/plugins/easy-login-woocommerce/assets/css/xoo-el-style.css?ver=2.1' type='text/css' media='all' />
    
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css" rel="stylesheet" type="text/css"/>
<!--fonts links -->

  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@1,300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@100&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Long+Cang&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Stick&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Oi&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Ballet&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">



    <!--
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    -->
    
    <script src="<?php echo plugin_dir_url(__FILE__)?>js/fileSaver.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/javascript-canvas-to-blob/3.28.0/js/canvas-to-blob.js"></script>  
    
    
     <script src="jquery.colorpicker.js"></script>
    <link href="jquery.colorpicker.css" rel="stylesheet" type="text/css"/>
    <script src="i18n/jquery.ui.colorpicker-nl.js"></script>

   
   
    <link rel='stylesheet' id='xoo-el-fonts-css'  href='<?php echo home_url(); ?>/wp-content/plugins/easy-login-woocommerce/assets/css/xoo-el-fonts.css?ver=2.1' type='text/css' media='all' />
<link rel='stylesheet' id='xoo-aff-style-css'  href='<?php echo home_url(); ?>/wp-content/plugins/easy-login-woocommerce/xoo-form-fields-fw/assets/css/xoo-aff-style.css?ver=1.1' type='text/css' media='all' />
<style id='xoo-aff-style-inline-css' type='text/css'>

.xoo-aff-input-group .xoo-aff-input-icon{
  background-color:  #eee;
  color:  #555;
  max-width: 40px;
  min-width: 40px;
  border: 1px solid  #ccc;
  border-right: 0;
  font-size: 14px;
}
.xoo-aff-group{
  margin-bottom: 30px;
}

.xoo-aff-group input[type="text"], .xoo-aff-group input[type="password"], .xoo-aff-group input[type="email"], .xoo-aff-group input[type="number"], .xoo-aff-group select, .xoo-aff-group select + .select2{
  background-color: #fff;
  color: #777;
}

.xoo-aff-group input[type="text"]::placeholder, .xoo-aff-group input[type="password"]::placeholder, .xoo-aff-group input[type="email"]::placeholder, .xoo-aff-group input[type="number"]::placeholder, .xoo-aff-group select::placeholder{
  color: #777;
  opacity: 0.7;
}

.xoo-aff-group input[type="text"]:focus, .xoo-aff-group input[type="password"]:focus, .xoo-aff-group input[type="email"]:focus, .xoo-aff-group input[type="number"]:focus, .xoo-aff-group select:focus, .xoo-aff-group select + .select2:focus{
  background-color: #ededed;
  color: #000;
}



  .xoo-aff-group input[type="text"], .xoo-aff-group input[type="password"], .xoo-aff-group input[type="email"], .xoo-aff-group input[type="number"], .xoo-aff-group select{
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
  }


  .xoo-el-form-container button.btn.button.xoo-el-action-btn{
    background-color: #000000;
    color: #ffffff;
    font-weight: 600;
    font-size: 15px;
    height: 40px;
  }

.xoo-el-inmodal{
  max-width: 800px;
  max-height: 600px;
}
.xoo-el-sidebar{
  background-image: url(<?php echo home_url(); ?>/wp-content/plugins/easy-login-woocommerce/assets/images/popup-sidebar.jpg);
  min-width: 40%;
}
.xoo-el-main, .xoo-el-main a , .xoo-el-main label{
  color: #000000;
}
.xoo-el-srcont{
  background-color: #ffffff;
}
.xoo-el-form-container ul.xoo-el-tabs li.xoo-el-active {
  background-color: #000000;
  color: #ffffff;
}
.xoo-el-form-container ul.xoo-el-tabs li{
  background-color: #eeeeee;
  color: #000000;
}
.xoo-el-main{
  padding: 40px 30px;
}

.xoo-el-form-container button.xoo-el-action-btn:not(.button){
    font-weight: 600;
    font-size: 15px;
}



  .xoo-el-modal:before {
      content: '';
      display: inline-block;
      height: 100%;
      vertical-align: middle;
      margin-right: -0.25em;
  }





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
    z-index: 2000;
    transition: 220ms all ease-in-out;
    opacity: 1;
    top: 35px;
  }
  
  #editorCanvasOutsideScale{
    position: absolute;
    transform-origin: 0% 0%;
    transform: scale(.6, .6);
    top:150px;
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
    transition: background .3s ease;
    background: -webkit-radial-gradient(center ellipse, rgba(255, 255, 255, .5) 0%, rgba(255, 255, 255, 0) 100%);
    background: radial-gradient(ellipse at center, rgba(255, 255, 255, .5) 0%, rgba(255, 255, 255, 0) 100%);
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
    background-color: #F9B9CE;
  }
  #editorSwitch{
    text-align: center;
    position: absolute;
    width: 50%;
    z-index: 500;
    background-color: #F9B9CE;
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
    top: 8px;
    font-weight: bold;
    color: white;
    font-size: 20px;
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
    background-color: #EF4B81;
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
    margin: 8px;        
    border-radius: 4px;
    display: flex;
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
    color: white;
}
.arrowBtnR{
    cursor: pointer;
    font-size: 700%;
  position: absolute;
    top:-10px;
    right:0px;
    z-index: 5000;
    color: #EF4B81;
}
.arrowBtnL {
    cursor: pointer;
    font-size: 700%;
  position: absolute;
    top:-10px;
  left: 0px;
    z-index: 5000;
    color: #EF4B81;
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

#restt{

  display:none;

}

#resttreg{

display:none;

}
span{
  color: rgb(15, 14, 14);
  font-family:monospace;

}

.pink-input input[type=text], .gray-input input[type=password], .gray-input input[type=email] {
    border-radius: 2px;
    box-shadow: none;
    border: none;
    background-color: #fad2df;
    /* padding: 20px; */
    font-size: 14px;
    /* color: #989c9e; */
    font-family: 'Open Sans Light', sans-serif;
    height: 40px;
    
}

.pink-input input[type=text]:focus{
    outline: none;
}

.pink-input.sm-height input[type=text]{
    height: 20px!important;
}

#capcolr{
    border-radius: 100%;
    height: 60px;
    width: 60px;
    border: none;
    outline: none;
    -webkit-appearance: none;
}

#capcolr::-webkit-color-swatch-wrapper {
    padding: 0; 
}
#capcolr::-webkit-color-swatch {
    border: none;
    border-radius: 100%;
}

#boxbg{
    border-radius: 100%;
    height: 60px;
    width: 60px;
    border: none;
    outline: none;
    -webkit-appearance: none;
    cursor: pointer;
}

#boxbg::-webkit-color-swatch-wrapper {
    padding: 0; 
}
#boxbg::-webkit-color-swatch {
    border: none;
    border-radius: 100%;
}

.d3-back-sel-con{
    position: absolute;
    width: 50px;
    height: 232px;
    border-radius: 10px;
    background-color: #F9B9CE;
    left: 10.1%;
    top: 58.9%;
    z-index: 20000;
    display: none;
    box-shadow: 1px 1px 10px grey;
}

.d3-back-sel-item {
    position:relative;
    width:30px;
    height:30px;
    border:solid #EF4B81 3px;
    left:7px;
    margin-top:10px;
    border-radius: 50%;
    cursor: pointer;
}
.d3-back-sel-item.green{
    background: rgb(255,255,255);
    background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 0%, rgba(84,208,34,1) 60%);
}
.d3-back-sel-item.blue{
    background: rgb(255,255,255);
    background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 0%, rgba(34,55,208,1) 60%);
}
.d3-back-sel-item.pink{
    background: rgb(255,255,255);
    background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 0%, rgba(197,34,208,1) 60%);
}
.d3-back-sel-item.yellow{
    background: rgb(255,255,255);
    background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 0%, rgba(255,192,73,1) 60%);
}
.d3-back-sel-item.black{
    background: #000000;
}

.btn-container-bottom{
    position: absolute;
    bottom: 11%;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    z-index: 1111;
}

.btn-items-con{
    display: flex;
    padding-left: 9px;
}

.btn-items-con a{
    text-decoration: none;
}

.bottom-btn-item{
    width: 200px;
    padding: 0px 5px;
    margin-right: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    border-radius: 50px 50px 50px 50px;
    transition: all ease 0.5s;
    cursor:pointer;
}

.bottom-btn-item.bg-heavy-pink{
    background: #fa8cb1;
}

.bottom-btn-item.bg-heavy-pink:hover{
    background: #EF4B81;
    box-shadow: 1px 1px 10px gray;
}

.bottom-btn-item-con{
    display: flex;
    align-items: center;
    justify-content: center;
}

.myUploadCustom input[type=file] {
    position: fixed;
    top: -1000px;
}

.d-flex{
    display: flex;
}

.align-items-center{
    align-items: center;
}

.justify-content-center{
    justify-content: center;
}

.mr-3{
    margin-right: 1rem;
}

.text-white{
    color:white;
}

.upload-bg-btn{
    background: #EF4B81;
    box-shadow: 1px 1px 10px gray;
    border-radius: 5px 5px 5px 5px ;
    transition: background 0.3s ease;
}

.upload-bg-btn:hover{
  /* background: #f32a6c; */
}

.color-picker-cus{
  border-radius: 50%;
  width: 40px;
  height: 40px;
  border: #EF4B81 solid 5px;
  background-color: #EF4B81;
  cursor: pointer;
}

.mb-10px{
  margin-bottom: 10px;
}

.pattern-item-container {
  position: absolute;
  display: none;
  width: 200px;
  height: 372px;
  background-color: #F5B7CC;
  right: 207px;
  margin-bottom: 5px;
  top: 43%;
  box-shadow: 1px 1px 10px gray;
}

.pattern-img-item{
  border-radius: 50%;
  border: 3px solid #EF4B81;
  width : 52px;
  height : 52px;
  box-shadow: none;
  transition: all ease 1s;
}

.pattern-img-con{
  height: 100%;
  overflow: auto;
  background-color: #F5B7CC;
}

.pattern-img-item:hover{
  box-shadow: 1px 1px 10px gray;
}

.text-center{
  text-align: center;  
  color:white;
  font-weight: bold;
}

.p-0{
  padding: 0;
}

.m-0{
  margin: 0;
}

.default-bg-item{
  width: 32px;
  height: 32px;
  border-radius: 50%;
  border: 3px solid #ef5180;
  margin:3px;
  cursor: pointer;
}

.default-bg-item.selected{
  box-shadow: 1px 1px 10px gray;
  border: 3px solid #e61957;
  width: 37px;
  height: 37px;
}

.default-bg-con{
  position: absolute;
  right: 35px;
  top: 203px;
  display: flex;
  align-items:center;
}

.textSetting{
  display: block;
  position:absolute;
  top: 28%;
  right: 218px;
  width: 215px;
  background : #F9B9CE;
  box-shadow: 1px 1px 10px gray ;
  padding: 20px;
}

.font-select-btn{
  padding: 10px 20px;
  background: #EF4B81;
  transition: all 0.5s ease;
  cursor: pointer;
  border-radius: 20px 20px 20px 20px;
  margin-top: 20px;
  font-weight: bold;
  color: white;
}

.font-select-btn:hover{
  background: #eb2567;
}

.font-select-btn-con{
  width : 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 99999999999999; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 3% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 70%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
.logotext {
  position: absolute; 
  z-index: 111111111111111111111111111111;  
  top: 2%;
  left: 30%;
  transform: translate(50%,-50%);
    text-transform: uppercase;
    font-family: verdana;
    font-size: 2em;
    font-weight: 300;
    color: #f5f5f5;
    text-shadow: 1px 1px 1px #919191,
        1px 2px 1px #919191,
        1px 3px 1px #919191,
        1px 4px 1px #919191,
        1px 5px 1px #919191,
        1px 6px 1px #919191,
        1px 7px 1px #919191,
        1px 8px 1px #919191,
        1px 9px 1px #919191,
        1px 10px 1px #919191,
    1px 18px 6px rgba(16,16,16,0.4),
    1px 22px 10px rgba(16,16,16,0.2),
    1px 25px 35px rgba(16,16,16,0.2),
    1px 30px 60px rgba(16,16,16,0.4);
}
 
#getLinkBtn .popuptext {
  visibility: hidden;
  width: auto;
  background-color: #fefefe;
  color: #111;
  text-align: center;
  border-radius: 6px;
  padding: 10px;
  position: absolute;
  z-index: 1;
  bottom: 125%;
}

/* Popup arrow */
#getLinkBtn .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #fefefe transparent transparent transparent;
}

/* Toggle this class when clicking on the popup container (hide and show the popup) */
#getLinkBtn .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;}
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}

#blob1 , #italic1{
  display: none;
}

	</style>

   
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


 $('#capcolr').on ('change input', function ee(){
    
  //var col =this.value;
    //var rpcol = col.replace('#','0x');
    //var matr = new THREE.MeshBasicMaterial({color:col});
    var rgb = $('.cp-name-output').val();
  
    $('#editorCanvasOutsideDiv').css('background',rgb);
    //o.material.color.setHex(  rpcol );
    
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

  $(".default-bg-item").click(function(){
    let selectedItem = this;
    let defualtBgItemArr = document.getElementsByClassName("default-bg-item");
    for(let i = 0; i < defualtBgItemArr.length ; i++){
      defualtBgItemArr[i].classList.remove('selected');
    }
    selectedItem.classList.add('selected');
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




$('#blob').click(function(){
$('#blob1').css('display','block');
$('#blob').css('display','none');

});

$('#blob1').click(function(){
$('#blob1').css('display','none');
$('#blob').css('display','block');

});








$('#italic').click(function(){
$('#italic1').css('display','block');
$('#italic').css('display','none');

});

$('#italic1').click(function(){
$('#italic1').css('display','none');
$('#italic').css('display','block');

});





});

// caught pic ---------------------------
</script>
  
<body>



  <input type="text" id="zin" value="0.7"  style="position: absolute;z-index:3333333;top:130px;visibility:hidden"  />

  
<script src="<?php echo plugin_dir_url(__FILE__)?>js/fileSaver.js"></script>
<input type="text" id="repeat" value="1" style="display:none;">
<input type="text" id="patterns" value="1" style="display:none;">
<!--show end information   -->
<?php
  $uniq = '';
  if(isset($_GET['id'])){
    $uniq = $_GET['id'];
  }
?>
<div id="outJson" style="display: none;"><?php

$pid = 0;

global $wpdb;

if(isset($_GET['pid'])){
  $pid = $_GET['pid'];
}
else if(!empty($uniq)){
  $tt = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM `wp_databox` WHERE `uniq_key` = '".$uniq."'" ) );
  echo stripcslashes($tt->outjsn);
  $pid = $tt->pid;
}


?></div>
<div id="endform" style="position:absolute;display:none; top:100px;left:60%;width:200px;height:500px;background-color:blue;z-index:30000">
<form action="" method="post" id="subendForm">
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




    
<input id="outin" type="tex" value="0" style="width:0px; height:0px;visibility: hidden;display:none;"/>

<input id="facetop" type="tex" value="0" style="width:0px; height:0px;visibility: hidden;display:none;"/>
<input id="faceleft" type="tex" value="0" style="width:0px;height:0px;visibility: hidden;display:none;"/>

    <div id="shoebox" style="position:absolute;display: none; width: 300px;height: 150px;background-color: #eef1f1fd;z-index: 210000;top:400px;left:550px;box-shadow: #5e5c63;border-radius: 10px;">
     <span style="position:absolute;width:80%;height:20%;top:30px;left:40px;">Are you shure need Reset?</span>
     
      <button id="yyess" style="position: relative;padding: 15px;left:20px;top:100px;width: 100px;">yes</button>
      <button id="nno" style="position: relative;padding:15px;right:-80px;top:100px;width: 100px;">No</button>
    </div>


    
    <div id="mydiv" style="position: absolute;box-shadow: #668;left:38.5%;top:64px; width:200px;height: 400px;background-color: #F9B9CE;z-index: 11000; box-shadow: 1px 1px 10px grey;" class="ui-draggable ui-draggable-handle">
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
              <span class="arrowBtnL" id="arrowBtnL"><i id="" class="fas fa-arrow-circle-left" aria-hidden="true"></i></span>
              <span id="productName" style="font-size:20px; font-weight:bold;bottom: -18px;">Mailer Box</span>
              <span class="arrowBtnR" id="arrowBtnR"><i id="" class="fas fa-arrow-circle-right" aria-hidden="true"></i></span>
          </div>
        </div>
        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ff5500" fill-opacity="1" d="M0,288L48,277.3C96,267,192,245,288,250.7C384,256,480,288,576,266.7C672,245,768,171,864,138.7C960,107,1056,117,1152,138.7C1248,160,1344,192,1392,208L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path></svg> -->
      </div>

      <div id="rng" class="hdsh" style="background-color: #F9B9CE;width:100%;height:15%;z-index: 11000;border-top: 1px solid white;cursor:pointer;">
        <span style="position: relative;left:10px;top:20px;color:#EF4B81;font-size:14px; "><strong>Width * Length * Height</strong></span>
      <div id="hidd" class="hdsh" style="position: absolute;width: 100%;height:60px;background-color: #ef4b8202;top:23%;left:0px;"></div>

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,0L60,21.3C120,43,240,85,360,117.3C480,149,600,171,720,165.3C840,160,960,128,1080,138.7C1200,149,1320,203,1380,229.3L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
      </path></svg>
      
      <div id="sid5" class="hdsh animate__animated animate__fadeInLeft" style="position: absolute;margin-left: 205px;display: none; background-color: #F9B9CE; z-index: 12000; box-shadow:1px 1px 10px gray; top:90px;">
        <div class="left50">
          <div class="groupcontainer">
            <div class="slidecontainer pink-input sm-height" style="margin-right: 8px;">
              <span>WIDTH(mm) </span>
              <input type="text" min="60" max="600" value="200" class="slider" id="boxWidth" onchange="calcPrice();">
            </div>
            <div class="slidecontainer pink-input sm-height" style="margin-right: 8px;">
              <span>LENGTH(mm) </span>
              <input type="text" min="60" max="600" value="150" class="slider" id="boxLength" onchange="calcPrice();">
            </div>
            <div class="slidecontainer pink-input sm-height">
              <span>HEIGHT(mm) </span>
              <input type="text" min="60" max="400" value="50" class="slider" id="boxHeight" onchange="calcPrice();">
            </div>
          </div>
        </div>
      </div>
        
        </div>
      <div class="hdsh" style="background-color: #F9B9CE;width:100%;height:28%;border-bottom:1px solid white;">
      <span style="position: relative;left:5px;top:20px;color: #EF4B81;font-size: 18px;"> <strong>Box Kinds:</strong> </span>
      
      <div class="default-bg-con">
        <img class="patreenimg default-bg-item selected" src="<?php echo plugin_dir_url(__FILE__)?>pattern/brown.jpg">
        <img class="patreenimg default-bg-item" src="<?php echo plugin_dir_url(__FILE__)?>pattern/white.jpg">
        <img class="patreenimg default-bg-item" src="<?php echo plugin_dir_url(__FILE__)?>pattern/white.jpg">
      </div>
    </div>
      <div class="hdsh" style="background-color: #F9B9CE;width:100%;height:15%;">
        <div class="pink-input" style="padding-top:10px;">
          <span style="padding-left:10px; color:#EF4B81; font-size:18px; display:flex;align-items: center; "> <strong>Quilty: </strong> 
          <input type="text" id="quilt" value="1000" style="width: 87%;border-radius:30px;margin-right:10px; padding-left:10px; margin-left:6px;" class=""  onchange="calcPrice();"> 
          </span> 
        </div> 
        <!-- <div style="position: relative; z-index: 20000;">
          <input style="position: relative; z-index: 20000;width:70%;float:left" type="range" min="1" max="100" value="50" class="slider" id="myRange">
        </div>   -->
      </div>
      <div class="hdsh pink-input" style="position: relative; background-color: #F9B9CE;width:100%;height:16%;border-top:1px solid white">
        <span style="position: relative; left:10px;top:11px;float: left;color :#EF4B81;font-size:18px;display:flex;align-items: center; "> <strong>Price($):</strong> 
        <input type="text" id="txtprice" style="width: 44%;border-radius:30px;margin-right:10px; padding-left:10px; margin-left:6px;" readonly> 
        </span>
        <!-- <input type="text" id="txtprice" style="position:relative;color: #F9B9CE; top:10px;width:70px;left:5px;height:60%;float: right;" /> -->
      </div>
    </div>

    


<!--     part 2 -----------------------------------------                            -->
    <div id="mydivv" style="position: absolute;right:20px;top: 64px; width:200px;height: 400px;background-color:#F7B8CC;z-index: 11000; box-shadow: 1px 1px 10px grey;" class="ui-draggable ui-draggable-handle">
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
        <i class="fas fa-upload mr-3" aria-hidden="true"></i>
        <strong style="padding: 15px;">Add Art</strong>
      </div>
      <form class="form myUploadCustom" id="myform">
        <input id="inpFile" type="file" class="myfile" style="position: relative;height:61px;cursor: pointer;top:-58px;opacity: 0; width:100%">
        <!-- <button type="submit" id="givimg" style="visibility:hidden;">upload</button> -->
      </form>
    </div>

    <div class="hdshh" style="position:relative; background-color: #F9B9CE;cursor: pointer; width:100%;height:15%;">
      <div id="selectFontBtn" class="d-flex align-items-center justify-content-center text-white upload-bg-btn">
        <i class="fas fa-pencil-alt mr-3" aria-hidden="true"></i>
        <strong style="padding: 15px;">Add Text</strong>

      </div>
    
    
    <div id="toggleSelectFont" class="textSetting hdshh animate__animated animate__fadeInRight" style="display:none;">
      <label for="fontcolor" style="font-size:15px; font-weight:bold; color: black;">Choose Font Color</label>
      <input type="color" id="fontcolor">
      <div id="fontselect" class="custom-select" style="padding-top:20px;">
        <label for="font-family" style="font-size:15px; font-weight:bold; color: black;">Choose Font Family</label>
        <select id="font-family">         
        <option value="Times New Roman">Times New Roman</option><option value="Bangers">Bangers</option><option value="Dancing Script">Dancing Script</option><option value="Roboto">Roboto</option><option value="Open Sans">Open Sans</option></select>
      </div>
      <div id="adtxts" class="font-select-btn-con">
        <div class="font-select-btn">Add Text</div>

 <button id="blob" style="position: relative;z-index:3333333" >BLOB</button>
 <button id="blob1" style="position: relative;z-index:3333333;background-color:#252522" >BLOB</button>
 <button id="italic" style="position: relative;z-index:3333333" >italic</button>
 <button id="italic1" style="position: relative;z-index:3333333;background-color:#5e5c63" >italic</button>


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
        <i class="fas fa-palette mr-3" aria-hidden="true"></i>
        <p><strong>Add Pattern</strong></p>
      </div>
      <!-- <span style="position: relative;left:2px;top:20px;" >Shapes</span> -->
      <!-- <div id="dvhd" style="position: absolute;width:90%;height:60px;background-color: #5a3e3e00;"></div> -->
      <!-- <input type="color" id='boxbg' style="position:absolute;width: 40px;height: 40px; border-radius: 50%;left:-3px;top:180px;" /> -->
      <input type="color" id="boxbgin" style="position:absolute;width: 52px;height: 52px; border-radius: 50%;left:-3px;top:180px;display:none">
      <div id="sidshape" class="pattern-item-container animate__animated animate__fadeInRight">
        <div class="text-center"><p class="p-0">Select Pattern</p></div>
        <div class="pattern-img-con">
          <div class="sel-color-con">
            <div class="text-center">
              <p>Select color</p>
            </div>
            <div>
              <input type="text" id="boxbg" style="position:relative;float:left; width: 61px;height: 61px;background-color:black;color:black; border-radius: 50%; left: 25px; cursor: pointer; border: #EF4B81 solid 3px; ">

      <script>
          $(function() {
            $('#boxbg').colorpicker({
              parts: 'full',
              colorFormat: ['EXACT', '#HEX3', 'RGB', 'RGBA'],
            
            });
          });
        </script>

              
              <img class="pattern-img-item patreenimg" src="<?php echo plugin_dir_url(__FILE__)?>pattern/pattern12.jpg">
            </div>
          </div>
          <div class="sel-pattern">
            <div class="text-center">
              <p>Textures</p>
            </div>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/texture/texture_1.svg"/>  
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/texture/texture_2.svg"/>  
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/texture/texture_3.svg"/> 
            <div class="text-center">
              <p>Abstract</p>
            </div>
            <div>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/abstract/abstract_1.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/abstract/abstract_2.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/abstract/abstract_3.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/abstract/abstract_4.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/abstract/abstract_5.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/abstract/abstract_6.svg"/>
            <div class="text-center">
              <p>Artboard</p>
            </div>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/artboard/Artboard_1.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/artboard/Artboard_2.svg"/>
            <div class="text-center">
              <p>Christmas</p>
            </div>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/christmas/Christmas1.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/christmas/Christmas2.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/christmas/Christmas3.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/christmas/Christmas4.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/christmas/Christmas5.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/christmas/Christmas6.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/christmas/Christmas7.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/christmas/Christmas8.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/christmas/Christmas9.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/christmas/Christmas10.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/christmas/Christmas11.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/dots/dots_10.svg"/>
            <div class="text-center">
              <p>Dots & Circles</p>
            </div>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/dots/dots_1.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/dots/dots_2.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/dots/dots_3.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/dots/dots_4.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/dots/dots_5.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/dots/dots_6.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/dots/dots_7.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/dots/dots_8.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/dots/dots_9.svg"/>
              
            <div class="text-center">
              <p>Flower</p>
            </div>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/flower/flowers_1.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/flower/flowers_2.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/flower/flowers_3.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/flower/flowers_4.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/flower/flowers_5.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/flower/flowers_6.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/flower/flowers_7.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/flower/flowers_8.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/flower/flowers_9.svg"/>             
            <div class="text-center">
              <p>Stripes & Line</p>
            </div>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/stripes/stripes_1.svg"/>              
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/stripes/stripes_2.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/stripes/stripes_3.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/stripes/stripes_4.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/stripes/stripes_5.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/stripes/stripes_6.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/stripes/stripes_7.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/stripes/stripes_8.svg"/>              
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/stripes/stripes_10.svg"/>
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/stripes/stripes_11.svg"/>            
            <div class="text-center">
              <p>Thanksgiving</p>
            </div>             
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/thanksgiving/Thanksgiving2.svg"/>                 
              <img class="pattern-img-item patreenimg"  src="<?php echo plugin_dir_url(__FILE__)?>pattern/thanksgiving/Thanksgiving4.svg"/>               
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="hdshh" style="background-color: #fafafa;cursor: pointer; width:90%;height:15%;margin: 1%;border-radius: 5px;width: 93%;height:30%;border: #f7f7f8 solid 2px; ">   
      <div style="position: absolute;width: 90%;height:30%;background-color: #ffffff;"></div>
        <img id="addimg" class="imgtexture" name="imgtexture" style="position: relative;cursor: pointer; width:100%;z-index: 8000;height:100%;">
        <button id="removimg" class="UIBtnd" onclick="remove()" alt="Start Over"><i class="fas fa-trash" aria-hidden="true"></i></button>
      </div>
    </div>



<!--    this save with rest-->
<div style="position: absolute;border-radius: 50%; width:40px;height:40px; z-index: 11000;left:5%;top:80%;">
  <i style="position: relative;color: #ccd; color: #EF4B81;" class="fas fa-fill-drip fa-2x"></i><input type="text" id="capcolr" style="position: absolute;border-radius: 50%; width:50px;height:50px; border: rgb(239, 75, 129) solid 5px;z-index: 11000;left:30%;top:80%;background-color: rgb(17, 17, 17);" />
  <span class="cp-name-output"></span>
</div>

<script>
          $(function() {
            $('#capcolr').colorpicker({
              parts: 'full',
              colorFormat: ['EXACT', '#HEX3', 'RGB', 'RGBA'],
              init: function(event, color) {
                    $('.cp-name-output').text(color.formatted);
                  },
              select: function(event, color) {
                    $('.cp-name-output').text(color.formatted);
                  }
            });
          });
        </script>

<div id="show3dcolr" style="position: absolute;border-radius: 50%; width:40px;height:40px; z-index: 11000;left:10%;top:80%;">
  <!-- <i class="fa fa-cube" aria-hidden="true"></i> -->
  <i style="position: relative;color: #ccd; color: #EF4B81;" class="fa fa-cube fa-2x"></i>
  <div  id="3dcolr" style="position: absolute;border-radius: 50%; width:40px;height:40px; border: rgb(239, 75, 129) solid 5px;z-index: 11000;left:5%;top:80%;background-color: rgb(17, 17, 17);cursor:pointer;">
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
    <i class="fas fa-search-plus" id="zi" style="position: absolute;z-index:3333333;bottom:-78px; left:45%; background-color:white; font-size: 30px; padding:10px; border-radius:50%; box-shadow: 1px 1px 10px grey;"></i>
    <i class="fas fa-search-minus" id="zo" style="position: absolute;z-index:3333333;bottom:-78px; left:41%; background-color:white; font-size: 30px; padding:10px; border-radius:50%; box-shadow: 1px 1px 10px grey;"></i>
    <div id="resttt" class="bottom-btn-item bg-heavy-pink">
      <div class="bottom-btn-item-con">
        <i class="fas fa-undo" style="margin-right:5px;" aria-hidden="true"></i>
        <p>Reset</p>
      </div>
    </div>
    <div id="getLinkBtn" class="bottom-btn-item bg-heavy-pink" onclick="getLinkFunction()">
      <div class="bottom-btn-item-con">
        <i class="fas fa-link" style="margin-right:5px;" aria-hidden="true"></i>
        <p>Get Link</p>
      </div>
      <span class="popuptext" id="myPopup">
        <a href="javascript:void(0);" id="genLink">Generating Link...</a> 
        <a href="javascript:void(0);" id="fbLink"><i class="fab fa-facebook"></i></a>  
        <a href="javascript:void(0);" id="twiLink"><i class="fab fa-twitter"></i></a>  
        <a href="javascript:void(0);" id="mailLink"><i class="fas fa-envelope"></i></a>
      </span>
    </div>
    <a href="javascript:void(0);" class="lrm-login">
      <div id="resttreg" class="bottom-btn-item bg-heavy-pink ">
        <div class="bottom-btn-item-con">
          <i class="fas fa-save" style="margin-right:5px;" aria-hidden="true"></i>
          <p>Login/Signup</p>
        </div>
      </div>
    </a>
  <style>
  <?php
  $wpuser = wp_get_current_user();
  if(isset($wpuser->user_login)==false){
  ?>
    #restt {
      display: none;
    }
    #resttreg {
      display: block;
    }
  <?php
  }
  else {
  ?>
    #restt {
      display: block;
    }
    #resttreg {
      display: none;
    }
  <?php
  }
  ?>
  </style>
    <div id="restt" class="bottom-btn-item bg-heavy-pink">
      <div class="bottom-btn-item-con">
        <i class="fas fa-save" style="margin-right:5px;" aria-hidden="true"></i>
        <p>Save</p>
      </div>
    </div>
    <a href="javascript:void(0);" onclick="checkoutProduct();">
    <div id="chek" class="bottom-btn-item bg-heavy-pink">
      <div class="bottom-btn-item-con">
        <i class="fas fa-shopping-cart" style="margin-right:5px;" aria-hidden="true"></i>
        <p>Checkout</p>
      </div>
    </div>
    </a>
  </div>
</div>
      

<div id="showreg" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <?php echo do_shortcode('[xoo_el_inline_form active="login"]'); ?>
  </div>
</div>

		<div id="windowContainer">
		  <div class="row">
      <span class="logotext">PackageN'Go Design</span>      
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

  <?php

     $post = get_post( $pid, OBJECT );
     setup_postdata( $post );

     global $product;
     $product = wc_get_product($pid);
     ?>
     <form class="cart" action="<?php echo home_url(); ?>/cart/" method="post" enctype='multipart/form-data' id="productForm">
        <?php
        /**
         * @since 2.1.0.
         */
        do_action( 'woocommerce_before_add_to_cart_button' );
        
        /**
         * @since 3.0.0.
         */
        do_action( 'woocommerce_before_add_to_cart_quantity' );

            woocommerce_quantity_input( array(
                'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
            ) );
        
        /**
         * @since 3.0.0.
         */
        do_action( 'woocommerce_after_add_to_cart_quantity' );
        ?>
        
        <?php /*** Our code modification inside Woo template - begin ***/ ?>
        <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt <?php echo esc_attr($button_classes); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
        <?php /*** Our code modification inside Woo template - end ***/ ?>
        
        <?php
        /**
         * @since 2.1.0.
         */
        do_action( 'woocommerce_after_add_to_cart_button' );
        ?>
      </form>

    <?php

      wp_reset_postdata();

  ?>

  <script src="<?php echo plugin_dir_url(__FILE__)?>assets.dev/js/fontfaceobserver.js" ></script>
  <script src="<?php echo plugin_dir_url(__FILE__)?>assets.dev/js/fabric.min.js"></script>
  <script src="<?php echo plugin_dir_url(__FILE__)?>assets.dev/js/tween.min.js"></script>

  <script src="<?php echo plugin_dir_url(__FILE__)?>assets.dev/js/initialization.js" type="text/javascript"></script>
  <script src="<?php echo plugin_dir_url(__FILE__)?>assets.dev/js/threecode.js" type="module"></script>
  <script src="<?php echo plugin_dir_url(__FILE__)?>assets.dev/js/fabriccode.js" type="text/javascript"></script>       
<?php $adminajsl_url = addcslashes(home_url().'/wp-admin/admin-ajax.php','/'); ?>
<script type='text/javascript' id='xoo-aff-js-js-extra'>
/* <![CDATA[ */
var xoo_aff_localize = {"adminurl":"<?php echo $adminajsl_url; ?>","countries":"{\"AF\":\"Afghanistan\",\"AX\":\"\u00c5land Islands\",\"AL\":\"Albania\",\"DZ\":\"Algeria\",\"AS\":\"American Samoa\",\"AD\":\"Andorra\",\"AO\":\"Angola\",\"AI\":\"Anguilla\",\"AQ\":\"Antarctica\",\"AG\":\"Antigua and Barbuda\",\"AR\":\"Argentina\",\"AM\":\"Armenia\",\"AW\":\"Aruba\",\"AU\":\"Australia\",\"AT\":\"Austria\",\"AZ\":\"Azerbaijan\",\"BS\":\"Bahamas\",\"BH\":\"Bahrain\",\"BD\":\"Bangladesh\",\"BB\":\"Barbados\",\"BY\":\"Belarus\",\"BE\":\"Belgium\",\"PW\":\"Belau\",\"BZ\":\"Belize\",\"BJ\":\"Benin\",\"BM\":\"Bermuda\",\"BT\":\"Bhutan\",\"BO\":\"Bolivia\",\"BQ\":\"Bonaire, Saint Eustatius and Saba\",\"BA\":\"Bosnia and Herzegovina\",\"BW\":\"Botswana\",\"BV\":\"Bouvet Island\",\"BR\":\"Brazil\",\"IO\":\"British Indian Ocean Territory\",\"BN\":\"Brunei\",\"BG\":\"Bulgaria\",\"BF\":\"Burkina Faso\",\"BI\":\"Burundi\",\"KH\":\"Cambodia\",\"CM\":\"Cameroon\",\"CA\":\"Canada\",\"CV\":\"Cape Verde\",\"KY\":\"Cayman Islands\",\"CF\":\"Central African Republic\",\"TD\":\"Chad\",\"CL\":\"Chile\",\"CN\":\"China\",\"CX\":\"Christmas Island\",\"CC\":\"Cocos (Keeling) Islands\",\"CO\":\"Colombia\",\"KM\":\"Comoros\",\"CG\":\"Congo (Brazzaville)\",\"CD\":\"Congo (Kinshasa)\",\"CK\":\"Cook Islands\",\"CR\":\"Costa Rica\",\"HR\":\"Croatia\",\"CU\":\"Cuba\",\"CW\":\"Cura\u00e7ao\",\"CY\":\"Cyprus\",\"CZ\":\"Czech Republic\",\"DK\":\"Denmark\",\"DJ\":\"Djibouti\",\"DM\":\"Dominica\",\"DO\":\"Dominican Republic\",\"EC\":\"Ecuador\",\"EG\":\"Egypt\",\"SV\":\"El Salvador\",\"GQ\":\"Equatorial Guinea\",\"ER\":\"Eritrea\",\"EE\":\"Estonia\",\"ET\":\"Ethiopia\",\"FK\":\"Falkland Islands\",\"FO\":\"Faroe Islands\",\"FJ\":\"Fiji\",\"FI\":\"Finland\",\"FR\":\"France\",\"GF\":\"French Guiana\",\"PF\":\"French Polynesia\",\"TF\":\"French Southern Territories\",\"GA\":\"Gabon\",\"GM\":\"Gambia\",\"GE\":\"Georgia\",\"DE\":\"Germany\",\"GH\":\"Ghana\",\"GI\":\"Gibraltar\",\"GR\":\"Greece\",\"GL\":\"Greenland\",\"GD\":\"Grenada\",\"GP\":\"Guadeloupe\",\"GU\":\"Guam\",\"GT\":\"Guatemala\",\"GG\":\"Guernsey\",\"GN\":\"Guinea\",\"GW\":\"Guinea-Bissau\",\"GY\":\"Guyana\",\"HT\":\"Haiti\",\"HM\":\"Heard Island and McDonald Islands\",\"HN\":\"Honduras\",\"HK\":\"Hong Kong\",\"HU\":\"Hungary\",\"IS\":\"Iceland\",\"IN\":\"India\",\"ID\":\"Indonesia\",\"IR\":\"Iran\",\"IQ\":\"Iraq\",\"IE\":\"Ireland\",\"IM\":\"Isle of Man\",\"IL\":\"Israel\",\"IT\":\"Italy\",\"CI\":\"Ivory Coast\",\"JM\":\"Jamaica\",\"JP\":\"Japan\",\"JE\":\"Jersey\",\"JO\":\"Jordan\",\"KZ\":\"Kazakhstan\",\"KE\":\"Kenya\",\"KI\":\"Kiribati\",\"KW\":\"Kuwait\",\"KG\":\"Kyrgyzstan\",\"LA\":\"Laos\",\"LV\":\"Latvia\",\"LB\":\"Lebanon\",\"LS\":\"Lesotho\",\"LR\":\"Liberia\",\"LY\":\"Libya\",\"LI\":\"Liechtenstein\",\"LT\":\"Lithuania\",\"LU\":\"Luxembourg\",\"MO\":\"Macao S.A.R., China\",\"MK\":\"North Macedonia\",\"MG\":\"Madagascar\",\"MW\":\"Malawi\",\"MY\":\"Malaysia\",\"MV\":\"Maldives\",\"ML\":\"Mali\",\"MT\":\"Malta\",\"MH\":\"Marshall Islands\",\"MQ\":\"Martinique\",\"MR\":\"Mauritania\",\"MU\":\"Mauritius\",\"YT\":\"Mayotte\",\"MX\":\"Mexico\",\"FM\":\"Micronesia\",\"MD\":\"Moldova\",\"MC\":\"Monaco\",\"MN\":\"Mongolia\",\"ME\":\"Montenegro\",\"MS\":\"Montserrat\",\"MA\":\"Morocco\",\"MZ\":\"Mozambique\",\"MM\":\"Myanmar\",\"NA\":\"Namibia\",\"NR\":\"Nauru\",\"NP\":\"Nepal\",\"NL\":\"Netherlands\",\"NC\":\"New Caledonia\",\"NZ\":\"New Zealand\",\"NI\":\"Nicaragua\",\"NE\":\"Niger\",\"NG\":\"Nigeria\",\"NU\":\"Niue\",\"NF\":\"Norfolk Island\",\"MP\":\"Northern Mariana Islands\",\"KP\":\"North Korea\",\"NO\":\"Norway\",\"OM\":\"Oman\",\"PK\":\"Pakistan\",\"PS\":\"Palestinian Territory\",\"PA\":\"Panama\",\"PG\":\"Papua New Guinea\",\"PY\":\"Paraguay\",\"PE\":\"Peru\",\"PH\":\"Philippines\",\"PN\":\"Pitcairn\",\"PL\":\"Poland\",\"PT\":\"Portugal\",\"PR\":\"Puerto Rico\",\"QA\":\"Qatar\",\"RE\":\"Reunion\",\"RO\":\"Romania\",\"RU\":\"Russia\",\"RW\":\"Rwanda\",\"BL\":\"Saint Barth\u00e9lemy\",\"SH\":\"Saint Helena\",\"KN\":\"Saint Kitts and Nevis\",\"LC\":\"Saint Lucia\",\"MF\":\"Saint Martin (French part)\",\"SX\":\"Saint Martin (Dutch part)\",\"PM\":\"Saint Pierre and Miquelon\",\"VC\":\"Saint Vincent and the Grenadines\",\"SM\":\"San Marino\",\"ST\":\"S\u00e3o Tom\u00e9 and Pr\u00edncipe\",\"SA\":\"Saudi Arabia\",\"SN\":\"Senegal\",\"RS\":\"Serbia\",\"SC\":\"Seychelles\",\"SL\":\"Sierra Leone\",\"SG\":\"Singapore\",\"SK\":\"Slovakia\",\"SI\":\"Slovenia\",\"SB\":\"Solomon Islands\",\"SO\":\"Somalia\",\"ZA\":\"South Africa\",\"GS\":\"South Georgia\\\/Sandwich Islands\",\"KR\":\"South Korea\",\"SS\":\"South Sudan\",\"ES\":\"Spain\",\"LK\":\"Sri Lanka\",\"SD\":\"Sudan\",\"SR\":\"Suriname\",\"SJ\":\"Svalbard and Jan Mayen\",\"SZ\":\"Swaziland\",\"SE\":\"Sweden\",\"CH\":\"Switzerland\",\"SY\":\"Syria\",\"TW\":\"Taiwan\",\"TJ\":\"Tajikistan\",\"TZ\":\"Tanzania\",\"TH\":\"Thailand\",\"TL\":\"Timor-Leste\",\"TG\":\"Togo\",\"TK\":\"Tokelau\",\"TO\":\"Tonga\",\"TT\":\"Trinidad and Tobago\",\"TN\":\"Tunisia\",\"TR\":\"Turkey\",\"TM\":\"Turkmenistan\",\"TC\":\"Turks and Caicos Islands\",\"TV\":\"Tuvalu\",\"UG\":\"Uganda\",\"UA\":\"Ukraine\",\"AE\":\"United Arab Emirates\",\"GB\":\"United Kingdom (UK)\",\"US\":\"United States (US)\",\"UM\":\"United States (US) Minor Outlying Islands\",\"UY\":\"Uruguay\",\"UZ\":\"Uzbekistan\",\"VU\":\"Vanuatu\",\"VA\":\"Vatican\",\"VE\":\"Venezuela\",\"VN\":\"Vietnam\",\"VG\":\"Virgin Islands (British)\",\"VI\":\"Virgin Islands (US)\",\"WF\":\"Wallis and Futuna\",\"EH\":\"Western Sahara\",\"WS\":\"Samoa\",\"YE\":\"Yemen\",\"ZM\":\"Zambia\",\"ZW\":\"Zimbabwe\"}","states":"{\"AF\":[],\"AO\":{\"BGO\":\"Bengo\",\"BLU\":\"Benguela\",\"BIE\":\"Bi\\u00e9\",\"CAB\":\"Cabinda\",\"CNN\":\"Cunene\",\"HUA\":\"Huambo\",\"HUI\":\"Hu\\u00edla\",\"CCU\":\"Kuando Kubango\",\"CNO\":\"Kwanza-Norte\",\"CUS\":\"Kwanza-Sul\",\"LUA\":\"Luanda\",\"LNO\":\"Lunda-Norte\",\"LSU\":\"Lunda-Sul\",\"MAL\":\"Malanje\",\"MOX\":\"Moxico\",\"NAM\":\"Namibe\",\"UIG\":\"U\\u00edge\",\"ZAI\":\"Zaire\"},\"AR\":{\"C\":\"Ciudad Aut\u00f3noma de Buenos Aires\",\"B\":\"Buenos Aires\",\"K\":\"Catamarca\",\"H\":\"Chaco\",\"U\":\"Chubut\",\"X\":\"C\u00f3rdoba\",\"W\":\"Corrientes\",\"E\":\"Entre R\u00edos\",\"P\":\"Formosa\",\"Y\":\"Jujuy\",\"L\":\"La Pampa\",\"F\":\"La Rioja\",\"M\":\"Mendoza\",\"N\":\"Misiones\",\"Q\":\"Neuqu\u00e9n\",\"R\":\"R\u00edo Negro\",\"A\":\"Salta\",\"J\":\"San Juan\",\"D\":\"San Luis\",\"Z\":\"Santa Cruz\",\"S\":\"Santa Fe\",\"G\":\"Santiago del Estero\",\"V\":\"Tierra del Fuego\",\"T\":\"Tucum\u00e1n\"},\"AT\":[],\"AU\":{\"ACT\":\"Australian Capital Territory\",\"NSW\":\"New South Wales\",\"NT\":\"Northern Territory\",\"QLD\":\"Queensland\",\"SA\":\"South Australia\",\"TAS\":\"Tasmania\",\"VIC\":\"Victoria\",\"WA\":\"Western Australia\"},\"AX\":[],\"BD\":{\"BD-05\":\"Bagerhat\",\"BD-01\":\"Bandarban\",\"BD-02\":\"Barguna\",\"BD-06\":\"Barishal\",\"BD-07\":\"Bhola\",\"BD-03\":\"Bogura\",\"BD-04\":\"Brahmanbaria\",\"BD-09\":\"Chandpur\",\"BD-10\":\"Chattogram\",\"BD-12\":\"Chuadanga\",\"BD-11\":\"Cox's Bazar\",\"BD-08\":\"Cumilla\",\"BD-13\":\"Dhaka\",\"BD-14\":\"Dinajpur\",\"BD-15\":\"Faridpur \",\"BD-16\":\"Feni\",\"BD-19\":\"Gaibandha\",\"BD-18\":\"Gazipur\",\"BD-17\":\"Gopalganj\",\"BD-20\":\"Habiganj\",\"BD-21\":\"Jamalpur\",\"BD-22\":\"Jashore\",\"BD-25\":\"Jhalokati\",\"BD-23\":\"Jhenaidah\",\"BD-24\":\"Joypurhat\",\"BD-29\":\"Khagrachhari\",\"BD-27\":\"Khulna\",\"BD-26\":\"Kishoreganj\",\"BD-28\":\"Kurigram\",\"BD-30\":\"Kushtia\",\"BD-31\":\"Lakshmipur\",\"BD-32\":\"Lalmonirhat\",\"BD-36\":\"Madaripur\",\"BD-37\":\"Magura\",\"BD-33\":\"Manikganj \",\"BD-39\":\"Meherpur\",\"BD-38\":\"Moulvibazar\",\"BD-35\":\"Munshiganj\",\"BD-34\":\"Mymensingh\",\"BD-48\":\"Naogaon\",\"BD-43\":\"Narail\",\"BD-40\":\"Narayanganj\",\"BD-42\":\"Narsingdi\",\"BD-44\":\"Natore\",\"BD-45\":\"Nawabganj\",\"BD-41\":\"Netrakona\",\"BD-46\":\"Nilphamari\",\"BD-47\":\"Noakhali\",\"BD-49\":\"Pabna\",\"BD-52\":\"Panchagarh\",\"BD-51\":\"Patuakhali\",\"BD-50\":\"Pirojpur\",\"BD-53\":\"Rajbari\",\"BD-54\":\"Rajshahi\",\"BD-56\":\"Rangamati\",\"BD-55\":\"Rangpur\",\"BD-58\":\"Satkhira\",\"BD-62\":\"Shariatpur\",\"BD-57\":\"Sherpur\",\"BD-59\":\"Sirajganj\",\"BD-61\":\"Sunamganj\",\"BD-60\":\"Sylhet\",\"BD-63\":\"Tangail\",\"BD-64\":\"Thakurgaon\"},\"BE\":[],\"BG\":{\"BG-01\":\"Blagoevgrad\",\"BG-02\":\"Burgas\",\"BG-08\":\"Dobrich\",\"BG-07\":\"Gabrovo\",\"BG-26\":\"Haskovo\",\"BG-09\":\"Kardzhali\",\"BG-10\":\"Kyustendil\",\"BG-11\":\"Lovech\",\"BG-12\":\"Montana\",\"BG-13\":\"Pazardzhik\",\"BG-14\":\"Pernik\",\"BG-15\":\"Pleven\",\"BG-16\":\"Plovdiv\",\"BG-17\":\"Razgrad\",\"BG-18\":\"Ruse\",\"BG-27\":\"Shumen\",\"BG-19\":\"Silistra\",\"BG-20\":\"Sliven\",\"BG-21\":\"Smolyan\",\"BG-23\":\"Sofia\",\"BG-22\":\"Sofia-Grad\",\"BG-24\":\"Stara Zagora\",\"BG-25\":\"Targovishte\",\"BG-03\":\"Varna\",\"BG-04\":\"Veliko Tarnovo\",\"BG-05\":\"Vidin\",\"BG-06\":\"Vratsa\",\"BG-28\":\"Yambol\"},\"BH\":[],\"BI\":[],\"BO\":{\"B\":\"Chuquisaca\",\"H\":\"Beni\",\"C\":\"Cochabamba\",\"L\":\"La Paz\",\"O\":\"Oruro\",\"N\":\"Pando\",\"P\":\"Potos\\u00ed\",\"S\":\"Santa Cruz\",\"T\":\"Tarija\"},\"BR\":{\"AC\":\"Acre\",\"AL\":\"Alagoas\",\"AP\":\"Amap\u00e1\",\"AM\":\"Amazonas\",\"BA\":\"Bahia\",\"CE\":\"Cear\u00e1\",\"DF\":\"Distrito Federal\",\"ES\":\"Esp\u00edrito Santo\",\"GO\":\"Goi\u00e1s\",\"MA\":\"Maranh\u00e3o\",\"MT\":\"Mato Grosso\",\"MS\":\"Mato Grosso do Sul\",\"MG\":\"Minas Gerais\",\"PA\":\"Par\u00e1\",\"PB\":\"Para\u00edba\",\"PR\":\"Paran\u00e1\",\"PE\":\"Pernambuco\",\"PI\":\"Piau\u00ed\",\"RJ\":\"Rio de Janeiro\",\"RN\":\"Rio Grande do Norte\",\"RS\":\"Rio Grande do Sul\",\"RO\":\"Rond\u00f4nia\",\"RR\":\"Roraima\",\"SC\":\"Santa Catarina\",\"SP\":\"S\u00e3o Paulo\",\"SE\":\"Sergipe\",\"TO\":\"Tocantins\"},\"CA\":{\"AB\":\"Alberta\",\"BC\":\"British Columbia\",\"MB\":\"Manitoba\",\"NB\":\"New Brunswick\",\"NL\":\"Newfoundland and Labrador\",\"NT\":\"Northwest Territories\",\"NS\":\"Nova Scotia\",\"NU\":\"Nunavut\",\"ON\":\"Ontario\",\"PE\":\"Prince Edward Island\",\"QC\":\"Quebec\",\"SK\":\"Saskatchewan\",\"YT\":\"Yukon Territory\"},\"CH\":{\"AG\":\"Aargau\",\"AR\":\"Appenzell Ausserrhoden\",\"AI\":\"Appenzell Innerrhoden\",\"BL\":\"Basel-Landschaft\",\"BS\":\"Basel-Stadt\",\"BE\":\"Bern\",\"FR\":\"Fribourg\",\"GE\":\"Geneva\",\"GL\":\"Glarus\",\"GR\":\"Graub\u00fcnden\",\"JU\":\"Jura\",\"LU\":\"Luzern\",\"NE\":\"Neuch\u00e2tel\",\"NW\":\"Nidwalden\",\"OW\":\"Obwalden\",\"SH\":\"Schaffhausen\",\"SZ\":\"Schwyz\",\"SO\":\"Solothurn\",\"SG\":\"St. Gallen\",\"TG\":\"Thurgau\",\"TI\":\"Ticino\",\"UR\":\"Uri\",\"VS\":\"Valais\",\"VD\":\"Vaud\",\"ZG\":\"Zug\",\"ZH\":\"Z\u00fcrich\"},\"CN\":{\"CN1\":\"Yunnan \\\/ \u4e91\u5357\",\"CN2\":\"Beijing \\\/ \u5317\u4eac\",\"CN3\":\"Tianjin \\\/ \u5929\u6d25\",\"CN4\":\"Hebei \\\/ \u6cb3\u5317\",\"CN5\":\"Shanxi \\\/ \u5c71\u897f\",\"CN6\":\"Inner Mongolia \\\/ \u5167\u8499\u53e4\",\"CN7\":\"Liaoning \\\/ \u8fbd\u5b81\",\"CN8\":\"Jilin \\\/ \u5409\u6797\",\"CN9\":\"Heilongjiang \\\/ \u9ed1\u9f99\u6c5f\",\"CN10\":\"Shanghai \\\/ \u4e0a\u6d77\",\"CN11\":\"Jiangsu \\\/ \u6c5f\u82cf\",\"CN12\":\"Zhejiang \\\/ \u6d59\u6c5f\",\"CN13\":\"Anhui \\\/ \u5b89\u5fbd\",\"CN14\":\"Fujian \\\/ \u798f\u5efa\",\"CN15\":\"Jiangxi \\\/ \u6c5f\u897f\",\"CN16\":\"Shandong \\\/ \u5c71\u4e1c\",\"CN17\":\"Henan \\\/ \u6cb3\u5357\",\"CN18\":\"Hubei \\\/ \u6e56\u5317\",\"CN19\":\"Hunan \\\/ \u6e56\u5357\",\"CN20\":\"Guangdong \\\/ \u5e7f\u4e1c\",\"CN21\":\"Guangxi Zhuang \\\/ \u5e7f\u897f\u58ee\u65cf\",\"CN22\":\"Hainan \\\/ \u6d77\u5357\",\"CN23\":\"Chongqing \\\/ \u91cd\u5e86\",\"CN24\":\"Sichuan \\\/ \u56db\u5ddd\",\"CN25\":\"Guizhou \\\/ \u8d35\u5dde\",\"CN26\":\"Shaanxi \\\/ \u9655\u897f\",\"CN27\":\"Gansu \\\/ \u7518\u8083\",\"CN28\":\"Qinghai \\\/ \u9752\u6d77\",\"CN29\":\"Ningxia Hui \\\/ \u5b81\u590f\",\"CN30\":\"Macau \\\/ \u6fb3\u95e8\",\"CN31\":\"Tibet \\\/ \u897f\u85cf\",\"CN32\":\"Xinjiang \\\/ \u65b0\u7586\"},\"CZ\":[],\"DE\":[],\"DK\":[],\"EE\":[],\"ES\":{\"C\":\"A Coru\u00f1a\",\"VI\":\"Araba\\\/\u00c1lava\",\"AB\":\"Albacete\",\"A\":\"Alicante\",\"AL\":\"Almer\u00eda\",\"O\":\"Asturias\",\"AV\":\"\u00c1vila\",\"BA\":\"Badajoz\",\"PM\":\"Baleares\",\"B\":\"Barcelona\",\"BU\":\"Burgos\",\"CC\":\"C\u00e1ceres\",\"CA\":\"C\u00e1diz\",\"S\":\"Cantabria\",\"CS\":\"Castell\u00f3n\",\"CE\":\"Ceuta\",\"CR\":\"Ciudad Real\",\"CO\":\"C\u00f3rdoba\",\"CU\":\"Cuenca\",\"GI\":\"Girona\",\"GR\":\"Granada\",\"GU\":\"Guadalajara\",\"SS\":\"Gipuzkoa\",\"H\":\"Huelva\",\"HU\":\"Huesca\",\"J\":\"Ja\u00e9n\",\"LO\":\"La Rioja\",\"GC\":\"Las Palmas\",\"LE\":\"Le\u00f3n\",\"L\":\"Lleida\",\"LU\":\"Lugo\",\"M\":\"Madrid\",\"MA\":\"M\u00e1laga\",\"ML\":\"Melilla\",\"MU\":\"Murcia\",\"NA\":\"Navarra\",\"OR\":\"Ourense\",\"P\":\"Palencia\",\"PO\":\"Pontevedra\",\"SA\":\"Salamanca\",\"TF\":\"Santa Cruz de Tenerife\",\"SG\":\"Segovia\",\"SE\":\"Sevilla\",\"SO\":\"Soria\",\"T\":\"Tarragona\",\"TE\":\"Teruel\",\"TO\":\"Toledo\",\"V\":\"Valencia\",\"VA\":\"Valladolid\",\"BI\":\"Bizkaia\",\"ZA\":\"Zamora\",\"Z\":\"Zaragoza\"},\"FI\":[],\"FR\":[],\"GP\":[],\"GR\":{\"I\":\"\\u0391\\u03c4\\u03c4\\u03b9\\u03ba\\u03ae\",\"A\":\"\\u0391\\u03bd\\u03b1\\u03c4\\u03bf\\u03bb\\u03b9\\u03ba\\u03ae \\u039c\\u03b1\\u03ba\\u03b5\\u03b4\\u03bf\\u03bd\\u03af\\u03b1 \\u03ba\\u03b1\\u03b9 \\u0398\\u03c1\\u03ac\\u03ba\\u03b7\",\"B\":\"\\u039a\\u03b5\\u03bd\\u03c4\\u03c1\\u03b9\\u03ba\\u03ae \\u039c\\u03b1\\u03ba\\u03b5\\u03b4\\u03bf\\u03bd\\u03af\\u03b1\",\"C\":\"\\u0394\\u03c5\\u03c4\\u03b9\\u03ba\\u03ae \\u039c\\u03b1\\u03ba\\u03b5\\u03b4\\u03bf\\u03bd\\u03af\\u03b1\",\"D\":\"\\u0389\\u03c0\\u03b5\\u03b9\\u03c1\\u03bf\\u03c2\",\"E\":\"\\u0398\\u03b5\\u03c3\\u03c3\\u03b1\\u03bb\\u03af\\u03b1\",\"F\":\"\\u0399\\u03cc\\u03bd\\u03b9\\u03bf\\u03b9 \\u039d\\u03ae\\u03c3\\u03bf\\u03b9\",\"G\":\"\\u0394\\u03c5\\u03c4\\u03b9\\u03ba\\u03ae \\u0395\\u03bb\\u03bb\\u03ac\\u03b4\\u03b1\",\"H\":\"\\u03a3\\u03c4\\u03b5\\u03c1\\u03b5\\u03ac \\u0395\\u03bb\\u03bb\\u03ac\\u03b4\\u03b1\",\"J\":\"\\u03a0\\u03b5\\u03bb\\u03bf\\u03c0\\u03cc\\u03bd\\u03bd\\u03b7\\u03c3\\u03bf\\u03c2\",\"K\":\"\\u0392\\u03cc\\u03c1\\u03b5\\u03b9\\u03bf \\u0391\\u03b9\\u03b3\\u03b1\\u03af\\u03bf\",\"L\":\"\\u039d\\u03cc\\u03c4\\u03b9\\u03bf \\u0391\\u03b9\\u03b3\\u03b1\\u03af\\u03bf\",\"M\":\"\\u039a\\u03c1\\u03ae\\u03c4\\u03b7\"},\"GF\":[],\"HK\":{\"HONG KONG\":\"Hong Kong Island\",\"KOWLOON\":\"Kowloon\",\"NEW TERRITORIES\":\"New Territories\"},\"HU\":{\"BK\":\"B\\u00e1cs-Kiskun\",\"BE\":\"B\\u00e9k\\u00e9s\",\"BA\":\"Baranya\",\"BZ\":\"Borsod-Aba\\u00faj-Zempl\\u00e9n\",\"BU\":\"Budapest\",\"CS\":\"Csongr\\u00e1d\",\"FE\":\"Fej\\u00e9r\",\"GS\":\"Gy\\u0151r-Moson-Sopron\",\"HB\":\"Hajd\\u00fa-Bihar\",\"HE\":\"Heves\",\"JN\":\"J\\u00e1sz-Nagykun-Szolnok\",\"KE\":\"Kom\\u00e1rom-Esztergom\",\"NO\":\"N\\u00f3gr\\u00e1d\",\"PE\":\"Pest\",\"SO\":\"Somogy\",\"SZ\":\"Szabolcs-Szatm\\u00e1r-Bereg\",\"TO\":\"Tolna\",\"VA\":\"Vas\",\"VE\":\"Veszpr\\u00e9m\",\"ZA\":\"Zala\"},\"ID\":{\"AC\":\"Daerah Istimewa Aceh\",\"SU\":\"Sumatera Utara\",\"SB\":\"Sumatera Barat\",\"RI\":\"Riau\",\"KR\":\"Kepulauan Riau\",\"JA\":\"Jambi\",\"SS\":\"Sumatera Selatan\",\"BB\":\"Bangka Belitung\",\"BE\":\"Bengkulu\",\"LA\":\"Lampung\",\"JK\":\"DKI Jakarta\",\"JB\":\"Jawa Barat\",\"BT\":\"Banten\",\"JT\":\"Jawa Tengah\",\"JI\":\"Jawa Timur\",\"YO\":\"Daerah Istimewa Yogyakarta\",\"BA\":\"Bali\",\"NB\":\"Nusa Tenggara Barat\",\"NT\":\"Nusa Tenggara Timur\",\"KB\":\"Kalimantan Barat\",\"KT\":\"Kalimantan Tengah\",\"KI\":\"Kalimantan Timur\",\"KS\":\"Kalimantan Selatan\",\"KU\":\"Kalimantan Utara\",\"SA\":\"Sulawesi Utara\",\"ST\":\"Sulawesi Tengah\",\"SG\":\"Sulawesi Tenggara\",\"SR\":\"Sulawesi Barat\",\"SN\":\"Sulawesi Selatan\",\"GO\":\"Gorontalo\",\"MA\":\"Maluku\",\"MU\":\"Maluku Utara\",\"PA\":\"Papua\",\"PB\":\"Papua Barat\"},\"IE\":{\"CW\":\"Carlow\",\"CN\":\"Cavan\",\"CE\":\"Clare\",\"CO\":\"Cork\",\"DL\":\"Donegal\",\"D\":\"Dublin\",\"G\":\"Galway\",\"KY\":\"Kerry\",\"KE\":\"Kildare\",\"KK\":\"Kilkenny\",\"LS\":\"Laois\",\"LM\":\"Leitrim\",\"LK\":\"Limerick\",\"LD\":\"Longford\",\"LH\":\"Louth\",\"MO\":\"Mayo\",\"MH\":\"Meath\",\"MN\":\"Monaghan\",\"OY\":\"Offaly\",\"RN\":\"Roscommon\",\"SO\":\"Sligo\",\"TA\":\"Tipperary\",\"WD\":\"Waterford\",\"WH\":\"Westmeath\",\"WX\":\"Wexford\",\"WW\":\"Wicklow\"},\"IN\":{\"AP\":\"Andhra Pradesh\",\"AR\":\"Arunachal Pradesh\",\"AS\":\"Assam\",\"BR\":\"Bihar\",\"CT\":\"Chhattisgarh\",\"GA\":\"Goa\",\"GJ\":\"Gujarat\",\"HR\":\"Haryana\",\"HP\":\"Himachal Pradesh\",\"JK\":\"Jammu and Kashmir\",\"JH\":\"Jharkhand\",\"KA\":\"Karnataka\",\"KL\":\"Kerala\",\"MP\":\"Madhya Pradesh\",\"MH\":\"Maharashtra\",\"MN\":\"Manipur\",\"ML\":\"Meghalaya\",\"MZ\":\"Mizoram\",\"NL\":\"Nagaland\",\"OR\":\"Orissa\",\"PB\":\"Punjab\",\"RJ\":\"Rajasthan\",\"SK\":\"Sikkim\",\"TN\":\"Tamil Nadu\",\"TS\":\"Telangana\",\"TR\":\"Tripura\",\"UK\":\"Uttarakhand\",\"UP\":\"Uttar Pradesh\",\"WB\":\"West Bengal\",\"AN\":\"Andaman and Nicobar Islands\",\"CH\":\"Chandigarh\",\"DN\":\"Dadra and Nagar Haveli\",\"DD\":\"Daman and Diu\",\"DL\":\"Delhi\",\"LD\":\"Lakshadeep\",\"PY\":\"Pondicherry (Puducherry)\"},\"IR\":{\"KHZ\":\"Khuzestan  (\\u062e\\u0648\\u0632\\u0633\\u062a\\u0627\\u0646)\",\"THR\":\"Tehran  (\\u062a\\u0647\\u0631\\u0627\\u0646)\",\"ILM\":\"Ilaam (\\u0627\\u06cc\\u0644\\u0627\\u0645)\",\"BHR\":\"Bushehr (\\u0628\\u0648\\u0634\\u0647\\u0631)\",\"ADL\":\"Ardabil (\\u0627\\u0631\\u062f\\u0628\\u06cc\\u0644)\",\"ESF\":\"Isfahan (\\u0627\\u0635\\u0641\\u0647\\u0627\\u0646)\",\"YZD\":\"Yazd (\\u06cc\\u0632\\u062f)\",\"KRH\":\"Kermanshah (\\u06a9\\u0631\\u0645\\u0627\\u0646\\u0634\\u0627\\u0647)\",\"KRN\":\"Kerman (\\u06a9\\u0631\\u0645\\u0627\\u0646)\",\"HDN\":\"Hamadan (\\u0647\\u0645\\u062f\\u0627\\u0646)\",\"GZN\":\"Ghazvin (\\u0642\\u0632\\u0648\\u06cc\\u0646)\",\"ZJN\":\"Zanjan (\\u0632\\u0646\\u062c\\u0627\\u0646)\",\"LRS\":\"Luristan (\\u0644\\u0631\\u0633\\u062a\\u0627\\u0646)\",\"ABZ\":\"Alborz (\\u0627\\u0644\\u0628\\u0631\\u0632)\",\"EAZ\":\"East Azarbaijan (\\u0622\\u0630\\u0631\\u0628\\u0627\\u06cc\\u062c\\u0627\\u0646 \\u0634\\u0631\\u0642\\u06cc)\",\"WAZ\":\"West Azarbaijan (\\u0622\\u0630\\u0631\\u0628\\u0627\\u06cc\\u062c\\u0627\\u0646 \\u063a\\u0631\\u0628\\u06cc)\",\"CHB\":\"Chaharmahal and Bakhtiari (\\u0686\\u0647\\u0627\\u0631\\u0645\\u062d\\u0627\\u0644 \\u0648 \\u0628\\u062e\\u062a\\u06cc\\u0627\\u0631\\u06cc)\",\"SKH\":\"South Khorasan (\\u062e\\u0631\\u0627\\u0633\\u0627\\u0646 \\u062c\\u0646\\u0648\\u0628\\u06cc)\",\"RKH\":\"Razavi Khorasan (\\u062e\\u0631\\u0627\\u0633\\u0627\\u0646 \\u0631\\u0636\\u0648\\u06cc)\",\"NKH\":\"North Khorasan (\\u062e\\u0631\\u0627\\u0633\\u0627\\u0646 \\u0634\\u0645\\u0627\\u0644\\u06cc)\",\"SMN\":\"Semnan (\\u0633\\u0645\\u0646\\u0627\\u0646)\",\"FRS\":\"Fars (\\u0641\\u0627\\u0631\\u0633)\",\"QHM\":\"Qom (\\u0642\\u0645)\",\"KRD\":\"Kurdistan \\\/ \\u06a9\\u0631\\u062f\\u0633\\u062a\\u0627\\u0646)\",\"KBD\":\"Kohgiluyeh and BoyerAhmad (\\u06a9\\u0647\\u06af\\u06cc\\u0644\\u0648\\u06cc\\u06cc\\u0647 \\u0648 \\u0628\\u0648\\u06cc\\u0631\\u0627\\u062d\\u0645\\u062f)\",\"GLS\":\"Golestan (\\u06af\\u0644\\u0633\\u062a\\u0627\\u0646)\",\"GIL\":\"Gilan (\\u06af\\u06cc\\u0644\\u0627\\u0646)\",\"MZN\":\"Mazandaran (\\u0645\\u0627\\u0632\\u0646\\u062f\\u0631\\u0627\\u0646)\",\"MKZ\":\"Markazi (\\u0645\\u0631\\u06a9\\u0632\\u06cc)\",\"HRZ\":\"Hormozgan (\\u0647\\u0631\\u0645\\u0632\\u06af\\u0627\\u0646)\",\"SBN\":\"Sistan and Baluchestan (\\u0633\\u06cc\\u0633\\u062a\\u0627\\u0646 \\u0648 \\u0628\\u0644\\u0648\\u0686\\u0633\\u062a\\u0627\\u0646)\"},\"IS\":[],\"IT\":{\"AG\":\"Agrigento\",\"AL\":\"Alessandria\",\"AN\":\"Ancona\",\"AO\":\"Aosta\",\"AR\":\"Arezzo\",\"AP\":\"Ascoli Piceno\",\"AT\":\"Asti\",\"AV\":\"Avellino\",\"BA\":\"Bari\",\"BT\":\"Barletta-Andria-Trani\",\"BL\":\"Belluno\",\"BN\":\"Benevento\",\"BG\":\"Bergamo\",\"BI\":\"Biella\",\"BO\":\"Bologna\",\"BZ\":\"Bolzano\",\"BS\":\"Brescia\",\"BR\":\"Brindisi\",\"CA\":\"Cagliari\",\"CL\":\"Caltanissetta\",\"CB\":\"Campobasso\",\"CE\":\"Caserta\",\"CT\":\"Catania\",\"CZ\":\"Catanzaro\",\"CH\":\"Chieti\",\"CO\":\"Como\",\"CS\":\"Cosenza\",\"CR\":\"Cremona\",\"KR\":\"Crotone\",\"CN\":\"Cuneo\",\"EN\":\"Enna\",\"FM\":\"Fermo\",\"FE\":\"Ferrara\",\"FI\":\"Firenze\",\"FG\":\"Foggia\",\"FC\":\"Forl\\u00ec-Cesena\",\"FR\":\"Frosinone\",\"GE\":\"Genova\",\"GO\":\"Gorizia\",\"GR\":\"Grosseto\",\"IM\":\"Imperia\",\"IS\":\"Isernia\",\"SP\":\"La Spezia\",\"AQ\":\"L'Aquila\",\"LT\":\"Latina\",\"LE\":\"Lecce\",\"LC\":\"Lecco\",\"LI\":\"Livorno\",\"LO\":\"Lodi\",\"LU\":\"Lucca\",\"MC\":\"Macerata\",\"MN\":\"Mantova\",\"MS\":\"Massa-Carrara\",\"MT\":\"Matera\",\"ME\":\"Messina\",\"MI\":\"Milano\",\"MO\":\"Modena\",\"MB\":\"Monza e della Brianza\",\"NA\":\"Napoli\",\"NO\":\"Novara\",\"NU\":\"Nuoro\",\"OR\":\"Oristano\",\"PD\":\"Padova\",\"PA\":\"Palermo\",\"PR\":\"Parma\",\"PV\":\"Pavia\",\"PG\":\"Perugia\",\"PU\":\"Pesaro e Urbino\",\"PE\":\"Pescara\",\"PC\":\"Piacenza\",\"PI\":\"Pisa\",\"PT\":\"Pistoia\",\"PN\":\"Pordenone\",\"PZ\":\"Potenza\",\"PO\":\"Prato\",\"RG\":\"Ragusa\",\"RA\":\"Ravenna\",\"RC\":\"Reggio Calabria\",\"RE\":\"Reggio Emilia\",\"RI\":\"Rieti\",\"RN\":\"Rimini\",\"RM\":\"Roma\",\"RO\":\"Rovigo\",\"SA\":\"Salerno\",\"SS\":\"Sassari\",\"SV\":\"Savona\",\"SI\":\"Siena\",\"SR\":\"Siracusa\",\"SO\":\"Sondrio\",\"SU\":\"Sud Sardegna\",\"TA\":\"Taranto\",\"TE\":\"Teramo\",\"TR\":\"Terni\",\"TO\":\"Torino\",\"TP\":\"Trapani\",\"TN\":\"Trento\",\"TV\":\"Treviso\",\"TS\":\"Trieste\",\"UD\":\"Udine\",\"VA\":\"Varese\",\"VE\":\"Venezia\",\"VB\":\"Verbano-Cusio-Ossola\",\"VC\":\"Vercelli\",\"VR\":\"Verona\",\"VV\":\"Vibo Valentia\",\"VI\":\"Vicenza\",\"VT\":\"Viterbo\"},\"IL\":[],\"IM\":[],\"JP\":{\"JP01\":\"Hokkaido\",\"JP02\":\"Aomori\",\"JP03\":\"Iwate\",\"JP04\":\"Miyagi\",\"JP05\":\"Akita\",\"JP06\":\"Yamagata\",\"JP07\":\"Fukushima\",\"JP08\":\"Ibaraki\",\"JP09\":\"Tochigi\",\"JP10\":\"Gunma\",\"JP11\":\"Saitama\",\"JP12\":\"Chiba\",\"JP13\":\"Tokyo\",\"JP14\":\"Kanagawa\",\"JP15\":\"Niigata\",\"JP16\":\"Toyama\",\"JP17\":\"Ishikawa\",\"JP18\":\"Fukui\",\"JP19\":\"Yamanashi\",\"JP20\":\"Nagano\",\"JP21\":\"Gifu\",\"JP22\":\"Shizuoka\",\"JP23\":\"Aichi\",\"JP24\":\"Mie\",\"JP25\":\"Shiga\",\"JP26\":\"Kyoto\",\"JP27\":\"Osaka\",\"JP28\":\"Hyogo\",\"JP29\":\"Nara\",\"JP30\":\"Wakayama\",\"JP31\":\"Tottori\",\"JP32\":\"Shimane\",\"JP33\":\"Okayama\",\"JP34\":\"Hiroshima\",\"JP35\":\"Yamaguchi\",\"JP36\":\"Tokushima\",\"JP37\":\"Kagawa\",\"JP38\":\"Ehime\",\"JP39\":\"Kochi\",\"JP40\":\"Fukuoka\",\"JP41\":\"Saga\",\"JP42\":\"Nagasaki\",\"JP43\":\"Kumamoto\",\"JP44\":\"Oita\",\"JP45\":\"Miyazaki\",\"JP46\":\"Kagoshima\",\"JP47\":\"Okinawa\"},\"KR\":[],\"KW\":[],\"LB\":[],\"LR\":{\"BM\":\"Bomi\",\"BN\":\"Bong\",\"GA\":\"Gbarpolu\",\"GB\":\"Grand Bassa\",\"GC\":\"Grand Cape Mount\",\"GG\":\"Grand Gedeh\",\"GK\":\"Grand Kru\",\"LO\":\"Lofa\",\"MA\":\"Margibi\",\"MY\":\"Maryland\",\"MO\":\"Montserrado\",\"NM\":\"Nimba\",\"RV\":\"Rivercess\",\"RG\":\"River Gee\",\"SN\":\"Sinoe\"},\"LU\":[],\"MD\":{\"C\":\"Chi\u0219in\u0103u\",\"BL\":\"B\u0103l\u021bi\",\"AN\":\"Anenii Noi\",\"BS\":\"Basarabeasca\",\"BR\":\"Briceni\",\"CH\":\"Cahul\",\"CT\":\"Cantemir\",\"CL\":\"C\u0103l\u0103ra\u0219i\",\"CS\":\"C\u0103u\u0219eni\",\"CM\":\"Cimi\u0219lia\",\"CR\":\"Criuleni\",\"DN\":\"Dondu\u0219eni\",\"DR\":\"Drochia\",\"DB\":\"Dub\u0103sari\",\"ED\":\"Edine\u021b\",\"FL\":\"F\u0103le\u0219ti\",\"FR\":\"Flore\u0219ti\",\"GE\":\"UTA G\u0103g\u0103uzia\",\"GL\":\"Glodeni\",\"HN\":\"H\u00eence\u0219ti\",\"IL\":\"Ialoveni\",\"LV\":\"Leova\",\"NS\":\"Nisporeni\",\"OC\":\"Ocni\u021ba\",\"OR\":\"Orhei\",\"RZ\":\"Rezina\",\"RS\":\"R\u00ee\u0219cani\",\"SG\":\"S\u00eengerei\",\"SR\":\"Soroca\",\"ST\":\"Str\u0103\u0219eni\",\"SD\":\"\u0218old\u0103ne\u0219ti\",\"SV\":\"\u0218tefan Vod\u0103\",\"TR\":\"Taraclia\",\"TL\":\"Telene\u0219ti\",\"UN\":\"Ungheni\"},\"MQ\":[],\"MT\":[],\"MX\":{\"DF\":\"Ciudad de M\u00e9xico\",\"JA\":\"Jalisco\",\"NL\":\"Nuevo Le\u00f3n\",\"AG\":\"Aguascalientes\",\"BC\":\"Baja California\",\"BS\":\"Baja California Sur\",\"CM\":\"Campeche\",\"CS\":\"Chiapas\",\"CH\":\"Chihuahua\",\"CO\":\"Coahuila\",\"CL\":\"Colima\",\"DG\":\"Durango\",\"GT\":\"Guanajuato\",\"GR\":\"Guerrero\",\"HG\":\"Hidalgo\",\"MX\":\"Estado de M\u00e9xico\",\"MI\":\"Michoac\u00e1n\",\"MO\":\"Morelos\",\"NA\":\"Nayarit\",\"OA\":\"Oaxaca\",\"PU\":\"Puebla\",\"QT\":\"Quer\u00e9taro\",\"QR\":\"Quintana Roo\",\"SL\":\"San Luis Potos\u00ed\",\"SI\":\"Sinaloa\",\"SO\":\"Sonora\",\"TB\":\"Tabasco\",\"TM\":\"Tamaulipas\",\"TL\":\"Tlaxcala\",\"VE\":\"Veracruz\",\"YU\":\"Yucat\u00e1n\",\"ZA\":\"Zacatecas\"},\"MY\":{\"JHR\":\"Johor\",\"KDH\":\"Kedah\",\"KTN\":\"Kelantan\",\"LBN\":\"Labuan\",\"MLK\":\"Malacca (Melaka)\",\"NSN\":\"Negeri Sembilan\",\"PHG\":\"Pahang\",\"PNG\":\"Penang (Pulau Pinang)\",\"PRK\":\"Perak\",\"PLS\":\"Perlis\",\"SBH\":\"Sabah\",\"SWK\":\"Sarawak\",\"SGR\":\"Selangor\",\"TRG\":\"Terengganu\",\"PJY\":\"Putrajaya\",\"KUL\":\"Kuala Lumpur\"},\"NG\":{\"AB\":\"Abia\",\"FC\":\"Abuja\",\"AD\":\"Adamawa\",\"AK\":\"Akwa Ibom\",\"AN\":\"Anambra\",\"BA\":\"Bauchi\",\"BY\":\"Bayelsa\",\"BE\":\"Benue\",\"BO\":\"Borno\",\"CR\":\"Cross River\",\"DE\":\"Delta\",\"EB\":\"Ebonyi\",\"ED\":\"Edo\",\"EK\":\"Ekiti\",\"EN\":\"Enugu\",\"GO\":\"Gombe\",\"IM\":\"Imo\",\"JI\":\"Jigawa\",\"KD\":\"Kaduna\",\"KN\":\"Kano\",\"KT\":\"Katsina\",\"KE\":\"Kebbi\",\"KO\":\"Kogi\",\"KW\":\"Kwara\",\"LA\":\"Lagos\",\"NA\":\"Nasarawa\",\"NI\":\"Niger\",\"OG\":\"Ogun\",\"ON\":\"Ondo\",\"OS\":\"Osun\",\"OY\":\"Oyo\",\"PL\":\"Plateau\",\"RI\":\"Rivers\",\"SO\":\"Sokoto\",\"TA\":\"Taraba\",\"YO\":\"Yobe\",\"ZA\":\"Zamfara\"},\"NL\":[],\"NO\":[],\"NP\":{\"BAG\":\"Bagmati\",\"BHE\":\"Bheri\",\"DHA\":\"Dhaulagiri\",\"GAN\":\"Gandaki\",\"JAN\":\"Janakpur\",\"KAR\":\"Karnali\",\"KOS\":\"Koshi\",\"LUM\":\"Lumbini\",\"MAH\":\"Mahakali\",\"MEC\":\"Mechi\",\"NAR\":\"Narayani\",\"RAP\":\"Rapti\",\"SAG\":\"Sagarmatha\",\"SET\":\"Seti\"},\"NZ\":{\"NL\":\"Northland\",\"AK\":\"Auckland\",\"WA\":\"Waikato\",\"BP\":\"Bay of Plenty\",\"TK\":\"Taranaki\",\"GI\":\"Gisborne\",\"HB\":\"Hawke\u2019s Bay\",\"MW\":\"Manawatu-Wanganui\",\"WE\":\"Wellington\",\"NS\":\"Nelson\",\"MB\":\"Marlborough\",\"TM\":\"Tasman\",\"WC\":\"West Coast\",\"CT\":\"Canterbury\",\"OT\":\"Otago\",\"SL\":\"Southland\"},\"PE\":{\"CAL\":\"El Callao\",\"LMA\":\"Municipalidad Metropolitana de Lima\",\"AMA\":\"Amazonas\",\"ANC\":\"Ancash\",\"APU\":\"Apur\u00edmac\",\"ARE\":\"Arequipa\",\"AYA\":\"Ayacucho\",\"CAJ\":\"Cajamarca\",\"CUS\":\"Cusco\",\"HUV\":\"Huancavelica\",\"HUC\":\"Hu\u00e1nuco\",\"ICA\":\"Ica\",\"JUN\":\"Jun\u00edn\",\"LAL\":\"La Libertad\",\"LAM\":\"Lambayeque\",\"LIM\":\"Lima\",\"LOR\":\"Loreto\",\"MDD\":\"Madre de Dios\",\"MOQ\":\"Moquegua\",\"PAS\":\"Pasco\",\"PIU\":\"Piura\",\"PUN\":\"Puno\",\"SAM\":\"San Mart\u00edn\",\"TAC\":\"Tacna\",\"TUM\":\"Tumbes\",\"UCA\":\"Ucayali\"},\"PH\":{\"ABR\":\"Abra\",\"AGN\":\"Agusan del Norte\",\"AGS\":\"Agusan del Sur\",\"AKL\":\"Aklan\",\"ALB\":\"Albay\",\"ANT\":\"Antique\",\"APA\":\"Apayao\",\"AUR\":\"Aurora\",\"BAS\":\"Basilan\",\"BAN\":\"Bataan\",\"BTN\":\"Batanes\",\"BTG\":\"Batangas\",\"BEN\":\"Benguet\",\"BIL\":\"Biliran\",\"BOH\":\"Bohol\",\"BUK\":\"Bukidnon\",\"BUL\":\"Bulacan\",\"CAG\":\"Cagayan\",\"CAN\":\"Camarines Norte\",\"CAS\":\"Camarines Sur\",\"CAM\":\"Camiguin\",\"CAP\":\"Capiz\",\"CAT\":\"Catanduanes\",\"CAV\":\"Cavite\",\"CEB\":\"Cebu\",\"COM\":\"Compostela Valley\",\"NCO\":\"Cotabato\",\"DAV\":\"Davao del Norte\",\"DAS\":\"Davao del Sur\",\"DAC\":\"Davao Occidental\",\"DAO\":\"Davao Oriental\",\"DIN\":\"Dinagat Islands\",\"EAS\":\"Eastern Samar\",\"GUI\":\"Guimaras\",\"IFU\":\"Ifugao\",\"ILN\":\"Ilocos Norte\",\"ILS\":\"Ilocos Sur\",\"ILI\":\"Iloilo\",\"ISA\":\"Isabela\",\"KAL\":\"Kalinga\",\"LUN\":\"La Union\",\"LAG\":\"Laguna\",\"LAN\":\"Lanao del Norte\",\"LAS\":\"Lanao del Sur\",\"LEY\":\"Leyte\",\"MAG\":\"Maguindanao\",\"MAD\":\"Marinduque\",\"MAS\":\"Masbate\",\"MSC\":\"Misamis Occidental\",\"MSR\":\"Misamis Oriental\",\"MOU\":\"Mountain Province\",\"NEC\":\"Negros Occidental\",\"NER\":\"Negros Oriental\",\"NSA\":\"Northern Samar\",\"NUE\":\"Nueva Ecija\",\"NUV\":\"Nueva Vizcaya\",\"MDC\":\"Occidental Mindoro\",\"MDR\":\"Oriental Mindoro\",\"PLW\":\"Palawan\",\"PAM\":\"Pampanga\",\"PAN\":\"Pangasinan\",\"QUE\":\"Quezon\",\"QUI\":\"Quirino\",\"RIZ\":\"Rizal\",\"ROM\":\"Romblon\",\"WSA\":\"Samar\",\"SAR\":\"Sarangani\",\"SIQ\":\"Siquijor\",\"SOR\":\"Sorsogon\",\"SCO\":\"South Cotabato\",\"SLE\":\"Southern Leyte\",\"SUK\":\"Sultan Kudarat\",\"SLU\":\"Sulu\",\"SUN\":\"Surigao del Norte\",\"SUR\":\"Surigao del Sur\",\"TAR\":\"Tarlac\",\"TAW\":\"Tawi-Tawi\",\"ZMB\":\"Zambales\",\"ZAN\":\"Zamboanga del Norte\",\"ZAS\":\"Zamboanga del Sur\",\"ZSI\":\"Zamboanga Sibugay\",\"00\":\"Metro Manila\"},\"PK\":{\"JK\":\"Azad Kashmir\",\"BA\":\"Balochistan\",\"TA\":\"FATA\",\"GB\":\"Gilgit Baltistan\",\"IS\":\"Islamabad Capital Territory\",\"KP\":\"Khyber Pakhtunkhwa\",\"PB\":\"Punjab\",\"SD\":\"Sindh\"},\"PL\":[],\"PT\":[],\"PY\":{\"PY-ASU\":\"Asunci\u00f3n\",\"PY-1\":\"Concepci\u00f3n\",\"PY-2\":\"San Pedro\",\"PY-3\":\"Cordillera\",\"PY-4\":\"Guair\u00e1\",\"PY-5\":\"Caaguaz\u00fa\",\"PY-6\":\"Caazap\u00e1\",\"PY-7\":\"Itap\u00faa\",\"PY-8\":\"Misiones\",\"PY-9\":\"Paraguar\u00ed\",\"PY-10\":\"Alto Paran\u00e1\",\"PY-11\":\"Central\",\"PY-12\":\"\u00d1eembuc\u00fa\",\"PY-13\":\"Amambay\",\"PY-14\":\"Canindey\u00fa\",\"PY-15\":\"Presidente Hayes\",\"PY-16\":\"Alto Paraguay\",\"PY-17\":\"Boquer\u00f3n\"},\"RE\":[],\"RO\":{\"AB\":\"Alba\",\"AR\":\"Arad\",\"AG\":\"Arge\u0219\",\"BC\":\"Bac\u0103u\",\"BH\":\"Bihor\",\"BN\":\"Bistri\u021ba-N\u0103s\u0103ud\",\"BT\":\"Boto\u0219ani\",\"BR\":\"Br\u0103ila\",\"BV\":\"Bra\u0219ov\",\"B\":\"Bucure\u0219ti\",\"BZ\":\"Buz\u0103u\",\"CL\":\"C\u0103l\u0103ra\u0219i\",\"CS\":\"Cara\u0219-Severin\",\"CJ\":\"Cluj\",\"CT\":\"Constan\u021ba\",\"CV\":\"Covasna\",\"DB\":\"D\u00e2mbovi\u021ba\",\"DJ\":\"Dolj\",\"GL\":\"Gala\u021bi\",\"GR\":\"Giurgiu\",\"GJ\":\"Gorj\",\"HR\":\"Harghita\",\"HD\":\"Hunedoara\",\"IL\":\"Ialomi\u021ba\",\"IS\":\"Ia\u0219i\",\"IF\":\"Ilfov\",\"MM\":\"Maramure\u0219\",\"MH\":\"Mehedin\u021bi\",\"MS\":\"Mure\u0219\",\"NT\":\"Neam\u021b\",\"OT\":\"Olt\",\"PH\":\"Prahova\",\"SJ\":\"S\u0103laj\",\"SM\":\"Satu Mare\",\"SB\":\"Sibiu\",\"SV\":\"Suceava\",\"TR\":\"Teleorman\",\"TM\":\"Timi\u0219\",\"TL\":\"Tulcea\",\"VL\":\"V\u00e2lcea\",\"VS\":\"Vaslui\",\"VN\":\"Vrancea\"},\"RS\":[],\"SG\":[],\"SK\":[],\"SI\":[],\"TH\":{\"TH-37\":\"Amnat Charoen\",\"TH-15\":\"Ang Thong\",\"TH-14\":\"Ayutthaya\",\"TH-10\":\"Bangkok\",\"TH-38\":\"Bueng Kan\",\"TH-31\":\"Buri Ram\",\"TH-24\":\"Chachoengsao\",\"TH-18\":\"Chai Nat\",\"TH-36\":\"Chaiyaphum\",\"TH-22\":\"Chanthaburi\",\"TH-50\":\"Chiang Mai\",\"TH-57\":\"Chiang Rai\",\"TH-20\":\"Chonburi\",\"TH-86\":\"Chumphon\",\"TH-46\":\"Kalasin\",\"TH-62\":\"Kamphaeng Phet\",\"TH-71\":\"Kanchanaburi\",\"TH-40\":\"Khon Kaen\",\"TH-81\":\"Krabi\",\"TH-52\":\"Lampang\",\"TH-51\":\"Lamphun\",\"TH-42\":\"Loei\",\"TH-16\":\"Lopburi\",\"TH-58\":\"Mae Hong Son\",\"TH-44\":\"Maha Sarakham\",\"TH-49\":\"Mukdahan\",\"TH-26\":\"Nakhon Nayok\",\"TH-73\":\"Nakhon Pathom\",\"TH-48\":\"Nakhon Phanom\",\"TH-30\":\"Nakhon Ratchasima\",\"TH-60\":\"Nakhon Sawan\",\"TH-80\":\"Nakhon Si Thammarat\",\"TH-55\":\"Nan\",\"TH-96\":\"Narathiwat\",\"TH-39\":\"Nong Bua Lam Phu\",\"TH-43\":\"Nong Khai\",\"TH-12\":\"Nonthaburi\",\"TH-13\":\"Pathum Thani\",\"TH-94\":\"Pattani\",\"TH-82\":\"Phang Nga\",\"TH-93\":\"Phatthalung\",\"TH-56\":\"Phayao\",\"TH-67\":\"Phetchabun\",\"TH-76\":\"Phetchaburi\",\"TH-66\":\"Phichit\",\"TH-65\":\"Phitsanulok\",\"TH-54\":\"Phrae\",\"TH-83\":\"Phuket\",\"TH-25\":\"Prachin Buri\",\"TH-77\":\"Prachuap Khiri Khan\",\"TH-85\":\"Ranong\",\"TH-70\":\"Ratchaburi\",\"TH-21\":\"Rayong\",\"TH-45\":\"Roi Et\",\"TH-27\":\"Sa Kaeo\",\"TH-47\":\"Sakon Nakhon\",\"TH-11\":\"Samut Prakan\",\"TH-74\":\"Samut Sakhon\",\"TH-75\":\"Samut Songkhram\",\"TH-19\":\"Saraburi\",\"TH-91\":\"Satun\",\"TH-17\":\"Sing Buri\",\"TH-33\":\"Sisaket\",\"TH-90\":\"Songkhla\",\"TH-64\":\"Sukhothai\",\"TH-72\":\"Suphan Buri\",\"TH-84\":\"Surat Thani\",\"TH-32\":\"Surin\",\"TH-63\":\"Tak\",\"TH-92\":\"Trang\",\"TH-23\":\"Trat\",\"TH-34\":\"Ubon Ratchathani\",\"TH-41\":\"Udon Thani\",\"TH-61\":\"Uthai Thani\",\"TH-53\":\"Uttaradit\",\"TH-95\":\"Yala\",\"TH-35\":\"Yasothon\"},\"TR\":{\"TR01\":\"Adana\",\"TR02\":\"Ad\u0131yaman\",\"TR03\":\"Afyon\",\"TR04\":\"A\u011fr\u0131\",\"TR05\":\"Amasya\",\"TR06\":\"Ankara\",\"TR07\":\"Antalya\",\"TR08\":\"Artvin\",\"TR09\":\"Ayd\u0131n\",\"TR10\":\"Bal\u0131kesir\",\"TR11\":\"Bilecik\",\"TR12\":\"Bing\u00f6l\",\"TR13\":\"Bitlis\",\"TR14\":\"Bolu\",\"TR15\":\"Burdur\",\"TR16\":\"Bursa\",\"TR17\":\"\u00c7anakkale\",\"TR18\":\"\u00c7ank\u0131r\u0131\",\"TR19\":\"\u00c7orum\",\"TR20\":\"Denizli\",\"TR21\":\"Diyarbak\u0131r\",\"TR22\":\"Edirne\",\"TR23\":\"Elaz\u0131\u011f\",\"TR24\":\"Erzincan\",\"TR25\":\"Erzurum\",\"TR26\":\"Eski\u015fehir\",\"TR27\":\"Gaziantep\",\"TR28\":\"Giresun\",\"TR29\":\"G\u00fcm\u00fc\u015fhane\",\"TR30\":\"Hakkari\",\"TR31\":\"Hatay\",\"TR32\":\"Isparta\",\"TR33\":\"\u0130\u00e7el\",\"TR34\":\"\u0130stanbul\",\"TR35\":\"\u0130zmir\",\"TR36\":\"Kars\",\"TR37\":\"Kastamonu\",\"TR38\":\"Kayseri\",\"TR39\":\"K\u0131rklareli\",\"TR40\":\"K\u0131r\u015fehir\",\"TR41\":\"Kocaeli\",\"TR42\":\"Konya\",\"TR43\":\"K\u00fctahya\",\"TR44\":\"Malatya\",\"TR45\":\"Manisa\",\"TR46\":\"Kahramanmara\u015f\",\"TR47\":\"Mardin\",\"TR48\":\"Mu\u011fla\",\"TR49\":\"Mu\u015f\",\"TR50\":\"Nev\u015fehir\",\"TR51\":\"Ni\u011fde\",\"TR52\":\"Ordu\",\"TR53\":\"Rize\",\"TR54\":\"Sakarya\",\"TR55\":\"Samsun\",\"TR56\":\"Siirt\",\"TR57\":\"Sinop\",\"TR58\":\"Sivas\",\"TR59\":\"Tekirda\u011f\",\"TR60\":\"Tokat\",\"TR61\":\"Trabzon\",\"TR62\":\"Tunceli\",\"TR63\":\"\u015eanl\u0131urfa\",\"TR64\":\"U\u015fak\",\"TR65\":\"Van\",\"TR66\":\"Yozgat\",\"TR67\":\"Zonguldak\",\"TR68\":\"Aksaray\",\"TR69\":\"Bayburt\",\"TR70\":\"Karaman\",\"TR71\":\"K\u0131r\u0131kkale\",\"TR72\":\"Batman\",\"TR73\":\"\u015e\u0131rnak\",\"TR74\":\"Bart\u0131n\",\"TR75\":\"Ardahan\",\"TR76\":\"I\u011fd\u0131r\",\"TR77\":\"Yalova\",\"TR78\":\"Karab\u00fck\",\"TR79\":\"Kilis\",\"TR80\":\"Osmaniye\",\"TR81\":\"D\u00fczce\"},\"TZ\":{\"TZ01\":\"Arusha\",\"TZ02\":\"Dar es Salaam\",\"TZ03\":\"Dodoma\",\"TZ04\":\"Iringa\",\"TZ05\":\"Kagera\",\"TZ06\":\"Pemba North\",\"TZ07\":\"Zanzibar North\",\"TZ08\":\"Kigoma\",\"TZ09\":\"Kilimanjaro\",\"TZ10\":\"Pemba South\",\"TZ11\":\"Zanzibar South\",\"TZ12\":\"Lindi\",\"TZ13\":\"Mara\",\"TZ14\":\"Mbeya\",\"TZ15\":\"Zanzibar West\",\"TZ16\":\"Morogoro\",\"TZ17\":\"Mtwara\",\"TZ18\":\"Mwanza\",\"TZ19\":\"Coast\",\"TZ20\":\"Rukwa\",\"TZ21\":\"Ruvuma\",\"TZ22\":\"Shinyanga\",\"TZ23\":\"Singida\",\"TZ24\":\"Tabora\",\"TZ25\":\"Tanga\",\"TZ26\":\"Manyara\",\"TZ27\":\"Geita\",\"TZ28\":\"Katavi\",\"TZ29\":\"Njombe\",\"TZ30\":\"Simiyu\"},\"LK\":[],\"SE\":[],\"US\":{\"AL\":\"Alabama\",\"AK\":\"Alaska\",\"AZ\":\"Arizona\",\"AR\":\"Arkansas\",\"CA\":\"California\",\"CO\":\"Colorado\",\"CT\":\"Connecticut\",\"DE\":\"Delaware\",\"DC\":\"District Of Columbia\",\"FL\":\"Florida\",\"GA\":\"Georgia\",\"HI\":\"Hawaii\",\"ID\":\"Idaho\",\"IL\":\"Illinois\",\"IN\":\"Indiana\",\"IA\":\"Iowa\",\"KS\":\"Kansas\",\"KY\":\"Kentucky\",\"LA\":\"Louisiana\",\"ME\":\"Maine\",\"MD\":\"Maryland\",\"MA\":\"Massachusetts\",\"MI\":\"Michigan\",\"MN\":\"Minnesota\",\"MS\":\"Mississippi\",\"MO\":\"Missouri\",\"MT\":\"Montana\",\"NE\":\"Nebraska\",\"NV\":\"Nevada\",\"NH\":\"New Hampshire\",\"NJ\":\"New Jersey\",\"NM\":\"New Mexico\",\"NY\":\"New York\",\"NC\":\"North Carolina\",\"ND\":\"North Dakota\",\"OH\":\"Ohio\",\"OK\":\"Oklahoma\",\"OR\":\"Oregon\",\"PA\":\"Pennsylvania\",\"RI\":\"Rhode Island\",\"SC\":\"South Carolina\",\"SD\":\"South Dakota\",\"TN\":\"Tennessee\",\"TX\":\"Texas\",\"UT\":\"Utah\",\"VT\":\"Vermont\",\"VA\":\"Virginia\",\"WA\":\"Washington\",\"WV\":\"West Virginia\",\"WI\":\"Wisconsin\",\"WY\":\"Wyoming\",\"AA\":\"Armed Forces (AA)\",\"AE\":\"Armed Forces (AE)\",\"AP\":\"Armed Forces (AP)\"},\"VN\":[],\"YT\":[],\"ZA\":{\"EC\":\"Eastern Cape\",\"FS\":\"Free State\",\"GP\":\"Gauteng\",\"KZN\":\"KwaZulu-Natal\",\"LP\":\"Limpopo\",\"MP\":\"Mpumalanga\",\"NC\":\"Northern Cape\",\"NW\":\"North West\",\"WC\":\"Western Cape\"}}","password_strength":{"min_password_strength":3,"i18n_password_error":"Please enter a stronger password.","i18n_password_hint":"Hint: The password should be at least twelve characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like ! &quot; ? $ % ^ &amp; )."}};
/* ]]> */
</script>
<script type='text/javascript' src='<?php echo home_url(); ?>/wp-content/plugins/easy-login-woocommerce/xoo-form-fields-fw/assets/js/xoo-aff-js.js?ver=1.1' id='xoo-aff-js-js'></script>
<script type='text/javascript' src='<?php echo home_url(); ?>/wp-content/plugins/easy-login-woocommerce/library/smooth-scrollbar/smooth-scrollbar.js?ver=2.1' id='smooth-scrollbar-js'></script>
<script type='text/javascript' id='xoo-el-js-js-extra'>
/* <![CDATA[ */
var xoo_el_localize = {"adminurl":"<?php echo $adminajsl_url; ?>","redirectDelay":"300","html":{"spinner":"<i class=\"fas fa-circle-notch spinner fa-spin\" aria-hidden=\"true\"><\/i>"},"autoOpenPopup":"no","aoDelay":"500"};
/* ]]> */
</script>
<script type='text/javascript' src='<?php echo home_url(); ?>/wp-content/plugins/easy-login-woocommerce/assets/js/xoo-el-js.js?ver=2.1' id='xoo-el-js-js'></script>
<script>
  var modal = document.getElementById("showreg");
  var span = document.getElementsByClassName("close")[0];
  span.onclick = function() {
    modal.style.display = "none";
  }

  
  function getLinkFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
    jQuery('#restt').trigger('click');
  }

  function calcPrice(){
    var boxWidth = jQuery('#boxWidth').val();
    var boxLength = jQuery('#boxLength').val();
    var boxHeight = jQuery('#boxHeight').val();
    var boxQuantity = jQuery('#quilt').val();

    jQuery("#widthbox").val(boxWidth);
    jQuery("#lengthbox").val(boxLength);
    jQuery("#heightbox").val(boxHeight);
    jQuery("#quilty").val(boxQuantity);
    jQuery("#pkgg_width").val(boxWidth);
    jQuery("#pkgg_length").val(boxLength);
    jQuery("#pkgg_height").val(boxHeight);
    jQuery("#printQuantity1").val(boxQuantity);
    jQuery("#printQuantity1").trigger('change');
    console.log("ttt");
    setTimeout(function(){
      var cprice = jQuery('input[name="customprice"]').val();
      console.log(cprice);
      jQuery('#txtprice').val(cprice);
      jQuery('#price').val(cprice);
    },2000);

  }

  function checkoutProduct(){
    console.log("trying checkout");
    $('button[name="add-to-cart"]').trigger('click');
  }
</script>

  <input type="text" id ="allwidth"  style="position: absolute;left:500px;top:50;z-index:30000 ;visibility:hidden; " />
  <input type="text" id ="allheight"  style="position: absolute;left:700px;top:60;z-index:30000;visibility:hidden; " />
  
  <input type="text" id ="faceleft"  style="position: absolute;left:0px;top:30;z-index:30000;visibility:hidden; " value="left"/>
  <input type="text" id ="facetop" style="position: absolute;left:200px;top:30;z-index:30000;visibility:hidden; " value="right"/>
  <br>

  <input type="text" id ="bxw"  style="position: absolute;left:10px;top:30;z-index:30000;visibility:hidden;  "/>
  <br>
  <input type="text" id ="bxh"  style="position: absolute;left:30px;top:50;z-index:30000; visibility:hidden; "/>
  <br>
  <input type="text" id ="bxwin" value="win"  style="position: absolute;left:50px;top:70;z-index:30000;visibility:hidden;  "/>
  <br>
  <input type="text" id ="bxhin" value="wout" style="position: absolute;left:70px;top:90;z-index:30000;visibility:hidden;  "/>
  <br>
  <input type="text" id ="insideleft"  style="position: absolute;left:90px;top:50;z-index:30000;visibility:hidden; " value="inleft"/>
  <input type="text" id ="insidetop" style="position: absolute;left:110px;top:70;z-index:30000;visibility:hidden; " value="right" />

  <input type="text" id ="iff" style="position: absolute;left:110px;top:1;z-index:30000;visibility:hidden; " value="1"/>

<?php
// wp_footer();