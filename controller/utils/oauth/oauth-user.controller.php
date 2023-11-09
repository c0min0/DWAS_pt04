<!-- Victor Comino -->
<?php
require_once __DIR__ . '/oauth-autentification.controller.php';

session_start();

// Si tenim l'email del compte de Google
if (isset($emailOAuth)) {

    // Busquem l'usuari a la base de dades
    $user = findUserByEmail($emailOAuth);
    
    // Si no existeix, l'afegim
    if(!$user) {
        addUser($emailOAuth, $emailOAuth);
        $user = findUserByEmail($emailOAuth);
    }
    
    // Iniciem sessió
    $_SESSION['userId'] = $user['id'];
}

// Redirim a l'usuari a la pàgina privada
header("Location: ../../private.controller.php");

?>