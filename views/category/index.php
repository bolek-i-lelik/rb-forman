<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $categories['title'];
//$this->params['breadcrumbs'][] = $parentCategory->name.'  /  '. $this->title;

$this->registerMetaTag([
    'name' => 'description',
    'content' => $categories['description']
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $categories['keywords']
]);

?>





