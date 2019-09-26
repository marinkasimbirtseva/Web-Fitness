<?php

$connect_string = "host=localhost port=5432 dbname=Web user=admin password=admin";
$dbconnect = pg_pconnect($connect_string);

echo "<link rel=\"stylesheet\" href=\"style.css\">";

$sql_del = "";
foreach($_GET as $k => $v) 
{
	if ($k != "Delete")
	{
		if ( $v == '')
			{
				echo 'Do not choose!';
			}
		else 
		{
			$sql_del = "DELETE FROM \"My_training\" WHERE id_my_tr='".$v."' " ;
		}
		
		pg_query($dbconnect, $sql_del);
		echo "<p class=\"done\"><font size=\"+1\">Done!</font></p>";
	}
}
echo "<button><a class=\"butBack\" href=\"personalProgram.php\">Back</a></button>";

// Закрытие соединения
pg_close($dbconnect);

?>