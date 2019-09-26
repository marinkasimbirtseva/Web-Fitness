<?php

$connect_string = "host=localhost port=5432 dbname=Web user=admin password=admin";
$dbconnect = pg_pconnect($connect_string);

$query = "SELECT id,name FROM \"Training\" WHERE direction='Hands'";
$result = pg_query($dbconnect, $query);


echo "<form method=\"get\" action=\"save_trainings_as_my.php\">\n";
echo "<table>\n";
$name="name_";
$number=0;
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<td>";
    echo "<input type=\"checkbox\" name=" . $name . $number . " value=" . $line['id'] . " />";
    echo "</td>";
    echo "\t\t<th id=\"colore\">".$line['name']."</th>\n";

    $que_ex = "SELECT name,set,rep FROM \"Exercise\" WHERE id_tr=" . $line['id'];
    $result_ex = pg_query($dbconnect, $que_ex);

    while ($line_ex = pg_fetch_array($result_ex, null, PGSQL_ASSOC)){
        echo "\t<tr>";
        foreach ($line_ex as $col_value) {        
            echo "\t<td>$col_value</td>\n";
        }
        echo "\t</tr>";
    }
    echo "\t</tr>";
    
    $number+=1;
    pg_free_result($result_ex);
}
echo "</table>\n";
echo "<input name=\"add\" type=\"submit\" class=\"supbut\" value=\"Add\">";
echo "<button><a class=\"but\" href=\"chooseProgram.html\">Back</a></button>";
echo "</form>\n";

// Очистка результата
pg_free_result($result);

// Закрытие соединения
pg_close($dbconnect);

?>


