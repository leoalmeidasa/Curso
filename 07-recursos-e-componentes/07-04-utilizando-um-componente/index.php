<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.04 - Utilizando um componente");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ instance ] https://packagist.org/packages/phpmailer/phpmailer
 */
fullStackPHPClassSession("instance", __LINE__);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailException;

$phpMailer = new PHPMailer();
var_dump($phpMailer instanceof PHPMailer);


/*
 * [ configure ]
 */
fullStackPHPClassSession("configure", __LINE__);

try {
    $mail = new PHPMailer(true);

    //CONFIG
    $mail->isSMTP();
    $mail->setLanguage("br");
    $mail->isHTML(true);
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->CharSet = 'utf-8';

    //AUTH
    $mail->Host = "smtp.sendgrid.net";
    $mail->Username = "apikey";
    $mail->Password = "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";
    $mail->Port = "587";

    //MAIL
    $mail->setFrom("elissandrojr1@gmail.com ", "Elissandro Viado");
    $mail->Subject = "Email enviado atraves de API";
    $mail->msgHTML("<h1>Oi, Elissandro</h1><p>Esse é o meu primeiro disparo de e-mail</p>");

    //SEND
    $mail->addAddress("leoalmeidasa@gmail.com", "Leonardo Almeida");
    $send = $mail->send();

    var_dump($send);
} catch (MailException $exception) {
    echo message()->error($exception->getMessage());
}