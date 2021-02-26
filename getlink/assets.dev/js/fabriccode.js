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

// here import export json






 $("#chek").click(function() {


    ctxInside.loadFromJSON(
      $("#myTextAreain").val(),
      ctxInside.renderAll.bind(ctxInside));
      ctxOutside.loadFromJSON(
        $("#myTextArea").val(),
        ctxOutside.renderAll.bind(ctxOutside));

});














ctxOutside.preserveObjectStacking = true;
ctxInside.preserveObjectStacking = true;


var activeCtx=ctxOutside;


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

  outsideEditor.style.color='red';
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



//here background box   --------------



initializeEditorCanvas = (r=255,g=255,b=255,a=255,clr) => {



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

        
        
       pathOutsideBG.set({ fill: 'rgba(250,250,250,1)',stroke: 'rgba(250,250,250,1)',strokeWidth:4});



      if (isActiveOutside) pathOutsideBG.set({ fill: 'rgba('+r+','+g+','+b+','+a+')' , stroke: 'rgba('+r+','+g+','+b+','+a+')',strokeWidth:4});


      
      $('#boxbg').on ('change input', function ee(){ 
        var col =this.value;
        var rpcol = col.replace('#','0x');
        //var matr = new THREE.MeshBasicMaterial({color:col});


        var bgimge='big.jpg';

      

        
        pathOutsideBG.set({ fill: col , stroke: 'rgba('+r+','+g+','+b+','+a+')',strokeWidth:4});
       // if (isActiveOutside) pathOutsideBG.set({ fill: clr , stroke: 'rgba('+r+','+g+','+b+','+a+')',strokeWidth:4});
        
        //o.material.color.setHex(  rpcol );
               });

              
       
               $('#boxbgimg').click(function(){
                fabric.Image.fromURL('big.jpg',(bgimgg) =>{
                  pathOutsideBG.backgroundImage=bgimgg;
                });

               });

        
       /*
fabric.Image.fromURL('big.jpg',(bgimgg) =>{

  
  pathOutsideBG.set({ backgroundImage:bgimgg ,stroke: 'rgba(250,250,250,1)',strokeWidth:4});

  if (isActiveOutside) pathOutsideBG.set({ backgroundImage: bgimgg,stroke: 'rgba('+r+','+g+','+b+','+a+')',strokeWidth:4});
        

});

*/

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
						  //  pathOutsideGuideArray[face_name].set("fill", 'rgba(21, 90, 145, .3)');
						  //  pathOutsideGuideArray[face_name].set("strokeWidth", 1);
						   // pathOutsideGuideArray[face_name].set("strokeDashArray", [2]);
               // pathInsideGuideArray[face_name].set("fill", 'rgba(21, 90, 145, .3)');
               // pathInsideGuideArray[face_name].set("strokeWidth", 1);
               // pathInsideGuideArray[face_name].set("strokeDashArray", [2]);
						    ctxInside.renderAll();
						    ctxOutside.renderAll();
		            	});
				      });
		     //       pathOutsideGuideArray[face_name].set("stroke", 'rgba(21, 90, 145, 1)');
		       //     pathOutsideGuideArray[face_name].set("fill", 'rgba(255, 255, 255, 0)');
		            pathOutsideGuideArray[face_name].set("strokeWidth", 1);
		            pathOutsideGuideArray[face_name].set("strokeDashArray", [0]);


				      	lastSelectedOutsideFace=pathOutsideGuideArray[face_name];
                // console.log(lastSelectedOutsideFace);
                console.log(face_name);

		            ctxInside.renderAll();
                ctxOutside.renderAll();
                
                console.log(pathOutsideGuideArray[face_name].top);
                console.log(pathOutsideGuideArray[face_name].left);



            $('#facetop').val(pathOutsideGuideArray[face_name].top);
            $('#faceleft').val(pathOutsideGuideArray[face_name].left);

            $('#bxw').val(pathOutsideGuideArray[face_name].width);
            $('#bxh').val(pathOutsideGuideArray[face_name].height);
// here addtext 


