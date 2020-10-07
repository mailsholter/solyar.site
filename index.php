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
a{ 
  text-decoration: none; /* Отменяем подчеркивание у ссылки */
} 
  </style>
<div id="main_panel">
<?php
$check = false;
$x=pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user= 	
solyar17_adm 	 password=kjkszpg2001 options='--client_encoding=UTF8'");
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

<form id ="hidden_form"  action="cstmr.php" enctype="multipart/form-data" method="post">
  <button type="submit" name = "name" value = "" id = "hidden_p"></button>
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
  <div id = 'artcl'>
    <?php
    


   // початок список товарів 
   $porc1 = "select виробник, imag, модель, ціна, код";
   $porc2 = " from ".$_SESSION['table'].";";
    $zp = pg_query("$porc1"."$porc2");
  $i=0;
  while ($val = pg_fetch_row($zp)) {
   echo "<div class = 'articles'>";
   echo '<form action = "" class="form_item" method = "post" enctype="multipart/form-data">';
   echo "<a title='жмякніть щоб дізнатися більше про цей товар)' href=storinka_tovaru.php?id=$val[4]>";
   echo '<div id=wind>';
    $photo = '"'.$val[1].'"';
    echo '</a>';
     echo '<img class = "photo" src= '.$photo.'></img>';
      
     echo "<a title='жмякніть щоб дізнатися більше про цей товар)' href=storinka_tovaru.php?id=$val[4]>";
     echo "<div class='namemodel'>";
     for($t =0;$t < count($val);$t++){
        if($t == 1){
            continue;
        }
        else{
            $val[$t] = mb_strtoupper($val[$t]);
        }
     }
       echo "<c>$val[0] </c>";
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
      hidden_p.value = request1.responseText;
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
  hidden_p.value = getCookie("name")+" "+getCookie("surname");
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
  }
}

basket_bt.onclick = function basket_func(){
  if(getCookie("name")==undefined){
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
  else{
    var perera = new XMLHttpRequest();
    var y= "log="+getCookie("login");
    perera.open('POST','vidpr_server.php',false);
    perera.addEventListener('readystatechange', function(){
    if ((perera.readyState==4) && (perera.status==200)){
      var kj = document.querySelector("#ole");
      kj.value = perera.responseText;
      vidpr.submit();
    }
  });
  perera.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  perera.send(y);
  }
}
      
if(getCookie("name")==undefined){
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
}
else{
  var cnt = 0;
  var rahunok = new XMLHttpRequest();
  var rahlog= "log="+getCookie("login");
  rahunok.open('POST','rahunoc_server.php',false);
  rahunok.addEventListener('readystatechange', function(){
  if ((rahunok.readyState==4) && (rahunok.status==200)){
    counter.innerHTML = rahunok.responseText;
    cnt = parseInt(rahunok.responseText);
    localStorage.setItem("cnt",cnt);
  }
  })
  rahunok.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  rahunok.send(rahlog);
}
      

      
for (let elem of b){
  elem.onclick = function foo(){
    if(getCookie("name")==undefined){
      var code = elem.parentElement.parentElement.lastChild.previousElementSibling.lastChild.getAttribute('code');
      cnt++;
      counter.innerHTML=cnt;
      localStorage.setItem("cnt",cnt);
      elem.style.backgroundColor = "red";
      if(!localStorage.getItem(code)){
        localStorage.setItem(code , 1);
      }
      else{
        var cn = localStorage.getItem(code);
        cn++;
        localStorage.setItem(code , cn);
      }
    }
    else{
      var brb = new XMLHttpRequest();
      var cd = "code="+elem.parentElement.parentElement.lastChild.previousElementSibling.lastChild.getAttribute('code');
      brb.open('POST','serverok.php',false);
      brb.addEventListener('readystatechange', function(){
      if ((brb.readyState==4) && (brb.status==200)){
        console.log(brb.responseText);
        elem.style.backgroundColor = "red";
        cnt++;
        counter.innerHTML=cnt;
        localStorage.setItem("cnt",cnt);
      }
      })
      brb.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      brb.send(cd);
    } 
  }
}
for(let elem of rozdily){
  let val =elem.innerHTML;
  elem.href ="pereadress.php?id="+val;
}
</script>
</body>
</html>