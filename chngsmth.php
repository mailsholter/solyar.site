<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change something in table</title>
</head>
<body>
    <p id='exit'></p>
    <script>
    //////////////////////
    let tab_name= undefined;
    let nu = undefined;
    let table = undefined;
    //////////////////////
    let p = document.querySelector("#exit");
    let obj = {
        vybir:function(){
            let t = document.querySelectorAll(".ttt");
            for(let elem of t){
                elem.onclick = function bk(){
                    tab_name = this.value;
                }
            }
        },
        sec_part:function(){
            form.remove();
            exit.innerHTML = tab_name;
            let tablicya = new XMLHttpRequest();
            tablicya.open('POST','pos.php',false);
            let tilo = "table_name="+tab_name;
            tablicya.addEventListener('readystatechange', function(){
                if ((tablicya.readyState==4) && (tablicya.status==200)){
                    exit.innerHTML =  tablicya.responseText;
                    tablica.style.width = "90%";
                    exit.innerHTML+= "<button onclick='exp()'>Відправити</button>"
                }
            });
            tablicya.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            tablicya.send(tilo);
        },
        insert:function(){
            let conn = document.getElementById(nu);
            let data = nu.innerHTML;
            nu.innerHTML ='<input type="text" value="'+data+'">';
            nu.addEventListener('keydown', function(e) {
                if (e.keyCode === 13) {
                    nu.innerHTML = nu.childNodes[0].value;
                }
                else if(e.keyCode === 27){
                    nu.innerHTML = data;
                }
            });
        }
    }
    let form = document.createElement('form');
    form.id = "forma";
    var table_name = new XMLHttpRequest();
    table_name.open('POST','tbb_namee.php',false);
    let body = "val=1";
    table_name.addEventListener('readystatechange', function(){
        if ((table_name.readyState==4) && (table_name.status==200)){
            form.innerHTML =  table_name.responseText;
            obj.vybir();
        }
    });
    table_name.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    table_name.send(body);
    document.body.prepend(form);
    forma.insertAdjacentHTML('beforeend', '<input id ="knopka" value="submit" onclick = "knpk()" type = "button">');
    function baka(){
        let t = document.querySelectorAll(".ttt");
        for(let elem of t){
            elem.onclick = function bk(){
                tab_name = this.value;
            }
        }
    }
    function knpk(){
        obj.sec_part();
    }
    function makeinput(x){
        table = document.querySelector('#tablica');
        if(nu != x){
            nu =x;
            obj.insert();
        }

    }
    function exp(){
        let del = new XMLHttpRequest();
        del.open('POST',"deltable.php", false);
        let delet = "tab_name="+tab_name;
        del.addEventListener('readystatechange', function(){
            if ((del.readyState==4) && (del.status==200)){
                alert(del.responseText);
            }
        });
        del.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        del.send(delet);
        let booling = false;
        let tab_row = "";
        let stroka = "";
        for(let i= 0;i<tablica.childNodes.length;i++){
            stroka = "";
            for(let j =0;j<tablica.childNodes[i].childNodes.length;j++){
                if(i == 0){
                    tab_row+=tablica.childNodes[i].childNodes[j].innerHTML+", ";
                    booling = true;
                }else{
                    stroka+="'"+tablica.childNodes[i].childNodes[j].innerHTML+"', "
                }
            }
            stroka = stroka.slice(0, -2);
            if(booling){
                tab_row = tab_row.slice(0, -2);
            }
            booling = false;
            let conect = new XMLHttpRequest();
            conect.open('POST','updatetabb.php',false);
            let bodyy = "tab_row="+tab_row+"&str="+stroka+"&tab_name="+tab_name;
            conect.addEventListener('readystatechange', function(){
                if ((conect.readyState==4) && (conect.status==200)){
                    exit.innerHTML+=  conect.responseText+"<br>";
                }
            });
            conect.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            conect.send(bodyy);
        }
       
    }
    </script>
</body>
</html>