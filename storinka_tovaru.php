<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="storinka_tovary.css">
</head>
<body>
<?php
$x= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user= 	
solyar17_adm 	 password=kjkszpg2001 options='--client_encoding=UTF8'");
session_start();
///////////////////////////////////////////////////////////////////////////////////////////////////////// Пошук по всіх таблицях товару за кодом
$code = "'".$_GET['id']."'";
$tabl = $_POST['table'];
$table_names = pg_query("SELECT table_name FROM information_schema.tables
WHERE table_schema NOT IN ('information_schema','pg_catalog');"); /////Імена всіх таблиць
while($m=pg_fetch_row($table_names)){
    $poshuk=pg_query("select виробник, модель, ціна, опис, img from $m[0] where код = $code");
    if(pg_fetch_array($poshuk)!=""){
        $tbmane=$m[0];
        break;
    }
    else{
        continue;
    }
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
// var_dump($tbmane);
//$type = pg_fetch_row($type);
$table = $tbmane;
$tovar = pg_query("SELECT distinct виробник, модель, ціна, опис, код, img FROM $table where код = $code;");
$tovar =pg_fetch_row($tovar);
$photo=trim($tovar[5],"{ }");
$photo=explode(",",$photo);
echo "<p>$tovar[0]</p>";
echo "<p>$tovar[1]</p>";
echo "<p>$tovar[2]</p>";
echo "<p>$tovar[3]</p>";
echo "<p>$tovar[4]</p>";
$cnt =0;
foreach($photo as $i ){
    $i="'".(trim($i,"\""))."'";
    if($cnt == 0){
        echo "<img class='main_photo' src=$i></img>";
    }
    else{
        echo "<img class='photo' src=$i></img>";
    }
    
    $cnt++;
}
?>
</body>
</html>