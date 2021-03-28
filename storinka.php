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
<input type = 'text' id = 'text'><br>
<input type = 'button' id = 'knopka'>
<script>
knopka.onclick = function vidpravka(){
    let xhr = new XMLHttpRequest();
    let body = "val="+ text.value;
    xhr.open('POST', "storinka_serv.js:3000", false);
    xhr.addEventListener('readystatechange', function(){
        if ((xhr.readyState==4) && (xhr.status==200)){
            console.log(xhr.responseText);
        }
    });
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(body);
}
</script>
</body>
</html>