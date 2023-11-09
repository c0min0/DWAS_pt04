<!-- Víctor Comino -->
<?php
  require_once '../vendor/autoload.php';

  // Definim les credencials de Google OAuth
  $clientID = '1060032368369-6389uouukromhs8jilrr2tue2vfidmd2.apps.googleusercontent.com';
  $clientSecret = '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';
  $redirectUri = 'http://localhost/practiques_backend/M07_UF1/Victor_Comino_Pt05/controller/oauth-user.controller.php';

  // Iniciem el client de Google OAuth
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");
?>