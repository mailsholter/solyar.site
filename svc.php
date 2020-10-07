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
 $x = pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user= 	
 solyar17_adm 	 password=kjkszpg2001 options='--client_encoding=UTF8'");
 if(!isset( $_SESSION['check'])){
    $check = true; 
    $_SESSION['check']=$check;
 }
 ?>
 <?php
 if($_SESSION['check']){
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
    }
 $_SESSION['check']=false;
 ?>
 </fieldset>
 <p><input type="submit" value="Отправить"></p>
 </form>
 <?php
}
else if(!$_SESSION['check']){
  $table_name = $_POST['table_name'];
  echo $table_name;
  $ssylka = "'".'C:\install\Apache24\htdocs\files\\'.$table_name.'.csv'."'";
  $filename = $table_name.'.csv';
  $ssylka1 ='C:\install\Apache24\htdocs\files\\'.$table_name.'.csv';
  $csv = pg_query("copy (SELECT * FROM $table_name) to $ssylka WITH csv DELIMITER ';' HEADER;"); 
  if(!$csv){
    echo "error";
  }
    echo "<form action='dwnl.php' enctype='multipart/form-data' method='post'>";
    echo "<input type='hidden' name='ssylka' value=".$ssylka1.">";
    echo "<input type='hidden' name='filename' value=".$filename."><br>";
    echo "<input type='submit' value='вйо'>";
    echo "</form>";
    unset($_SESSION['check']);
}
?>
<form action="proba.php">
  <button>Назад</button>
</form>
</body>
</html>