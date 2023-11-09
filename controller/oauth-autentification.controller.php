<!-- Víctor Comino -->
<?php
  require_once 'oauth-configuration.controller.php';
  require_once '../model/users.model.php';

// autentiquem el codi de Google OAuth
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
  
  // Obtenim l'adreça electrònica del compte de Google
  $google_oauth = new Google\Service\Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $emailOAuth =  $google_account_info->email;

}

?>