<?php
$x = pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
$val = $_POST['val'];
$stroka = '<form id="data" enctype="multipart/form-data" method="post">';
$cnt = 0;
if($val == 1){
    $tab_name = $_POST['tab'];
    $zap = pg_query("select column_name from information_schema.columns where table_name = '".$tab_name."';");
    while($z = pg_fetch_row($zap)){
        $stroka.= '<c id="tab'.$cnt.'">'.$z[0].'</c><input id="numb'.$cnt.'" style="width: 15px;" type=text><br>';
        $cnt++;
    }
    $stroka.="<input type = 'file' onchange='readFile(this)'  name = 'excel'><button type ='button' onclick='knipka()'>Submit</button></form><p id='count' style='visibility: hidden;'>".$cnt."</p>"; 
    echo $stroka;
}
else{
  
  $tab_name =$_POST['tab'];
  $data = explode("|",$val);
  $n = $_POST['numb'];
  $perevirka = pg_query("SELECT код FROM ".$tab_name.";");
  for($i=0;$i<count($data);$i=$i+2){
      $tab_rows =$data[$i];
      $value=$data[$i+1];
      $value1 = explode("%",$value);
      $info='';
      $cod ="";
      $bool = false;
      $pos = 0;
      for($i = 0;$i<count($value1);$i++){
          if($i == $n){
              $cod = $value1[$n];
              $pos = $i;
          }
      }
      while($el = pg_fetch_row($perevirka)){
          if($el[0] == $cod){
              $bool = true;
              unset($value1[$pos]);
          }
      }
      
      if($bool){
          $newstr='';
          $tab_mas =explode(",",$tab_rows);
          $new_tab_mas ='';
          for($i=0;$i<=count($tab_mas);$i++){
              if($i == $pos){
                  unset($tab_mas[$i]);
              }
              else{
                  $new_tab_mas.="'".trim($tab_mas[$i]," ")."', ";
              }
          }
          $new_tab_mas = trim($new_tab_mas,", ");
          echo $new_tab_mas."<br>";
          for($j=0;$j<count($value1);$j++){
            $info.="'".trim($value1[$j]," ")."', ";
          }
          $info = substr($info, 4,-2);
          echo $info.'<br>';
           $vidpr = pg_query("UPDATE ".$tab_name." SET ".$new_tab_mas." = ".$info." WHERE код='".$cod."'");
      }
      else{
          for($j=0;$j<count($value1);$j++){
            $info.="'".$value1[$j]."', ";
          }
            $new_tb_rows ='';
            $tab_rows = explode(',',$tab_rows);
            for($i=0;$i<=count($tab_rows);$i++){
                $new_tb_rows.='"'.trim($tab_rows[$i]," ").'", ';
            }
            $new_tb_rows= trim($new_tb_rows,", ");
            $new_tb_rows=substr($new_tb_rows,0,-4);
            $info = trim($info,", ");
            $info = substr($info, 0, -4);
            $info = trim($info,", ");
            $vidpr = pg_query('INSERT INTO '.$tab_name.'('.$new_tb_rows.') VALUES('.$info.');');
      }
      
      if($vidpr){
          echo("well done");
      }
      else{
          echo 'INSERT INTO '.$tab_name.'('.$new_tb_rows.') VALUES('.$info.');'.'<br>'.pg_last_error().'<br>';
      }
  }
}
?>