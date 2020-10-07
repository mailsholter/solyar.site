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













/////////////////////////////////////////////////////////// TOVAR.PHP <3 /////////////////////////////////////////















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
.img{
    position: absolute;
    bottom: 4px;
    left: -8px;
}
.plus{
    /* height: 20%;
    width: 1%; */
    position: relative;
    /* right: 50px; */
}
.minus{
    /* height: 20%;
    width: 1%; */
}
.zahal{
    height:220px;
    border: solid red 1px;
    width:75%;
    float:left;
}
.kartinku{
    height:100%;
    border: solid red 1px;
}
.photo{   
    height:220px;
    width:25%;
    border: solid green 1px;
    float:left;
    
    display: flex;
    justify-content:center;
}
.opus{
    border: solid blue 1px;
    width:60%;
    float:left;
    word-wrap:break-word;
    text-align:center;
}
#right_panel{
    width:24%;
    height:500px;
    border: solid yellow 1px;
    float:right;
}
.button{
  width:14%;
  height:100%;
  float:right;
  border: solid;
}
.delete {
    position: relative;
    left: 80px;
    bottom: 15px;
    height: 20%;
    width: 1%;
}
.c_only{
    font-size:70%;
}
.number{
    font-size:150%;
    font-weight:bolder;
    text-indent: 20px;
    /* float:left;*/
     width:40%;
    /* text-align:center; */
}
.close {
    position: relative;
    right: 32px;
    top: 32px;
    width: 32px;
    height: 32px;
    opacity: 0.3;
    left: 67%;
    right: 0;
    top: 0;
    bottom: 0;
}
.close:hover {
    opacity: 1;
}
.close:before, .close:after {
    position: absolute;
    left: 15px;
    content: ' ';
    height: 33px;
    width: 2px;
    background-color: #333;
}
.close:before {
    transform: rotate(45deg);
}
.close:after {
    transform: rotate(-45deg);
}
</style>
<?php
$x= pg_connect("host=localhost port=5432 user=postgres password=000000 dbname=postgres options='--client_encoding=UTF8'");
if(!isset($_COOKIE["password"])){?>
<div id="right_panel">
<form action="purchase.php" enctype="multipart/form-data" method="post">
    <h1>Загальна сума</h1>
    <p id='suma'>0</p>
    <h2>Кількість товару</h2>
    <p id="kilkist"></p>
    <input type="hidden" name="pokupky" value=''>
    <fieldset>
    <legend>Адреса доставки</legend>
    <input type="text" name="selo" placeholder="населений пункт" required><br>
    <input type="text" name="street" placeholder="вулиця" required>
    <input type="text" name="number" placeholder="№ будинку" required>
    <input type="text" name="mob_numb" placeholder="+380" required>
    <input type="text" name="name" placeholder="П.І.Б" required>
    <input id="val" type="hidden" name="purchase" value="">
    </fieldset>
    <input type="submit" id="buy" value="купити"></input>
    </form>
</div>
<?php
}
else{ 
    $registr = pg_query("select name, surname, adress, phone_number from покупці where login ='".$_COOKIE["login"]."' and password = '".$_COOKIE["password"]."';");
    $reg_info = pg_fetch_array($registr);
    $adress = $reg_info[2];
    $adress = explode("/",$adress);
    echo '<div id="right_panel">';
    echo '<form action="purchase.php" enctype="multipart/form-data" method="post">';
    echo '<h1>Загальна сума</h1>';
    echo "<p id='suma'>0</p>";
    echo "<h2>Кількість товару</h2>";
    echo "<p id='kilkist'></p>";
    echo '<input type="hidden" name="pokupky" value="">';
    echo '<fieldset>';
    echo '<legend>Адреса доставки</legend>';
    echo '<input type="text" name="selo" value = '.$adress[0].' placeholder="населений пункт" required><br>';
    echo '<input type="text" name="street" value = "'.$adress[1].'" placeholder="вулиця" required>';
    echo '<input type="text" name="number" value = "'.$adress[2].'" placeholder="№ будинку" required>';
    echo '<input type="text" name="mob_numb" value = "'.$reg_info[3].'" placeholder="+380" required>';
    echo '<input type="text" name="name" value = "'.$reg_info[0]." ".$reg_info[1].'" placeholder="П.І.Б" required>';
    echo '<input id="val" type="hidden" name="purchase" value="">';
    echo '</fieldset>';
    echo '<input type="submit" id="buy" value="купити"></input>';
    echo '</form>';
    echo '</div>';
}
?>
<?php
if(isset($_POST['pokypku'])) {  
    $str = $_POST['pokypku'];             ////получаємо з головної сторінки масив з коду товару і кількості розділених ':'
    $str = explode(",", $str);            ////створюємо масив розділяючи по коду
    $proba="";                            
    for ($i=0;$i<count($str);$i++){        ////перебираємо масив код:кількість
        echo "<div class ='zahal'>";
        $proba = explode(":",$str[$i]);        ////розділяємо масив
        $cod =$proba[0];
        $table_names = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema NOT IN ('information_schema','pg_catalog');"); ////получаємо імена всіх таблиць
        while($m=pg_fetch_row($table_names)){          ////перебираємо імена всіх табшлиць для пошуку по коду
            $poshuk=pg_query("select виробник, модель, ціна, опис, img from $m[0] where код = $cod");
            if(pg_fetch_array($poshuk)!=""){
                $stroka_poliv = "";
                $tbmane=$m[0];         ////якщо таблиця буде знайдена то вона запишеться сюди
                $polya_table = pg_query("SELECT column_name FROM information_schema.columns WHERE table_name =  '$tbmane' and column_name != 'imag' and column_name!='img' ;"); ////дістаємо всі поля знайденої таблиці
                while($z = pg_fetch_row($polya_table)){
                    $stroka_poliv.=$z[0].", ";    ////записуємо всі поля в зручному для нас форматі, а саме через кому
                }
                $stroka_poliv=trim($stroka_poliv,", ");  //// обрізаємо останню кому для SQL запиту
                $zapyt = pg_query("select $stroka_poliv from $tbmane where код = $cod;");  ////дістаємо інформацію з таблиці по коду
                $kartinka = pg_query("select img from $tbmane where код = $cod;");  //// дістаємо масив з фотографіями
                $kartinka = pg_fetch_row($kartinka);
                $kartinka=trim($kartinka[0],"}{");  ////обрізаємо краї
                $kartinka=explode(",",$kartinka); ////розділяємо по комах
                echo '<div class="photo">';     //// клас для рамки з фото
                for($n=0;$n<count($kartinka);$n++){
                    echo '<img class="kartinku" src= '.$kartinka[$n].'></img>';  ////вивід фото
                    break;   ////якзо забрати break то виводитися будуть всі фото
                }
                echo "</div>";
                echo '<div class="opus">';
                $info_z_poliv = pg_fetch_array($zapyt);   ////тут всі поля таблиці
                $pole=explode(",",$stroka_poliv);
                //var_dump($pole);     ////тут лишні пробіли біля значень
                // echo '<div class="wrapper">';
                for($k=0;$k<count($info_z_poliv);$k++){
                    if($pole[$k]!="" || $info_z_poliv[$k]!=""){ ////перевірка для того щоб лишній раз не виводило знак '-'
                        if($pole[$k]=="виробник"){
                            echo $info_z_poliv[$k]." ";
                        }
                        else if($pole[$k]==" модель"){
                            echo $info_z_poliv[$k]."<br>";
                        }
                        else if($pole[$k]==" кількість"){
                            continue;
                        }
                        else{
                            echo $pole[$k]." - ".$info_z_poliv[$k].'<br>'; ////вивід в форматі ПОЛЕ-ЗНАЧЕННЯ
                        }
                        
                    }
                    else{
                        break;
                    }

                }
                $price=pg_query("select ціна from $tbmane where код = $cod;"); ////вивід ціни
                $price = pg_fetch_row($price);
                echo '</div>';
                // echo "<br>";    
                echo "<div class='button'>";
                echo "<span class = 'close'></span>";
                echo "<button class = 'plus'>+</button>";   ////кніпка плюс 
                echo "<c class='number'>$proba[1]</c>";   ////кількість товару
                echo "<input class = 'babku' type='hidden' value=".$price[0].">"; ////ціна за штуку з типом hidden (це для js)
                echo "<button class = 'minus'>-</button>"; ////кніпка мінус
                echo "<input class = 'cd' type='hidden' value=".$cod.">";
                echo "<c class='c_only'>ціна: $price[0]</c>";
                echo "</div>"; 
                break;
            }
            else{
                continue;
            }    
    }
          
    echo "</div>";
}
?>

<?php
}
?>


