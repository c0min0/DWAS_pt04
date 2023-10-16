<?php if (isset($user)) echo $user ?> <!-- Usuari -->
			<span class="<?php if (!$logged) echo 'hidden' ?>">
				<a href="index.php?logout" class="link-button">Tanca la sessió</a>
			</span>