<?php
$x= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$table_name = $_POST['tab_name'];
$table_row = $_POST['tab_row']; //назва стовбців
$str = $_POST['str'];
$zapyt = "INSERT INTO ".$table_name."(".$table_row.") VALUES(".$str.");";
$vidpr = pg_query($zapyt);
if($vidpr){
    echo "done";
}
else{
    echo pg_last_error();
}
?>