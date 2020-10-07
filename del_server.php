<?php
$code = $_POST['kod'];
$x=pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user= 	
solyar17_adm 	 password=kjkszpg2001 options='--client_encoding=UTF8'");
$zapyt = pg_query("select корзина from покупці where password = '".$_COOKIE['pass']."' and login = '".$_COOKIE['login']."';");
$spysok = pg_fetch_row($zapyt);
$new_mas = json_decode($spysok[0], true);
$sum = 0;
foreach($new_mas as $key => $value){
    if($key == $code){
        unset($new_mas[$key]);
    }
}
$json = json_encode($new_mas);
$zz = pg_query("update покупці set корзина = '".$json."' where password = '".$_COOKIE['pass']."' and login = '".$_COOKIE['login']."';");
?>