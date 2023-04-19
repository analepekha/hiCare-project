<?php
// Файлы phpmailer
require 'php-mailer/PHPMailer.php';
require 'php-mailer/SMTP.php';
require 'php-mailer/Exception.php';

# проверка, что ошибки нет
if (!error_get_last()) {

    // Переменные, которые отправляет пользователь
    $name = $_POST['name'] ;
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $other = $_POST['other'];
    
    
    // Формирование самого письма
    $title = "Запит на партнерство";
    $body = "
    <h2>Запит на партнерство</h2>
    <b>ПІБ:</b> $name<br>
    <b>Місто:</b> $city<br>
    <b>Номер телефону:</b> $phone<br>
    <b>Email:</b> $email<br>
    <b>Дані про магазин:</b>$other
    ";
    
    // Настройки PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    // $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['data']['debug'][] = $str;};
    
    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'test.hicareco'; // Логин на почте
    $mail->Password   = 'gyieisvjpbzilgcc'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('test.hicareco@gmail.com', 'Системний менеджер HiCare'); // Адрес самой почты и имя отправителя
    
    // Получатель письма
    $mail->addAddress('partnership@hicare.com.ua');  
    
    // Отправка сообщения
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;    
    
    //Проверяем отправленность сообщения
    if(!$mail->send()){
    $message='Помилка';
}else{
    $message = 'Дані відправлені';
}
    
}
$response=['message'=>$message];

// Отправка результата
header('Content-Type: application/json');
echo json_encode($response);

?>