<script>
localStorage.clear();
var button = document.querySelector("#buy")   ////Кнопка купити
var plus = document.querySelectorAll(".plus");  ////Кнопка плюс біля товару
var minus = document.querySelectorAll(".minus");  ////Кнопка мінус біля товару
var numbr = document.querySelectorAll(".number");  ////вузол в якому є кількість товару в корзині
var suma = document.querySelector('#suma');  ////вузол в якому повинна бути сума всіх товарів
var babku = document.querySelectorAll(".babku");  //// вузол з типом hidden в якому вказується ціна за одиницю товару
var deleted = document.querySelectorAll(".close");   //// вузол з кнопкоб видалити
var kilkist = document.querySelector("#kilkist");
var cod = document.querySelectorAll(".cd");
var zahalna_summa = 0;
var sma = 0;
button.onclick=function click(){     
    button.backgroundColor = "green";
    stroka = '';
    vally();
    //            ////очищаємо localstorage після натискання на кнопку 'купити'
};
for (let elem of plus){   ////цикл для плюса
     elem.onclick=function pls(){
        let conect = elem.nextSibling.nextSibling.value;  ////підєднуємося до ціни товару з типом hidden
        // elem.style.backgroundColor = "#bebec6";   ////при натисканні робимо кнопочку червоною  
        let cnt = Number(elem.nextSibling.innerHTML);   ////підєднуємося до вузла в якому є кількість товару
        cnt++;   ////додаємо одиницю при натисканні +
        kilkist.innerHTML = parseInt(kilkist.innerHTML)+1;
        elem.nextSibling.innerHTML =cnt;   ////перезаписуємо
        suma.innerHTML=parseInt(suma.innerHTML)+parseInt(conect);  ////додаємо ціну товару до загальної суми
        let mins = elem.nextSibling.nextSibling.nextSibling;   ////підєднуємося до кнопки з мінусом
        mins.removeAttribute("disabled"); ////забираємо атрибут disable який зявляється після того як покупець хоче натиснути - при одній одиниці кількості товару
    }
};
for (let elem of minus){   ////цикл для мінуса
    elem.onclick=function mns(){
        let conect = elem.previousSibling.value;   ////підєднуємося до ціни товару з типом hidden
        // elem.style.backgroundColor = "#9a9aa8";    ////при натисканні робимо кнопку синьою
        let cnt = Number(elem.previousSibling.previousSibling.innerHTML);   ////підєднуємося до вузла в якому є кількість товару
        if (parseInt(suma.innerHTML)-parseInt(conect)>1 ||cnt>1){   ////менше ніж одиниця бути не може
            cnt--;   ////робимо -1
            kilkist.innerHTML = parseInt(kilkist.innerHTML)-1;
            elem.previousSibling.previousSibling.innerHTML = cnt;    ////перезаписуємо
            suma.innerHTML= parseInt(suma.innerHTML)-parseInt(conect);    ////віднімаємо ціну товару від загальної суми
        }
        else{
            alert("Помилка!");   ////якщо кількість товару хочуть зробити 0
            elem.setAttribute("disabled", "true");   ////відключаємо кнопку
        }
    }
};
for (let elem of deleted){
    elem.onclick=function dlt(){
        let ppric = parseInt(elem.nextSibling.nextSibling.nextSibling.value);
        let kilka = parseInt(elem.nextSibling.nextSibling.innerHTML);
        let key = elem.nextSibling.value;
        localStorage.removeItem(key)
        let pererah = elem.nextSibling.nextSibling.innerHTML;
        elem.parentElement.parentElement.remove();
        kilkist.innerHTML=parseInt(kilkist.innerHTML)-parseInt(pererah);
        suma.innerHTML = parseInt(suma.innerHTML)-(ppric*kilka);
        vally();
    }
}
for (let elem of plus){
    let stuka = elem.nextSibling.innerHTML;   ////кільіксть товару 
    let conect = elem.nextSibling.nextSibling.value;   ////получаємо ціну товару
    zahalna_summa+=parseInt(stuka)*parseInt(conect);   ////додаємо ціну*кількість кожного товару
    
};
suma.innerHTML = zahalna_summa;   ////записуємо загальну суму 
// button.onclick = function inf(){
//     alert("valeraaaaaaa");
// }
function perevirka(){
    for(let elem of plus){
        let count = parseInt(elem.nextSibling.innerHTML);
        sma+= count;
        vally();
    }
}
for(let elem of plus){
    let count = parseInt(elem.nextSibling.innerHTML);
    sma+= count;
    vally();
}
// function price(){
//     for(let elem of babku){
//         console.log(elem.value);
//     }
// }
// function cont(){
//     for(let elem of numbr){
//         console.log(elem.innerHTML);
//     }
// }
// function cot(){
//     for(let elem of cod){
//         console.log(elem.value);
//     }
// }
// price();
// cont();
// cot();
var stroka = "";
function vally(){
    for (let elem of numbr){
        let val = elem.innerHTML +"/"+elem.nextSibling.value;
        // localStorage.setItem(elem.nextSibling.nextSibling.nextSibling.value,val);
        stroka+= elem.nextSibling.nextSibling.nextSibling.value+"/"+val+"|";
    }
    val.value = stroka;
}
kilkist.innerHTML=sma;
</script>
</body>
</html>










