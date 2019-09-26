<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Fitness World!</title>
    <link rel="stylesheet" href="styleForm.css">
	
</head>
<body>
<?php
header( 'Content-Type: text/html; charset=utf8');
session_start();
error_reporting(0);
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);

//Данные для БД
/*$settings = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'db_name' =>'users'
];

$link = mysqli_connect($settings['host'],$settings['user'],$settings['password'],$settings['db_name']);*/

$connect_string = "host=localhost port=5432 dbname=Web user=admin password=admin";
$link = pg_pconnect($connect_string);

/*if(!$link)
{
    die('Db connection Error!' .mysqli_connect_errno().' error message'.mysqli_connect_error());
}

mysqli_set_charset ($link , 'utf8');*/

$query = "SELECT * FROM \"User\" WHERE login='".$login."'";

$result = pg_query($link, $query) /*or die("Ошибка".mysqli_error($link))*/;
if($res === false)
{
    echo "Error";
}
else
{
    $row = pg_fetch_row($result);
    if(!pg_num_rows($result))
    {
        echo "<div id=\"content\">
    <h1>Try again.</h1>
    <h4>Your login or password is wrong!</h4>
    <fieldset>
        <form action=\"auth.php\" method=\"post\">
            <input  type=\"submit\" value=\"Back\">
        </form>
    </fieldset>
    
</div>";
    }
    else
    {
        $password += " ";
        if($row[2] == $password){
            $_SESSION['login']=$row[1];
            $_SESSION['password']=$row[2];
            echo '<script>location.replace("mainPage.html");</script>';
            exit;
        }
        else
        {
            echo "
<div id=\"content\">
    <h1>Try again.</h1>
    <h4>Your login or password is wrong!</h4>
    <fieldset>
        <form action=\"auth.php\" method=\"post\">
            <input  type=\"submit\" value=\"Back\">
        </form>
    </fieldset>
    
</div>";

        }
    }
    pg_free_result($result);
}
pg_close($link);
?>
</body>
</html>
