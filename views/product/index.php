<?php
/* @var $this yii\web\View */
?>
<h1><?= $product['h1'] ?></h1>
<div class="row">
	<div class="col-lg-5">
		<img src="/images/keramaproducts/<?= $parent ?>/<?= $product['image'] ?>">
	</div>
	<div class="col-lg-7">
		<p><?= $product['name'] ?></p>
		<p><?= $product['price'] ?> руб./<?= $product['edizm'] ?></p>
		<p>Размер: <?= $product['size'] ?></p>
		<button class="btn btn-primary">В корзину</button>
	</div>
</div>


