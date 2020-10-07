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
    $ol =pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user= 	
    solyar17_adm 	 password=kjkszpg2001 options='--client_encoding=UTF8'");
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
        $baza = pg_query("select * from purchase where customer_code = '".$client_code."';");
        $contact = pg_query("select name, surname, phone_number, adress from покупці  where login = '".$_COOKIE['login']."' and password = '".$_COOKIE['pass']."';");
        $contact = pg_fetch_array($contact);
        // $contact = $contact[0];
        for($i= 0;$i<count($contact);$i++){
            echo $contact[$i]."<br>";
        }
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<table cols = '8' id ='tablucya'>";
        ?>
            <tr>
            <th>Бренд</th>
            <th>Модель</th>
            <th>Кількість</th>
            <th>Тип</th>
            <th>Ціна</th>
            <th>Код</th>
            <th>Код покупки</th>
            <th>Адреса доставки</th>
            </tr>
            <?php
        while($ul = pg_fetch_row($baza)){
            $ptb =$ul;
            // var_dump($ptb);
            
            
            for($i= 1;$i<count($ptb);$i++){
                if($i == 1){
                    echo "<tr>";
                }
                echo "<td>".$ptb[$i]."</td>";
                if($i+1 == count($ptb)){
                    echo "</tr>";
                }
                
            }
            
        }
        echo "</table>";
    }
      ?>
      </body>
     </html>

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