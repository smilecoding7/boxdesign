


var fabriclayout=[];


var targetCameraPosition=[5,5,5];
var newCameraposition=0;

//TOGGLE SWITCH BOX STATE OPEN/CLOSED
var boxStateToggle=1;
var boxStateToggleBtn = document.getElementById("boxState");
boxStateToggleBtn.onclick = function(){
  if (boxStateToggle == 0) {
    boxStateToggle=1;
  } else {
    boxStateToggle=0;
  }
  if(boxStateToggle==0)boxStateTween.set(boxStateTween.getValue(), 0-boxStateTween.getValue(), 2000, "quadInOut", 0);
  if(boxStateToggle==1)boxStateTween.set(boxStateTween.getValue(), 1-boxStateTween.getValue(), 2000, "quadInOut", 0);
  boxStateTween.reset();
}



var boxReady=0;

var boxWidth = document.getElementById("boxWidth");
var boxHeight = document.getElementById("boxHeight");
var boxLength = document.getElementById("boxLength");

var boxWidthUI = document.getElementById("boxWidthValue");
var boxHeightUI = document.getElementById("boxHeightValue");
var boxLengthUI = document.getElementById("boxLengthValue");


boxWidth.oninput = function() {
  boxWidthUI.innerHTML = this.value;
}
boxHeight.oninput = function() {
  boxHeightUI.innerHTML = this.value;
}
boxLength.oninput = function() {
  boxLengthUI.innerHTML = this.value;
}




///the cancvas editor
ctxOutside = new fabric.Canvas('editorCanvasOutside');//, { preserveObjectStacking:true }
ctxInside = new fabric.Canvas('editorCanvasInside');//, { preserveObjectStacking:true }

ctxOutside.preserveObjectStacking = true;
ctxInside.preserveObjectStacking = true;

var activeCtx=ctxOutside;

$("#restt").click(function() {

  var json = activeCtx.toJSON();
  $("#myTextArea").val(JSON.stringify(json));
/*
  var jsonin = ctxInside.toJSON();
  $("#myTextAreain").val(JSON.stringify(jsonin));
*/
 
  $('#endform').css("display","block");
  $('#namebox').val($('#productName').html());
  $('#widthbox').val($('#boxWidthValue').html());
  $('#lengthbox').val($('#boxLengthValue').html());
  $('#heightbox').val($('#boxHeightValue').html());
  $('#price').val($('#txtprice').val());
  $('#quilty').val($('#quilt').val());

  $('#editorCanvasOutside').get(0).toBlob(function(blob){
    saveAs(blob,'outside.png');
    });
    



 });













//TOGGLE SWITCH DESIGN STATE OUTSIDE/INSIDE
var editorStateToggle=0;
var editorStateToggleBtn = document.getElementById("editorState");
editorStateToggleBtn.onclick = function(){
  if (editorStateToggle == 0) {
    editorStateToggle=1;
  } else {
    editorStateToggle=0;
  }
  switchEditorSide(editorStateToggle);
}

function switchEditorSide(){

  var outsideEditor = document.getElementById('editorCanvasOutsideDiv');
  var insideEditor = document.getElementById('editorCanvasInsideDiv');

  if(editorStateToggle==0){
    activeCtx=ctxOutside;
    outsideEditor.style.display='block';
    insideEditor.style.display='none';
  }
  if(editorStateToggle==1){
    activeCtx=ctxInside;
    outsideEditor.style.display='none';
    insideEditor.style.display='block';
  }
  loadEditor();
}



