<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button id='knopka'>SMS</button>
    
<script>
let x = document.querySelector('#knopka');
x.onclick = function baka(){
    let objekt_sms = {
        recipients:[380665070548,380974886465],
        sms:{
            sender: 'solyar.site',
            text: 'смска!'
        }
    }
    let stroka = "";
    for(let i = 0;i<objekt_sms.recipients.length;i++){
        stroka+="recipients["+i+"]*"+objekt_sms.recipients[i]+"#";
    }
    stroka+="sms[sender]*"+objekt_sms.sms.sender+"#";
    stroka+="sms[text]*"+objekt_sms.sms.text+"#";
    let knpka = new XMLHttpRequest();
    let inf ='info='+stroka;
    console.log(inf);
    knpka.open('POST',"sms_ajax.php",false);
    knpka.addEventListener('readystatechange', function(){
        if ((knpka.readyState==4) && (knpka.status==200)){
            console.log(knpka.responseText);
        }    
    });
    knpka.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    knpka.send(inf);
}
</script>
</body>
</html>

