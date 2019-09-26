<?php

$connect_string = "host=localhost port=5432 dbname=Web user=admin password=admin";
$dbconnect = pg_pconnect($connect_string);

echo "<link rel=\"stylesheet\" href=\"style.css\">";

$messageGood = "Done!";
$messageBad = "Do not choose!'!";

$sql_add = "";
foreach($_GET as $k => $v) 
{
	if ($k != "add")
	{
		if ( $v == '')
			{
				echo 'Do not choose!';
			}
				
		else 
		{
			$sql_add = "INSERT INTO \"My_training\" " . 
				"VALUES (DEFAULT, DEFAULT, DEFAULT, false, DEFAULT, '" . $v . "')";		
		}
		pg_query($dbconnect, $sql_add);
		echo "<p class=\"done\"><font size=\"+1\">Done!</font></p>";
	}
}
echo "<button><a class=\"butBack\" href=\"handsTrainings.php\">Back</a></button>";

// Закрытие соединения
pg_close($dbconnect);

?>


