<!-- Víctor Comino -->
<?php

require_once '../model/users.model.php';
require_once 'utils/test.controller.php';

session_start();

// Redirim a l'usuari a la pàgina privada si està autenticat
if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
    header("Location: private.controller.php");
    exit;
}

// Definim camps necessaris per a la vista
$user = $email = $password = $repass = "";

$errors = [
    'userErr' => '',
    'emailErr' => '',
    'passErr' => '',
    'repassErr' => '',
    'genericErr' => ''
];

###PENDENT####
// Si l'usuari ja està loguejat, el redirigim a la pàgina principal
// if (isset($_SESSION['user'])) {
//     header('Location: ../index.php');
// }
if (
    isset($_POST["user"])
    && isset($_POST["email"])
    && isset($_POST["password"])
    && isset($_POST["repass"])
) {

    // Validem les dades
    $user = cleanInput($_POST["user"]);
    $email = cleanInput($_POST["email"]);
    $password = cleanInput($_POST["password"]);
    $repass = cleanInput($_POST["repass"]);

    // Usuari
    if (!validateStrLength($user, 3, 20)) {
        $errors['userErr'] = 'L\'usuari ha de tenir entre 3 i 20 caràcters';
    } else if (findUserByUsername($user)) {
        $errors['userErr'] = 'L\'usuari ja existeix';
    }

    // Correu electrònic
    if (!validateEmail($email)) {
        $errors['emailErr'] = 'El correu electrònic no és vàlid';
    } else if (findUserByEmail($email)) {
        $errors['emailErr'] = 'El correu electrònic ja existeix';
    }

    // Contrasenya
    if (!validateStrLength($password, 6, 20)) {
        $errors['passErr'] = 'La contrasenya ha de tenir entre 6 i 20 caràcters';
    } else if ($password !== $repass) {
        $errors['repassErr'] = 'Les contrasenyes no coincideixen';
    }

    $anyError = false;
    foreach ($errors as $error) {
        if ($error !== '') {
            $anyError = true;
            break;
        }
    }

    if (!$anyError) {
        if (addUser($user, $email, $password)) {
            header("Location: login.controller.php?signup=ok");
            exit;
        } else {
            header("Location: ../index.php?error=signup");
            exit;
        }
    }
}

include_once '../view/signup.view.php';
?>