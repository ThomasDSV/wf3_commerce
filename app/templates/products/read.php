<?php $this->layout('layout', ['title' => 'Informations du produit']) ?>

<?php $this->start('main_content') ?>
	<h2><?= $product['name']; ?></h2>
	<span>Prix : <?= $product['price']; ?> €</span>
	<p><?= $product['description']; ?></p>
	<img src="<?= $product['image']; ?>" width="600" height="400" />
	<div>
		<a href="<?= $this->url('product_edit', ['id' => $product['id']]); ?>">Modifier</a>
		<a href="<?= $this->url('product_delete', ['id' => $product['id']]); ?>">Supprimer</a>
	</div>
<?php $this->stop('main_content') ?>