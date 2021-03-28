
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="storinka_tovary.css">
</head>
<body>
<style>
#lft_psk{
    width: 20%;
    float: left;
}
#exit_text{
    font-size: 12px;
    font-weight: 700;
    line-height: 32px;
    padding: 0 15px;
}
#cina{
    font-size: xx-large;
}
#photo{
    border:1px solid black;
    height: 100%;
    width: 30%;
    float: left;
}
.little{
    width: 50px;
    height: 100px;
   
}
#main_photo{
     float: right;
     max-width: 80%;
    max-height: 80%;
}
#text{
    width: 100%;
    left: 31%;
    position: absolute;
}

#primary_nav_wrap
{
    position: absolute;
    top: 25%;
    left: 2%;
    height: 33px;
    width: 74px;
    border: 1px solid;
}

#login{
    width: 8%;
    position: absolute;
    border-radius: 10px;
    right: 20%;
    top: 0;
    margin: 5px;
}
#password{
    width: 8%;
   display: block;
   border-radius: 10px;
    right: 11%;
    position: absolute;
    top: 0px;
    margin: 5px;
}
#sign_in{
    border-radius: 10px;
    position: absolute;
    left: 89.5%;
    top: 5px;
  }
#sign_up{
       border-radius: 10px;
    position: absolute;
    left: 94.5%;
    top: 5%;
}
#top_head{
        position: relative;
        height: 100px;
        background-color:  #758c70;
    }
    #left_panel{
        height: 100%;
        width: 20%;
        position: relative;
        float: left;
        background-color: #FFE4E1;
        border-right-color: gray;
        border-color: black;
        display:block;
    }
    #center{
        display: grid;
        grid-template-columns: repeat(3,1fr);
        width: 80%;
        height: 100%;
        background-color: lightgray;
    }
</style>
<?php
    $connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
    $table_names = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema='public' AND table_type='BASE TABLE' AND table_name!='allstorage' AND table_name!='покупці' AND table_name!='покупки'  AND table_name!='abba';");
    session_start();
    ?>
        <div id ='top_head'>
            <p style="top:  -35%;position: absolute;left: 38%;font-size: xxx-large;">Побутова техніка</p>
            <button  id='basket_button' onClick='location.href="/tovar.php"' style="border-radius: 10px;position: relative;left: 94%;top: 45px;position: absolute;"><img src = "/png-transparent-black-shopping-cart-icon-for-free-black-shopping-cart-icon.png" style="width: 30px;"><c id="counter"></c></button>
            <nav id="primary_nav_wrap">
                <a id = "exit_text" href = "index.php">Назад</a>
            </nav>
            <div id = 'registration'>
                <c id = 'hid_c'>
                <input  type = 'text' id = 'login' name='login' placeholder = '+380'>
                <input  type = 'text' id = 'password' name='password' placeholder = 'password'>
                <input id = 'sign_in'  type = 'button' value='sign in'><input id = 'sign_up' onClick='location.href="/reg_istration.php"' type = 'button' value='sign up'>
                </c>
                <p id='hidden_p' style="display: none;"></p>
            </div>
        </div>
