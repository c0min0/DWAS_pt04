<!-- Víctor Comino -->
<?php
require_once __DIR__ . '/utils/test.controller.php';
require_once __DIR__ . '/utils/mailer/mailer.controller.php';
require_once __DIR__ . '/../model/users.model.php';
require_once __DIR__ . '/../env.php';


// Redirim a l'usuari a la pàgina privada si està autenticat
session_start();
if (isset($_SESSION['userId'])) {
    header("Location: private.controller.php");
    exit;
}

$errors = '';
$email = '';

if (isset($_POST['email'])) {
    $email = cleanInput($_POST['email']);
    
    if (validateEmail($email)) {
        $userDB = findUserByEmail($email);
        
        if ($userDB) {
            $name = 'Pagina web articles';
            $subject = 'Recupera la teva contrasenya';

            $token = updateRetrieveToken($userDB['id']);
            $url = env()['base_retrieve_link'] . "/controller/change-password.controller.php?token=$token";
            $message = "
            <html>
            <head>
            <title>Recupera la teva contrasenya</title>
            </head>
            <body>
            <p>Per recuperar la teva contrasenya, fes click en el següent enllaç:</p>
            <a href='$url'>Recupera la teva contrasenya</a>
            </body>
            </html>
            ";

            sendWithPHPMailer($email, $name, $subject, $message);

        } else {
            $errors = '<div class="error">No existeix cap usuari amb aquest correu electrònic</div><br>';
        }
    } else {
        $errors = '<div class="error">El correu electrònic no és vàlid</div><br>';
    }
}

include_once '../view/retrieve-password.view.php';
?>