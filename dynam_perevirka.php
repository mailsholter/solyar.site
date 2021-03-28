<?php
$test =$_POST['lg'];
$x= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$zapyt = pg_query("SELECT login from покупці");
$bool = false;
while($z = pg_fetch_row($zapyt)){
    if($z[0]==$test){
        $bool = true;
    }
}
echo $bool;
?>