<?php
$x= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$numb = random_int(10000000,99999999);
$date = date('Y-m-d');
$cdo = pg_query("SELECT client_code FROM покупці WHERE password ='".$_COOKIE["pass"]."' and login = '".$_COOKIE["login"]."';");
$cdo = pg_fetch_row($cdo);
$cdo = $cdo[0];
$purchase = $_POST['purchase'];
echo $purchase;
$vidpr = pg_query("INSERT INTO покупки VALUES('".$numb."', '".$cdo."', '".$purchase."', '".$date."')");
if($vidpr){
    echo "thx for shoping";
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "solyar17@solyar.site";
    $to = "sashasolyar2001@gmail.com";
    $subject = "purchase";
    $sum-0;
    $message = '<html>
<head>
  <title>Список покупок</title>
</head>
<body>
  <p>Список покупок</p>
  <table>';
  $message .= '<tr>
  <th>Назва</th><th>Код товару</th><th>Кількість</th><th>ціна</th>
    </tr>';
    $purchase = explode('|', $purchase);
    for($i=0;$i<=count($purchase);$i++){
        $purchase1 = explode("/", $purchase[$i]);
        $cod = $purchase1[0];
        $table_names = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema NOT IN ('information_schema','pg_catalog') AND table_name!='покупки' AND table_name!='покупці';"); ////получаємо імена всіх таблиць
        while($m=pg_fetch_row($table_names)){     
            if($m[0]!='покупки' || $m[0]!='покупці'){     ////перебираємо імена всіх табшлиць для пошуку по коду
                $poshuk=pg_query("select виробник, модель from $m[0] where код = '".$cod."'");
                if(pg_fetch_row($poshuk)!=""){
                    $tbmane=$m[0];         ////якщо таблиця буде знайдена то вона запишеться сюди
                    $zapyt = pg_query("select виробник, модель from $tbmane where код =  '".$cod."'");  ////дістаємо інформацію з таблиці по коду
                    $zapyt = pg_fetch_row($zapyt);
                    $message .= '<tr><th>'.$zapyt[0]." ".$zapyt[1].'</th><th>'.$purchase1[0].'</th><th>'.$purchase1[1].'</th><th>'.$purchase1[2].'</th></tr>';
                    $sum=$sum + ($purchase1[1]*(float)$purchase1[2]);
                }
            }
            else{
                echo "noooo";
                continue;
            }
        }
    }
    $message .='</table>Загальна сума:'.$sum.'грн<br><p>П.І.Б:'.$_POST['name'].'</p><p>Адреса доставки:'.$_POST["selo"].'/'.$_POST["street"].'/'.$_POST["number"].'</p><p>Номер заказу:'.$numb.'</p><p>Мобільний телефон:'.$_POST["mob_numb"].'</p><p>Дата:'.$date.'</p></body></html>';

$headers[] = 'MIME-Version: 1.0';
$headers[] .= 'Content-type: text/html; charset=iso-8859-1';
$headers[] .= 'To:'.$to;
$headers[] .= 'From:'.$from;

    mail($to,$subject,$message, implode("\r\n", $headers));
    echo "The email message was sent.";
    // $to = "rmsoliar@gmail.com";
    // $headers[] = 'MIME-Version: 1.0';
    // $headers[] .= 'Content-type: text/html; charset=iso-8859-1';
    // $headers[] .= 'To:'.$to;
    // $headers[] .= 'From:'.$from;
    // mail($to,$subject,$message, implode("\r\n", $headers));
    // echo "The email message was sent.";
// echo $message;
}
else{
    echo "not done";
}
?>














