var http = require("http"); //імпортуємо http
http.createServer(function(request,response){ // createServer створює сервер
     
    response.end("Hello NodeJS!");  // відправляємо
     
}).listen(3000, "127.0.0.1",function(){ // Сервер працює з портом 3000 за адресою 127.0.0.1, третій параметр то функція яка запускається на початку прослуховування
    console.log("Сервер начал прослушивание запросов на порту 3000");
});