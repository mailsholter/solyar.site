<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$x= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$tbb_name = pg_query("select column_name from information_schema.columns where table_name = '".$_POST['table_name']."';");
$value = "";
$table_name = "";
while($elem = pg_fetch_row($tbb_name)){
    $value.="'".$_POST[$elem[0]]."', ";
    $table_name.=$elem[0].", ";
}
$value= trim($value, ", ");
$table_name = trim($table_name,", ");
echo "insert into ".$_POST['table_name']."($table_name) values($value);"."<br>";
$vidpr = pg_query("insert into ".$_POST['table_name']."($table_name) values($value);");
if($vidpr){
    echo "done";
}else{
    echo pg_last_error();
    echo "not done";
}
?>
</body>
</html>
