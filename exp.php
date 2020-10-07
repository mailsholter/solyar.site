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
  $stroka;
  $i=0;
  $num =0;
  ?>
  <form action="" method="post" enctype='multipart/form-data'>
  <input type='file' name='tablica'><br>
  <input type='submit'>
  </form>
  <?php
  if(isset($_FILES['tablica'])){
    $file = $_FILES['tablica']['tmp_name'];
  }
if(isset($_FILES['tablica'])){
  if (($handle = fopen("$file", "r")) !== FALSE) {
    $z = pg_query("delete from refrigerator;");
      while (($data = fgetcsv($handle,1000, ";")) !== FALSE) {
          $num = count($data);
          for ($c=0; $c < $num; $c++) {
              $stroka[]=$data[$c];
          }
          $i++;
      }
      fclose($handle);
      $row_name='';
      for ($i = 0; $i<$num ; $i++){
        $row_name.=$stroka[$i].", ";
      }
      $row_name=trim($row_name,", ");
      $str = '';
      $n = count($stroka)-$num;
      $dodanok = $num;
        for($i =$num;$i<=$num+$dodanok;$i++){
          if($stroka[$i]==''){
            $str.="NULL, ";
          }
          elseif($stroka[$i]!=''){
            $str.= "'".$stroka[$i]."', ";
          }

          if($i+1==$num+$dodanok and $num+$dodanok<=$n){
            $dodanok+=$num;
            $str=trim($str, ", ");
            $vidpravka = pg_query("insert into refrigerator($row_name) values ($str)");
            if($vidpravka){
              echo "Строка занесена в таблицю";
              echo '<br>';
            }
            else{
              echo "Строка не занесена в таблицю";
              echo '<br>';
            }
            $str = '';
          }
      }
  }
}
?>
<form action="proba.php">
  <button>Назад</button>
</form>
</body>
</html>