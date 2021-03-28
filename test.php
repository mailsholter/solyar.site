<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
#left{
    background-color: blue;
    width: 26px;
    height: 26px;
    border-radius: 15px;
    float: inline-start;
    position: relative;
    z-index:3;
}
#poloska{
    border: 1px solid black;
    width: 200px;
    height: 25px;
    border-radius: 15px;
}
#right{
    background-color: green;
    width: 26px;
    height: 26px;
    border-radius: 15px;
    float: inline-end;
    position: relative;
    z-index:3;
}
#pole{
    width: 175px;
    height: 26px;
    position: absolute;
    left:21px;
    background: blueviolet;
}
</style>
<div id='poloska'><div id = left style="left: 0px;"></div><div style="width: 175px;" id='pole'></div><div id='right' style="right: 0px;"></div></div>
<input type='text' id='vid_rah' name='vid' value='0' style="width: 50px;float: left;margin: 3px;"><input type='text' id='do_rah' name='do' value='18000' style="width: 50px;margin: 3px;">
    <p id="exit"></p>
    <button value="Refresh Page" onClick="window.location.reload();">Головне меню</button>
    <a href='povzunok.php'> повзунок</a>
<script>
    let poloska = document.querySelector('#poloska');
    let left = document.querySelector('#left');
    let right = document.querySelector('#right');
     let dovz = do_rah.value/201.33;
     let dovz1 = do_rah.value/right.offsetLeft;
    console.log(dovz1);
    left.onmousedown = function lft_p(event){
        moveAtleft(event.pageX);
        function moveAtleft(pageX) {
            let rah1 =pageX -left.offsetWidth / 2;
            console.log(rah1);
            if(rah1<200 && rah1>-1 && rah1*dovz<do_rah.value){
                pole.style.left = rah1+20 +'px';
                let wdth =pole.style.width.slice(0,-2);
                pole.style.width = right.offsetLeft - left.offsetLeft+'px';
                left.style.left = rah1 + 'px';
                vid_rah.value = rah1*dovz;
            }
        }
        function onMouseMoveleft(event) {
            moveAtleft(event.pageX);
        }
        document.addEventListener('mousemove', onMouseMoveleft);
        document.onmouseup = function() {
            document.removeEventListener('mousemove', onMouseMoveleft);
            left.onmouseup = null;
            
        }
        return false;
    }
    
    right.onmousedown = function right_p(event){
        moveAtright(event.pageX);
        function moveAtright(pageX) {
            let rah = -1 * (pageX-200 + right.offsetWidth / 2);
            // if(rah<175 && rah>-1 && 100-rah*dovz>vid_rah.value){
                right.style.right = rah + 'px';
                do_rah.value =right.offsetLeft*dovz;
                let wdth1 = pole.style.width.slice(0,-2);
                pole.style.width =  right.offsetLeft-left.offsetLeft+'px';
                console.log(right.offsetLeft);
                // console.log("do val = "+do_rah.value);
                // console.log("vidm = "+rah*dovz);
                // console.log(right.style.right);
            // }
        }
        function onMouseMoveright(event) {
            moveAtright(event.pageX);
        }
        document.addEventListener('mousemove', onMouseMoveright);

        document.onmouseup = function() {
            console.log('onmouseup');
            document.removeEventListener('mousemove', onMouseMoveright);
            right.onmouseup = null;
            
        }
        return false;
    }











    let first_form = document.createElement('form');
    first_form.innerHTML = '<a class = "type">create table</a><br><a class = "type">change smth in table</a><br><a class = "type">insert into table</a><br><a class = "type">excel to csv</a><br><a class = "type">import</a><br><a class = "type">change name</a><br><a class = "type">test mail</a><br><a href="adddel.php">add and del in table</a><br><a href="consolepgadmin.php">PgAdmin4 console</a><br><a href="chng_stat_zam.php">Змінити статус замовлення</a><br><a href="nakladni.php">Накладні</a><br><a href="hist_pokupok.php">Історія покупок</a><br><a href="pocosort.php">по чому сортувати</a>';
    document.body.append(first_form);
    let variants = document.querySelectorAll(".type");
    let json_data = undefined;
    let tab_rows ='';
    let tab_value='';
    let cufry ='';
    let first_part = {
        case:function(x){
            switch(x){
                case "insert into table":
                    first_form.remove();
                    let form = document.createElement('form');
                    form.id = "forma";
                    var table_name = new XMLHttpRequest();
                    table_name.open('POST','tbb_namee.php',false);
                    let body = "val=1";
                    table_name.addEventListener('readystatechange', function(){
                        if ((table_name.readyState==4) && (table_name.status==200)){
                            form.innerHTML =  table_name.responseText;
                            document_scripts.vybir();
                        }
                    });
                    table_name.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    table_name.send(body);
                    document.body.prepend(form);
                    forma.insertAdjacentHTML('beforeend', '<input id ="knopka" onclick = "knpk()" type = "submit"></input>');
                    break;
                case "create table":
                    first_form.remove();
                    exit.innerHTML = '<form id="moya_forma" action ="create_table1.php" enctype="multipart/form-data" method="post"><p><input name="name" type="text">назва таблиці</p><input id="count" type = "hidden" name ="count" value = "echo"><p><input required name="table1" type="text" value="бренд"><select name="var1"><option value="character varying">character varying</option></select></p><p><input required name="table2" type="text" value="модель"><select name="var2"><option value="character varying">character varying</option></select></p><p><input required name="table3" type="text" value="код"><select name="var3"><option value="integer">integer</option></select></p><p><input required name="table4" type="text" value="img"><select name="var4"><option value="character varying[]">character varying[]</option></select></p><p><input required name="table5" type="text" value="imag"><select name="var5"><option value="character varying">character varying</option></select></p><button id="plus">+</button><br><input id="crtbt" type = "submit" value="Відправити"></form>';
                    var kkk = document.querySelector("#plus");
                    kkk.onclick = function pls(){
                        document_scripts.create();
                    }
                    document_scripts.create_but();
                    break;
                case "change name":
                    first_form.remove();
                    let form1 = document.createElement('form');
                    form1.id = "forma";
                    var table_name1 = new XMLHttpRequest();
                    table_name1.open('POST','tbb_namee.php',false);
                    let body1 = "val=1";
                    table_name1.addEventListener('readystatechange', function(){
                        if ((table_name1.readyState==4) && (table_name1.status==200)){
                            form1.innerHTML =  table_name1.responseText;
                            document_scripts.vybir();
                        }
                    });
                    table_name1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    table_name1.send(body1);
                    document.body.prepend(form1);
                    forma.insertAdjacentHTML('beforeend', '<input id ="knopka" onclick = "knpk1()" type = "submit"></input>');
                    break;
                case "excel to csv":
                    first_form.remove();
                    let form2 = document.createElement('form');
                    form2.id = "forma";
                    var table_name2 = new XMLHttpRequest();
                    table_name2.open('POST','tbb_namee.php',false);
                    let body2 = "val=1";
                    table_name2.addEventListener('readystatechange', function(){
                        if ((table_name2.readyState==4) && (table_name2.status==200)){
                            form2.innerHTML =  table_name2.responseText;
                            document_scripts.vybir();
                        }
                    });
                    table_name2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    table_name2.send(body2);
                    document.body.prepend(form2);
                    forma.insertAdjacentHTML('beforeend', '<input id ="knopka" onclick = "knpk2()" type = "submit"></input>');
                    break;
                case "change smth in table":
                    window.location.href = 'chngsmth.php';
                    break;
                case "add and del in table":
                    first_form.remove();
                    let formaa = document.createElement('form');
                    formaa.id = "forma";
                    var table_name = new XMLHttpRequest();
                    table_name.open('POST','tbb_namee.php',false);
                    let tlo = "val=1";
                    table_name.addEventListener('readystatechange', function(){
                        if ((table_name.readyState==4) && (table_name.status==200)){
                            formaa.innerHTML =  table_name.responseText;
                            document_scripts.vybir();
                        }
                    });
                    table_name.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    table_name.send(tlo);
                    document.body.prepend(formaa);
                    formaa.insertAdjacentHTML('beforeend', '<input id ="knopka" onclick = "knpk4()" type = "submit"></input>');
                    break;
            }
        }
    }
    let second_part = {
        insert:function(){
            forma.remove();
            let conect = new XMLHttpRequest();
            let body ="val1=" + tab_name;
            conect.open('POST','ins_tab_js.php',false);
            conect.addEventListener('readystatechange', function(){
                if ((conect.readyState==4) && (conect.status==200)){
                    exit.innerHTML =  conect.responseText;
                    table_name.value = tab_name;
                }
            });
            conect.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            conect.send(body);
        },
        change_name:function(){
            forma.remove();
            exit.innerHTML = 'Назва таблиці:' + tab_name+"<br><p>Введіть нову назву:</p>";
            exit.innerHTML += '<form action=""><input id = "chng_text" type="text"><input id = "chng" type="submit"></form>';
            document_scripts.change_name();
            
        },
        piny:function(){
            forma.remove();
            let pin = new XMLHttpRequest();
            let bod = "val=1&tab=" + tab_name;
            pin.open('POST','exceltocsv.php',false);
            pin.addEventListener('readystatechange', function(){
                if ((pin.readyState==4) && (pin.status==200)){
                    exit.innerHTML =  pin.responseText;
                }
            });
            pin.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            pin.send(bod);
        },
        csv:function(){
            exit.innerHTML = '';
            let zied = new XMLHttpRequest();
            let txt ="val=2&doc=0"; /////////ДОКУМЕНТ
            zied.open('POST','exceltocsv.php',false);
            zied.addEventListener('readystatechange', function(){
                if ((zied.readyState==4) && (zied.status==200)){
                    exit.innerHTML =  zied.responseText;
                }
            });
            zied.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            zied.send(txt);
        },
        adddel:function(){
            exit.innerHTML = '';
            console.log(tab_name);
        }
    }
    var strichka = undefined; //для insert
    var cnt = 1;
    let document_scripts = {
        create:function(){
            let form = document.querySelector("#moya_forma");
            strichka=`<input maxlength="15" minlength="3" class ="input" id = "var`+(cnt+5)+`" name="table`+(cnt+5)+`" type="text" required placeholder="назва стовбця">
            <select name="var`+(cnt+5)+`">
            <option value="character varying[]">character varying[]</option>
            <option value="character varying">character varying</option>
            <option value="numeric">numeric</option><option value="integer">integer</option>
            </select><button onclick="baka(`+(cnt+5)+`)" type="button" class="minus">-</button>`;
            stroka=strichka;
            cnt++
            var elem = document.createElement('p');
            elem.innerHTML = (strichka);
            form.insertBefore(elem,plus);
            count.value=(cnt+4);
        },
        vybir:function(){
            let t = document.querySelectorAll(".ttt");
            for(let elem of t){
                elem.onclick = function bk(){
                    tab_name = this.value;
                }
            }
            
        },
        create_but:function(){
            let bttn = document.querySelector("#crtbt");
            let form = document.querySelector("#moya_forma");
            bttn.onclick = function vall(){
                let elem = document.createElement('input');
                elem.type = "hidden";
                elem.value = cnt + 4;
                alert(cnt);
                elem.name = "count";
                form.insertBefore(elem,plus);
            }
        },
        change_name:function(){
            chng.onclick = function chan(){
            let chng_text = document.querySelector('#chng_text');
            let con = new XMLHttpRequest();
            let bod ="val1=" + tab_name + "&val2=" + chng_text.value;
            con.open('POST','chngname.php',false);
            con.addEventListener('readystatechange', function(){
                if ((con.readyState==4) && (con.status==200)){
                    exit.innerHTML = '';
                    exit.innerHTML = con.responseText;
                }
            });
            con.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            con.send(bod);
            }
        },
        excel:function(){
            subm.onclick = function(){
                let fl = new XMLHttpRequest();
                let doc = "val1="+flexcel.value;
                fl.open('POST','exceltocsv.php',false);
                fl.addEventListener('readystatechange', function(){
                if ((fl.readyState==4) && (fl.status==200)){
                    alert(fl.responseText);
                }
            });
            fl.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            fl.send(doc);
            }
        },
        cvsp2:function(){
            exit.innerHTML ='';
            let new_tab_val ='';
            for(let j = 0;j<json_data['Прайс'].length;j++){
                numeracia = 0;
                for (let value of Object.values(json_data['Прайс'][j])){
                    for (var i = 0; i < cufry.length; i++) { 
                        if (cufry[i] == numeracia) {
                            new_tab_val+=value+"% ";
                            console.log(value);
                        }
                    }
                    numeracia++
                }
                tab_value=new_tab_val.trim();
                console.log(new_tab_val);
                let data = newsort+"|"+ new_tab_val;
                let tab_vidpr = new XMLHttpRequest();
                let danni = "val="+data+"&tab="+tab_name+"&numb="+nn;
                tab_vidpr.open('POST','exceltocsv.php',false);
                tab_vidpr.addEventListener('readystatechange', function(){
                if ((tab_vidpr.readyState==4) && (tab_vidpr.status==200)){
                    exit.innerHTML+="<p>"+tab_vidpr.responseText+"</p>";
                }
            });
            tab_vidpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            tab_vidpr.send(danni);
            tab_value='';
            new_tab_val ='';
            }
        }
    }
    
    


    
    
    
    
    
    /////////////////////////////////////////////////////////////////////////////////
    
    
    var type = document.querySelectorAll('.type');
    for(let elem of type){
        elem.onclick = function fp(){
            first_part.case(elem.innerHTML);
            let t = document.querySelectorAll(".ttt");
            function baka(){
                for(let elem of t){
                    elem.onclick = function bk(){
                        tab_name = this.value;
                    }
                }
            }
        }
    }
    var tab_name = undefined;
    function baka(){
        let t = document.querySelectorAll(".ttt");
        for(let elem of t){
            elem.onclick = function bk(){
                tab_name = this.value;
            }
        }
    }
    function knpk(){
        alert("ty tut");
        alert(tab_name);
        second_part.insert();
    }
    function knpk1(){
        alert("ty tut");
        alert(tab_name);
        second_part.change_name();
    }
    function knpk2(){
        second_part.piny();
    }
    function knpk3(){
        document_scripts.cvsp2()
    }
    function knpk4(){
        second_part.adddel();
    }
    
    let f = undefined;
    let t1='';
    let pidbirka = "";
    let map = new Map();
    let nn = 0;
    function knipka(){
        cnt = count.innerHTML - 1;
        while(cnt >= 0){
            let n = "#numb"+cnt;
            let t = "#tab"+cnt;
            f = document.querySelector(n);
            t1 = document.querySelector(t);
            if(f.value!=""){
                pidbirka += f.value+"|";
                tab_rows+=t1.innerHTML+", ";
                map.set(f.value,t1.innerHTML);
            }
            cnt--;
        }
    }
    let newsort='';
    let numeracia = 0;
    let table = '<table border="1">';
    function readFile(input) {
        let file = input.files[0];
        let reader = new FileReader();
        reader.readAsText(file);
        reader.onload = function() {
            tab_rows =tab_rows.trim();
            tab_rows =tab_rows.substring(0, tab_rows.length - 1);
            exit.innerHTML = '';
            json_data = JSON.parse(reader.result);
            pidbirka = pidbirka.trim();
            pidbirka = pidbirka.substring(0, pidbirka.length - 1);
            cufry = pidbirka.split("|");
            var n = cufry.length;
            for(let j =n;j>0;j--){
                for(let i = 0;i<n-1;i++){
                    if(parseInt(cufry[i])>parseInt(cufry[i+1])){
                        let t = cufry[i];
                        cufry[i]=cufry[i+1];
                        cufry[i+1]=t;
                    }
                }
            }
    
            // cufry = cufry.reverse();
            // alert(cufry);
            // console.log(cufry);
            let spl = tab_rows.split(',');
            table += '<tr>';
            for (let elem of cufry){
                table+='<th>'+map.get(elem)+'</th>';
                newsort+=map.get(elem)+", "
                if(map.get(elem) == 'код'){
                    nn = elem;
                }
            }
            table += '</tr>';
            // console.log(json_data);
            console.log(pidbirka);
            for(let j = 0;j<json_data['Прайс'].length;j++){
                numeracia = 0; 
                table += '<tr>';
                for (let value of Object.values(json_data['Прайс'][j])){
                    for (var i = 0; i < cufry.length; i++) { 
                        if (cufry[i] == numeracia) {
                            tab_value+=value+", ";
                            table+='<td>'+value+'</td>';
                            break;
                        }
                    }
                    numeracia++;
                }
                table+= '</tr>';
            }
            table+='</table>';
            newsort =newsort.trim();
            newsort =newsort.substring(0, newsort.length - 1);
            table+='<button type="button" onclick="knpk3()">Надіслати</button>'
        // console.log(table);
        exit.insertAdjacentHTML('afterbegin', table);
        };
        reader.onerror = function() {
            console.log(reader.error);
        };
        
}

    // function baka(id){     ///мінус   /////////////змінити назву функції
    //         var idd="#var"+id;
    //         let iqdy = document.querySelector(idd);
    //         let resutl = iqdy.parentElement.remove();
    // };

</script>
</body>
</html>