var xx;
var yy;





  $('#adtxts').click(function(){


  // mailer out side  box -------

  if( $('#faceleft').val()== 317.2167567567567 && $('#facetop').val()==885.1216216216217){

    addText( 350,50 , 40 )[0];
  
  
  
  }

 
if( $('#faceleft').val()== 312.2351351351351 && $('#facetop').val()==636.0405405405405){

  addText( 350,250 , 40 )[0];



}
if( $('#faceleft').val()== 318.46216216216214 && $('#facetop').val()==511.5){

  addText( 350,425 , 40)[0];

}

if( $('#faceleft').val()== 325.31189189189183 && $('#facetop').val()==259.3054054054054){

  addText( 350,600 ,40 )[0];

}
if( $('#faceleft').val()== 318.46216216216214 && $('#facetop').val()==131.6513513513513){

  addText( 350,800 , 40 )[0];

}



if( $('#faceleft').val()== 710.7648648648649 && $('#facetop').val()==636.0405405405405){

  addText( 100,250 , 40 )[0];

}
if( $('#faceleft').val()== 847.7594594594595 && $('#facetop').val()==636.0405405405405){

  addText( 0,250 , 40 )[0];

}

if( $('#faceleft').val()== 187.69459459459455 && $('#facetop').val()==636.0405405405405){

  addText( 600,250 , 40 )[0];

}
if( $('#faceleft').val()== 53.75124324324318 && $('#facetop').val()==636.0405405405405){

  addText( 800,250 , 40 )[0];

} 

if( $('#faceleft').val()== 698.3108108108108 && $('#facetop').val()==262.41891891891885){

  addText( 125,625 , 40 )[0];

} 

if( $('#faceleft').val()== 262.41891891891885 && $('#facetop').val()==262.41891891891885){

  addText( 600,625 ,40 )[0];

} 


if( $('#faceleft').val()== 704.5378378378379 && $('#facetop').val()==131.6513513513513){

  addText( 125,800 , 40 )[0];

} 

if( $('#faceleft').val()==256.1918918918918 && $('#facetop').val()==131.6513513513513){

  addText( 600,800 , 40 )[0];

} 

// shipping outside box 
if( $('#faceleft').val()==203.06626506024094 && $('#facetop').val()==542.3433734939758){

  addText( 690,430 , 18 )[0];

} 

if( $('#faceleft').val()==203.06626506024094 && $('#facetop').val()==480.6566265060241){


  
  addText( 690,500 , 18 )[0];

} 

if( $('#faceleft').val()==203.06626506024094 && $('#facetop').val()==390.5939759036145){


  
  addText( 690,580 , 18 )[0];

} 
if( $('#faceleft').val()==326.43975903614455 && $('#facetop').val()==542.343373493976){


  
  addText(530,440 , 18 )[0];

} 
if( $('#faceleft').val()==326.43975903614455 && $('#facetop').val()==480.6566265060241){


  
  addText(530,500 , 18 )[0];

} 
if( $('#faceleft').val()==326.43975903614455 && $('#facetop').val()==421.43734939759037){


  
  addText(530,560 , 18 )[0];

}
if( $('#faceleft').val()==511.5 && $('#facetop').val()==542.3433734939758){


  
  addText(380,430 , 18 )[0];

}
if( $('#faceleft').val()==511.5 && $('#facetop').val()==480.6566265060241){


  
  addText(380,500 , 18 )[0];

}
if( $('#faceleft').val()==511.5 && $('#facetop').val()==390.5939759036145){


  
  addText(380,580 , 18 )[0];

}
if( $('#faceleft').val()==634.8734939759037 && $('#facetop').val()==542.343373493976){


  
  addText(230,440 , 18 )[0];

}
if( $('#faceleft').val()==634.8734939759037 && $('#facetop').val()==480.6566265060241){


  
  addText(230,500 , 18 )[0];

}
if( $('#faceleft').val()==634.8734939759037 && $('#facetop').val()==421.43734939759037){


  
  addText(230,570 , 18 )[0];

}

// see box outside box 

if( $('#faceleft').val()==40.334355828220794 && $('#facetop').val()==747.0828220858896){


  
  addText(820,200 , 18 )[0];

}
if( $('#faceleft').val()==40.33435582822082 && $('#facetop').val()==275.9171779141104){


  
  addText(820,500 , 18 )[0];

}

if( $('#faceleft').val()==40.334355828220794 && $('#facetop').val()==138.33680981595086){


  
  addText(820,800 , 18 )[0];

}
if( $('#faceleft').val()==228.8006134969325 && $('#facetop').val()==747.0828220858896){


  
  addText(560,220 , 25 )[0];

}
if( $('#faceleft').val()==228.8006134969325 && $('#facetop').val()==275.9171779141104){


  
  addText(560,520 , 25 )[0];

}

if( $('#faceleft').val()==228.8006134969325 && $('#facetop').val()==185.45337423312878){


  
  addText(560,780 , 25 )[0];

}

if( $('#faceleft').val()==511.5 && $('#facetop').val()==747.0828220858896){


  
  addText(340,200 , 20 )[0];

}
if( $('#faceleft').val()==511.5 && $('#facetop').val()==275.9171779141104){


  
  addText(340,500 , 20 )[0];

}
if( $('#faceleft').val()==511.5 && $('#facetop').val()==138.33680981595086){


  
  addText(340,800 , 20 )[0];

}
if( $('#faceleft').val()==699.9662576687117 && $('#facetop').val()==747.0828220858896){


  
  addText(100,220 , 20 )[0];

}
if( $('#faceleft').val()==699.9662576687117 && $('#facetop').val()==275.9171779141104){


  
  addText(100,500 , 20 )[0];

}

if( $('#faceleft').val()==699.9662576687117 && $('#facetop').val()==185.45337423312878){


  
  addText(100,780 , 20 )[0];

}

// paper box outside box ------

if( $('#faceleft').val()==223.5 && $('#facetop').val()==767.5){


  
  addText(630,235 , 20 )[0];

}
if( $('#faceleft').val()==223.5 && $('#facetop').val()==639.5){


  
  addText(630,300 , 20 )[0];

}
if( $('#faceleft').val()==223.5 && $('#facetop').val()==575.5){


  
  addText(630,400 , 20 )[0];

}
if( $('#faceleft').val()==223.5 && $('#facetop').val()==431.5){


  
  addText(630,570 , 20 )[0];

}
if( $('#faceleft').val()==415.5 && $('#facetop').val()==639.5){


  
  addText(500,350 , 10 )[0];

}
if( $('#faceleft').val()==415.5 && $('#facetop').val()==575.5){


  
  addText(485,400 , 15 )[0];

}
if( $('#faceleft').val()==415.5 && $('#facetop').val()==530.7){


  
  addText(485,450 , 15 )[0];

}
if( $('#faceleft').val()==543.5 && $('#facetop').val()==575.5){


  
  addText(325,400 , 15 )[0];

}
if( $('#faceleft').val()==735.5 && $('#facetop').val()==639.5){


  
  addText(180,350 , 10 )[0];

}

if( $('#faceleft').val()==735.5 && $('#facetop').val()==575.5){


  
  addText(180,400 , 10 )[0];

}

if( $('#faceleft').val()==735.5 && $('#facetop').val()==530.7){


  
  addText(180,460 , 10 )[0];

}

// tear box out side 
if( $('#faceleft').val()==159.5 && $('#facetop').val()==703.5){


  
  addText(740,280 , 15 )[0];

}
if( $('#faceleft').val()==159.5 && $('#facetop').val()==639.5){


  
  addText(740,330 , 15 )[0];

}


if( $('#faceleft').val()==159.5 && $('#facetop').val()==581.9){


  
  addText(740,400 , 15 )[0];

}
if( $('#faceleft').val()==287.5 && $('#facetop').val()==703.5){


  
  addText(580,250 , 15 )[0];

}
if( $('#faceleft').val()==287.5 && $('#facetop').val()==639.5){


  
  addText(580,350 , 15 )[0];

}

if( $('#faceleft').val()==287.5 && $('#facetop').val()==517.9){


  
  addText(580,430 , 15 )[0];

}
if( $('#faceleft').val()==479.5 && $('#facetop').val()==703.5){


  
  addText(420,280 , 15 )[0];

}
if( $('#faceleft').val()==479.5 && $('#facetop').val()==639.5){


  
  addText(420,350, 15 )[0];

}
if( $('#faceleft').val()==479.5 && $('#facetop').val()==581.9){


  
  addText(420,400, 15 )[0];

}
if( $('#faceleft').val()==607.5 && $('#facetop').val()==703.5){


  
  addText(270,250, 15 )[0];

}

if( $('#faceleft').val()==607.5 && $('#facetop').val()==639.5){


  
  addText(270,330, 15 )[0];

}

if( $('#faceleft').val()==607.5 && $('#facetop').val()==511.5){


  
  addText(270,440, 15 )[0];

}

});
 // }
 addText = ( xx , yy , fz ) => {
  let text = new fabric.IText('SET TEXT HERE', {
    left: xx,
    top: yy,
    fill: '#EF4B81',
    fontFamily: 'sans-serif',
    hasRotatingPoint: false,
    centerTransform: true,
    fontSize:fz,
    lockUniScaling: true
  });
  
  activeCtx.add(text);
  
  text.on('scaling', () => {
    this.$scope.$evalAsync();
  });

document.getElementById('faceleft').value=0;
document.getElementById('facetop').value=0;
  
}


  



