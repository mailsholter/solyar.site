<?php
$connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
if(isset($_POST['information'])){
    $inf = $_POST['information'];
    $inf = trim($inf,"/");
    // echo $inf;
    $inf_mas = explode("/",$inf);
    $code=random_int(100000,999999);
    $adress = $inf_mas[4]."/".$inf_mas[5]."/".$inf_mas[6];
    $inf_mas[7] = trim($inf_mas[7], " ");
    $phone = $inf_mas[0];
    $zapyt = pg_query("insert into покупці(name,surname,password,adress,client_code,phone_number) values('".$inf_mas[2]."','".$inf_mas[3]."','".$inf_mas[1]."','".$adress."','".$code."','".$phone."');");
    if($zapyt){
        echo "ok";
    }else{
        echo pg_last_error();
    }
}
?>