initializeEditorCanvas = (r=255,g=255,b=255,a=255) => {



  var pathOutsideBGArray=[];
  var pathOutsideGuideArray=[];
  var pathOutsideHighlightArray=[];

  var pathInsideBGArray=[];
  var pathInsideGuideArray=[];
  var pathInsideHighlightArray=[];


  ctxOutside.remove(...ctxOutside.getObjects());
  ctxInside.remove(...ctxInside.getObjects());

  var backgroundFillGroupOutside=new fabric.Group();
  var backgroundGuideGroupOutside=new fabric.Group();

  var backgroundFillGroupInside=new fabric.Group();
  var backgroundGuideGroupInside=new fabric.Group();

  Object.entries(window.boxLayout).forEach(fabric_object=>{
    var object_name=fabric_object[0];
    Object.entries(fabric_object[1]).forEach(fabric_faces=>{
      var face_name=fabric_faces[0];

      var isActiveOutside=fabric_faces[1]["isActiveOutside"];
      var isActiveInside=fabric_faces[1]["isActiveInside"];



	      pathOutsideBGArray[face_name] = new fabric.Path(fabric_faces[1]["path"]);
        var pathOutsideBG=pathOutsideBGArray[face_name];
        
        $('#boxbg').on ('change input', function ee(){ 
          var col =this.value;
          var rpcol = col.replace('#','0x');

         pathOutsideBG.set({ fill: col ,strokeWidth:4});

     
                 });
        


                
                  //var canvas = this.__canvas = new fabric.Canvas('c');
                  //fabric.Object.prototype.transparentCorners = false;
          
  
  
           
                  function loadPatternn(url) {
                    fabric.util.loadImage(url, function(img) {
                    
                      pathOutsideBG.set('fill', new fabric.Pattern({
                        source: img,
                       // repeat: document.getElementById('repeat').value
                      }));
                      
                     // pathOutsideBG.renderAll();
                    });
                  }
  
                 // pathOutsideBG.add(text, shape);
                 $('.patreenimg').click(function(){
  
                  var patt=$(this).attr('src');
              
                  loadPatternn(patt);
  
                
                 });
                
                


	      pathOutsideBG.set({ fill: 'rgba(250,250,250,1)',stroke: 'rgba(250,250,250,1)',strokeWidth:4});
	      if (isActiveOutside) pathOutsideBG.set({ fill: 'rgba('+r+','+g+','+b+','+a+')',stroke: 'rgba('+r+','+g+','+b+','+a+')',strokeWidth:4});
      
     
      
      
      
      
        pathOutsideBG.set({ left: fabric_faces[1]["left"]-2, top: fabric_faces[1]["top"]-2 });
	      pathOutsideBG.selectable=false;

	      pathOutsideGuideArray[face_name]= new fabric.Path(fabric_faces[1]["path"]);
	      var pathOutside=pathOutsideGuideArray[face_name];
	      pathOutside.set({ fill: 'rgba(255,255,255,0)',stroke: 'rgba(200,200,256,1)',strokeWidth:1,strokeDashArray: [2]});
	      pathOutside.set({ left: fabric_faces[1]["left"]-.5, top: fabric_faces[1]["top"]-.5 });
	      pathOutside.selectable=false;

	      if (isActiveOutside) pathOutside.on('mousedown', function(options) {
		      if (options.target) {
		          if(packagingo_package_definitions[packageType].outsideRotations[0][fabric_faces[0]]){
		            moveCamera(packagingo_package_definitions[packageType].outsideRotations[0][fabric_faces[0]][0],packagingo_package_definitions[packageType].outsideRotations[0][fabric_faces[0]][1],packagingo_package_definitions[packageType].outsideRotations[0][fabric_faces[0]][2]);
		          }


		            if(packagingo_package_definitions[packageType].outsideRotations[0][fabric_faces[0]][3]=="closed" && document.getElementById('boxState').checked)document.getElementById('boxState').click();
		            if(packagingo_package_definitions[packageType].outsideRotations[0][fabric_faces[0]][3]=="open" && !document.getElementById('boxState').checked)document.getElementById('boxState').click();

					  Object.entries(window.boxLayout).forEach(fabric_object=>{
					    var object_name=fabric_object[0];
					    Object.entries(fabric_object[1]).forEach(fabric_faces=>{
					      var face_name=fabric_faces[0];	
						    pathOutsideGuideArray[face_name].set("fill", 'rgba(21, 90, 145, .3)');
						    pathOutsideGuideArray[face_name].set("strokeWidth", 1);
						    pathOutsideGuideArray[face_name].set("strokeDashArray", [2]);
                pathInsideGuideArray[face_name].set("fill", 'rgba(21, 90, 145, .3)');
                pathInsideGuideArray[face_name].set("strokeWidth", 1);
                pathInsideGuideArray[face_name].set("strokeDashArray", [2]);
						    ctxInside.renderAll();
                ctxOutside.renderAll();
                



                
		            	});
				      });
		            pathOutsideGuideArray[face_name].set("stroke", 'rgba(21, 90, 145, 1)');
		            pathOutsideGuideArray[face_name].set("fill", 'rgba(255, 255, 255, 0)');
		            pathOutsideGuideArray[face_name].set("strokeWidth", 1);
		            pathOutsideGuideArray[face_name].set("strokeDashArray", [0]);


				      	lastSelectedOutsideFace=pathOutsideGuideArray[face_name];
                // console.log(lastSelectedOutsideFace);

                var poo1=$('#editorCanvasOutsideDiv').position();
                var tp=poo1.top;
                var lft=poo1.left;
                var gtx= document.getElementById('editorCanvasOutsideDiv');
                var rect=gtx.getBoundingClientRect();
                var xx=rect.height;
                 var yyy=rect.width;
               
                 



                 
            $('#facetop').val(pathOutsideGuideArray[face_name].top);
            $('#faceleft').val(pathOutsideGuideArray[face_name].left);

            $('#bxw').val(pathOutsideGuideArray[face_name].width);
            $('#bxh').val(pathOutsideGuideArray[face_name].height);
// here addtext 

$('#iff').val(1);






  $('#adtxts').click(function(){

    if($('#iff').val()==1){
  // mailer out side  box -------
  var www= $('#bxw').val();
  var wwint= parseInt(www);
  
  var hhh= $('#bxh').val();
  var hhint= parseInt(hhh);
  var xxx= $('#faceleft').val();
  var xxint= parseInt(xxx);
 var yyy= $('#facetop').val();
 var yyint= parseInt(yyy);


  
  addText(xxint,yyint,wwint,hhint ,wwint )[0];

    }

});
 // }
 addText = ( xx , yy ,ww,hh, fz ) => {
  let text = new fabric.IText('SET TEXT HERE', {
    left: 1024-xx-ww ,
    top: 1024-yy-hh ,
    fill: '#EF4B81',
    fontFamily: 'sans-serif',
    hasRotatingPoint: false,
    centerTransform: true,
    fontSize:fz/8,
    cornerColor: 'black',
   // lockUniScaling: true
  });

/*
addTextt = ( xxx , yyy, vvr , fz)
let textt = new fabric.IText('SET TEXT HERE', {
left: xxx,
top: yyy,
fill: '#EF4B81',
fontFamily: 'sans-serif',
hasRotatingPoint: false,
centerTransform: true,
angle:vvr,
fontSize:fz,

  */
  
  activeCtx.add(text);
  
  text.on('scaling', () => {
    this.$scope.$evalAsync();
  });

  document.getElementById('insidetop').value=0;
  document.getElementById('insideleft').value=0;
  
  
  document.getElementById('bxwin').value=0;
  document.getElementById('bxhin').value=0;
  
  document.getElementById('faceleft').value=0;
  document.getElementById('facetop').value=0;
     
  document.getElementById('bxw').value=0;
  document.getElementById('bxy').value=0;
  
}


  



// outside image began 




$('#mydivv .imgtexture').click(function(){
//alert(pathOutsideGuideArray[face_name].width);
if($('#iff').val()==1){
  var po=$(this).attr('src');
var www= $('#bxw').val();
var wwint= parseInt(www);

var hhh= $('#bxh').val();
var hhint= parseInt(hhh);
var xxx= $('#faceleft').val();
 var xxint= parseInt(xxx);
var yyy= $('#facetop').val();
var yyint= parseInt(yyy);




addimg(po,xxint , yyint , wwint , hhint )[0];
}
  // mailer out side  box -------

});



    
  addimg = (vv,xx , yy , ww , hh ) => { // i use this function instead of above on (addImage) this for outside box
    
    fabric.Image.fromURL(vv, function (imgg) {
    
      imgg.left= 1024-xx-ww ;
      imgg.top= 1024-yy-hh ;
 
imgg.scaleX=ww/imgg.width;
imgg.scaleY=hh/imgg.height;
imgg.cornerColor= 'black';
//imgg.cornerSize=10;

     activeCtx.add(imgg);
     
    });
   document.getElementById('faceleft').value=0;
document.getElementById('facetop').value=0;
   
document.getElementById('bxw').value=0;
document.getElementById('bxy').value=0;
document.getElementById('insidetop').value=0;
document.getElementById('insideleft').value=0;


document.getElementById('bxwin').value=0;
document.getElementById('bxhin').value=0;


}











              

		            ctxInside.renderAll();
                ctxOutside.renderAll();
               
		        }
		      });


	      if (isActiveOutside) pathOutside.on('mouseover', function(options) {
	        if (options.target) {
	            pathOutsideGuideArray[face_name].set("stroke", "rgba(21, 90, 145, .7)");
	            pathOutsideGuideArray[face_name].set("strokeWidth", 5);
	            pathOutsideGuideArray[face_name].set("strokeDashArray", [0]);
	            ctxOutside.renderAll();
	        }
	      });


	      if (isActiveOutside) pathOutside.on('mouseout', function(options) {
	        if (options.target) {
	            pathOutsideGuideArray[face_name].set("stroke", 'rgba(200, 200, 256, 1)');
	            pathOutsideGuideArray[face_name].set("strokeWidth", 1);
	            pathOutsideGuideArray[face_name].set("strokeDashArray", [2]);
	            ctxOutside.renderAll();
	        }
	      });

	      ctxOutside.add(pathOutsideBG);
	      backgroundFillGroupOutside.add(pathOutsideBG);

	      ctxOutside.add(pathOutside);
	      backgroundGuideGroupOutside.add(pathOutside);




	      pathInsideBGArray[face_name] = new fabric.Path(fabric_faces[1]["path"]);
        var pathInsideBG=pathInsideBGArray[face_name];
        


        $('#boxbgin').on ('change input', function ee(){ 
          var col =this.value;
          var rpcol = col.replace('#','0x');

          pathInsideBG.set({ fill: col ,strokeWidth:4});
          
     
                 });

                 function loadPatternnin(url) {
                  fabric.util.loadImage(url, function(img) {
                  
                    pathInsideBG.set('fill', new fabric.Pattern({
                      source: img,
                     // repeat: document.getElementById('repeat').value
                    }));
                    
                   // pathOutsideBG.renderAll();
                  });
                }

               // pathOutsideBG.add(text, shape);
               $('.patreenimg').click(function(){

                var patt=$(this).attr('src');
           
                loadPatternnin(patt);
             

               });



	      pathInsideBG.set({ fill: 'rgba(250,250,250,1)',stroke: 'rgba(250,250,250,1)',strokeWidth:4});
        if (isActiveInside) pathInsideBG.set({ fill: 'rgba('+r+','+g+','+b+','+a+')',stroke: 'rgba('+r+','+g+','+b+','+a+')',strokeWidth:4});
	      pathInsideBG.set({ left: fabric_faces[1]["left"]-2, top: fabric_faces[1]["top"]-2 });
	      pathInsideBG.selectable=false;

	      pathInsideGuideArray[face_name]= new fabric.Path(fabric_faces[1]["path"]);
	      var pathInside=pathInsideGuideArray[face_name];
	      pathInside.set({ fill: 'rgba(255,255,255,0)',stroke: 'rgba(200,200,256,1)',strokeWidth:1,strokeDashArray: [2]});
	      pathInside.set({ left: fabric_faces[1]["left"]-.5, top: fabric_faces[1]["top"]-.5 });
	      pathInside.selectable=false;

	      if (isActiveInside) pathInside.on('mousedown', function(options) {
	      if (options.target) {

  			if(packagingo_package_definitions[packageType].insideRotations[0][fabric_faces[0]]){
  				moveCamera(packagingo_package_definitions[packageType].insideRotations[0][fabric_faces[0]][0],packagingo_package_definitions[packageType].insideRotations[0][fabric_faces[0]][1],packagingo_package_definitions[packageType].insideRotations[0][fabric_faces[0]][2]);
  			}

  			if(packagingo_package_definitions[packageType].insideRotations[0][fabric_faces[0]][3]=="closed" && document.getElementById('boxState').checked)document.getElementById('boxState').click();
  			if(packagingo_package_definitions[packageType].insideRotations[0][fabric_faces[0]][3]=="open" && !document.getElementById('boxState').checked)document.getElementById('boxState').click();




				  Object.entries(window.boxLayout).forEach(fabric_object=>{
				    var object_name=fabric_object[0];
				    Object.entries(fabric_object[1]).forEach(fabric_faces=>{
				      var face_name=fabric_faces[0];	
              pathOutsideGuideArray[face_name].set("fill", 'rgba(21, 90, 145, .3)');
              pathOutsideGuideArray[face_name].set("strokeWidth", 1);
              pathOutsideGuideArray[face_name].set("strokeDashArray", [2]);
					    pathInsideGuideArray[face_name].set("fill", 'rgba(21, 90, 145, .3)');
					    pathInsideGuideArray[face_name].set("strokeWidth", 1);
					    pathInsideGuideArray[face_name].set("strokeDashArray", [2]);
					    ctxInside.renderAll();
					    ctxOutside.renderAll();
	            	});
			      });
	            pathInsideGuideArray[face_name].set("stroke", 'rgba(21, 90, 145, 1)');
	            pathInsideGuideArray[face_name].set("fill", 'rgba(255, 255, 255, 0)');
	            pathInsideGuideArray[face_name].set("strokeWidth", 1);
	            pathInsideGuideArray[face_name].set("strokeDashArray", [0]);

        				lastSelectedInsideFace=pathInsideGuideArray[face_name];
                console.log(face_name);





// began with inside



$('#insidetop').val( pathInsideGuideArray[face_name].top);
$('#insideleft').val( pathInsideGuideArray[face_name].left);


$('#bxwin').val(pathInsideGuideArray[face_name].width);
$('#bxhin').val(pathInsideGuideArray[face_name].height);
$('#iff').val(0);



// here addtext 







$('#adtxts').click(function(){

if($('#iff').val()==0){
var xxx= $('#insideleft').val();
var xxint= parseInt(xxx);
var yyy= $('#insidetop').val();
var yyint= parseInt(yyy);



var www= $('#bxwin').val();
var wwint= parseInt(www);

var hhh= $('#bxhin').val();
var hhint= parseInt(hhh);


if(document.getElementById('productName').innerHTML=="Mailer Box"){
addTextt ( xxint , yyint, wwint , hhint);
}else{
  addTexttt(xxint , yyint, wwint , hhint)
}
}

});
// }
addTextt = ( xx , yy ,ww,hh, fz ) => {
let textt = new fabric.IText('SET TEXT HERE', {
  left: xx ,
  top: yy ,
  fill: '#EF4B81',
  fontFamily: 'sans-serif',
  hasRotatingPoint: false,
  centerTransform: true,
  fontSize:ww/8,
  cornerColor: 'black',
 // lockUniScaling: true
});


activeCtx.add(textt);

textt.on('scaling', () => {
this.$scope.$evalAsync();
});

document.getElementById('insidetop').value=0;
document.getElementById('insideleft').value=0;


document.getElementById('bxwin').value=0;
document.getElementById('bxhin').value=0;

document.getElementById('faceleft').value=0;
document.getElementById('facetop').value=0;
 
document.getElementById('bxw').value=0;
document.getElementById('bxy').value=0;
// put here addimage inside ---------------------------------------------------


}


addTexttt = ( xx , yy ,ww,hh, fz ) => {
  let textt = new fabric.IText('SET TEXT HERE', {
    left: xx ,
    top:1024- yy-hh ,
    fill: '#EF4B81',
    fontFamily: 'sans-serif',
    hasRotatingPoint: false,
    centerTransform: true,
    fontSize:ww/8,
    cornerColor: 'black',
   // lockUniScaling: true
  });
  
  
  activeCtx.add(textt);
  
  textt.on('scaling', () => {
  this.$scope.$evalAsync();
  });
  
  document.getElementById('insidetop').value=0;
  document.getElementById('insideleft').value=0;
  
  
  document.getElementById('bxwin').value=0;
  document.getElementById('bxhin').value=0;
  
  document.getElementById('faceleft').value=0;
  document.getElementById('facetop').value=0;
   
  document.getElementById('bxw').value=0;
  document.getElementById('bxy').value=0;
  // put here addimage inside ---------------------------------------------------
  
  
  }


// here ad image ---------------------------------------------------------------------




$('#mydivv .imgtexture').click(function(){
  if($('#iff').val()==0){

  var po=$(this).attr('src');



  // mailer inside box -------



  var po=$(this).attr('src');
var www= $('#bxwin').val();
var wwint= parseInt(www);

var hhh= $('#bxhin').val();
var hhint= parseInt(hhh);
var xxx= $('#insideleft').val();
var xxint= parseInt(xxx);
var yyy= $('#insidetop').val();
var yyint= parseInt(yyy);



if(document.getElementById('productName').innerHTML=="Mailer Box"){
addimgg(po,xxint , yyint , wwint , hhint )[0];
}else{
  addimggg(po,xxint , yyint , wwint , hhint )[0];
}
  
  }
  });




addimgg = (vv,xx , yy , wwin , hhin ) => { // i use this function instead of above on (addImage) this for inside box
  
  fabric.Image.fromURL(vv, function (imgg) {
  
    imgg.left= xx;
    imgg.top= yy ;

imgg.scaleX=wwin/imgg.width;
imgg.scaleY=hhin/imgg.height;

imgg.cornerColor= 'black',





   activeCtx.add(imgg);
   
  });

  document.getElementById('insidetop').value=0;
document.getElementById('insideleft').value=0;


document.getElementById('bxwin').value=0;
document.getElementById('bxhin').value=0;

document.getElementById('faceleft').value=0;
document.getElementById('facetop').value=0;
 
document.getElementById('bxw').value=0;
document.getElementById('bxy').value=0;

 
  }


  addimggg = (vv,xx , yy , wwin , hhin ) => { // i use this function instead of above on (addImage) this for inside box
  
    fabric.Image.fromURL(vv, function (imgg) {
    
      imgg.left= xx;
      imgg.top=1024 - yy - hhin;
  
  imgg.scaleX=wwin/imgg.width;
  imgg.scaleY=hhin/imgg.height;
  
  imgg.cornerColor= 'black',
  
  
  
  
  
     activeCtx.add(imgg);
     
    });
  
    document.getElementById('insidetop').value=0;
  document.getElementById('insideleft').value=0;
  
  
  document.getElementById('bxwin').value=0;
  document.getElementById('bxhin').value=0;
  
  document.getElementById('faceleft').value=0;
  document.getElementById('facetop').value=0;
   
  document.getElementById('bxw').value=0;
  document.getElementById('bxy').value=0;
  
   
    }










// here end of add imageinsid -----------------------------------------



                

	            ctxInside.renderAll();
	            ctxOutside.renderAll();





	        }
	      });


	      if (isActiveInside) pathInside.on('mouseover', function(options) {
	        if (options.target) {
	            pathInsideGuideArray[face_name].set("stroke", 'rgba(21, 90, 145, .7)');
	            pathInsideGuideArray[face_name].set("strokeWidth", 5);
	            pathInsideGuideArray[face_name].set("strokeDashArray", [0]);
	            ctxInside.renderAll();
	        }
	      });


	      if (isActiveInside) pathInside.on('mouseout', function(options) {
	        if (options.target) {
	            pathInsideGuideArray[face_name].set("stroke", 'rgba(200, 200, 256, 1)');
	            pathInsideGuideArray[face_name].set("strokeWidth", 1);
	            pathInsideGuideArray[face_name].set("strokeDashArray", [2]);
	            ctxInside.renderAll();
	        }
	      });


      ctxInside.add(pathInsideBG);
      backgroundFillGroupInside.add(pathInsideBG);

      ctxInside.add(pathInside);
      backgroundGuideGroupInside.add(pathInside);




    });
  });


	backgroundFillGroupOutside.set('angle', 0);
	backgroundFillGroupOutside.set('top', 0);
	backgroundFillGroupOutside.set('left', 0);

	backgroundGuideGroupOutside.set('angle', 0);
	backgroundGuideGroupOutside.set('top', 0);
	backgroundGuideGroupOutside.set('left', 0);

	backgroundFillGroupInside.set('angle', 0);
	backgroundFillGroupInside.set('top', 0);
	backgroundFillGroupInside.set('left', 0);


	backgroundGuideGroupInside.set('angle', 0);
	backgroundGuideGroupInside.set('top', 0);
	backgroundGuideGroupInside.set('left', 0);


	if(packagingo_package_definitions[packageType].tsymetry=="v"&&packagingo_package_definitions[packageType].trotate=="o"){

		backgroundFillGroupOutside.set('angle', 180);
		backgroundFillGroupOutside.set('top', 1024);
		backgroundFillGroupOutside.set('left', 1024);


		backgroundGuideGroupOutside.set('angle', 180);
		backgroundGuideGroupOutside.set('top', 1024);
		backgroundGuideGroupOutside.set('left', 1024);

	}

	if(packagingo_package_definitions[packageType].tsymetry=="h"&&packagingo_package_definitions[packageType].trotate=="i"){

		backgroundFillGroupInside.set('angle', 180);
		backgroundFillGroupInside.set('top', 1024);
		backgroundFillGroupInside.set('left', 1024);


    backgroundFillGroupInside.set('flipX', 1);
    backgroundFillGroupInside.set('left', 0);


		backgroundGuideGroupInside.set('angle', 180);
		backgroundGuideGroupInside.set('top', 1024);
		backgroundGuideGroupInside.set('left', 1024);

    backgroundGuideGroupInside.set('flipX', 1);
    backgroundGuideGroupInside.set('left', 0);


    backgroundFillGroupOutside.set('angle', 180);
    backgroundFillGroupOutside.set('top', 1024);
    backgroundFillGroupOutside.set('left', 1024);

    backgroundGuideGroupOutside.set('angle', 180);
    backgroundGuideGroupOutside.set('top', 1024);
    backgroundGuideGroupOutside.set('left', 1024);





	}


  backgroundGuideGroupOutside._objects.forEach(highlightobj=>{
    ctxOutside.bringToFront(highlightobj);
  });

  backgroundGuideGroupInside._objects.forEach(highlightobj=>{
    ctxInside.bringToFront(highlightobj);
  });






  var clickOutBoxOutside = new fabric.Rect({
    left: 512,
    top: 512,
    fill: 'rgba(0, 0, 0, 0)',
    width: 1024,
    height: 1024,
    originX: 'center',
    originY: 'center',
    strokeWidth: 0
  });

  var clickOutBoxInside = new fabric.Rect({
    left: 512,
    top: 512,
    fill: 'rgba(0, 0, 0, 0)',
    width: 1024,
    height: 1024,
    originX: 'center',
    originY: 'center',
    strokeWidth: 0
  });

  clickOutBoxOutside.selectable=false;
  clickOutBoxOutside.on('mousedown', function(options) {
	  Object.entries(window.boxLayout).forEach(fabric_object=>{
	    var object_name=fabric_object[0];
	    Object.entries(fabric_object[1]).forEach(fabric_faces=>{
	      var face_name=fabric_faces[0];	
            pathInsideGuideArray[face_name].set("stroke", 'rgba(200, 200, 256, 1)');
            pathInsideGuideArray[face_name].set("fill", 'rgba(255, 255, 255, 0)');
            pathInsideGuideArray[face_name].set("strokeWidth", 1);
            pathInsideGuideArray[face_name].set("strokeDashArray", [2]);

            pathOutsideGuideArray[face_name].set("stroke", 'rgba(200, 200, 256, 1)');
            pathOutsideGuideArray[face_name].set("fill", 'rgba(255, 255, 255, 0)');
            pathOutsideGuideArray[face_name].set("strokeWidth", 1);
            pathOutsideGuideArray[face_name].set("strokeDashArray", [2]);

    	});
      });
	  Object.entries(window.boxLayout).forEach(fabric_object=>{
	    var object_name=fabric_object[0];
	    Object.entries(fabric_object[1]).forEach(fabric_faces=>{
	      var face_name=fabric_faces[0];	
            pathInsideGuideArray[face_name].set("stroke", 'rgba(200, 200, 256, 1)');
            pathInsideGuideArray[face_name].set("fill", 'rgba(255, 255, 255, 0)');
            pathInsideGuideArray[face_name].set("strokeWidth", 1);
            pathInsideGuideArray[face_name].set("strokeDashArray", [2]);

            pathOutsideGuideArray[face_name].set("stroke", 'rgba(200, 200, 256, 1)');
            pathOutsideGuideArray[face_name].set("fill", 'rgba(255, 255, 255, 0)');
            pathOutsideGuideArray[face_name].set("strokeWidth", 1);
            pathOutsideGuideArray[face_name].set("strokeDashArray", [2]);

    	});
      });
  })
  clickOutBoxInside.selectable=false;
  clickOutBoxInside.on('mousedown', function(options) {
	  Object.entries(window.boxLayout).forEach(fabric_object=>{
	    var object_name=fabric_object[0];
	    Object.entries(fabric_object[1]).forEach(fabric_faces=>{
	      var face_name=fabric_faces[0];	
            pathInsideGuideArray[face_name].set("stroke", 'rgba(200, 200, 256, 1)');
            pathInsideGuideArray[face_name].set("fill", 'rgba(255, 255, 255, 0)');
            pathInsideGuideArray[face_name].set("strokeWidth", 1);
            pathInsideGuideArray[face_name].set("strokeDashArray", [2]);

            pathOutsideGuideArray[face_name].set("stroke", 'rgba(200, 200, 256, 1)');
            pathOutsideGuideArray[face_name].set("fill", 'rgba(255, 255, 255, 0)');
            pathOutsideGuideArray[face_name].set("strokeWidth", 1);
            pathOutsideGuideArray[face_name].set("strokeDashArray", [2]);

    	});
      });
	  Object.entries(window.boxLayout).forEach(fabric_object=>{
	    var object_name=fabric_object[0];
	    Object.entries(fabric_object[1]).forEach(fabric_faces=>{
	      var face_name=fabric_faces[0];	
            pathInsideGuideArray[face_name].set("stroke", 'rgba(200, 200, 256, 1)');
            pathInsideGuideArray[face_name].set("fill", 'rgba(255, 255, 255, 0)');
            pathInsideGuideArray[face_name].set("strokeWidth", 1);
            pathInsideGuideArray[face_name].set("strokeDashArray", [2]);

            pathOutsideGuideArray[face_name].set("stroke", 'rgba(200, 200, 256, 1)');
            pathOutsideGuideArray[face_name].set("fill", 'rgba(255, 255, 255, 0)');
            pathOutsideGuideArray[face_name].set("strokeWidth", 1);
            pathOutsideGuideArray[face_name].set("strokeDashArray", [2]);

    	});
      });
  });

  ctxOutside.add(clickOutBoxOutside);
  clickOutBoxOutside.sendToBack();
  ctxOutside.renderAll();

  ctxInside.add(clickOutBoxInside);
  clickOutBoxInside.sendToBack();
  ctxInside.renderAll();



}









  // fabric.Image.fromURL(front, function(img) {
  //   ctxOutside.setBackgroundImage(img);
  //   ctxOutside.renderAll();
  // });

  // fabric.Image.fromURL(back, function(img) {
  //   ctxInside.setBackgroundImage(img);
  //   ctxInside.renderAll();
  // });


