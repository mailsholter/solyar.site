<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// upload.php
if (!$mkdir){
    echo 'Папка не створена ';
}
foreach ($array as $ole) {
    echo $ole.'</br>';
}
//$array = json_decode($array);
//var_dump ($array);
//$array = substr($array, 1, -1)
//var_dump ($array);
echo '</br>';
//ar_dump (explode(',',$array));
//echo gettype($str).'</br>';
//$format = str_replace(',' );
$type = iconv('UTF-8', 'windows-1251', $_POST('type'));
//  $perevirka = pg_query("select img from mobile_phone where mb_id=53;");
//$perevirka = pg_query("SELECT array_length(img, 1) as count_images  from mobile_phone where mb_id=51;");
//$perevirka = pg_query("SELECT array_to_json(img) AS new_name FROM mobile_phone where mb_id=51;");
// $select = pg_query("SELECT array_to_json(img) FROM mobile_phone where mb_id=53;");
//$select= json_encode($perevirka);

  //$perevirka = substr($perevirka, 1, -1);
  //$perevirka= explode(",",$perevirka);
  var_dump ($select);
  echo '</br>';
  var_dump ($select[0]);
  echo '</br>';
  echo $select[0];
  echo '</br>';
  echo '</br>';
   //$select = substr($select[0], 2,-2 );
   echo $select;
   echo '</br>';
   var_dump ($select);
   echo '</br>';
   //$select= json_decode(json_encode($select[0]));
   echo $select;
   echo '</br>';
   var_dump ($select);
   echo '</br>';
   var_dump ($select);
   echo '</br>';
   echo '</br>';
 //   echo $select[0];
 //   echo '</br>';
 //   echo $select[1];
 echo '</br>';
 foreach ($select as $arr) {
   echo $arr.'</br>';
}
//$select =json_decode(json_encode($select));
//$select =json_encode($select); 
//  echo '</br></br>'.gettype($perevirka).'</br>';
//var_dump($select).'</br>';


//$select = pg_fetch_array($select);
//echo $select[0];
  
   
// $vidpravka1 = pg_query("INSERT INTO mobile_phone (img) VALUES ('{".$array."}');");




// PROBA.PHP
<?php
class name{
  public string $name;
  public string $family='ivanov';
  public int $bullets=100;
  function ech(){
  echo $this->name.'  '.$this->family;}
  public function shot5(){ 
    $this->bullets=$this->bullets-5;
     echo ' патрони '.$this->name  .$this->bullets;
    }
} 
class bullet extends name
{
    public string $name;
    public function shot10(){ 
      $this->bullets=$this->bullets-7;
     echo ' патрони '.$this->name   .$this->bullets;
    $this-> shot5();
    }
}

$petro =new name();
$petro -> name = 'petya';
echo $petro->family;
$petro-> ech(); 

$vas = new  bullet();
$vas -> name ='vasya';
$vas -> family='kushnir';
$vas ->ech();
$petro->ech();
$vas ->shot5();
$vas ->shot10();
$petro->shot5();
$vas ->shot5();


?> 
// REG2.PHP
// $vidpravka = pg_query("INSERT INTO users(login,pass,cname) VALUES('$k','$y','$z')");
    // $om = pg_query($x,"SELECT cname FROM users WHERE login='$k' AND pass='$y'");
    // $ou = pg_fetch_assoc($om);
    // if($ou){
    //     echo "Вітаю".$ou['cname'];
    // }
    // else{
    //     header("Refresh: 3;index.html");
    // }
    


//     $result=mysql_query("SELECT count(*) as total from Students");
// $data=mysql_fetch_assoc($result);
// echo $data['total'];
     



    // $mes = mysqli_query($x, "INSERT INTO users VALUES (nuLL, '$k','$y','$z')");
    // echo $k;
    //   // $sel ="SELECT aname FROM $nametable";
    //   $selec = mysqli_query($x, "SELECT login,pass FROM users");
    //   echo $selec;
    //   echo mysqli_num_rows($selec);
    //  $nn=mysqli_fetch_row($selec);
    //   echo $nn[0]."\n".$nn[1];

    //   $nn=mysqli_fetch_row($selec);
    //   echo $nn[0]."\n".$nn[1];
      // for($i = 0;$i<mysqli_num_rows($selec);$i++){
      //   $nn=mysqli_fetch_row($selec);
      //   echo $nn[0]."\n".$nn[1];
      // }

      <div class="sitka">
      <div class="tovar">
      <img class="tovarimg"   src="\img\mobile_phone\a01\ua-galaxy-a01-a015-sm-a015fzrdsek-back-206509259.jpg" 
      alt="альтернативный текст">
      <div>холодильник атлант 6025 </div>
      <div><h1>1250.00грн</h1></div>
      </div> 
      <div class="tovar">
      <img class="tovarimg"   src="\img\mobile_phone\a01\ua-galaxy-a01-a015-sm-a015fzrdsek-back-206509259.jpg" 
      alt="альтернативный текст">
      <div>холодильник атлант 6025 </div>
      <div><h1>1250.00грн</h1></div>
      </div> 
      </div>

      .sitka{display:grid;
        grid-template-columns: repeat(5, 1fr);
      }
      .tovar{
      border: solid red; 
      
      grid-template-columns: 1fr;
      }
      .tovarimg{
        /* padding-bottom:20%; */
        width:100%;
      }







