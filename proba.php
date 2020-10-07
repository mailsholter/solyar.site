
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
$i = 0;
?>
  <a href ="change_table.php">shange smth in table</a><br>
  <a href ="insert_tab.php">insert into table</a><br>
  <a href="svc.php">convert into svc</a><br>
  <a href ="exp.php">import</a>

<form action='index.php'>
  <button>На головну</button>
</form>

</body>
</html>