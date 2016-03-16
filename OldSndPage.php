<!DOCTYPE html>
<html>
<head>
	<title>Editing Page</title>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/fabric.js"></script>
	<script src="CamanJS-4.1.1/dist/caman.full.min.js"></script>
	<script type="text/javascript" src="js/FileSaver.min.js"></script>
	<script type="text/javascript" src="js/test.js"></script>
	<link rel="stylesheet" type="text/css" href="css/2ndpageStyle.css">

	<!-- for charting -->

<script language="javascript" type="text/javascript" src="plot/jquery.min.js"></script>
<script type="text/javascript" src="plot/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="plot/jquery.jqplot.js"></script>
<script class="include" type="text/javascript" src="plot/plugins/jqplot.barRenderer.min.js"></script>
<script class="include" type="text/javascript" src="plot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script class="include" type="text/javascript" src="plot/plugins/jqplot.pieRenderer.min.js"></script>
<script class="include" type="text/javascript" src="plot/plugins/jqplot.donutRenderer.min.js"></script>
<link rel="stylesheet" type="text/css" href="plot/jquery.jqplot.css" />
<link rel="stylesheet" type="text/css" href="chart.css" />

</head>
<body>
	<div class="editTooltop">
		<div class="editTools">
			<button id="filter">Filter</button>	
			<button id="freeDrawing">Free Drawing</button>
			<input type="button" id="undo" value="Undo"/>
			<input type="button" id="redo" value="redo"/>
			<a href="#openModal">Chart</a>
			<button id="toJson">To JSON</button>
			<button id="reset">Clear</button>
			<button id="zoomInCanvas">+</button>
			<button id="zoomOutCanvas">-</button>
			<button id="flipVert">FV</button>
			<button id="flipHori">FH</button>
		</div>

		<div id="openModal" class="modalDialog">
   		 <div><a href="#close" title="Close" class="close">X</a>
			<div>
				<button style="left: 465px; top: 26px;" id="save">Save</button>
				<div id="chartdiv" style="height:400px;width:300px;"></div>
				<div id="options">
					<select id="choose">
						<option value="vertical">Vertical Bar</option>
						<option value="horizontal">Horizontal Bar</option>
						<option value="line">Line</option>
						<option value="area">Area</option>
						<option value="pie">pie</option>
						<option value="donut">Donut</option>
					</select>
					<button id="plot">Plot</button>	
				</div>
			<div id="table" style="height:400px;width:300px;">
		<button id="ok">Ok</button>
	</div>
	</div>
    </div>