// PROBA.PHP   ////////////////////////////////////////////////////////////////////////////////




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Крокодил гена -->
<?php
 $x= pg_connect("host=localhost port=5432 user=postgres password=000000 dbname=postgres options='--client_encoding=UTF8'");
$table_names = pg_query("SELECT table_name FROM information_schema.tables
WHERE table_schema='public';");
//  $zapyt1 = pg_fetch_row($zapyt);
//  var_dump ($zapyt1);
//  $zapyt2 = pg_fetch_row($zapyt);
//  var_dump ($zapyt2);

?> 
<!-- Загрузка Файлів -->
<form action="" enctype="multipart/form-data" method="post">
<fieldset>
<legend>Ввід данних</legend>
<!-- ФОРМА ВИБОРУ ТАБЛИЦІ -->
назва таблиці
<p><select size="2" name ="table_names"><label for="table_names">
<?php
while($values = pg_fetch_row($table_names) ){          
echo '<option value='.$values[0].' >'.$values[0].'</option>';
}
if (isset($_POST['table_name'])){
$table_name = 'mobile_phone';
$table_row = pg_query("SELECT column_name 
FROM INFORMATION_SCHEMA.COLUMNS 
WHERE table_name = '$table_name';");
// $pdk = pg_fetch_row($pdk);
// echo $pdk[0]; 
echo '</label></select></p>';
while($tablerow = pg_fetch_row($table_row)){
 echo '<p><label for='.$tablerow[0].'>'.$tablerow[0].'</label><input type="text" name ='.$tablerow[0].'></p>';
}
}
  ?>

  </fieldset> 
   <p><input type="submit" value="Отправить"></p>
</form>
<?php
// while($tablerow = pg_fetch_row($table_row)){
//   echo '<p>'.$tablerow[0].'</p>';
// }
?>
</br>
</br>
</body>
</html>






////////////////////////////////////////////////////////////////////////////////////
////////////////////////CSS GRID///////////////////////////////////////////////////
<style>
 /* body {
    display: grid;
    grid-template-areas:" header header header "
    "nav article ads "
    "footer footer footer";
    grid-template-rows: 60px 1fr 60px;
    grid-template-columns: 1fr 1fr 1fr;
    grid-gap: 10px;
    height: 100vh;
    margin: 0;
}   */ 

   #main{
    display: grid;
    grid-template-areas:"header header"
    "menu menu""nav article"
    "footer footer";
    grid-template-rows: 0.2fr 0.1fr 1fr 0.2fr;
    grid-template-columns: 1fr 3fr;
    grid-gap: 10px;
    
    margin: 0;
    background-color:white;
    
}
header, footer, article, nav, div {
     padding: 20px; 
     background: gold;
    border: solid darkblue;
    }
#pageHeader {
    grid-area: header;
}
#pageFooter {
    grid-area: footer;
}
#mainArticle {
    grid-area: article;
    display: grid;
    grid-template-columns:repeat(4,1fr);
}
#mainNav {
    grid-area: nav;
    word-wrap: break-word;
}
#siteAds {
    grid-area: ads;
}
#menu{
 grid-area: menu;
}
</style>
<div id = "main">
    <header id='pageHeader'>Header</header>
    <div id='mainArticle'>
        <div class = 'items'>ttttt1</div>
        <div class = 'items'>ttttt2</div>
        <div class = 'items'>ttttt3</div>
        <div class = 'items'>ttttt4</div>
        <div class = 'items'>ttttt5</div>
        <div class = 'items'>ttttt6</div>
        <div class = 'items'>ttttt7</div>
        <div class = 'items'>ttttt8</div>
        <div class = 'items'>ttttt9</div>
        <div class = 'items'>ttttt124</div>
        <div class = 'items'>ttttt324</div>
        <div class = 'items'>ttttt546</div>
    </div>
    <nav id='mainNav'>Nav</nav>
    
    <footer id='pageFooter'>Footer</footer>
    <div id='menu'>menuuuu</div> 
</div>
///////////////////////////////////////////////////////////

<?php
session_start();
?>

if(isset($_POST['reset'])) {
    unset($_SESSION['sel']);
    unset($_POST['sel']);
  }

  if(isset($_POST['sel'])){
    $_SESSION["sel"]=$_POST['sel'];
  }  
  


  if(!(isset($_POST['sel'])|isset($_SESSION["sel"]))){
    echo isset($_POST['sel']);
    echo isset($_SESSION["sel"]);
  ?>

  if(isset($_POST['sel'])|isset($_SESSION["sel"])){

    switch ($_SESSION["sel"]):


        <form method="post"> 
        <input type="submit" name="reset"
                value="reset_all"/> 
</form>        