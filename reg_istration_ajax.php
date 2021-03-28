<?php
$connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");


$token = "token=0d80d2e4f1e40d4454e6f57706c76cddb2588c15";


$mas = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z','1','2','3','4','5','6','7','8','9','0');
$new_str = "";
for($i=0;$i<6;$i++){
    $new_str.=$mas[rand (0,62)];
}

// $phone = $_POST['phone_number'];
// echo $phone;

$inf = $_POST['information'];
$inf = trim($inf,"/");
$inf_mas = explode("/",$inf);
$inf = $_POST['information'];
$inf = trim($inf,"/");
$inf_mas = explode("/",$inf);
$phone = $inf_mas[0];


// $zapyt = pg_query("select phone_number from покупці where phone_number ='".$phone."';");

// $elem = pg_fetch_row($zapyt);

// if($elem!=''){
// echo "recipients[0]=".$_POST['phone_number']."&sms[sender]=solyar.site&sms[text]=ваш код - ".$new_str;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,'https://api.turbosms.ua/message/send.json');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, "recipients[0]=".$_POST['phone_number']."&sms[sender]=solyar.site&sms[text]=ваш код - ".$new_str."&".$token);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "application/x-www-form-urlencoded",
        )
    );
    $response = curl_exec($ch);
    curl_close($ch);
    if($response){
        echo $new_str;
    }else{
        echo 'error';
    }
// }else{
//     echo 'error';
// }
    
    
?>