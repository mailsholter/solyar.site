<?php
$connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$login = $_POST['login'];
$password = $_POST['password'];
$zapyt = pg_query("select корзина from покупці where password = '".$password."' and phone_number = '".$login."';");
$tovary = pg_fetch_row($zapyt);
$tovary = trim($tovary[0],'}{"');
$tovary = explode(",",$tovary);
$sum=0;
$tmp_zn ='';
for($i = 0;$i<count($tovary);$i++){
    $tmp = explode(":",$tovary[$i]);
    $tmp_zn = trim($tmp[1],"\"");
    $tmp_zn = trim($tmp_zn,"\"");
    $sum+= intval($tmp_zn);
}
echo $sum;
?>