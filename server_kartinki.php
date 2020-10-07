<?php
$cod = $_POST['code'];
// $cod = "563219";
$x= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user= 	
solyar17_adm 	 password=kjkszpg2001 options='--client_encoding=UTF8'");
$table_names = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema NOT IN ('information_schema','pg_catalog');"); ////получаємо імена всіх таблиць
while($m=pg_fetch_row($table_names)){          ////перебираємо імена всіх табшлиць для пошуку по коду
  $poshuk=pg_query("select виробник, модель, ціна, опис, img from $m[0] where код = '".$cod."'");
  if(pg_fetch_array($poshuk)!=""){
    $tbmane=$m[0];
    break;
  }
}  
$zapyt = pg_query("select img from $tbmane where код = '".$cod."';");
$obrobka = pg_fetch_array($zapyt);
$obrobka = trim($obrobka[0],"\"}{");
$obrobka = explode(",",$obrobka);
for($i = 0;$i<count($obrobka);$i++){
  echo "<img class = 'hidden_img' src=".$obrobka[$i].">";
}
?>