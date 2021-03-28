<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change table</title>
    <script src="jquery-3.5.1.js"></script>
</head>
<body>
<?php
session_start(); 
$ol =pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user= 	
solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
if(!isset($_POST["table_name"])){
 ?>
     <form action="" enctype="multipart/form-data" method="post">
     <fieldset>
     <legend>Вибір таблиці</legend>
     <p><select size="3" name ="table_name"><label for="table_names">
     <?php
     $table_names = pg_query("SELECT table_name FROM information_schema.tables
     WHERE table_schema='public';");
     while($values = pg_fetch_row($table_names) ){          
     echo '<option value='.$values[0].' >'.$values[0].'</option>';
     }?>
     </fieldset>
     <input type="submit" value="Вибрати">
     </form>
    </fieldset>
     <input href="cstmr.php" type="submit" value="Назад">
     </form>
<?php
}else{
    $_SESSION["table_name"] = $_POST["table_name"];
    $stovbci = pg_query("SELECT column_name FROM information_schema.columns WHERE table_name = '".$_POST["table_name"]."';");
    while($k = pg_fetch_row($stovbci)){
        echo '<c>'.$k[0].'</c><button value = "'.$k[0].'" name="-" class="knopka">-</button><br>';
    }
    echo "<input type='submit' id = 'bttm' value='створити нове поле'>";
}
?>
<script>
    var bt = document.querySelector("#bttm");
    var a = document.querySelectorAll(".knopka");
    var newt = document.querySelectorAll(".new_column");
    for(let elem of a){
        elem.onclick = function foo(){
            var perera = new XMLHttpRequest();
            var y = "name="+elem.value;
            perera.open('POST','chng_name_server.php',false);
            perera.addEventListener('readystatechange', function(){
                if((perera.readyState==4) && (perera.status==200)){
                    console.log(perera.responseText);
                    elem.remove();
                }
            });
            perera.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            perera.send(y);
            }
        }
        var cnt = 0;
    bt.onclick = function add(){
        bt.insertAdjacentHTML('beforebegin', '<c><input type="text" id="ct'+cnt+'" value="введіть назву нового стовбця"><input onclick = "stvor('+cnt+')" class = "new_column" type="submit" value="Відправити"></c><br>');
        cnt++;
    }
    function stvor(b){
        let id = "ct"+b;
        var k = document.querySelector("#"+id);
        var vudpr = new XMLHttpRequest();
        var x = "name="+k.value;
        vudpr.open('POST','change_table_server.php',false);
        vudpr.addEventListener('readystatechange', function(){
            if((vudpr.readyState==4) && (vudpr.status==200)){
                console.log(vudpr.responseText);
            }
        });
        vudpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        vudpr.send(x);
    }
    

</script>
</body>
</html>