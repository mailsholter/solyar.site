<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <p id="exit"></p>
  <button value="Refresh Page" onClick="window.location.reload();">кнопка</button>
<script>
let frma = document.createElement('form');
frma.enctype="multipart/form-data";
frma.method="post";
frma.innerHTML = '<a class = "type">create table</a><br><a class = "type">shange smth in table</a><br><a class = "type">insert into table</a><br><a class = "type">convert into svc</a><br><a class = "type">import</a><br><a class = "type">change name</a><a class = "type">test mail</a>';
document.body.append(frma);
var conn = undefined;
let type = document.querySelectorAll(".type");
var vybir = undefined;
for (let elem of type){
    elem.onclick = function del(){
        
      vybir = elem.innerHTML; 
      frma.remove();
        let form = document.createElement('form');
        form.action="";
        form.enctype="multipart/form-data";
        form.method="post";
        form.id = "forma";
        var table_name = new XMLHttpRequest();
        table_name.open('POST','tbb_namee.php',false);
        var body = "val=1";
        table_name.addEventListener('readystatechange', function(){
        if ((table_name.readyState==4) && (table_name.status==200)){
                form.innerHTML = table_name.responseText;
            }
        }
    );
    table_name.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    table_name.send(body);
    document.body.prepend(form);
    conn = document.querySelectorAll(".tb_name");
    forma.insertAdjacentHTML('beforeend', '<input id ="knopka" onclick = "knpk()" type = "submit"></input>');
    
    }
}
function baka(){
    alert(this.value);
}
function knpk(){
    forma.remove();
    exit.innerHTML = vybir;
    
};
</script>
</body>
</html>