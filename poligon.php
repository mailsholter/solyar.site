<!DOCTYPE html>
<html lang="ru">
<head>
<script src="jquery-3.5.1.js"></script>
  <meta charset="utf-8">
  <title>jQuery</title>
</head>
<body>
<style>

</style>
<h1>Відправка смс</h1>
<p id ='stat'>~</p>
<script>

$.post(
   header('Content-Type: application/x-www-form-urlencoded');
  "https://api.turbosms.ua/message/send.json",  // адрес отправки запроса
   token="0d80d2e4f1e40d4454e6f57706c76cddb2588c15",
   { "recipients":[
      "380983322149"
      "380974886465"
   ],
   "sms":{
      "sender": "TurboSMS",
      "text": "TurboSMS приветствует Вас!"
   }
   }
);
</script>
</body>
</html>