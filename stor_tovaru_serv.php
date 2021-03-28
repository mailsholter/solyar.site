<?php
$x= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$code = $_POST['code'];

$table_names = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema NOT IN ('information_schema','pg_catalog');"); /////Імена всіх таблиць
while($m=pg_fetch_row($table_names)){
    $poshuk=pg_query("select виробник from $m[0] where код = $code");
    if(pg_fetch_array($poshuk)!=""){
        $tbmane=$m[0];
        break;
    }
    else{
        continue;
    }
}
$tovar = pg_query("select * from $tbmane where код = '".$code."'");
$tovar = pg_fetch_row($tovar);
$colomn = pg_query("select column_name from information_schema.columns where table_name = '".$tbmane."';");

$cnt = 0;
$col_nm = array();
while($el = pg_fetch_row($colomn)){
    $col_nm[$cnt] = $el[0];
    $cnt++;
}

$text = '<div id = "text">';
$price = '';
$photo = '';
$bool = false;
$l_photo = "";
for($i=0;$i<count($tovar);$i++){
    if($col_nm[$i] != "imag" && $col_nm[$i] != "img" && $col_nm[$i] != 'кількість' && $col_nm[$i] != "ціна" && $col_nm[$i] != 'код'){
        $text.="<p>".$col_nm[$i]." • ".$tovar[$i]."</p>";
    }else if($col_nm[$i] == "img"){
        $zobr = explode(",",$tovar[$i]);
        for($u = 0;$u<count($zobr);$u++){
            $l_photo.='<img class="little" src="'.$zobr[$u].'"><br>';
        }
    }else if($col_nm[$i] == "imag"){
        $l_photo.='<img class="little" src="'.$tovar[$i].'"><br>';
        $photo.='<p><img id="main_photo" src="'.$tovar[$i].'"></p>';
    }else if($col_nm[$i] == "ціна"){
        $price = "<div id='cina'><p> Ціна: ".$tovar[$i]."</p></div>";
    }else if($col_nm[$i] == 'кількість'){
        if($tovar[$i]>=1){
            $bool = true;
        }
    }
}
if($bool){
    $price.="<p><button id='pok_btn' onclick ='pokypka()'>Купити</button></p>";
}else{
    $price.="<p><button id='pok_btn' onclick ='pokypka()'>Замовити</button></p>";
}
echo '<div id="photo">'."<div id='lft_psk'>".$l_photo."</div>";
echo $photo."</div>";
echo $price;
echo $text."</div>";
// $table = $tbmane;
// $kartunka = '';
// $else = '';
// $price ='';
// $tmp = '';
// $div_photo = "<div id='photo' style='float: left;'>";
// $div_content = "<div id = 'content' style='line-height: 0;'>";
// $div_buy = "<div id = 'buy' style='float: left;'>";
// $little_photo = '<div id ="little_photo">';
// $tb_row = pg_query("SELECT column_name FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '".$table."';");
// while($z = pg_fetch_row($tb_row)){
//     if($z[0] == 'imag'){
//         $tmp=$z[0];
//         $zp = pg_query("SELECT $tmp from $table");
//         $zp = pg_fetch_row($zp);
//         $kartunka.='<img src="'.$zp[0].'">'; 
//     }
//     else if($z[0] == 'img'){
//         $tmp=$z[0];
//         $zp = pg_query("SELECT $tmp from $table");
//         $zp = pg_fetch_row($zp);
//         $zp = explode(",",$zp[0]);
//         for($i =0;$i<count($zp);$i++){
//             if($i+1 == count($zp)){
//                 $little_photo.='<img class = "little" src="'.$zp[$i].'">';
//             }
//             else{
//                 $little_photo.='<img class = "little" src="'.$zp[$i].'"><br>';
//             }
            
//         }
//     }
//     else if($z[0] == 'ціна'){
//         $tmp=$z[0];
//         $zp = pg_query("SELECT $tmp from $table");
//         $zp = pg_fetch_row($zp);
//         $div_buy.='<p style="font-size: xxx-large;">'.$zp[0].' грн</p>';
//     }
//     else if($z[0] == 'код'){
//         $tmp=$z[0];
//         $zp = pg_query("SELECT $tmp from $table");
//         $zp = pg_fetch_row($zp);
//         $div_buy.='<p>'.$tmp.' - '.$zp[0].'</p>';
//     }
//     else{
//         $tmp=$z[0];
//         $zp = pg_query('SELECT "'.$tmp.'" from '.$table.';');
//         $zp = pg_fetch_row($zp);
//         $else.='<p>'.$tmp.' - '.$zp[0].'</p>';
//         // echo "SELECT $tmp from $table"."<br>";
//     }
// }
// $div_photo.=$little_photo.'</div>'.$kartunka.'</div>';
// $div_content.=$else.'</div>';
// $div_buy.='<button>Купити</button></else>';
// echo $div_photo;
// echo $div_buy;
// echo $div_content;
?>