///////////////////////////////////INDEX.PHP//////////////////////////////////////////
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>
  <style>
    .hidden_div{
      height:70%;
      width:60%;
      display:none;
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      margin: auto;
      background-color: rgba(0,0,0,0.5);
      overflow:hidden;
      Justify-content:space-between;
    /* position:fixed; */
    }
    .hidden_img{
      display:none;
      height:80%;
      margin-left:15px;
      margin-right:15px;
    }
  </style>
<div id="main_panel">
<?php
$check = false;
$x= pg_connect("host=localhost port=5432 user=postgres password=000000 dbname=postgres options='--client_encoding=UTF8'");
session_start();
$table_names = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema='public' AND table_type='BASE TABLE' AND table_name!='allstorage' AND table_name!='покупці';");
if((!isset($_POST['login'])||isset($_POST['return'])) && !isset($_COOKIE["password"])){
?>
<form id="register" action="registr.php" enctype="multipart/form-data" method="post">
<input type="submit" value="sing up">
</form>
<form id="login" action="" enctype="multipart/form-data" method="post">
  <input type="text" id='log' placeholder="логін" name="login" minlength="6" maxlength="12" pattern ="[A-Za-z0-9]+" required >
  <input type="text" id='pass' placeholder="пароль" name="password" minlength="6" maxlength="12" pattern ="[A-Za-z0-9]+" required >
  <input id ="subb" type="submit" value="sign in">
</form>
<?php
}
else{
  if (isset($_POST['login']) && isset($_POST['password'])){
    $_SESSION['login']=$_POST['login'];
    $_SESSION['password']=$_POST['password'];
  }
  $perevirka =pg_query("select password, name from покупці where login='".$_SESSION["login"]."';");
  // echo "select password, name from покупці where login='".$_SESSION["login"]."';";
  if($perevirka){
    // var_dump($perevirka);
    $log=pg_fetch_row($perevirka);
    // var_dump($log);
      if($log[0]==$_SESSION['password']){
        echo '<a href=cstmr.php?id='.$log[1].'>';
        echo "Вітаю $log[1]";
        echo '</a>';
        $check=true;
        setcookie("password", $_SESSION['password'], time()+3600);
        setcookie("login", $_SESSION['login'], time()+3600);
      }
      else{
        echo "Введіть правильні данні";
        $check=false;
        unset($_SESSION['password']);
        unset($_SESSION['login']);
        echo '<form id="exit" action="" enctype="multipart/form-data" method="post">';
        echo '<input type="submit" value="return" name="return">';
        echo '</form>';
      }
  }
}
if ($check){
  echo '<form id="exit" action="" enctype="multipart/form-data" method="post">';
  echo '<input type="submit" value="exit" name="exit">';
  echo '</form>';
  if($_POST['exit'] !=""){
    unset($_SESSION['password']);
    unset($_SESSION['login']);
    // setcookie("password","",time()-3600,"/");
    // setcookie("login","",time()-3600,"/");
  }
}
// unset($_SESSION['login']); //////очищаємо сесію
?>

