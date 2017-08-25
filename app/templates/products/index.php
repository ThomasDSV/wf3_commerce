<?php $this->layout('layout', ['title' => 'Liste des produits']) ?>

<?php $this->start('main_content') ?>
	<a href="<?= $this->url('product_create'); ?>">Ajouter un produit</a>
	<br/><br/>

	<?php foreach ($products as $value) : ?>
		<p><a href="<?= $this->url('product_read', ['id' => $value['id']]); ?>"><?= $value['name']; ?></a> : <?= $value['description']; ?></p>
	<?php endforeach;
$this->stop('main_content') ?>