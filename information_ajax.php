<?php
$connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$login = $_POST['login'];
$password = $_POST['password'];
$zapyt = pg_query("select name, surname, adress, phone_number from покупці where phone_number ='".$login."' and password ='".$password."';");
$zapyt = pg_fetch_row($zapyt);
$new_stroka ='';
for($i = 0;$i<count($zapyt);$i++){
    $new_stroka.=$zapyt[$i].",";
}
$new_stroka = trim($new_stroka,',');
echo $new_stroka;
?>