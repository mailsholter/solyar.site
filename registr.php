<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body id = "body">
<style>
input:invalid {
    border: 2px solid red;
    margin: 5px;
}
input:valid {
    border: 4px solid green;
    margin: 5px;
}
#body{
    display:flex;
    align-items:center;
    Justify-content:center;
}
#registr{
    text-align:center;
    margin-top:50px;
    
}
#fld1{
    width:20%
}
</style>
<?php
$x= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
session_start();
if(!isset($_POST['name'])){
?>
<form id="registr" action="" method="post">
<fieldset id="fld1">
    <legend>Реєстрація</legend>
    <input type="text" maxlength="40"  placeholder="Імя" name='name' pattern ="[A-Za-zа-щА-ЩЬьЮюЯяЇїІіЄєҐґ]+" required><br>
    <input type="text" maxlength="40"  placeholder="Фамілія" name='surname' pattern ="[A-Za-zа-щА-ЩЬьЮюЯяЇїІіЄєҐґ]+" required><br>
    <input type="text" maxlength="12" minlength="6" placeholder="Логін" name='login' id = "log" onkeyup="check(this.value)" pattern ="[A-Za-zа-щА-ЩЬьЮюЯяЇїІіЄєҐґ]+" required><br>
    <input type="text" maxlength="12" minlength="6" placeholder="Пароль" name='password' pattern ="[A-Za-z0-9]+" required><br>
    <fieldset id="fld2">
        <legend>Адреса</legend>
        <input type="text" maxlength="40"  placeholder="населений пункт" name='city' pattern ="[A-Za-zа-щА-ЩЬьЮюЯяЇїІіЄєҐґ]+" required><br>
        <input type="text" maxlength="40"  placeholder="вулиця" name='vilage' pattern ="[A-Za-zа-щА-ЩЬьЮюЯяЇїІіЄєҐґ]+" required><br>
        <input type="text" maxlength="40"  placeholder="№ будинку" name='number' pattern ="[0-9]+" required><br>
    </fieldset>
    <input type="tel" maxlength="40"  placeholder="Моб.Телефон" name='phone_number' pattern ="(\+380|0)\d{9}" required><br>
    <input type="submit" value="Зареєструватися"></p>
</fieldset>
</form>

<?php
}
else{
$array="";
if (isset($_POST['name'])){
    $code=random_int(100000,999999);
    $array .="('".$_POST['name']."', '".$_POST['surname']."', '".$_POST['login']."', '".$_POST['password']."', '".$_POST['city']."/".$_POST['vilage']."/".$_POST['number']."', '".$_POST['phone_number']."', '".$code."');";
    $vidp=pg_query("INSERT INTO покупці (name, surname, login, password, adress, phone_number, client_code) VALUES $array");
    echo "INSERT INTO покупці (name, surname, login, password, adress, phone number, client_code) VALUES $array";
        if($vidp){
            header("Location: /index.php",TRUE,301);
        }
        else{
            echo "<br>"."not done";
        }
    }
}
?>
<script>
var log = document.querySelector("#log"); 
function check(login) {
    var zapyt= new XMLHttpRequest();
            var kkd= "lg="+login;
            zapyt.open('POST','dynam_perevirka.php',false);
            zapyt.addEventListener('readystatechange', function(){
              if ((zapyt.readyState==4) && (zapyt.status==200)){
                if(zapyt.responseText == 1){
                    log.style.border = "2px solid red";
                    log.style.margin = "5px";
                }
                else{
                    log.style.border = "4px solid green";
                    log.style.margin = "5px";
                }
              }
            });
            zapyt.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            zapyt.send(kkd);
}

</script>
</body>
</html>
