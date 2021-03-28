<?php
$x = pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$val = $_POST['val'];
$tb_name = $_POST['tb_name'];
// echo $val."<br>";
// echo $tb_name;
$zap = pg_query("select column_name from information_schema.columns where table_name = 'sorting';");
$zap1 = pg_query("select $tb_name from sorting;");

$zapyt = pg_query("DELETE from sorting WHERE $tb_name ='NULL'");
$val = explode(",",$val);
$count = count($val);
for($i = 0;$i<$count;$i++){
    $add = pg_query("INSERT INTO sorting($tb_name) VALUES('".$val[$i]."')");
    if($add){
        echo "ok ";
    }else{
        echo pg_last_error();
    }
}


?>