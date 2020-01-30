<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

// Переменные, которые отправляет пользователь
$name = $_POST['user_name'];
$email = $_POST['user_email'];
$text = $_POST['message'];

// Проверяем валидность EMail

$mail = new PHPMailer\PHPMailer\PHPMailer();

   
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";                                          
    $mail->SMTPAuth   = true;

    // Настройки вашей почты
    $mail->Host = 'smtp.yandex.ru';  // SMTP сервера
    $mail->Username = 'ania.dudenko'; // Логин на почте
	$mail->Password = '271974fyyf'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('ania.dudenko@yandex.ru'); // Адрес самой почты

    // Получатель письма
   $mail->addAddress('ziga15zaga@mail.ru');    


        // -----------------------
        // Само письмо
        // -----------------------
        $mail->isHTML(true);
    

	$mail->Subject = 'Новое сообщение'; // Заголовок письма
	$mail->Body    = 'Данный пользователь <br> 
	Имя: ' . $name . '<br> 
	Email: ' . $email . '<br> 
	Оставил следующее сообщение: ' . $text . '';  // Текст письма


// Проверяем отравленность сообщения
if ($mail->send()) {
    return false;
} else {
    return true;
}

?>