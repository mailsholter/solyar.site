<?php
$x = pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$val = $_POST['val'];
$tb_name = $_POST['tb_name'];
$zapyt = pg_query("DELETE from sorting WHERE $tb_name ='".$val."'");
if($zapyt){
    echo "yes";
}else{
    echo "no";
}
?>