<form action="tovar.php" id='basket_form' enctype="multipart/form-data" method="post">
  <input id="ole" type = "hidden" name ="pokypku" value = "echo">
  <button  id='basket_bt'><img src = "/basket.png"><c id="counter"></c></button>
  <?php echo "<input type = 'hidden' name='tuble' value= ".$_SESSION['table']." >"?>
</form>
</div>
<nav>
<ul class="top_menu">
<li><a href="" class="down">Товари</a>
      <ul class="submenu">
        <?php
        while ($a =pg_fetch_array($table_names)){
          echo '<li><a class="rozdily" href=pereadress.php?id=0>'.$a[0].'</a></li>';
       }
        ?>
      </ul>
      </li>
<li><a href="">Про нас</a></li>
<li><a href="">Контакти</a></li><br>
</ul>
</nav>
 <div id = 'article'> 
  <div id = 'left_panel'>
   <h3 >ліва панель</h3>
   <form action="" enctype="multipart/form-data" method="post">
   <?php
   echo '<form action="" enctype="multipart/form-data" method="post">';
  //  $table_names = pg_query("select distinct type from allstorage;");
  //  while ($a =pg_fetch_array($table_names)){
  //     echo '<p><input type = "radio" id = "buttom'.$i.'"
  //     name = "tovar" value ="'.$a[0].'">'.$a[0].'</p>';
  //     $i++;
  //  }
  //  echo '<p><input type="submit" value="Вибрати"></p>';
  //  echo '</form>';


  //  if(isset($_POST['tovar'])){
  //   $tovar = $_POST['tovar'];

    
  //   }
  //   if(isset($tovar)){
  //   if ($tovar == 'Холодильник'){
  //       $_SESSION['table'] = 'refrigerator';
  //   }
  //   elseif ($tovar == 'Ноутбук') {
  //     $_SESSION['table'] = 'notebook';
  //   }
  //   else{
  //     $_SESSION['table'] = 'мобілки';
  //   }
  // }
  // echo $_SESSION['table'];
   ?>
    </form>
   <form action="" enctype="multipart/form-data" method="post">
     <legend>Виберіит категорію товару</legend>
     <!-- проба -->
    <p id = "button1" style = "color:red;" ><input type = "radio" 
          name = "sort"  value ="sort_up">сортування за найвищою ціною</p>
    <p><input type = "radio" class="bt2" id = "button2"name = "sort" value ="Сортування за найнижчою ціною">
    Сортування за найнижчою ціною </p>
                  
  <?php   
  if(isset($_GET["id"])){
    $_SESSION['table']=$_GET["id"];
                                                   ////////ТУТ ТРЕБА ПОПРАВИТИ І ЗАМІТИТИ ВСІ ТАБЛИ НА ТИПИ ТОВАРІВ
  }
  // if(isset($_GET['id'])){
  //   if($_GET['id']=="refrigerator"){
  //     $_SESSION['type']="'Холодильник'";
  //   }
  //   elseif($_GET['id']=="мобілки"){
  //     $_SESSION['type']="'Телефон'";
  //   }
  //   elseif($_GET['id']=="notebook"){
  //     $_SESSION['type']="'Ноутбук'";
  //   }
  // }
  
  if (isset($_POST['sort'])){
    $_SESSION['sort'] = $_POST['sort'];
  } 
  ?>
 <p><input type="submit" value="Вибрати"></p>
   </form>

  </div>
  <div id = 'artcl'>
    <?php
    if((isset($_POST['sort']) || $_SESSION['table']) || (isset($_SESSION['sort']) || $_SESSION['table'])){
      if($_SESSION['sort'] == 'sort_up' || $_POST['sort'] == 'sort_up' ){
        $zp = pg_query("select imag, виробник, модель, ціна, код from ".$_SESSION['table']." order by ціна DESC;");
      }
      else{
        $zp = pg_query("select imag, виробник, модель, ціна, код from ".$_SESSION['table']." order by ціна ASC;");
      }
    }
    else{
      $zp = pg_query("select imag, виробник, модель, ціна, код from ".$_SESSION['table'].";");
    }
    


   // початок список товарів 

  $i=0;
  while ($val = pg_fetch_row($zp)) {
   echo "<div class = 'articles'>";
   echo '<form action = "" class="form_item" method = "post" enctype="multipart/form-data">';
   echo "<a title='жмякніть щоб дізнатися більше про цей товар)' href=storinka_tovaru.php?id=$val[4]>";
   echo '<div id=wind>';
    $photo = '"'.$val[0].'"';
    echo '</a>';
     echo '<img class = "photo" src= '.$photo.'></img>';
      
     echo "<a title='жмякніть щоб дізнатися більше про цей товар)' href=storinka_tovaru.php?id=$val[4]>";
     echo "<div class='namemodel'>";
       echo "<c>$val[1] </c>";
       echo "<c>$val[2]</c>";
       echo "</div>";
       echo "<p>$val[3]</p>";
       echo "<p code=".$val[4].">code:$val[4]</p>";
       echo '</a>';
       echo '<p class = "pbut_buy"><input type = "button" class = "but_buy"  value="Купити"></p>';
       
        echo '</div>';
       echo  '</div>';
       echo "</form>";      
       $photka = pg_query("select img from ".$_SESSION['table']." where код = '".$val[4]."';");
       
       $photky=pg_fetch_row($photka);
      //  var_dump($photky);
       $photky=trim($photky[0],"{}");
       $photky=explode(",",$photky); 
        echo "<p class='hidden_div'>";
        echo "<button onclick='lft()' id='left'><</button>";
         for($p = 0;$p<count($photky);$p++){
            //  echo "<img class = 'hidden_img' src =".$photky[$p]."></img>";
         }
         echo "<button onclick='rght()' id='right'>></button>";
         echo "</p>";
      //  кінець форми списку товарів
  }
