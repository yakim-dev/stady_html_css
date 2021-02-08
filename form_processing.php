<?php
/* Осуществляем проверку вводимых данных и их защиту от враждебных 
скриптов */
$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
//$tema = htmlspecialchars($_POST["tema"]);
$message = htmlspecialchars($_POST["message"]);
/* Устанавливаем e-mail адресата */
$myemail = "order@cars-parts-services.com";
/* Проверяем заполнены ли обязательные поля ввода, используя check_input 
функцию */
$name = check_input($_POST["name"], "");
//$tema = check_input($_POST["tema"], "Укажите тему сообщения!");
$email = check_input($_POST["email"], "");
$message = check_input($_POST["message"], "");
/* Проверяем правильно ли записан e-mail */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("<br /> Е-mail ");
}
/* Создаем новую переменную, присвоив ей значение */
$message_to_myemail = "HELO 
NAME: $name 
E-mail: $email 
Message: $message 
End";
/* Отправляем сообщение, используя mail() функцию */
$from  = "From: $yourname <$email> \r\n Reply-To: $email \r\n"; 
mail($myemail, /*$tema,*/ $message_to_myemail, $from);
?>
<p>Success! Your message sended</p>
<p>On <a href="index.html">Main></a></p>
<?php
/* Если при заполнении формы были допущены ошибки сработает 
следующий код: */
function check_input($data, $problem = "")
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}
function show_error($myError)
{
?>
<html>
<body>
<p>Пожалуйста исправьте следующую ошибку:</p>
<?php echo $myError; ?>
</body>
</html>
<?php
exit();
}
?>