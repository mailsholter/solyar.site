
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$x= pg_connect("host=localhost port=5432 user=postgres password=000000 dbname=postgres options='--client_encoding=UTF8'");
$i = 0;

session_start();
if(isset($_POST['back'])){
  unset($_SESSION['sel_num_tab']);
}
?>


<?php
if (!(isset($_POST['sel']) || isset($_SESSION['sel_num_tab']))):
?>
<form action="" enctype="multipart/form-data" method="post">
  <p><input type = "radio" id = "buttom2"
  name = "sel" value ="change_table">
  <label for="buttom2">shange smth in table<label></p>
  <p><input type = "radio" id = "buttom1"
  name = "sel" value ="insert_tab" >
  <label for="buttom1">insert into table<label></p>
    <p><input type= "submit" value ="Вибрати"></p>
</form>

<?php
endif;

if (isset($_POST['sel'])){
  $_SESSION['sel_num_tab'] = $_POST['sel'];
  }



  // echo $_POST['sel']; ////// ТАК ВИТЯГАТИ ЩОСЬ З ВЕРХНЬОЇ ФОРМИ ///////////////////////


if(isset($_SESSION['sel_num_tab'])){
switch($_SESSION['sel_num_tab']):
case "insert_tab":
if(!isset($_POST['table_name'])):?>
 <form action="" enctype="multipart/form-data" method="post">
 <fieldset>
 <legend>Вибір таблиці</legend>
 <p><select size="3" name ="table_name"><label for="table_names">
 <?php
 $table_names = pg_query("SELECT table_name FROM information_schema.tables
 WHERE table_schema='public';");
 while($values = pg_fetch_row($table_names) ){          
 echo '<option value='.$values[0].' >'.$values[0].'</option>';
 }
 ?>
 </fieldset>
 <p><input type="submit" value="Отправить"></p>
 </form>




<?php else: ?>
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
   if($tablerow[0] != 'img'){
    echo '<p><label for='.$tablerow[0].'>'.$tablerow[0].'</label><input type="text" name ='.$tablerow[0].'></p>';
   }
   else {
    echo '<label for="imag">"file"</label><input type="file" name ="imag[]" multiple >';
   }
  
}
?>
  <!-- <label for="imag">"file"</label><input type="file" name ="imag[]" multiple > -->
  
  </fieldset>
  <p><input type="submit"  value="Отправить"></p>
  </form>
<?php endif;
break;
endswitch;
}
?>
<?php
echo "</br>";
?>
<form  method="post">
  <input type="hidden" name="back" >
  <p><input type ="submit" value="Назад"></p>
</form>
<?php

?>
</body>
</html>