?>
<form action="proba.php">
  <button>proba</button>
</form>
<form action="test.php">
  <button>teeeeeeest</button>
</form>
<form action="poligon.php">
  <button>полігон</button>
</form>
<script>
        var a = document.querySelector("#basket_bt");
        var clac = document.querySelectorAll(".form_item");
        var b = document.querySelectorAll(".but_buy");
        var count = document.querySelector("#counter");
        var photka = document.querySelectorAll('.photo');
        var n = b.length;
        var left = document.querySelector("#left");
        var right = document.querySelector("#right");
        var vidpr =document.querySelector("#basket_form");
        var rozdily = document.querySelectorAll(".rozdily");
        var cot = document.querySelectorAll(".cot");
        var arr = "";



        subb.onclick = function perev(){
          var request1 = new XMLHttpRequest();
          request1.open('POST','pass_check.php',false);
          var body = "login="+subb.previousElementSibling.previousElementSibling.value+"&pass="+subb.previousElementSibling.value;
          alert(body);
          request1.addEventListener('readystatechange', function(){
            if ((request1.readyState==4) && (request1.status==200)){
              alert(request1.responseText);
            }
          });
          request1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          request1.send(body);
        }




        // for (let elem of photka){
        
        //   elem.onclick = function baka(){
        //     let conn = (elem.parentElement.parentElement.parentElement.nextSibling.firstChild.parentElement);
        //     let pht = elem.parentElement.parentElement.parentElement.nextSibling;
        //       elem.parentElement.parentElement.parentElement.nextSibling.childNodes[1].style.display = "block";
        //     conn.style.display = "flex";
        //   }
        // }
        var ctn = 2;


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        for(let elem of photka){
          elem.addEventListener("click",function() {
            // console.log(elem.parentElement.parentElement.parentElement.nextSibling.insertAdjacentHTML('beforeEnd',request.responseText));
        var request = new XMLHttpRequest();
        var body = "code="+elem.parentElement.lastChild.previousElementSibling.lastChild.getAttribute('code');
        request.open('POST','server_kartinki.php',false);
        request.addEventListener('readystatechange', function(){
          if ((request.readyState==4) && (request.status==200)){
            elem.parentElement.parentElement.parentElement.nextSibling.childNodes[0].insertAdjacentHTML("afterend",request.responseText);
            // elem.parentElement.parentElement.parentElement.nextSibling.childNodes[0].after(request.responseText);
            ///////////
            let conn = (elem.parentElement.parentElement.parentElement.nextSibling.firstChild.parentElement);
            let pht = elem.parentElement.parentElement.parentElement.nextSibling;
              elem.parentElement.parentElement.parentElement.nextSibling.childNodes[1].style.display = "block";
            conn.style.display = "flex";
            //////////
          }
        });
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(body);

        });
        }


          function lft(){
            ctn--;
            if(ctn=1){
              ctn =left.parentElement.children.length-2
            }
          for(let k = 1;k<left.parentElement.children.length-1;k++){
              if(ctn == k){
                left.parentElement.childNodes[k].style.display = "block";
              }
              else{
                left.parentElement.childNodes[k].style.display = "none";
              }
          }
          }
//         login.onsubmit = function vidpravka() {
//         var request = new XMLHttpRequest();
//         request.open('GET','pass_check.php',false);
//         var body="login="+log.value+"&pass="+pass.value;
//         request.addEventListener('readystatechange', function(){
//         if ((request.readyState==4) && (request.status==200)){
//           login.innerHTML = request.responseText;
//         }
//       })
//       request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//       request.send(body);
// }
        
          function rght(){
            ctn++;
            if(ctn>right.parentElement.children.length-1){
              ctn = 1
            }
          for(let k = 1;k<right.parentElement.children.length-1;k++){
              if(ctn == k){
                right.parentElement.childNodes[k].style.display = "block";
              }
              else{
                right.parentElement.childNodes[k].style.display = "none";
              }
          }
          console.log(ctn);
        }



        basket_bt.onclick = function basket_func(){
          for(let i = 0;i<localStorage.length;i++){
            let key = localStorage.key(i);
            if (key != "cnt"){
              arr+=key+":";    
              arr+=localStorage.getItem(key)+",";
            }
            else{
              continue;
            }
          }
          let tovar=arr.slice(0,arr.length-1); ////////Обрізаєм лишню кому
          var kj = document.querySelector("#ole");
          kj.value = tovar;
          vidpr.submit();
      }
      
      
      if (!localStorage.getItem("cnt")){
        var cnt=0;
        localStorage.setItem("cnt",cnt);
      }
      else{
        var cnt = 0;
        for(let i = 0;i<localStorage.length;i++){
          let key = localStorage.key(i);
          let value = localStorage.getItem(key);
          cnt+=parseInt(value);
          counter.innerHTML = cnt;
          localStorage.setItem("cnt",cnt);
        }
      }

      

      
      for (let elem of b){
        elem.onclick = function foo(){
          cnt++;
          counter.innerHTML=cnt;
          localStorage.setItem("cnt",cnt);
          elem.style.backgroundColor = "red";
          var code = elem.parentElement.parentElement.lastChild.previousElementSibling.lastChild.getAttribute('code');
          // alert(elem.parentElement.parentElement.lastChild.previousElementSibling.lastChild.getAttribute('code'));
          if(!localStorage.getItem(code)){
            localStorage.setItem(code , 1);
          }
          else{
            var cn = localStorage.getItem(code);
            cn++;
            localStorage.setItem(code , cn);
          }
        }
      }
      for(let elem of rozdily){
        let val =elem.innerHTML;
        elem.href ="pereadress.php?id="+val;
        // console.log(elem.outerHTML);
        
      }
      // localStorage.clear();//очищаємо localStorage////
  </script>
