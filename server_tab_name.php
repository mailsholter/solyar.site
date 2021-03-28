<?php
$x= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
if(isset($_POST['row_name'])){
    $del = pg_query('ALTER TABLE '.$_POST['tab_name'].' DROP COLUMN "'.$_POST['row_name'].'";');
    if($del){
        echo 'yes';
    }else{
        echo 'no';
    }
}else if(isset($_POST['newtabname'])){
    $newtabname = $_POST['newtabname'];
    $type = $_POST['type'];
    $zapyt = pg_query("ALTER TABLE ".$_POST['tab_name']." ADD COLUMN ".$newtabname." ".$type.";");
    if($zapyt){
        echo $newtabname;
    }else{
        echo pg_last_error();
    }
}else{
    $table_name = $_POST['val'];
    $zapyt = pg_query("select column_name from information_schema.columns where information_schema.columns.table_name='".$table_name."';");
    $ex = '';
    $id = 0;
    while($elem = pg_fetch_row($zapyt)){
        $ex.="<c id='".$id."'>".$elem[0]."</c>";
        $ex.="<input type='button' value='-' onclick = 'del(".$id.")'><br>";
        $id++;
    }
    echo $ex;
}


?>