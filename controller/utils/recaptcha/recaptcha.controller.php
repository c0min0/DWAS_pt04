<!-- Víctor Comino -->
<?php
require_once __DIR__ . '../../../../env.php';

if (!empty($_POST)) {

	// Secret per a la API de Google
	$secret = env_captcha()['secret'];

	if (isset($_POST['g-recaptcha-response'])) {
		$captcha = $_POST['g-recaptcha-response'];

		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

		$arr = json_decode($response, TRUE);

		// Si és correcte, iniciem sessió i redirigim a login
		if ($arr['success']) {
			session_start();

			// Resetejem intents de login
			$_SESSION['token_try'] = 2;
			
			header("Location: ../controller/login.controller.php");
		} else {
			$errorRecap = "No ets un humà";
			include_once __DIR__ . '/../../view/recaptcha.view.php';
		}
	}
}
include_once __DIR__ . '/../../../view/recaptcha.view.php';
?>