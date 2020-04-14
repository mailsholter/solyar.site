<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       Здравствуйте, <?php echo ($_POST['x']); ?>

    <?php 
    $x = pg_connect("host=localhost port=5432 user=postgres password=000000 dbname=postgres");
    if ($x->connect_errno)   
    $log = $_POST['x'];
    $pass = $_POST['y'];
    $ol= pg_query($x,"(SELECT COUNT(login) FROM users) as ole  WHERE login='$log', (SELECT COUNT(pass) FROM users as olee WHERE pass=$pass)");
    $data= pg_fetch_row($ol);
    echo $data['ole'];
    // if($data['ole']>0){
    //    header("Refresh: 3;registr.html");
    //    echo 'Користувач з таким логіном вже існує.';
    //    exit;
    //  }
         
// /     SELECT COUNT(*) AS Qty
//     FROM PC
//     WHERE model IN(SELECT model
//      FROM Product
//      WHERE maker = 'A'
//      );









            ?>
</body>
</html>
