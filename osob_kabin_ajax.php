<?php
$connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$login = $_POST['login'];
$login = trim($login,"'");
$zapyt = pg_query("select name,surname,adress,client_code from покупці where phone_number = '".$login."';");
if($zapyt){
    $zapyt = pg_fetch_row($zapyt);
    echo $zapyt[0].','.$zapyt[1].','.$zapyt[2].','.$zapyt[3];
}else{
    echo 'ntkk';
}
?>