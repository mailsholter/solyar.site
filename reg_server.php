<?php
$connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$login = $_POST['log'];
$login = trim($login," ");
$password = $_POST['pass'];
$zapyt = pg_query("select name, surname from покупці where phone_number ='".$login."' and password = '".$password."'");

$per = pg_fetch_row($zapyt);
if($per[0]!=''){
    echo $per[0].' ';
    echo $per[1];
}
else{
    echo "error";
}
?>