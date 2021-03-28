<?php
$x= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$table_name = $_POST["tab_name"];
$vidpr = pg_query("TRUNCATE ".$table_name.";");
if($vidpr){
    echo "well done";
}
else{
    echo "not done";
}
?>