<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $categories['title'];
$this->params['breadcrumbs'][] = $parentCategory->name.'  /  '. $this->title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $categories['description']
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $categories['keywords']
]);

?>
<h1><?= $categories['title']?></h1>
<?php if($products):?>
<div class="row">
	<?php foreach ($products as $product):?>
	<div class="col-lg-4">
		<img src="<?= Url::to('images/'.$product->image, true)?>"" width="215"><br/>
		<p><center>Артикул: <?= $product->articul ?></center></p>
		<p><center>Цена: <?= $product->price ?> рублей</center></p>
	</div>
	<?php endforeach;?>
</div>
<?php endif;?>




