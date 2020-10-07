<?php
$x= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$numb = random_int(10000000,99999999);
$date = date('Y-m-d');
$cdo = pg_query("SELECT client_code FROM покупці WHERE password ='".$_COOKIE["pass"]."' and login = '".$_COOKIE["login"]."';");
$cdo = pg_fetch_row($cdo);
$cdo = $cdo[0];
$vidpr = pg_query("INSERT INTO покупки VALUES('".$numb."', '".$cdo."', '".$_POST['purchase']."', '".$date."')");
if($vidpr){
    echo "thx for shoping";
}
else{
    echo "not done";
}
?>
