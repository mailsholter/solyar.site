<?php
    $connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");

session_start();
$_SESSION['table'] = $_POST['id'];
            if((isset($_POST['inf']) && $_POST['inf']!='' && isset($_POST['price'])) || isset($_POST['price'])){
                // echo $_POST['inf'];
                $inf = $_POST['inf'];
                $new_st = '';
                $old_st = str_split($inf);
                for($x=0;$x<count($old_st);$x++){
                    if($old_st[$x] == "_"){
                        $new_st.=" ";
                    }else{
                        $new_st.=$old_st[$x];
                    }
                }
                // echo $new_st."<br>";
                $inf = explode(',', $new_st);
                // var_dump($inf);
                $new_inf = '';
                $ss = '';
                $ss1 = '';
                $vid = '';
                $do = '';
                $pr = explode(",",$_POST['price']);
                $vid = $pr[0];
                $do = $pr[1];
                for($i=0;$i<count($inf);$i++){
                    $ss = explode('=', $inf[$i]);
                    echo $ss[0]."<br>";
                    echo $ss[1]."<br>";
                    if($ss1 == $ss[0]){
                        $new_inf.=" or \"".$ss[0]."\"='".$ss[1]."'";
                    }else{
                        $new_inf.=" and \"".$ss[0]."\"='".$ss[1]."'";
                    }
                    // $new_inf.=" and ".$ss[0]."='".$ss[1]."'"
                    $ss1 = $ss[0];
                }
                $new_inf = substr($new_inf,4,strlen($new_inf));
                $cna = "and ціна BETWEEN $vid AND $do";
                $arrp = str_split($new_inf);
                if(count($arrp)<=6){
                    $new_inf = '';
                }
                if($new_inf == ''){
                    $cna = substr($cna,4,strlen($cna));
                }
                $tovary = pg_query("select imag, виробник, модель, ціна, код, кількість from ".$_SESSION['table']." where $new_inf $cna;");
                // echo $new_inf."<br>";
                // echo $cna."<br>";
                echo "select imag, виробник, модель, ціна, код, кількість from ".$_SESSION['table']." where $new_inf $cna;";
            }
            else{
                $tovary = pg_query("select imag, виробник, модель, ціна, код, кількість from ".$_SESSION['table'].";");
            }
            
            while($val = pg_fetch_row($tovary)){
                if($val[5]!=0){
                    echo '<div class = "tovar">';
                    echo '<a href = "storinka_tovaru.php?id='.$val[4].'">';
                    if($val[0]!=""){
                        echo "<img class = 'img' src=".$val[0].">";
                    }else{
                        echo "<img class = 'img' src='noimg.png'>";
                    }
                    echo "<c>".$val[1]." </c><br>";
                    echo "<c>".$val[2]."</c>"."<br>";
                    echo "<c style ='font-size:xx-large;'>".$val[3]." ₴</c>"."<br>";
                    echo "</a>";
                    echo "<button class='buy_bttn'>Купити</button>";
                    echo '<a href = "storinka_tovaru.php?id='.$val[4].'">';
                    echo "<c class='codde' code='".$val[4]."'>код: ".$val[4]."</c>";
                    echo '</a>';
                    echo '</div>';
                }else{
                    
                    echo '<div class = "tovar">';
                    echo '<a href = "storinka_tovaru.php?id='.$val[4].'">';
                    if($val[0]!=""){
                        echo "<img class = 'img' src=".$val[0].">";
                    }else{
                        echo "<img class = 'img' src='noimg.png'>";
                    }
                    echo "<p>".$val[1]." </p>";
                    echo "<c>".$val[2]."</c>"."<br>";
                    echo "<c style ='font-size:xx-large;'>".$val[3]." ₴</c>"."<br>";
                    echo "</a>";
                    echo "<button class='buy_bttn'>Замовити</button>";
                    echo '<a href = "storinka_tovaru.php?id='.$val[4].'">';
                    echo "<c class='codde' code='".$val[4]."'>код: ".$val[4]."</c>";
                    echo '</a>';
                    echo '</div>';
                }
                
            }
?>