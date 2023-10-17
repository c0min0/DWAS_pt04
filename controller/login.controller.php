<!-- Víctor Comino -->
<?php
require_once 'test/test.controller.php';
require_once '../model/users.model.php';

$errors = [
    'genericErr' => ''
];

// Comprovem si s'accedeixa la pàgina després de registrar un usuari 
$successSignup = '';
if (isset($_GET['signup']) ? $_GET['signup'] == 'ok' : false) {
    $successSignup = '<h2 class="success">Us heu registrat amb èxit! Ja podeu iniciar sessió</h2>';
}

// Comprovem les credencials
if (isset($_POST['userOrEmail']) && isset($_POST['password'])) {
    // Netejem inputs
    $userOrEmail = cleanInput($_POST['userOrEmail']);
    $password = cleanInput($_POST['password']);

        // Cerquem a la BD
        $userDB = strpos($userOrEmail, '@') ? findUserByEmail($userOrEmail) : findUserByUsername($userOrEmail);

        // En cas que es trobi l'usuari
        if ($userDB) {

            // Comprovem la contrasenya
            if (password_verify($password, $userDB['password'])) {
                // Iniciem sessió
                session_start();
                $_SESSION['user'] = $userDB;
                
                // Redirigim a l'espai privat
                header('Location: private.controller.php');
                
            } else {
                $errors['genericErr'] = '<div class="error">Usuari o contrasenya incorrectes</div><br>';
            }

        } else {
            $errors['genericErr'] = '<div class="error">Usuari o contrasenya incorrectes</div><br>';
        }
    } 

include_once '../view/login.view.php';
