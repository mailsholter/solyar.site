<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
$x = pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
if(!isset($_POST['table_name'])){
?>
 <form action="" enctype="multipart/form-data" method="post">
 <fieldset>
 <legend>Вибір таблиці</legend>
 <p><select size="3" name ="table_name"><label for="table_names">
 <?php
 $table_names = pg_query("SELECT table_name FROM information_schema.tables
 WHERE table_schema='public';");
 while($values = pg_fetch_row($table_names) ){          
 echo '<option value='.$values[0].' >'.$values[0].'</option>';
 }?>
 </fieldset>
 <input type="submit" value="Отправить">
 </form>
 <?php
}
elseif(isset($_POST['table_name'])){
?>
  <form action="upload.php" enctype="multipart/form-data" method="post">
   <fieldset>
  <legend>Ввід данних</legend>
  <?php
  
 $table_name = $_POST['table_name'];
 echo "<input type='hidden' name='table_name' value = ".$table_name.">";
 $table_row = pg_query("SELECT column_name 
 FROM INFORMATION_SCHEMA.COLUMNS 
 WHERE table_name = '$table_name';");
 echo '</label></select></p>';
while($tablerow = pg_fetch_row($table_row)){
   if($tablerow[0] != 'img' && $tablerow[0] != 'main_img' && $tablerow[0] != 'imag'){
    echo '<p><label for='.$tablerow[0].'>'.$tablerow[0].'</label><input type="text" name ='.$tablerow[0].'></p>';
   }
   elseif($tablerow[0]=='imag'){
    echo '<label for="imag">Виберіть головне фото</label><input type="file" name ="imag"><br>';
   }
   elseif($tablerow[0] == 'img') {
    echo '<label for="img">Виберіть інші фото</label><input type="file" name ="img[]" multiple ><br>';
   }
}

unset($_SESSION['sel_num_tab']);
echo '<input type="submit" value="Отправить">';
 }
?>    
<form action="proba.php">
  <button>Назад</button>
</form>
</body>
</html>