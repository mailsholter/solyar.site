<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <script src="jquery-3.5.1.js"></script>
</head>
<body>
<style>
.img{
    position: absolute;
    bottom: 4px;
    left: -8px;
}
.plus{
    /* height: 20%; */
    width: 15%;
    position: relative;
    /* right: 50px; */
    padding: 1px 1px;
    margin:1px;
    top: 5%;
}
.minus{
    /* height: 20%;*/
    width: 15%; 
    padding: 1px 1px;
    margin:1px;
    top: 5%;
    position: relative;
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
  width:13%;
  /* height:100%; */
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
    font-size: 120%;
    top: 40%;
    position: relative;
}
.number{
    font-size:150%;
    font-weight:bolder;
    text-indent: 20px;
    /* float:left;*/
     width:40%;
    /* text-align:center; */
    top: 12%;
    position: relative;
    left: 5%;
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
session_start();
$x= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user= 	
solyar17_adm 	 password=kjkszpg2001 options='--client_encoding=UTF8'");
if(!isset($_COOKIE["name"])){?>
<div id="right_panel">
<form  enctype="multipart/form-data" method="post">
    <h1>Загальна сума</h1>
    <p id='suma'>0</p>
    <h2>Кількість товару</h2>
    <p id="kilkist"></p>
    <input type="hidden" name="pokupky" value=''>
    <fieldset>
    <legend>Адреса доставки</legend>
    <input type="text" name="selo" placeholder="населений пункт" ><br>
    <input type="text" name="street" placeholder="вулиця" >
    <input type="text" name="number" placeholder="№ будинку" >
    <input type="text" name="mob_numb" placeholder="+380">
    <input type="text" name="name" placeholder="П.І.Б">
    <input id="val" type="hidden" name="purchase" value="">
    </fieldset>
    <input type="button" data-loading-text="Відправка..." id="buy" value="купити"></input>
    </form>
</div>
<?php
}
else{ 
    $registr = pg_query("select name, surname, adress, phone_number, client_code from покупці where password ='".$_COOKIE["pass"]."' and login = '".$_COOKIE["login"]."';");
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
    echo '<input type="text" name="selo" placeholder="населений пункт" required value ='.$adress[0].'><br>';
    echo '<input type="text" name="street" value = "'.$adress[1].'" placeholder="вулиця" required>';
    echo '<input type="text" name="number" value = "'.$adress[2].'" placeholder="№ будинку" required>';
    echo '<input type="text" name="mob_numb" value = "'.$reg_info[3].'" placeholder="+380" required>';
    echo '<input type="text" name="name" value = "'.$reg_info[0]." ".$reg_info[1].'" placeholder="П.І.Б" required>';
    echo '<input id="val" type="hidden" name="purchase" value="">';
    echo '</fieldset>';
    echo '<input type="submit" data-loading-text="Відправка..." id="buy" value="купити"></input>';
    echo '</form>';
    echo '</div>';
}
?>
<?php
if(!isset($_COOKIE["pass"])){
if(isset($_POST['pokypku'])){ 
    setcookie("pokupka", $str, time()+3600);
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
                echo "<input class = 'babku' type='hidden' value=".$price[0]."><br>"; ////ціна за штуку з типом hidden (це для js)
                echo "<button class = 'minus'>-</button>"; ////кніпка мінус
                echo "<input class = 'cd' type='hidden' value=".$cod."><br>";
                echo "<c class='c_only'>ціна:</c><br>";
                echo "<c style='position: relative; top: 40%;left: 30%;'>$price[0]₴</c><br>";
                echo "</div>"; 
                break;
            }
            else{
                continue;
            }    
    }
    echo "</div>";
}
}
}
else{
    $str = $_POST['pokypku'];            
    // $str = explode(",", $str);            
    // $proba="";                            
    // for ($i=0;$i<count($str);$i++){
    //     if($i+1==count($str)){
    //         $tr.= $str[$i];
    //     }
    //     else{
    //         $tr.=$str[$i].",";
    //     }
    // }
    // $pokupka = pg_query("update покупці set корзина = '".$tr."' where client_code ='".$reg_info[4]."';");
    $pr = pg_query("select корзина from покупці where password ='".$_COOKIE["pass"]."' and login = '".$_COOKIE["login"]."';");
    $pr = pg_fetch_row($pr);
    $str = $str.",".$pr[0];
    $str = explode(",",$str);
    // var_dump($str);
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
                echo "<input class = 'cd' type='hidden' value=".$cod."><br>";
                echo "<c class='c_only'>ціна:</c><br>";
                echo "<c style='position: relative; top: 40%;left: 30%;'>$price[0]₴</c><br>";
                echo "</div>"; 
                break;
            }
            else{
                continue;
            }    
    }
    echo "</div>";
}
}

?>

<?php

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
    alert("valera");
    stroka = '';
    $.post({
        url :"purchae.php",          // адрес отправки запроса
        data: {par1:"baka",valera:"petrenko"},  // передача с запросом каких-нибудь данных
        beforeSend: function(){
            button.value="загрузка....";
        },
        success: function(data) {              
            console.log(data);
        },
        error: function(){
            button.value="ПОМИЛКА";
            alert('ERROR');
        }
    
    });
    vally();
};
function getCookie(name) {
        let matches = document.cookie.match(new RegExp(
          "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
          ));
          return matches ? decodeURIComponent(matches[1]) : undefined;
}
for (let elem of plus){   ////цикл для плюса
     elem.onclick=function pls(){
        if(getCookie("name")==undefined){
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
        else{
            var xml1= new XMLHttpRequest();
            var kkd= "pls="+elem.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.value;
            xml1.open('POST','plus_minus_server.php',false);
            xml1.addEventListener('readystatechange', function(){
              if ((xml1.readyState==4) && (xml1.status==200)){
                console.log(xml1.responseText);
              }
            });
            xml1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xml1.send(kkd);
        }
    }
};
for (let elem of minus){   ////цикл для мінуса
    elem.onclick=function mns(){
        if(getCookie("name")==undefined){
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
        else{
            var xml= new XMLHttpRequest();
            var ko = "mns="+elem.nextSibling.value;
            xml.open('POST','plus_minus_server.php',false);
            xml.addEventListener('readystatechange', function(){
              if ((xml.readyState==4) && (xml.status==200)){
                console.log(xml.responseText);
              }
            });
            xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xml.send(ko);
        }
    }
};
for (let elem of deleted){
    elem.onclick=function dlt(){
        if(getCookie("name")==undefined){
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
        else{
        let ppric = parseInt(elem.nextSibling.nextSibling.nextSibling.value);
        let kilka = parseInt(elem.nextSibling.nextSibling.innerHTML);
        let key = elem.nextSibling.value;
        localStorage.removeItem(key)
        let pererah = elem.nextSibling.nextSibling.innerHTML;
        elem.parentElement.parentElement.remove();
        kilkist.innerHTML=parseInt(kilkist.innerHTML)-parseInt(pererah);
        suma.innerHTML = parseInt(suma.innerHTML)-(ppric*kilka);
            var ddl= new XMLHttpRequest();
            var kod = "kod="+elem.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.value;
            ddl.open('POST','del_server.php',false);
            ddl.addEventListener('readystatechange', function(){
              if ((ddl.readyState==4) && (ddl.status==200)){
                console.log(ddl.responseText);
              }
            })
            ddl.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ddl.send(kod);
        }
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