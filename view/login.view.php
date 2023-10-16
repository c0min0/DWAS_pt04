<!-- Víctor Comino -->
<!DOCTYPE html>
<html lang="ca-ES">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../view/assets/styles/estils.css">
	<title>Víctor Comino</title>
</head>

<body>
	<div class="contenidor">
		<div class="nav">
			<span>
				<a href="../index.php" class="link-button">Torna</a>
			</span>
		</div>
		<h1>Entra</h1>
		<section class="centered">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<label for="userOrEmail">Usuari o adreça electrònica:</label><br>
				<input type="text" name="userOrEmail" required>
				<br><br>
				<label for="password">Contrasenya:</label><br>
				<input type="password" name="password" required>
				<br><br>
				<input type="submit" value="Entra" class="link-button">
				<br><br>
				<p>o <a href="signup.controller.php">registra't</a></p>
			</form>
		</section>
	</div>
</body>

</html>