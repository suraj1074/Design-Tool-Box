<?php
	session_start();
	if(isset($_SESSION["msg"])){
		echo $_SESSION["msg"];
		unset($_SESSION["msg"]);
	}
	error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Add Template
	</title>
</head>
<body>
	<form action="backEndImageAdd.php" method="POST" enctype="multipart/form-data" >
	<input type="file" name="template"><br><br>
	<input type="text" name="Name" placeholder="Name the file"><br><br>
	<?php
		$cat1 = ["Landscape","Forest","WildLife"];
		$cat2 = ["FbPost","twitterPost","Letter","PostCard","VisitingCard"];
		$category = array_merge($cat1,$cat2);
		for($i=0;$i<count($category);$i++){
			echo "<input type='checkbox'  name='check_list[]' value=".$category[$i].">".$category[$i]."<br>";
		}
	?>
	<br>
	<input type="number" name="priority" placeholder="Add priority" min="0" max="10"><br><br>
	<input type="submit" value="Submit">
	</form>
</body>
</html>