</div>

		<div class="subCategory">
		<div style="position: absolute; right: -24px; z-index: 40; background-color: aqua; top: -6px; width: 30%;" id="forfilters">
			<button id="manualfilter">Manual Filter</button>
			<div style="width: 33%;" class="col-lg-6">
			    <label for="hue">Hue</label>
			    <input id="hue" name="hue" min="0" max="300" value="0" type="range">
			    <label for="contrast">Contrast</label>
			    <input id="contrast" name="contrast" min="-20" max="20" value="0" type="range">
			    <label for="brightness">Brightness</label>
			    <input id="brightness" name="brightness" min="-100" max="100" value="0" type="range">
			 	<label for="saturation">Saturation</label>
			    <input id="saturation" name="saturation" min="-100" max="100" value="0" type="range">
			</div>
			<div style="width: 33%;" class="col-lg-6">
			    <label for="vibrance">Vibrance</label>
			    <input id="vibrance" name="vibrance" min="0" max="400" value="0" type="range">
			    <label for="sepia">Sepia</label>
			    <input id="sepia" name="sepia" min="0" max="100" value="0" type="range">
			    <label for="gamma">Gamma</label>
			    <input id="gamma" name="gamma" min="0" max="10" value="0" type="range">
			    <label for="noise">Noise</label>
			    <input id="noise" name="noise" min="0" max="100" value="0" type="range">
			</div>
			<div id="advFilter">
			<ul id="presetFilters">
				<li> <button id="normal">Normal</button> </li>
                <li> <button id="vintage">Vintage</button> </li>
                <li> <button id="lomo">Lomo</button> </li>
                <li> <button id="clarity">Clarity</button> </li>
                <li> <button id="sinCity">Sin City</button> </li>
                <li> <button id="sunrise">Sunrise</button> </li>
                <li> <button id="pinhole">Pinhole</button> </li>
                <li> <button id="crossProcess">Cross Process</button></li>
                <li> <button id="orangePeel">Orange Peel</button></li>
                <li> <button id="love">Love</button></li>
                <li> <button id="grungy">Grungy</button></li>
                <li> <button id="jarques">Jarques</button></li>
                <li> <button id="oldBoot">Old Boot</button></li>
                <li> <button id="glowingsun">Glowing Sun</button></li>
                <li> <button id="hazyDays">Hazy Days</button></li>
                <li> <button id="herMajesty">Her Majesty</button></li>
                <li> <button id="nostalgia">Nostalgia</button></li>
                <li> <button id="hemingway">HemingWay</button></li>
                <li> <button id="concentrate">Concentrate</button></li>
                <li> <button id="invert">Invert</button></li>
                <li> <button id="greyscale">Greyscale</button>
			</li></ul>
		</div>
			<button style="margin-top: 91px; color: rgb(149, 143, 30); background-color: rgb(10, 20, 20);" id="done">Done</button>
		</div>



		<div id="forFreeDrawing" style="display: none;z-index: 500;">
			<div id="drawing-mode-options">

			    <label for="drawing-line-width">Line width:</label>
			    <span class="info"></span>
			    <input min="0" max="150" id="drawing_line_width" class="freeDrawingInput" type="range" style="display: inline;width: 293px;
