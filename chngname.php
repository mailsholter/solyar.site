<?php
$x = pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user= 	
solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$new_tab_name = $_POST['val2'];
$old_tab_name = $_POST['val1'];
$zmina = pg_query("ALTER TABLE ".$old_tab_name." RENAME TO ".$new_tab_name.";");
if($zmina){
    echo "well done";
}
else{
    echo "not done";
}
?>