<!-- Víctor Comino -->
<?php
require_once __DIR__ . '/hybridauth-github.controller.php';
require_once __DIR__ . '/../../../model/users.model.php';
require_once __DIR__ . '/../redirect.controller.php';

// Validem si l'usuari existeix i sinó el creem i iniciem la sessió
externalUserAuth($emailHybridauth);

// Redirigim a la pàgina privada
header("Location: ../../private.controller.php");
exit;
?>