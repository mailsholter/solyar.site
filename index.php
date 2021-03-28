 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Головна сторінка</title>
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>
    <style>
    #left{
    background-color: blue;
    width: 26px;
    height: 26px;
    border-radius: 15px;
    float: inline-start;
    position: relative;
    z-index:3;
}
#poloska{
    border: 1px solid black;
    width: 200px;
    height: 25px;
    border-radius: 15px;
}
#right{
    background-color: green;
    width: 26px;
    height: 26px;
    border-radius: 15px;
    float: inline-end;
    position: relative;
    z-index:3;
}
#pole{
    /*width: 175px;*/
    height: 26px;
    position: absolute;
    /*left:12px;*/
    background: blueviolet;
}
    .codde{
        font-size:xx-small;
        position: relative;
        right: -29%;
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
    .tovar{
        border:1px solid red;
        text-align: center;
        line-height: 1.5;
    }
    .tovar:hover{
        border:3px solid black;
    }
    .img{
        max-width: 240px;
        max-height: 300px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .buy_bttn{
        width: 100px;
        height: 40px;
    }
    /*ВИПАДАЮЧИЙ СПИСОК*/
#primary_nav_wrap
{
	position: absolute;
left: 2%;
top: 25%;
border: 1px solid;
}

#primary_nav_wrap ul
{
	list-style:none;
	position:relative;
	float:left;
	margin:0;
	padding:0
}

#primary_nav_wrap ul a
{
	display:block;
	color:#333;
	text-decoration:none;
	font-weight:700;
	font-size:12px;
	line-height:32px;
	padding:0 15px;
	font-family:"HelveticaNeue","Helvetica Neue",Helvetica,Arial,sans-serif
}

#primary_nav_wrap ul li
{
	position:relative;
	float:left;
	margin:0;
	padding:0
}

#primary_nav_wrap ul li.current-menu-item
{
	background:#ddd
}

#primary_nav_wrap ul li:hover
{
	background:#f6f6f6
}

#primary_nav_wrap ul ul
{
	display:none;
	position:absolute;
	top:100%;
	left:0;
	background:#fff;
	padding:0
}

#primary_nav_wrap ul ul li
{
	float: none;
width: 200px;
z-index: 4;
background: yellow;

}

#primary_nav_wrap ul ul a
{
	line-height:120%;
	padding:10px 15px
}

#primary_nav_wrap ul ul ul
{
	top:0;
	left:100%
}

#primary_nav_wrap ul li:hover > ul
{
	display:block
}
 /*КІНЕЦЬ ВИПАДАЮЧОГО СПИСКУ*/



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
                <ul class="top_menu">
                    <li><a href="" class="down">Товари</a>
                <ul class="submenu">
                    <li class="dir"><a href="#">Ноутбуки</a></li>
      <li class="dir"><a onclick='pereadr("Холодильники")'>Холодильники</a>
        <ul>
          <li><a href="#">Category 1</a></li>
          <li><a href="#">Category 2</a></li>
          <li><a href="#">Category 3</a></li>
          <li><a href="#">Category 4</a></li>
          <li><a href="#">Category 5</a></li>
        </ul>
      </li>
      <li class="dir"><a href="#">Телефони</a>
        <ul>
            <li><a href="#">Кнопочні</a></li>
          <li><a onclick='pereadr("Смартфони")'>Смартфони</a></li>
            </ul>
            </li>
                </ul>
                    </li>
                </ul>
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
        <div id = 'content' style="display: flex;align-items: flex-start;">
        <div id = 'left_panel'>
            <div id='sorttt'>
            </div>
        </div>
        <div id = 'center'>
        </div>
        </div>
        <button style='height:20px;'  id='basket_button' onClick='location.href="/smsapi.php"'></button>
<script>
function getCookie(x) {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + x.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
let tov = {
    zah:function(){
        let buy_bttn = document.querySelectorAll(".buy_bttn");
        if(getCookie('login')!=undefined){
    for(let elem of buy_bttn){
        elem.addEventListener("click",function() {
            // alert("my mayem kyki");
            let pok = new XMLHttpRequest();
            let pok_inf= "login="+getCookie('login')+"&code="+elem.nextSibling.getAttribute('code');
            pok.open('POST','pokupka_serv_ajax.php',false);
            pok.addEventListener('readystatechange', function(){
                if ((pok.readyState==4) && (pok.status==200)){
                    count_bttn.innerHTML = parseInt(count_bttn.innerHTML)+1;
                    console.log(pok.responseText);
                }
            });
            pok.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            pok.send(pok_inf);
        });
    }
}else{
    // alert("my ne mayem kyki");
    if(localStorage.length>0){
        let summa = 0;
        for(let i=0; i<localStorage.length; i++) {
            let key = localStorage.key(i);
            summa+= Math.abs(parseInt(localStorage.getItem(key)));
        }
        count_bttn.innerHTML = summa;
    }
    else{
        count_bttn.innerHTML = "0";
    }
    for(let elem of buy_bttn){
        elem.onclick = function baka(){
            if(elem.innerHTML != 'Замовити'){
                let lm = elem.nextSibling.childNodes[0].getAttribute('code');
                console.log(lm);
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
                let lm = elem.nextSibling.childNodes[0].getAttribute('code');
                console.log(lm);
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
    }
}
      
    }
}
// document.addEventListener("DOMContentLoaded", bxs);

window.onload = function(){
    let bks = document.querySelectorAll('.bxes');
    if(sessionStorage.length>0){
        for(let elem of bks){
            if(sessionStorage.getItem(elem.value)=="1"){
                elem.checked = true;
            }else{
                continue;
            }
        } 
    }else{
        for(let elem of bks){
            sessionStorage.setItem(elem.value,"0");
        } 
    }
    for(let elem of bks){
        elem.onclick = function chek(){
            if(sessionStorage.getItem(elem.value)=="0"){
                sessionStorage.setItem(elem.value,"1");
            }else{
                sessionStorage.setItem(elem.value,"0");
            }
        }
    }
}
function pereadr(z){
    let tbl_name = z;
    let content = new XMLHttpRequest();
    let tabl = "id="+tbl_name;
    content.open('POST','index_ajax.php',false);
    content.addEventListener('readystatechange', function(){
        if ((content.readyState==4) && (content.status==200)){
            
            center.innerHTML = content.responseText;
            tov.zah();
            
            let sort = new XMLHttpRequest();
            let sttr = "id="+z;
            sort.open('POST','sort_ajax.php',false);
            sort.addEventListener('readystatechange', function(){
                if ((sort.readyState==4) && (sort.status==200)){
                    
                    sorttt.innerHTML = sort.responseText;
                    let buy_bttn = document.querySelectorAll(".buy_bttn");
                    let color = document.querySelectorAll('.clor');
                    let brand = document.querySelectorAll('.bxes');
                    let poloska = document.querySelector('#poloska');
                    let left = document.querySelector('#left');
                    let right = document.querySelector('#right');
  
                    let pole = document.querySelector('#pole');
                    /////////////////////////////////////////////
    //                 let dovz = 0.58;
    // console.log(dovz);
    const mn = parseInt(vid_rah.value);
     const mx = parseInt(do_rah.value);
      let dovz = (do_rah.value-mn)/174;
     let dovz1 = do_rah.value/right.offsetLeft;
    // console.log(dovz1);
    left.onmousedown = function lft_p(event){
        moveAtleft(event.pageX);
        function moveAtleft(pageX) {
            let rah1 =pageX -left.offsetWidth / 2;
            console.log(rah1);
            if(rah1<200 && rah1>-1 && rah1*dovz + mn<do_rah.value){
                pole.style.left = rah1+12 +'px';
                let wdth =pole.style.width.slice(0,-2);
                pole.style.width = right.offsetLeft - left.offsetLeft+'px';
                left.style.left = rah1 + 'px';
                vid_rah.value = parseInt(rah1*dovz + mn);
            }
        }
        function onMouseMoveleft(event) {
            moveAtleft(event.pageX);
        }
        document.addEventListener('mousemove', onMouseMoveleft);
        document.onmouseup = function() {
            document.removeEventListener('mousemove', onMouseMoveleft);
            left.onmouseup = null;
            
        }
        return false;
    }
    console.log(right.offsetLeft);
    right.onmousedown = function right_p(event){
        moveAtright(event.pageX);
        function moveAtright(pageX) {
            let rah = -1 * (pageX-200 + right.offsetWidth / 2);
            if(rah<175 && rah>-1 && parseInt(right.offsetLeft*dovz +mn)>vid_rah.value){
                right.style.right = rah + 'px';
                do_rah.value =parseInt(right.offsetLeft*dovz)+mn-72;
                let wdth1 = pole.style.width.slice(0,-2);
                pole.style.width =  right.offsetLeft-left.offsetLeft+'px';
                console.log(dovz);
                console.log(right.offsetLeft);
                // console.log("do val = "+do_rah.value);
                // console.log("vidm = "+rah*dovz);
                // console.log(right.style.right);
            }
            // else{
                
            // }
        }
        function onMouseMoveright(event) {
            moveAtright(event.pageX);
        }
        document.addEventListener('mousemove', onMouseMoveright);

        document.onmouseup = function() {
            console.log('onmouseup');
            document.removeEventListener('mousemove', onMouseMoveright);
            right.onmouseup = null;
            
        }
        return false;
    }










    
    
    //////////////////////////////
                    
                    for(let elem of color){
                        if(localStorage.getItem(elem.value) == '1'){
                            elem.checked = true;
                        }
                    }
                    for(let elem of color){
                        elem.onclick = function changeclor(){
                            console.log(elem.value);
                            if(localStorage.getItem(elem.value) == "0"){
                                localStorage.setItem(elem.value,"1");
                            }else{
                                localStorage.setItem(elem.value,"0");
                            }
                        }
                    }
                    
                    
                    
                    for(let elem of brand){
                        if(localStorage.getItem(elem.value) == '1'){
                            elem.checked = true;
                        }
                    }
                    for(let elem of brand){
                        elem.onclick = function changeclor(){
                            console.log(elem.value);
                            if(localStorage.getItem(elem.value) == "0"){
                                localStorage.setItem(elem.value,"1");
                            }else{
                                localStorage.setItem(elem.value,"0");
                            }
                        }
                    }
                    
                    
                    sort_bttn.onclick = function sortyvannya(){
                        let information = '';
                        for (let i = 0; i < sorttt.childNodes.length; i++) {
                            
                            if(sorttt.childNodes[i] =="[object HTMLDivElement]"){
                                let div_name=sorttt.childNodes[i].id;
                                let con_div = document.querySelector("#"+div_name);
                                for(let k = 0;k<con_div.childNodes.length;k++){
                                    if(con_div.childNodes[k].checked == true){
                                        information+=div_name+"="+con_div.childNodes[k].name+",";
                                        // console.log(con_div.childNodes[k].name);
                                    }
                                }
                            //     let div_name=sorttt.childNodes[i].outerHTML;
                            //     cobsole.log(div_name);
                                // for(let j = 0;j<sorttt.childNodes[i].length;j++){
                                //     if(sorttt.childNodes[i].childNodes[j].checked == true){
                                //         console.log('1');
                                //     }
                                // }
                            }
                        }
                        let prc = vid_rah.value+",";
                        prc+= do_rah.value;
                        information = information.slice(0, -1);
                        let new_sort = new XMLHttpRequest();
                        let new_sttr = "inf="+information+"&id="+tbl_name+"&price="+prc;
                        new_sort.open('POST','index_ajax.php',false);
                        new_sort.addEventListener('readystatechange', function(){
                            if ((new_sort.readyState==4) && (new_sort.status==200)){
                                // console.log(new_sort.responseText);
                                center.innerHTML = new_sort.responseText;
                                tov.zah();
                            }
                        });
                        new_sort.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        new_sort.send(new_sttr);
                    }
                    
                }
            });
            sort.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            sort.send(sttr);
        }
    });
    content.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    content.send(tabl);
}



let count_bttn = document.querySelector("#counter");
let c = document.querySelector('#hid_c');
let hidden_p = document.querySelector('#hidden_p');
let reg = document.querySelector('#sign_in');
// let buy_bttn = document.querySelectorAll(".buy_bttn");


    


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
if(getCookie('login')!=undefined){
    for(let elem of buy_bttn){
        elem.addEventListener("click",function() {
            // alert("my mayem kyki");
            let pok = new XMLHttpRequest();
            let pok_inf= "login="+getCookie('login')+"&code="+elem.nextSibling.getAttribute('code');
            pok.open('POST','pokupka_serv_ajax.php',false);
            pok.addEventListener('readystatechange', function(){
                if ((pok.readyState==4) && (pok.status==200)){
                    count_bttn.innerHTML = parseInt(count_bttn.innerHTML)+1;
                    console.log(pok.responseText);
                }
            });
            pok.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            pok.send(pok_inf);
        });
    }
}else{
    // alert("my ne mayem kyki");
    if(localStorage.length>0){
        let summa = 0;
        for(let i=0; i<localStorage.length; i++) {
            let key = localStorage.key(i);
            summa+= Math.abs(parseInt(localStorage.getItem(key)));
        }
        count_bttn.innerHTML = summa;
    }
    else{
        count_bttn.innerHTML = "0";
    }
    let buy_bttn = document.querySelectorAll(".buy_bttn");
    for(let elem of buy_bttn){
        elem.onclick = function baka(){
            if(elem.innerHTML != 'Замовити'){
                let lm = elem.nextSibling.getAttribute('code');
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
                let lm = elem.nextSibling.getAttribute('code');
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
    }
}
function exi(){
    c.style.display = 'block';
    hidden_p.style.display = 'none';
    document.cookie = "login=0; max-age=0";
    document.cookie = "pass=0; max-age=0";
    count_bttn.innerHTML ='';
    location.reload();
}
function log_btn(){
    if(getCookie('login') == 'admin'){
        document.location.href="test.php";
    }else{
        document.location.href="osob_kabin.php?id='"+getCookie('login')+"'";
    }
    
}

</script>
</body>
</html>