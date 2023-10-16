<!-- Víctor Comino -->
<?php

require_once '../model/users.model.php';
require_once 'test/test.controller.php';

$user = $email = $password = $repass = "";

$errors = [
    'userErr' => '',
    'emailErr' => '',
    'passErr' => '',
    'repassErr' => '',
    'genericErr' => ''
];

if (
    isset($_POST["user"])
    && isset($_POST["email"])
    && isset($_POST["password"])
    && isset($_POST["repass"])
) {

    $user = cleanInput($_POST["user"]);
    $email = cleanInput($_POST["email"]);
    $password = cleanInput($_POST["password"]);
    $repass = cleanInput($_POST["repass"]);

    if (!validateStrLength($user, 3, 20)) {
        $errors['userErr'] = 'L\'usuari ha de tenir entre 3 i 20 caràcters';
    }

    if (!validateEmail($email)) {
        $errors['emailErr'] = 'El correu electrònic no és vàlid';
    }

    if (!validateStrLength($password, 6, 20)) {
        $errors['passErr'] = 'La contrasenya ha de tenir entre 8 i 20 caràcters';
    }

    if ($password !== $repass) {
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
        } else {
            header("Location: login.controller.php?error=signup");
        }
    }
}

include_once '../view/signup.view.php';
?>