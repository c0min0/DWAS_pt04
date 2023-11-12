<!-- Victor Comino -->
<?php
require_once __DIR__ . '/oauth-autentification.controller.php';
require_once __DIR__ . '/../redirect.controller.php';

session_start();

// Validem si l'usuari existeix i sinó el creem i iniciem la sessió
externalUserAuth($emailOAuth);

// Redirigim a la pàgina privada
header("Location: ../../private.controller.php");
exit;
?>