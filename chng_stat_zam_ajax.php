<?php
$connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$znac = $_POST['nv'];
$zapyt = pg_query("update покупки set \"статус замовлення\" ='".$znac."' where номер_заказу='".$_POST['pok_kod']."' and код_покупця='".$_POST['kd']."';");
if($zapyt){
    echo 'kk';
}else{
    echo pg_last_error();
}

?>