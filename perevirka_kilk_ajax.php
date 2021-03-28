<?php
$connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
if(isset($_POST['mns'])){
    $code = $_POST['mns'];
    $kilk = $_POST['count'];
    $table_names = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema NOT IN ('information_schema','pg_catalog');"); /////Імена всіх таблиць
        while($m=pg_fetch_row($table_names)){
            $poshuk=pg_query("select виробник from $m[0] where код = $code");
            if(pg_fetch_array($poshuk)!=""){
                $tbmane=$m[0];
                break;
            }
            else{
                continue;
            }
        }
        $tovar = pg_query("select кількість from ".$tbmane." where код='".$code."';");
        $tovar = pg_fetch_row($tovar);
        if($tovar[0]>$kilk-1){
        }else{
            echo 'error';
        }
}elseif(isset($_POST['pls'])){
    $code = $_POST['pls'];
    $kilk = $_POST['count'];
    $table_names = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema NOT IN ('information_schema','pg_catalog');"); /////Імена всіх таблиць
        while($m=pg_fetch_row($table_names)){
            $poshuk=pg_query("select виробник from $m[0] where код = $code");
            if(pg_fetch_array($poshuk)!=""){
                $tbmane=$m[0];
                break;
            }
            else{
                continue;
            }
        }
        $tovar = pg_query("select кількість from ".$tbmane." where код='".$code."';");
        $tovar = pg_fetch_row($tovar);
        if($tovar[0]>=$kilk+1 || $tovar[0] == 0){
        }else{
            echo 'error';
        }
}
?>