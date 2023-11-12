<?php
require_once __DIR__ . '/../../../env.php';
require_once __DIR__ . '/../../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Funció que envia un correu amb PHPMailer
 * @param $email Adreça de correu electrònic
 * @param $nom Nom de remitent
 * @param $subject Assumpte del correu
 * @param $message Missatge del correu
 * @return void
 */
function sendWithPHPMailer($email, $nom, $subject, $message)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $mailData = env_mail();

    try {
        
        //Server settings
        $mail->SMTPDebug = $mailData["debug"];
        $mail->isSMTP();
        $mail->Host = $mailData["Host"];
        $mail->SMTPAuth = $mailData["SMTPAuth"];
        $mail->Username = $mailData["Username"];
        $mail->Password = $mailData["Password"];
        $mail->SMTPSecure = $mailData["SMTSecure"];
        $mail->Port = $mailData["Port"];

        //Recipients
        $mail->setFrom($email, $nom);
        $mail->addAddress($email);

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        // POST-REDIRECT-GET
        header('Location: ../view/success-retrieve-message.view.php');
    } catch (Exception $e) {
        // POST-REDIRECT-GET
        header('Location: error.view.html');
    } finally {
        $connection = null;
    }
}

?>