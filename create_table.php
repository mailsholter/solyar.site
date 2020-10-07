<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $bool = true;
    $ol =pg_connect("host=localhost port=5432 dbname=solyar17_main_bd user= 	
    solyar17_adm 	 password=kjkszpg2001 options='--client_encoding=UTF8'");
    ?>
      <form id="moya_forma" action="create_table1.php" enctype="multipart/form-data" method="post">
      <p><input name="name" type="text">назва таблиці</p>
      <input id="count" type = "hidden" name ="count" value = "echo">
      <p><input required name="table1" type="text" value="бренд"><select name="var1"><option value="character varying">character varying</option></select></p>
      <p><input required name="table2" type="text" value="модель"><select name="var2"><option value="character varying">character varying</option></select></p>
      <p><input required name="table3" type="text" value="код"><select name="var3"><option value="integer">integer</option></select></p>
      <p><input required name="table4" type="text" value="img"><select name="var4"><option value="character varying[]">character varying[]</option></select></p>
      <p><input required name="table5" type="text" value="imag"><select name="var5"><option value="character varying">character varying</option></select></p>
      <button id="plus">+</button><br>
      <input type='submit' value='Відправити'>
      </form>

    
    <script>
        
        var form = document.querySelector("#moya_forma");
        var count = document.querySelector('#count');
        // alert(forma.innerHTML);
        var cnt = 1;
        var stroka = `С
                      А
                      Ш
                      А
                      `;
        plus.onclick = function foo(){
            var strichka = stroka;
            strichka=`<input pattern="[A-Za-z0-9]" maxlength="15" minlength="3" class ="input" id = "var`+(cnt+5)+`" onkeyup="check(this.value)" name="table`+(cnt+5)+`" type="text" required placeholder="назва стовбця">
            <select name="var`+(cnt+5)+`">
            <option value="character varying[]">character varying[]</option>
            <option value="character varying">character varying</option>
            <option value="numeric">numeric</option><option value="integer">integer</option>
            </select><button onclick="baka(`+(cnt+5)+`)" type="button" class="minus">-</button>`;
            stroka=strichka;
            cnt++
            var elem = document.createElement('p');
            // elem.id ="var"+(cnt+5);
            elem.innerHTML = (strichka);
            form.insertBefore(elem,plus);
            count.value=(cnt+4);
            return false;
        };




        var minus = document.querySelectorAll(".minus");
        function baka(id){
            var idd="#var"+id;
            let iqdy = document.querySelector(idd);
            let resutl = iqdy.parentElement.remove();
        };



//         var input = document.querySelector('.input');
//         for (var i = 0; i < button.length; i++) {
//             var perevirka ="[A-Za-z0-9]";
//             button[i].addEventListener('click', function() {
//             if (input.value !== '') {
//                 console.log('не пусте');
//             }
//             else{
//                 console.log('пусте');
//             }
//   })
// }

    </script>  
    
</body>
</html>