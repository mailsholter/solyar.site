<?php

$connect = pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
if($connect){
    echo "connected!\n";
}else{
    echo "not connected!\n";
}




$ist_pok = pg_query("select номер_заказу,товари,дата,статус_замовлення from покупки where номер_заказу='884596';");
if($ist_pok){
    echo "done!\n";
}else{
    echo "not done!\n";
}
$tablucya = '<body><fieldset><legend>Список заказів</legend><table><tr><th>номер</th><th>дата</th><th>товар</th><th>кількість</th><th>ціна</th><th>статус</th></tr>';
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
$tablucya.="</table></fieldset></body>";
echo  $tablucya;
ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "solyar17@solyar.site";
    $to = "sashasolyar2001@gmail.com";
    $subject = "Список покупок";
    $message = $tablucya;
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $res = mail($to,$subject,$message, $headers);
    if ($res) {
        echo "The email message was sent.";
    }else{
        $errorMessage = error_get_last()['message'];
        echo $errorMessage;
    }
    
   
   
   
   
   
    // ini_set( 'display_errors', 1 );
    // error_reporting( E_ALL );
    // $from = "solyar17@solyar.site";
    // $to = "sashasolyar2001@gmail.com";
    // $subject = "valera";
    // $message = "все працює";
    // $headers = "From:" . $from;
    // $res = mail($to,$subject,$message, implode("\r\n", $headers));
    // if($res){
    //     echo "The email message was sent.";
    // }
    // else{
    //     echo "error";
    // }
?>