vertical-align: middle;">
			    <label for="drawing-color">Line color</label>
			    <input id="drawing-color" type="color" class="freeDrawingInput">
			</div>
		</div>
		<div id="forTextBox" style="display: none;">
			<button id="underline">Underline</button>
			<button id="italic">italic</button>
			<button id="bold">Bold</button>
			<label for="colorTextBox">Color</label>
			<input id="color" type="color" class="textBoxColorInput">
			<label for="size">Size</label>
			<input style="vertical-align: middle;" min="5" max="150" value="40" id="size" type="range">
			<label for="font-control">Font family:</label>
			<select id="font-control" name="font-control">
			<!-- Write all the fonts you want it supports all the fonts provided by HTML -->
  			  <option value="Arial">Arial</option>
   			  <option value="Times New Roman">Times</option>
   			  <option value="Helevetica">Helevetica</option>
			</select>
		</div>
		</div>
	</div>
	<button id="save">Save and download Image</button>
	<div class="content">
		<canvas id="myCanvas" width="580" height="378"></canvas>
	</div> 
	<image id="theimage"></image> 
	<!-- for downloading the image created using canvas and ediiting  -->
	<div class="sideBarLeft">
		<div id="background">
			<div class="heading">
				<span class="name">Background</span>
				<button class="explore">Explore</button>
			</div>
			<div>
			<!-- Add images here it will be seen as small image in pictures box -->
				<!-- <img src="backgroundImages/cat.jpg" id="image1" class="addImage backgroundimage">
				<img src="backgroundImages/cat-01.jpg" id="image2" class="addImage backgroundimage">
				<img src="backgroundImages/img.svg" id="image3" class="backgroundimage">
				<img src="backgroundImages/jsonImage.svg" id="image4" class="backgroundimage"> -->
				<!-- loading all the images of that folder dynamically -->
				<?php
					$files = glob("backgroundImages/*.*");
					for($i=0;$i<count($files);$i++){
						$image = $files[$i];
						$supported_file = ['svg','jpg','jpeg','png'];
						$ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
						if (in_array($ext, $supported_file)) {
							echo '<img src="'.$image .'" alt="Random image" class="addImage backgroundimage" id="image'.$i.'" />';
						} 
						else {
    						continue;
						}
					}
				?>
			</div>
		</div>
		<div id="textbox">
			<div class="heading">
				<span class="name">Textbox</span>
				<button class="explore">Explore</button>
			</div>
			<div>
				<!-- add textbox of different type here -->
					<img src="backgroundImages/textbox.png" class="addTextbox backgroundimage" id="textbox1">
			</div>
		</div>
		<div id="pictures">
			<div class="heading">
				<span class="name">Pictures</span>
				<button class="explore">Explore</button>
			</div>
			<div>
				<!-- what will come here ask John -->
			</div>
		</div>
		<div id="grids">
			<div class="heading">
				<span class="name" >Grids</span>
			</div>
		</div>
		<div id="icons">
			<div class="heading">
				<span class="name">Icons</span>
			</div>
		</div>
		<div id="frames">
			<div class="heading">
				<span class="name">Frames</span>
			</div>
		</div>
	</div>
	<div class="layersRight">
	
	</div>
	<button id="check">Check</button>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
	var i = 0;
	var k = 0; // to set id for images being added
	var j; //to set the value of currently selected element in canvas
	var img = document.createElement('img');
	var canvas = new fabric.Canvas("myCanvas",{selection: false});



	// handling text box things.....  start text box part
	$(".addTextbox").click(function(){
		var text = new fabric.IText('write here',{left: 50 , top :50});
		canvas.add(text);
		canvas.setActiveObject(text);
		text.enterEditing();
		text.selectAll();
		$(".layersRight").append("<div><span class='layer' id='"+k+"'>"+k+"</span>Layer<button class='delete'>Delete this</button></div>");
	    k = k + 1;
	});
	function setStyle(object, styleName, value) {
	  if (object.setSelectionStyles && object.isEditing) {
	    var style = { };
	    style[styleName] = value;
	    object.setSelectionStyles(style);
	  }
	 	else {
	  	 object[styleName] = value;
	  }
	}

	function getStyle(object, styleName) {
	  return (object.getSelectionStyles && object.isEditing)
	    ? object.getSelectionStyles()[styleName]
	    : object[styleName];
	}

	function addHandler(id, fn, eventName) {
	  document.getElementById(id)[eventName || 'onclick'] = function() {
	    var el = this;
	    if (obj = canvas.getActiveObject()) {
	      fn.call(el, obj);
	      canvas.renderAll();
	    }
	  };
	}

	addHandler('underline', function(obj) {
	  var isUnderline = (getStyle(obj, 'textDecoration') || '').indexOf('underline') > -1;
	  setStyle(obj, 'textDecoration', isUnderline ? '' : 'underline');
	});

	addHandler('bold', function(obj) {
 	 	var isBold = getStyle(obj, 'fontWeight') === 'bold';
  		setStyle(obj, 'fontWeight', isBold ? '' : 'bold');
	});
		
	addHandler('italic', function() {
	  var isItalic = getStyle(obj, 'fontStyle') === 'italic';
	  setStyle(obj, 'fontStyle', isItalic ? '' : 'italic');
	});

	addHandler('color', function(obj) {
	  setStyle(obj, 'fill', this.value);
	}, 'onchange');

	addHandler('size', function(obj) {
	  setStyle(obj, 'fontSize', parseInt(this.value, 10));
	}, 'onchange');

	addHandler('font-control',function(obj){
		setStyle(obj,'fontFamily',$('#font-control').val());
	},'onchange');

	// showing hiding for textbox options
	canvas.on('mouse:down', function(options) {
 	 	if (options.target) {
    		if(options.target.type == "i-text")
    		{
    			$("#forTextBox").show();
    		}
    		else
    		{
    			$("#forTextBox").hide();
    		}
  		}
  		else
  		{
  			$("#forTextBox").hide();
  		}
	});

	// textbox part ended





	$(".addImage").click(function(){
		var id = $(this).attr('id');
		image1 = document.getElementById(id); //Jquery selector did not work here
		var imgInstance = new fabric.Image(image1,{
			left: 100,
			top: 100,
			width: 250,
			height: 235,
			id: ""+k+""
		});
		canvas.add(imgInstance);
		$(".layersRight").append("<div><span class='layer' id='"+k+"'>"+k+"</span>Layer<button class='delete'>Delete this</button></div>");
	    k = k + 1;
	});
		
	canvas.on('object:selected', function(e) {
  		if(e.target.type == "image")
  			imageid = "#"+e.target.id;
	});

	canvas.on('object:selected',function(e){
		e.target.bringToFront();
	});

	//If the content is dynamically loaded .click does not work.
	$(document).on("click", ".layer", function(){
		text = $(this).text();
		j = parseInt(text);
		canvas.setActiveObject(canvas.item(j));
	});

	// function for image editing camanjs

		$("#filter").click(function(){
			$("#forfilters").show();
		});

		$('#forfilters > div > input').change(function(){
			applyFilters();
		});

		function applyFilters() {
			if(canvas.getActiveObject()){
				img.src = canvas.getActiveObject().toDataURL();
			   	img.id = 'target';
			   	img.style.display = 'none';
			   	document.body.appendChild(img);
			    var hue = parseInt($('#hue').val());
			    var cntrst = parseInt($('#contrast').val());
			    var vibr = parseInt($('#vibrance').val());
			    var sep = parseInt($('#sepia').val());

			    Caman('#target',function() {
			      this.revert(false);
			      this.hue(hue).contrast(cntrst).vibrance(vibr).sepia(sep);
			      this.render(function(){
			      	canvas.getActiveObject().setSrc(document.getElementById('target').toDataURL(),function(){
			      		canvas.renderAll();
			      	});
			      });
			    });
			}
	  	}

	  // done is needed to be clicked else the function will not work properly
	  $("#done").click(function(){
	  		$("#forfilters").hide();
	  		if(!!document.getElementById('target')){
	  			document.getElementById('target').remove();
		  	}
	  });

	  $("#vintage").click(function(){
	  	img.src = canvas.getActiveObject().toDataURL();
	   	img.id = 'target';
	   	img.style.display = 'none';
	   	document.body.appendChild(img);
	   	Caman('#target',function(){
	   		this.vignette(400);
	   		this.render(function(){
	      	canvas.getActiveObject().setSrc(document.getElementById('target').toDataURL(),function(){
	      		canvas.renderAll();
	      	});
	      });
	   	});
	  });

	  $("#advFilter > ul > li > button").click(function(){
	  	var id1 = $(this).attr('id');
	  	if(id1 != 'vintage'){
	  		if(canvas.getActiveObject()){
	  		img.src = canvas.getActiveObject().toDataURL();
	   		img.id = 'target';
	   		img.height = canvas.getActiveObject().getHeight();
	   		img.width = canvas.getActiveObject().getWidth();
	   		img.left = canvas.getActiveObject().getLeft();
	   		img.top = canvas.getActiveObject().getTop();
	   		img.style.display = '';
	   		$("#myCanvas").append(img);
	   		Caman('#target',function(){
	   		this[id1]();
	      	this.render(function(){
	      	canvas.getActiveObject().setSrc(document.getElementById('target').toDataURL(),function(){
	      		canvas.renderAll();
	      	});
	      });
	   	});
	  	}
	  }
	  });



	//free drawing
    $("#freeDrawing").click(function(){
    	var text = $(this).text();
    	if(text == "Free Drawing") {
    		$(this).html("Stop Free Drawing");
    		$("#forFreeDrawing").show();
    		canvas.isDrawingMode = true;
    	}
    	else{
    	 	canvas.isDrawingMode = false;
    	 	$(this).html("Free Drawing");
    	 	$("#forFreeDrawing").hide();
    	}
    });
    // changing width and color of pencil
    $("#drawing_line_width").change(function(){
       	var width = parseInt($("#drawing_line_width").val());
    	canvas.freeDrawingBrush.width = width;
    });
    $("#drawing-color").change(function(){
    	var color = $("#drawing-color").val();
    	canvas.freeDrawingBrush.color = color;
    });



	$("#reset").click(function(){
		canvas.clear().renderAll();
	});

	//saving image as png
	$("#save").click(function(){
		alert("save click");
		var image = canvas.toDataURL("image/png");
		window.location.href = image;
	});

	// to delete layer
	$(document).on("click", ".delete", function(){
		  var lastItemIndex = (canvas.getObjects().length - 1);
		  var item = canvas.item(lastItemIndex);
		  canvas.remove(item);
		  canvas.renderAll();
		  $(this).parent().remove();
	});

	$(document).keyup(function(e) {
    	if(e.which == 46){
    		if(canvas.getActiveObject()){
    			var id = canvas.getActiveObject().id;
    			$("#"+id).parent().remove();
    			canvas.getActiveObject().remove();
    		}
   	 }    
	});


	// undo redo feature
	var current;
	var list = [];
	var state = [];
	var index = 0;
	var index2 = 0;
	var action = false;
	var refresh = true;

	canvas.on("object:added", function (e) {
	    var object = e.target;

	    if (action === true) {
	        state = [state[index2]];
	        list = [list[index2]];

	        action = false;
	        index = 1;
	    }
	    object.saveState();

	    state[index] = JSON.stringify(object.originalState);
	    list[index] = object;
	    index++;
	    index2 = index - 1;
	    
	    refresh = true;
	});

	canvas.on("object:modified", function (e) {
	    var object = e.target;

	    if (action === true) {
	        state = [state[index2]];
	        list = [list[index2]];

	        action = false;
	        console.log(state);
	        index = 1;
	    }

	    object.saveState();

	    state[index] = JSON.stringify(object.originalState);
	    list[index] = object;
	    index++;
	    index2 = index - 1;

	    refresh = true;
	});

	function undo() {

	    if (index <= 0) {
	        index = 0;
	        return;
	    }
	    
	    if (refresh === true) {
	        index--;
	        refresh = false;
	    }

	    index2 = index - 1;
	    current = list[index2];
	    current.setOptions(JSON.parse(state[index2]));

	    index--;
	    current.setCoords();
	    canvas.renderAll();
	    action = true;
	}

	function redo() {

	    action = true;
	    if (index >= state.length - 1) {
	        return;
	    }

	    index2 = index + 1;
	    current = list[index2];
	    current.setOptions(JSON.parse(state[index2]));

	    index++;
	    current.setCoords();
	    canvas.renderAll();
	}

	$('#undo').click(function () {
	    undo();
	});
	$('#redo').click(function () {
	    redo();
	});

	$("#grid").click(function(){
		var height = canvas.getHeight();
		var width = canvas.getWidth();
		var context = canvas.getContext("2d");

		for (var x = 0.5; x < width; x += 10) {
		  context.moveTo(x, 0);
		  context.lineTo(x, height);
		}

		for (var y = 0.5; y < height; y += 10) {
		  context.moveTo(0, y);
		  context.lineTo(width, y);
		}

		context.strokeStyle = "#ddd";
		context.stroke();
	});


	/*// Test start some problem is there i am unable to fix it for now.I feel if the rectangle that is being selected can be made right we are done. and then clipping part it does not feel exact cropping but it seems ok for our purpose.
	var image,container,mouseDown,disabled,rectangle;
$("#crop").click(function(){
		if($(this).text() == "Crop"){
			$(this).text("Done");
			// set to the event when the user pressed the mouse button down
			// only allow one crop. turn it off after that
			disabled = false;
			rectangle = new fabric.Rect({
			    fill: 'transparent',
			    stroke: '#ccc',
			    strokeDashArray: [2, 2],
			    visible: false
			});
			canvas.add(rectangle);
			image = canvas.getActiveObject();
			container = image.getBoundingRect();
			cont1 = document.getElementById('myCanvas').getBoundingClientRect();
			console.log(container.width);
			image.selectable = false;
			// capture the event when the user clicks the mouse button down
			canvas.on("mouse:down", function(event) {
			    if(!disabled) {
			        rectangle.width = 2;
			        rectangle.height = 2;
			        rectangle.left = event.e.pageX - ((container.left+cont1.left)/2);
			        rectangle.top = event.e.pageY - ((container.top+cont1.top)/2);
			        rectangle.visible = true;
			        mouseDown = event.e;
			        canvas.bringToFront(rectangle);
			    }
			});
			// draw the rectangle as the mouse is moved after a down click
			canvas.on("mouse:move", function(event) {
			    if(mouseDown && !disabled) {
			        rectangle.width = event.e.pageX - mouseDown.pageX;
			        rectangle.height = event.e.pageY - mouseDown.pageY;
			        canvas.renderAll();
			    }
			});
			// when mouse click is released, end cropping mode
			canvas.on("mouse:up", function() {
			    mouseDown = null;
			});
		}
		else{
			    image.clipTo = function(ctx) {
			        // origin is the center of the image
			        var x = rectangle.left - image.getWidth() / 2;
			        var y = rectangle.top - image.getHeight() / 2;
			        ctx.rect(x, y, rectangle.width, rectangle.height);
			    };
			    image.selectable = true;
			    disabled = true;
			    rectangle.visible = false;
			    canvas.renderAll();
			$(this).text("Crop");
		}
	});*/
	// Test end

	$("#toJson").click(function(){
		var x = JSON.stringify(canvas);
		var y = canvas.toSVG();

		var blob = new Blob([x], {type: "text/plain;charset=utf-8"});
		var fileName = "jsonImage.txt";
		saveAs(blob, fileName);

		blob = new Blob([y], {type: "text/plain;charset=utf-8"});
		fileName = "jsonImage.svg";
		saveAs(blob, fileName);
	});

	$("#image4").click(function(){
		jQuery.get('backgroundImages/jsonImage.txt', function(data) {
   		 canvas.loadFromJSON(data).renderAll();
		});
	});

	$("#manualfilter").click(function(){
		$(".col-lg-6").toggle();
		$("#advFilter").toggle();
	});




	// for charting
	$("#save").click(function(){
		$("#chartdiv").jqplotSaveImage();
	});
	var rows = 5;
	var columns = 2;
	var valueArray = [];
	var nameArray = [];
	var Title = "";
	$("#ok").click(function(){
		valueArray = [];
		nameArray = [];
		for(var i=1;i<rows;i++){
			valueArray.push(parseInt($("#"+(i+1)+"_2 > input").val()));
		}
		for(var i=1;i<rows;i++){
			nameArray.push($("#"+(i+1)+"_1 > input").val());
		}
		Title = $("#1_1 > input").val();
	});
	$("#plot").click(function(){
	 	value = $("#choose").val();
	 	if(value == "vertical") vertical();
	 	else if(value == "horizontal") horizontal();
	 	else if(value == "line") line();
	 	else if(value == "pie") pie();
	 	else if(value == "donut") donut();
	 	else if(value == "area") area();
	});
	function vertical(){
		$("#chartdiv").empty();
		$.jqplot.config.enablePlugins = true;
		var data = [valueArray];
	    plot1 = $.jqplot('chartdiv', data, {
	     	seriesDefaults:{
	                renderer:$.jqplot.BarRenderer,
	                pointLabels: { show: true },
	            },
	        axes: {
	        	xaxis: {
	                    renderer: $.jqplot.CategoryAxisRenderer,
	                    ticks: nameArray
	                }
	        },
	        title: Title,
	     	highlighter: { show: false } 
	     });
	}

	function horizontal(){
		$("#chartdiv").empty();
		$.jqplot.config.enablePlugins = true;
	     plot1 = $.jqplot('chartdiv', [valueArray], {
	     	  title: Title,
	     	seriesDefaults:{
	                renderer:$.jqplot.BarRenderer,
	                pointLabels: { show: true },
	                rendererOptions: {
	                    barDirection: 'horizontal'
	                }
	            },
	        axes: {
	        	yaxis: {
	                    renderer: $.jqplot.CategoryAxisRenderer,
	                    ticks: nameArray
	                }
	        },
	     	highlighter: { show: false } 
	     });
	}
	function line(){
		$("#chartdiv").empty();
		plot1 = $.jqplot('chartdiv', [valueArray],{
			title: Title
		});
	}
	function pie(){
		$("#chartdiv").empty();
		plot1 = $.jqplot('chartdiv',[valueArray],{
			title: Title,
			seriesDefaults:{
            renderer:$.jqplot.PieRenderer, 
            trendline:{ show:false }, 
            rendererOptions: { padding: 8, showDataLabels: true }
        }
		});
	}
	function donut(){
		$("#chartdiv").empty();
		plot1 = $.jqplot('chartdiv',[valueArray],{
			title: Title,
			seriesDefaults:{
            renderer:$.jqplot.DonutRenderer,  
            trendline:{ show:false }, 
            rendererOptions: { padding: 8, showDataLabels: true }
        }
		});	
	}
	function area(){
		$("#chartdiv").empty();
		$.jqplot.config.enablePlugins = true;
     	plot1 = $.jqplot('chartdiv', [valueArray], {
     		title: Title,
     		seriesDefaults:{
    	            pointLabels: { show: true },
    	            fill: true
    	        },
    	    axes: {
    	    	xaxis: {
    	                renderer: $.jqplot.CategoryAxisRenderer,
    	                ticks: nameArray
    	            }
    	    },
    	 	highlighter: { show: false } 
    	 });
	}
	//generate table for sample Data 1
	var elem = '<table><tr><th></th>';
	for(var i=0;i<columns;i++)
	{
		elem = elem + '<th>'+String.fromCharCode(65+i)+'</th>';
	}
	elem = elem + '</tr>';
	for(var i=0;i<rows;i++){
		elem = elem + '<tr><td>'+(i+1)+'</td>';
		for(var j = 0;j<columns;j++){
			var txt = ""+(i+1)+"_"+(j+1);
			elem = elem + '<td id="'+txt+'""></td>';
		}
		elem = elem + '</tr>';
	}
	elem = elem + '</table>';
	$("#table").append(elem);

	for(var i=1;i<rows;i++){
		elem = '<input type="text" placeholder="Item '+(i)+'" value="'+(String.fromCharCode(97+i))+'">';
		$("#"+(i+1)+"_1").append(elem);
	}
	for(var i = 1;i<rows;i++){
		elem = '<input type="number" placeholder="'+(i)+'" value="'+(i+1)+'">';
		$("#"+(i+1)+"_2").append(elem);
	}
	$("#1_2").append('<input type="text" placeholder="Year 1">');
	$("#1_1").append('<input type="text" placeholder="Title">');

	$("#zoomInCanvas").click(function(){
		var height = $("#myCanvas").height() + 50;
		var width = $("#myCanvas").width() + 50;

		$("#myCanvas").css("height",height+"px");
		$("#myCanvas").css("width",width+"px");

		height = $(".content").height() + 50;
		width = $(".content").width() + 50;

		$(".content").css("height",height+"px");
		$(".content").css("width",width+"px");

	});
	$("#zoomOutCanvas").click(function(){
		var height = $("#myCanvas").height() - 50;
		var width = $("#myCanvas").width() - 50;

		$("#myCanvas").css("height",height+"px");
		$("#myCanvas").css("width",width+"px");

		height = $(".content").height() - 50;
		width = $(".content").width() - 50;

		$(".content").css("height",height+"px");
		$(".content").css("width",width+"px");
	});

	$("#flipVert").click(function(){
		if(canvas.getActiveObject()){
			// alert(canvas.getActiveObject().type);
			var obj = canvas.getActiveObject();
			obj.set('angle',obj.getAngle()+90).set('flipY', true);;
		}
	});

	$("#flipHori").click(function(){
		if(canvas.getActiveObject()){
			// alert(canvas.getActiveObject().type);
			var obj = canvas.getActiveObject();
			canvas.getActiveObject().set('angle',obj.getAngle()-90).set('flipY', true);;
		}
	});
});
</script>