<?php
echo "<p id='code'>".$_GET['id']."</p>";
?>
<script>
function getCookie(x) {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + x.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
let count_bttn = document.querySelector("#counter");
let c = document.querySelector('#hid_c');
let hidden_p = document.querySelector('#hidden_p');
let reg = document.querySelector('#sign_in');
let code = document.querySelector('#code');
let st = code.innerHTML;
var request = new XMLHttpRequest();
request.open('POST','stor_tovaru_serv.php',false);
var body = "code="+code.innerHTML;
request.addEventListener('readystatechange', function(){
    if ((request.readyState==4) && (request.status==200)){
        if(request.responseText!="" || request.responseText!="NULL"){
            code.innerHTML = request.responseText;
            console.log(request.responseText);
        }
    }
});
request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
request.send(body);
if(getCookie('login')!=''){
    let registr = new XMLHttpRequest();
    let inf= "log="+getCookie('login')+"&pass="+getCookie('pass');
    registr.open('POST','reg_server.php',false);
    registr.addEventListener('readystatechange', function(){
        if ((registr.readyState==4) && (registr.status==200)){
            if(registr.responseText!='error'){
                c.style.display = 'none';
                hidden_p.style.display = 'block';
                hidden_p.innerHTML="<button type='button' onclick ='log_btn()'>Вітаю "+registr.responseText+"</button>";
                hidden_p.style.position = 'absolute';
                hidden_p.style.top = '-10px';
                hidden_p.style.right = '37px';
                hidden_p.innerHTML+="<input onclick = 'exi()' type='button' value='exit'>";
            }
            // console.log(registr.responseText);
        }
    });
    registr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    registr.send(inf);
    let cnt_tov = new XMLHttpRequest();
    let danni= "login="+getCookie('login')+"&password="+getCookie('pass');
    cnt_tov.open('POST','count_btn_ajax.php',false);
    cnt_tov.addEventListener('readystatechange', function(){
        if ((cnt_tov.readyState==4) && (cnt_tov.status==200)){
            count_bttn.innerHTML = cnt_tov.responseText;
        }
    });
    cnt_tov.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    cnt_tov.send(danni);
}
reg.onclick = function ba(){
    let log = reg.previousElementSibling.previousElementSibling.value;
    let pass = reg.previousElementSibling.value;
    let registr = new XMLHttpRequest();
    let inf= "log="+log+"&pass="+pass;
    console.log(inf);
    registr.open('POST','reg_server.php',false);
    registr.addEventListener('readystatechange', function(){
        if ((registr.readyState==4) && (registr.status==200)){
            console.log(registr.responseText);
            if(registr.responseText!='error'){
                document.cookie = "login="+log+"; max-age=3600";
                document.cookie = "pass="+pass+"; max-age=3600";
                c.style.display = 'none';
                hidden_p.style.display = 'block';
                hidden_p.innerHTML ="<button type='button' onclick ='log_btn()'>Вітаю "+registr.responseText+"</button>";
                hidden_p.style.position = 'absolute';
                hidden_p.style.top = '-10px';
                hidden_p.style.right = '37px';
                hidden_p.innerHTML+="<input onclick = 'exi()' type='button' value='exit'>";
                location.reload();
            }
            else{
                alert('Введіть правильні данні')
            }
        }
    })
    registr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    registr.send(inf);
    let cnt_tov = new XMLHttpRequest();
    let danni= "login="+getCookie('login')+"&password="+getCookie('pass');
    cnt_tov.open('POST','count_btn_ajax.php',false);
    cnt_tov.addEventListener('readystatechange', function(){
        if ((cnt_tov.readyState==4) && (cnt_tov.status==200)){
            count_bttn.innerHTML = cnt_tov.responseText;
        }
    });
    cnt_tov.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    cnt_tov.send(danni);
}

let summa = 0;
        for(let i=0; i<localStorage.length; i++) {
            let key = localStorage.key(i);
            summa+= Math.abs(parseInt(localStorage.getItem(key)));
        }
        count_bttn.innerHTML = summa;


function pokypka(){
    if(pok_btn.innerHTML != 'Замовити'){
        let lm = st;
        if(localStorage.getItem(lm) == undefined){
            localStorage.setItem(lm,"1");
            count_bttn.innerHTML = parseInt(count_bttn.innerHTML)+1;
        }else{
            let cyf = parseInt(localStorage.getItem(lm));
            cyf++;
            localStorage[lm] =cyf;
            count_bttn.innerHTML = parseInt(count_bttn.innerHTML)+1;
        }
    }else{
        let lm = st;
        if(localStorage.getItem(lm) == undefined){
            localStorage.setItem(lm,"-1");
            count_bttn.innerHTML = parseInt(count_bttn.innerHTML)+1;
        }else{
            let cyf = parseInt(localStorage.getItem(lm));
            cyf--;
            localStorage[lm] =cyf;
            count_bttn.innerHTML = parseInt(count_bttn.innerHTML)+1;
        }
    }
}
let lt_photo = document.querySelectorAll(".little");
let main = document.querySelector("#main_photo");
for(let elem of lt_photo){
    elem.onmouseover = function mushka(){
        let prev = elem.src;
        main.src = prev;
        elem.style.border = "3px solid green";
    }
    elem.onmouseout = function msout(){
        elem.style.border = "";
    }
}

</script>
</body>
</html>