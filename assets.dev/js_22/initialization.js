


var editorZoomValue=.6;

var meshPointers=["outside","inside"];
var boxStateTween = new Tween(0, 1, 2000, "quadInOut", 0);

var openvalue=0;
var closedvalue=0;

meshPointers["outside"]=[];
meshPointers["inside"]=[];

var cameraDistanceFactor=1;

const packagingo_textureSize=[1024,1024];
var packageSize=[300,100,200];
var packageType="mailer_box";

var lastSelectedInsideFace={};
var lastSelectedOutsideFace={};


window.packagingo_package_definitions={
	"mailer_box":{
		"dispayName":"Mailer Box",
		"tsymetry":"h",
		"trotate":"i",
		"min_width":50,
		"min_height":50,
		"min_length":50,
		"max_width":500,
		"max_height":500,
		"max_length":500,
		"default_width":400,
		"default_height":100,
		"default_length":300,
		"max_unfolded_width":2500,
		"max_unfolded_height":2500,
		"edge_width":10,
		"flap_length":60,
		"flap_offset":10,
		"tolerance":1,
		"animations":[{
			"open":[
				{"top":[{"axis":"x","rotation":-(2*Math.PI/3),"ts":0,"te":.5}]},
				{"front":[{"axis":"x","rotation":-(2*Math.PI/3),"ts":.5,"te":1}]}
			],
			"closed":[
				{"top":[{"axis":"x","rotation":-Math.PI/2,"ts":.5,"te":1}]},
				{"front":[{"axis":"x","rotation":-Math.PI/2,"ts":0,"te":.5}]}
			]
		}],
		"outsideRotations":[{
			"top":[1,5,-1,"closed"],
			"left":[-5,1,1,"closed"],
			"right":[5,1,-1,"closed"],
			"back":[1,-1,5,"closed"],
			"front":[-1,1,-5,"closed"],
			"bottom":[1,-5,-1,"closed"],
			"base_front":[-1,1,-5,"open"],
			"right_flap":[-2,5,1,"open"],
			"left_flap":[2,5,-1,"open"],
			"top_left_flap":[-5,3,1,"open"],
			"top_right_flap":[5,3,-1,"open"],
			"front_left_flap":[-5,5,2,"open"],
			"front_right_flap":[5,5,-2,"open"],
      "left_edge":[-2,5,1,"closed"],
      "right_edge":[2,5,-1,"closed"],
		}],
		"insideRotations":[{
			"top":[1,5,-5,"open"],
			"back":[-1,3,-5,"open"],
			"front":[1,6,-6,"open"],
			"bottom":[-1,5,-1,"open"],
			"base_front":[-1,6,4,"open"],
			"top_left_flap":[-5,3,-1,"open"],
			"top_right_flap":[5,3,-1,"open"],
			"front_left_flap":[-5,5,1,"open"],
			"front_right_flap":[5,5,1,"open"],
		}],
	},
	"shipping_box":{
		"dispayName":"Shipping Box",
		"tsymetry":"h",
		"trotate":"i",
		"min_width":50,
		"min_height":50,
		"min_length":50,
		"max_width":500,
		"max_height":500,
		"max_length":500,
		"default_width":400,
		"default_height":100,
		"default_length":300,
		"max_unfolded_width":2500,
		"max_unfolded_height":2500,
		"edge_width":0,
		"flap_length":30,
		"flap_offset":4,
		"tolerance":1,
		"animations":[{
			"open":[
				{"front_lid":[{"axis":"x","rotation":2*Math.PI/3,"ts":.7,"te":1}]},
				{"back_lid":[{"axis":"x","rotation":2*Math.PI/3,"ts":.5,"te":.7}]},
				{"left_lid":[{"axis":"x","rotation":2*Math.PI/3,"ts":.2,"te":.5}]},
				{"right_lid":[{"axis":"x","rotation":2*Math.PI/3,"ts":0,"te":.2}]}
			],
			"closed":[
				{"front_lid":[{"axis":"x","rotation":Math.PI/2,"ts":0,"te":.2}]},
				{"back_lid":[{"axis":"x","rotation":Math.PI/2,"ts":.2,"te":.5}]},
				{"left_lid":[{"axis":"x","rotation":Math.PI/2,"ts":.5,"te":.7}]},
				{"right_lid":[{"axis":"x","rotation":Math.PI/2,"ts":.7,"te":1}]}
			]
		}],
		"outsideRotations":[{
		"left":[-5,1,1,"closed"],
		"right":[5,1,-1,"closed"],
		"back":[-1,-1,5,"closed"],
		"front":[1,1,-5,"closed"],
		"front_lid":[0,2,-5,"open"],
		"back_lid":[0,2,5,"open"],
		"left_lid":[-5,2,0,"open"],
		"right_lid":[5,2,0,"open"],
		"left_bottom":[-3,-5,1,"open"],
		"right_bottom":[3,-5,-1,"open"],
		"back_bottom":[1,-5,3,"open"],
		"front_bottom":[-1,-5,-3,"open"],
		}],
		"insideRotations":[{
		"left":[5,5,-1,"open"],
		"right":[-5,5,1,"open"],
		"back":[0,5,-5,"open"],
		"front":[0,5,5,"open"],
		"front_lid":[0,6,5,"open"],
		"back_lid":[0,3,-5,"open"],
		"left_lid":[5,3,0,"open"],
		"right_lid":[-5,3,0,"open"],
		"left_bottom":[3,5,-1,"open"],
		"right_bottom":[-3,5,-1,"open"],
		"back_bottom":[0,5,-3,"open"],
		"front_bottom":[0,5,3,"open"],
		"glue_flap":[0,4,-4,"open"],
		}],
	},
	


// here new 
"Rigid Box":{
	"dispayName":"Rigid Box",
	"tsymetry":"h",
	"trotate":"i",
	"min_width":50,
	"min_height":4000,
	"min_length":50,
	"max_width":500,
	"max_height":500,
	"max_length":500,
	"default_width":500,
	"default_height":1000,
	"default_length":500,
	"max_unfolded_width":2500,
	"max_unfolded_height":2500,
	"edge_width":0,
	"flap_length":30,
	"flap_offset":4,
	"tolerance":1,
	"animations":[{
		"open":[
			{"front_lid":[{"axis":"x","rotation":2*Math.PI/3,"ts":.7,"te":1}]},
			{"back_lid":[{"axis":"x","rotation":2*Math.PI/3,"ts":.5,"te":.7}]},
			{"left_lid":[{"axis":"x","rotation":2*Math.PI/3,"ts":.2,"te":.5}]},
			{"right_lid":[{"axis":"x","rotation":2*Math.PI/3,"ts":0,"te":.2}]}
		],
		"closed":[
			{"front_lid":[{"axis":"x","rotation":Math.PI/2,"ts":0,"te":.2}]},
			{"back_lid":[{"axis":"x","rotation":Math.PI/2,"ts":.2,"te":.5}]},
			{"left_lid":[{"axis":"x","rotation":Math.PI/2,"ts":.5,"te":.7}]},
			{"right_lid":[{"axis":"x","rotation":Math.PI/2,"ts":.7,"te":1}]}
		]
	}],
	"outsideRotations":[{
	"left":[-15,1,1,"closed"],
	"right":[15,1,-1,"closed"],
	"back":[-10,-1,5,"closed"],
	"front":[10,1,-5,"closed"],
	"front_lid":[3,2,-5,"open"],
	"back_lid":[3,2,5,"open"],
	"left_lid":[-15,2,0,"open"],
	"right_lid":[15,2,0,"open"],
	"left_bottom":[-6,-5,1,"open"],
	"right_bottom":[6,-5,-1,"open"],
	"back_bottom":[10,-5,3,"open"],
	"front_bottom":[-10,-5,-3,"open"],
	}],
	"insideRotations":[{
	"left":[5,5,-1,"open"],
	"right":[-5,5,1,"open"],
	"back":[0,5,-5,"open"],
	"front":[0,5,5,"open"],
	"front_lid":[0,6,5,"open"],
	"back_lid":[0,3,-5,"open"],
	"left_lid":[5,3,0,"open"],
	"right_lid":[-5,3,0,"open"],
	"left_bottom":[3,5,-1,"open"],
	"right_bottom":[-3,5,-1,"open"],
	"back_bottom":[0,5,-3,"open"],
	"front_bottom":[0,5,3,"open"],
	"glue_flap":[0,4,-4,"open"],
	}],
	
},
"cake_box":{
	"dispayName":"Paper Box",
	"tsymetry":"v",
	"trotate":"o",
	"min_width":50,
	"min_height":50,
	"min_length":50,
	"max_width":500,
	"max_height":500,
	"max_length":500,
	"default_width":300,
	"default_height":300,
	"default_length":300,
	"max_unfolded_width":2500,
	"max_unfolded_height":2500,
	"edge_width":30,
	"flap_length":30,
	"flap_offset":30,
	"tolerance":1,
	"animations":[{
		"open":[

			{"top":[{"axis":"x","rotation":2*Math.PI/3,"ts":.0,"te":.5}]},
			{"dustflap_3":[{"axis":"x","rotation":2*Math.PI/3,"ts":.5,"te":.7}]},
			{"dustflap_1":[{"axis":"x","rotation":2*Math.PI/3,"ts":.5,"te":.7}]},				
		],
		"closed":[

			{"top":[{"axis":"x","rotation":Math.PI/2,"ts":.0,"te":.5}]},
			{"dustflap_3":[{"axis":"x","rotation":Math.PI/2,"ts":.5,"te":.7}]},
			{"dustflap_1":[{"axis":"x","rotation":Math.PI/2,"ts":.5,"te":.7}]},
		]
	}],
	"outsideRotations":[{
		"base":[1,-15,-1,"closed"],
		"back":[-5,1,1,"closed"],
		"right":[5,1,-1,"closed"],
		"front":[1,-1,5,"closed"],
		"left":[-1,1,-5,"closed"],
		"bot_tuck":[1,-5,-1,"closed"],
		"dustflap_2":[1,-5,-1,"closed"],
		"top":[1,-5,-1,"closed"],
		"top_tuck":[1,-5,-1,"closed"],
		"dustflap_3":[1,-5,-1,"closed"],
		"dustflap_4":[1,-5,-1,"closed"],
		"dustflap_1":[1,-5,-1,"closed"],
		"hidden":[1,-5,-1,"closed"],

	}],
	"insideRotations":[{
		"base":[1,-15,-1,"open"],
		"back":[-5,1,1,"open"],
		"right":[5,1,-1,"open"],
		"front":[1,-1,5,"open"],
		"left":[-1,1,-5,"open"],
		"bot_tuck":[1,-5,-1,"open"],
		"dustflap_2":[1,-5,-1,"open"],
		"top":[1,-5,-1,"open"],
		"top_tuck":[1,-5,-1,"open"],
		"dustflap_3":[1,-5,-1,"open"],
		"dustflap_4":[1,-5,-1,"open"],
		"dustflap_1":[1,-5,-1,"open"],
		"hidden":[1,-5,-1,"open"],

	}],
},
"tear_box":{
	"dispayName":"Tear Box",
	"tsymetry":"h",
	"trotate":"i",
	"min_width":50,
	"min_height":50,
	"min_length":50,
	"max_width":500,
	"max_height":500,
	"max_length":500,
	"default_width":300,
	"default_height":300,
	"default_length":300,
	"max_unfolded_width":2500,
	"max_unfolded_height":2500,
	"edge_width":0,
	"flap_length":0,
	"flap_offset":10,
	"tolerance":1,
	"animations":[{
		"open":[
			{"top":[{"axis":"x","rotation":2*Math.PI/3,"ts":.0,"te":.5}]},
			{"back_t":[{"axis":"x","rotation":2*Math.PI/3,"ts":.3,"te":.5}]},
			{"right_t":[{"axis":"x","rotation":2*Math.PI/3,"ts":.5,"te":.7}]},
			{"left_t":[{"axis":"x","rotation":2*Math.PI/3,"ts":.5,"te":.7}]},
			
							
		],
		"closed":[
			{"top":[{"axis":"x","rotation":Math.PI/2,"ts":.0,"te":.5}]},
			{"back_t":[{"axis":"x","rotation":Math.PI/2,"ts":.3,"te":.5}]},
			{"right_t":[{"axis":"x","rotation":Math.PI/2,"ts":.5,"te":.7}]},
			{"left_t":[{"axis":"x","rotation":Math.PI/2,"ts":.5,"te":.7}]},
			
			
		]
	}],
	"outsideRotations":[{
		"top":[5,10,5,"closed"],
		"bottom":[5,-15,5,"closed"],
		"front":[10,0,0,"closed"],
		"right":[0,10,0,"closed"],
		"right_t":[0,10,0,"closed"],
		"right_b":[0,-15,0,"closed"],
		"back":[-10,0,0,"closed"],
		"back_t":[0,10,0,"closed"],
		"back_b":[0,-15,0,"closed"],
		"left":[0,0,10,"closed"],
		"left_t":[0,10,0,"closed"],
		"left_b":[0,-15,0,"closed"],
		"front_lid":[0,0,10,"closed"],
		
		
	}],
	"insideRotations":[{
		"top":[0,0,0,"open"],
		"bottom":[0,0,0,"open"],
		"front":[0,0,0,"open"],
		"right":[0,0,0,"open"],
		"right_t":[0,0,0,"open"],
		"right_b":[0,0,0,"open"],
		"back":[0,0,0,"open"],
		"back_t":[0,0,0,"open"],
		"back_b":[0,0,0,"open"],
		"left":[0,0,0,"open"],
		"left_t":[0,0,0,"open"],
		"left_b":[0,0,0,"open"],
		"front_lid":[0,0,0,"open"],
	}],
},



}
//FUNCTION TO MAKE BOX INTO DATA_OBJECT WITH INPUT SIZES


