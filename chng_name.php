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
$ol =pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user= 	
solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
if(!isset($_POST["table_name"])){
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
 <input type="submit" value="Вибрати">
 </form>
</fieldset>
 <input href="cstmr.php" type="submit" value="Назад">
 </form>
 <?php
}
else{
    $_SESSION['table_name'] = $_POST["table_name"];
    echo 'Назва таблиці: '.$_POST["table_name"];
    echo "<br>";
    echo 'Введіть нову назву таблиці:';
    echo '<form action="" enctype="multipart/form-data" method="post">';
    echo '<input type="text" name="new_table_name">';
    echo '<input type="submit">';
    echo '</form>';
}
if(isset($_POST["new_table_name"])){
    // echo "ALTER TABLE ".$_SESSION['table_name']." RENAME TO ".$_POST["new_table_name"].";";
    $zpyt = pg_query("ALTER TABLE ".$_SESSION['table_name']." RENAME TO ".$_POST["new_table_name"].";");
    if($zpyt){
        echo "well done";
    }
    else{
        echo "not done";
    }
}
 ?>
</body>
</html>