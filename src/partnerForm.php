<?php
require 'php-mailer/PHPMailer.php';
require 'php-mailer/SMTP.php';
require 'php-mailer/Exception.php';

if (!error_get_last()) {
    $name = $_POST['name'] ;
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $other = $_POST['other'];
    
    $title = "Запит на партнерство";
    $body = "
    <h2>Запит на партнерство</h2>
    <b>ПІБ:</b> $name<br>
    <b>Місто:</b> $city<br>
    <b>Номер телефону:</b> $phone<br>
    <b>Email:</b> $email<br>
    <b>Дані про магазин:</b>$other
    ";
    
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    // $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['data']['debug'][] = $str;};
    
    $mail->Host       = 'smtp.gmail.com';
    $mail->Username   = 'test.hicareco'; 
    $mail->Password   = 'gyieisvjpbzilgcc'; 
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('test.hicareco@gmail.com', 'Системний менеджер HiCare'); 
    
    $mail->addAddress('opt@hicare.com.ua');  
    
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;    
    
    if(!$mail->send()){
        $message='Помилка';
    }else{
        $message = 'Дані відправлені';
    }
}
$response=['message'=>$message];

header('Content-Type: application/json');
echo json_encode($response);

?>