<?php
        $connect_string = "host=localhost port=5432 dbname=Web-site user=admin password=admin";
        $dbconnect = pg_connect($connect_string);
        $query = "select 'Привет!' as field_1, 123 as field_2";
        $result = pg_query($dbconnect, $query);
        $result = pg_fetch_assoc($result); 
        echo $result['field_1']  ;
        echo   $dbconnect.'</br>' . '</br>';
        echo $result['field_2'];
        pg_close($dbconnect);
?>