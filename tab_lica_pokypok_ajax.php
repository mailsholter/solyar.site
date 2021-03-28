<?php
$connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$login = $_POST['login'];
$login = trim($login,"'");
$client_code = pg_query("select client_code from покупці where phone_number ='".$login."';");
$client_code = pg_fetch_row($client_code);
$client = $client_code[0];
$ist_pok = pg_query('select "номер_заказу","товари","дата","статус замовлення" from покупки where код_покупця ='.$client.';');
$tablucya = '<fieldset><legend>Список заказів</legend><table><tr><th>номер</th><th>дата</th><th>товар</th><th>кількість</th><th>ціна</th><th>статус</th></tr>';
while($elem = pg_fetch_row($ist_pok)){
    $nomer = $elem[0];
    $date = $elem[2];
    $stat = $elem[3];
    $tov = $elem[1];
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
        $zapyt = pg_query("select виробник, модель from $tbmane where код ='".$code."'");
        $name = pg_fetch_row($zapyt);
        if($stat == 0){
            $stat = 'в обробці';
        }else if($stat == 1){
            $stat = 'виконано';
        }
        $tablucya.="<tr><th>$nomer</th><th>$date</th><th>$name[0] $name[1]</th><th>$kilk</th><th>$cina</th><th>$stat</th></tr>";
    }
}
echo $tablucya."</table></fieldset>";
?>