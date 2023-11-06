<!-- Víctor Comino -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recupera la contrasenya</title>
  <link rel="stylesheet" href="../view/assets/styles/estils.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
  <h2>Demostra que no ets un robot</h2>
  <section class="centered">
    <form action="recaptcha.controller.php" method="POST">
      <div class="g-recaptcha" data-sitekey="6LdbnP4oAAAAAG7pymzhn0r2GEoMDKdMb6sFKvWn"></div>
      <br />
      <input type="submit" value="Submit">
    </form>
  </section>
  <section class="centered">
    <?= isset($errorRecap) ? $errorRecap : '' ?>
  </section>
</body>

</html>