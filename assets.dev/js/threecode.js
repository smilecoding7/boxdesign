










import * as THREE from './three/three.module.js';
import { OrbitControls } from './three/OrbitControls.js';
import { GLTFLoader } from './three/GLTFLoader.js';
// import { TransformControls } from './assets/js/three/TransformControls.js';

var ctxOutside = document.querySelector('#editorCanvasOutside').getContext('2d');
var ctxInside = document.querySelector('#editorCanvasInside').getContext('2d');
var textureOutside = new THREE.CanvasTexture(ctxOutside.canvas);
var textureInside = new THREE.CanvasTexture(ctxInside.canvas);



const materialOutside = new THREE.MeshLambertMaterial({
  map: textureOutside,
  side: THREE.FrontSide,
});
const materialInside = new THREE.MeshLambertMaterial({
  map: textureInside,
  side: THREE.BackSide,
});


var controls;
var camera;
//THIESE YOU SAY NEED
ctxOutside.canvas.width = 1024;
ctxOutside.canvas.height = 1024;
ctxInside.canvas.width = 1024;
ctxInside.canvas.height = 1024;


var wpVector = new THREE.Vector3()


var targetCameraPosition=[5,7,-5];
var currentCameraPosition=[15,15,15];
var cameraFOV=(cameraDistanceFactor*35)+35;

var targetCameraFOV=cameraFOV;
var currentCameraFOV=cameraFOV;

var cameraTweenX = new Tween(currentCameraPosition[0], targetCameraPosition[0]-currentCameraPosition[0], 2000, "quadInOut", 0);
var cameraTweenY = new Tween(currentCameraPosition[1], targetCameraPosition[1]-currentCameraPosition[1], 2000, "quadInOut", 0);
var cameraTweenZ = new Tween(currentCameraPosition[2], targetCameraPosition[2]-currentCameraPosition[2], 2000, "quadInOut", 0);
var cameraTweenFOV = new Tween(currentCameraFOV, targetCameraFOV-currentCameraFOV, 2000, "quadInOut", 0);


