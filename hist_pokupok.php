<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Історія покупок</title>
</head>
<body>
<?php
$connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$nmsurnm = pg_query("select name, surname from покупці where name!= 'adm';");
$select = "<select id = 'slct'><option>Всі</option>";
while($elem = pg_fetch_row($nmsurnm)){
    $select.="<option>".$elem[0]." ".$elem[1]."</option>";
}
$select.="</select>";
echo $select;
?>
<button id='bttn'>Вибрати</button>
<div id='tablyca'></div>
<script>
let bttn = document.querySelector('#bttn');
bttn.onclick = function slct(){
    let slc = document.querySelector("#slct");
    let val = slc.value;
    var table = new XMLHttpRequest();
    table.open('POST','hist_pokupok_ajax.php',false);
    let body = "val="+val;
    table.addEventListener('readystatechange', function(){
        if ((table.readyState==4) && (table.status==200)){
            console.log(table.responseText);
            tablyca.innerHTML='';
            tablyca.insertAdjacentHTML('afterbegin',table.responseText);
        }
    });
    table.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    table.send(body);
}
</script>

</body>
</html>
