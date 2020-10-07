<?php
session_start(); 
$ol =pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$delete = pg_query("ALTER TABLE ".$_SESSION['table_name']." DROP COLUMN ".$_POST['name'].";");
if($delete){
    echo "done";
}
else{
    echo "not done";
}
?>
