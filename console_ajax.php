<?php
$connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$zap = $_POST['val'];
$zapyt = pg_query($zap);
if($zapyt){
    echo 'done';
}else{
    echo pg_last_error();
}
?>