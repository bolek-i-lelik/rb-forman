<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $parent['title'];
$this->params['breadcrumbs'][] = $parent_parent->name.'  /  '. $this->title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $parent['description']
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $parent['keywords']
]);

?>
<center><h1><?=$parent['title']?></h1>
	<?php if(!empty($parent->image)):?>
		<img src="/images/<?=$parent['alias']?>/<?=$parent->image?>">
	<?php endif;?>
</center>
<div class="row">
	<?php foreach ($categories as $category):?>
		<div class="col-lg-6 ">
		<br/>
			<?= Html::Tag('a', '<img src="/images/'.$parent['alias'].'/'.$category->image.'" height="200">', ['href'=> Url::to('collection/'.$category->id, true)]); ?>
			<br />
			<?= Html::Tag('a', '<h3>'.$category->name.'</h3>', ['href'=> Url::to('collection/'.$category->id, true)]); ?>
			<p><?=$category->preview_text?></p>
			<?= Html::Tag('a', '<button class="btn btn-primary">Подробнее</button>', ['href'=> Url::to('collection/'.$category->id, true)]); ?>
			
		</div>
	<?php endforeach;?>
</div>
<br/>
<div>
	<p align="justify"><?=$parent['text']?></p>
	<?=$parent['video']?>
</div>
