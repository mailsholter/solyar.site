    <?php
$connect= pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user=solyar17  password=n6v0@127uw6 options='--client_encoding=UTF8'");
if(isset($_POST['login']) && isset($_POST['password'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $zap = pg_query("select корзина from покупці where phone_number = '".$login."' and password = '".$password."';");
    $korzyna = pg_fetch_row($zap);
    $korzyna =explode(",",$korzyna[0]);
    $new_korzyna = '';
    for($i = 0;$i<count($korzyna);$i++){
        $v = explode(":",$korzyna[$i]);
        $code = $v[0];
        $kilk = $v[1];
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
        $tovar = pg_query("select виробник, модель, ціна, код, imag, кількість from ".$tbmane." where код='".$code."';");
        $tovar = pg_fetch_row($tovar);
        if($tovar[4] != ''){
            continue;
        }else{
            $tovar[4] = 'noimg.png';
        }
        if($tovar[5] == 0){
            $kilk = abs($kilk);
            $div = "<div class = 'plytki'><div class = 'photo'><img class='img' src = '".$tovar[4]."'></div><div class='inf'><c style='color: cadetblue;'>ПІД ЗАМОВЛЕННЯ (враховується тільки 10% від ціни)</c><p>$tovar[0]  $tovar[1]</p><p price='".intval($tovar[2])*0.1."'>Ціна: $tovar[2]</p><p code = '".$tovar[3]."'>Код: $tovar[3]</p></div><div class = 'rahunok'><input type='button' class='plus' value='+'><p class='kllkk'>$kilk</p><input type='button' class='minus' value = '-'></div><button class='close'>x</button></div>";
            $kilk = 0;
        }elseif($kilk>$tovar[5]){
            $div = "<div class = 'plytki'><div class = 'photo'><img class='img' src = '".$tovar[4]."'></div><div class='inf'><c style='color: red;'>Такої кількості одиниць товару немає на складі. Кількість доступних одиниць:$tovar[5];</c><p>$tovar[0]  $tovar[1]</p><p price='".$tovar[2]."'>Ціна: $tovar[2]</p><p code = '".$tovar[3]."'>Код: $tovar[3]</p></div><div class = 'rahunok'><input type='button' class='plus' value='+'><p class='kllkk'>1</p><input type='button' class='minus' value = '-'></div><button class='close'>x</button></div>";
            $kilk = 1;
            
        }
        else{
            $div = "<div class = 'plytki'><div class = 'photo'><img class='img' src = '".$tovar[4]."'></div><div class='inf'><p>$tovar[0]  $tovar[1]</p><p price='".$tovar[2]."'>Ціна: $tovar[2]</p><p code = '".$tovar[3]."'>Код: $tovar[3]</p></div><div class = 'rahunok'><input type='button' class='plus' value='+'><p class='kllkk'>1</p><input type='button' class='minus' value = '-'></div><button class='close'>x</button></div>";   
        }
        if($tovar[0] ==''){
            continue;
        }else{
            echo $div;
        }
        $new_korzyna.=$code.':'.$kilk.',';
    }
    $upd = pg_query("update покупці set корзина='".$new_korzyna."' where login = '".$login."' and password = '".$password."';");
}
else{
    $danni = $_POST['danni'];
    $danni = trim($danni,",");
    $danni = explode(",",$danni);
    for($i = 0;$i<count($danni);$i++){
        $inf = explode(":",$danni[$i]);
        $inf1 = $inf[0];  ///КОД
        $inf2 = $inf[1]; ///КІЛЬКІСТЬ
        $table_n = pg_query("SELECT table_name FROM information_schema.tables WHERE table_schema NOT IN ('information_schema','pg_catalog');"); /////Імена всіх таблиць
        while($m=pg_fetch_row($table_n)){
            $search=pg_query("select виробник from $m[0] where код = $inf1");
            if(pg_fetch_array($search)!=""){
                $tb=$m[0];
                break;
            }
            else{
                continue;
            }
        }
        $poshuk = pg_query("select виробник, модель, ціна, код, imag, кількість from ".$tb." where код='".$inf1."';");
        $poshuk = pg_fetch_row($poshuk);
        
        if($poshuk[5] == 0){
            $inf2 = abs($inf2);
            $div1 = "<div class = 'plytki'><div class = 'photo'><img class='img' src = '".$poshuk[4]."'></div><div class='inf'><c style='color: cadetblue;'>ПІД ЗАМОВЛЕННЯ (враховується тільки 10% від ціни)</c><p>$poshuk[0]  $poshuk[1]</p><p price='".intval($poshuk[2])*0.1."'>Ціна: $poshuk[2]</p><p code = '".$poshuk[3]."'>Код: $poshuk[3]</p></div><div class = 'rahunok'><input type='button' class='plus' value='+'><p class='kllkk'>$inf2</p><input type='button' class='minus' value = '-'></div><button class='close'>x</button></div>";
        }elseif($inf2>$poshuk[5]){
            $div1 = "<div class = 'plytki'><div class = 'photo'><img class='img' src = '".$poshuk[4]."'></div><div class='inf'><c style='color: red;'>Такої кількості одиниць товару немає на складі. Кількість доступних одиниць:$poshuk[5];</c><p>$poshuk[0]  $poshuk[1]</p><p price='".$poshuk[2]."'>Ціна: $poshuk[2]</p><p code = '".$poshuk[3]."'>Код: $poshuk[3]</p></div><div class = 'rahunok'><input type='button' class='plus' value='+'><p class='kllkk'>1</p><input type='button' class='minus' value = '-'></div><button class='close'>x</button></div>";
        }else{
            $inf2 = abs($inf2);
            $div1 = "<div class = 'plytki'><div class = 'photo'><img class='img' src = '".$poshuk[4]."'></div><div class='inf'><c></c><p>$poshuk[0]  $poshuk[1]</p><p price='".$poshuk[2]."'>Ціна: $poshuk[2]</p><p code = '".$poshuk[3]."'>Код: $poshuk[3]</p></div><div class = 'rahunok'><input type='button' class='plus' value='+'><p class='kllkk'>$inf2</p><input type='button' class='minus' value = '-'></div><button class='close'>x</button></div>";
        }
        if($poshuk[0] ==''){
            continue;
        }else{
            echo $div1;
        }
    }
}

?>