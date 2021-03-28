<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <style>
    body {
      margin: 0;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #212529;
      text-align: left;
      background-color: #fff;
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    .toast {
      max-width: 350px;
      overflow: hidden;
      font-size: 0.875rem;
      background-color: rgba(255, 255, 255, 0.5);
      background-clip: padding-box;
      border: 1px solid rgba(0, 0, 0, 0.1);
      border-radius: 0.25rem;
      box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(10px);
      display: none;
      position: relative;
      padding: 0.75rem 2rem 0.75rem 0.75rem;
      overflow-wrap: break-word;
      word-break: break-word;
    }

    .toast:not(:last-child) {
      margin-bottom: 0.75rem;
    }

    .toast_show {
      display: block;
    }

    .toast__close {
      position: absolute;
      top: 0;
      right: 10px;
      padding: 0;
      background-color: transparent;
      border: 0;
      cursor: pointer;
      float: right;
      font-size: 1.5rem;
      font-weight: 700;
      line-height: 1;
      color: #000;
      text-shadow: 0 1px 0 #fff;
      opacity: 0.6;
      margin: 0;
      font-family: inherit;
      border-radius: 0;
    }

    input:not([type="checkbox"]) {
      display: block;
      font-size: 1rem;
      margin-bottom: .5rem;
    }
    input:invalid {
    border: 2px solid red;
    margin: 5px;
}
input:valid {
    border: 2px solid green;
    margin: 5px;
}
    input{
        left: 25%;
        /*position: relative;*/
    }
    #main{
        position: absolute;
        left: 42%;
        height: 90%;
        width: 20%;
        border:2px solid black;
    }
    #reg_bttn{
        position: relative;
        height: 10%;
        width: 40%;
        left: 30%;
        top: 3%;
    }
    </style>
    <div id='main'>
        <fieldset><legend>Мобільний номер</legend><input  class='danni'type='text' placeholder="380" name='telefon' pattern ="(\380|0)\d{9}" required></fieldset>
        <fieldset><legend>Пароль</legend><input  class='danni' type='password' minlength="6" name='password' maxlength="14" pattern ="[A-Za-z0-9]+"></fieldset>
        <fieldset><legend>Імя</legend><input type='text' class='danni' minlength="4" name='name' maxlength="10" pattern ="[A-Za-zа-щА-ЩЬьЮюЯяЇїІіЄєҐґ]+" required></fieldset>
        <fieldset><legend>Фамілія</legend><input type='text' class='danni' minlength="3" name ='surname' maxlength="20" pattern ="[A-Za-zа-щА-ЩЬьЮюЯяЇїІіЄєҐґ]+" required></fieldset>
        <fieldset><legend>Населений пункт</legend><input class='danni' type='text' minlength="5" name='selo' maxlength="20" pattern ="[A-Za-zа-щА-ЩЬьЮюЯяЇїІіЄєҐґ]+" required></fieldset>
        <fieldset><legend>Вулиця</legend><input type='text' class='danni' name='street' minlength="4" maxlength="25" pattern ="[A-Za-zа-щА-ЩЬьЮюЯяЇїІіЄєҐґ]+" required></fieldset>
        <fieldset><legend>№ будинку</legend><input type='text' class='danni' name='budynok' minlength="1" pattern ="[0-9]+"></fieldset>
        <button id='reg_bttn' type='button'>Зареєструватися</button>
    </div>
