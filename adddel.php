<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<script>
let count = 0;
let form = document.createElement('form');
form.id = "forma";
var table_name = new XMLHttpRequest();
table_name.open('POST','tbb_namee.php',false);
let body = "val=1";
table_name.addEventListener('readystatechange', function(){
    if ((table_name.readyState==4) && (table_name.status==200)){
        form.innerHTML =  table_name.responseText;
    }
});
table_name.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
table_name.send(body);
document.body.prepend(form);
forma.insertAdjacentHTML('beforeend', '<input id ="knopka" onclick = "knpk()" type = "submit"></input>');
function baka(){
    let t = document.querySelectorAll(".ttt");
    for(let elem of t){
        elem.onclick = function bk(){
            tab_name = this.value;
        }
    }
}
function knpk(){
    var tabb = new XMLHttpRequest();
    tabb.open('POST','server_tab_name.php',false);
    let bod = "val="+tab_name;
    tabb.addEventListener('readystatechange', function(){
        if ((tabb.readyState==4) && (tabb.status==200)){
            forma.innerHTML =  tabb.responseText;
            forma.innerHTML+='<button id ="add_btn" type="button" onclick="add()">add</button>';
            add_btn.style.position = "absolute";
            add_btn.style.float = "left";
        }
    });
    tabb.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    tabb.send(bod);
}
function del(x){
    let d = document.getElementById(x);
    let row_name = d.innerHTML;
    var zapyt = new XMLHttpRequest();
    zapyt.open('POST','server_tab_name.php',false);
    let tilo = "row_name="+row_name+"&tab_name="+tab_name;
    zapyt.addEventListener('readystatechange', function(){
        if ((zapyt.readyState==4) && (zapyt.status==200)){
            if(zapyt.responseText == 'yes'){
                d.style.color = 'red';
            }else{
                alert("ERROR");
            }
        }
    });
    zapyt.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    zapyt.send(tilo);
}
function add() {
    console.log(count);
    let k = "<p id = 'pp"+count+"'><input id='text' type='text'><select name='type'><option value='character varying[]'>character varying[]</option><option value='character varying'>character varying</option> <option value='numeric'>numeric</option><option value='integer'>integer</option></select><button onclick='newbnt("+count+")' type='button'>ok</button></p>";
    add_btn.insertAdjacentHTML("beforebegin",k);
    count++;
}
function newbnt(x){
    let str = 'pp'+x;
    let b = document.getElementById(str);
    let dod = new XMLHttpRequest();
    dod.open('POST','server_tab_name.php',false);
    let info = "newtabname="+b.firstChild.value+"&tab_name="+tab_name+"&type="+b.firstChild.nextSibling.value;
    dod.addEventListener('readystatechange', function(){
        if ((dod.readyState==4) && (dod.status==200)){
            b.innerHTML = dod.responseText+" type: "+b.firstChild.nextSibling.value;
            b.style.color = 'green';
        }
    });
    dod.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    dod.send(info);
}
</script>
</body>
</html>


