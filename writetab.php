<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $ol =pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user= 	
    solyar17_adm 	 password=kjkszpg2001 options='--client_encoding=UTF8'");
    $query = "SELECT table_name FROM information_schema.tables
    WHERE table_schema NOT IN ('information_schema','pg_catalog');";
    $res = pg_query($query); 
    // $data= pg_fetch_array($res);
    $data1 = pg_fetch_row($res);
    // echo  gettype ($data);
    // echo $data;
    echo $data1[0];
    
    ?>
    <form action="" method='GET'>
        <p><select name="select" size="1">
        <?php echo '<option selected value="s1">'.$data1[0].'</option>'?>
         <option value="s2">Крокодил Гена</option>
         <option value="s3">Шапокляк</option>
         <option value="s4">Крыса Лариса</option>
        </select>
        <input type="submit" value="Отправить"></php> 
       </form>

    <?php if (isset($_GET['select'])){
     echo $_GET['select'];  
     }
      ?>
      </body>
     </html>
     
</body>
</html>