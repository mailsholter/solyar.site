<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $x = pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$tb_name = pg_query("SELECT table_name FROM information_schema.tables
WHERE table_schema='public';");
echo "<form id='main'>";
$stroka = '<select id="select" size="3" name="table_name">';
while($values = pg_fetch_row($tb_name) ){          
    $stroka.='<option value='.$values[0].' >'.$values[0].'</option>';
}
$stroka.='</select>';
echo $stroka.'<button id ="knopka" type = "button"> ok </button>'."</form>";
?>
<script>
knopka.onclick = function nma(){
    let tbb_name = select.value;
    var table_name = new XMLHttpRequest();
    table_name.open('POST','pocosort2.php',false);
    let body = "val="+tbb_name;
    table_name.addEventListener('readystatechange', function(){
        if ((table_name.readyState==4) && (table_name.status==200)){
            main.innerHTML =  table_name.responseText;
            let con = document.querySelectorAll('.radio');
            for(let elem of con){
                elem.onclick = function radio(){
                    if(elem.getAttribute("checked") == null || elem.checked == false){
                        // elem.getAttribute("checked");
                        elem.setAttribute("checked","");
                            let new_sort = new XMLHttpRequest();
                            new_sort.open('POST','pocosort3.php',false);
                            let body = "val="+elem.previousSibling.innerHTML+"&tb_name="+tbb_name;
                            new_sort.addEventListener('readystatechange', function(){
                                if ((new_sort.readyState==4) && (new_sort.status==200)){
                                    console.log(new_sort.responseText);
                                }
                            });
                        new_sort.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        new_sort.send(body);
                        
                    }else{
                        elem.removeAttribute("checked");
                        elem.checked = false;
                        let new_sort1 = new XMLHttpRequest();
                            new_sort1.open('POST','pocosort4.php',false);
                            let body1 = "val="+elem.previousSibling.innerHTML+"&tb_name="+tbb_name;
                            new_sort1.addEventListener('readystatechange', function(){
                                if ((new_sort1.readyState==4) && (new_sort1.status==200)){
                                    console.log(new_sort1.responseText);
                                }
                            });
                        new_sort1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        new_sort1.send(body1);
                        // console.log("valera");
                    }
                }
            }
        }
    });
    table_name.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    table_name.send(body);
}
// function bak(){
//     let con = document.querySelectorAll('.radio');
//     let tbb_name = val.innerHTML;
//     console.log(tbb_name);
//     let stroka = '';
//     for(let elem of con){
//         if(elem.checked == true){
//             stroka+=elem.previousSibling.innerHTML+",";
//         }
//     }
//     let new_sort = new XMLHttpRequest();
//     new_sort.open('POST','pocosort3.php',false);
//     let body = "val="+stroka+"&tb_name="+tbb_name;
//     new_sort.addEventListener('readystatechange', function(){
//         if ((new_sort.readyState==4) && (new_sort.status==200)){
//             main.innerHTML =  new_sort.responseText;
//         }
//     });
//     new_sort.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     new_sort.send(body);
// }
</script>
</body>
</html>