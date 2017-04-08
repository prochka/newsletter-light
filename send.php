<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Отправка письма</title>
</head>
<body>
<a href=""></a>	

<?php

$odr = "\n\n\n Для отказа от подписки воспользуйтесь ссылкой\n";
$homepage = '<a href="http://emailscript.loc/ras.php';


error_reporting(0);
$subject = $_POST['subject'];
$body = $_POST['body'];
$subject = stripslashes($subject);
$body = stripslashes($body);
echo $body;
echo $subject;

$file = "maillist.txt";
$maillist = file($file);

print "В базе". sizeof($maillist) ." адресов<br>";
for ($i = 0; $i < sizeof ($maillist); $i++)
{
$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";

mail($maillist[$i], $subject,
$body .$odr.$homepage."?delmail=".$maillist[$i]."\">отписаться</a>", $headers);
}
echo "Готово!";

?>
</body>
</html>