<!-- Víctor Comino -->
<?php
require_once 'utils/test.controller.php';
require_once '../model/users.model.php';

// Redirim a l'usuari a la pàgina privada si està autenticat
session_start();
if (isset($_SESSION['userId'])) {
    header("Location: private.controller.php");
    exit;
}

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

                // Establim el temps de vida de la sessió a 30min (per defecte és 24min)
                ini_set('session.gc_maxlifetime', 1800);
                
                // Iniciem sessió
                session_start();
                $_SESSION['userId'] = $userDB['id'];
                
                // Redirigim a l'espai privat
                header('Location: private.controller.php');
                exit;
                
            } else {
                $errors['genericErr'] = '<div class="error">Usuari o contrasenya incorrectes</div><br>';
            }

        } else {
            $errors['genericErr'] = '<div class="error">Usuari o contrasenya incorrectes</div><br>';
        }
    } 

include_once '../view/login.view.php';