</body>
</html>












//////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>
  <style>
    .hidden_div{
      height:70%;
      width:60%;
      display:none;
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      margin: auto;
      background-color: rgba(0,0,0,0.5);
      overflow:hidden;
      Justify-content:space-between;
    /* position:fixed; */
    }
    .hidden_img{
      display:none;
      height:80%;
      margin-left:15px;
      margin-right:15px;
    }
    #hidden_form{
      display:none;
    }
    #right{
      height: 300px;
      position: relative;
      top: 15%;
      left: 24%;
    }
#close:after{
  font-size:50px;
  content: '\2716';
  right: 2px;
  position: absolute;
}
  </style>
<div id="main_panel">
<?php
$check = false;
$x= pg_connect("host=localhost port=5432 user=postgres password=000000 dbname=postgres options='--client_encoding=UTF8'");
session_start();
$table_names = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema='public' AND table_type='BASE TABLE' AND table_name!='allstorage' AND table_name!='покупці';");
?>
<form id="register" action="registr.php" enctype="multipart/form-data" method="post">
<input type="submit" value="sign up">
</form>
<form id="login" action="" enctype="multipart/form-data" method="post">
  <input type="text" id='log' placeholder="логін" name="login" minlength="6" maxlength="12" pattern ="[A-Za-z0-9]+" required >
  <input type="text" id='pass' placeholder="пароль" name="password" minlength="6" maxlength="12" pattern ="[A-Za-z0-9]+" required >
  <input id ="subb" type = "button" value="sign in">
</form>

<form id ="hidden_form">
  <p id = "hidden_p"></p>
</form>
<input id = "exut" type="button" value="exit">

<form action="tovar.php" id='basket_form' enctype="multipart/form-data" method="post">
  <input id="ole" type = "hidden" name ="pokypku" value = "echo">
  <button  id='basket_bt'><img src = "/basket.png"><c id="counter"></c></button>
  <?php echo "<input type = 'hidden' name='tuble' value= ".$_SESSION['table']." >"?>
</form>
</div>
<nav>
<ul class="top_menu">
<li><a href="" class="down">Товари</a>
      <ul class="submenu">
        <?php
        while ($a =pg_fetch_array($table_names)){
          echo '<li><a class="rozdily" href=pereadress.php?id=0>'.$a[0].'</a></li>';
       }
        ?>
      </ul>
      </li>
<li><a href="">Про нас</a></li>
<li><a href="">Контакти</a></li><br>
</ul>
</nav>
 <div id = 'article'> 
  <div id = 'left_panel'>
   <h3 >ліва панель</h3>
   <form action="" enctype="multipart/form-data" method="post">
   <?php
   echo '<form action="" enctype="multipart/form-data" method="post">';
  //  $table_names = pg_query("select distinct type from allstorage;");
  //  while ($a =pg_fetch_array($table_names)){
  //     echo '<p><input type = "radio" id = "buttom'.$i.'"
  //     name = "tovar" value ="'.$a[0].'">'.$a[0].'</p>';
  //     $i++;
  //  }
  //  echo '<p><input type="submit" value="Вибрати"></p>';
  //  echo '</form>';


  //  if(isset($_POST['tovar'])){
  //   $tovar = $_POST['tovar'];

    
  //   }
  //   if(isset($tovar)){
  //   if ($tovar == 'Холодильник'){
  //       $_SESSION['table'] = 'refrigerator';
  //   }
  //   elseif ($tovar == 'Ноутбук') {
  //     $_SESSION['table'] = 'notebook';
  //   }
  //   else{
  //     $_SESSION['table'] = 'мобілки';
  //   }
  // }
  // echo $_SESSION['table'];
   ?>
    </form>
   <form action="" enctype="multipart/form-data" method="post">
     <legend>Виберіит категорію товару</legend>
     <!-- проба -->
    <p id = "button1" style = "color:red;" ><input type = "radio" 
          name = "sort"  value ="sort_up">сортування за найвищою ціною</p>
    <p><input type = "radio" class="bt2" id = "button2"name = "sort" value ="Сортування за найнижчою ціною">
    Сортування за найнижчою ціною </p>
                  
  <?php   
  if(isset($_GET["id"])){
    $_SESSION['table']=$_GET["id"];
                                                   ////////ТУТ ТРЕБА ПОПРАВИТИ І ЗАМІТИТИ ВСІ ТАБЛИ НА ТИПИ ТОВАРІВ
  }
  // if(isset($_GET['id'])){
  //   if($_GET['id']=="refrigerator"){
  //     $_SESSION['type']="'Холодильник'";
  //   }
  //   elseif($_GET['id']=="мобілки"){
  //     $_SESSION['type']="'Телефон'";
  //   }
  //   elseif($_GET['id']=="notebook"){
  //     $_SESSION['type']="'Ноутбук'";
  //   }
  // }
  
  if (isset($_POST['sort'])){
    $_SESSION['sort'] = $_POST['sort'];
  } 
  ?>
 <p><input type="submit" value="Вибрати"></p>
   </form>

  </div>
  <div id = 'artcl'>
    <?php
    if((isset($_POST['sort']) || $_SESSION['table']) || (isset($_SESSION['sort']) || $_SESSION['table'])){
      if($_SESSION['sort'] == 'sort_up' || $_POST['sort'] == 'sort_up' ){
        $zp = pg_query("select imag, виробник, модель, ціна, код from ".$_SESSION['table']." order by ціна DESC;");
      }
      else{
        $zp = pg_query("select imag, виробник, модель, ціна, код from ".$_SESSION['table']." order by ціна ASC;");
      }
    }
    else{
      $zp = pg_query("select imag, виробник, модель, ціна, код from ".$_SESSION['table'].";");
    }
    


   // початок список товарів 

  $i=0;
  while ($val = pg_fetch_row($zp)) {
   echo "<div class = 'articles'>";
   echo '<form action = "" class="form_item" method = "post" enctype="multipart/form-data">';
   echo "<a title='жмякніть щоб дізнатися більше про цей товар)' href=storinka_tovaru.php?id=$val[4]>";
   echo '<div id=wind>';
    $photo = '"'.$val[0].'"';
    echo '</a>';
     echo '<img class = "photo" src= '.$photo.'></img>';
      
     echo "<a title='жмякніть щоб дізнатися більше про цей товар)' href=storinka_tovaru.php?id=$val[4]>";
     echo "<div class='namemodel'>";
       echo "<c>$val[1] </c>";
       echo "<c>$val[2]</c>";
       echo "</div>";
       echo "<p>$val[3]</p>";
       echo "<p code=".$val[4].">code:$val[4]</p>";
       echo '</a>';
       echo '<p class = "pbut_buy"><input type = "button" class = "but_buy"  value="Купити"></p>';
       
        echo '</div>';
       echo  '</div>';
       echo "</form>";      
       $photka = pg_query("select img from ".$_SESSION['table']." where код = '".$val[4]."';");
       
       $photky=pg_fetch_row($photka);
      //  var_dump($photky);
       $photky=trim($photky[0],"{}");
       $photky=explode(",",$photky); 
        echo "<p class='hidden_div'>";
        echo "<button onclick='lft()' id='left'><</button>";
         for($p = 0;$p<count($photky);$p++){
            //  echo "<img class = 'hidden_img' src =".$photky[$p]."></img>";
         }
         echo "<button onclick='rght()' id='right'>></button>";
         echo "<span id = 'close'></span>";
         echo "</p>";
      //  кінець форми списку товарів
  }