function setObjectBackground(type,bg){

}

function loadPattern(url) {
	fabric.util.loadImage(url, function(img) {
	  text.set('fill', new fabric.Pattern({
	    source: img,
	    repeat: 2
	  }));
	  shape.set('fill', new fabric.Pattern({
	    source: img,
	    repeat:2
	  }));
	  canvas.renderAll();
	});
}
loadPattern('hlal.jpg');

function loadEditor(){

  // Define an array with all fonts
  var fonts = ["Times New Roman","Bangers", "Dancing Script", "Roboto", "Open Sans"];

  // Populate the fontFamily select
  var select = document.getElementById("font-family");
  fonts.forEach(function(font) {
    var option = document.createElement('option');
    option.innerHTML = font;
    option.value = font;
    select.appendChild(option);
  });

  document.getElementById('font-family').onchange = function() {
      if (this.value !== 'Times New Roman') {
        loadAndUse(this.value);
      } else {
        activeCtx.getActiveObject().set("fontFamily", this.value);
          obj.set(fontSize,40);
        activeCtx.requestRenderAll();
      }
  };

  function loadAndUse(font) {
    var myfont = new FontFaceObserver(font)
    myfont.load()
      .then(function() {
        // when font is loaded, use it.
        activeCtx.getActiveObject().set("fontFamily", font);

        activeCtx.requestRenderAll();
      }).catch(function(e) {
        console.log(e)
        alert('font loading failed ' + font);
      });
    }
  }


