<?php
$info = $_POST['info'];
$info = str_replace("*","=",$info);
$info = str_replace("#","&",$info);
$token = "token=0d80d2e4f1e40d4454e6f57706c76cddb2588c15";
// echo $info.$token;
$mas = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z','1','2','3','4','5','6','7','8','9','0');
$new_str = "";
for($i=0;$i<6;$i++){
    $new_str.=$mas[rand (0,62)];
}
echo $new_str;
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL,'https://api.turbosms.ua/message/send.json');
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
// curl_setopt($ch, CURLOPT_POSTFIELDS, $info.$token);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//     "application/x-www-form-urlencoded",
//     )
// );
// $response = curl_exec($ch);
// curl_close($ch);
// echo "Відповідь: ";
// echo $response;
?>