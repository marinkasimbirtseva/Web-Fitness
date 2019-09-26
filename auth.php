<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Authorization</title>
    <link rel="stylesheet" href="styleForm.css">
</head>
<body>

<div class="container">
    <section id="content">
        <h1>Please,sign in.</h1>
        <fieldset>
            <form action="sign_in.php" method="post">
                <input id="username" type="text" name="login" required value="Логин" onBlur="if(this.value=='')this.value='Логин'" onFocus="if(this.value=='Логин')this.value='' ">
                <input id="password" type="password" name="password" required value="Пароль" onBlur="if(this.value=='')this.value='Пароль'" onFocus="if(this.value=='Пароль')this.value='' ">
                <input class="butBack" type="submit" value="Log in">
            </form>
        </fieldset>
    </section>
</div>

<!--<?php
header( 'Content-Type: text/html; charset=utf8');
session_start();
//error_reporting(0);
$_SESSION['mes']='Welcome!';
$_SESSION['mes1']='Данные не верны';
if (empty($_SESSION['login']) or empty($_SESSION['password']))
{
    echo '<h2>'.$_SESSION['mes'].'</h2>';
}
else {
    echo '<h2>'.$_SESSION['mes1'].'</h2>';
}
//session_destroy();
?>-->
</body>
</html>