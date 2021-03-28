<?php
$x = pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$val = $_POST['val'];
$zap = pg_query("select column_name from information_schema.columns where table_name = '".$val."';");
$zap1 =  pg_query("select $val from sorting;");
// echo "select column_name from information_schema.columns where table_name = '".$val."';";
// echo "select $val from sorting;";
$arr = array();
$i=0;
while($el = pg_fetch_row($zap1)){
    $arr[$i] = $el[0];
    $i++;
}
var_dump($arr);
$count = count($arr);
echo '<br>';
echo $count;
echo '<br>';
while($elem = pg_fetch_row($zap)){
    $boo = false;
    for($k = 0;$k<$count;$k++){
        if($arr[$k] == $elem[0]){
            $boo = true;
        }
    }
    if($boo){
        echo '<c class ="peshka">'.$elem[0].'</c><input class="radio" type="radio" checked>'."<br>";
    }else{
        echo '<c class ="peshka">'.$elem[0].'</c><input class="radio" type="radio">'."<br>";
    }
}
echo '<button onclick="bak()" type = "button"> ok </button>';
echo "<p>Назва таблиці:</p>";
echo '<p id="val">'.$val.'</p>';
?>