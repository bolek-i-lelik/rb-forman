<?php
/* @var $this yii\web\View */

$this->title = $categories['title'];
$this->params['breadcrumbs'][] = 'Статьи  /  '. $this->title;

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