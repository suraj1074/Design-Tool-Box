<?php
	$cat1 = ["All","Landscape","Forest","WildLife"];
	$cat2 = ["All","FbPost","twitterPost","Letter","PostCard","VisitingCard"];

	$host = "localhost";
	$username = "root";
	$password = "";
	$db_name = "designToolBox";
	mysql_connect("$host","$username","$password") or die("Could not connect to MySql");
	mysql_select_db("$db_name") or die("can not connect to database");

	for($i=0;$i<count($cat1);$i++){
		for($j=0;$j<count($cat2);$j++){
			$name = $cat1[$i]."_".$cat2[$j];
			$sql = "CREATE TABLE ".$name." (
		    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		    Name VARCHAR(1000) NOT NULL,
		    location TEXT NOT NULL,
		    priority INT(6)
		    )";

			if(mysql_query($sql)){
				echo $name."created<br>";
			}
			else{
				echo $name."Not created<br>";
			}
		}
	}

?>	