/*

  addText = () => {
    let text = new fabric.IText('SET TEXT HERE', {
      left: activeCtx.width / 2,
      top: activeCtx.height / 2,
      fill: '#EF4B81',
      fontFamily: 'sans-serif',
      hasRotatingPoint: false,
      centerTransform: true,
      originX: 'center',
      originY: 'center',
      lockUniScaling: true
    });
    
    activeCtx.add(text);
    
    text.on('scaling', () => {
      this.$scope.$evalAsync();
    });
  }

*/

  
  addRect = () => {
    activeCtx.add(new fabric.Rect({
      left: activeCtx.width / 2,
      top: activeCtx.height / 2,
      fill: '#EF4B81',
      width: 100,
      height: 100,
      originX: 'center',
      originY: 'center',
      strokeWidth: 0
    }));
  }
  
  addCircle = () => {
    activeCtx.add(new fabric.Circle({
      left: activeCtx.width / 2,
      top: activeCtx.height / 2,
      fill: '#EF4B81',
      radius: 50,
      originX: 'center',
      originY: 'center',
      strokeWidth: 0
    }));
  }
  
  addTriangle = () => {
    activeCtx.add(new fabric.Triangle({
      left: activeCtx.width / 2,
      top: activeCtx.height / 2,
      fill: '#EF4B81',
      width: 100,
      height: 100,
      originX: 'center',
      originY: 'center',
      strokeWidth: 0
    }));
  }
  

  












  
  remove = () => {
    let activeObjects = activeCtx.getActiveObjects();
    activeCtx.discardActiveObject();
    if (activeObjects.length) {
      activeCtx.remove.apply(activeCtx, activeObjects);
    }
  }
  
  getStyle = () => {
   if (this.activeObject != null) {
      if (this.color != null) {
          if (this.color.hex !== this.activeObject.fill.toLowerCase()) {
            this.activeObject.set('fill', this.color.hex);
            activeCtx.requestRenderAll();
          }
      return this.color.style;
      } else {
        return {
          'background-color': this.activeObject.fill,
          'color': this.activeObject.fill
       };
      }
   }
  }

  getFontSize = () => {
    if (!this.activeObject) {
      return 0;
    }
    let size = this.activeObject.fontSize || 0;
    return +(size * this.activeObject.scaleX).toFixed();
  }  

  var setOpacityUI = document.getElementById("editorOpacityValue");
  setOpacity = (val) => {
    activeCtx.getActiveObjects().forEach(obj =>
    {
            obj.set('opacity', val/100);
    }); 
    activeCtx.renderAll();
   setOpacityUI.innerHTML=val;
 }