?>
<form action="proba.php">
  <button>proba</button>
</form>
<form action="test.php">
  <button>teeeeeeest</button>
</form>
<form action="poligon.php">
  <button>полігон</button>
</form>
<script>
        var a = document.querySelector("#basket_bt");
        var clac = document.querySelectorAll(".form_item");
        var b = document.querySelectorAll(".but_buy");
        var count = document.querySelector("#counter");
        var photka = document.querySelectorAll('.photo');
        var n = b.length;
        var left = document.querySelector("#left");
        var right = document.querySelector("#right");
        var vidpr =document.querySelector("#basket_form");
        var rozdily = document.querySelectorAll(".rozdily");
        var cot = document.querySelectorAll(".cot");
        var exi = document.querySelector("#close");
        var arr = "";



        subb.onclick = function perev(){
          var request1 = new XMLHttpRequest();
          request1.open('POST','pass_check.php',false);
          var body = "login="+subb.previousElementSibling.previousElementSibling.value+"&pass="+subb.previousElementSibling.value;
          request1.addEventListener('readystatechange', function(){
            if ((request1.readyState==4) && (request1.status==200)){
              if(request1.responseText!="" || request1.responseText!="NULL"){
                document.cookie=('login='+subb.previousElementSibling.previousElementSibling.value+";max-age=3600");
                document.cookie=('pass='+subb.previousElementSibling.value+";max-age=3600");
              }
              subb.parentElement.style.display = "none";
              hidden_form.style.display = "block"; 
              hidden_p.innerHTML = request1.responseText;
              let mass = request1.response.split(" ");
              document.cookie=('name='+mass[0]+";max-age=3600");
              document.cookie=('surname='+mass[1]+";max-age=3600");
            }
          });
          request1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          request1.send(body);
        }
        function getCookie(name) {
        let matches = document.cookie.match(new RegExp(
          "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
          ));
          return matches ? decodeURIComponent(matches[1]) : undefined;
        }
        if(hidden_p.innerHTML==""){
          hidden_p.innerHTML=getCookie("name")+" "+getCookie("surname");
        }
        if(getCookie("name")!=undefined){
          login.style.display ="none";
          hidden_form.style.display = "block";
        }

        exut.onclick = function exit(){
          var cookiename = getCookie("name");
          var cookiesurname = getCookie("surname");
          document.cookie=('name='+cookiename+";max-age=-1");
          document.cookie=('surname='+cookiesurname+";max-age=-1");
          var lon = getCookie("login");
          var pos = getCookie("pass");
          document.cookie=('login='+lon+";max-age=-1");
          document.cookie=('pass='+pos+";max-age=-1");
          login.style.display ="block";
          hidden_form.style.display ="none";
        }

        var ctn = 2;


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        for(let elem of photka){
          elem.addEventListener("click",function() {
            // console.log(elem.parentElement.parentElement.parentElement.nextSibling.insertAdjacentHTML('beforeEnd',request.responseText));
        var request = new XMLHttpRequest();
        var body = "code="+elem.parentElement.lastChild.previousElementSibling.lastChild.getAttribute('code');
        request.open('POST','server_kartinki.php',false);
        request.addEventListener('readystatechange', function(){
          if ((request.readyState==4) && (request.status==200)){
            elem.parentElement.parentElement.parentElement.nextSibling.childNodes[0].insertAdjacentHTML("afterend",request.responseText);
            let conn = (elem.parentElement.parentElement.parentElement.nextSibling.firstChild.parentElement);
            let pht = elem.parentElement.parentElement.parentElement.nextSibling;
              elem.parentElement.parentElement.parentElement.nextSibling.childNodes[1].style.display = "block";
            conn.style.display = "flex";
            // console.log(request.responseText);
          }
        });
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(body);

        });
        }


          function lft(){
            ctn--;
            if(ctn=1){
              ctn =left.parentElement.children.length-2
            }
          for(let k = 1;k<left.parentElement.children.length-1;k++){
              if(ctn == k){
                left.parentElement.childNodes[k].style.display = "block";
              }
              else{
                left.parentElement.childNodes[k].style.display = "none";
              }
          }
          }
