<?php  
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		require 'config.php';
		$cat1 =  $_POST["category1"];
		$cat2 =  $_POST["category2"];
		$tableName = $cat1."_".$cat2;
		echo $tableName;

		mysql_connect("$host","$username","$password") or die("Could not connect to MySql");
		mysql_select_db("$db_name") or die("can not connect to database");

		$sql = "SELECT * FROM ".$tableName ." ORDER BY priority DESC";	
		$result = mysql_query($sql);
		if($result){
			$count = mysql_num_rows($result);
			if($count > 0){
				$track = 0;
				while($row = mysql_fetch_array($result)){
					if(($track % 5) == 0){
						echo "<div class='fiveInARow'>";
					}
					echo "<div class='image'>";
					echo "<div class='visual'><a href='sndpage.php?src=".$row["location"]."'><img id = 'image-".$row["id"]."' src='".$row["location"]."'></a></div>";
					echo "<div class='description'><span>".$row["Name"]."</span>";
					echo "</div>";
					echo "</div>";
					if(($track % 5) == 4){
						echo "</div>";
					}
					$track ++;
				}
				if(($track % 5) != 0){
					echo "</div>";
				}
			}
			else{
				echo "No image found...!!!";
			}
		}	
		else{
			echo "Some Error Occured";
		}
	}
?>