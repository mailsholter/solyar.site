<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Особистий кабінет</title>
    <script src="jquery-3.5.1.js"></script>
</head>
<body>
<style>
#tablucya{
    border:3px;
    text-align: center;
}

</style>
    <?php
    $ol =pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
    $sur= pg_query("select surname from покупці where login = '".$_COOKIE['login']."' and password = '".$_COOKIE['pass']."';");
    $sur = pg_fetch_row($sur);
    if($sur[0]=="Admin"){
        ?>
        <a href ="create_table.php">create table</a><br>
        <a href ="change_table.php">shange smth in table</a><br>
        <a href ="insert_tab.php">insert into table</a><br>
        <a href="svc.php">convert into svc</a><br>
        <a href ="exp.php">import</a><br>
        <a href ="chng_name.php">change name</a>
        <a href ="testmail.php">test mail</a>
        <br>
        <input id = 'new_database' type="button" value="створити нову базу данних">
        <?php

    }
    else{
        $z = pg_query("select client_code from покупці where login = '".$_COOKIE['login']."' and password = '".$_COOKIE['pass']."';");
        $z = pg_fetch_row($z);
        $client_code = $z[0];
        $contact = pg_query("select name, surname, phone_number, adress from покупці  where login = '".$_COOKIE['login']."' and password = '".$_COOKIE['pass']."';");
        $contact = pg_fetch_array($contact);
        // $contact = $contact[0];
        for($i= 0;$i<count($contact);$i++){
            echo $contact[$i]."<br>";
        }
    }
$zap = pg_query("select * from покупки where код_покупця = '".$client_code."';");
echo '<table><tr><th>Виробник</th><th>Модель</th><th>Код товару</th><th>кількість</th><th>дата</th></tr>';
while ($ogr = pg_fetch_array($zap)){
    for($k = 0;$k<count($ogr);$k++){
        $date = $ogr[3];
        if($k == 2){
            $purchase = explode('|', $ogr[$k]);
            for($i=0;$i<=count($purchase);$i++){
                $purchase1 = explode("/", $purchase[$i]);
                $cod = $purchase1[0];
                $table_names = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema NOT IN ('information_schema','pg_catalog') AND table_name!='покупки' AND table_name!='покупці';"); ////получаємо імена всіх таблиць
                while($m=pg_fetch_row($table_names)){     
                    if($m[0]!='покупки' || $m[0]!='покупці'){     ////перебираємо імена всіх табшлиць для пошуку по коду
                        $poshuk=pg_query("select виробник, модель from $m[0] where код = '".$cod."'");
                        if(pg_fetch_row($poshuk)!=""){
                            $tbmane=$m[0];
                            $zapyt = pg_query("select виробник, модель from $tbmane where код =  '".$cod."'");  ////дістаємо інформацію з таблиці по коду  
                            $zapyt = pg_fetch_row($zapyt);     
                            echo "<tr><th>".$zapyt[0].'</th><th>'.$zapyt[1].'</th><th>'.$purchase1[0].'</th><th>'.$purchase1[1].'</th><th>'.$date.'</th></tr>';
                            // echo "модель ".$zapyt[1].'<br>';
                            // echo $purchase1[0].'<br>';
                            // echo $purchase1[1].'<br>';
                            // echo $purchase1[2].'<br>';
                        }
                    }
                    else{
                        echo "noooo";
                        continue;
                    }
                }
            }
        }
    }
}
?>
     <script>
     new_database.onclick = function baka(){
        $.post({
            url :"new_database.php",          // адрес отправки запроса
            data: {crt:"database"},  // передача с запросом каких-нибудь данных
            success: function(data) {              
                console.log(data);
            },
            error: function(){
                alert('ERROR');
            }
        });
     }
     </script>
     
</body>
</html>