<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $ol =pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user= 	
    solyar17_adm 	 password=kjkszpg2001 options='--client_encoding=UTF8'");
    session_start();
        $a= "CREATE TABLE ".$_POST['name']."(";
        $cn=$_POST['count'];
        for ($i=1;$i<=$cn;$i++){
            if(isset($_POST["table$i"])){
            if($i==$cn){
                $a.=$_POST["table$i"];
                if($_POST["var$i"]=="character varying"){
                    $a.=" ".$_POST["var$i"]."(200)";
                }
                else{
                    $a.=" ".$_POST["var$i"];
                }
            }
            else{
                $a.=$_POST["table$i"];
                if($_POST["var$i"]=="character varying"){
                    $a.=" ".$_POST["var$i"]."(200),";
                }
                else{
                    $a.=" ".$_POST["var$i"].", ";
                }
            }
        }
        }
        $a.=");";
        echo $a;
        $z=pg_query($a);
        if($z){
            echo "Таблиця успішно створена";
        }
        else{
            echo "Помилка!";
        }
    ?>

      </form>  
      </body>
     </html>
     
</body>
</html>