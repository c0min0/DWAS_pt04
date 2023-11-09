<!-- Víctor Comino -->
<?php
if (!empty($_POST)) {

	$secret = "6LdbnP4oAAAAAEpNaSJCbLdEJSGwnyOBEzXcpxJC";

	if (isset($_POST['g-recaptcha-response'])) {
		$captcha = $_POST['g-recaptcha-response'];

		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

		$arr = json_decode($response, TRUE);

		if ($arr['success']) {
			session_start();
			// Resetejem intents
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