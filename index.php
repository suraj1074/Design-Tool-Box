<!DOCTYPE html>
<html>
<head>
	<title>Main Page</title>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/selection.js"></script>
	<script type="text/javascript" src="js/selectImage.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="js/jquery.form.min.js"></script>
		
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/verticalmenu.css">
	
	<script>
	$(document).ready(function() {
		$('#uploadform').submit(function() {
			$(this).ajaxSubmit({
				success:function(data) {
					alert(data);
					$.getScript("js/selection.js");
					$('#myModal').modal('hide');
				}
			});
			
			return false;
		});
	});
	</script>
	
	
</head>
<body>
	<?php
		$category1 = ["All","Landscape","Forest","WildLife"];
	?>
	<nav class="navbar navbar-inverse navbar-static-top" style="margin-bottom:0px;">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="index.php" style="margin-right: 50px;">Design ToolBox</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav" id="category1">
				<?php
					for($i=0;$i<count($category1);$i++){
						echo "<li class='category1 myds' id='category1-".$category1[$i]."'><a href='#'>".$category1[$i]."</a></li>";
					}	
				?>
				
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" data-toggle="modal" data-target="#myModal">Upload Image</a></li>
				<!--<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">Separated link</a></li>
					</ul>
				</li>-->
			</ul>
	  
			</div>
			
			
  
		</div>
	</nav><!--./navbar-->
	<?php
		$category2 = ["All","FbPost","twitterPost","Letter","PostCard","VisitingCard"];
	?>
	<div class="container-fluid">
	<div class="row">
		<div class="col-sm-2" style="padding-left: 0px">
			<div class="sidebar-nav">
			<div class="navbar navbar-inverse navbar-static-top" role="navigation" style="height: 560px;">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<span class="visible-xs navbar-brand">Sidebar menu</span>
				</div>
				<div class="navbar-collapse collapse sidebar-navbar-collapse">
					<ul class="nav navbar-nav" id="category2">
						<?php
							for($i=0;$i<count($category2);$i++){
								echo "<li class='category2 myds2' id='category2-".$category2[$i]."'><a href='#'>".$category2[$i]."</a></li>";
							}	
						?>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
			</div>
		</div>
	
		<div class="col-sm-10">
			<div id="result"></div>
		</div>
	
	</div>
	
	</div>
	
	
	<div id="footer" class="container">
		<nav class="navbar navbar-inverse navbar-fixed-bottom">
			<div class="navbar-inner navbar-content-center">
				<font color="white" style="float:right;padding-right:10px;">&copy; 2016-17 <a href="#">Xeality It Technologies Pvt. Ltd.</a></font>
			</div>
		</nav>
	</div>
	
	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				
				<form id="uploadform" action="backEndImageAdd.php" method="post" enctype="multipart/form-data">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Upload Image</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4">Select Image :</div>
						<div class="col-md-8"><input type="file" name="img_file" id="img_file" required/></div>
					</div><br/>
					<div class="row">
						<div class="col-md-4">Image Name :</div>
						<div class="col-md-8"><input type="text" name="img_name" id="img_name" placeholder="Name the file" class="form-control" required/></div>
					</div><br/>
					<div class="row">
						<div class="col-md-4">Select Category :</div>
						<div class="col-md-8">
							<select name="category" id="category" class="form-control">
								<option value="fbpost">FbPost</option>
								<option value="twitterpost">twitterPost</option>
								<option value="letter">Letter</option>
								<option value="postcard">PostCard</option>
								<option value="visitingcard">VisitingCard</option>
							<select>
						</div>
					</div><br/>
					
					<div class="row">
						<div class="col-md-4">Select Sub-Category :</div>
						<div class="col-md-8">
							<select name="subcategory[]" id="subcategory" class="form-control" multiple>
								<option value="Landscape">Landscape</option>
								<option value="Forest">Forest</option>
								<option value="WildLife">WildLife</option>
							<select>
						</div>
					</div><br/>
					
					<div class="row">
						<div class="col-md-4">Add Priority :</div>
						<div class="col-md-8">
							<input type="number" name="priority" placeholder="Add priority" min="0" max="10">
						</div>
					</div><br/>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" name="savebtn" id="savebtn">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				
				</form>
				
			</div>
		</div>
	</div>
			
			

	<?php
		/*$category1 = ["All","Landscape","Forest","WildLife"];
		$category2 = ["All","FbPost","twitterPost","Letter","PostCard","VisitingCard"];
		echo "<div id='category1'>";
		for($i=0;$i<count($category1);$i++){
			echo "<button class='category1' id='category1-".$category1[$i]."'>".$category1[$i]."</button>";
		}
		echo "</div>";
		echo "<br><br>";
		echo "<div id='category2'><ul>";
		for($i=0;$i<count($category2);$i++){
			echo "<li><button class='category2' id='category2-".$category2[$i]."'>".$category2[$i]."</button></li>";
		}
		echo "</ul></div>";*/
	?>
	<!--<div id="result"></div>
	<button id="goToNextPage"style="position: absolute; right: 207px; bottom: 139px;">Go</button>-->
	
</body>
</html>