var setLineWidthUI = document.getElementById("editorsetLineWidthValue");
 setLineWidth= (val) => {
      activeCtx.getActiveObjects().forEach(obj =>
      {
               obj.set("strokeWidth", val);
      }); 
   setLineWidthUI.innerHTML=val;
    activeCtx.renderAll();
}


setStrokeColor = (val) => {
    activeCtx.getActiveObjects().forEach(obj =>
    {
             obj.set("stroke", val);
    }); 

  activeCtx.renderAll();
 }
  setFillColor = (val) => {
    activeCtx.getActiveObjects().forEach(obj =>
    {

        if(obj instanceof fabric.Path)
        {
             obj.set("stroke", val);
        }
        else
        {
             obj.set("fill", val);
        }
    }); 

  activeCtx.renderAll();
 }

bringForward = () => {
  activeCtx.getActiveObjects().forEach(obj =>
  {
    obj.bringForward();
  }); 
  activeCtx.renderAll();
}

bringToFront = () => {
  activeCtx.getActiveObjects().forEach(obj =>
  {
    obj.bringToFront();
  }); 
  activeCtx.renderAll();
}
sendBackwards = () => {
  activeCtx.getActiveObjects().forEach(obj =>
  {
    obj.sendBackwards();
  }); 
  activeCtx.renderAll();
}
sendToBack = () => {
  activeCtx.getActiveObjects().forEach(obj =>
  {
    obj.sendToBack();
  }); 
  activeCtx.renderAll();
}

