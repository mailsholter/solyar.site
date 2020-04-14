<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
$x= pg_connect("host=localhost port=5432 user=postgres password=000000 dbname=postgres options='--client_encoding=UTF8'");
?>
 <div id = 'article'> 
  <div id = 'left_panel'>
      
   <h3 >ліва панель</h3>
   <form action="" enctype="multipart/form-data" method="post">
     <legend>Виберіит категорію товару</legend>
   <?php
    $table_names = pg_query("Select distinct mobile_phone.type , notebook.type, refrigerator.type from mobile_phone, notebook, refrigerator;");
    $a =pg_fetch_array($table_names);
    for ($i = 0;$i<count($a)-1;$i++){      
      echo '<p><input type = "radio" id = "buttom'.$i.'"
         name = "tovar" value ="'.$a[$i].'">';
        // echo '<option value='.$a[$i].' >'.$a[$i].'</option>';
 }

 ?>
 <p><input type="submit" value="Вибрати"></p>szdfgsdgdfhfdghdfgh
   </form>
  </div>
  <div id = 'artcl'>
    
    <div class = 'articles'>
      <img class = 'photo' src= 'img\mobile_phone\a01\ua-galaxy-a01-a015-sm-a015fzrdsek-back-206509259.jpg'></img>
      Camsung j513
     <h3>15000 grn</h3>
   </div>
   <div class = 'articles'>
    <img class = 'photo' src= 'img\mobile_phone\a01\ua-galaxy-a01-a015-sm-a015fzrdsek-back-206509259.jpg'></img>
    Camsung j513
   <h3>15000 grn</h3>
 </div>
 <div class = 'articles'>
    <img class = 'photo' src= 'img\mobile_phone\a01\ua-galaxy-a01-a015-sm-a015fzrdsek-back-206509259.jpg'></img>
    Camsung j513
   <h3>15000 grn</h3>
 </div>
 <div class = 'articles'>
    <img class = 'photo' src= 'img\mobile_phone\a01\ua-galaxy-a01-a015-sm-a015fzrdsek-back-206509259.jpg'></img>
    Camsung j513
   <h3>15000 grn</h3>
 </div>
 <div class = 'articles'>
    <img class = 'photo' src= 'img\mobile_phone\a01\ua-galaxy-a01-a015-sm-a015fzrdsek-back-206509259.jpg'></img>
    Camsung j513
   <h3>15000 grn</h3>
 </div>
 <div class = 'articles'>
    <img class = 'photo' src= 'img\mobile_phone\a01\ua-galaxy-a01-a015-sm-a015fzrdsek-back-206509259.jpg'></img>
    Camsung j513
   <h3>15000 grn</h3>
 </div>
  </div>
</div>
<form action="proba.php">
  <button>proba</button>
</form>


</body>
</html>