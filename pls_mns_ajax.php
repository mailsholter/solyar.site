<?php
$connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
if(isset($_POST['pls'])){
    $code = $_POST['pls'];
    $login = $_POST['login'];
    $zapyt = pg_query("select корзина from покупці where phone_number='".$login."';");
    $zapyt = pg_fetch_row($zapyt);
    $zapyt = explode(",",$zapyt[0]);
    $new_stroka='';
    for ($i=0;$i<count($zapyt);$i++){
        $value = explode(':',$zapyt[$i]);
        $val1 = $value[0]; // COD
        $val2 = $value[1]; // kilkist
        if($val1 == $code){
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
            if($tovar[0]<intval($val2)+1){
                $val2 = $tovar[0];
                echo "error";
            }else{
                $val2 = intval($val2)+1;
            }
        }
        $new_stroka.=$val1.":".$val2.",";
    }
    $new_stroka = trim($new_stroka,",");
    $zp = pg_query("update покупці set корзина ='".$new_stroka."' where phone_number = '".$login."';");
    // if($zp){
    //     echo 'yes';
    // }else{
    //     echo 'no';
    // }
}else if(isset($_POST['mns'])){
    $code = $_POST['mns'];
    $login = $_POST['login'];
    $zapyt = pg_query("select корзина from покупці where phone_number='".$login."';");
    $zapyt = pg_fetch_row($zapyt);
    $zapyt = explode(",",$zapyt[0]);
    $new_stroka='';
    for ($i=0;$i<count($zapyt);$i++){
        $value = explode(':',$zapyt[$i]);
        $val1 = $value[0]; // COD
        $val2 = $value[1]; // kilkist
        if($val1 == $code){
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
            if(intval($val2)-1>$tovar[0]){
                echo "error";
            }else{
                $val2 = intval($val2)-1;
                echo $val2;
            }
        }
        $new_stroka.=$val1.":".$val2.",";
    }
    $new_stroka = trim($new_stroka,",");
    $zp = pg_query("update покупці set корзина ='".$new_stroka."' where phone_number = '".$login."';");
    if($zp){
        echo 'yes';
    }else{
        echo 'no';
    }
}else if(isset($_POST['del'])){
    $code = $_POST['del'];
    $login = $_POST['login'];
    $zapyt = pg_query("select корзина from покупці where phone_number='".$login."';");
    $zapyt = pg_fetch_row($zapyt);
    $zapyt = explode(",",$zapyt[0]);
    $new_stroka='';
    for ($i=0;$i<count($zapyt);$i++){
        $value = explode(':',$zapyt[$i]);
        $val1 = $value[0]; // COD
        $val2 = $value[1]; // kilkist
        if($val1 == $code){
            continue;
        }
        else{
            $new_stroka.=$val1.":".$val2.",";
        }
    }
    $new_stroka = trim($new_stroka,",");
    $zp = pg_query("update покупці set корзина ='".$new_stroka."' where phone_number = '".$login."';");
    if($zp){
        echo 'yes';
    }else{
        echo 'no';
    }
}
?>