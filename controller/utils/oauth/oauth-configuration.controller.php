<!-- Víctor Comino -->
<?php
  require_once __DIR__ . '/../../../vendor/autoload.php';

  // Definim les credencials de Google OAuth
  $clientID = '1060032368369-9t5ncdnq883p8brhv0ine2tbbqtpsbb1.apps.googleusercontent.com';
  $clientSecret = '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';
  $redirectUri = 'http://localhost/practiques_backend/M07_UF1/Victor_Comino_Pt05/controller/utils/oauth/oauth-user.controller.php';

  // Iniciem el client de Google OAuth
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");
?>