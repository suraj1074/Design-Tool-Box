<?php
	if(isset($_GET["src"])){
		$imageFromPreviousPage = $_GET["src"]; 
		echo "<img style='display: none;' id='imageFromPreviousPage' src=".$imageFromPreviousPage.">"; 
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Editing Page</title>
		<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">

		
		<script type="text/javascript" src="js/fabric.js"></script>
		<script src="CamanJS-4.1.1/dist/caman.full.min.js"></script>
		<script type="text/javascript" src="js/FileSaver.min.js"></script>
		<script type="text/javascript" src="js/test.js"></script>
		<script type="text/javascript" src="js/textBox.js"></script>
		<script type="text/javascript" src="js/imageEditing.js"></script>
		<script type="text/javascript" src="js/freeDrawing.js"></script>
		<script type="text/javascript" src="js/undoRedo.js"></script>
		<script type="text/javascript" src="js/zoom.js"></script>
		<script type="text/javascript" src="js/rotate.js"></script>
		<script type="text/javascript" src="js/copyPaste.js"></script>
		<script type="text/javascript" src="js/sticker.js"></script>
		<script type="text/javascript" src="js/addNew.js"></script>
		<script type="text/javascript" src="js/flip.js"></script>
		<script type="text/javascript" src="js/moveBackAndForth.js"></script>
		<script type="text/javascript" src="js/identify.js"></script>
		
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
		<script type="text/javascript" src="js/chart.js"></script>

		
		<!------------Tooltip------------------->
		<link rel="stylesheet" type="text/css" href="css/tooltipster.css" />
		<link rel="stylesheet" type="text/css" href="css/themes/tooltipster-noir.css" />
		<script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>

		<!------------ColorPicker------------------->
		<link rel="stylesheet" type="text/css" href="css/spectrum.css" />
		<script type="text/javascript" src="js/spectrum.js"></script>
		
		<!------------Slider------------------->
		<link rel="stylesheet" type="text/css" href="css/myslider.css" />
		<script type="text/javascript" src="js/jquery.jkit.1.2.16.min.js"></script>
		
		<!------------Custom Scroll------------------->
		<link rel="stylesheet" type="text/css" href="css/jquery.jscrollpane.css" />
		<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>

		
		<script>
        $(document).ready(function() {
            $('.mytooltip').tooltipster( {
				animation: 'grow',
				delay: 200,
				theme: 'tooltipster-noir',
				touchDevices: false,
				trigger: 'hover'
			});
			
			$('.myColorPicker').spectrum({
				showInput: true,
				allowEmpty:true,
				//showAlpha: true,
				showInitial: true,
				preferredFormat: "hex",
				showPaletteOnly: true,
				togglePaletteOnly: true,
				togglePaletteMoreText: 'more',
				togglePaletteLessText: 'less',
				color: 'blanchedalmond',
				palette: [
					["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
					["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
					["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
					["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
					["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
					["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
					["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
					["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
				]
			});
			
			
			$('.carousel').jKit('carousel', { 'autoplay': 'no', 'limit': 11 });
			
			
			

        });
		
		</script>
	</head>
	
	<body style="padding-top: 50px;">
		
		<nav class="navbar navbar-inverse navbar-fixed-top navbar-static-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="sndpage.php">Design ToolBox</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<div class="editTooltop">
						<div class="editTools">
							<img id="filter" src="icons/filtr.png" class="mytooltip" title="Filter" alt="" height="30" width="30" />
							<img id="freeDrawing" src="icons/free_hand.png" class="mytooltip" title="Free Drawing" alt="" height="30" width="30"/> 
							<img id="undo" src="icons/undo.png" class="mytooltip" title="Undo" alt="" height="30" width="30"/> 
							<img id="redo" src="icons/redo.png" class="mytooltip" title="Redo" alt="" height="30" width="30"/> 
							<a href="#openModal"><img src="icons/chart.png" class="mytooltip" title="Chart" alt="" height="30" width="30"/></a>
							<img id="zoomInCanvas" src="icons/zoom_in.png" class="mytooltip" title="Zoom in" alt="" height="30" width="30"/> 
							<img id="zoomOutCanvas" src="icons/zoom_out.png" class="mytooltip" title="Zoom out" alt="" height="30" width="30"/> 
							<img id="flipVert" src="icons/rotate_left.png" class="mytooltip" title="Rotate Left" alt="" height="30" width="27"/> 
							<img id="flipHori" src="icons/rotate_right.png" class="mytooltip" title="Rotate Right" alt="" height="30" width="27"/> 
							<img id="fv" src="icons/flip1.png" class="mytooltip" title="Flip Vertical" alt="" height="30" width="30"/> 
							<img id="fh" src="icons/flip2.png" class="mytooltip" title="Flip Horizontal" alt="" height="30" width="30"/> 
							<img id="cut" src="icons/cut.png" class="mytooltip" title="Cut" alt="" height="30" width="30"/> 
							<img id="copy" src="icons/copy.png" class="mytooltip" title="Copy" alt="" height="30" width="30"/> 
							<img id="paste" src="icons/paste.png" class="mytooltip" title="Paste" alt="" height="30" width="30"/> 
							<img id="shapes" src="icons/shape.png" class="mytooltip" title="Shapes" alt="" height="30" width="30"/> 
							<img id="addNew" src="icons/add_new.png" class="mytooltip" title="Add New Canvas" alt="" height="30" width="30"/> 
							<img id="reset" src="icons/clear.png" class="mytooltip" title="Clear Canvas" alt="" height="30" width="30"/> 
							<img id="toJson" src="icons/json.png" class="mytooltip" title="To JSON" alt="" height="30" width="30"/>							
							<img id="save-as-png" src="icons/download.png" class="mytooltip" title="Save & Download" alt="" height="30" width="30"/> 
							<input type="color" class="myColorPicker" id="backgroundColor" value="BackgroundColor">
							<li class="dropdown" style="display:inline-block;margin-left:18px;">
								<img id="moveBackAndForth" src="icons/arrange.png" alt="" class="dropdown-toggle mytooltip" data-toggle="dropdown" title="Arrange" height="30" width="30"/>
								<ul class="dropdown-menu" style="background-color:black;color:white;border-color:white;">
									<li class="myarrange" id="sendBackwards"><i class="myicon" style="background-position: -0px -48px;"></i> Send Backward</li>
									<li class="myarrange" id="sendToBack"><i class="myicon" style="background-position: -0px -72px;"></i> Send to Back</li>
									<li class="myarrange" id="bringForward"><i class="myicon" style="background-position: -0px -0px;"></i> Bring Forward</li>
									<li class="myarrange" id="bringToFront"><i class="myicon" style="background-position: -0px -24px;"></i> Bring to Front</li>
								</ul>
							</li>
						</div> <!--------------------./editTooltop--------------------------->

						<div id="openModal" class="modalDialog">
							<div><a href="#close" title="Close" class="close">X</a>
								<div>
									<div class="row">
										<div class="col-md-6">
											<div class="row">
												<div class="col-md-12" id="table">
													<div class="row">
														<div class="col-md-4"><input type="text" id="labelX" class="form-control" placeholder="labelX" value="labelX"></div>
														<div class="col-md-4"><input type="text" id="labelY" class="form-control" placeholder="labelY" value="labelY"></div>
														<div class="col-md-4">
															<img src="icons/plus.png" id="addNewRow" class="mytooltip" title="Add New Row" alt="" height="30" width="30" style="cursor:pointer;"/>
															<img src="icons/minus.png" id="deleteRow" class="mytooltip" title="Delete Row" alt="" height="30" width="30" style="cursor:pointer;"/>
														</div>
													</div>
													
												</div>
											</div>
											
											<div class="row" id="options">
												<div class="col-md-6">
													<select id="choose" class="form-control">
														<option value="vertical">Vertical Bar</option>
														<option value="horizontal">Horizontal Bar</option>
														<option value="line">Line</option>
														<option value="area">Area</option>
														<option value="pie">pie</option>
														<option value="donut">Donut</option>
													</select>
												</div>
												<div class="col-md-6"><img src="icons/data.png" id="plot" class="mytooltip" title="Plot" alt="" height="30" width="30" style="cursor:pointer;"/></div>
											</div>
											
										</div>
										
										
										<div class="col-md-6">
											<div class="row">
												<div class="col-md-12" id="chartdiv" style="height:400px;width:400px;margin-bottom:10px;"></div>
											</div>
											<div class="row">
												<div class="col-md-6"></div>
												<div class="col-md-2"><button id="save" class="btn btn-info mybtn" disabled>Save</button></div>
												<div class="col-md-4"><button id="insert" class="btn btn-info mybtn" disabled>Insert Chart</button></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> <!-------------------./chartmodal-------------------------->

						
					</div>
				</ul>
				</div>
			</div>
		</nav><!---------------------./navbar----------------------------->

		
		<!---------------------------------------Filter----------------------------------------------->
		<div class="container">
			<div class="row">
				<div class="col-md-12" style="position:fixed;z-index:1000;height:20px;">
					<div class="subCategory">
						<div id="forfilters">

							<div class="row">
								<div class="col-md-12" id="c" style="padding-top: 24px;">
									<div class="myinlinediv">
										<img src="manual/hue.png" class="mytooltip" title="Hue" alt="" height="20" width="22"/>
									</div>
									<div class="myinlinediv mypadding">
										<input id="hue" class="mytext" name="hue" min="0" max="300" value="0" type="range">
									</div>
									
									<div class="myinlinediv">
										<img src="manual/contrast.png" class="mytooltip" title="Contrast" alt="" height="20" width="22"/>
									</div>
									<div class="myinlinediv mypadding">
										<input id="contrast" class="mytext" name="contrast" min="-20" max="20" value="0" type="range">
									</div>
									
									<div class="myinlinediv">
										<img src="manual/brightness.png" class="mytooltip" title="Brightness" alt="" height="20" width="22"/>
									</div>
									<div class="myinlinediv mypadding">
										<input id="brightness" class="mytext" name="brightness" min="-100" max="100" value="0" type="range">
									</div>
									
									<div class="myinlinediv">
										<img src="manual/saturation.png" class="mytooltip" title="Saturation" alt="" height="20" width="22"/>
									</div>
									<div class="myinlinediv mypadding">
										<input id="saturation" class="mytext" name="saturation" min="-100" max="100" value="0" type="range">
									</div>
									<br/>
									<br/>
									
									<div class="myinlinediv">
										<img src="manual/vibrance.png" class="mytooltip" title="Vibrance" alt="" height="20" width="22"/>
									</div>
									<div class="myinlinediv mypadding">
										<input id="vibrance" class="mytext" name="vibrance" min="0" max="400" value="0" type="range">
									</div>
									
									<div class="myinlinediv">
										<img src="manual/sepia.png" class="mytooltip" title="Sepia" alt="" height="20" width="22"/>
									</div>
									<div class="myinlinediv mypadding">
										<input id="sepia" class="mytext" name="sepia" min="0" max="100" value="0" type="range">
									</div>
									
									<div class="myinlinediv">
										<img src="manual/gamma.png" class="mytooltip" title="Gamma" alt="" height="20" width="22"/>
									</div>
									<div class="myinlinediv mypadding">
										<input id="gamma" class="mytext" name="gamma" min="0" max="10" value="0" type="range">
									</div>
									
									<div class="myinlinediv">
										<img src="manual/noise.png" class="mytooltip" title="Noise" alt="" height="20" width="22"/>
									</div>
									<div class="myinlinediv mypadding">
										<input id="noise" class="mytext" name="noise" min="0" max="100" value="0" type="range">
									</div>
									
								</div>
								
								
							</div>
								
								
								<div class="row">
								<div class="col-md-10" style="left: -4.5%;width: 1240px;">
								
								<div id="advFilter">
									<div id="presetFilters">
										<!--<li> <button id="normal">Normal</button> </li>-->
										
										<div class="carousel">
																					
											<div class="carousel-item">
												<div><img id="vintage" src="filter_img/vintage.jpg" class="mytooltip" title="Vintage" alt="" height="100" width="100" /></div>
											</div>
											<div class="carousel-item">
												<div><img id="lomo" src="filter_img/lomo.jpg" class="mytooltip" title="Lomo" alt="" height="100" width="100" /></div>
											</div>
											<div class="carousel-item">
												<div><img id="clarity" src="filter_img/clarity.jpg" class="mytooltip" title="Clarity" alt="" height="100" width="100" /></div>
											</div>
											<div class="carousel-item">
												<div><img id="sinCity" src="filter_img/sincity.jpg" class="mytooltip" title="Sin City" alt="" height="100" width="100" /></div>
											</div>
											<div class="carousel-item">
												<div><img id="sunrise" src="filter_img/sunrise.jpg" class="mytooltip" title="Sunrise" alt="" height="100" width="100" /></div>
											</div>
											<div class="carousel-item">
												<div><img id="pinhole" src="filter_img/pinhole.jpg" class="mytooltip" title="Pinhole" alt="" height="100" width="100" /></div>
											</div>
											<div class="carousel-item">
												<div><img id="crossProcess" src="filter_img/crossprocessing.jpg" class="mytooltip" title="Cross Process" alt="" height="100" width="100" /></div>
											</div>
											<div class="carousel-item">
												<div><img id="orangePeel" src="filter_img/orangepeel.jpg" class="mytooltip" title="Orange Peel" alt="" height="100" width="100" /></div>
											</div>
											
											<div class="carousel-item">
												<div><img id="love" src="filter_img/love.png" class="mytooltip" title="Love" alt="" height="100" width="100" /></div>
											</div>
											<div class="carousel-item">
												<div><img id="grungy" src="filter_img/grungy.png" class="mytooltip" title="Grungy" alt="" height="100" width="100" /></div>
											</div>
											<div class="carousel-item">
												<div><img id="jarques" src="filter_img/jarques.png" class="mytooltip" title="Jarques" alt="" height="100" width="100" /></div>
											</div>
											
											<div class="carousel-item">
												<div><img id="oldBoot" src="filter_img/oldboot.png" class="mytooltip" title="Old Boot" alt="" height="100" width="100" /></div>
											</div>
											<div class="carousel-item">
												<div><img id="hazyDays" src="filter_img/hazydays.png" class="mytooltip" title="Hazy Days" alt="" height="100" width="100" /></div>
											</div>
											
											<div class="carousel-item">
												<div><img id="herMajesty" src="filter_img/hermajesty.png" class="mytooltip" title="Her Majesty" alt="" height="100" width="100" /></div>
											</div>
											<div class="carousel-item">
												<div><img id="nostalgia" src="filter_img/nostalgia.png" class="mytooltip" title="Nostalgia" alt="" height="100" width="100" /></div>
											</div>
											<div class="carousel-item">
												<div><img id="hemingway" src="filter_img/hemingway.png" class="mytooltip" title="HemingWay" alt="" height="100" width="100" /></div>
											</div>
											<div class="carousel-item">
												<div><img id="concentrate" src="filter_img/concentrate.png" class="mytooltip" title="Concentrate" alt="" height="100" width="100" /></div>
											</div>
											<div class="carousel-item">
												<div><img id="invert" src="filter_img/invert.png" class="mytooltip" title="Invert" alt="" height="100" width="100" /></div>
											</div>
											<div class="carousel-item">
												<div><img id="greyscale" src="filter_img/greyscale.png" class="mytooltip" title="Greyscale" alt="" height="100" width="100" /></div>
											</div>
										</div>
										
									</div>
								</div>
								
								</div>
								
								
								
								<div class="row">
								<div class="col-md-12" style="height:10px;">
								
								</div>
								</div>
								</div>
								<div class="col-md-2" style="width:20px;top:-110px;left: 1130px;">
									<img id="manualfilter" src="icons/manual.png" class="mytooltip" title="Manual Filter" alt="" height="20" width="20" style="cursor:pointer"/><br/><br/>
									<img id="tick" src="icons/tick.png" class="mytooltip" title="Done" alt="" height="20" width="20" style="cursor:pointer"/><br/><br/>
									<img id="done" src="icons/close.png" class="mytooltip" title="Cancel" alt="" height="20" width="20" style="cursor:pointer"/>
								</div>
						</div> <!-----------/.forfilters------------>
						
					</div> <!-------/.subCategory------------>
				</div>
			</div>
			
			
			<!---------------------------------------Line Filter----------------------------------------------->
			<div class="row">
				<div class="col-md-12" style="margin-top: 2px;position:fixed;width: 1270px;left:3%;z-index:1000">
					<div class="subCategory">
						<div id="forFreeDrawing" style="display: none;z-index: 500;">
							<div id="drawing-mode-options">
								<div class="row" style="background-image: linear-gradient(to bottom, #f5f5f5 0px, #e8e8e8 100%);background-repeat: repeat-x;padding:6px;border-radius:10px;border:1px solid black;margin-bottom:10px;">
									<div class="col-md-2"></div>
									<div class="col-md-2">
										<label for="drawing-line-width">Line width:</label>
									</div>
									<div class="col-md-2">
										<select id="drawing_line_width" class="freeDrawingInput form-control">
										
										</select>
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-2">
										<label for="drawing-color">Line color:</label>
									</div>
									<div class="col-md-2">
										<input id="drawing-color" type="text" class="freeDrawingInput form-control myColorPicker">
									</div>
									<div class="col-md-1"><img id="drawdone" src="icons/close.png" class="mytooltip" title="Stop" alt="" height="20" width="20" style="cursor:pointer"/></div>
								</div>
								
									<!--<span class="info"></span>-->
									
									<!-- <input min="0" max="150" id="drawing_line_width" class="freeDrawingInput" type="range" style="display: inline;width: 293px;vertical-align: middle;"> -->
									
									
							</div>
						</div> <!-----------/.forFreeDrawing------------>
						
					</div> <!-------/.subCategory------------>
				</div>
			</div>
			
			
			<!---------------------------------------Text Filter----------------------------------------------->
			<div class="row">
				<div class="col-md-12" style="margin-top: 2px;position:fixed;width: 1270px;left:3%;z-index:1000">
					<div class="subCategory">
						<div id="forTextBox" style="display: none;">
						
							<div class="row" style="background-image: linear-gradient(to bottom, #f5f5f5 0px, #e8e8e8 100%);background-repeat: repeat-x;padding:6px;border-radius:10px;border:1px solid black;margin-bottom:10px;">
								<div class="col-md-1">
									<img id="underline" src="icons/underline.png" class="mytooltip" title="Underline" alt="" height="20" width="20" style="cursor:pointer"/>
								</div>
								<div class="col-md-1">
									<img id="italic" src="icons/italic.png" class="mytooltip" title="Italic" alt="" height="20" width="20" style="cursor:pointer"/>
								</div>
								<div class="col-md-1">
									<img id="bold" src="icons/bold.png" class="mytooltip" title="Bold" alt="" height="20" width="20" style="cursor:pointer"/>
								</div>
								<div class="col-md-1">
									<label for="colorTextBox">Color:</label>
								</div>
								<div class="col-md-2">
									<input id="color" type="color" class="textBoxColorInput form-control myColorPicker">
								</div>
								<div class="col-md-1">
									<label for="size">Size:</label>
								</div>
								<div class="col-md-1">
									<select id="font-size" name="size" class="form-control"></select>
								</div>
								<div class="col-md-2">
									<label for="font-control">Font family:</label>
								</div>
								<div class="col-md-2">
									<!-- Write all the fonts you want it supports all the fonts provided by HTML -->
									<select id="font-control" name="font-control" class="form-control">
										<option value="Arial">Arial</option>
										<option value="Times New Roman">Times</option>
										<option value="Helevetica">Helevetica</option>
									</select>
								</div>
							</div>
							
						</div> <!-----------/.forTextBox------------>
						
					</div> <!-------/.subCategory------------>
				</div>
			</div>
			
			
			<!---------------------------------------Main Component--------------------------------------------->
			
			<div class="row" id="mycomponent">
				<div id="displaypanel">
				<div class="col-md-3" style="padding-top:10px;position:fixed;left:2%;">
					<!---------------------------------------Left Tab(Accordion)----------------------------------------------->
					<div class="panel-group" id="accordion">
						<div class="panel panel-default" id="background">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Background</a>
								</h4>
							</div>
							<div id="collapse1" class="panel-collapse collapse in">
								<div class="panel-body">
									<div class="images">
										<!-- loading all the images of that folder dynamically -->
										<?php
											$files = glob("backgroundImages/*.*");
											for($i=0;$i<count($files);$i++)
											{
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
							</div>
						</div>
						
						<div class="panel panel-default" id="textbox">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Textbox</a>
								</h4>
							</div>
							<div id="collapse2" class="panel-collapse collapse">
								<div class="panel-body">
									<div>
										<!-- add textbox of different type here -->
										<img src="icons/text.png" class="addTextbox backgroundimage" id="textbox1">
									</div>
								</div>
							</div>
						</div>
						
						<div class="panel panel-default" id="pictures">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Pictures</a>
								</h4>
							</div>
							<div id="collapse3" class="panel-collapse collapse">
								<div class="panel-body">
								</div>
							</div>
						</div>
						
						<div class="panel panel-default" id="grids">
							<div class="panel-heading">
								<h4 class="panel-title">
								  <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Grids</a>
								</h4>
							</div>
							<div id="collapse4" class="panel-collapse collapse">
								<div class="panel-body">
								</div>
							</div>
						</div>
						
						<div class="panel panel-default" id="icons">
							<div class="panel-heading">
								<h4 class="panel-title">
								  <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Icons</a>
								</h4>
							</div>
							<div id="collapse5" class="panel-collapse collapse">
								<div class="panel-body">
								</div>
							</div>
						</div>
						
						<div class="panel panel-default" id="frames">
							<div class="panel-heading">
								<h4 class="panel-title">
								  <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Frames</a>
								</h4>
							</div>
							<div id="collapse6" class="panel-collapse collapse">
								<div class="panel-body">
								</div>
							</div>
						</div>
						
						<div class="panel panel-default" id="">
							<div class="panel-heading">
								<h4 class="panel-title">
								  <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">Sticker</a>
								</h4>
							</div>
							<div id="collapse7" class="panel-collapse collapse">
								<div class="panel-body">
									<button id="sticker">Sticker</button>
								</div>
							</div>
						</div>
						
					</div> <!--------------./panel-group-------------->
					
				</div> <!--------------./col-md-3-------------->
				
				
				<!---------------------------------------Canvas--------------------------------------------->
				<div class="col-md-7" style="left:25%;">
					<div class="content">
						<canvas id="c1" width="640" height="450"></canvas>
					</div>
				</div>
				
				
				<!---------------------------------------Right Tab--------------------------------------------->
				<div class="col-md-2" style="position:fixed;right:2%;">
					<div class="layersRight" style="max-height:320px;overflow: auto;">
						<div id="canvas-1" class="canvasLayer"><h4 class="hi" style="background-image:none;background-color:#a2c4c9">Canvas 1</h4></div>
					</div>
				</div>
				
			</div> <!--------------./row-------------->
			
			<!---------------------------------------End Main Component----------------------------------------------->
			</div>
		</div> <!--------------./container(starting at filter)-------------->
		
		
	</body>
</html>


<script type="text/javascript">
    var names = [];
    var objects = [];
	var canvas1 =  new fabric.Canvas("c1",{selection: false});
	var canvas = canvas1;
	var canvasScale;
	names.push(canvas1);
	var i = 0;
	var noOfObjects = 0; // to set id for images being added
	var j; //to set the value of currently selected element in canvas
	var canvasId = 2;
	var presentCanvas = 1; // to know which canvas is being selected
	var SCALE_FACTOR = 1.2;
	var img = document.createElement('img');
	var numOfGraphs = 0;
	$(document).ready(function() {

		function add_layer(type,id){
			$("#canvas-"+presentCanvas).append('<p class="hello" id='+noOfObjects+'>'+type+'</p>');
		}
		
		function zoomAdjust(object){
			var scaleX = object.scaleX;
			var scaleY = object.scaleY;
			var left = object.left;
			var top = object.top;
								
			var tempScaleX = scaleX * canvasScale;
			var tempScaleY = scaleY * canvasScale;
			var tempLeft = left * canvasScale;
			var tempTop = top * canvasScale;
								
			object.scaleX = tempScaleX;
			object.scaleY = tempScaleY;
			object.left = tempLeft;
			object.top = tempTop;
								
			object.setCoords();
		}
		
		// addImage for the first time
		<?php if(isset($_GET['src']) && !empty($_GET['src']))
		{?>
			var imageId = "imageFromPreviousPage";
			image1 = document.getElementById(imageId); //Jquery selector did not work here
			console.log(image1.src);
			var ext = image1.src.split('.').pop();
			var imgInstance;
			
			var objectId = "image"+noOfObjects;
			if(ext == 'svg'){
				var x = image1.getBoundingClientRect().width;
				var y = image1.getBoundingClientRect().height;
			
				// alert("x is "+x+" y is "+y);
				var group = [];
				imgInstance = fabric.loadSVGFromURL(image1.src, function(objects,options) { 
				          var loadedObjects = new fabric.Group(group); 
				          loadedObjects.set({ 
				          left: 10, 
				          top: 10,
				          width: y,
				          height: x,
				          id: objectId
						});  	
				        zoomAdjust(loadedObjects);
				        canvas.add(loadedObjects);
				        canvas.setActiveObject(loadedObjects); 
				        canvas.renderAll(); 
				},
				
				function(item, object) {
					object.set('id', item.getAttribute('id'));
					group.push(object);
				}); 
			}
			
			else { 
				imgInstance = new fabric.Image(image1,{
					left: 0,
					top: 0,
					width: 640,
					height: 450,
					id: objectId
				});

				imgInstance.hasControls = imgInstance.hasBorders = false;
				imgInstance.selectable = false;
				zoomAdjust(imgInstance);
				canvas.add(imgInstance);
				canvas.renderAll();
			}
			add_layer("image",objectId);
			noOfObjects ++;
		<?php } ?>
	
	
		$("#reset").click(function(){
			canvas.clear().renderAll();
			
		});

		//saving image as png
		$("#save-as-png").click(function(){
			// alert("save click");
			canvas.deactivateAll();
			var image = canvas.toDataURL("image/png");
			window.location.href = image;
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


		$("#manualfilter").on('click',function(){
			$("#c").toggle();
			$("#advFilter").toggle();
		});

		$("#backgroundColor").change(function(){
			var value = $("#backgroundColor").val();
			var obj = canvas.getActiveObject();
			if(!obj){
				canvas.setBackgroundColor(value);
				canvas.renderAll();
			}
			else{
				canvas.getActiveObject().setBackgroundColor(value);
				canvas.renderAll();
			}
		});

		//to load font-size
		var min = 10,max = 40;
		for(var i = min;i<max;i = i+2){
			$("#font-size").append('<option value="'+i+'">'+i+'</option>');
		}
		min = 10; max = 50;
		for(var i = min;i<max;i+=5){
			$("#drawing_line_width").append('<option value="'+i+'">'+i+'</option>');
		}

        $(document).on("click", ".canvasLayer", function(){
			
			$('.hi').removeAttr('style');
			$(this).children('h4').css({'background-image':'none','background-color': '#a2c4c9'});
			
        	var canvasId = $(this).attr('id');
        	canvasId = canvasId.split('-').pop();
        	canvas = names[canvasId-1];
        	presentCanvas = canvasId;
        	// alert(presentCanvas);
        });
        $(document).on("click", ".hello", function(){
        	var layerId = $(this).attr('id');
        	// alert(canvas.item(0));
        	canvas.setActiveObject(canvas.item(layerId));
        });
		
		
		
		$(document).on('click','.canvasclosex',function(){
			var aid = $(this).attr('id');
			var divid = $(this).closest('div').attr('id');
			$('#'+divid).remove();
			$('#c'+aid).closest('div').remove();			
		});
		
	});
</script>