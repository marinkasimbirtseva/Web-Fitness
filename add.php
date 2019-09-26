<?php

$connect_string = "host=localhost port=5432 dbname=Web-site user=admin password=admin";
$dbconnect = pg_connect($connect_string);



if ( $_GET['check'] == '')
{
echo 'Do not choose!';
}
  else {
    $sql_add = "INSERT INTO \"My_training\" SET
    id='".$_GET['id'].
    "', Full_name='".$_GET['Full_name'].
    "', Short_name='" .$_GET['Short_name'].
    "', Adress='".$_GET['Adress'].
    "', Group_num='".$_GET['Group_num']."'";
       }
?>