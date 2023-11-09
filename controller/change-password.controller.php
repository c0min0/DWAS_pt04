<!-- Víctor Comino -->
<?php
require_once __DIR__ . '/utils/test.controller.php';
require_once __DIR__ . '/../model/users.model.php';
require_once __DIR__ . '/../env.php';


// Redirim a l'usuari a la pàgina privada si està autenticat
session_start();
if (isset($_SESSION['userId'])) {
    header("Location: private.controller.php");
    exit;
}

$errors = '';
$new_password = '';
$repeat_password = '';

if (isset($_POST['new_password']) && isset($_POST['repeat_password'])) {
    $new_password = cleanInput($_POST['new_password']);
    $repeat_password = cleanInput($_POST['repeat_password']);

    // Provem de canviar la contrasenya
    if (validateStrLength($new_password, 6, 20) && $new_password === $repeat_password) {
        $userDB = findUserByToken($_GET['token']);

        if ($userDB) {
            if (updatePasswordById($userDB['id'], $new_password)) {
                header("Location: login.controller.php?signup=ok");
                exit;
            } else {
                $errors = '<div class="error">No s\'ha pogut actualitzar la contrasenya</div><br>';
            }
        } else {
            $errors = "<div class=\"error\">No s'ha pogut canviar la contrasenya</div><br>";
        }
    } else {
        $errors = '<div class="error">La contrasenya no és vàlida</div><br>';
    }
}

include_once '../view/change-password.view.php';
?>