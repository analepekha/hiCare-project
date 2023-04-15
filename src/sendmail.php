<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

$mail=new PHPMailer(true);
$mail->CharSet='UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);

$mail->setFrom('partnership@hicare.com.ua', 'Клієнт');
$mail->addAddress('business@hicare.com.ua');
$mail->Subject = 'Новий запит на партнерство';

$body = '<h1> Новий запит на партнерство </h1>'

if(trim(!empty($_POST['name']))){
$body.='<p><strong>ПІБ:</strong> '.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['city']))){
$body.='<p><strong>Місто:</strong> '.$_POST['city'].'</p>';
}
if(trim(!empty($_POST['number']))){
$body.='<p><strong>Номер:</strong> '.$_POST['number'].'</p>';
}
if(trim(!empty($_POST['email']))){
$body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['data']))){
$body.='<p><strong>Дані про магазин:</strong> '.$_POST['data'].'</p>';
}

$mail->Body = $body;

if(!$mail->send()){
    $message='Помилка';
}else{
    $message = 'Дані відправлені';
}

$response=['message'=>$message];

header('Content-type: application/json');
echo json_encode($response);
