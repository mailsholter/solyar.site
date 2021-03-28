<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Зміна статусу</title>
</head>
<body>
    <style>
    fieldset{
        position: relative;
        width: 69%;
        float: left;
    }
    #hddn{
       /*position: absolute;*/
/*height: 47px;*/
/*width: 7%;*/
/*left: 71%;*/
    }
    </style>
    <div id='main'>
    <?php
    $connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
    $zapyt =pg_query('select * from покупки where "статус замовлення" = \'в обробці\';');
    $tablucya = '<fieldset><legend>Список заказів</legend><table><tr><th>номер</th><th>код покупця</th><th>дата</th><th>товар</th><th>кількість</th><th>ціна</th><th>статус</th><th>змінити</th><th>-</th></tr>';
    while($elem = pg_fetch_row($zapyt)){
        // var_dump($elem);
        $nomer = $elem[0];
        $pok_kod = $elem[1];
        $date = $elem[3];
        $stat = $elem[4];
        $tov = $elem[2];
        $tov_mas = explode('|',$tov);
        for($i=0;$i<count($tov_mas);$i++){
            $tovar = explode('/',$tov_mas[$i]);
            $code = $tovar[0];
            $kilk = $tovar[1];
            $cina = $tovar[2];
            $table_names = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema NOT IN ('information_schema','pg_catalog');"); /////Імена всіх таблиць
            while($m=pg_fetch_row($table_names)){
                $poshuk=pg_query("select виробник from $m[0] where код = $code");
                if(pg_fetch_array($poshuk)!=""){
                    $tbmane=$m[0];                        
                    break;
                }
                else{
                    continue;
                }
            }
            $zap = pg_query("select виробник, модель from $tbmane where код ='".$code."'");
            $name = pg_fetch_row($zap);
            $tablucya.="<tr><th>$nomer</th><th>$pok_kod</th><th>$date</th><th>$name[0] $name[1]</th><th>$kilk</th><th>$cina</th><th>$stat</th><th><button class='chng'>змінити</button></th><th id='vonychyi_input'>-</th></tr>";
        }
    }
    echo $tablucya."</table></fieldset>";
?>

<!--<input type='button' onclick ='baka()' value='obn'>-->
</div>
<script>

// function baka(){
//     for(let elem of val){
//         if(elem.value !="0 - в обробці"){
//             let pok_kod = elem.parentElement.parentElement.childNodes[0].innerHTML;
//             let kup_pod = elem.parentElement.parentElement.childNodes[1].innerHTML;
//             let obn = new XMLHttpRequest();
//             obn.open('POST','chng_stat_zam_ajax.php',false);
//             let body = "pok_kod="+pok_kod+"&kd="+kup_pod+"&nv="+elem.value;
//             obn.addEventListener('readystatechange', function(){
//                 if ((obn.readyState==4) && (obn.status==200)){
//                     if(obn.responseText == 'kk'){
//                         let vv = elem.value;
//                         if(vv == "0 - в обробці"){
//                             vv = "0";
//                         }else if(vv == "1 - виконано"){
//                             vv = "1";
//                         }
//                         console.log(vv);
//                         console.log(elem.parentElement.previousElementSibling.innerHTML);
//                         elem.parentElement.previousElementSibling.innerHTML = vv;
//                     }
//                 }
//             });
//             obn.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//             obn.send(body);
            
//         }
//     }
// }
let change = document.querySelectorAll('.chng');
for(let elem of change){
    elem.onclick = function gg(){
        elem.parentElement.nextElementSibling.innerHTML = "<c id = 'hddn'><button class='varia'>в обробці</button><br><button class='varia'>виконано</button></c>";
        // let coords = elem.getBoundingClientRect();
        hddn.style.display = 'block';
        // hddn.style.top = coords.top + "px";
        let varia = document.querySelectorAll('.varia');
        for(let kkk of varia){
        kkk.onclick = function tt(){
            let val = kkk.innerHTML;
            console.log(val);
            let pok_kod = elem.parentElement.parentElement.childNodes[0].innerHTML;
            let kup_pod = elem.parentElement.parentElement.childNodes[1].innerHTML;
            let obn = new XMLHttpRequest();
            obn.open('POST','chng_stat_zam_ajax.php',false);
            let body = "pok_kod="+pok_kod+"&kd="+kup_pod+"&nv="+val;
            obn.addEventListener('readystatechange', function(){
                if ((obn.readyState==4) && (obn.status==200)){
                    console.log(obn.responseText)
                }
            });
            obn.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            obn.send(body);
            hddn.style.display = 'none';
        }
        }
    }
}
</script>
</body>
</html>