addImage = () =>{
  fabric.Image.fromURL('./assets/img/logo.png', function(myImg) {
    var img1 = myImg.set({  left: 100, top: 200});//width:150,height:150
    activeCtx.add(img1); 
  });
  activeCtx.renderAll();
}


 

window.onload=(function(){
  var imageURLs=[];  
  // imageURLs.push("./assets/img/uvwhite.jpg");
  imageURLs.push("./assets/img/cardboard.jpg");
  var imgs=[];
  var imagesOK=0;
  startLoadingAllImages(imagesAreNowLoaded);

  function startLoadingAllImages(callback){
    for (var i=0; i<imageURLs.length; i++) {
      var img = new Image();
      imgs.push(img);
      img.onload = function(){ 
        imagesOK++; 
        if (imagesOK>=imageURLs.length ) {
          callback();
        }
      };
      img.onerror=function()
      {} 
      img.src = imageURLs[i];
    }      
  }
  function imagesAreNowLoaded(){
    switchEditorSide(0);
  }
});

document.getElementById("editorCanvasOutsideDiv").addEventListener("wheel", wheelfunction);
document.getElementById("editorCanvasInsideDiv").addEventListener("wheel", wheelfunction);

function wheelfunction(opt) {
  scaleElement1 = document.getElementById("editorCanvasOutsideScale");
  scaleElement2 = document.getElementById("editorCanvasInsideScale");
  var delta = opt.deltaY;
  var zoom = editorZoomValue;
  zoom *= 0.999 ** delta;
  if (zoom > 20) zoom = 20;
  if (zoom < 0.01) zoom = 0.01;
  editorZoomValue=zoom;
  if(!event.shiftKey){
    scaleElement1.style.transform = 'scale('+editorZoomValue+','+editorZoomValue+')';
    scaleElement2.style.transform = 'scale('+editorZoomValue+','+editorZoomValue+')';
    opt.preventDefault();
    opt.stopPropagation();
  }  
}

