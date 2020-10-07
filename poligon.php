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

<p id = 'teg'></p>

<script>
// $.ajax({
//   url: "jquery.php",
//   success: function(data){
//     teg.innerHTML = data;
//   }
// });
// $(document).ready(function(){
//   console.log("valerka");
// });
$.post(
  "jquery.php",          // адрес отправки запроса
  {par1:"baka",valera:"petrenko"},  // передача с запросом каких-нибудь данных
  function(data) {              
    teg.innerHTML = data;
  }
);
</script>
</body>
</html>