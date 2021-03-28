<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
   if(isset($_GET['id'])){
    $tovar = $_GET['id'];
    $_SESSION['table']=$_GET['id'];
    }
    echo '<form id="pereadress" action="index.php?id=0" enctype="multipart/form-data" method="post">';
    echo "<p id='inpereadr'>".$_SESSION['table']."</p>";
    ?>
    <input id="sub" type="submit">
    </form>
    <script>
    var pereadress = document.querySelector("#pereadress");
    var inpereadr = document.querySelector("#inpereadr");
    var sub = document.querySelector("#sub");
    pereadress.action="index.php?id="+inpereadr.innerHTML;
    pereadress.submit();
    </script>
</body>
</html>