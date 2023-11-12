<!-- Victor Comino -->
<?php
require_once __DIR__ . '/oauth-autentification.controller.php';
require_once __DIR__ . '/../redirect.controller.php';

session_start();

externalUserAuth($emailOAuth);

header("Location: ../../private.controller.php");
exit;
?>