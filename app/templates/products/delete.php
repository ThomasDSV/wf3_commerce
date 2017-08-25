<?php $this->layout('layout', ['title' => 'Supprimer un produit']) ?>

<?php $this->start('main_content') ?>
	<p>Voulez-vous vraiment supprimer le produit "<?= $product['name']; ?>" ?</p>

	<form method="POST">
		<button type="submit">Oui</button>
		<a href="<?= $this->url('product_read', ['id' => $product['id']]); ?>">Non</a>
	</form>
	
<?php $this->stop('main_content') ?>