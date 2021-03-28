<?php
$connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$login = $_POST['login'];
$code = $_POST['code'];
$zap = pg_query("select корзина from покупці where phone_number ='".$login."';");
$zap = pg_fetch_row($zap);
$zap = trim($zap[0],'"}{');
$zap = trim($zap,"'");
$zap = explode(",",$zap);
$next_stroka='';
$bool = false;
for($i = 0;$i<count($zap);$i++){
    $value = explode(":",$zap[$i]);
    $value[0] = trim($value[0],'"');
    $value[1] = trim($value[1],'"');
    if($value[0] == $code){
        $value[1] = intval($value[1]);
        $value[1]++;
        $bool = true;
    }
    $next_stroka.=$value[0].":".$value[1].",";
}
if(!$bool){
    $next_stroka.=$code.":1,";
}
$next_stroka = trim($next_stroka,",");
$next_stroka = trim($next_stroka,":");
$next_stroka = trim($next_stroka,",");
$vidpr = pg_query("update покупці set корзина ='".$next_stroka."' where phone_number = '".$login."';");
if($vidpr){
    echo $next_stroka;
}else{
    echo pg_last_error();
}
?>