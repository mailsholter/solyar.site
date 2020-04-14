<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$table_name = $_POST['table_name'];
//echo $table_name;
$img = $_FILES['imag'];
// echo count($img['name']);

//var_dump($img["name"]);
//$array = array();
$papka = $_POST['model'];
if (file_exists("img/$table_name")) {
     echo "Така папка вже існує)  ";
 } else {
    $mkdir = mkdir("img/$table_name");
}
if(file_exists("img/$table_name/$papka")){
    echo "І таке вже є  ";
}
else{
    $mkdir = mkdir("img/$table_name/$papka");
}
$file_count = count($img["name"]);
for ($i = 0;$i<count($img['name']);$i++){
    $newname = $_POST['model'].'-'.$i.'.jpg';   
    move_uploaded_file($img ['tmp_name'][$i],'img/'.$table_name.'/'.$papka.'/'.$newname);
    $path = 'img/'.$table_name.'/'.$papka.'/'.$newname;
    $array[$i] = $path;
}
// echo $_POST['table_names'];


$array = implode(',',$array);
// echo $array.'</br>';
// $i=0;
//Загружаєм файли на сервер
$b = $_POST['brand'];
$x= pg_connect("host=localhost port=5432 user=postgres password=000000 dbname=postgres options='--client_encoding=UTF8'");
if(!$x){
	die("PostgreSQL connection failed");
}
echo "PostgreSQL connected successfully";


    

pg_set_client_encoding($x,"UTF-8");
$vidpravka = pg_query("INSERT INTO $table_name (brand, model, number, price, discription, type,img,code) 
VALUES ('".$_POST['brand']."',  '".$_POST['model']."', '".$_POST['number']."', '".$_POST['price']."', '".
$_POST['discription']."', '".$_POST['type']."',   '{".$array."}','".$_POST['code']."');");
// $select = pg_query("select img from mobile_phone where mb_id = 53;");
// $select = pg_fetch_row($select);
// $select=trim($select[0]," {}[]\"");
// $select=(explode(',',$select));
// var_dump(count($select));
?>
</body>
</html>
