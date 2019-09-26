<?php

$connect_string = "host=localhost port=5432 dbname=Web user=admin password=admin";
$dbconnect = pg_pconnect($connect_string);

$user = 0;
foreach($_GET as $k => $v){
  if(preg_match("~user~", $k))
    $user++;
}
$sql_serch = "";


for ($number=1; $number<=$user; $number++) {
	
        $sql_search = "SELECT login,password FROM \"User\" " ;
        
        function checkAuth(string $login, string $password): bool 
        {
            foreach ($sql_search as $user) {
                if ($_GET['user_'.$number] === $login 
                    && $_GET['user_'.$number] === $password)
                {
                    return true;
                    echo 'It is true!';
                }   
        }
    
        return false;
        echo 'It is false!';
    }
    
		
	}
	echo 'Good!';
	pg_query($dbconnect, $sql_search);
	
}

/*$queryLogin = "SELECT login FROM \"User\"";
$queryPassword = "SELECT password FROM \"User\"";
$resultLogin = pg_query($dbconnect, $queryLogin);
$resultPassword = pg_query($dbconnect, $queryPassword);

function checkAuth(string $login, string $password): bool 
{
    //$users = require __DIR__ . '/usersDB.php';   '". $_GET['name_'.$number]. "'      "VALUES (DEFAULT, DEFAULT, DEFAULT, false, DEFAULT, '". $_GET['name_'.$number]. "')";
       
    foreach ($resultLogin as $user) {
        if ($user['login'] === $login 
            && $user['password'] === $password
        ) {
            return true;
            echo 'It is true!';
        }
    }

    return false;
    echo 'It is false!';
}*/

pg_close($dbconnect);
?>