<script>
let main = document.querySelector('#main');
let dan = document.querySelectorAll('.danni');
function check(login) {
    var zapyt= new XMLHttpRequest();
    var kkd= "lg="+login;
    zapyt.open('POST','dynam_perevirka.php',false);
    zapyt.addEventListener('readystatechange', function(){
        if ((zapyt.readyState==4) && (zapyt.status==200)){
            if(zapyt.responseText == 1){
                log.style.border = "2px solid red";
                log.style.margin = "5px";
            }else{
                log.style.border = "2px solid green";
                log.style.margin = "5px";
            }
        }
    });
    zapyt.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    zapyt.send(kkd);
}
reg_bttn.onclick = function ba(){
    let t = true;
    for(let elem of dan){
        if(elem.value.length == 0 || elem.validity.valid == false){
            t = false;
        }
    }
    if(t){
        let inf = '';
        for(let elem of dan){
            inf+=elem.value+"/";
        }
        let prerg = new XMLHttpRequest();
        let phone = inf.split('/');
        let phdanni = 'phone_number='+phone[0];
        console.log(phdanni);
        prerg.open('POST','reg_istration_ajax.php',false);
        prerg.addEventListener('readystatechange', function(){
            if ((prerg.readyState==4) && (prerg.status==200)){
                main.innerHTML = '<h1>ВВЕДІТЬ КОД З СМСКИ</h1><br><input id="code" type="text"><br><input value="підтвердити" type="button" id="kncreg">';
                let knreg = document.querySelector('#kncreg');
                knreg.onclick = function brr(){
                    let code = document.querySelector('#code');
                    let pass =prerg.responseText.slice(-6);
                    if(code.value == pass){
                        let registr = new XMLHttpRequest();
                        let danni = "information="+inf;
                        registr.open('POST','reg_istration_ajax1.php',false);
                        registr.addEventListener('readystatechange', function(){
                            if ((registr.readyState==4) && (registr.status==200)){
                                console.log(registr.responseText);
                                if(registr.responseText=='ok'){
                                    Toast.add({
                                        text: 'Ви успішно зареєстровані!',
                                        color: '#8DD17D',
                                        autohide: true,
                                        delay: parseInt("5000")
                                    });
                                    setTimeout(() => window.location.href = "https://solyar.site/", 5500);
                                }else{
                                    Toast.add({
                                    text: 'Спробуйте ще раз',
                                    color: '#E6B540',
                                    autohide: true,
                                    delay: parseInt("5000")
                                    });
                                }
                            }
                        });
                        registr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        registr.send(danni);
                    }else{
                        alert('Введіть правильні данні');
                    }
                }
            }
        })
        prerg.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        prerg.send(phdanni);
    }else{
        Toast.add({
        text: 'Заповніть всі поля правильно!',
        color: '#FC5359',
        autohide: true,
        delay: parseInt("5000")
      });
    }
}


var Toast = function (element, config) {
      var
        _this = this,
        _element = element,
        _config = {
          autohide: true,
          delay: 5000
        };
      for (var prop in config) {
        _config[prop] = config[prop];
      }
      Object.defineProperty(this, 'element', {
        get: function () {
          return _element;
        }
      });
      Object.defineProperty(this, 'config', {
        get: function () {
          return _config;
        }
      });
      _element.addEventListener('click', function (e) {
        if (e.target.classList.contains('toast__close')) {
          _this.hide();
        }
      });
    };

    Toast.prototype = {
      show: function () {
        var _this = this;
        this.element.classList.add('toast_show');
        if (this.config.autohide) {
          setTimeout(function () {
            _this.hide();
          }, this.config.delay)
        }
      },
      hide: function () {
        var event = new CustomEvent('hidden.toast', { detail: { toast: this.element } });
        this.element.classList.remove('toast_show');
        document.dispatchEvent(event);
      }
    };

    Toast.create = function (text, color) {
      var
        fragment = document.createDocumentFragment(),
        toast = document.createElement('div'),
        toastClose = document.createElement('button');
      toast.classList.add('toast');
      toast.style.backgroundColor = 'rgba(' + parseInt(color.substr(1, 2), 16) + ',' + parseInt(color.substr(3, 2), 16) + ',' + parseInt(color.substr(5, 2), 16) + ',0.5)';
      toast.textContent = text;
      toastClose.classList.add('toast__close');
      toastClose.setAttribute('type', 'button');
      toastClose.textContent = '×';
      toast.appendChild(toastClose);
      fragment.appendChild(toast);
      return fragment;
    };

    Toast.add = function (params) {
      var config = {
        header: 'Название заголовка',
        text: 'Текст сообщения...',
        color: '#ffffff',
        autohide: true,
        delay: 5000
      };
      if (params !== undefined) {
        for (var item in params) {
          config[item] = params[item];
        }
      }
      if (!document.querySelector('.toasts')) {
        var container = document.createElement('div');
        container.classList.add('toasts');
        container.style.cssText = 'position: fixed; top: 15px; right: 15px; width: 250px;';
        document.body.appendChild(container);
      }
      document.querySelector('.toasts').appendChild(Toast.create(config.text, config.color));
      var toasts = document.querySelectorAll('.toast');
      var toast = new Toast(toasts[toasts.length - 1], { autohide: config.autohide, delay: config.delay });
      toast.show();
      return toast;
    };

    document.addEventListener('hidden.toast', function (e) {
      var element = e.detail.toast;
      if (element) {
        element.parentNode.removeChild(element);
      }
    });

    </script>
</body>
</html>