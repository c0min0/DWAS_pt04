<!-- Víctor Comino -->
<?php
require_once __DIR__ . '/hybridauth-github.controller.php';
require_once __DIR__ . '/../../../model/users.model.php';
require_once __DIR__ . '/../redirect.controller.php';

externalUserAuth($emailHybridauth);

header("Location: ../../private.controller.php");
exit;
?>