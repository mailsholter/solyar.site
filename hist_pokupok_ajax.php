<?php
$connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
if($_POST['val']!='Всі'){
    $fllname = $_POST['val'];
    $fllname = explode(" ",$fllname);
    $z = pg_query("select client_code from покупці where name = '".$fllname[0]."' and surname = '".$fllname[1]."';");
    $z = pg_fetch_row($z);
    $zapyt =pg_query("select * from покупки where код_покупця= '".$z[0]."';");
}else{
    $zapyt =pg_query("select * from покупки;");
}
    $tablucya = '<fieldset><legend>історія</legend><table><tr><th>номер</th><th>код покупця</th><th>дата</th><th>товар</th><th>кількість</th><th>ціна</th><th>статус</th></tr>';
    while($elem = pg_fetch_row($zapyt)){
        // var_dump($elem);
        $nomer = $elem[0];
        $pok_kod = $elem[1];
        $date = $elem[3];
        $stat = $elem[4];
        $tov = $elem[2];
        $tov_mas = explode('|',$tov);
        for($i=0;$i<count($tov_mas);$i++){
            $tovar = explode('/',$tov_mas[$i]);
            $code = $tovar[0];
            $kilk = $tovar[1];
            $cina = $tovar[2];
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
            $zap = pg_query("select виробник, модель from $tbmane where код ='".$code."'");
            $name = pg_fetch_row($zap);
            $tablucya.="<tr><th>$nomer</th><th>$pok_kod</th><th>$date</th><th>$name[0] $name[1]</th><th>$kilk</th><th>$cina</th><th>$stat</th></tr>";
        }
    }
    echo $tablucya."</table></fieldset>";
?>