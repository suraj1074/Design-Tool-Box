<?php
	//session_start();
	//error_reporting(E_ALL);
	require 'config.php';	
	$error = 0;
	$fileName = $_POST["img_name"];
	$priority = $_POST["priority"];
	$targetDir = realpath(dirname(__FILE__));
	$targetFile = $targetDir."/backgroundImages/".basename($_FILES["img_file"]["name"]);
	$link = "";
	if (file_exists($targetFile)) 
	{
    	echo "Sorry, a file already exists with same name.";
	}
	else
	{
		if(move_uploaded_file($_FILES["img_file"]["tmp_name"], $targetFile))
		{
			//echo $fileName." uploaded at ".$targetFile;
			$link = "backgroundImages/".basename($_FILES["img_file"]["name"]);
		}
		else
		{
			switch ($_FILES['img_file']['error'])
			{
				case 1:
					echo "<p>The file is bigger than allowed.</p>"; break;
				case 2:
					echo "File bigger than allowed by form"; break;
				case 3:
					echo "File uplaoded partially."; break;
				case 4:
					echo "File not uploaded"; break;
			}
			$error = 1;
		}
		if(!$error)
		{
			$selected = [];
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				if(!empty($_POST['subcategory'])) 
				{
					//print_r($_POST['subcategory']);
					foreach($_POST['subcategory'] as $check) {
						array_push($selected, $check);
					}
				}
		
				$cat1 = ["All","Landscape","Forest","WildLife"];
				$cat2 = ["All","FbPost","twitterPost","Letter","PostCard","VisitingCard"];

				$modified1 = [];
				$modified2 = [];

				for($i=0;$i<count($selected);$i++)
				{
					if(in_array($selected[$i],$cat1)){
						array_push($modified1, $selected[$i]);
					}
					else if(in_array($selected[$i], $cat2)){
						array_push($modified2, $selected[$i]);
					}
				}
				
				array_push($modified1, "All");
				array_push($modified2, "All");

				mysql_connect("$host","$username","$password") or die("Could not connect to MySql");
				mysql_select_db("$db_name") or die("can not connect to database");
		
				for($i=0;$i<count($modified1);$i++)
				{
					for($j=0;$j<count($modified2);$j++){
						$table_name = $modified1[$i]."_".$modified2[$j];
						$sql = "INSERT INTO ".$table_name."(Name,Location,priority) VALUES ('$fileName','$link','$priority')";
						if(mysql_query($sql)){
							//echo "Added to ".$table_name."<br><br>";
						}
						else
						{
							$error = 1;
							echo "Error....!!";
						}
					}
				}
			}
			
			if(!$error) echo "File Uploaded Successfully";
		}
	}
?>