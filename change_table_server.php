<?php
session_start(); 
$ol =pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
// echo $_POST['name'];
$z = pg_query("ALTER TABLE ".$_SESSION['table_name']." ADD COLUMN ".$_POST['name']." character varying;");
if($z){
    echo $_POST['name'];
}
else{
    echo "Стовбець не створено";
}
?>