// outside image began 



$('#mydivv .imgtexture').click(function(){
//alert(pathOutsideGuideArray[face_name].width);

  var po=$(this).attr('src');
var boxw= $('#bxw').val();
var boxh= $('#bxh').val();

  
  // mailer out side  box -------

  if( $('#faceleft').val()== 317.2167567567567 && $('#facetop').val()==885.1216216216217){

    addimg( po, 250,50 , boxw , boxh )[0];
  
  
  
  }

 
if( $('#faceleft').val()== 312.2351351351351 && $('#facetop').val()==636.0405405405405){

  addimg( po, 240,170 , boxw , boxh )[0];



}
if( $('#faceleft').val()== 318.46216216216214 && $('#facetop').val()==511.5){

  addimg( po, 250,418 , boxw , boxh )[0];

}

if( $('#faceleft').val()== 325.31189189189183 && $('#facetop').val()==259.3054054054054){

  addimg( po, 250,540 ,boxw , boxh )[0];

}
if( $('#faceleft').val()== 318.46216216216214 && $('#facetop').val()==131.6513513513513){

  addimg( po, 250,795 , boxw , boxh )[0];

}



if( $('#faceleft').val()== 710.7648648648649 && $('#facetop').val()==636.0405405405405){

  addimg( po, 115,170 , boxw , boxh )[0];

}
if( $('#faceleft').val()== 847.7594594594595 && $('#facetop').val()==636.0405405405405){

  addimg( po, -20,170 , boxw , boxh )[0];

}

if( $('#faceleft').val()== 187.69459459459455 && $('#facetop').val()==636.0405405405405){

  addimg( po, 640,170 , boxw , boxh )[0];

}
if( $('#faceleft').val()== 53.75124324324318 && $('#facetop').val()==636.0405405405405){

  addimg( po, 780,170 , boxw , boxh )[0];

} 

if( $('#faceleft').val()== 698.3108108108108 && $('#facetop').val()==262.41891891891885){

  addimg( po, 195,542 , boxw , boxh )[0];

} 

if( $('#faceleft').val()== 262.41891891891885 && $('#facetop').val()==262.41891891891885){

  addimg( po, 630,542 ,boxw , boxh )[0];

} 


if( $('#faceleft').val()== 704.5378378378379 && $('#facetop').val()==131.6513513513513){

  addimg( po, 185,790 , boxw , boxh )[0];

} 

if( $('#faceleft').val()==256.1918918918918 && $('#facetop').val()==131.6513513513513){

  addimg( po, 635,795 , boxw , boxh )[0];

} 

// shipping outside box 
if( $('#faceleft').val()==203.06626506024094 && $('#facetop').val()==542.3433734939758){

  addimg( po, 630,420 ,boxw , boxh )[0];

} 

if( $('#faceleft').val()==203.06626506024094 && $('#facetop').val()==480.6566265060241){


  
  addimg( po, 630,510 ,boxw , boxh )[0];

} 

if( $('#faceleft').val()==203.06626506024094 && $('#facetop').val()==390.5939759036145){


  
  addimg( po, 630,570 ,boxw , boxh )[0];

} 
if( $('#faceleft').val()==326.43975903614455 && $('#facetop').val()==542.343373493976){


  
  addimg( po,440,450 ,boxw , boxh )[0];

} 
if( $('#faceleft').val()==326.43975903614455 && $('#facetop').val()==480.6566265060241){


  
  addimg( po,440,510 ,boxw , boxh )[0];

} 
if( $('#faceleft').val()==326.43975903614455 && $('#facetop').val()==421.43734939759037){


  
  addimg( po,440,573 ,boxw , boxh )[0];

}
if( $('#faceleft').val()==511.5 && $('#facetop').val()==542.3433734939758){


  
  addimg( po,318,420 ,boxw , boxh )[0];

}
if( $('#faceleft').val()==511.5 && $('#facetop').val()==480.6566265060241){


  
  addimg( po,318,510 ,boxw , boxh )[0];

}
if( $('#faceleft').val()==511.5 && $('#facetop').val()==390.5939759036145){


  
  addimg( po,318,575 ,boxw , boxh )[0];

}
if( $('#faceleft').val()==634.8734939759037 && $('#facetop').val()==542.343373493976){


  
  addimg( po,135,450 ,boxw , boxh )[0];

}
if( $('#faceleft').val()==634.8734939759037 && $('#facetop').val()==480.6566265060241){


  
  addimg( po,135,510 ,boxw , boxh )[0];

}
if( $('#faceleft').val()==634.8734939759037 && $('#facetop').val()==421.43734939759037){


  
  addimg( po,135,570 ,boxw , boxh )[0];

}

// see box outside box 

if( $('#faceleft').val()==40.334355828220794 && $('#facetop').val()==747.0828220858896){


  
  addimg( po,725,170 ,boxw , boxh )[0];

}
if( $('#faceleft').val()==40.33435582822082 && $('#facetop').val()==275.9171779141104){


  
  addimg( po,725,305 ,boxw , boxh )[0];

}

if( $('#faceleft').val()==40.334355828220794 && $('#facetop').val()==138.33680981595086){


  
  addimg( po,725,775 ,boxw , boxh )[0];

}
if( $('#faceleft').val()==228.8006134969325 && $('#facetop').val()==747.0828220858896){


  
  addimg( po,440,215 , boxw , boxh )[0];

}
if( $('#faceleft').val()==228.8006134969325 && $('#facetop').val()==275.9171779141104){


  
  addimg( po,440,305 , boxw , boxh )[0];

}

if( $('#faceleft').val()==228.8006134969325 && $('#facetop').val()==185.45337423312878){


  
  addimg( po,440,780 , boxw , boxh )[0];

}

if( $('#faceleft').val()==511.5 && $('#facetop').val()==747.0828220858896){


  
  addimg( po,250,170 , boxw , boxh )[0];

}
if( $('#faceleft').val()==511.5 && $('#facetop').val()==275.9171779141104){


  
  addimg( po,250,305 , boxw , boxh )[0];

}
if( $('#faceleft').val()==511.5 && $('#facetop').val()==138.33680981595086){


  
  addimg( po,250,780 , boxw , boxh )[0];

}
if( $('#faceleft').val()==699.9662576687117 && $('#facetop').val()==747.0828220858896){


  
  addimg( po,-30,215 , boxw , boxh )[0];

}
if( $('#faceleft').val()==699.9662576687117 && $('#facetop').val()==275.9171779141104){


  
  addimg( po,-30,305 , boxw , boxh )[0];

}

if( $('#faceleft').val()==699.9662576687117 && $('#facetop').val()==185.45337423312878){


  
  addimg( po,-30,780 , boxw , boxh )[0];

}

// paper box outside box ------

if( $('#faceleft').val()==223.5 && $('#facetop').val()==767.5){


  
  addimg( po,538,268 , boxw , boxh )[0];

}
if( $('#faceleft').val()==223.5 && $('#facetop').val()==639.5){


  
  addimg( po,538,285 , boxw , boxh )[0];

}
if( $('#faceleft').val()==223.5 && $('#facetop').val()==575.5){


  
  addimg( po,538,413 , boxw , boxh )[0];

}
if( $('#faceleft').val()==223.5 && $('#facetop').val()==431.5){


  
  addimg( po,538,605 , boxw , boxh )[0];

}
if( $('#faceleft').val()==415.5 && $('#facetop').val()==639.5){


  
  addimg( po,410,368 , boxw , boxh )[0];

}
if( $('#faceleft').val()==415.5 && $('#facetop').val()==575.5){


  
  addimg( po,410,413 , boxw , boxh )[0];

}
if( $('#faceleft').val()==415.5 && $('#facetop').val()==530.7){


  
  addimg( po,410,477 , boxw , boxh )[0];

}
if( $('#faceleft').val()==543.5 && $('#facetop').val()==575.5){


  
  addimg( po,220,413 , boxw , boxh )[0];

}
if( $('#faceleft').val()==735.5 && $('#facetop').val()==639.5){


  
  addimg( po,92,368 , boxw , boxh )[0];

}

if( $('#faceleft').val()==735.5 && $('#facetop').val()==575.5){


  
  addimg( po,92,413 , boxw , boxh )[0];

}

if( $('#faceleft').val()==735.5 && $('#facetop').val()==530.7){


  
  addimg( po,92,477 , boxw , boxh )[0];

}

// tear box out side 
if( $('#faceleft').val()==159.5 && $('#facetop').val()==703.5){


  
  addimg( po,665,292 , boxw , boxh )[0];

}
if( $('#faceleft').val()==159.5 && $('#facetop').val()==639.5){


  
  addimg( po,665,349.6 , boxw , boxh )[0];

}


if( $('#faceleft').val()==159.5 && $('#facetop').val()==581.9){


  
  addimg( po,665,413.6 , boxw , boxh )[0];

}
if( $('#faceleft').val()==287.5 && $('#facetop').val()==703.5){


  
  addimg( po,473,227 , boxw , boxh )[0];

}
if( $('#faceleft').val()==287.5 && $('#facetop').val()==639.5){


  
  addimg( po,473,348.6 , boxw , boxh )[0];

}

if( $('#faceleft').val()==287.5 && $('#facetop').val()==517.9){


  
  addimg( po,473,412.6 , boxw , boxh )[0];

}
if( $('#faceleft').val()==479.5 && $('#facetop').val()==703.5){


  
  addimg( po,343,292 , boxw , boxh )[0];

}
if( $('#faceleft').val()==479.5 && $('#facetop').val()==639.5){


  
  addimg( po,343,349.6, boxw , boxh )[0];

}
if( $('#faceleft').val()==479.5 && $('#facetop').val()==581.9){


  
  addimg( po,343,412.6, boxw , boxh )[0];

}
if( $('#faceleft').val()==607.5 && $('#facetop').val()==703.5){


  
  addimg( po,152,227, boxw , boxh )[0];

}

if( $('#faceleft').val()==607.5 && $('#facetop').val()==639.5){


  
  addimg( po,152,348.6, boxw , boxh )[0];

}

if( $('#faceleft').val()==607.5 && $('#facetop').val()==511.5){


  
  addimg( po,152,412.6, boxw , boxh )[0];

}

});








    
  addimg = (vv,xx , yy , ww , hh ) => { // i use this function instead of above on (addImage) this for outside box
    
    fabric.Image.fromURL(vv, function (imgg) {
    
      imgg.left= xx+70;
      imgg.top= yy-30;
    // imgg.width=100;
    // imgg.height=100;
imgg.scaleX=ww/imgg.width;
imgg.scaleY=hh/imgg.height;

imgg.cornerSize=100;
  imgg.textureSize = 4096;
  imgg.strokeUniform=false;
imgg.getOriginalSize();
imgg.fill='transparent';

     activeCtx.add(imgg);
     
    });
    document.getElementById('faceleft').value=0;
document.getElementById('facetop').value=0;
   
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
	      pathInsideBG.set({ fill: 'rgba(250,250,250,1)',stroke: 'rgba(250,250,250,1)',strokeWidth:4});
        if (isActiveInside) pathInsideBG.set({ fill: clr,stroke: 'rgba('+r+','+g+','+b+','+a+')',strokeWidth:4});
	      pathInsideBG.set({ left: fabric_faces[1]["left"]-2, top: fabric_faces[1]["top"]-2 });
        pathInsideBG.selectable=false;
        





        $('#boxbgin').on ('change input', function ee(){ 
          var col =this.value;
          var rpcol = col.replace('#','0x');
          //var matr = new THREE.MeshBasicMaterial({color:col});
  
  
          var bgimge='big.jpg';
  
        
  
          
          pathOutsideBG.set({ fill: col , stroke: 'rgba('+r+','+g+','+b+','+a+')',strokeWidth:4});
         // if (isActiveOutside) pathOutsideBG.set({ fill: clr , stroke: 'rgba('+r+','+g+','+b+','+a+')',strokeWidth:4});
          
          //o.material.color.setHex(  rpcol );
                 });










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

	            ctxInside.renderAll();
	            ctxOutside.renderAll();





	        }
	      });


	      if (isActiveInside) pathInside.on('mousedown', function(options) {
	        if (options.target) {
	            pathInsideGuideArray[face_name].set("stroke", 'rgba(21, 90, 145, .7)');
	            pathInsideGuideArray[face_name].set("strokeWidth", 5);
	            pathInsideGuideArray[face_name].set("strokeDashArray", [0]);
              ctxInside.renderAll();
              



// began here -----




// began with inside



  $('#insidetop').val( pathInsideGuideArray[face_name].top);
  $('#insideleft').val( pathInsideGuideArray[face_name].left);


  $('#bxwin').val(pathInsideGuideArray[face_name].width);
  $('#bxhin').val(pathInsideGuideArray[face_name].height);


// here addtext 


var xxx;
var yyy;





$('#adtxts').click(function(){


// mailer inside box -------

if( $('#insideleft').val()== 318.46216216216214 && $('#insidetop').val()==131.6513513513513){

addTextt( 350,175 ,0 ,40 )[0];

}
if( $('#insideleft').val()== 325.31189189189183 && $('#insidetop').val()==259.3054054054054){

  addTextt( 350,360 ,0 ,40 )[0];
  
}

if( $('#insideleft').val()== 318.46216216216214 && $('#insidetop').val()==511.5){

    addTextt( 350,550 , 0, 40 )[0];
    
}
 if( $('#insideleft').val()== 312.2351351351351 && $('#insidetop').val()==636.0405405405405){

      addTextt( 350,750 , 0 , 40 )[0];
      
}

 if( $('#insideleft').val()== 317.2167567567567 && $('#insidetop').val()==885.1216216216217){

        addTextt( 350,925,0,40 )[0];
        
}

if( $('#insideleft').val()== 698.3108108108108 && $('#insidetop').val()==262.41891891891885){

          addTextt( 750,225,90,40 )[0];
          
}

if( $('#insideleft').val()== 262.41891891891885 && $('#insidetop').val()==262.41891891891885){

  addTextt( 315,225,90,40 )[0];
  
}


if( $('#insideleft').val()== 704.5378378378379 && $('#insidetop').val()==131.6513513513513){

  addTextt( 750,140,90 , 15 )[0];
  
}

if( $('#insideleft').val()== 256.1918918918918 && $('#insidetop').val()== 131.6513513513513){

  addTextt( 300,140,90 , 15 )[0];
  
}

// shipping inside box 

if( $('#insideleft').val()== 634.8734939759037 && $('#insidetop').val()== 542.343373493976){

  addTextt( 670,440,0 , 15 )[0];
  
}
if( $('#insideleft').val()== 634.8734939759037 && $('#insidetop').val()== 480.6566265060241){

  addTextt( 670,500,0 , 15 )[0];
  
}
if( $('#insideleft').val()== 634.8734939759037 && $('#insidetop').val()== 421.43734939759037){

  addTextt( 670,580,0 , 15 )[0];
  
}
if( $('#insideleft').val()== 511.5 && $('#insidetop').val()== 542.3433734939758){

  addTextt( 515,440,0 , 15 )[0];
  
}
if( $('#insideleft').val()== 511.5 && $('#insidetop').val()== 480.6566265060241){

  addTextt( 515,500,0 , 15 )[0];
  
}
if( $('#insideleft').val()== 511.5 && $('#insidetop').val()== 390.5939759036145){

  addTextt( 515,580,0 , 15 )[0];
  
}
if( $('#insideleft').val()== 326.43975903614455 && $('#insidetop').val()== 542.343373493976){

  addTextt( 370,440,0 , 15 )[0];
  
}
if( $('#insideleft').val()== 326.43975903614455 && $('#insidetop').val()== 480.6566265060241){

  addTextt( 370,500,0 , 15 )[0];
  
}
if( $('#insideleft').val()== 326.43975903614455 && $('#insidetop').val()== 421.43734939759037){

  addTextt( 370,560,0 , 15 )[0];
  
}
if( $('#insideleft').val()== 203.06626506024094 && $('#insidetop').val()== 542.3433734939758){

  addTextt( 210,430,0 , 15 )[0];
  
}
if( $('#insideleft').val()== 203.06626506024094 && $('#insidetop').val()== 480.6566265060241){

  addTextt( 210,500,0 , 15 )[0];
  
}
if( $('#insideleft').val()== 203.06626506024094 && $('#insidetop').val()== 390.5939759036145){

  addTextt( 210,580,0 , 15 )[0];
  
}


// see box inside box 

if( $('#insideleft').val()== 699.9662576687117 && $('#insidetop').val()== 747.0828220858896){

  addTextt( 750,220,0 ,25 )[0];
  
}
if( $('#insideleft').val()== 699.9662576687117 && $('#insidetop').val()== 275.9171779141104){

  addTextt( 750,500,0 ,25 )[0];
  
}
if( $('#insideleft').val()== 699.9662576687117 && $('#insidetop').val()== 185.45337423312878){

  addTextt( 750,780,0 ,25 )[0];
  
}
if( $('#insideleft').val()== 511.5 && $('#insidetop').val()== 747.0828220858896){

  addTextt( 530,200,0 ,20 )[0];
  
}
if( $('#insideleft').val()== 511.5 && $('#insidetop').val()== 275.9171779141104){

  addTextt( 530,500,0 ,20 )[0];
  
}
if( $('#insideleft').val()== 511.5 && $('#insidetop').val()== 138.33680981595086){

  addTextt( 530,800,0 ,20 )[0];
  
}
if( $('#insideleft').val()== 228.8006134969325 && $('#insidetop').val()== 747.0828220858896){

  addTextt( 300,220,0 ,20 )[0];
  
}
if( $('#insideleft').val()== 228.8006134969325 && $('#insidetop').val()== 275.9171779141104){

  addTextt( 300,500,0 ,20 )[0];
  
}
if( $('#insideleft').val()== 228.8006134969325 && $('#insidetop').val()== 185.45337423312878){

  addTextt( 300,780,0 ,20 )[0];
  
}
if( $('#insideleft').val()== 40.334355828220794 && $('#insidetop').val()== 747.0828220858896){

  addTextt( 60,220,0 ,20 )[0];
  
}
if( $('#insideleft').val()== 40.33435582822082 && $('#insidetop').val()== 275.9171779141104){

  addTextt( 60,500,0 ,20 )[0];
  
}

if( $('#insideleft').val()== 40.334355828220794 && $('#insidetop').val()== 138.33680981595086){

  addTextt( 60,800,0 ,20 )[0];
  
}

// paper box insidebox 
if( $('#insideleft').val()== 735.5 && $('#insidetop').val()== 639.5){

  addTextt( 765,350,0 ,10 )[0];
  
}
if( $('#insideleft').val()== 735.5 && $('#insidetop').val()== 575.5){

  addTextt( 765,400,0 ,10 )[0];
  
}
if( $('#insideleft').val()== 735.5 && $('#insidetop').val()== 530.7){

  addTextt( 765,460,0 ,10 )[0];
  
}
if( $('#insideleft').val()== 543.5 && $('#insidetop').val()== 575.5){

  addTextt( 565,400,0 ,20 )[0];
  
}

if( $('#insideleft').val()== 415.5 && $('#insidetop').val()== 639.5){

  addTextt( 440,350,0 ,10 )[0];
  
}

if( $('#insideleft').val()== 415.5 && $('#insidetop').val()== 575.5){

  addTextt( 440,400,0 ,10 )[0];
  
}

if( $('#insideleft').val()== 415.5 && $('#insidetop').val()== 530.7){

  addTextt( 440,450,0 ,10 )[0];
  
}

if( $('#insideleft').val()== 223.5 && $('#insidetop').val()== 767.5){

  addTextt( 280,245,0 ,10 )[0];
  
}

if( $('#insideleft').val()== 223.5 && $('#insidetop').val()== 639.5){

  addTextt( 240,300,0 ,20 )[0];
  
}

if( $('#insideleft').val()== 223.5 && $('#insidetop').val()== 575.5){

  addTextt( 240,400,0 ,20 )[0];
  
}

if( $('#insideleft').val()== 175.5 && $('#insidetop').val()== 575.5){

  addTextt( 150,410,0 ,10 )[0];
  
}

// tear box inside box 
if( $('#insideleft').val()== 607.5 && $('#insidetop').val()== 703.5){

  addTextt( 625,250,0 ,20 )[0];
  
}
if( $('#insideleft').val()== 607.5 && $('#insidetop').val()== 639.5){

  addTextt( 625,335,0 ,20 )[0];
  
}
if( $('#insideleft').val()== 607.5 && $('#insidetop').val()== 511.5){

  addTextt( 625,435,0 ,20 )[0];
  
}
if( $('#insideleft').val()== 479.5 && $('#insidetop').val()== 703.5){

  addTextt( 500,275,0 ,10 )[0];
  
}
if( $('#insideleft').val()== 479.5 && $('#insidetop').val()== 639.5){

  addTextt( 500,350,0 ,10 )[0];
  
}
if( $('#insideleft').val()== 479.5 && $('#insidetop').val()== 581.9){

  addTextt( 500,400,0 ,10 )[0];
  
}
if( $('#insideleft').val()== 287.5 && $('#insidetop').val()== 703.5){

  addTextt( 350,250,0 ,10 )[0];
  
}
if( $('#insideleft').val()== 287.5 && $('#insidetop').val()== 639.5){

  addTextt( 350,350,0 ,10 )[0];
  
}
if( $('#insideleft').val()== 287.5 && $('#insidetop').val()== 517.9){

  addTextt( 350,450,0 ,10 )[0];
  
}
if( $('#insideleft').val()== 159.5 && $('#insidetop').val()== 703.5){

  addTextt( 185,275,0 ,10 )[0];
  
}
if( $('#insideleft').val()== 159.5 && $('#insidetop').val()== 639.5){

  addTextt( 185,350,0 ,10 )[0];
  
}

if( $('#insideleft').val()== 159.5 && $('#insidetop').val()== 581.9){

  addTextt( 185,400,0 ,10 )[0];
  
}

});
// }
addTextt = ( xxx , yyy, vvr , fz) => {
let text = new fabric.IText('SET TEXT HERE', {
left: xxx,
top: yyy,
fill: '#EF4B81',
fontFamily: 'sans-serif',
hasRotatingPoint: false,
centerTransform: true,
angle:vvr,
fontSize:fz,
lockUniScaling: true
});

activeCtx.add(text);

text.on('scaling', () => {
this.$scope.$evalAsync();
});

document.getElementById('insidetop').value=0;
document.getElementById('insideleft').value=0;


// put here addimage inside ---------------------------------------------------


}



  // here ad image ---------------------------------------------------------------------




  $('#mydivv .imgtexture').click(function(){


    var po=$(this).attr('src');

var boxww= $('#bxwin').val();
var boxhh= $('#bxhin').val();

    // mailer inside box -------
    
    if( $('#insideleft').val()== 318.46216216216214 && $('#insidetop').val()==131.6513513513513){
    
  addimgg(po,  320,130 ,boxww, boxhh)[0];
    
    }
    if( $('#insideleft').val()== 325.31189189189183 && $('#insidetop').val()==259.3054054054054){
    
    addimgg(po,  320,258 ,boxww, boxhh)[0];
      
    }
    
    if( $('#insideleft').val()== 318.46216216216214 && $('#insidetop').val()==511.5){
    
      addimgg(po,  320,509 ,boxww, boxhh)[0];
        
    }
     if( $('#insideleft').val()== 312.2351351351351 && $('#insidetop').val()==636.0405405405405){
    
        addimgg(po,  315,633.5 ,boxww, boxhh)[0];
          
    }
    
     if( $('#insideleft').val()== 317.2167567567567 && $('#insidetop').val()==885.1216216216217){
    
          addimgg(po,  320,882.5,boxww, boxhh)[0];
            
    }
    
    if( $('#insideleft').val()== 698.3108108108108 && $('#insidetop').val()==262.41891891891885){
    
            addimgg(po,  700,263,boxww, boxhh)[0];
              
    }
    
    if( $('#insideleft').val()== 262.41891891891885 && $('#insidetop').val()==262.41891891891885){
    
    addimgg(po,  260,263,boxww, boxhh)[0];
      
    }
    
    
    if( $('#insideleft').val()== 704.5378378378379 && $('#insidetop').val()==131.6513513513513){
    
    addimgg(po,  710,130,boxww, boxhh)[0];
      
    }
    
    if( $('#insideleft').val()== 256.1918918918918 && $('#insidetop').val()== 131.6513513513513){
    
    addimgg(po,  255,130,boxww, boxhh)[0];
      
    }
    
    // shipping inside box 
    
    if( $('#insideleft').val()== 634.8734939759037 && $('#insidetop').val()== 542.343373493976){
    
    addimgg(po, 635,420,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 634.8734939759037 && $('#insidetop').val()== 480.6566265060241){
    
    addimgg(po, 635,479,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 634.8734939759037 && $('#insidetop').val()== 421.43734939759037){
    
    addimgg(po, 635,542,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 511.5 && $('#insidetop').val()== 542.3433734939758){
    
    addimgg(po,  510,390,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 511.5 && $('#insidetop').val()== 480.6566265060241){
    
    addimgg(po,  510,480,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 511.5 && $('#insidetop').val()== 390.5939759036145){
    
    addimgg(po,  510,541.6,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 326.43975903614455 && $('#insidetop').val()== 542.343373493976){
    
    addimgg(po,  330,420,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 326.43975903614455 && $('#insidetop').val()== 480.6566265060241){
    
    addimgg(po,  330,479.2,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 326.43975903614455 && $('#insidetop').val()== 421.43734939759037){
    
    addimgg(po,  330,542,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 203.06626506024094 && $('#insidetop').val()== 542.3433734939758){
    
    addimgg(po,  205,390,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 203.06626506024094 && $('#insidetop').val()== 480.6566265060241){
    
    addimgg(po,  200,480.6,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 203.06626506024094 && $('#insidetop').val()== 390.5939759036145){
    
    addimgg(po,  200,541.6,boxww, boxhh)[0];
      
    }
    
    
    // see box inside box 
    
    if( $('#insideleft').val()== 699.9662576687117 && $('#insidetop').val()== 747.0828220858896){
    
    addimgg(po,  700,185,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 699.9662576687117 && $('#insidetop').val()== 275.9171779141104){
    
    addimgg(po,  700,275.4,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 699.9662576687117 && $('#insidetop').val()== 185.45337423312878){
    
    addimgg(po,  700,748.4,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 511.5 && $('#insidetop').val()== 747.0828220858896){
    
    addimgg(po,  510,140,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 511.5 && $('#insidetop').val()== 275.9171779141104){
    
    addimgg(po,  510,277.5,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 511.5 && $('#insidetop').val()== 138.33680981595086){
    
    addimgg(po,  510,748.5,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 228.8006134969325 && $('#insidetop').val()== 747.0828220858896){
    
    addimgg(po,  230,185,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 228.8006134969325 && $('#insidetop').val()== 275.9171779141104){
    
    addimgg(po,  230,275.4,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 228.8006134969325 && $('#insidetop').val()== 185.45337423312878){
    
    addimgg(po,  230,748.4,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 40.334355828220794 && $('#insidetop').val()== 747.0828220858896){
    
    addimgg(po,  40,140,boxww, boxhh)[0];
      
    }
    if( $('#insideleft').val()== 40.33435582822082 && $('#insidetop').val()== 275.9171779141104){
    
    addimgg(po,  40,277.5,boxww, boxhh)[0];
      
    }
    
    if( $('#insideleft').val()== 40.334355828220794 && $('#insidetop').val()== 138.33680981595086){
    
    addimgg(po,  40,748.5,boxww, boxhh)[0];
      
    }
    

// paper box insidebox 
if( $('#insideleft').val()== 735.5 && $('#insidetop').val()== 639.5){

 addimgg(po, 735,340,boxww, boxhh)[0];
  
}
if( $('#insideleft').val()== 735.5 && $('#insidetop').val()== 575.5){

 addimgg(po, 735,384.8,boxww, boxhh)[0];
  
}
if( $('#insideleft').val()== 735.5 && $('#insidetop').val()== 530.7){

 addimgg(po, 735,448.8,boxww, boxhh)[0];
  
}
if( $('#insideleft').val()== 543.5 && $('#insidetop').val()== 575.5){

 addimgg(po, 545,384,boxww, boxhh)[0];
  
}

if( $('#insideleft').val()== 415.5 && $('#insidetop').val()== 639.5){

 addimgg(po, 415,340,boxww, boxhh)[0];
  
}

if( $('#insideleft').val()== 415.5 && $('#insidetop').val()== 575.5){

 addimgg(po, 415,384.8,boxww, boxhh)[0];
  
}

if( $('#insideleft').val()== 415.5 && $('#insidetop').val()== 530.7){

 addimgg(po, 415,448.8,boxww, boxhh)[0];
  
}

if( $('#insideleft').val()== 223.5 && $('#insidetop').val()== 767.5){

 addimgg(po, 225,240,boxww, boxhh)[0];
  
}

if( $('#insideleft').val()== 223.5 && $('#insidetop').val()== 639.5){

 addimgg(po, 225,256,boxww, boxhh)[0];
  
}

if( $('#insideleft').val()== 223.5 && $('#insidetop').val()== 575.5){

 addimgg(po, 225,384,boxww, boxhh)[0];
  
}

if( $('#insideleft').val()== 175.5 && $('#insidetop').val()== 575.5){

 addimgg(po, 150,410,0 ,10 )[0];
  
}

// tear box inside box 
if( $('#insideleft').val()== 607.5 && $('#insidetop').val()== 703.5){

 addimgg(po, 610,192,boxww, boxhh)[0];
  
}
if( $('#insideleft').val()== 607.5 && $('#insidetop').val()== 639.5){

 addimgg(po, 610,313.6,boxww, boxhh)[0];
  
}
if( $('#insideleft').val()== 607.5 && $('#insidetop').val()== 511.5){

 addimgg(po, 610,377.6,boxww, boxhh)[0];
  
}
if( $('#insideleft').val()== 479.5 && $('#insidetop').val()== 703.5){

 addimgg(po, 480,260,boxww, boxhh)[0];
  
}
if( $('#insideleft').val()== 479.5 && $('#insidetop').val()== 639.5){

 addimgg(po, 480,317.6,boxww, boxhh)[0];
  
}
if( $('#insideleft').val()== 479.5 && $('#insidetop').val()== 581.9){

 addimgg(po, 480,375.2,boxww, boxhh)[0];
  
}
if( $('#insideleft').val()== 287.5 && $('#insidetop').val()== 703.5){

 addimgg(po, 290,195,boxww, boxhh)[0];
  
}
if( $('#insideleft').val()== 287.5 && $('#insidetop').val()== 639.5){

 addimgg(po, 290,316.6,boxww, boxhh)[0];
  
}
if( $('#insideleft').val()== 287.5 && $('#insidetop').val()== 517.9){

 addimgg(po, 290,380.6,boxww, boxhh)[0];
  
}
if( $('#insideleft').val()== 159.5 && $('#insidetop').val()== 703.5){

 addimgg(po, 160,262,boxww, boxhh)[0];
  
}
if( $('#insideleft').val()== 159.5 && $('#insidetop').val()== 639.5){

 addimgg(po, 160,319.6,boxww, boxhh)[0];
  
}

if( $('#insideleft').val()== 159.5 && $('#insidetop').val()== 581.9){

 addimgg(po, 160,383.6,boxww, boxhh)[0];
  
}



    });








  addimgg = (vv,xx , yy , wwin , hhin ) => { // i use this function instead of above on (addImage) this for inside box
    
    fabric.Image.fromURL(vv, function (imgg) {
    
      imgg.left= xx;
      imgg.top= yy;
   //  imgg.width=100;
    // imgg.height=100;
    imgg.scaleX=wwin/imgg.width;
    imgg.scaleY=hhin/imgg.height;





imgg.fill='transparent';

     activeCtx.add(imgg);
     
    });

    document.getElementById('insidetop').value=0;
document.getElementById('insideleft').value=0;


document.getElementById('bxwin').value='w';
document.getElementById('bxhin').value='h';



   
    }













// here end of add imageinsid -----------------------------------------







	        }
	      });


	      if (isActiveInside) pathInside.on('mouseout', function(options) {
	        if (options.target) {
	            pathInsideGuideArray[face_name].set("stroke", 'rgba(200, 200, 256, 1)');
	            pathInsideGuideArray[face_name].set("strokeWidth", 1);
	            pathInsideGuideArray[face_name].set("strokeDashArray", [2]);
              ctxInside.renderAll();
              


console.log('this inside');

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
	    repeat: document.getElementById('repeat').value
	  }));
	  shape.set('fill', new fabric.Pattern({
	    source: img,
	    repeat: document.getElementById('repeat').value
	  }));
	  canvas.renderAll();
	});
}


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
