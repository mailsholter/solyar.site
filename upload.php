<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$old_umask = umask(0); //////////////ТЕСТ УМАКС 
$table_code= $_POST['код'];
$table_name = $_POST['table_name'];
if (isset($_FILES['img'])){
    $img = $_FILES['img'];
}
if (isset($_FILES['imag'])){
    $main_img = $_FILES['imag'];
}
$array = array();
function path($d1, $d2, $d3, $d4){
    for ($i = 0;$i<count($d1['name']);$i++){
        $newname = $d2.'-'.$i.'.jpg';
        move_uploaded_file($d1 ['tmp_name'][$i],'img/'.$d3.'/'.$d4.'/'.$newname);
        $path = 'img/'.$d3.'/'.$d4.'/'.$newname;
        $array[$i] = $path;
    }
    $array = implode(',',$array);
    return $array;
}
$papka = $_POST['модель'];
for($l = 0;$l<strlen($papka);$l++){      //////НЕДАВНО ПОМІНЯВ
    if($papka[$l]==" "){
        $papka[$l]="-";
    }
}
if (file_exists("img/$table_name")) {
     echo "Така папка вже існує)  ";
     echo '<br>';
 } else {
    $mkdir = mkdir("img/$table_name");
    echo '<br>';
}
if(file_exists("img/$table_name/$papka")){
    echo "І таке вже є  ";
    echo '<br>';
}
else{
    $mkdir = mkdir("img/$table_name/$papka");
    echo '<br>';
}
if (isset($_FILES['imag'])){
if (file_exists("img/allstorage")) {
    echo "Така папка вже існує)  ";
} else {
   $mkdir = mkdir("img/allstorage");
}
if(file_exists("img/allstorage/$papka")){
   echo "І таке вже є  ";
}
else{
   $mkdir = mkdir("img/allstorage/$papka");
}
$newname = $table_code.'-0.jpg';
move_uploaded_file($main_img['tmp_name'],"img/allstorage"."/".$papka.'/'.$newname);
$path_main = 'img/allstorage/'.$papka.'/'.$newname;
$main = "'".$path_main."'";
}
if (isset($img)){
    $array = path($img,$table_code,$table_name,$papka);
}
//Загружаєм файли на сервер
$b = $_POST['brand'];
$x= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user= 	
solyar17_adm 	 password=kjkszpg2001 options='--client_encoding=UTF8'");
if(!$x){
	die("PostgreSQL connection failed");
}
echo "PostgreSQL connected successfully";

$table_row = pg_query("SELECT column_name 
FROM INFORMATION_SCHEMA.COLUMNS 
WHERE table_name = '$table_name' and column_name!='imag';");
$val ='';
$im='';
while($ol = pg_fetch_row($table_row)){
    $arr_name[]=$ol[0];
}
$tb_row='';
$allstorage_val ='';
$allstorage_row ='';
foreach ($arr_name as $i) {
    if (isset($_POST["$i"]) && $i!="img"){
        $val .="'".$_POST["$i"]."'".",";
    }
    elseif($i=="img")
    {
        $val.="'{".$array."}',";
    }
    elseif($i="imag"){
        continue;
    }
    if($i=='brand'||$i=='code'||$i=='type'||$i=='model'||$i=='price'){
        $allstorage_val.="'".$_POST["$i"]."'".",";
        $allstorage_row.=$i.",";
    }
    $tb_row.=$i.",";
}
$orr =str_split($val);
$val=trim($val,",");
$tb_row=trim($tb_row,",");
pg_set_client_encoding($x,"UTF-8");
$tb_row.=", imag";
$allstorage_val.=$main;
$allstorage_row.="main_img";
$allstorage_row=trim($allstorage_row,",");
$vidpravka = pg_query("INSERT INTO $table_name($tb_row) VALUES ($val, $main);");
umask($old_umask);
?>
</body>
</html>
