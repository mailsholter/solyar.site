<?php
$x= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user= 	
solyar17_adm 	 password=kjkszpg2001 options='--client_encoding=UTF8'");
$login = $_POST['login'];
$password = $_POST['pass'];
$pass_check = pg_query("select name, surname from покупці where login = '".$login."' and password = '".$password."'");
$pass_check = pg_fetch_array($pass_check);
echo $pass_check[0];
echo " ".$pass_check[1];
?>