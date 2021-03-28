<?php
$x= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$tab_name = $_POST['table_name'];
$head = pg_query("select column_name from information_schema.columns where information_schema.columns.table_name='".$tab_name."';");
$head_count = pg_query("select column_name from information_schema.columns where information_schema.columns.table_name='".$tab_name."';");
$cnt = 0;
while($elem = pg_fetch_row($head_count)){
    $cnt++;
}
$count = $cnt;
$zaholovok = array();
$bot = array();
$table = '<table border="1"><tbody id="tablica">';
$max_value= 0;
while($elem = pg_fetch_row($head)){
    $zaholovok[$cnt]=$elem[0];
    $ost = pg_query("SELECT ".$elem[0].", CASE WHEN ".$elem[0]." IS NULL THEN 'нуль' END  FROM ".$tab_name.";");
    while($elem = pg_fetch_row($ost)){
        for($i = 0;$i<count($elem);$i++){
            if($elem[$i]!=NULL){
                $bot[$max_value]=$elem[$i];
                $max_value++;
            }
        }
    }
    $cnt--;
}
$ruzn = $max_value/$count;
for($i = $count;$i>0;$i--){
    if($zaholovok[$i]!=''){
        if($i==$count){
            $table.='<tr><th>'.$zaholovok[$i].'</th>';
        }
        elseif($i==1){
            $table.='<th>'.$zaholovok[$i].'</th></tr>';
        }
        else{
            $table.='<th>'.$zaholovok[$i].'</th>';
        }
    }
}
for($i =0;$i<$ruzn;$i++){
    $table.='<tr>';
    for($k=$i;$k<$max_value;$k+=$ruzn){
        if($bot[$k]!='NULL'){
            $table.= '<td id="a'.$k.'" onclick="makeinput(a'.$k.')">'.$bot[$k].'</td>';
        }
        elseif($bot[$k]=='NULL'){
            $table.= '<td id="a'.$k--.'" onclick="makeinput(a'.$k.')">'.$bot[$k-1].'</td>';
        }
        else{
            continue;
        }
    }
    $table.='</tr>';
}
$table.="</tbody></table>";
echo $table;
?>