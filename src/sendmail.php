<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

ini_set("include_path", '/home/hicareco/php:' . ini_get("include_path") );
require 'PHPMailer-6.8.0/src/Exception.php';
require 'PHPMailer-6.8.0/src/PHPMailer.php';
require 'PHPMailer-6.8.0/src/SMTP.php';

$mail=new PHPMailer(true);
$mail->CharSet='UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);

$mail->setFrom('anastasiia.lepekha@gmail.com', 'Клієнт');
$mail->addAddress('maiboroda0103@gmail.com');
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
