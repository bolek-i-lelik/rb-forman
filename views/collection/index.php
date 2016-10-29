<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $category['title'];
$this->params['breadcrumbs'][] = $this->title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $category['description']
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $category['keywords']
]);

?>
<h1><?= $this->title ?></h1>

<center>
	<img src="<?= Url::to('images/atlas-concorde/'.$category->image, true) ?>" alt=""/>
</center>
<br>
<ul class="nav nav-tabs">
	<?php foreach($collections as $collection): ?>
		<?php $foto = mb_strtolower($category->name); ?>
			<li>
				<a href="#<?=$collection->name?>" data-toggle="tab">
					<img src="<?= Url::to('images/atlas-concorde/'.$foto.'/'.$collection->image, true) ?>" width="70">
					<br>
					<center>
						<?=$collection->name?>
					</center>
				</a>
			</li>
		<?php endforeach;?>
</ul>
<br>
<!-- Tab panes -->
<div class="tab-content">
	<?php foreach($collections as $collection): ?>
		<div class="tab-pane" id="<?= $collection->name ?>">
			<?php for($i=1; $i<=$collection->count_podcat; $i++){ ?>
				<?php foreach($podcats as $podcat): ?>
					<?php if($podcat->id == $i):?>
						<h2><?= $podcat->name ?></h2>
					<?php endif; ?>
				<?php endforeach; ?>
				<?php foreach($products as $product):?>
					<?php foreach($product as $prod):?>
						<?php if($prod->parent == $collection->id && $prod->podcat == $i ):?>
							<div class="row">
							<div class="col-lg-7" style="border-right: 1px solid black;">

							<img src="<?= Url::to($prod->image, true) ?>" alt=""/>
							<br/>
							<?= $prod->name ?>
							<br />
							<?= $prod->size ?>
							<br/>
							<b><font color="red"><?= $prod->price.' '.$prod->price_r ?></font></b>

							</div>
							<div class="col-lg-5">
							Наличие товара можно уточнить по телефону:<br>
							<b><font color="green">(495) 781-20-70</font></b><br><br>
							<input type="text" id="" name="">  кв.м/шт.<br>
							<div class="result"></div><br>
							<button type="button" class="btn btn-primary">В корзину</button>
							</div>
							</div>
							<hr>
						<?php endif;?>
					<?php endforeach;?>
				<?php endforeach;?>
			<?php } ?>
  		</div>
  	<?php endforeach;?>
</div>