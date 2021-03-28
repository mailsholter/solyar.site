<?php
$x = pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$tb_name = pg_query("SELECT table_name FROM information_schema.tables
WHERE table_schema='public';");
$stroka = '<select size="3" name="table_name">';
while($values = pg_fetch_row($tb_name) ){          
    $stroka.='<option class ="ttt" onclick = "baka()" value='.$values[0].' >'.$values[0].'</option>';
}
$stroka.='</select>';
echo $stroka;
?>