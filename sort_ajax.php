<?php
$connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$tableName = $_POST['id'];
$zap1 = pg_query("select $tableName from sorting where $tableName !='NULL'");
$bool = false;
while($elem = pg_fetch_row($zap1)){
    if($elem[0]=="ціна"){
        $bool = true;
    }
    else if($elem[0]!="ціна"){
        $new_st = '';
        $old_st = str_split($elem[0]);
        for($i=0;$i<count($old_st);$i++){
            if($old_st[$i] == " "){
                $new_st.="_";
            }else{
                $new_st.=$old_st[$i];
            }
        }
        $st ="<div id='".$new_st."'><p><b>виберіть ".$elem[0]."</b></p>";
        $zap = pg_query("select distinct \"$elem[0]\" from $tableName");
        while($el = pg_fetch_row($zap)){
            $st.='<input class="bxes" type="checkbox" name="'.$el[0].'" value="'.$el[0].'">'.$el[0].'<Br>';
        }
        $st.='</div>';
        echo $st;
    }else if($elem[0]!=NULL){
        continue;
    }
}
if($bool){
    $max = pg_query("SELECT MAX(ціна) FROM $tableName;");
    $min = pg_query("SELECT MIN(ціна) FROM $tableName;");
    $max = pg_fetch_row($max);
    $min = pg_fetch_row($min);
    echo '<div id="poloska"><div id = left style="left: 0px;"></div><div style="width: 175px; left: 12px;" id="pole"></div><div id="right" style="right: 0px;"></div></div><input type="text" id="vid_rah" name="vid" value="'.$min[0].'" style="width: 50px;float: left;margin: 3px;"><input type="text" id="do_rah" name="do" value="'.$max[0].'" style="width: 50px;margin: 3px;">';
}
echo '<input id="sort_bttn" type="button" value="вибрати">';

?>