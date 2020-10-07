<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$diag=6.0;
$x = pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user= 	
solyar17_adm 	 password=kjkszpg2001 options='--client_encoding=UTF8'");
$z = pg_query("select regexp_matches(опис,'(eкран)(\:\s\d)(\.\d|\d|)'), модель  from refrigerator");
while($string = pg_fetch_row($z)){
  $str =$string[0];
  $str = (double)preg_replace('/[^0-9 .]/','', $str);
  if($str>=$diag){
    $brand = "'".$string[1]."'";  
    $l= pg_query("select * from allstorage where модель =$brand;");
      while($strichka = pg_fetch_row($l)){
        for ($i=0;$i<count($strichka);$i++){
          echo $strichka[$i]." ";
        }
        echo "<br>";
      } 
  }
  echo "<br>";
}
?>
<form action='index.php'>
  <button>На головну</button>
</form>
</body>
</html>