document.getElementById("editorCanvasInsideDiv").onmousemove = function(){
	if (event.shiftKey) {
		this.scrollLeft=this.scrollLeft-event.movementX;
		this.scrollTop=this.scrollTop-event.movementY;
	} else {
	}
};
document.getElementById("editorCanvasOutsideDiv").onmousemove = function(){
  if (event.shiftKey) {
    this.scrollLeft=this.scrollLeft-event.movementX;
    this.scrollTop=this.scrollTop-event.movementY;
  } else {
  }
};







var drawerStateToggle=0;
document.getElementById("editorDrawerHandle").addEventListener("click", toggleDrawer);
function toggleDrawer(){
  var thisDrawerContainer =document.getElementById("drawerContainer");
  var thisDrawer = document.getElementById("editorDrawer");
  var thisDrawerHandle = document.getElementById("editorDrawerHandle");
  var thisDrawerArrow =document.getElementById("drawerArrow");
  if (drawerStateToggle == 0) {
    thisDrawerContainer.style.bottom = '0px';
    thisDrawerArrow.style.transform = 'rotate(90deg)';
    drawerStateToggle=1;
  } else {
    thisDrawerArrow.style.transform = 'rotate(-90deg)';
    thisDrawerContainer.style.bottom = '-416px';
    drawerStateToggle=0;
  }
}

function updateCost(){
	var thisPriceTag =document.getElementById("priceTag");
	var thisQuantity =document.getElementById("productQuantity");
	thisPriceTag.innerHTML = '$'+((packageSize[0]+packageSize[1]+packageSize[2])*thisQuantity.value)/1000;
}
