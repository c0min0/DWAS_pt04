<!-- Víctor Comino -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="view/assets/styles/estils.css">
	<title>Víctor Comino</title>
</head>

<body>
	<div class="contenidor">
		<div class="nav">
			<span>
				<a href="index.php?login" class="link-button">Inicia la sessió</a>
			</span>
			<span>
				<a href="index.php?signup" class="link-button">Enregistra't</a>
			</span>
		</div>
		<h1>Articles</h1>
		<div class="pag_selector"> <!-- Selector de quantitat d'articles -->
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
				<label for="num_art">Número de pàgines:</label>
				<select id="num_art" name="num_art" onchange="this.form.submit()">
					<option value="5" <?php echo $cinc ?>>5</option>
					<option value="10" <?php echo $deu ?>>10</option>
					<option value="15" <?php echo $quinze ?>>15</option>
					<option value="20" <?php echo $vint ?>>20</option>
				</select>
			</form>
			<br>
		</div>
		<section class="articles">
			<ul>
				<?php echo $list ?> <!-- Llista d'articles -->
			</ul>
		</section>
		<section class="paginacio">
			<ul>
				<?php echo $paginacio ?> <!-- Paginació -->
			</ul>
		</section>
	</div>
</body>

</html>