//         login.onsubmit = function vidpravka() {
//         var request = new XMLHttpRequest();
//         request.open('GET','pass_check.php',false);
//         var body="login="+log.value+"&pass="+pass.value;
//         request.addEventListener('readystatechange', function(){
//         if ((request.readyState==4) && (request.status==200)){
//           login.innerHTML = request.responseText;
//         }
//       })
//       request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//       request.send(body);
// }
        
          function rght(){
            ctn++;
            if(ctn>right.parentElement.children.length-1){
              ctn = 1
            }
          for(let k = 1;k<right.parentElement.children.length-1;k++){
              if(ctn == k){
                right.parentElement.childNodes[k].style.display = "block";
              }
              else{
                right.parentElement.childNodes[k].style.display = "none";
              }
          }
        }
      if(exi != null){
        exi.onclick = function exx(){
          let ln = exi.parentElement.children.length;
          exi.parentElement.style.display = "none";
          // for(let i = 1;i<=ln;i++){
          //   exi.parentElement.childNodes[i].style.display = "none";
          // }
        }
      }

        basket_bt.onclick = function basket_func(){
          for(let i = 0;i<localStorage.length;i++){
            let key = localStorage.key(i);
            if (key != "cnt"){
              arr+=key+":";    
              arr+=localStorage.getItem(key)+",";
            }
            else{
              continue;
            }
          }
          let tovar=arr.slice(0,arr.length-1); ////////Обрізаєм лишню кому
          var kj = document.querySelector("#ole");
          kj.value = tovar;
          vidpr.submit();
      }
      
      
      if (!localStorage.getItem("cnt")){
        var cnt=0;
        localStorage.setItem("cnt",cnt);
      }
      else{
        var cnt = 0;
        for(let i = 0;i<localStorage.length;i++){
          let key = localStorage.key(i);
          let value = localStorage.getItem(key);
          cnt+=parseInt(value);
          counter.innerHTML = cnt;
          localStorage.setItem("cnt",cnt);
        }
      }

      

      
      for (let elem of b){
        elem.onclick = function foo(){
          cnt++;
          counter.innerHTML=cnt;
          localStorage.setItem("cnt",cnt);
          elem.style.backgroundColor = "red";
          var code = elem.parentElement.parentElement.lastChild.previousElementSibling.lastChild.getAttribute('code');
          if(!localStorage.getItem(code)){
            localStorage.setItem(code , 1);
          }
          else{
            var cn = localStorage.getItem(code);
            cn++;
            localStorage.setItem(code , cn);
          }
          var zapyt = new XMLHttpRequest();
          var body = "code="+code ;
          zapyt.open('POST','serverok.php',false);
          if ((zapyt.readyState==4) && (zapyt.status==200)){
            console.log(zapyt.responseText);
          }
          zapyt.send(body);
        }
      }
      for(let elem of rozdily){
        let val =elem.innerHTML;
        elem.href ="pereadress.php?id="+val;
        // console.log(elem.outerHTML);
        
      }
      // localStorage.clear();//очищаємо localStorage////
  </script>
</body>
</html>













//////////////////////PURCHASE.PHP/////////////////////////
<?php
$x= pg_connect("host=localhost port=5432 user=postgres password=000000 dbname=postgres options='--client_encoding=UTF8'");
$z = pg_query("select client_code from покупці where login ='".$_COOKIE["login"]."' and password = '".$_COOKIE["password"]."';");
$z = pg_fetch_row($z);
if(isset($_COOKIE["name"])){
  $obn = pg_query("update покупці set корзина = 'null' where name = '".$_COOKIE['name']."' and password = '".$_COOKIE["password"]."'");
}
$client_code = $z[0];
$adress =$_POST['selo']."/".$_POST['street']."/".$_POST['number'];
$purchase = $_POST['purchase'];
$purchase = trim($purchase, "|");
$mas_purchase = explode("|", $purchase);
foreach($mas_purchase as $item){
  $mas_items =explode('/', $item);
  $table_names = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema NOT IN ('information_schema','pg_catalog');"); ////получаємо імена всіх таблиць
  while($m=pg_fetch_row($table_names)){          ////перебираємо імена всіх табшлиць для пошуку по коду
    $poshuk=pg_query("select виробник, модель, ціна, опис, img from $m[0] where код = $mas_items[0]");
    if(pg_fetch_array($poshuk)!=""){
      $tbmane=$m[0];
      break;
    }
    $code=random_int(100000,999999);
    $val = pg_query("select виробник, модель, кількість, тип, ціна from $tbmane where код = $mas_items[0]");
    $val = pg_fetch_array($val);
    $zanos = pg_query("insert INTO purchase(Бренд, Модель, Кількість, Тип, Ціна, customer_code, purchase_code, adress_vidpr) VALUES('".$val[0]."', '".$val[1]."', '".$val[2]."', '".$val[3]."', '".$val[4]."', '".$client_code."', '".$code."','".$adress."')");
    if ($zanos){
      echo "done".'<br>';
    }
    else{
      echo "not done".'<br>';
    }
  }
}
?>

<script>
localStorage.clear();
</script>