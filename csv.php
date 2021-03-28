<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$x= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user= 	
solyar17_adm 	 password=kjkszpg2001 options='--client_encoding=UTF8'");
session_start();
$csv = pg_query("copy (SELECT * FROM mobile_phone) to 'C:\Users\я\Desktop\csv\mobile_phone.svc' using svc ENCODING 'WIN1251'");
if($csv){
    echo "Файл csv створений";
}
else{
    echo "Файл csv не створений";
}
$zapyt =pg_query("select тип from allstorage;");
$zapyt=pg_fetch_row($zapyt);
var_dump($zapyt);
?>
</body>
</html>