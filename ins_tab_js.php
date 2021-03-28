<?php
$x = pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$table_name = $_POST['val1'];
$table_row = pg_query("SELECT column_name 
 FROM INFORMATION_SCHEMA.COLUMNS 
 WHERE table_name = '$table_name';");
 $string = '<form action="upload.php" enctype="multipart/form-data" method="post">';
 while($tablerow = pg_fetch_row($table_row)){
    $string.='<p><label for='.$tablerow[0].'>'.$tablerow[0].'</label><input type="text" name ='.$tablerow[0].'></p>';
}

$string.='<input id="table_name" type="hidden" name="table_name" value=""><input type="submit" value="Відправити"></form>';
echo $string;
?>