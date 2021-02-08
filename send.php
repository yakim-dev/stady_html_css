<?php

if(
    (isset($_POST['name'])&&$_POST['name']!="")&&
    (isset($_POST['email'])&&$_POST['email']!="")&&
    (isset($_POST['message'])&&$_POST['message']!=""))

    { //Проверка отправилось ли наше поля name и не пустые ли они
        //echo "issets success";
        $to = 'yakim.oresst@gmail.com'; //Почта получателя, через запятую можно указать сколько угодно адресов
        $subject = 'Call Back!'; //Загаловок сообщения
        $msg = '
                <html>
                    <head>
                        <title>'.$subject.'</title>
                    </head>
                    <body>
                        <p>Name: '.$_POST['name'].'</p>
                        <p>E-mail: '.$_POST['email'].'</p>                        
                        <p>Message: '.$_POST['message'].'</p>                        
                    </body>
                </html>'; //Текст нащего сообщения можно использовать HTML теги
        // $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
        // $headers .= "From: Отправитель <from@example.com>\r\n"; //Наименование и почта отправителя
        mail($to, $subject, $msg); //Отправка письма с помощью функции mail
    }
?>