function main() {
  const canvas = document.querySelector('#displayCanvas');


  const renderer = new THREE.WebGLRenderer({antialias: true,canvas, alpha: true});
  renderer.setSize( window.innerWidth/2, window.innerHeight );



// THIS HAS TO BE DYNAMIC SO THAT I CAN FLIP PER PROPDUCT



  textureOutside.anisotropy = renderer.capabilities.getMaxAnisotropy();
  textureInside.anisotropy = renderer.capabilities.getMaxAnisotropy();


  const fov = cameraFOV;
  const aspect = 1;
  const near = 0.1;
  const far = 512;
  camera = new THREE.PerspectiveCamera(fov, aspect, near, far);





  var xVector = new THREE.Vector3( 1, 0, 0 );
  var yVector = new THREE.Vector3( 0, 1, 0 );
  var zVector = new THREE.Vector3( 0, 0, 1 );

  const scene = new THREE.Scene();


  let urls=[
    'bkg3d/posx.jpg','bkg3d/negx.jpg',
     'bkg3d/posy.jpg','bkg3d/negy.jpg',
 'bkg3d/posz.jpg','bkg3d/negz.jpg'
];

let urlsbrown=[
  'bkg3d/brown/1.png','bkg3d/brown/2.png',
   'bkg3d/brown/3.png','bkg3d/brown/4.png',
'bkg3d/brown/5.png','bkg3d/brown/6.png'
];

let urlspink=[
  'bkg3d/pink/1.png','bkg3d/pink/2.png',
   'bkg3d/pink/3.png','bkg3d/pink/4.png',
'bkg3d/pink/5.png','bkg3d/pink/6.png'
];

let urlblue=[
  'bkg3d/blue/1.png','bkg3d/blue/2.png',
   'bkg3d/blue/3.png','bkg3d/blue/4.png',
'bkg3d/blue/5.png','bkg3d/blue/6.png'
];

let urlgreen=[
  'bkg3d/green/1.png','bkg3d/green/2.png',
   'bkg3d/green/3.png','bkg3d/green/4.png',
'bkg3d/green/5.png','bkg3d/green/6.png'
];

let backk =new THREE.CubeTextureLoader();


$('#hdri').click(function(){


  scene.background=backk.load(urls);

});
$('#brown').click(function(){


  scene.background=backk.load(urlsbrown);

});

$('#pink').click(function(){


  scene.background=backk.load(urlspink);

});
$('#blue').click(function(){


  scene.background=backk.load(urlblue);

});
$('#green').click(function(){


  scene.background=backk.load(urlgreen);

});
  
  $('#capcolr').on ('change input', function ee(){
    
    var col =this.value;
    var rpcol = col.replace('#','0x');
   
    scene.background=new THREE.Color(col);
  
  

    
    
    });
   
    

  controls = new OrbitControls( camera, renderer.domElement );
  controls.enableDamping = true;
  controls.dampingFactor = 0.05;
  controls.maxDistance = 256;
  controls.minDistance =2;


  // var transformcontrol = new TransformControls( camera, renderer.domElement );
  // transformcontrol.addEventListener( 'change', render );
  // transformcontrol.setMode( "scale" );



  camera.position.set( currentCameraPosition[0],currentCameraPosition[1],currentCameraPosition[2]);
  newCameraposition=1;
  scene.add(camera);


  const skyColor = 0xFFFFFE;
  const groundColor = 0x8CB3E7;
  const intensity = .40;
  const light = new THREE.HemisphereLight(skyColor, groundColor, intensity);
  camera.add(light);

  var ambientLight = new THREE.AmbientLight( 0xFFFFFF, .4 ); // soft white light
  camera.add(ambientLight);

  var pointLight = new THREE.PointLight( 0xFFFFFF, .4, 100 ); // soft white light
  pointLight.position.set( -5, 7, 0 );

  camera.add(pointLight);


  function createBox(){

		packagingo_makePackage(packagingo_package_definitions,packageType,packageSize);

	    var positionsComponents = 3;
	    var uvsComponents = 2;
		var boxScale=.01;


		Object.entries(window.vertexData).forEach(three_object=>{
			var object_name=three_object[0];
			Object.entries(three_object[1]).forEach(three_faces=>{
				var faces_name=three_faces[0];
			    var positionsThree = [];
			    var uvsThree = [];
				var geometryOutside = new THREE.BufferGeometry();
			    var geometryInside = new THREE.BufferGeometry();
				var objectname=window.geometryObjects[object_name][faces_name]["face_name"];
				var objectparent=window.geometryObjects[object_name][faces_name]["objectparent"];
				var translation=window.geometryObjects[object_name][faces_name]["translation"];
				var rotation=window.geometryObjects[object_name][faces_name]["rotation"];
		    	Object.entries(three_faces[1]).forEach(three_verts=>{
					positionsThree.push(...three_verts[1].pos);
					uvsThree.push(...three_verts[1].uv);
		    	});

			    geometryOutside.setAttribute(
			      'position',
			      new THREE.BufferAttribute(new Float32Array(positionsThree), positionsComponents));
			    geometryOutside.computeVertexNormals();
			    geometryOutside.setAttribute(
			      'uv',
			      new THREE.BufferAttribute(new Float32Array(uvsThree), uvsComponents));

			    geometryInside.setAttribute(
			      'position',
			      new THREE.BufferAttribute(new Float32Array(positionsThree), positionsComponents));
			    geometryInside.computeVertexNormals();
			    geometryInside.setAttribute(
			      'uv',
			      new THREE.BufferAttribute(new Float32Array(uvsThree), uvsComponents));

			    meshPointers["outside"][objectname] = new THREE.Mesh(geometryOutside, materialOutside);
			    var outsidemesh= meshPointers["outside"][objectname];
			    outsidemesh.name=objectname;

			    outsidemesh.translateOnAxis(xVector,translation[0]);
			    outsidemesh.translateOnAxis(yVector,translation[1]);
			    outsidemesh.translateOnAxis(zVector,translation[2]);
			    outsidemesh.rotateOnAxis(xVector,rotation[0]);
			    outsidemesh.rotateOnAxis(yVector,rotation[1]);
			    outsidemesh.rotateOnAxis(zVector,rotation[2]);

			    if(objectparent=="scene")outsidemesh.scale.set(boxScale,boxScale,boxScale);
				if(objectparent=="scene")scene.add(outsidemesh);
				else meshPointers["outside"][objectparent].add(outsidemesh);

			    meshPointers["inside"][objectname]  = new THREE.Mesh(geometryInside, materialInside);
			    var insidemesh= meshPointers["inside"][objectname] ;
			    insidemesh.name=objectname;

			    insidemesh.translateOnAxis(xVector,translation[0]);
			    insidemesh.translateOnAxis(yVector,translation[1]);
			    insidemesh.translateOnAxis(zVector,translation[2]);
			    insidemesh.rotateOnAxis(xVector,rotation[0]);
			    insidemesh.rotateOnAxis(yVector,rotation[1]);
			    insidemesh.rotateOnAxis(zVector,rotation[2]);

			    if(objectparent=="scene")insidemesh.scale.set(boxScale,boxScale,boxScale);
			    if(objectparent=="scene")scene.add(insidemesh);
				else meshPointers["inside"][objectparent].add(insidemesh);
			});
		});

		// textureOutside.center=tvect;
		// textureOutside.rotation=0;

		// textureInside.wrapS = THREE.RepeatWrapping;

		var tvect = new THREE.Vector3( .5, .5);

		textureInside.repeat.x = 1;
		textureInside.repeat.y = 1;
		textureOutside.repeat.y = 1;
		textureOutside.repeat.x = 1;

		textureInside.center=tvect;
		textureInside.rotation=0;
		textureOutside.center=tvect;
		textureOutside.rotation=0;

		textureInside.wrapS = THREE.RepeatWrapping;
		textureOutside.wrapS = THREE.RepeatWrapping;





		if(packagingo_package_definitions[packageType].tsymetry=="v"&&packagingo_package_definitions[packageType].trotate=="o"){
			textureOutside.center=tvect;
			textureOutside.rotation=Math.PI;

			textureInside.wrapS = THREE.RepeatWrapping;
			textureInside.repeat.x = - 1;			
		}
		if(packagingo_package_definitions[packageType].tsymetry=="h"&&packagingo_package_definitions[packageType].trotate=="i"){
			textureOutside.center=tvect;
			textureOutside.rotation=Math.PI;

      textureInside.center=tvect;
      textureInside.rotation=0

      textureInside.wrapS = THREE.RepeatWrapping;
      textureInside.repeat.x =  1;     
      textureInside.wrapS = THREE.RepeatWrapping;
      textureInside.repeat.y =  -1;     
		}


    boxReady=1;


    initializeEditorCanvas();
	updateCost();


  }


  function disposeBox() {
	boxReady=0;
	scene.remove(meshPointers["inside"]["bottom"]);
	scene.remove(meshPointers["outside"]["bottom"]);
    meshPointers["outside"]["bottom"].geometry.dispose();
    meshPointers["inside"]["bottom"].geometry.dispose();
    meshPointers["outside"]["bottom"]=[]
    meshPointers["inside"]["bottom"]=[]
	window.vertexData=[];
	window.geometryObjects=[];
	window.boxLayout=[];


  }

  createBox();






  const resizeWidth =document.getElementById( 'boxWidth' );
  resizeWidth.onmouseup = function(){
    disposeBox();
    packageSize[0]=this.value*1;
    createBox();

    currentCameraFOV=cameraTweenFOV.getValue();
    targetCameraFOV=(cameraDistanceFactor*35)+35;
	cameraTweenFOV.set(currentCameraFOV, targetCameraFOV-currentCameraFOV, 2000, "quadInOut", 0);
	cameraTweenFOV.reset();
	newCameraposition=1;
  }
  const resizeHeight =document.getElementById( 'boxHeight' );
  resizeHeight.onmouseup = function(){
    disposeBox();
    packageSize[1]=this.value*1;
    createBox();

    currentCameraFOV=cameraTweenFOV.getValue();
    targetCameraFOV=(cameraDistanceFactor*35)+35;
	cameraTweenFOV.set(currentCameraFOV, targetCameraFOV-currentCameraFOV, 2000, "quadInOut", 0);
	cameraTweenFOV.reset();
	newCameraposition=1;
  }
  const resizeLength =document.getElementById( 'boxLength' );
  resizeLength.onmouseup = function(){
    disposeBox();
    packageSize[2]=this.value*1;//what is this bug??
    createBox();

    currentCameraFOV=cameraTweenFOV.getValue();
    targetCameraFOV=(cameraDistanceFactor*35)+35;
	cameraTweenFOV.set(currentCameraFOV, targetCameraFOV-currentCameraFOV, 2000, "quadInOut", 0);
	cameraTweenFOV.reset();
	newCameraposition=1;
  }

  const setBoxType =document.getElementById( 'boxLength' );
  resizeLength.onmouseup = function(){
    disposeBox();
    packageSize[2]=this.value*1;//what is this bug??
    createBox();

    currentCameraFOV=cameraTweenFOV.getValue();
    targetCameraFOV=(cameraDistanceFactor*35)+35;
	cameraTweenFOV.set(currentCameraFOV, targetCameraFOV-currentCameraFOV, 2000, "quadInOut", 0);
	cameraTweenFOV.reset();
	newCameraposition=1;
  }


  	//IN CASE YOU WANT TO MAKE FISICAL BUTTONS FOR EACH BOX (LIKE IN A DIALOGUE) 
	// const changeBox =document.getElementsByClassName( 'changeBox' );
	// for (var i = 0; i < changeBox.length; i++) {
	// 	changeBox[i].addEventListener('click', function() {
	// 		packageType=this.id;
	// 		disposeBox();
	// 		createBox();
	// 	});
	// }



	const changeBoxL =document.getElementById( 'arrowBtnL' );
	const changeBoxR =document.getElementById( 'arrowBtnR' );
	var currentBoxSelection = 0;
	changeBoxL.addEventListener('click', function() {
		if (currentBoxSelection==0)currentBoxSelection=Object.entries(packagingo_package_definitions).length-1;
		else currentBoxSelection--;
		var displayName=Object.entries(packagingo_package_definitions)[currentBoxSelection][1].dispayName;
		var objectName=Object.entries(packagingo_package_definitions)[currentBoxSelection][0];
		packageType=objectName;
		disposeBox();
		createBox();

		targetCameraPosition=[5,7,-5];
		currentCameraPosition=[15,15,15];

		cameraTweenX.set(currentCameraPosition[0], targetCameraPosition[0]-currentCameraPosition[0], 2000, "quadInOut", 0);
		cameraTweenY.set(currentCameraPosition[1], targetCameraPosition[1]-currentCameraPosition[1], 2000, "quadInOut", 0);
		cameraTweenZ.set(currentCameraPosition[2], targetCameraPosition[2]-currentCameraPosition[2], 2000, "quadInOut", 0);

		cameraTweenX.reset();
		cameraTweenY.reset();
		cameraTweenZ.reset();
		newCameraposition=1;

		var productName = document.getElementById("productName");
		productName.innerHTML = displayName;
	});


 





	changeBoxR.addEventListener('click', function() {
		if (currentBoxSelection==Object.entries(packagingo_package_definitions).length-1)currentBoxSelection=0;
		else currentBoxSelection++;
		var displayName=Object.entries(packagingo_package_definitions)[currentBoxSelection][1].dispayName;
		var objectName=Object.entries(packagingo_package_definitions)[currentBoxSelection][0];
		packageType=objectName;
		disposeBox();
		createBox();

		targetCameraPosition=[5,7,-5];
		currentCameraPosition=[15,15,15];

//iamhere
		// targetCameraFOV

		cameraTweenX.set(currentCameraPosition[0], targetCameraPosition[0]-currentCameraPosition[0], 2000, "quadInOut", 0);
		cameraTweenY.set(currentCameraPosition[1], targetCameraPosition[1]-currentCameraPosition[1], 2000, "quadInOut", 0);
		cameraTweenZ.set(currentCameraPosition[2], targetCameraPosition[2]-currentCameraPosition[2], 2000, "quadInOut", 0);

		cameraTweenX.reset();
		cameraTweenY.reset();
		cameraTweenZ.reset();
		newCameraposition=1;

		var productName = document.getElementById("productName");
		productName.innerHTML = displayName;
	});


 const yyss = document.getElementById( 'yyess' );

	yyss.addEventListener('click', function() {
    var displayName=Object.entries(packagingo_package_definitions)[currentBoxSelection][1].dispayName;
		var objectName=Object.entries(packagingo_package_definitions)[currentBoxSelection][0];
		packageType=objectName;
		disposeBox();
		createBox();

		targetCameraPosition=[5,7,-5];
		currentCameraPosition=[15,15,15];

		cameraTweenX.set(currentCameraPosition[0], targetCameraPosition[0]-currentCameraPosition[0], 2000, "quadInOut", 0);
		cameraTweenY.set(currentCameraPosition[1], targetCameraPosition[1]-currentCameraPosition[1], 2000, "quadInOut", 0);
		cameraTweenZ.set(currentCameraPosition[2], targetCameraPosition[2]-currentCameraPosition[2], 2000, "quadInOut", 0);

		cameraTweenX.reset();
		cameraTweenY.reset();
		cameraTweenZ.reset();
		newCameraposition=1;

		var productName = document.getElementById("productName");
		productName.innerHTML = displayName;
  });



  function onWindowResize() {

    camera.aspect = window.innerWidth/2 / window.innerHeight;
    camera.updateProjectionMatrix();

    renderer.setSize( window.innerWidth/2, window.innerHeight );

  }
  window.addEventListener( 'resize', onWindowResize, false );
  onWindowResize();



  Number.prototype.remapValue = function (in_min, in_max, out_min, out_max) {
    return (this - in_min) * (out_max - out_min) / (in_max - in_min) + out_min;
  }


  function render(time) {


    if (boxReady) { //because things have not loaded yet

      //ANIMATE THE BOX
      //LID ANIMATION FIRST THE FLAP THEN THE LID
      Object.entries(packagingo_package_definitions[packageType].animations[0]).forEach(state=>{

        Object.entries(state[1]).forEach(animations=>{


          Object.entries(animations[1]).forEach(object=>{

            var objectname=object[0];

            var animaitonValue;
            var ts;
            var te;

            if(state[0]=="open"){
              openvalue=Object.values(animations)[1][objectname][0].rotation;
              ts=Object.values(animations)[1][objectname][0].ts;
              te=Object.values(animations)[1][objectname][0].te;
              animaitonValue=boxStateTween.getValue().remapValue(ts,te,0,1);
            }
            if(state[0]=="closed"){
              closedvalue=Object.values(animations)[1][objectname][0].rotation;
              ts=Object.values(animations)[1][objectname][0].ts;
              te=Object.values(animations)[1][objectname][0].te;
              animaitonValue=boxStateTween.getValue().remapValue(ts,te,0,1);
            }
            if(animaitonValue>1)animaitonValue=1;
            if(animaitonValue<0)animaitonValue=0;

            meshPointers["outside"][objectname].rotation.x=closedvalue-(openvalue*animaitonValue);
            meshPointers["inside"][objectname].rotation.x=closedvalue-(openvalue*animaitonValue);

          });
        });
      });


      if(newCameraposition){

        currentCameraPosition[0]=cameraTweenX.getValue();
        currentCameraPosition[1]=cameraTweenY.getValue();
        currentCameraPosition[2]=cameraTweenZ.getValue();
        currentCameraFOV=cameraTweenFOV.getValue();

        camera.position.set(currentCameraPosition[0],currentCameraPosition[1],currentCameraPosition[2]);
        camera.fov=currentCameraFOV;
		camera.updateProjectionMatrix();


		var isdoneFOV=Math.abs(cameraTweenFOV.getValue()-targetCameraFOV)*100;
		var isdoneCamX=Math.abs(cameraTweenX.getValue()-targetCameraPosition[0])*100;
		var isdoneCamY=Math.abs(cameraTweenY.getValue()-targetCameraPosition[1])*100;
		var isdoneCamZ=Math.abs(cameraTweenZ.getValue()-targetCameraPosition[2])*100;

        newCameraposition=Math.floor(isdoneFOV+isdoneCamX+isdoneCamY+isdoneCamZ);

      } else {
          var cameraOrbitPosition=camera.getWorldPosition(wpVector);
          // var cameraFOVPosition=camera.getWorldPosition(wpVector);
          currentCameraPosition[0]=cameraOrbitPosition.x;
          currentCameraPosition[1]=cameraOrbitPosition.y;
          currentCameraPosition[2]=cameraOrbitPosition.z;
          // currentCameraFOV=cameraFOVPosition;
      }

    }


    textureOutside.needsUpdate = true;
    textureInside.needsUpdate = true;
    controls.update();
    renderer.render(scene, camera);
    requestAnimationFrame(render);
  }
  requestAnimationFrame(render);
}

main();



///THIS IS HOW TO ROTATE THE CAMERA
window.moveCamera = function (x,y,z) { 


  newCameraposition=1; 
  
  targetCameraPosition=[x,y,z];
  cameraTweenX.set(currentCameraPosition[0], targetCameraPosition[0]-currentCameraPosition[0], 2000, "quadInOut", 0);
  cameraTweenX.reset();
  cameraTweenY.set(currentCameraPosition[1], targetCameraPosition[1]-currentCameraPosition[1], 2000, "quadInOut", 0);
  cameraTweenY.reset();
  cameraTweenZ.set(currentCameraPosition[2], targetCameraPosition[2]-currentCameraPosition[2], 2000, "quadInOut", 0);
  cameraTweenZ.reset();   
  cameraTweenFOV.set(currentCameraFOV, targetCameraFOV-currentCameraFOV, 2000, "quadInOut", 0);
  cameraTweenFOV.reset();
  controls.update();
}

