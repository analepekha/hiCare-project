<?php
require 'php-mailer/PHPMailer.php';
require 'php-mailer/SMTP.php';
require 'php-mailer/Exception.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

  
if (!error_get_last()) {
    $name = $_POST['name'] ;
    $phone = $_POST['phone'];
    
    $title = "Запит на замовлення";
    $body = "
    <h2>Запит на замовлення</h2>
    <b>ПІБ:</b> $name<br>
    <b>Номер телефону:</b> $phone<br>
    ";
    
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    // $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['data']['debug'][] = $str;};
    
    $mail->Host       = $_ENV['HOST']; 
    $mail->Username   = $_ENV['USER'];
    $mail->Password   = $_ENV['PASSWORD'];
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = $_ENV['PORT'];
    $mail->setFrom($_ENV['USER_EMAIL'], 'Системний менеджер HiCare'); 
    
    $mail->addAddress($_ENV['ADDRESS_ORDER_EMAIL']);
    
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