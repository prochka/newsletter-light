<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Вход на отправку формы</title>
</head>
<body>
	<form method="POST" action="admin.php">
		<input type="password" name="pass" value="">
		<input type="submit" value="войти">
		<input type="submit" name="exit" value="выйти">
	</form>
</body>
</html>
<?php
$pass = $_POST['pass'];
$subject = "Рассылка моего сайта"; // тема рассылки
$fromemail = "мое@мыло"; // ваш адрес (для ответов)
$file = "maillist.txt"; // список адресов подписчиков
$password = "123"; // ваш пароль для рассылки
$maillist = file($file);

if ($pass == $password) // если пароль ввели правильный
// то выводим форму с полями для ввода:
// адрес отправителя, текст письма, тело письма
// кнопку для отправления
// после нажатия на кнопку, передаем данные скрипту send.php
{
	echo "<font size=\"-1\"><hr><form method=\"POST\" action=\"send.php\">";
	echo "адрес отправителя<br><input type=\"text\" name=\"fromemail\" value=\"$fromemail\" size=\"25\"><br/>";
	echo "<br/>";
	echo "тема письма<br><input type=\"text\" name=\"subject\" value=\"$subject\" size=\"50\"><br/>";
	echo "<br>текст письма:<br><textarea name=\"body\" rows=\"8\" cols=\"50\"></textarea><br/>";
	echo "<br><input type=\"submit\" value=\"Отправить сообщение\"></form></font><br/";
	print "<i>В базе<b>&nbsp". sizeof($maillist) ."</b> адресов</i><br/><hr>";
	for ($i = 0; $i < sizeof ($maillist); $i++) print $maillist[$i]. "<br>";
}
// если пароль неверный - просим ввести еще раз
else {
	echo "<form method=\"POST\" action=\"ras.php\">
	<input type=\"submit\" value=\"Управление\">
    </form>";
}

$exit = $_POST['exit'];
if(isset($exit)) $password = 'null';
?>
