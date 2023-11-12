<!-- Víctor Comino -->
<?php
  require_once __DIR__ . '/../../../vendor/autoload.php';
  require_once __DIR__ . '../../../../env.php';

  // Definim les credencials de Google OAuth
  $clientID = env_oauth()['client_id'];
  $clientSecret = env_oauth()['client_secret'];
  $redirectUri = 'http://localhost/practiques_backend/M07_UF1/Victor_Comino_Pt05/controller/utils/oauth/oauth-user.controller.php';

  // Iniciem el client de Google OAuth
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");
?>