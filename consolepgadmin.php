<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Console PgAdmin4</title>
    <script src="jquery-3.5.1.js"></script>
</head>
<body>
    <input id='console' style="width: 500px;height: 60px;background-color: antiquewhite;" type = 'text'><br>
    <input id='knopka' type ='button' value='Відправити'>
<script>
let button = document.querySelector('#knopka');
let consol = document.querySelector('#console');
button.onclick = function vidpravka(){
    var cons = new XMLHttpRequest();
    cons.open('POST','console_ajax.php',false);
    let body = "val="+consol.value;
    cons.addEventListener('readystatechange', function(){
        if ((cons.readyState==4) && (cons.status==200)){
            alert(cons.responseText);
        }
    });
    cons.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    cons.send(body);
}
</script>
</body>
</html>