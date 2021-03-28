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
body, html { 
    width: 100%;
    height: 100%;
    background-color:#E3E3FA;
}
#main{
    width: 100%;
    height: 100%;
    position: absolute;
}
.inf{
    float: left;
    width: 65%;
    margin:15px;
}
.img{
    width: 100%;
}
.photo{
    width: 20%;
    float: left;
}
#right_panel{
    width: 20%;
    height: 150%;
    float: right;
    display: block;
    background-color:  #758c70;
    margin-right: 30px;
    margin-top: 10px;
    border-radius: 20px;
}
.plytki{
  width: 75%;
    margin: 10px;
    position: relative;
    float: left;
    background-color: whitesmoke;
}
.rahunok{
    float: left;
}
.close{
    position: relative;
    left: 77px;
    width: 30px;
    height: 30px;
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
$connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
?>
<div id='main'>
    <div id='right_panel'>
        <form  enctype="multipart/form-data" method="post" style="margin: 5px;">
            <h1>Загальна сума</h1>
            <p id='suma'>0</p>
            <h2>Кількість товару</h2>
            <p id="kilkist"></p>
            <input type="hidden" id="pokupky" value=''>
            <fieldset>
                <legend>Адреса доставки</legend>
                <input class='danni' type="text" id="selo" placeholder="населений пункт" request><br>
                <input class='danni' type="text" id="street" placeholder="вулиця" request>
                <input class='danni' type="text" id="number" placeholder="№ будинку" request>
                <input class='danni' type="text" id="mob_numb" placeholder="+380" request>
                <input class='danni' type="text" id="name" placeholder="П.І.Б" request>
            </fieldset>
            <input type="button" id="buy" onclick='baka()' value="купити" style="top: 4px;position: relative;"></input>
        </form>
    </div>
</div>
<script>
let sch = document.querySelector('#suma');
let main = document.querySelector('#main');
let buy_bttn = document.querySelector('#buy');
let kilk_tov = 0;

function getCookie(x) {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + x.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
///////////////FUNKCII////////////////////
let funkcii = {
    plus_cokie:function(){
        let plus = document.querySelectorAll('.plus');
        for(let elem of plus){
            elem.onclick = function pls(){
                if(elem.parentElement.previousSibling.childNodes[0].innerHTML!='ПІД ЗАМОВЛЕННЯ (враховується тільки 10% від ціни)'){
                    let lm = elem.parentElement.previousSibling.childNodes[3].getAttribute('code');
                    // console.log(lm);
                    let pls_xlm = new XMLHttpRequest();
                    let pls_xlm_inf = "pls="+lm+"&count="+elem.nextElementSibling.innerHTML;
                    // console.log(pls_xlm_inf);
                    pls_xlm.open('POST','perevirka_kilk_ajax.php',false);
                    pls_xlm.addEventListener('readystatechange', function(){
                        if ((pls_xlm.readyState==4) && (pls_xlm.status==200)){
                            console.log(pls_xlm.responseText);
                            if(pls_xlm.responseText == 'error'){
                                alert('Такої кількості товару немає на складі')
                                elem.style.backgroundColor = 'red';
                                // elem.nextSibling.innerHTML = '1';
                                if(elem.parentElement.previousSibling.childNodes[0].childNodes.innerHTML == ''){ 
                                    elem.parentElement.previousSibling.childNodes[0].innerHTML+= "<c style='color: red;'>Такої кількості одиниць товару немає на складі. Кількість доступних одиниць:"+pls_xlm.responseText+";</c><br>";
                                }else{
                                    var zakaz = confirm("Бажаєте замовити?");
                                    if(zakaz){
                                        let dod_div = elem.parentElement.parentElement;
                                        dod_div.insertAdjacentHTML('afterend', dod_div.outerHTML);
                                        elem.parentElement.parentElement.nextElementSibling.childNodes[1].childNodes[0].style.color ='cadetblue';
                                        elem.parentElement.parentElement.nextElementSibling.childNodes[1].childNodes[0].innerHTML ='ПІД ЗАМОВЛЕННЯ (враховується тільки 10% від ціни)';
                                        elem.parentElement.parentElement.nextElementSibling.childNodes[1].childNodes[2].setAttribute('price', parseInt(elem.parentElement.parentElement.nextElementSibling.childNodes[1].childNodes[2].getAttribute('price'))*0.1);                                            
                                        console.log(elem.parentElement.parentElement.nextElementSibling.childNodes[1].childNodes[1].getAttribute('price'));
                                        funkcii.zahal_suma();
                                        funkcii.plus_cokie();
                                        funkcii.minus_cokie();          
                                        funkcii.del_cokie();
                                    }
                                }
                            }else{
                                let cyfra = parseInt(localStorage.getItem(lm));
                                if(cyfra>0){
                                   cyfra++; 
                                }else{
                                    cyfra--;
                                }
                                localStorage[lm] = cyfra;
                                elem.nextSibling.innerHTML = Math.abs(parseInt(elem.nextSibling.innerHTML))+1;
                                sch.innerHTML =parseInt(sch.innerHTML) + parseInt(elem.parentElement.previousSibling.childNodes[1].getAttribute('price'));
                                kilkist.innerHTML = parseInt(kilkist.innerHTML) + 1;
                            }
                        }
                    });
                    pls_xlm.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    pls_xlm.send(pls_xlm_inf);
                }
                else{
                    elem.nextSibling.innerHTML = Math.abs(parseInt(elem.nextSibling.innerHTML))+1;
                    sch.innerHTML =parseInt(sch.innerHTML) + parseInt(elem.parentElement.previousSibling.childNodes[1].getAttribute('price'));
                    kilkist.innerHTML = parseInt(kilkist.innerHTML) + 1;
                }
            }
            
        }
        
    },
    minus_cokie:function(){
        let minus = document.querySelectorAll('.minus');
        for(let elem of minus){
            elem.onclick = function mns(){
                if(elem.parentElement.previousSibling.childNodes[0].innerHTML!='ПІД ЗАМОВЛЕННЯ (враховується тільки 10% від ціни)'){
                    if(parseInt(elem.previousSibling.innerHTML)>1){
                        let lm = elem.parentElement.previousSibling.lastChild.getAttribute('code');
                        let minus_xml = new XMLHttpRequest();
                        let min_xml_inf= "mns="+lm+"&count="+elem.previousSibling.innerHTML;
                        minus_xml.open('POST','perevirka_kilk_ajax.php',false);
                        minus_xml.addEventListener('readystatechange', function(){
                            if ((minus_xml.readyState==4) && (minus_xml.status==200)){
                                if(minus_xml.responseText == 'error'){
                                    alert('Такої кількості товару немає на складі')
                                    elem.style.backgroundColor = 'red';
                                    console.log(elem.parentElement.previousSibling.innerHTML);
                                    if(elem.parentElement.previousSibling.childNodes.length == 0){
                                        elem.parentElement.previousSibling.childNodes[0].innerHTML+= "<c style='color: red;'>Такої кількості одиниць товару немає на складі. Кількість доступних одиниць:"+pls_xlm.responseText+";</c><br>";
                                    }
                                    elem.previousSibling.innerHTML = '1';
                                }else{
                                    let cyfra = parseInt(localStorage.getItem(lm));
                                    cyfra--;
                                    localStorage[lm] = cyfra;
                                    elem.previousSibling.innerHTML = parseInt(elem.previousSibling.innerHTML)-1;
                                    sch.innerHTML =parseInt(sch.innerHTML) - parseInt(elem.parentElement.previousSibling.childNodes[1].getAttribute('price'));
                                    kilkist.innerHTML = parseInt(kilkist.innerHTML) - 1;
                                }
                            }
                        });
                        minus_xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        minus_xml.send(min_xml_inf);
                    }
                }else{
                    if(parseInt(elem.previousSibling.innerHTML)>1){
                        elem.previousSibling.innerHTML = parseInt(elem.previousSibling.innerHTML)-1;
                        sch.innerHTML =parseInt(sch.innerHTML) - parseInt(elem.parentElement.previousSibling.childNodes[1].getAttribute('price'));
                        kilkist.innerHTML = parseInt(kilkist.innerHTML) - 1;
                    }
                }
            }
        }
    },
    del_cokie:function(){
        let close = document.querySelectorAll('.close');
        for(let elem of close){
            elem.onclick = function exit(){
                let dan = elem.previousSibling.previousSibling.lastChild.getAttribute('code');
                localStorage.removeItem(dan);
                let kil = elem.previousSibling.childNodes[1].innerHTML;
                let prc = elem.previousSibling.previousSibling.childNodes[3].getAttribute('price');
                sch.innerHTML =parseInt(sch.innerHTML) - (parseInt(kil)*parseInt(prc));
                elem.parentElement.remove();
                kilkist.innerHTML = parseInt(kilkist.innerHTML) - parseInt(elem.previousSibling.childNodes[1].innerHTML);
            }
        }
    },
    plus_no_cokie:function(){
        let plus = document.querySelectorAll('.plus');
        for(let elem of plus){
            elem.onclick = function pls(){
                if(elem.parentElement.previousSibling.childNodes[0].innerHTML!='ПІД ЗАМОВЛЕННЯ (враховується тільки 10% від ціни)'){
                    let pl = new XMLHttpRequest();
                    let cd = "pls="+elem.parentElement.previousSibling.lastChild.getAttribute('code')+"&login="+getCookie('login');
                    console.log(cd);
                    pl.open('POST','pls_mns_ajax.php',false);
                    pl.addEventListener('readystatechange', function(){
                        if ((pl.readyState==4) && (pl.status==200)){
                            if(pl.responseText == 'error'){
                                alert('Такої кількості товару немає на складі')
                                elem.style.backgroundColor = 'red';
                                if(elem.parentElement.previousSibling.childNodes[0].childNodes.innerHTML == ''){ 
                                    elem.parentElement.previousSibling.childNodes[0].innerHTML+= "<c style='color: red;'>Такої кількості одиниць товару немає на складі. Кількість доступних одиниць:"+pls_xlm.responseText+";</c><br>";
                                }else{
                                    var zakaz = confirm("Бажаєте замовити?");
                                    if(zakaz){
                                        let dod_div = elem.parentElement.parentElement;
                                        dod_div.insertAdjacentHTML('afterend', dod_div.outerHTML);
                                        elem.parentElement.parentElement.nextElementSibling.childNodes[1].childNodes[0].style.color ='cadetblue';
                                        elem.parentElement.parentElement.nextElementSibling.childNodes[1].childNodes[0].innerHTML ='ПІД ЗАМОВЛЕННЯ (враховується тільки 10% від ціни)';
                                        elem.parentElement.parentElement.nextElementSibling.childNodes[1].childNodes[2].setAttribute('price', parseInt(elem.parentElement.parentElement.nextElementSibling.childNodes[1].childNodes[2].getAttribute('price'))*0.1);                                            
                                        console.log(elem.parentElement.parentElement.nextElementSibling.childNodes[1].childNodes[1].getAttribute('price'));
                                        funkcii.zahal_suma();
                                        funkcii.plus_cokie();
                                        funkcii.minus_cokie();          
                                        funkcii.del_cokie();
                                    }
                                }
                            }else{
                                elem.nextSibling.innerHTML = parseInt(elem.nextSibling.innerHTML)+1;
                                sch.innerHTML =parseInt(sch.innerHTML) +parseInt(elem.parentElement.previousSibling.childNodes[2].getAttribute('price'));
                                kilkist.innerHTML = parseInt(kilkist.innerHTML) + 1;
                            }
                        }
                    });
                    pl.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    pl.send(cd);
                }else{
                    elem.nextSibling.innerHTML = parseInt(elem.nextSibling.innerHTML)+1;
                    sch.innerHTML =parseInt(sch.innerHTML) +parseInt(elem.parentElement.previousSibling.childNodes[2].getAttribute('price'));
                    kilkist.innerHTML = parseInt(kilkist.innerHTML) + 1;
                }
            }
        }
    },
    minus_no_cokie:function(){
        let minus = document.querySelectorAll('.minus');
        for(let elem of minus){
            elem.onclick = function mns(){
                if(elem.parentElement.previousSibling.childNodes[0].innerHTML!='ПІД ЗАМОВЛЕННЯ (враховується тільки 10% від ціни)'){
                    if(parseInt(elem.previousSibling.innerHTML)>1){
                        let mn = new XMLHttpRequest();
                        let mninf = "mns="+elem.parentElement.previousSibling.lastChild.getAttribute('code')+"&login="+getCookie('login');
                        // console.log(mninf);
                        mn.open('POST','pls_mns_ajax.php',false);
                        mn.addEventListener('readystatechange', function(){
                            if ((mn.readyState==4) && (mn.status==200)){
                                if(mn.responseText == 'error'){
                                    alert('Такої кількості товару немає на складі')
                                    elem.style.backgroundColor = 'red';
                                }else{
                                    console.log(mn.responseText);
                                    elem.previousSibling.innerHTML = parseInt(elem.previousSibling.innerHTML)-1;
                                    sch.innerHTML =parseInt(sch.innerHTML) - parseInt(elem.parentElement.previousSibling.childNodes[1].getAttribute('price'));
                                    kilkist.innerHTML = parseInt(kilkist.innerHTML) - 1;
                                }
                            }
                        });
                        mn.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        mn.send(mninf);
                    }
                }else{
                    if(parseInt(elem.previousSibling.innerHTML)>1){
                        elem.previousSibling.innerHTML = parseInt(elem.previousSibling.innerHTML)-1;
                        sch.innerHTML =parseInt(sch.innerHTML) - parseInt(elem.parentElement.previousSibling.childNodes[1].getAttribute('price'));
                        kilkist.innerHTML = parseInt(kilkist.innerHTML) - 1;
                    }
                }
            }
        }
    },
    del_no_cokie:function(){
        let close = document.querySelectorAll('.close');
        for(let elem of close){
            elem.onclick = function exit(){
                let ex = new XMLHttpRequest();
                let exinf = "del="+elem.previousSibling.previousSibling.lastChild.getAttribute('code')+"&login="+getCookie('login');
                console.log(exinf);
                ex.open('POST','pls_mns_ajax.php',false);
                ex.addEventListener('readystatechange', function(){
                    if ((ex.readyState==4) && (ex.status==200)){
                        if(ex.responseText=='yes'){
                            elem.parentElement.remove();
                            let kil = elem.previousSibling.childNodes[1].innerHTML;
                            let prc = elem.previousSibling.previousSibling.childNodes[2].getAttribute('price');
                            sch.innerHTML =parseInt(sch.innerHTML) - (parseInt(kil)*parseInt(prc));
                            kilkist.innerHTML = parseInt(kilkist.innerHTML) - parseInt(elem.previousSibling.childNodes[1].innerHTML);
                        }
                    }
                });
                ex.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                ex.send(exinf);
            }
        }
    },
    zahal_suma:function(){
        kilk_tov=0;
        let information = document.querySelectorAll('.inf');
        let kllk = document.querySelectorAll('.kllkk');
        // kilkist.innerHTML = '0';
        for(let elem of kllk){
            kilk_tov+= parseInt(elem.innerHTML);
            // console.log(elem.innerHTML);
        }
        kilkist.innerHTML = kilk_tov;
        let suma = 0;
        for(let elem of information){
            let pr = elem.lastChild.previousSibling.getAttribute('price');
            let klk = elem.nextSibling.childNodes[1].innerHTML;
            suma+=parseInt(pr)*parseInt(klk);
        }
        let sch = document.querySelector('#suma');
        sch.innerHTML = suma;
    }
}

if(getCookie('login')!=undefined){
    console.log("valera zarejestruvavsya");
    let tovary = new XMLHttpRequest();
    let inf= "login="+getCookie('login')+"&password="+getCookie('pass');
    tovary.open('POST','tovary_tov_ajax.php',false);
    tovary.addEventListener('readystatechange', function(){
        if ((tovary.readyState==4) && (tovary.status==200)){
            main.innerHTML += tovary.responseText;
            funkcii.zahal_suma();
            funkcii.plus_no_cokie();
            funkcii.minus_no_cokie();
            funkcii.del_no_cokie();
        }
    });
    tovary.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    tovary.send(inf);
    let pokupka = new XMLHttpRequest();
    let pokupka_inf = "login="+getCookie('login')+"&password="+getCookie('pass');
    pokupka.open('POST','information_ajax.php',false);
    pokupka.addEventListener('readystatechange', function(){
        if ((pokupka.readyState==4) && (pokupka.status==200)){
            let mass = pokupka.responseText;
            mass = mass.split(',');
            let nm = document.querySelector('#name');
            let mobile = document.querySelector('#mob_numb');
            let number = document.querySelector('#number');
            let street = document.querySelector('#street');
            let selo = document.querySelector('#selo');
            nm.value = mass[0]+" "+mass[1];
            mobile.value = mass[3];
            let adr = mass[2].split('/');
            number.value = adr[2];
            street.value = adr[1];
            selo.value = adr[0];
        }
    });
    pokupka.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    pokupka.send(pokupka_inf);
}
else{
    console.log("valera ne zarejestruvavsya");
    let stroka = "";
    for(let i=0; i<localStorage.length; i++) {
        let key = localStorage.key(i);
        stroka +=key+":"+ localStorage.getItem(key) + ",";
    }
    console.log(stroka);
    let tov = new XMLHttpRequest();
    let danni = "danni="+stroka;
    tov.open('POST','tovary_tov_ajax.php',false);
    tov.addEventListener('readystatechange', function(){
        if ((tov.readyState==4) && (tov.status==200)){
            main.innerHTML += tov.responseText;
            funkcii.zahal_suma();
            funkcii.plus_cokie();
            funkcii.minus_cokie();          ////////////////////aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            funkcii.del_cokie();
            }
        });
    tov.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    tov.send(danni);
}
function baka(){
    let plytki = document.querySelectorAll('.plytki');
    let kont = document.querySelectorAll('.danni');
    let t = true;
    for(let elem of kont){
        if(elem.value.length == 0 || elem.validity.valid == false){
            t = false;
            console.log('error');
        }
    }
    if(t){
        let inf = '';
        for(let elem of kont){
            inf+=elem.value+"/";
        }
        let zakaz = '';
        let zamovlennya = '';
        console.log(inf);
        for(let elem of plytki){
            if(elem.childNodes[1].childNodes[0].innerHTML == "ПІД ЗАМОВЛЕННЯ (враховується тільки 10% від ціни)"){
                let ccd = elem.childNodes[1].lastChild.getAttribute('code');
                let cna = elem.childNodes[1].lastChild.previousSibling.getAttribute('price');
                let klkst = elem.childNodes[2].childNodes[1].innerHTML;
                zamovlennya+=ccd+"/"+klkst+"/"+cna+"|";
            }else{
                let ccd = elem.childNodes[1].lastChild.getAttribute('code');
                let klkst = elem.childNodes[2].childNodes[1].innerHTML;
                let cna = elem.childNodes[1].lastChild.previousSibling.getAttribute('price');
                zakaz+=ccd+"/"+klkst+"/"+cna+"|";
            }
        }
        console.log(zamovlennya+"-------zamov");
        console.log(zakaz+"-------------zakaz");
        let pukupka = new XMLHttpRequest();
        if(zamovlennya==''){
            zamovlennya = 'zero';
        }
        let tovary = "contakty="+inf+"&zazaz="+zakaz+"&zamov="+zamovlennya+"&login="+getCookie('login');
        console.log(tovary+"-------------tovary");
        pukupka.open('POST','po_kypka_ajax.php',false);
        pukupka.addEventListener('readystatechange', function(){
            if ((pukupka.readyState==4) && (pukupka.status==200)){
                console.log(pukupka.responseText+'----------------vsdpovidь');
            }
        });
        pukupka.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        pukupka.send(tovary);
    }
}



let count_bttn = document.querySelector("#counter");
let c = document.querySelector('#hid_c');
let hidden_p = document.querySelector('#hidden_p');
let reg = document.querySelector('#sign_in');
let code = document.querySelector('#code');




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




</script>
</body>
</html>