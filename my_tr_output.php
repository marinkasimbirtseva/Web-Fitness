<?php

$connect_string = "host=localhost port=5432 dbname=Web user=admin password=admin";
$dbconnect = pg_pconnect($connect_string);

//$query = "SELECT id,name FROM \"Training\" WHERE id_my_tr IN (SELECT id from \"My_training\" )";
$query = "SELECT id_my_tr, id, name FROM \"Training\",\"My_training\" WHERE \"Training\".id=\"My_training\".id_tr";
$result = pg_query($dbconnect, $query);




echo "<form method=\"get\" action=\"del_my_tr.php\">\n";
echo "<table >\n";
$name="name_";
$number=0;
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<td>";
    echo "<input type=\"checkbox\" name=" . $name . $number . " value=" . $line['id_my_tr'] . " />";
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
    echo "\t<tr/>";
    $number+=1;
    pg_free_result($result_ex);
}

    

echo "</table>\n";
//echo "<input class=\"but\" name=\"Done\" type=\"submit\" value=\"Done\">";
echo "<input name=\"Delete\" type=\"submit\" class=\"supbut\" value=\"Delete\">";
echo "</form>\n";



// Очистка результата
pg_free_result($result);

// Закрытие соединения
pg_close($dbconnect);

?>
  

    
    
   
