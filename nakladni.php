<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>мости вантед</title>
</head>
<body>
    <style>
    #fldset{
        width: 765px;
        position: relative;
        float: left;
    }
    #document{
        position: relative;
        float: left;
        width: 43%;
        height: max-content;
        border:2px solid black;
    }
    </style>
    <?php
    $connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
    $zapyt =pg_query('select * from покупки where "статус замовлення" = \'в обробці\';');
    $tablucya = '<fieldset id="fldset"><legend>Список заказів</legend><table><tr><th>номер</th><th>код покупця</th><th>дата</th><th>товар</th><th>кількість</th><th>ціна</th><th>статус</th><th>kk</th></tr>';
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
            $tablucya.="<tr><th>$nomer</th><th>$pok_kod</th><th>$date</th><th>$name[0] $name[1]</th><th>$kilk</th><th>$cina</th><th>$stat</th><th><input type='button' class = 'knpka' value='друк'></th></tr>";
        }
    }
    echo $tablucya."</table></fieldset>";

    ?>
    <div id='document'><p>valerka</p></div>
    <button id='kkkk' onclick='durk()'>ДРУК</button>
    <script>
    function PrintDiv(id) {
            var data=document.getElementById(id).innerHTML;
            var myWindow = window.open('', 'my div', 'height=400,width=600');
            myWindow.document.write('<html><head><title>my div</title>');
            /*optional stylesheet*/ //myWindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
            myWindow.document.write('</head><body >');
            myWindow.document.write(data);
            myWindow.document.write('</body></html>');
            myWindow.document.close(); // necessary for IE >= 10

            myWindow.onload=function(){ // necessary if the div contain images

                myWindow.focus(); // necessary for IE >= 10
                myWindow.print();
                myWindow.close();
            };
        }
    let vikno = document.querySelector('#document');
    window.onload = function () { 
        let knopka = document.querySelectorAll(".knpka");
        for(let elem of knopka){
            elem.onclick = function bka(){
                let table_name = new XMLHttpRequest();
                table_name.open('POST','nakladna_ajax.php',false);
                let body = "val="+elem.parentElement.parentElement.childNodes[0].innerHTML;
                table_name.addEventListener('readystatechange', function(){
                    if ((table_name.readyState==4) && (table_name.status==200)){
                        vikno.innerHTML = table_name.responseText;
                        let cina = document.querySelectorAll(".cina");
                        let pr = 0;
                        for(let ss of cina){
                            pr+=Number(ss.innerHTML);
                        }
                        vikno.innerHTML+="<p>Загальна сума = "+pr+"</p>";
                        let kk =0;
                        let kilk = document.querySelectorAll(".killss");
                        for(let sk of kilk){
                            kk+=Number(sk.innerHTML);
                        }
                        vikno.innerHTML+="<p>Загальна кількість = "+kk+"</p>";
                    }
                });
                table_name.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                table_name.send(body);
            }   
        }
    }
    function durk(){
        PrintDiv('document');
    }
    </script>
</body>
</html>