window.vertexData;
window.geometryObjects;
window.boxLayout;


function packagingo_makePackage(package_definitions,package_type,package_size){




	//GET VOLUME AND DETERMINE CAMERADISTANCE
	var boxVolume=package_size[0]*package_size[1]*package_size[2]*0.0000001;
	cameraDistanceFactor=Math.cbrt(boxVolume);
	cameraFOV=(cameraDistanceFactor*35)+35;

  	//ALWAYS RETURN A BOX AND AN ERROR IF THERE IS ONE
  	var error=[];//NONE
	//CHECK IF THE PACKAGE EXISTS
	if(package_definitions[package_type]===undefined){
		error.push([0,"package_type"]);		
		package_type="mailer_box";
	}
  	//CREATE THE DATA FOR THE BOX
	var definition=package_definitions[package_type];
  	var x=package_size[0];
  	var y=package_size[1];
  	var z=package_size[2];
  	var half_x=x/2;
  	var half_z=z/2;
  	var unfolded_width=0;
  	var unfolded_height=0;
  	var faces=[];
	//TOO SMALL
	if (x<definition["min_width"]) {
		error.push([1,"min_width"]);
		x=definition["min_width"];
	}
	if (y<definition["min_height"]) {
		error.push([2,"min_height"]);
		y=definition["min_height"];
	}
	if (z<definition["min_length"]) {
		error.push([3,"min_length"]);
		z=definition["min_length"];
	}
	//TOO LARGE
	if (x>definition["max_width"]) {
		error.push([4,"max_width"]);
		x=definition["max_width"];
	}
	if (y>definition["max_height"]) {
		error.push([5,"max_height"]);
		y=definition["max_height"];
	}
	if (z>definition["max_length"]) {
		error.push([6,"max_length"]);
		z=definition["max_length"];
	}

	var edge_width=definition["edge_width"];
	var tolerance=definition["tolerance"];
	var flap_length=definition["flap_length"];
	var flap_offset=definition["Flap_offset"];

	var verticalTextureOffset=0;
	var horizontalTextureOffset=0;
	var packagingo_textureScale=1;


	//I AM ASUMMING YOU CONSIDER THE INSIDE OF THE BOX NOT THE OUTSIDE
	if(package_type=="mailer_box"){ 

		verticalTextureOffset=0;
		horizontalTextureOffset=0;
		packagingo_textureScale=1;


		unfolded_width=x+(2*edge_width)+(4*y)+(2*edge_width);//box width inside + the edge added to the base + the height for 4 flaps + 2 edges 
		unfolded_height=(2*z)+(3*y);//twice the lenght + three times height

		var layoutTop=z/2+y;
		var layoutBottom=z+y+z+y;
		// var flap_length=y+flap_length;

		if(unfolded_width>unfolded_height){
			packagingo_textureScale=packagingo_textureSize[0]/unfolded_width;
			packagingo_textureScale*=.9;
		}
		else {
			packagingo_textureScale=(packagingo_textureSize[1]/unfolded_height);
	        verticalTextureOffset=(y)-(layoutBottom-layoutTop)/2+5;
			packagingo_textureScale*=.9;
		}


		//TOO LARGE
		if(unfolded_width>definition["max_unfolded_width"]){
			error.push([7,"max_unfolded_width"]);
			x=definition["max_width"];
			y=definition["max_height"];
		}
		if(unfolded_height>definition["max_unfolded_height"]){
			error.push([8,"max_unfolded_height"]);
			z=definition["max_length"];
			y=definition["max_height"];
		}


		//ARRAY OF FACE DIMENSIONS AND ANCHOR [name, width, height, anchor, has_offset, left, top] (anchor is center, top bottom left right)
		faces["base"]=[];
		faces["lid"]=[];


		faces["base"]=[{
    			"name":"bottom",
    			"x":x+(2*edge_width),
    			"z":z,
    			"axis":"center",
    			"has_offset":0,
    			"objectparent":"scene",
    			"rotation":[0,0,0],
    			"translation":[0,0,0],
    			"left":+(x+(2*edge_width))/2,
    			"top":z/2,
          "outsideActive":1,
          "insideActive":1,
		  },{
    			"name":"back",
    			"x":x+edge_width,
    			"z":y,
    			"axis":"bottom",
    			"has_offset":0,
    			"objectparent":"bottom",
    			"rotation":[-Math.PI/2,0,0],
    			"translation":[0,0,z/2],
    			"left":(x+edge_width)/2,
    			"top":(z/2)-y,
    			"outsideActive":1,
          "insideActive":1,
	      },{
	        "name":"back_right_flap",
	        "x":flap_length,
	        "z":y-(edge_width/2),
	        "axis":"right",
	        "has_offset":0,
	        "objectparent":"back",
	        "rotation":[0,0,Math.PI/2],
	        "translation":[(x+edge_width)/2,0,y/2],
	        "left":-(x+edge_width)/2,
	        "top":(z/2)+(edge_width/4)-y,
	        "outsideActive":0,
          "insideActive":0,
	      },{
	        "name":"back_left_flap",
	        "x":flap_length,
	        "z":y-(edge_width/2),
	        "axis":"left",
	        "has_offset":0,
	        "objectparent":"back",
	        "rotation":[0,0,-Math.PI/2],
	        "translation":[-(x+edge_width)/2,0,y/2],
	        "left":(x+edge_width)/2,
	        "top":(z/2)+(edge_width/4)-y,
	        "outsideActive":0,
          "insideActive":0,
	      },{
    			"name":"base_front",
    			"x":x+edge_width+(2*tolerance),
    			"z":y,
    			"axis":"top",
    			"has_offset":0,
    			"objectparent":"bottom",
    			"rotation":[Math.PI/2,0,0],
    			"translation":[0,0,-z/2],
    			"left":(x+edge_width+(2*tolerance))/2,
    			"top":(z/2)-y+z,
    			"outsideActive":1,
          "insideActive":1,
		  },{
	        "name":"base_front_right_flap",
	        "x":flap_length,
	        "z":y,
	        "axis":"right",
	        "has_offset":0,
	        "objectparent":"base_front",
	        "rotation":[0,0,Math.PI/2],
	        "translation":[(x+edge_width+(2*tolerance))/2,0,-y/2],
	        "left":(-(x+edge_width+(2*tolerance))/2),
	        "top":z/2+z,
	        "outsideActive":0,
          "insideActive":0,
	      },{
	        "name":"base_front_left_flap",
	        "x":flap_length,
	        "z":y,
	        "axis":"left",
	        "has_offset":0,
	        "objectparent":"base_front",
	        "rotation":[0,0,-Math.PI/2],
	        "translation":[-(x+edge_width+(2*tolerance))/2,0,-y/2],
	        "left":((x+edge_width+(2*tolerance))/2),
	        "top":z/2+z,
	        "outsideActive":0,
          "insideActive":0,
	      },{
    			"name":"right",
    			"x":y,
    			"z":z,
    			"axis":"right",
    			"has_offset":0,
    			"objectparent":"back",
    			"rotation":[Math.PI/2,0,Math.PI/2],
    			"translation":[(x/2)+edge_width,z/2,0],
    			"left":-(x+(2*edge_width))/2,
    			"top":z/2,
    			"outsideActive":1,
          "insideActive":0,
		},{
    			"name":"left",
    			"x":y,
    			"z":z,
    			"axis":"left",
    			"has_offset":0,
    			"objectparent":"back",
    			"rotation":[Math.PI/2,0,-Math.PI/2],
    			"translation":[-(x/2)-edge_width,z/2,0],
    			"left":(x+(2*edge_width))/2,
    			"top":z/2,
    			"outsideActive":1,
          "insideActive":0,
		},{
    			"name":"right_edge",
    			"x":edge_width,
    			"z":z,
    			"axis":"right",
    			"has_offset":0,
    			"objectparent":"right",
    			"rotation":[0,0,Math.PI/2],
    			"translation":[y,0,0],
    			"left":-((x+(2*edge_width))/2)-y,
    			"top":z/2,
    			"outsideActive":1,
          "insideActive":0,
		},{
    			"name":"left_edge",
    			"x":edge_width,
    			"z":z,
    			"axis":"left",
    			"has_offset":0,
    			"objectparent":"left",
    			"rotation":[0,0,-Math.PI/2],
    			"translation":[-y,0,0],
    			"left":((x+(2*edge_width))/2)+y+.05,
    			"top":z/2,
    			"outsideActive":1,
          "insideActive":0,
		},{
    			"name":"right_flap",
    			"x":y-(edge_width/4),
    			"z":z,
    			"axis":"right",
    			"has_offset":0,
    			"objectparent":"right_edge",
    			"rotation":[0,0,Math.PI/2],
    			"translation":[edge_width,0,0],
    			"left":-((x+(2*edge_width))/2)-y-edge_width,
    			"top":z/2,
    			"outsideActive":1,
          "insideActive":0,
		},{
    			"name":"left_flap",
    			"x":y-(edge_width/4),
    			"z":z,
    			"axis":"left",
    			"has_offset":0,
    			"objectparent":"left_edge",
    			"rotation":[0,0,-Math.PI/2],
    			"translation":[-edge_width,0,0],
    			"left":((x+(2*edge_width))/2)+y+edge_width+.05,//there is a bug in the math this is necesary
    			"top":z/2,
    			"outsideActive":1,
          "insideActive":0,
		}];

	    faces["lid"]=[{
	        "name":"top",
	        "x":x-tolerance,
	        "z":z+(edge_width/4),
	        "axis":"bottom",
	        "has_offset":0,
	        "objectparent":"back",
	        "rotation":[-Math.PI/2,0,0],
	        "translation":[0,0,y],
	        "left":(x-tolerance)/2,
	        "top":-(z/2)-y-(edge_width/4),
	        "outsideActive":1,
          "insideActive":1,
	      },{
	        "name":"front",
	        "x":x+(2*edge_width/2),
	        "z":y+(edge_width/4),
	        "axis":"bottom",
	        "has_offset":0,
	        "objectparent":"top",
	        "rotation":[-Math.PI/2,0,0],
	        "translation":[0,0,z+(edge_width/4)],
	        "left":(x/2)+(edge_width/2),
	        "top":-(z/2)-(2*y)-(edge_width/2),
	        "outsideActive":1,
          "insideActive":1,
	      },{
	        "name":"front_right_flap",
	        "x":flap_length,
	        "z":y+(edge_width/4),
	        "axis":"right",
	        "has_offset":1,
	        "objectparent":"front",
	        "rotation":[0,0,Math.PI/2],
	        "translation":[(x/2)+(edge_width/2),0,y/2+(edge_width/8)],
	        "left":-x/2-(edge_width/2),
	        "top":-(z/2)-(2*y)-(edge_width/2),
	        "outsideActive":1,
          "insideActive":1,
	      },{
	        "name":"front_left_flap",
	        "x":flap_length,
	        "z":y+(edge_width/4),
	        "axis":"left",
	        "has_offset":1,
	        "objectparent":"front",
	        "rotation":[0,0,-Math.PI/2],
	        "translation":[-(x/2)-(edge_width/2),0,y/2+(edge_width/8)],
	        "left":x/2-(edge_width/2),
	        "top":-(z/2)-(2*y)-(edge_width/2),
	        "outsideActive":1,
          "insideActive":1,
	      },{
	        "name":"top_right_flap",
	        "x":flap_length,
	        "z":z,
	        "axis":"right",
	        "has_offset":1,
	        "objectparent":"top",
	        "rotation":[0,0,Math.PI/2],
	        "translation":[(x/2)-(tolerance/2),0,z/2],
	        "left":-x/2,
	        "top":-(z/2)-y,
	        "outsideActive":1,
          "insideActive":1,
	      },{
	        "name":"top_left_flap",
	        "x":flap_length,
	        "z":z,
	        "axis":"left",
	        "has_offset":1,
	        "objectparent":"top",
	        "rotation":[0,0,-Math.PI/2],
	        "translation":[-(x/2)+(tolerance/2),0,z/2],
	        "left":(x/2)-edge_width,
	        "top":-(z/2)-y,
	        "outsideActive":1,
          "insideActive":1,
	      }];
		}




		if(package_type=="shipping_box"){ 


			verticalTextureOffset=0;
			horizontalTextureOffset=0;
			packagingo_textureScale=1;


			unfolded_width=(2*x)+(2*y)+flap_length;
			unfolded_height=y+z;

			var layoutTop=z+y/2;
			var layoutBottom=z+y+z+y;

			var layoutLeft=z+y/2;
			var layoutRight=z+y+z+y;

			horizontalTextureOffset=-x/2+z/2-(z/2);


			if(unfolded_width>unfolded_height){
				packagingo_textureScale=packagingo_textureSize[0]/unfolded_width;
				packagingo_textureScale*=.5;
			}
			else {
				packagingo_textureScale=(packagingo_textureSize[1]/unfolded_height);
				packagingo_textureScale*=.9;
			}


		  //TOO LARGE
		  if(unfolded_width>definition["max_unfolded_width"]){
		    error.push([7,"max_unfolded_width"]);
		    x=definition["max_width"];
		    y=definition["max_height"];
		  }
		  if(unfolded_height>definition["max_unfolded_height"]){
		    error.push([8,"max_unfolded_height"]);
		    z=definition["max_length"];
		    y=definition["max_height"];
		  }
		  //ARRAY OF FACE DIMENSIONS AND ANCHOR 
		  faces["base"]=[];
		  faces["lid"]=[];

		    faces["base"]=[{
		        "name":"bottom",//startsbottomfront
		        "x":0,
		        "z":0,
		        "axis":"bottom",
		        "has_offset":1,
		        "objectparent":"scene",
		        "rotation":[0,0,0],
		        "translation":[0,0,0],
		        "left":(x/2)-z,
		        "top":y/2-tolerance,
            "outsideActive":1,
            "insideActive":1,
		      },{
		        "name":"front",
		        "x":x,
		        "z":y+(2*tolerance),
		        "axis":"bottom",
		        "has_offset":0,
		        "objectparent":"bottom",
		        "rotation":[Math.PI/2,0,0],
		        "translation":[0,y,-(z/2)+(tolerance)],
		        "left":(x/2)-z,
		        "top":-y/2,
		        "outsideActive":1,
            "insideActive":1,
		      },{
		        "name":"glue_flap",
		        "x":flap_length,
		        "z":y+(2*tolerance),
		        "axis":"right",
		        "has_offset":1,
		        "objectparent":"front",
		        "rotation":[0,0,Math.PI/2],
		        "translation":[x/2-tolerance,0,y/2+tolerance],
		        "left":(x/2)-z-x,
		        "top":-y/2,
		        "outsideActive":0,
	            "insideActive":1,
		      },{
		        "name":"left",
		        "x":z,
		        "z":y,
		        "axis":"left",
		        "has_offset":0,
		        "objectparent":"front",
		        "rotation":[0,0,-Math.PI/2],
		        "translation":[-x/2,0,(y/2)+(tolerance)],
		        "left":(x/2)-z,
		        "top":-y/2,
		        "outsideActive":1,
            "insideActive":1,
		      },{
		        "name":"back",
		        "x":x,
		        "z":y+(2*tolerance),
		        "axis":"left",
		        "has_offset":0,
		        "objectparent":"left",
		        "rotation":[0,0,-Math.PI/2],
		        "translation":[-z,0,-tolerance],
		        "left":(x/2),
		        "top":-y/2,
		        "outsideActive":1,
            "insideActive":1,
		      },{
		        "name":"right",
		        "x":z,
		        "z":y,
		        "axis":"left",
		        "has_offset":0,
		        "objectparent":"back",
		        "rotation":[0,0,-Math.PI/2],
		        "translation":[-x,0,0+tolerance],
		        "left":(x/2)+x,
		        "top":-y/2,
		        "outsideActive":1,
            "insideActive":1,
		      }
		    ];
		    faces["lid"]=[{
		        "name":"front_lid",
		        "x":x,
		        "z":z/2,
		        "axis":"top",
		        "has_offset":1,
		        "objectparent":"front",
		        "rotation":[Math.PI/2,0,0],
		        "translation":[0,0,0+(tolerance/4)],
		        "left":(x/2)-z,
		        "top":y/2-z/2,
		        "outsideActive":1,
            "insideActive":1,
		      },{
		        "name":"left_lid",
		        "x":z,
		        "z":x/2,
		        "axis":"top",
		        "has_offset":1,
		        "objectparent":"left",
		        "rotation":[Math.PI/2,0,0],
		        "translation":[-z/2,0,-y/2],
		        "left":-(x/2)+x,
		        "top":y/2-x/2,
		        "outsideActive":1,
            "insideActive":1,
		      },{
		        "name":"back_lid",
		        "x":x,
		        "z":z/2,
		        "axis":"top",
		        "has_offset":1,
		        "objectparent":"back",
		        "rotation":[Math.PI/2,0,0],
		        "translation":[-x/2,0,-y/2-tolerance],
		        "left":(x/2)+x,
		        "top":y/2-z/2,
		        "outsideActive":1,
            "insideActive":1,
		      },{
		        "name":"right_lid",
		        "x":z,
		        "z":x/2,
		        "axis":"top",
		        "has_offset":1,
		        "objectparent":"right",
		        "rotation":[Math.PI/2,0,0],
		        "translation":[-z/2,0,-y/2],
		        "left":(x/2)+x+z,
		        "top":y/2-x/2,
		        "outsideActive":1,
            "insideActive":1,
		      },{
		        "name":"front_bottom",
		        "x":x,
		        "z":z/2,
		        "axis":"bottom",
		        "has_offset":1,
		        "objectparent":"front",
		        "rotation":[-Math.PI/2,0,0],
		        "translation":[0,0,y-tolerance],
		        "left":(x/2)-z,
		        "top":-y/2-z/2,
		        "outsideActive":1,
            "insideActive":1,
		      },{
		        "name":"left_bottom",
		        "x":z,
		        "z":x/2,
		        "axis":"bottom",
		        "has_offset":1,
		        "objectparent":"left",
		        "rotation":[-Math.PI/2,0,0],
		        "translation":[-z/2,0,y/2],
		        "left":-(x/2)+x,
		        "top":-y/2-x/2,
		        "outsideActive":1,
            "insideActive":1,
		      },{
		        "name":"back_bottom",
		        "x":x,
		        "z":z/2,
		        "axis":"bottom",
		        "has_offset":1,
		        "objectparent":"back",
		        "rotation":[-Math.PI/2,0,0],
		        "translation":[-x/2,0,y/2-tolerance],
		        "left":(x/2)+x,
		        "top":-y/2-z/2,
		        "outsideActive":1,
            "insideActive":1,
		      },{
		        "name":"right_bottom",
		        "x":z,
		        "z":x/2,
		        "axis":"bottom",
		        "has_offset":1,
		        "objectparent":"right",
		        "rotation":[-Math.PI/2,0,0],
		        "translation":[-z/2,0,y/2],
		        "left":(x/2)+x+z,
		        "top":-y/2-x/2,
		        "outsideActive":1,
            "insideActive":1,
		      }
		    ];
		  }







/*

		if(package_type=="rigid_box"){ 

		  unfolded_width=(2*x)+(2*y)+flap_length;
		  unfolded_height=y+z;

			var layoutTop=z+y/2;
			var layoutBottom=z+y+z+y;

			var layoutLeft=z+y/2;
			var layoutRight=z+y+z+y;

			horizontalTextureOffset=-x/2+z/2-(z/2);


			if(unfolded_width>unfolded_height){
				packagingo_textureScale=packagingo_textureSize[0]/unfolded_width;
				packagingo_textureScale*=.5;
			}
			else {
				packagingo_textureScale=(packagingo_textureSize[1]/unfolded_height);
				packagingo_textureScale*=.9;
			}


		  //TOO LARGE
		  if(unfolded_width>definition["max_unfolded_width"]){
		    error.push([7,"max_unfolded_width"]);
		    x=definition["max_width"];
		    y=definition["max_height"];
		  }
		  if(unfolded_height>definition["max_unfolded_height"]){
		    error.push([8,"max_unfolded_height"]);
		    z=definition["max_length"];
		    y=definition["max_height"];
		  }
		  //ARRAY OF FACE DIMENSIONS AND ANCHOR 
		  faces["base"]=[];
		  faces["lid"]=[];

		    faces["base"]=[{
		        "name":"bottom",//startsbottomfront
		        "x":1,
		        "z":1,
		        "axis":"bottom",
		        "has_offset":1,
		        "objectparent":"scene",
		        "rotation":[0,0,0],
		        "translation":[0,0,0],
		        "left":-(z/2)+tolerance,
		        "top":y,
		        "outsideActive":0,
		      },{
		        "name":"front",
		        "x":x,
		        "z":y+(2*tolerance),
		        "axis":"bottom",
		        "has_offset":0,
		        "objectparent":"bottom",
		        "rotation":[Math.PI/2,0,0],
		        "translation":[0,y,-(z/2)+(tolerance)],
		        "left":(x/2)-z,
		        "top":-y/2,
		        "outsideActive":0,
		      },{
		        "name":"glue_flap",
		        "x":flap_length,
		        "z":y+(2*tolerance),
		        "axis":"right",
		        "has_offset":1,
		        "objectparent":"front",
		        "rotation":[0,0,Math.PI/2],
		        "translation":[x/2-tolerance,0,y/2+tolerance],
		        "left":(x/2)-z-x,
		        "top":-y/2,
		        "outsideActive":0,
		      },{
		        "name":"left",
		        "x":z,
		        "z":y,
		        "axis":"left",
		        "has_offset":0,
		        "objectparent":"front",
		        "rotation":[0,0,-Math.PI/2],
		        "translation":[-x/2,0,(y/2)+(tolerance)],
		        "left":(x/2)-z,
		        "top":-y/2,
		        "outsideActive":0,
		      },{
		        "name":"back",
		        "x":x,
		        "z":y+(2*tolerance),
		        "axis":"left",
		        "has_offset":0,
		        "objectparent":"left",
		        "rotation":[0,0,-Math.PI/2],
		        "translation":[-z,0,-tolerance],
		        "left":(x/2),
		        "top":-y/2,
		        "outsideActive":0,
		      },{
		        "name":"right",
		        "x":z,
		        "z":y,
		        "axis":"left",
		        "has_offset":0,
		        "objectparent":"back",
		        "rotation":[0,0,-Math.PI/2],
		        "translation":[-x,0,0+tolerance],
		        "left":(x/2)+x,
		        "top":-y/2,
		        "outsideActive":0,
		      }
		    ];
		    faces["lid"]=[{
		        "name":"front_lid",
		        "x":x,
		        "z":z/2,
		        "axis":"top",
		        "has_offset":1,
		        "objectparent":"front",
		        "rotation":[Math.PI/2,0,0],
		        "translation":[0,0,0+(tolerance/4)],
		        "left":(x/2)-z,
		        "top":y/2-z/2,
		        "outsideActive":0,
		      },{
		        "name":"left_lid",
		        "x":z,
		        "z":x/2,
		        "axis":"top",
		        "has_offset":1,
		        "objectparent":"left",
		        "rotation":[Math.PI/2,0,0],
		        "translation":[-z/2,0,-y/2],
		        "left":-(x/2)+x,
		        "top":y/2-x/2,
		        "outsideActive":0,
		      },{
		        "name":"back_lid",
		        "x":x,
		        "z":z/2,
		        "axis":"top",
		        "has_offset":1,
		        "objectparent":"back",
		        "rotation":[Math.PI/2,0,0],
		        "translation":[-x/2,0,-y/2-tolerance],
		        "left":(x/2)+x,
		        "top":y/2-z/2,
		        "outsideActive":0,
		      },{
		        "name":"right_lid",
		        "x":z,
		        "z":x/2,
		        "axis":"top",
		        "has_offset":1,
		        "objectparent":"right",
		        "rotation":[Math.PI/2,0,0],
		        "translation":[-z/2,0,-y/2],
		        "left":(x/2)+x+z,
		        "top":y/2-x/2,
		        "outsideActive":0,
		      },{
		        "name":"front_bottom",
		        "x":x,
		        "z":z/2,
		        "axis":"bottom",
		        "has_offset":1,
		        "objectparent":"front",
		        "rotation":[-Math.PI/2,0,0],
		        "translation":[0,0,y-tolerance],
		        "left":(x/2)-z,
		        "top":-y/2-z/2,
		        "outsideActive":0,
		      },{
		        "name":"left_bottom",
		        "x":z,
		        "z":x/2,
		        "axis":"bottom",
		        "has_offset":1,
		        "objectparent":"left",
		        "rotation":[-Math.PI/2,0,0],
		        "translation":[-z/2,0,y/2],
		        "left":-(x/2)+x,
		        "top":-y/2-x/2,
		        "outsideActive":0,
		      },{
		        "name":"back_bottom",
		        "x":x,
		        "z":z/2,
		        "axis":"bottom",
		        "has_offset":1,
		        "objectparent":"back",
		        "rotation":[-Math.PI/2,0,0],
		        "translation":[-x/2,0,y/2-tolerance],
		        "left":(x/2)+x,
		        "top":-y/2-z/2,
		        "outsideActive":0,
		      },{
		        "name":"right_bottom",
		        "x":z,
		        "z":x/2,
		        "axis":"bottom",
		        "has_offset":1,
		        "objectparent":"right",
		        "rotation":[-Math.PI/2,0,0],
		        "translation":[-z/2,0,y/2],
		        "left":(x/2)+x+z,
		        "top":-y/2-x/2,
		        "outsideActive":0,
		      }
		    ];
		  }

*/

// here new one




if(package_type=="Rigid Box"){ 


	verticalTextureOffset=0;
	horizontalTextureOffset=0;
	packagingo_textureScale=1;


	unfolded_width=(2*x)+(2*y)+flap_length;
	unfolded_height=y+z;

	var layoutTop=z+y/2;
	var layoutBottom=z+y+z+y;

	var layoutLeft=z+y/2;
	var layoutRight=z+y+z+y;

	horizontalTextureOffset=-x/2+z/2-(z/2);


	if(unfolded_width>unfolded_height){
		packagingo_textureScale=packagingo_textureSize[0]/unfolded_width;
		packagingo_textureScale*=1.5;
	}
	else {
		packagingo_textureScale=(packagingo_textureSize[1]/unfolded_height);
		packagingo_textureScale*=.9;
	}


  //TOO LARGE
  if(unfolded_width>definition["max_unfolded_width"]){
	error.push([7,"max_unfolded_width"]);
	x=definition["max_width"];
	y=definition["max_height"];
  }
  if(unfolded_height>definition["max_unfolded_height"]){
	error.push([8,"max_unfolded_height"]);
	z=definition["max_length"];
	y=definition["max_height"];
  }
  //ARRAY OF FACE DIMENSIONS AND ANCHOR 
  faces["base"]=[];
  faces["lid"]=[];

	faces["base"]=[{
		"name":"bottom",//startsbottomfront
		"x":0,
		"z":0,
		"axis":"bottom",
		"has_offset":1,
		"objectparent":"scene",
		"rotation":[0,0,0],
		"translation":[0,0,0],
		"left":(x/2)-z,
		"top":y/2-tolerance,
	"outsideActive":1,
	"insideActive":1,
	  },{
		"name":"front",
		"x":x,
		"z":y+(2*tolerance),
		"axis":"bottom",
		"has_offset":0,
		"objectparent":"bottom",
		"rotation":[Math.PI/2,0,0],
		"translation":[0,y,-(z/2)+(tolerance)],
		"left":(x/2)-z,
		"top":-y/2,
		"outsideActive":1,
	"insideActive":1,
	  },{
		"name":"glue_flap",
		"x":flap_length,
		"z":y+(2*tolerance),
		"axis":"right",
		"has_offset":1,
		"objectparent":"front",
		"rotation":[0,0,Math.PI/2],
		"translation":[x/2-tolerance,0,y/2+tolerance],
		"left":(x/2)-z-x,
		"top":-y/2,
		"outsideActive":0,
		"insideActive":1,
	  },{
		"name":"left",
		"x":z,
		"z":y,
		"axis":"left",
		"has_offset":0,
		"objectparent":"front",
		"rotation":[0,0,-Math.PI/2],
		"translation":[-x/2,0,(y/2)+(tolerance)],
		"left":(x/2)-z,
		"top":-y/2,
		"outsideActive":1,
	"insideActive":1,
	  },{
		"name":"back",
		"x":x,
		"z":y+(2*tolerance),
		"axis":"left",
		"has_offset":0,
		"objectparent":"left",
		"rotation":[0,0,-Math.PI/2],
		"translation":[-z,0,-tolerance],
		"left":(x/2),
		"top":-y/2,
		"outsideActive":1,
	"insideActive":1,
	  },{
		"name":"right",
		"x":z,
		"z":y,
		"axis":"left",
		"has_offset":0,
		"objectparent":"back",
		"rotation":[0,0,-Math.PI/2],
		"translation":[-x,0,0+tolerance],
		"left":(x/2)+x,
		"top":-y/2,
		"outsideActive":1,
	"insideActive":1,
	  }
	];
	faces["lid"]=[{
		"name":"front_lid",
		"x":x,
		"z":z/2,
		"axis":"top",
		"has_offset":1,
		"objectparent":"front",
		"rotation":[Math.PI/2,0,0],
		"translation":[0,0,0+(tolerance/4)],
		"left":(x/2)-z,
		"top":y/2-z/2,
		"outsideActive":1,
	"insideActive":1,
	  },{
		"name":"left_lid",
		"x":z,
		"z":x/2,
		"axis":"top",
		"has_offset":1,
		"objectparent":"left",
		"rotation":[Math.PI/2,0,0],
		"translation":[-z/2,0,-y/2],
		"left":-(x/2)+x,
		"top":y/2-x/2,
		"outsideActive":1,
	"insideActive":1,
	  },{
		"name":"back_lid",
		"x":x,
		"z":z/2,
		"axis":"top",
		"has_offset":1,
		"objectparent":"back",
		"rotation":[Math.PI/2,0,0],
		"translation":[-x/2,0,-y/2-tolerance],
		"left":(x/2)+x,
		"top":y/2-z/2,
		"outsideActive":1,
	"insideActive":1,
	  },{
		"name":"right_lid",
		"x":z,
		"z":x/2,
		"axis":"top",
		"has_offset":1,
		"objectparent":"right",
		"rotation":[Math.PI/2,0,0],
		"translation":[-z/2,0,-y/2],
		"left":(x/2)+x+z,
		"top":y/2-x/2,
		"outsideActive":1,
	"insideActive":1,
	  },{
		"name":"front_bottom",
		"x":x,
		"z":z/2,
		"axis":"bottom",
		"has_offset":1,
		"objectparent":"front",
		"rotation":[-Math.PI/2,0,0],
		"translation":[0,0,y-tolerance],
		"left":(x/2)-z,
		"top":-y/2-z/2,
		"outsideActive":1,
	"insideActive":1,
	  },{
		"name":"left_bottom",
		"x":z,
		"z":x/2,
		"axis":"bottom",
		"has_offset":1,
		"objectparent":"left",
		"rotation":[-Math.PI/2,0,0],
		"translation":[-z/2,0,y/2],
		"left":-(x/2)+x,
		"top":-y/2-x/2,
		"outsideActive":1,
	"insideActive":1,
	  },{
		"name":"back_bottom",
		"x":x,
		"z":z/2,
		"axis":"bottom",
		"has_offset":1,
		"objectparent":"back",
		"rotation":[-Math.PI/2,0,0],
		"translation":[-x/2,0,y/2-tolerance],
		"left":(x/2)+x,
		"top":-y/2-z/2,
		"outsideActive":1,
	"insideActive":1,
	  },{
		"name":"right_bottom",
		"x":z,
		"z":x/2,
		"axis":"bottom",
		"has_offset":1,
		"objectparent":"right",
		"rotation":[-Math.PI/2,0,0],
		"translation":[-z/2,0,y/2],
		"left":(x/2)+x+z,
		"top":-y/2-x/2,
		"outsideActive":1,
	"insideActive":1,
	  }
	];
  }

  if(package_type=="cake_box"){ 

	unfolded_width=(2*x)+(2*y);
	unfolded_height=y+z;

	  var layoutTop=z+y/2;
	  var layoutBottom=z+y+z+y;

	  var layoutLeft=z+y/2;
	  var layoutRight=z+y+z+y;

	  horizontalTextureOffset=-x/2+z/2-(z/2);


	  if(unfolded_width>unfolded_height){
		  packagingo_textureScale=packagingo_textureSize[0]/unfolded_width;
		  packagingo_textureScale*=.5;
	  }
	  else {
		  packagingo_textureScale=(packagingo_textureSize[1]/unfolded_height);
		  packagingo_textureScale*=.9;
	  }


	//TOO LARGE
	if(unfolded_width>definition["max_unfolded_width"]){
	  error.push([7,"max_unfolded_width"]);
	  x=definition["max_width"];
	  y=definition["max_height"];
	}
	if(unfolded_height>definition["max_unfolded_height"]){
	  error.push([8,"max_unfolded_height"]);
	  z=definition["max_length"];
	  y=definition["max_height"];
	}
	//ARRAY OF FACE DIMENSIONS AND ANCHOR 
	faces["base"]=[];
	faces["lid"]=[];

	  faces["base"]=[
		{
			"name":"bottom",
			"x":x,
			"z":z,
			"axis":"center",
			"has_offset":0,
			"objectparent":"scene",
			"rotation":[0,0,0],
			"translation":[0,0,0],
			"left":2*x,
			"top":-y,
			"outsideActive":1,
			"insideActive": 1,
		  },
		  
		  {
			"name":"back",
			"x":x,
			"z":y,
			"axis":"center",
			"has_offset":0,
			"objectparent":"bottom",
			"rotation":[Math.PI/2,0,0],
			"translation":[0,y/2,-z/2],
			"left":2*x,
			"top":z-y,
			"outsideActive":1,
			"insideActive": 1,
		  },

		  {
			"name":"right",
			"x":z,
			"z":y,
			"axis":"center",
			"has_offset":0,
			"objectparent":"back",
			"rotation":[0,0,Math.PI/2],
			"translation":[x/2,z/2,0],
			"left":x,
			"top":z-y,
			"outsideActive":1,
			"insideActive": 1,
		  },
		  
		{
			"name":"front",
			"x":x,
			"z":y,
			"axis":"center",
			"has_offset":0,
			"objectparent":"right",
			"rotation":[0,0,Math.PI/2],
			"translation":[z/2,x/2,0],
			"left":x-z,
			"top":z-y,
			"outsideActive":1,
			"insideActive": 1,
		  },
		
		  {
			"name":"left",
			"x":z,
			"z":y,
			"axis":"center",
			"has_offset":0,
			"objectparent":"front",
			"rotation":[0,0,Math.PI/2],
			"translation":[x/2,z/2,0],
			"left":-z,
			"top":z-y,
			"outsideActive":1,
			"insideActive": 1,
		  },
		  

		  {
			"name":"dustflap_2",
			"x":z,
			"z":z/2,
			"axis":"bottom",
			"has_offset":1,
			"objectparent":"left",
			"rotation":[-Math.PI/2,0,0],
			"translation":[0,0,y/2-tolerance],
			"left":-z,
			"top":-y+z/2,
			"outsideActive":1,
			"insideActive": 1,
		  },
	  ];
	  faces["lid"]=[
		
		{
			"name":"bot_tuck",
			"x":x,
			"z":y/4,
			"axis":"center",
			"has_offset":0,
			"objectparent":"bottom",
			"rotation":[-Math.PI/2,0,0],
			"translation":[0,y/8-tolerance,z/2-tolerance],
			"left":2*x,
			"top":-y-y/4,
			"outsideActive":1,
			"insideActive": 1,
		  },
		  {
			"name":"top",
			"x":x,
			"z":z,
			"axis":"top",
			"has_offset":0,
			"objectparent":"back",
			"rotation":[Math.PI/2,0,0],
			"translation":[0,0,-y/2],
			"left":2*x,
			"top":0,
			"outsideActive":1,
			"insideActive": 1,
		  },	

		  {
			"name":"top_tuck",
			"x":x,
			"z":y/4,
			"axis":"top",
			"has_offset":1,
			"objectparent":"top",
			"rotation":[Math.PI/2,0,0],
			"translation":[0,0,-z+tolerance],
			"left":2*x,
			"top":2*z-y/4,
			"outsideActive":1,
			"insideActive": 1,
		  },
			{
				"name":"dustflap_3",
				"x":z,
				"z":z/2,
				"axis":"top",
				"has_offset":1,
				"objectparent":"right",
				"rotation":[Math.PI/2,0,0],
				"translation":[0,0,-y/2],
				"left":x,
				"top":z/2,
				"outsideActive":1,
				"insideActive": 1,
			},
			
			{
				"name":"dustflap_4",
				"x":z,
				"z":z/2,
				"axis":"bottom",
				"has_offset":1,
				"objectparent":"right",
				"rotation":[-Math.PI/2,0,0],
				"translation":[0,0,y/2-tolerance],
				"left":x,
				"top":-y+z/2,
				"outsideActive":1,
				"insideActive": 1,
			},
			
			{
				"name":"dustflap_1",
				"x":z,
				"z":z/2,
				"axis":"top",
				"has_offset":1,
				"objectparent":"left",
				"rotation":[Math.PI/2,0,0],
				"translation":[0,0,-y/2],
				"left":-z,
				"top":z/2,
				"outsideActive":1,
				"insideActive": 1,
			},
			{
				"name":"hidden",
				"x":z/2,
				"z":y,
				"axis":"left",
				"has_offset":1,
				"objectparent":"back",
				"rotation":[0,0,Math.PI/2],
				"translation":[-x/2+tolerance,z/2-tolerance,0],
				"left":2*x-z/8,
				"top":z-y,
				"outsideActive":1,
				"insideActive": 1,
			  },
		];
	  
	}

	if(package_type=="tear_box"){ 

		unfolded_width=(2*x)+(2*y);
		unfolded_height=y+z;

		  var layoutTop=z+y/2;
		  var layoutBottom=z+y+z+y;

		  var layoutLeft=z+y/2;
		  var layoutRight=z+y+z+y;

		  horizontalTextureOffset=-x/2+z/2-(z/2);


		  if(unfolded_width>unfolded_height){
			  packagingo_textureScale=packagingo_textureSize[0]/unfolded_width;
			  packagingo_textureScale*=.5;
		  }
		  else {
			  packagingo_textureScale=(packagingo_textureSize[1]/unfolded_height);
			  packagingo_textureScale*=.9;
		  }


		//TOO LARGE
		if(unfolded_width>definition["max_unfolded_width"]){
		  error.push([7,"max_unfolded_width"]);
		  x=definition["max_width"];
		  y=definition["max_height"];
		}
		if(unfolded_height>definition["max_unfolded_height"]){
		  error.push([8,"max_unfolded_height"]);
		  z=definition["max_length"];
		  y=definition["max_height"];
		}
		//ARRAY OF FACE DIMENSIONS AND ANCHOR 
		faces["base"]=[];
		faces["lid"]=[];

		  faces["base"]=[
			{
				"name":"bottom",
				"x":x,
				"z":z,
				"axis":"center",
				"has_offset":0,
				"objectparent":"scene",
				"rotation":[0,0,0],
				"translation":[0,0,0],
				"left":0,
				"top":0,
				"outsideActive":1,
				"insideActive": 1,
			  },
			  {
				"name":"front",
				"x":x,
				"z":y,
				"axis":"center",
				"has_offset":0,
				"objectparent":"bottom",
				"rotation":[Math.PI/2,0,0],
				"translation":[0,y/2,-z/2],
				"left":0,
				"top":z,
				"outsideActive":1,
				"insideActive": 1,
			  },
			  {
				"name":"top",
				"x":x,
				"z":z,
				"axis":"top",
				"has_offset":1,
				"objectparent":"front",
				"rotation":[Math.PI/2,0,0],
				"translation":[0,0,-y/2],
				"left":0,
				"top":y,
				"outsideActive":1,
				"insideActive": 1,
			  },
			  {
				"name":"zip",
				"x":x,
				"z":30,
				"axis":"top",
				"has_offset":0,
				"objectparent":"top",
				"rotation":[0,0,0],
				"translation":[0,2,-z/2+50],
				"left":0,
				"top":z+y+z/2-80,
				"outsideActive":0,
				"insideActive": 0,
			  },
			  {
				"name":"zip_t",
				"x":x,
				"z":30,
				"axis":"top",
				"has_offset":0,
				"objectparent":"zip",
				"rotation":[0,0,0],
				"translation":[0,-2,0],
				"left":0,
				"top":z+y+z/2-80,
				"outsideActive":0,
				"insideActive": 0,
			  },
			  {
				"name":"zip_t2",
				"x":x,
				"z":30,
				"axis":"top",
				"has_offset":0,
				"objectparent":"zip",
				"rotation":[0,0,0],
				"translation":[0,-2,0],
				"left":0,
				"top":z+y+z/2-80,
				"outsideActive":0,
				"insideActive": 0,
			  },
			  {
				"name":"right",
				"x":z,
				"z":y,
				"axis":"center",
				"has_offset":0,
				"objectparent":"front",
				"rotation":[0,0,-Math.PI/2],
				"translation":[-x/2,z/2,0],
				"left":z,
				"top":z,
				"outsideActive":1,
				"insideActive": 1,
			  },

			  {
				"name":"right_t",
				"x":z,
				"z":z/2,
				"axis":"top",
				"has_offset":1,
				"objectparent":"right",
				"rotation":[Math.PI/2,0,0],
				"translation":[0,0,-y/2+tolerance],
				"left":z,
				"top":y+z/2,
				"outsideActive":1,
				"insideActive": 1,
			  },
			  {
				"name":"right_b",
				"x":z,
				"z":z/2,
				"axis":"bottom",
				"has_offset":1,
				"objectparent":"right",
				"rotation":[-Math.PI/2,0,0],
				"translation":[0,0,y/2-tolerance],
				"left":z,
				"top":z/2,
				"outsideActive":1,
				"insideActive": 1,
			  },

			  {
				"name":"back",
				"x":x,
				"z":y,
				"axis":"center",
				"has_offset":0,
				"objectparent":"right",
				"rotation":[0,0,-Math.PI/2],
				"translation":[-z/2,x/2,0],
				"left":x+z,
				"top":z,
				"outsideActive":1,
				"insideActive": 1,
			  },
			  
			  {
				"name":"back_t",
				"x":x,
				"z":z,
				"axis":"top",
				"has_offset":1,
				"objectparent":"back",
				"rotation":[Math.PI/2,0,0],
				"translation":[0,0,-y/2+tolerance],
				"left":z+x,
				"top":y,
				"outsideActive":1,
				"insideActive": 1,
			  },
			  {
				"name":"back_b",
				"x":x,
				"z":z,
				"axis":"bottom",
				"has_offset":1,
				"objectparent":"back",
				"rotation":[-Math.PI/2,0,0],
				"translation":[0,0,y/2-tolerance],
				"left":z+x,
				"top":0,
				"outsideActive":1,
				"insideActive": 1,
			  },

			  {
				"name":"left",
				"x":z,
				"z":y,
				"axis":"center",
				"has_offset":0,
				"objectparent":"back",
				"rotation":[0,0,-Math.PI/2],
				"translation":[-x/2,z/2,0],
				"left":x+z+z,
				"top":z,
				"outsideActive":1,
				"insideActive": 1,
			  },
			  {
				"name":"left_t",
				"x":z,
				"z":z/2,
				"axis":"top",
				"has_offset":1,
				"objectparent":"left",
				"rotation":[Math.PI/2,0,0],
				"translation":[0,0,-y/2+tolerance],
				"left":x+z+z,
				"top":y+z/2,
				"outsideActive":1,
				"insideActive": 1,
			  },
			  {
				"name":"left_b",
				"x":z,
				"z":z/2,
				"axis":"bottom",
				"has_offset":1,
				"objectparent":"left",
				"rotation":[-Math.PI/2,0,0],
				"translation":[0,0,y/2-tolerance],
				"left":x+z+z,
				"top":z/2,
				"outsideActive":1,
				"insideActive": 1,
			  },
				  
		  ];
		  faces["lid"]=[
			
			
			  {
				"name":"front_lid",
				"x":z/4,
				"z":y,
				"axis":"right",
				"has_offset":1,
				"objectparent":"front",
				"rotation":[0,0,Math.PI/2],
				"translation":[x/2-tolerance,0,0],
				"left":-x,
				"top":z,
				//"outsideActive":1,
				"insideActive": 1,
			  },
			  
			];
		  
	}




// end new one   









		//MAKE A GENERAL ARRAY
		var three_geometry_objects=[];
		Object.entries(faces).forEach(three_object=>{
			var object_name=three_object[0];
			three_geometry_objects[object_name]=[]
			Object.entries(three_object[1]).forEach(three_faces=>{




				var face_name=three_faces[1].name;
				var x=three_faces[1].x;
				var z=three_faces[1].z;
				var axis=three_faces[1].axis;
				var has_offset=three_faces[1].has_offset;
      			var flap_offset = definition["flap_offset"];
				var left=three_faces[1].left+horizontalTextureOffset;
				var top=three_faces[1].top+verticalTextureOffset;
				var translation=three_faces[1].translation;
				var rotation=three_faces[1].rotation;
				var objectparent=three_faces[1].objectparent;
        var isActiveInside=three_faces[1].insideActive;
        var isActiveOutside=three_faces[1].outsideActive;
				three_geometry_objects[object_name][face_name]=[];
			      var ul = -x/2;
			      var vl = z/2;
			      var a = [-x/2,z/2];
			      var b = [-x/2,-z/2];
			      var c = [x/2,-z/2];
			      var d = [x/2,z/2];
							if(axis=="center"){
			        a=[-x/2,z/2];
			        b=[-x/2,-z/2];
			        c=[x/2,-z/2];
			        d=[x/2,z/2];

							}
							if(axis=="bottom"){
			        vl=z;
			        a=[-x/2,z];
			        b=[-x/2,0];
			        c=[x/2,0];
			        d=[x/2,z];
			        if(has_offset){
			          vl=z-flap_offset;
			          a=[-x/2+flap_offset,z-flap_offset];
			          d=[x/2-flap_offset,z-flap_offset];
			          top=three_faces[1].top+flap_offset;
			        }
							}
							if(axis=="top"){
			        vl=z;
			        a=[-x/2,0];
			        b=[-x/2,-z];
			        c=[x/2,-z];
			        d=[x/2,0];
			        if(has_offset){
			          b=[-x/2+flap_offset,-z+flap_offset];
			          c=[x/2-flap_offset,-z+flap_offset];
			        }
							}
							if(axis=="right"){
			        ul=0;
			        vl=z/2;
			        a=[0,z/2];
			        b=[0,-z/2];
			        c=[x,-z/2];
			        d=[x,z/2];
			        if(has_offset){
			          c=[x-flap_offset,-z/2+flap_offset];
			          d=[x-flap_offset,z/2-flap_offset];
			        }
							}
							if(axis=="left"){
			        ul=0;
			        vl=z/2;
			        a=[-x,z/2];
			        b=[-x,-z/2];
			        c=[0,-z/2];
			        d=[0,z/2];
			        if(has_offset){
			          ul=0+flap_offset;
			          vl=z/2;
			          a=[-x+flap_offset,z/2-flap_offset];
			          b=[-x+flap_offset,-z/2+flap_offset];
			        }
							}

			      three_geometry_objects[object_name][face_name]={"ul":ul,"vl":vl,"face_name":face_name,"a":a,"b":b,"c":c,"d":d,"has_offset":has_offset,"top":top,"left":left,"translation":translation,"rotation":rotation,"objectparent":objectparent,"axis":axis,"x":x,"z":z,"isActiveOutside":isActiveOutside,"isActiveInside":isActiveInside};

						});
					});

					//MAKE THE LAYOUT FIRST SO YOU CAN THEN GET THE UV
					//SCALE DATA TO CANVAS 1024*512 //fix later lets assume ist vertical and

					var fabric_data=[];
					Object.entries(three_geometry_objects).forEach(three_object=>{
						var object_name=three_object[0];
						fabric_data[object_name]=[]
						Object.entries(three_object[1]).forEach(three_faces=>{
							var center_x=packagingo_textureSize[0]/2;
							var center_y=packagingo_textureSize[1]/2;
							var face_name=three_faces[0];
							var ax=three_faces[1]["a"][0]*packagingo_textureScale;
							var ay=-three_faces[1]["a"][1]*packagingo_textureScale;
							var bx=three_faces[1]["b"][0]*packagingo_textureScale;
							var by=-three_faces[1]["b"][1]*packagingo_textureScale;
							var cx=three_faces[1]["c"][0]*packagingo_textureScale;
							var cy=-three_faces[1]["c"][1]*packagingo_textureScale;
							var dx=three_faces[1]["d"][0]*packagingo_textureScale;
							var dy=-three_faces[1]["d"][1]*packagingo_textureScale;
              var isActiveOutside=three_faces[1]["isActiveOutside"];
              var isActiveInside=three_faces[1]["isActiveInside"];


							var x=three_faces[1]["x"]*packagingo_textureScale;
							var z=three_faces[1]["z"]*packagingo_textureScale;

							var left=(-three_faces[1]["left"]*packagingo_textureScale)+center_x;
							var top=(three_faces[1]["top"]*packagingo_textureScale)+(center_y);

							var axis=three_faces[1]["axis"];

							if(axis=="left")left=(-three_faces[1]["left"]*packagingo_textureScale)+center_x-x;
							if(axis=="top")top=(three_faces[1]["top"]*packagingo_textureScale)+(center_y)+z;

							var path='M '+ax+' '+ay+' L '+bx+' '+by+' L '+cx+' '+cy+' L '+dx+' '+dy+' z';
							fabric_data[object_name][face_name]={"left":left,"top":top,"path":path,"isActiveOutside":isActiveOutside,"isActiveInside":isActiveInside}; 
						});
					});

		//CREATE TWO TRIANGLES FOR EACH FACE
					var three_data=[];
					Object.entries(three_geometry_objects).forEach(three_object=>{
						var object_name=three_object[0];
						three_data[object_name]=[]
						Object.entries(three_object[1]).forEach(three_faces=>{
							var face_name=three_faces[0];
							var a=three_faces[1]["a"];
							var b=three_faces[1]["b"];
							var c=three_faces[1]["c"];
							var d=three_faces[1]["d"];


							var xuvScalefactor=1/packagingo_textureSize[0];
							var yuvScalefactor=1/packagingo_textureSize[1];
							var center_x=packagingo_textureSize[0]/2;
							var center_y=packagingo_textureSize[1]/2;
							var left=packagingo_textureSize[0]-(((three_faces[1]["left"]+three_faces[1]["ul"])*packagingo_textureScale)+center_x);
							var top=packagingo_textureSize[1]-(((three_faces[1]["top"]+three_faces[1]["vl"])*packagingo_textureScale)+(center_y));

							var ax=((three_faces[1]["a"][0]*packagingo_textureScale)+left)*xuvScalefactor;
							var ay=((three_faces[1]["a"][1]*packagingo_textureScale)+top)*yuvScalefactor;
							var bx=((three_faces[1]["b"][0]*packagingo_textureScale)+left)*xuvScalefactor;
							var by=((three_faces[1]["b"][1]*packagingo_textureScale)+top)*yuvScalefactor;
							var cx=((three_faces[1]["c"][0]*packagingo_textureScale)+left)*xuvScalefactor;
							var cy=((three_faces[1]["c"][1]*packagingo_textureScale)+top)*yuvScalefactor;
							var dx=((three_faces[1]["d"][0]*packagingo_textureScale)+left)*xuvScalefactor;
							var dy=((three_faces[1]["d"][1]*packagingo_textureScale)+top)*yuvScalefactor;


							three_data[object_name][face_name]=[
								{pos: [a[0], 0, a[1] ],uv: [ax, ay]},
								{pos: [b[0], 0, b[1] ],uv: [bx, by]},
								{pos: [c[0], 0, c[1] ],uv: [cx, cy]},

								{pos: [a[0], 0, a[1] ],uv: [ax, ay]},
								{pos: [c[0], 0, c[1] ],uv: [cx, cy]},
								{pos: [d[0], 0, d[1] ],uv: [dx, dy]},
							];
						});
					});

					window.boxLayout=[fabric_data,three_data,three_geometry_objects][0];
					window.vertexData=[fabric_data,three_data,three_geometry_objects][1];
					window.geometryObjects=[fabric_data,three_data,three_geometry_objects][2];
				// return [fabric_data,three_data,three_geometry_objects];
}
