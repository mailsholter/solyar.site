<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- <?php echo ($_POST['x'])?>;
   <?php echo ($_POST['y'])?>;
   <?php echo ($_POST['z'])?>; -->
<?php  $x= pg_connect("host=localhost port=5432 user=postgres password=000000 dbname=postgres");
		if(!$x){
			die("PostgreSQL connection failed");
		}
    echo "PostgreSQL connected successfully";
    
    
    $query =" CREATE TABLE IF NOT EXISTS users 
    (
        id SERIAL PRIMARY KEY,
        login character varying(40),
        pass character varying(40),
        cname character varying(40)
    )";   
    $res = pg_query($x,$query) or die('Ошибка запроса: ' . pg_last_error()); 
    if(!$res)
        {
          echo "Создание таблицы прошло успешно"; 
        }
    
    $k = $_POST['x'];
    $y = $_POST['y'];
    $z = $_POST['z'];
    


    $ole = pg_query($x,"SELECT login FROM users WHERE login='$k'");
    $data= pg_fetch_assoc($ole);
    if($data){
        header("Refresh: 3;registr.html");
        echo 'Користувач з таким логіном вже існує.';
        exit;
    }
    

    ?>
</body>
</html>