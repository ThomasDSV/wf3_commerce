<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>
	<form method="POST">
		<div>
			<label for="username">Nom Prénom : </label>
			<input type="text" id="username" name="username" value="<?= $username; ?>"/>
		</div>

		<div>
			<label for="email">Adresse email : </label>
			<input type="text" id="email" name="email" value="<?= $email; ?>"/>
		</div>

		<div>
			<label for="password">Mot de passe : </label>
			<input type="password" id="password" name="password" value=""/>
		</div>

		<div>
			<label for="repeat_pwd">Répéter le mot de passe : </label>
			<input type="password" id="repeat_pwd" name="repeat_pwd" value=""/>
		</div>

		<button type="submit">S'inscrire</button>
	</form>
<?php $this->stop('main_content') ?>