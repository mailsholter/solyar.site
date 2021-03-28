<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Особистий кабінет</title>
</head>
<body>
   <?php
echo '<input id="hddn" type="hidden" value="'.$_GET['id'].'">';
?>
<style>
#ste{
    position: relative;
    height: 100px;
    background-color:  #758c70;
}
#inf{
    position: relative;
    width: 45%;
    float: left;
    border: 2px solid;
    margin: 2px;
}
#table{
    margin: 2px;
    position: relative;
    width: 53%;
    float: left;
    border: 2px solid;
    margin: 2px;
}
table{
    border-collapse: collapse;
    width:100%;
}
th {
  letter-spacing: 2px;
  border:2px solid;
}

td {
  letter-spacing: 1px;
  border:2px solid;
}

tbody td {
  text-align: center;
}
</style>
<div id = 'main'>
    <div id = 'ste'>Особистий кабінет</div>
    <div id='inf'>
    </div>
    <div id='table'>
    </div>    
</div>
<script>
    let logi = document.querySelector("#hddn");
    let inf = document.querySelector("#inf");
    let table = document.querySelector("#table");
    let login = logi.getAttribute('value');
    
    
    let dan = new XMLHttpRequest();
    let dan_inf= "login="+login;
    dan.open('POST','osob_kabin_ajax.php',false);
    dan.addEventListener('readystatechange', function(){
        if ((dan.readyState==4) && (dan.status==200)){
            console.log(dan.responseText);
            if(dan.responseText != "ntkk"){
                let dann = dan.responseText.split(",");
                inf.innerHTML = "<p>"+dann[0]+"</p>";
                inf.innerHTML+= "<p>"+dann[1]+"</p>";
                inf.innerHTML+= "<p>"+dann[2]+"</p>";
                inf.innerHTML+= "<p>"+dann[3]+"</p>";
            }else{
                alert('ПОМИЛКА');
                document.location.href="index.php";
            }
        }
    });
    dan.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    dan.send(dan_inf);
    
    
    let hist_pok = new XMLHttpRequest();
    let hist_pok_inf = "login="+login;
    hist_pok.open('POST','tab_lica_pokypok_ajax.php',false);
    hist_pok.addEventListener('readystatechange', function(){
        if ((hist_pok.readyState==4) && (hist_pok.status==200)){
            if(hist_pok.responseText=="<fieldset><legend>Список заказів</legend><table><tr><th>номер</th><th>дата</th><th>товар</th><th>кількість</th><th>ціна</th><th>статус</th></tr></table></fieldset>"){
                table.innerHTML = 'ТАБЛИЦЯ ПОКУПОК ПУСТА';
            }else{
                table.insertAdjacentHTML('afterbegin', hist_pok.responseText);
            }
            console.log(hist_pok.responseText);
        }
    });
    hist_pok.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hist_pok.send(hist_pok_inf);
</script>
</body>
</html>
