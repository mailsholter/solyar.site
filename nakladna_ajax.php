<?php
$connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$num = $_POST['val'];
$ist_pok = pg_query('select товари from покупки where номер_заказу ='.$num.';');
$n = pg_query('select код_покупця from покупки where номер_заказу ='.$num.';');
$n = pg_fetch_row($n);
$adr = pg_query('select adress from покупці where client_code = '.$n[0].';');
$tablucya = '<fieldset><legend>Список заказів</legend><table><tr><th>товар</th><th>кількість</th><th>ціна</th></tr>';
while($elem = pg_fetch_row($ist_pok)){
    $tov = $elem[0];
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
        $tablucya.="<tr><th>$name[0] $name[1]</th><th class='killss'>$kilk</th><th class='cina'>$cina</th></tr>";
    }
}
$adr = pg_fetch_array($adr);
$adr = explode("/",$adr[0]);
echo $tablucya."</table></fieldset>".'<p>Адреса доставки: населений пункт '.$adr[0].' вулиця '.$adr[1].' номер будинку '.$adr[2].'</p>';
?>